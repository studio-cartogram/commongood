<?php
	if (have_posts()) :
		while (have_posts()) : the_post();
			$brief = get_field('brief');
			echo '<div class="row row">';
				echo '<div class="grid">';
					echo '<div class="grid__item one-whole ">';
						echo '<figure class="project__banner">';
							echo '<a href="' . get_permalink() . '">';
								the_post_thumbnail('project_banner');
								the_title('<h1 class="figcaption text-white">','</h1>');
							echo '</a>';	
						echo '</figure>';
						if($brief) {
						echo '<h3 class="soft--top text-grey">"' . $brief . '"</h3>';
						}
				    echo '</div>';  
				echo '</div>';
			echo '</div>';
		endwhile;	
	endif; 
?>