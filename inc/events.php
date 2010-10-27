			<div class="section-wrap" id="events"> <!-- begin events -->
				<div class="section events-section">
				<h1 class="section-title">Events</h1>
					<ul id="events-list">
					<?php
					      query_posts('category_name=events&orderby=menu_order');
					         while (have_posts()) : the_post();  ?>
			              <li> 
			              <?php if (get_post_meta( $post->ID, 'event_title_short', true ) == NULL ) { ?>
			              <h4><a href="#<?php echo strtolower(str_replace(' ','', trim(get_the_title($post))));?>"><?php the_title(); ?></a></h4>
			              <?php } else { ?>
			              <h4><a href="#<?php echo strtolower(str_replace(' ','', trim(get_the_title($post))));?>"><?php echo get_post_meta( $post->ID, 'event_title_short', true); ?></a></h4>	
			              <?php } ?>
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