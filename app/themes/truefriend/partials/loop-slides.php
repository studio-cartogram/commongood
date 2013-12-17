<?php 
 
$rows = get_field('slides');
if($rows)
{
echo '<div class="row relative soft--top flex-container">';
	echo '<div class="flexslider js-slideshow">';
		echo '<ul class="slides">';
	 
		foreach($rows as $row)
		{
			echo '<li>';
				echo '<a class="slide__link" href="' . $row['link'] . '" >';
					
					$attachment_id = $row['image'];
					$size = "slideshow_medium"; // (thumbnail, medium, large, full or custom size)
					echo wp_get_attachment_image( $attachment_id, $size );

					echo '<h1 class="slide__text slide__title">' . $row['title'] . '</h1>';
					echo '<h2 class="slide__text slide__subtitle">' . $row['sub_title'] . '</h2>';
				echo '</a>';	
			echo  '</li>';
		}
	 
		echo '</ul>';
	echo '</div>';
echo '</div>';
}