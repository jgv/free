			<div class="section-wrap" id="events"> <!-- begin events -->
				<div class="section">
				<h1 class="section-title">Events</h1>
					<ul id="events-list">
					<?php
					      query_posts('category_name=events');
					         while (have_posts()) : the_post();  ?>
			              <li> 
			              <h4><?php the_title(); ?></h4>
			               &ndash; 
			              <i><?php echo get_post_meta( $post->ID, 'event_date', true ); ?></i>
			               &ndash; 
			              <?php echo get_post_meta( $post->ID, 'event_time', true ); ?>
			              </li>
			        <?php endwhile;
    				  rewind_posts(); ?>
					</ul>
				</div>
			</div>