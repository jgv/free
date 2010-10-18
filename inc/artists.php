      	<div class="section-wrap" id="artists"> <!-- begin events -->
			<div class="section">
				<h1 class="section-title">Artists</h1>
                                <?php $num_artists = 22; ?>
                                <?php $counter = 0; ?>
                                <?php query_posts('category_name=artists'); ?>
                                <ul id="artists-list">
                                  <?php while (have_posts()) : the_post();  ?>
                                  <?php $counter++ ?>
                                  <?php if ($counter < $num_artists){ ?>
                                  <?php $slug = strtolower(str_replace(' ','', trim(get_the_title($post->ID)))); ?>
                                  <li><a href="#<?php echo $slug; ?>">
                                  <?php the_title(); ?></a>,</li>
                                  <?php } else { ?>
                                  <?php $slug = strtolower(str_replace(' ','', trim(get_the_title($post->ID)))); ?>
                                  <li><a href="#<?php echo $slug; ?>">
                                  <?php the_title(); ?></a></li>
                                  <?php } ?>
                                  <?php endwhile; ?>
                                </ul>
			</div>
		</div>