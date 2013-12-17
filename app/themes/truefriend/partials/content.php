<?php
	if (have_posts()) :
		while (have_posts()) : the_post(); 
			$brief = get_field('brief');
			$location = get_field('location');
			echo'<div class="grid__item  four-fifths">';
				echo '<div class="js-scrollbar scrollable">';
					the_title('<p class="flush--bottom"><strong>Project: "', '"</strong></p>');
					if($brief) {
						echo '<p class="flush--bottom"><em>Brief: ' . $brief . '</em></p>';
					}
					if ($location) {
						echo '<p class="flush--bottom"><em>Location: ' . $location . '</em></p>';
					}
					if (get_the_content()) {
						echo '<p class="flush--bottom">Product:</p>';
					}
					the_content();
				echo '</div>';
			echo '</div>';
		endwhile;	
	endif; 
?>
