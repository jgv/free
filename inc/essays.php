			<div class="section-wrap" id="essays"> <!-- begin events -->
				<div class="section">
				<h1 class="section-title">Essays</h1>
				<div><p>The .hover() method, when passed a single function, will execute that handler for both mouseenter and mouseleave  events. This allows the user to use jQuery's various toggle methods within the handler.</p></div>
				<h3 id="essays-list-title">Essays</h3>
				<ul id="authors-list">
                                <?php /*query_posts('category_name=essays'); ?>
                                <?php while (have_posts()) : the_post(); */ ?>
                                <?php jgv_list_authors('show_fullname=1&hide_empty=0'); ?>
				<?php /*endwhile;*/ ?>
                                </ul>
				</div>
			</div>