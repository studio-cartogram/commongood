
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php bloginfo( 'name' ); ?></title>
	<meta name="description" content="A Canadian Directing Collective.">
	<meta name="viewport" content="width=device-width">
	<meta property="og:locale" content="en_US">
	<meta property="fb:app_id" content="729898417042523" />
	<meta property="og:site_name" content="Common Good" />
	<meta property="og:title" content="Common Good" />
	<meta property="og:url" content="http://www.commongood.tv/" />
	<link rel="canonical" href="http://www.commongood.tv/" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="A Canadian Directing Collective." />
	<meta property="og:image" content="http://www.commongood.tv/app/uploads/2014/02/logo-wide.png" />
	<meta property="og:image" content="http://www.commongood.tv/app/uploads/2014/02/logo-wide.png" />
	<?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'thumbnail'); ?>
    <?php if ($fb_image) : ?>
    	<meta property="og:image" content="<?php echo $fb_image[0]; ?>" />
    <?php endif; ?>
	<meta itemprop="image" content="http://www.commongood.tv/app/uploads/2014/02/logo-wide.png" />

	<link rel="shortcut icon" href="/favicon.ico">
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
