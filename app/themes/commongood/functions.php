<?php
	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( get_stylesheet_directory() . '/lib/admin.php' );
	require_once( get_stylesheet_directory() . '/lib/custom_post_types_taxonomies.php' );
	require_once( get_stylesheet_directory() . '/lib/media.php' );
	require_once( get_stylesheet_directory() . '/lib/navigation.php' );
	require_once( get_stylesheet_directory() . '/lib/utilities.php' );
	require_once( get_stylesheet_directory() . '/lib/gravity_forms.php' );
	require_once( get_stylesheet_directory() . '/lib/comments.php' );
	// require_once( get_stylesheet_directory() . '/lib/init.php' );
	// require_once( get_stylesheet_directory() . '/lib/theme-helpers.php' );
	// require_once( get_stylesheet_directory() . '/lib/theme-functions.php' );
	// require_once( get_stylesheet_directory() . '/lib/theme-comments.php' );


	/* ========================================================================================================================
	
	Navigation Menus
	
	======================================================================================================================== */

	register_nav_menus( array(
		'primary' => 'Primay Navigation Menu'
	) );

	/* ========================================================================================================================
	
	Define Widgetized Areas
	
	======================================================================================================================== */

	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'description' => __('This is the default widget area for the sidebar. This will be displayed if the other sidebars have not been populated with widgets.', 'cartogram'),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));


	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 */
	function cartogram_scripts() {
    	wp_deregister_script( 'jquery' );
		wp_register_script(   'jquery'
		    , '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, false);

		wp_enqueue_script('jquery');

		wp_register_script( 'modernizr', get_template_directory_uri().'/dist/scripts/modernizr.cartogram.js', NULL , NULL, NULL );
		wp_enqueue_script( 'modernizr' );

		wp_register_script( 'app', get_template_directory_uri().'/dist/scripts/cartogram.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'app' );
		
		wp_register_style( 'screen', get_template_directory_uri().'/dist/styles/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );

	}	
	

	/* ========================================================================================================================
	
	Images

	- Set thumbnail sizes and add any additional featured images.
	
	======================================================================================================================== */
	/*

	*/

	add_theme_support('post-thumbnails');
	
	add_image_size('img-medium',500, 500, true);
	add_image_size('img-small',350, 200, true);
	add_image_size('img-featured',2000, 500, true);
	add_image_size('img-featured-small',800, 500, false);
	add_image_size('img-profile-small',100, 100, true);

	add_image_size('img-mast',2000, 400, true);
	add_image_size('img-banner',1000, 600, true);

	

	
	/* ========================================================================================================================
	
	Call Everthing!

	- Put all Hooks (actions/filters/etc) in one place.
	
	======================================================================================================================== */

	/**
	 * Scripts
	 *
	 **/
	add_action( 'wp_enqueue_scripts', 'cartogram_scripts' );
	// Clean up the head
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head');
	// Remove Query Strings From Static Resources
	add_filter('script_loader_src', 'landing_remove_script_version', 15, 1);
	add_filter('style_loader_src', 'landing_remove_script_version', 15, 1);


	/**
	 * Post types and taxonomies
	 *
	 **/
	add_action( 'init', 'create_post_types' );
	add_action( 'init', 'create_taxonomies' );
	
	/**
	 * Classes
	 *
	 **/
	add_filter( 'body_class', 'add_slug_to_body_class' );

	/**
	 * Content
	 *
	 **/
	add_filter('the_excerpt', 'excerpt_ellipsis');
	add_filter('the_content', 'cartogram_remove_more_link');
	add_action('the_content', 'add_video_containers');
	add_filter('image_send_to_editor', 'landing_imagewrap_send_to_editor', 10, 8);

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
	 * Theme Parts
	 *
	 **/
	
	/**
	 * Admin
	 *
	 **/
	add_filter( 'tiny_mce_before_init', 'landing_unhide_kitchensink' );
	add_action('wp_dashboard_setup', 'landing_remove_dashboard_widgets' );
	add_filter('custom_menu_order', 'landing_custom_menu_order');
	add_filter('menu_order', 'landing_custom_menu_order');
	add_action( 'admin_menu', 'landing_remove_menu_pages' );

	/**
	 * Require Plugins
	 *
	 **/

	// require_once( get_template_directory() . '/lib/class-tgm-plugin-activation.php' );
	// require_once( get_template_directory() . '/lib/theme-require-plugins.php' );

	//add_action( 'tgmpa_register', 'mb_register_required_plugins' );

	/**
	 * Gravity Forms
	 *
	 **/
	// add_filter("gform_submit_button", "form_submit_button", 10, 2);
	// add_filter('gform_pre_render', 'cartogram_pre_render_script');
	// add_filter( 'gform_ajax_spinner_url', 'cartogram_custom_gforms_spinner' );
	
	
	/**
	 * Comments
	 *
	 **/


	/* ========================================================================================================================
	
	Advanced Custom Fields
	
	======================================================================================================================== 
*/
// include_once('advanced-custom-fields/acf.php' );
//
// include_once('advanced-custom-fields/acf.php' );
// include_once('add-ons/acf-repeater/acf-repeater.php');
// include_once('add-ons/acf-flexible-content/acf-flexible-content.php');
// include_once('add-ons/acf-options-page/acf-options-page.php' );
// include_once('add-ons/acf-gravity-forms/acf-gravity_forms.php');
// include_once('add-ons/acf-location-field/acf-location.php');
?>
