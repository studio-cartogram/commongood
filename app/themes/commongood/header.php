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
			echo '<ul class="nav nav--global">';?>
				<li><a ui-sref="videos" ng-class="{ active: $state.includes('videos') }">Work</a></li>
				<li><a ui-sref="studio" ng-class="{ active: $state.includes('studio') }">Studio</a></li>
				<li><a ui-sref="contact" ng-class="{ active: $state.includes('contact') }">Contact</a></li>
		<?php echo '</div>';	
	echo '</div>';
echo '</div>';

