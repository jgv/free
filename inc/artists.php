      	<div class="section-wrap" id="artists"> <!-- begin events -->
			<div class="section">
				<h1 class="section-title">Artists</h1>
				<p id="artist-desc">Artist texts were written by Brian Droitcour, Jacob Gaboury, Ceci Moss and Lauren Cornell. Writers are noted on individual texts.</p>
								<?php $artist_array = array(); ?>
                                <?php $num_artists = 22; ?>
                                <?php $counter = 0; ?>
                                <?php query_posts('category_name=artists&orderby=menu_order'); ?>
                                <ul id="artists-list">
                                  <?php while (have_posts()) : the_post();  ?>
                                  <?php $counter++ ?>
                                  <?php if (!in_array(get_the_title(), $artist_array)){ ?>
                                  <?php $artist_array[] = get_the_title(); ?>
                                  <?php if ($counter < $num_artists){ ?>
                                  <?php $slug = strtolower(str_replace(' ','', trim(get_the_title($post->ID)))); ?>
                                  <li><a href="#<?php echo $slug; ?>">
                                  <?php the_title(); ?></a>,</li>
                                  <?php } else { ?>
                                  <?php $slug = strtolower(str_replace(' ','', trim(get_the_title($post->ID)))); ?>
                                  <li><a href="#<?php echo $slug; ?>">
                                  <?php the_title(); ?></a></li>
                                  <?php } ?>
                                  <?php } ?>
                                  <?php endwhile; ?>
                                </ul>
			</div>
		</div>