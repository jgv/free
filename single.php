<?php 
	get_header();
	include('sidebar-single.php'); 	
?>

            <div class="section-wrap">
               <div class="section blog">
               <?php while (have_posts()) : the_post();  ?>
               <?php the_title('<h2 class="ital">', '</h2>'); ?>
               <?php the_post_thumbnail(); ?>
               <?php the_content(); ?>
               <h3 id="tags">Tags</h3>
               <ul id="tag-list">
               <?php
               $last_tag = end(get_tags());
			   foreach(get_tags() as $tag){
			   			if ($tag == $last_tag) { 
			   		 	echo '<li>' . $tag->name . '</li>';
						} else {
							echo '<li>' . $tag->name . ',</li>';
						}
			   		 }
			   		 unset($tag);
			   ?> 
			   </ul>
               <?php endwhile; ?>

               </div>
            </div>
         
         
<?php get_footer(); ?>