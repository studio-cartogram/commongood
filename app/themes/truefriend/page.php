<?php

/*
Template Name: About
*/

get_template_part('partials/head');
get_header();

global $title;
global $sub_title;
global $bannerImageSize;

echo '<div class="js-site site">';
	if (have_posts()) :
		while (have_posts()) : the_post();
			$slug = $post->post_name;
			$title = get_the_title();
			$sub_title = get_field("sub_title");
			
			get_template_part('part-mast', $slug);
			get_template_part('part-islands');

		endwhile; // endwhile have posts
	else :
		get_template_part('part-not-found');
	endif;
get_footer();
echo '</div>';
get_template_part('part-drawer');
get_template_part('partials/foot');
?>