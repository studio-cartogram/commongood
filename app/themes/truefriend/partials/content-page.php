<?php
	if (have_posts()) :
		while (have_posts()) : the_post(); 
			$brief = get_field('brief');
			$location = get_field('location');
			echo'<div class="grid__item  four-fifths">';
				echo '<div class="js-scrollbar scrollable">';
					the_content();
				echo '</div>';
			echo '</div>';
		endwhile;	
	endif; 
?>
