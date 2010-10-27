<?php 
define('WP_USE_THEMES', false); 
get_header();
get_sidebar(); 	

?>

<hr style="visibility:hidden" id="free">
    
<?php query_posts('category_name=free');
while (have_posts()) : the_post();  ?>
   <div class="section-wrap">
      <div class="section">
         <?php the_title('<h1 class="section-title">', '</h1>'); ?>
         <?php the_content(); ?>
         </div>
      </div>
   <?php endwhile;
   rewind_posts();
               
   include('inc/artists.php');
               
   query_posts('category_name=artists&orderby=menu_order');
   while (have_posts()) : the_post();  ?>
      <div class="section-wrap" id="artists-container">
         <div class="section-artists" id="<?php echo strtolower(str_replace(' ','', trim(get_the_title($post))));?>">
            <div class="meta-wrapper">
               <?php the_post_thumbnail(array(646,auto)); ?>
                  <div class="meta">
                     <h2 class="ital"><?php echo get_post_meta($post->ID, 'artwork_title', true)?></h2>
                     <?php the_title('<h3>', '</h3>'); ?>
                  </div>
            </div>
            <div class="artists-content">
            <?php the_content(); ?>

      
      <?php
        //for use in the loop, list 5 post titles related to first tag on current post
                /*    $tags = wp_get_post_tags($post->ID);
                    if ($tags) {
                      $first_tag = $tags[0]->term_id;
                      $args=array(
                                  'tag__in' => array($first_tag),
                                  'post__not_in' => array($post->ID),
                                  'showposts'=>5,
                                  'caller_get_posts'=>1
                                  );
                      $my_query = new WP_Query($args);
                      if( $my_query->have_posts() ) {
                      echo '<h3 class="red">External Links</h3>';
      while ($my_query->have_posts()) : $my_query->the_post(); ?>
      <?php $excerpt = get_the_excerpt(); ?>
      <p><a href="<?php echo $excerpt; ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
<?php
        endwhile;
  }
                    } */
      ?>      
            <img class="closer" src="<?php bloginfo('template_url') ?>/images/close.png" alt="Close">
         </div>
      </div>
   </div>
   <?php endwhile; ?>
   <?php rewind_posts();


include('inc/essays.html');

query_posts('category_name=essays');
while (have_posts()) : the_post();  ?>
<div class="section-wrap essays" id="<?php the_author_meta('last_name'); ?>">
	<div class="section">
  		<div class="essay-meta">
    	<?php the_title('<h2 class="ital">', '</h2>' ); ?>
    	<h3><?php the_author(); ?></h3>
    	<h6><a href="<?php bloginfo('url') ?>/#<?php the_author_meta('last_name'); ?>">Permalink</a></h6>
  		</div>
  		<div class="essay-content">
    		<?php the_content(); ?>
    		<img class="closer" src="<?php bloginfo('template_url') ?>/images/close.png" alt="Close">       
    	</div>
	</div>
</div>
         <?php endwhile; ?>
         <?php rewind_posts();
 
         
         include('inc/events.php');
                         
         query_posts('category_name=events&orderby=menu_order');
         while (have_posts()) : the_post();  ?>
         <div class="section-wrap events">
           <div class="section events" id ="<?php echo strtolower(str_replace(' ','', trim(get_the_title($post))));?>">
           <?php if (get_post_meta( $post->ID, 'event_link', true ) != NULL ) { ?>
           <a href="<?php echo get_post_meta( $post->ID, 'event_link', true ); ?>" class="events-link" title="<?php the_title() ?>" alt="<?php the_title()?>"><?php the_title('<h2 class="ital">', '</h2>'); ?></a>
           <?php } else { ?>
           <?php the_title('<h2 class="ital">', '</h2>'); ?>
           <?php } ?>
           <h5>
             <?php echo get_post_meta( $post->ID, 'event_date', true ); ?>
             &ndash;
             <?php echo get_post_meta( $post->ID, 'event_time', true ); ?>
             &ndash;
             <?php echo get_post_meta( $post->ID, 'event_location', true ); ?>
           </h5>               
           <?php the_content(); ?>
         </div>
       </div>
       <?php endwhile;
         rewind_posts();
         
       query_posts('category_name=credits');
       while (have_posts()) : the_post();  ?>
       <div class="section-wrap" id="credits">
         <div class="section">
           <?php the_title('<h1 class="section-title">', '</h1>'); ?>
           <?php the_content(); ?>
         </div>
       </div>
       <?php endwhile;
         rewind_posts();
           
           
	 include('inc/blog.php');
           
         query_posts('category_name=blog&offset=0&posts_per_page=5');
       while (have_posts()) : the_post();  ?>
       <div class="section-wrap blog-wrap" id="post-<?php the_id() ?>">
         <div class="section blog">
           <?php the_title('<h2 class="ital">', '</h2>'); ?>
           <?php the_post_thumbnail(); ?>
           <?php the_content(); ?>
           <img class="divider" src="<?php bloginfo('template_url'); ?>/images/divider.png">
           <?php if (get_post_meta( $post->ID, 'blog_external_link', true ) != NULL) { ?>
           <p class="external"><a href="<?php echo get_post_meta( $post->ID, 'blog_external_link', true ); ?>" title="<?php echo get_post_meta( $post->ID, 'blog_external_link', true ); ?>">LINK &raquo;</a></p>
           <?php } ?>
           <?php /* bloginfo('url') .'/#'. strtolower(str_replace(' ','', trim(get_the_title($post))));  the permalink */ ?> 
           <?php /*
           <?php echo '<h3 id="tags">Tags</h3>';
           
           <?php echo '<ul id="tag-list">';
             
             if ( get_tags() != NULL) {
                                $last_tag = end(get_tags());
                                foreach(get_tags() as $tag){     
                                  if ($tag == $last_tag) { 
                                    echo '<li>' . $tag->name . '</li>';
                                  } else {
                                    echo '<li>' . $tag->name . ',</li>';
                                  }
                                }
	       unset($tag);
	       }*/
	     ?> 
              <!-- </ul> --> 
     


         </div>
      </div>
       <?php endwhile; ?>



<?php get_footer(); ?>