<?php

add_theme_support( 'post-thumbnails' ); // enables featured photos for artists section headlines


function jgv_list_authors($args = '') {
	global $wpdb;

	$defaults = array(
		'optioncount' => false, 'exclude_admin' => true,
		'show_fullname' => false, 'hide_empty' => true,
		'feed' => '', 'feed_image' => '', 'feed_type' => '', 'echo' => true,
		'style' => 'list', 'html' => true
	);

	$r = wp_parse_args( $args, $defaults );
	extract($r, EXTR_SKIP);
	$return = '';

	/** @todo Move select to get_authors(). */
	$users = get_users_of_blog();
	$author_ids = array();
	foreach ( (array) $users as $user )
		$author_ids[] = $user->user_id;
	if ( count($author_ids) > 0  ) {
		$author_ids = implode(',', $author_ids );
		$authors = $wpdb->get_results( "SELECT ID, user_nicename from $wpdb->users WHERE ID IN($author_ids) " . ($exclude_admin ? "AND user_login <> 'admin' " : '') . "ORDER BY display_name" );
	} else {
		$authors = array();
	}

	$author_count = array();
	foreach ( (array) $wpdb->get_results("SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE post_type = 'post' AND " . get_private_posts_cap_sql( 'post' ) . " GROUP BY post_author") as $row )
		$author_count[$row->post_author] = $row->count;

	foreach ( (array) $authors as $author ) {

		$link = '';

		$author = get_userdata( $author->ID );
		$posts = (isset($author_count[$author->ID])) ? $author_count[$author->ID] : 0;
		$name = $author->display_name;

		if ( $show_fullname && ($author->first_name != '' && $author->last_name != '') )
			$name = "$author->first_name $author->last_name";

		if( !$html ) {
			if ( $posts == 0 ) {
				if ( ! $hide_empty )
					$return .= $name . ', ';
			} else
				$return .= $name . ', ';

			// No need to go further to process HTML.
			continue;
		}

		if ( !($posts == 0 && $hide_empty) && 'list' == $style )
			$return .= '<li>';
		if ( $posts == 0 ) {
			if ( ! $hide_empty )
				$link = $name;
		} else {
			$link = '<a href="#' . $author->user_nicename . '" title="' . esc_attr( sprintf(__("Posts by %s"), $author->display_name) ) . '">' . $name . '</a>';
/*
 this needs to be moved to a custom function in functions.php!!!!!!

			$link = '<a href="' . get_author_posts_url($author->ID, $author->user_nicename) . '" title="' . esc_attr( sprintf(__("Posts by %s"), $author->display_name) ) . '">' . $name . '</a>';

*/
			if ( (! empty($feed_image)) || (! empty($feed)) ) {
				$link .= ' ';
				if (empty($feed_image))
					$link .= '(';
				$link .= '<a href="' . get_author_feed_link($author->ID) . '"';

				if ( !empty($feed) ) {
					$title = ' title="' . esc_attr($feed) . '"';
					$alt = ' alt="' . esc_attr($feed) . '"';
					$name = $feed;
					$link .= $title;
				}

				$link .= '>';

				if ( !empty($feed_image) )
					$link .= "<img src=\"" . esc_url($feed_image) . "\" style=\"border: none;\"$alt$title" . ' />';
				else
					$link .= $name;

				$link .= '</a>';

				if ( empty($feed_image) )
					$link .= ')';
			}

			if ( $optioncount )
				$link .= ' ('. $posts . ')';

		}

		if ( $posts || ! $hide_empty )
			$return .= $link . ( ( 'list' == $style ) ? '</li>' : ', ' );
	}

	$return = trim($return, ', ');

	if ( ! $echo )
		return $return;
	echo $return;
}

?>