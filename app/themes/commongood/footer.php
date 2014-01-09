<?php
/*
Template Name: Footer
*/




echo '<div id="footer" role="contentinfo" class="row row--dashed ">';
	echo '<div class="grid soft--top">';
		echo '<div class="grid__item nine-tenths">';
			echo '<ul class="nav milli">';
				if (is_page('contact')) { 
					echo '<li class="site-title site-title-left"> <a href="' . get_bloginfo('url') . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></li>'; 
				} else { 
			    	echo '<li class="soft--right text--medium ">' . '837 Dundas Street West'  .  '</li>';
			    	echo '<li class="soft--right text--medium ">' . 'Toronto, ON M6J 1V4' . '</li>';
			    	echo '<li class="soft--right text--medium ">' . '+1 416 366 2552' . '</li>';
			    }
			echo '</ul>';
		echo '</div>';
		echo '<div class="grid__item one-tenth">';
			echo '<span class="site-title--small"><a href="'  . get_bloginfo('url') . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></span>';
		echo '</div>';
		echo '<div class="grid__item visuallyhidden one-half">';
			echo '<ul class="nav">';
				echo '<li><a href="http://validator.w3.org/check?uri=referer">XHTML</a></li>';
				echo '<li><a href="http://jigsaw.w3.org/css-validator/validator?uri=' . get_bloginfo( 'stylesheet_url' ) . '">CSS</a></li>';
			echo '</ul>';
		echo '</div>';
	echo '</div>';
echo '</div>';

