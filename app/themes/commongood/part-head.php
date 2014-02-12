
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php bloginfo( 'name' ); ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<meta property="og:title" content="Common Good">
	<meta property="og:locale" content="en_CA">
	<link rel="shortcut icon" href="/favicon.ico">
	<meta property="og:url" content="<?php the_permalink() ?>"/>
	<meta property="og:image" content="<img ng-src="{{video.featured_image.attachment_meta.sizes.medium.url}}" />" /> 
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />  
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />  
	<meta property="og:type" content="website" /> 
	<?php wp_head(); ?>
</head>
<body <?php body_class('loading main'); ?> ng-app="ngCommongoodApp">
	<!--[if lt IE 7]>
		<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

	<!--[if lt IE 9]>
		<script src="bower_components/es5-shim/es5-shim.js"></script>
		<script src="bower_components/json3/lib/json3.min.js"></script>
	<![endif]-->

	
	<a id="play"></a>
