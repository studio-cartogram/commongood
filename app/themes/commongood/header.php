<?php
/*
Template Name: Header
*/


$navGlobal = array(
	'theme_location'  => 'primary',
	'container' => false,
	'menu_class' => 'nav nav--global',
	'fallback_cb'     => false
);

echo '<div class="row row--dashed row--dashed--bottom header push-half--bottom">';
	echo '<div class="grid">';
		echo '<h1 class="site-title"><a href="' . get_bloginfo( 'url' ) . '" title="'  . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
		echo '<div class="grid__item  one-whole">';
			//wp_nav_menu( $navGlobal );
			echo '<ul class="nav nav--global">';
				echo '<li><a ui-sref="videos">Work</a></li>';
				echo '<li><a ui-sref="studio">Studio</a></li>';
				echo '<li><a ui-sref="contact">Contact</a></li>';
		echo '</div>';	
	echo '</div>';
echo '</div>';

