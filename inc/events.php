			<div class="section-wrap" id="events"> <!-- begin events -->
				<div class="section">
				<h1 class="section-title">Events</h1>
					<ul id="events-list">
					<?php
					      query_posts('category_name=events');
					         while (have_posts()) : the_post();  ?>
			              <li> 
			              <h4><a href="#<?php echo strtolower(str_replace(' ','', trim(get_the_title($post))));?>"><?php the_title(); ?></a></h4>
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