<?php
	/* ========================================================================================================================

	Required external files

	======================================================================================================================== */

	require_once( get_template_directory() . '/lib/admin.php' );
	require_once( get_template_directory() . '/lib/media.php' );
	require_once( get_template_directory() . '/lib/navigation.php' );
	require_once( get_template_directory() . '/lib/utilities.php' );


	/* ========================================================================================================================

	Call Everthing!

	======================================================================================================================== */

	/**
	 * Scripts
	 *
	 **/
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wp_shortlink_wp_head');
  add_action('widgets_init', 'my_remove_recent_comments_style');
  add_filter('script_loader_src', 'cartogram_remove_script_version', 15, 1);
  add_filter('style_loader_src', 'cartogram_remove_script_version', 15, 1);
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('wp_print_styles', 'print_emoji_styles');


	/**
	 * Content
	 *
	 **/
	add_filter('the_excerpt', 'excerpt_ellipsis');
	add_filter('the_content', 'cartogram_remove_more_link');

    /**
		 * Shortcodes
		 *
		 **/
		add_shortcode('button', 'cartogram_button');
		add_shortcode('flex-video', 'cartogram_flexVideo');
		add_shortcode('slideshow', 'cartogram_slideshow');

		/**
		 * Other
		 *
		 **/
		remove_filter('term_description','wpautop');

	/**
	 * Admin
	 *
	 **/
	add_filter('tiny_mce_before_init', 'cartogram_unhide_kitchensink' );
	add_action('wp_dashboard_setup', 'cartogram_remove_dashboard_widgets' );
	add_filter('custom_menu_order', 'cartogram_custom_menu_order');
	add_filter('menu_order', 'cartogram_custom_menu_order');
	add_action('admin_menu', 'cartogram_remove_menu_pages' );
  show_admin_bar( false );

  function my_deregister_scripts(){
    wp_deregister_script( 'wp-embed' );
  }
  add_action( 'wp_footer', 'my_deregister_scripts' );
?>
