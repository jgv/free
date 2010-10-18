      	<div class="section-wrap" id="artists"> <!-- begin events -->
			<div class="section">
				<h1 class="section-title">Artists</h1>
                                <?php query_posts('category_name=artists'); ?>
                                <ul>
                                <?php while (have_posts()) : the_post();  ?>
                                <?php $slug = strtolower(str_replace(' ','', trim(get_the_title($post->ID)))); ?>
                                <li><a href="#<?php echo $slug; ?>">
                                <?php the_title(); ?></a></li>
                                <?php endwhile; ?>
                                </ul>
			</div>
		</div>