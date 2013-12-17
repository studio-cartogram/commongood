<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="stylesheet" type="text/css" 
		href="//cloud.typography.com/6842452/670902/css/fonts.css" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class('loading main'); ?> id="main">
<?php
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
	global $mastImageSize;
	global $bannerImageSize;
	
	$mastImageSize = 'img-mast';
	$bannerImageSize = 'img-featured';

	$email = get_field('email', 'option');

	$phoneTollFree = get_field('phone_toll_free', 'option');
	$phoneInternational = get_field('phone_international', 'option');

	$addressLine1 = get_field('address_line_1', 'option');
	$addressLine2 = get_field('address_line_2', 'option');

	$city = get_field('city', 'option');
	$province = get_field('province', 'option');
	$postalCode = get_field('postal_code', 'option');

	$hours = get_field('hours', 'option');
	$twitter = get_field('twitter', 'option');
?>