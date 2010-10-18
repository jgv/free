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
               <h1 class="section-title"><?php the_title(); ?></h1>
               <?php the_content(); ?>
               </div>
            </div>
         <?php endwhile;
      rewind_posts();
      
      include('inc/artists.html');

      query_posts('category_name=artists'); ?>
         <div id="artist-accordion">
        <?php while (have_posts()) : the_post();  ?>
            <div class="section-wrap" id="artists-container">
               <div class="section-artists">
                  <div class="meta-wrapper">
                  <?php the_post_thumbnail(); ?>
                  <div class="meta">
                     <h2 class="ital"><?php echo get_post_meta($post->ID, 'artwork_title', true)?></h2>
                     <h3><?php the_title(); ?></h3>
                  </div>
                  </div>
               <div class="artists-content">
                  <?php the_content(); ?>
               </div>
               </div>
            </div>
         <?php endwhile; ?>
         </div>
     <?php rewind_posts();

	include('inc/essays.php');

      query_posts('category_name=essays');
         while (have_posts()) : the_post();  ?>
            <div class="section-wrap essays" id="<?php the_author_meta(last_name); ?>">
               <div class="section">
               <div class="essay-meta">
               <h2 class="ital"><?php the_title(); ?></h2>
               <h3><?php the_author(); ?></h3>
               </div>
               <div class="essay-content">
               <?php the_content(); ?>
               </div>
               </div>
            </div>
         <?php endwhile;
      rewind_posts(); 

	  include('inc/events.php');

      query_posts('category_name=events');
         while (have_posts()) : the_post();  ?>
            <div class="section-wrap events">
               <div class="section events">
               <h2 class="ital"><?php the_title(); ?></h2>
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

	include('inc/blog.php');

      query_posts('category_name=blog');
         while (have_posts()) : the_post();  ?>
            <div class="section-wrap" id>
               <div class="section">
               <?php the_content(); ?>
               </div>
            </div>
         <?php endwhile;


get_footer(); ?>