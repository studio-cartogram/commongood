<?php 

$navPrimary = array(
	'theme_location'  => 'primary',
	'container'       => false,
	'menu_class'      => 'nav',
	'items_wrap'	  => '%3$s',
	'fallback_cb'     => false
);
echo '<section class="nav--fixed  js-nav-fixed">';
	echo '<ul class="nav--global row">';
		echo '<li class="float--left"><a class="hard--left logo" href="' . get_bloginfo('url') . '"><i class="logo__mark icon-bee"></i> <i class="logo__text icon-word"><span class="visuallyhidden">'. get_bloginfo('name') . '</span></i></a></li>';		
		echo '<li><a class="js-menu-trigger nav__trigger"><span class="visuallyhidden--palm">Menu</span><i class="nav__trigger__icon"></i></a></li>';
		wp_nav_menu( $navPrimary );
	echo '</ul>';
echo '</section>';
?>