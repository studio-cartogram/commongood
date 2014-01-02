<?php
/*
Template Name: Header
*/


$navGlobal = array(
	'theme_location'  => 'primary',
	'container_class' => 'menu-header',
	'fallback_cb'     => false
);

echo '<div id="header" class="wrap">';
	echo '<div id="masthead" class="wrap-inner">';
		wp_nav_menu( $navGlobal );
		echo '<h1 class="site-title"><a href="' . get_bloginfo( 'url' ) . '" title="'  . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
	echo '</div>';
echo '</div>';