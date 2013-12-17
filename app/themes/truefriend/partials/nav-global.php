<?php
$navGlobal = array(
	'theme_location'  => 'main',
	'container'       => false,
	'menu_class'      => 'nav nav--stacked nav--global',
);
echo '<div class="grid__item   one-fifth ">';
	wp_nav_menu( $navGlobal );
echo '</div>'; ?>