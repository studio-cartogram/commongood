<?php
/*
Template Name: Footer
*/




echo '<div id="footer" role="contentinfo" class="row row--dashed ">';
	echo '<div class="grid soft--top">';
		echo '<div class="grid__item nine-tenths palm-one-half">';
			echo '<ul class="nav milli">';
				echo '<li class="soft--right text--medium ">' . '837 Dundas Street West'  .  '</li>';
				echo '<li class="soft--right text--medium ">' . 'Toronto, ON M6J 1V4' . '</li>';
				echo '<li class="soft--right text--medium ">' . '+1 416 366 2552' . '</li>';
			echo '</ul>';
		echo '</div>';
		echo '<div class="grid__item float--right one-tenth">';
			echo '<span class="site-title--small"><a href="'  . get_bloginfo('url') . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></span>';
		echo '</div>';
	echo '</div>';
echo '</div>';

