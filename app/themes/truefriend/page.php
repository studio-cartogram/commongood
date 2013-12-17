<?php

/*
Template Name: Page
*/
get_template_part('part-head');
get_header();


echo '<div class="js-site site">';
	if (have_posts()) :
		while (have_posts()) : the_post();
			

		endwhile; // endwhile have posts
	else :
		get_template_part('part-not-found');
	endif;
echo '</div>';


get_footer();
get_template_part('part-foot');
?>