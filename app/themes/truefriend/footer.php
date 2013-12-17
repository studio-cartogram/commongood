<?php

/*
Template Name: Footer
*/

/*
Get the Tags if we are on the blog, post or tag pages
*/
if (is_home() || is_tag()) {
	get_footer('tags');
}
/*
Get the Tags if we are on the blog, post or tag pages
*/



$navProduct = array(
	'theme_location'  => 'product',
	'container'       => false,
	'menu_class'      => 'nav milli  nav--stacked',
	'fallback_cb'     => false
);
$navSupport = array(
	'theme_location'  => 'support',
	'container'       => false,
	'menu_class'      => 'nav milli  nav--stacked' ,
	'fallback_cb'     => false
);
$navResources = array(
	'theme_location'  => 'resources',
	'container'       => false,
	'menu_class'      => 'nav milli nav--stacked',
	'fallback_cb'     => false
);

$navAbout = array(
	'theme_location'  => 'about',
	'container'       => false,
	'menu_class'      => 'nav milli nav--stacked ',
	'fallback_cb'     => false
);

$navSocial = array(
	'theme_location'  => 'social',
	'container'       => false,
	'menu_class'      => 'nav milli nav--stacked',
	'fallback_cb'     => false
);
$navApps = array(
	'theme_location'  => 'apps',
	'container'       => false,
	'menu_class'      => 'nav milli nav--stacked',
	'fallback_cb'     => false
);

global $phoneTollFree;
global $phoneInternational;
global $hours;
global $email;
global $twitter;
global $addressLine1;
global $addressLine2;
global $city;
global $province;
global $postalCode;

$form = get_field('newsletter_form', 'option');

if ($form) {
	echo '<section class="newsletter islet">';
		gravity_form($form->id, true, true, false, '', true, 1);
	echo '</section>';
}
echo '<footer class="footer soft--sides ">';
	echo '<div class="row ">';
		echo '<div class="grid grid--full">';
			echo '<div class="grid__item boxed boxed--outer boxed--off-right soft-half-double--top soft-half-double--bottom two-twelfths palm-three-quarters">';
				echo '<h3 class="flush--bottom">' . 'Get in touch' . '</h3>';
				echo '<address class="address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
					echo '<ul class="nav nav--stacked milli">';
						echo '<li class="soft-half--top">';
							echo '<a href="mailto:' . $email . '" itemprop="email">' . $email . '</a>';
						echo '</li>';
				      	echo '<li class="soft-half--top">';
				      		echo '<span class="block-level" itemprop="streetAddress">' . $addressLine1 . '</span> <span itemprop="addressLocality">' . $addressLine2 . ', ' . $city . ' ' . $prvince . ' </span><span itemprop="postalCode">' . $postalCode . '</span></span>'; 
				 		echo '</li>';
				 		echo '<li class="soft-half--top">';
				 			echo '<span class="block-level"><span class="address__label">Toll Free</span> <span itemprop="telephone">' . $phoneTollFree . '</span></span>';
				   			echo '<span class="block-level"><span class="address__label">International</span> <span itemprop="telephone">' . $phoneInternational . '</span></span>';
				   		echo '<li>';
			   		echo '</ul>';
			   	echo '</address>';
			echo '</div>';
			echo '<div class="grid__item soft-half-double--top soft-half-double--bottom text--center boxed boxed--inner two-twelfths palm-one-quarter">';
				echo '<h5>Social</h5>';
				wp_nav_menu( $navSocial );
			echo '</div>';
			echo '<div class="grid__item two-thirds palm-one-whole">';
				echo '<div class="grid">';
					echo '<div class="grid__item soft-half-double--top soft-half-double--bottom  one-quarter palm-one-half ">';
						echo '<h5>Company</h5>';
						wp_nav_menu( $navAbout );
					echo '</div>';
					echo '<div class="grid__item soft-half-double--top soft-half-double--bottom  one-quarter palm-one-half ">';
						echo '<h5>Thermostats</h5>';
						wp_nav_menu( $navProduct );
					echo '</div>';
					echo '<div class="grid__item soft-half-double--top soft-half-double--bottom  one-quarter palm-one-half ">';
						echo '<h5>Support</h5>';
						wp_nav_menu( $navSupport );
					echo '</div>';
					echo '<div class="grid__item soft-half-double--top soft-half-double--bottom  one-quarter palm-one-half">';
						echo '<h5>Resources</h5>';
						wp_nav_menu( $navResources );
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';		
	echo '</div>';

echo '</footer>';
echo '<p class="soft--top relative flush--bottom soft--bottom  background--grey-dark milli text--grey text--center"><span >&copy; copyright ' . Date(Y) . ' ' . get_bloginfo(name) . '.</span> All rights reserved.</p>';

