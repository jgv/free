<?php 
define('WP_USE_THEMES', false); 
get_header();
get_sidebar(); 	      
?>

<hr style="visibility:hidden" id="free" />
    
<?php query_posts('category_name=free'); ?>
<?php while (have_posts()) : the_post();  ?>
<div class="section-wrap">
  <div class="section">
    <?php the_title('<h1 class="section-title">', '</h1>'); ?>
    <?php the_content(); ?>
  </div>
</div>
<?php endwhile; ?>
<?php rewind_posts();?>

<?php include('inc/artists.php'); ?>

<?php query_posts('category_name=artists&orderby=menu_order'); ?>
<?php while (have_posts()) : the_post(); ?>
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
      <img class="closer" src="<?php bloginfo('template_url') ?>/images/close.png" alt="Close">      
    </div>
  </div>
</div>

<?php endwhile; ?>
<?php rewind_posts(); ?>

<?php include('inc/essays.html'); ?>

<?php query_posts('category_name=essays'); ?>
<?php while (have_posts()) : the_post();  ?>
<?php $perma = strtolower(get_the_author()); ?>
<?php $permalink = preg_replace('/\s+/', '', $perma);?>
<div class="section-wrap essays" id="<?php echo $permalink; ?>">
  <div class="section"> 
    <div class="essay-meta">
      <?php the_title("<h2 class='ital'>", "</h2>"); ?>
      <h3><?php the_author(); ?></h3>
      <img class="clipboard" title="<?php bloginfo('url')?>/#<?php echo $permalink; ?>" src="<?php bloginfo('template_url')?>/images/link.png" alt="Permalink" />
    </div>
    <div class="essay-content">
      <?php the_content(); ?>
      <img class="closer" src="<?php bloginfo('template_url') ?>/images/close.png" alt="Close">       
    </div>
  </div>
</div>

<?php endwhile; ?>
<?php rewind_posts(); ?>

<?php include('inc/events.php');?>

<?php query_posts('category_name=events&orderby=menu_order'); ?>
<?php while (have_posts()) : the_post();  ?>
<div class="section-wrap events">
  <div class="section events" id ="<?php echo strtolower(str_replace(' ','', trim(get_the_title($post))));?>">
  <?php if (get_post_meta( $post->ID, 'event_link', true ) != NULL ): ?>
  <h2 class="ital"><a href="<?php echo get_post_meta( $post->ID, 'event_link', true ); ?>" class="events-link" title="<?php the_title() ?>" alt="<?php the_title()?>"><?php the_title(); ?></a></h2>
  <?php else : ?>
  <h2 class="ital"><?php the_title(); ?></h2>
  <?php endif; ?>
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
<?php endwhile; ?>
<?php rewind_posts(); ?>

<?php query_posts('category_name=credits'); ?>
<?php while (have_posts()) : the_post();  ?>
<div class="section-wrap" id="credits">
  <div class="section">
    <?php the_title('<h1 class="section-title">', '</h1>'); ?>
    <?php the_content(); ?>
  </div>
</div>
<?php endwhile; ?>
<?php rewind_posts(); ?>

<?php include('inc/blog.php'); ?>

<?php query_posts('category_name=blog&numberposts=-1'); ?>
<?php while (have_posts()) : the_post();  ?>
<div class="section-wrap blog-wrap" id="post-<?php the_id() ?>">
  <div class="section blog">
      <h2 class="ital clipboard" title="<?php bloginfo('url') ?>/#post-<? the_id() ?>"><?php the_title(); ?></h2>
    <?php the_post_thumbnail(); ?>
    <?php the_content(); ?>
    <img class="divider" src="<?php bloginfo('template_url'); ?>/images/divider.png">
    <?php 

    $posttags = get_the_tags();     
    if ( $posttags ):
      echo ' <h3 id="tags">Tags</h3>';
      echo '<ul id="tag-list">';
      $last_tag = end($posttags);
      foreach($posttags as $tag):     
        if ($tag == $last_tag): 
	  echo '<li>' . $tag->name . '</li>';
        else :
	  echo '<li>' . $tag->name . ',</li>';
	endif;
      endforeach;
      unset($tag);
      echo '</ul>';
    endif;
    ?>
  
    <?php if (get_post_meta( $post->ID, 'blog_external_link', true ) != NULL): ?>
    <p class="external"><a href="<?php echo get_post_meta( $post->ID, 'blog_external_link', true ); ?>" title="<?php echo get_post_meta( $post->ID, 'blog_external_link', true ); ?>">LINK &raquo;</a></p>
    <?php endif; ?>

  </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>