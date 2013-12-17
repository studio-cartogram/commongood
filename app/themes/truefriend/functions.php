<?php
	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( get_template_directory() . '/lib/admin.php' );
	require_once( get_template_directory() . '/lib/custom_post_types_taxonomies.php' );
	require_once( get_template_directory() . '/lib/media.php' );
	require_once( get_template_directory() . '/lib/navigation.php' );
	require_once( get_template_directory() . '/lib/utilities.php' );
	require_once( get_template_directory() . '/lib/gravity_forms.php' );
	require_once( get_template_directory() . '/lib/comments.php' );
	// require_once( get_template_directory() . '/lib/init.php' );
	// require_once( get_template_directory() . '/lib/theme-helpers.php' );
	// require_once( get_template_directory() . '/lib/theme-functions.php' );
	// require_once( get_template_directory() . '/lib/theme-comments.php' );


	/* ========================================================================================================================
	
	Navigation Menus
	
	======================================================================================================================== */

	register_nav_menus( array(
		'support' => 'Support Navigation Menu',
		'resources' => 'Resources Navigation Menu',
		'about' => 'About Navigation Menu',
		'product' => 'Product Navigation Menu',
		'social' => 'Social Navigation Menu',
		'primary' => 'Primary Navigation Menu',
		'commercial' => 'Commercial Navigation Menu',
		'apps' => 'App Store Links'
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

		wp_register_script( 'modernizr', get_template_directory_uri().'/scripts/modernizr.cartogram.js', NULL , NULL, NULL );
		wp_enqueue_script( 'modernizr' );

		wp_register_script( 'app', get_template_directory_uri().'/scripts/cartogram.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'app' );
		
		wp_register_style( 'screen', get_template_directory_uri().'/style.css', '', '', 'screen' );
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
include_once('advanced-custom-fields/acf.php' );

include_once('advanced-custom-fields/acf.php' );
include_once('add-ons/acf-repeater/acf-repeater.php');
include_once('add-ons/acf-flexible-content/acf-flexible-content.php');
include_once('add-ons/acf-options-page/acf-options-page.php' );
include_once('add-ons/acf-gravity-forms/acf-gravity_forms.php');
include_once('add-ons/acf-location-field/acf-location.php');

// if(function_exists("register_field_group"))
// {
// 	register_field_group(array (
// 		'id' => 'acf_author-meta',
// 		'title' => 'Author Meta',
// 		'fields' => array (
// 			array (
// 				'key' => 'field_5281c16a05465',
// 				'label' => __('Google Plus'),
// 				'name' => 'google_plus',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 		),
// 		'location' => array (
// 			array (
// 				array (
// 					'param' => 'ef_user',
// 					'operator' => '==',
// 					'value' => 'all',
// 					'order_no' => 0,
// 					'group_no' => 0,
// 				),
// 			),
// 		),
// 		'options' => array (
// 			'position' => 'normal',
// 			'layout' => 'no_box',
// 			'hide_on_screen' => array (
// 			),
// 		),
// 		'menu_order' => 0,
// 	));
// 	register_field_group(array (
// 		'id' => 'acf_contact-information',
// 		'title' => 'Contact Information',
// 		'fields' => array (
// 			array (
// 				'key' => 'field_529e9f8afde62',
// 				'label' => __('email'),
// 				'name' => 'email',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 			array (
// 				'key' => 'field_529e9f91fde63',
// 				'label' => __('Phone Toll Free'),
// 				'name' => 'phone_toll_free',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 			array (
// 				'key' => 'field_529e9fb7fde64',
// 				'label' => __('Phone International'),
// 				'name' => 'phone_international',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 			array (
// 				'key' => 'field_529e9fc7fde65',
// 				'label' => __('Address Line 1'),
// 				'name' => 'address_line_1',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 			array (
// 				'key' => 'field_529e9fdafde66',
// 				'label' => __('Address Line 2'),
// 				'name' => 'address_line_2',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 			array (
// 				'key' => 'field_529e9fe1fde67',
// 				'label' => __('City'),
// 				'name' => 'city',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 			array (
// 				'key' => 'field_529e9fe7fde68',
// 				'label' => __('Province'),
// 				'name' => 'province',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 			array (
// 				'key' => 'field_529e9fecfde69',
// 				'label' => __('Postal Code'),
// 				'name' => 'postal_code',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 			array (
// 				'key' => 'field_529fcd8581ba7',
// 				'label' => __('hours'),
// 				'name' => 'hours',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 			array (
// 				'key' => 'field_529ebaf11c29e',
// 				'label' => __('Newsletter Form'),
// 				'name' => 'newsletter_form',
// 				'type' => 'gravity_forms_field',
// 				'allow_null' => 0,
// 				'multiple' => 0,
// 			),
// 			array (
// 				'key' => 'field_529fb82a6cf06',
// 				'label' => __('Contact form'),
// 				'name' => 'contact_form',
// 				'type' => 'gravity_forms_field',
// 				'allow_null' => 0,
// 				'multiple' => 0,
// 			),
// 			array (
// 				'key' => 'field_529fcda90d0d2',
// 				'label' => __('twitter'),
// 				'name' => 'twitter',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 		),
// 		'location' => array (
// 			array (
// 				array (
// 					'param' => 'options_page',
// 					'operator' => '==',
// 					'value' => 'acf-options',
// 					'order_no' => 0,
// 					'group_no' => 0,
// 				),
// 			),
// 		),
// 		'options' => array (
// 			'position' => 'normal',
// 			'layout' => 'no_box',
// 			'hide_on_screen' => array (
// 			),
// 		),
// 		'menu_order' => 0,
// 	));
// 	register_field_group(array (
// 		'id' => 'acf_islands',
// 		'title' => 'Islands',
// 		'fields' => array (
// 			array (
// 				'key' => 'field_527d80324c4ea',
// 				'label' => __('Islands'),
// 				'name' => 'islands',
// 				'type' => 'flexible_content',
// 				'layouts' => array (
// 					array (
// 						'label' => __('Banner'),
// 						'name' => 'banner',
// 						'display' => 'row',
// 						'min' => '',
// 						'max' => '',
// 						'sub_fields' => array (
// 							array (
// 								'key' => 'field_527d805c4c4eb',
// 								'label' => __('Heading'),
// 								'name' => 'heading',
// 								'type' => 'text',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'prepend' => '',
// 								'append' => '',
// 								'formatting' => 'html',
// 								'maxlength' => '',
// 							),
// 							array (
// 								'key' => 'field_527d807f4c4ec',
// 								'label' => __('Text'),
// 								'name' => 'text',
// 								'type' => 'textarea',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'maxlength' => '',
// 								'formatting' => 'br',
// 							),
// 							array (
// 								'key' => 'field_527d808a4c4ed',
// 								'label' => __('Image'),
// 								'name' => 'image',
// 								'type' => 'image',
// 								'column_width' => '',
// 								'save_format' => 'id',
// 								'preview_size' => 'thumbnail',
// 								'library' => 'all',
// 							),
// 							array (
// 								'key' => 'field_527d80a84c4ef',
// 								'label' => __('Orientation'),
// 								'name' => 'orientation',
// 								'type' => 'select',
// 								'required' => 1,
// 								'column_width' => '',
// 								'choices' => array (
// 									'left' => 'Left',
// 									'right' => 'Right',
// 									'center' => 'Center',
// 								),
// 								'default_value' => 'left : Left',
// 								'allow_null' => 0,
// 								'multiple' => 0,
// 							),
// 							array (
// 								'key' => 'field_5298ab4b6132e',
// 								'label' => __('Image Style'),
// 								'name' => 'image_style',
// 								'type' => 'select',
// 								'column_width' => '',
// 								'choices' => array (
// 									'inline' => 'Inline',
// 									'background' => 'Background',
// 								),
// 								'default_value' => 'inline : Inline',
// 								'allow_null' => 0,
// 								'multiple' => 0,
// 							),
// 							array (
// 								'key' => 'field_5298b919d7cb8',
// 								'label' => __('Buttons'),
// 								'name' => 'buttons',
// 								'type' => 'repeater',
// 								'column_width' => '',
// 								'sub_fields' => array (
// 									array (
// 										'key' => 'field_5298b932d7cb9',
// 										'label' => __('text'),
// 										'name' => 'text',
// 										'type' => 'text',
// 										'column_width' => '',
// 										'default_value' => '',
// 										'placeholder' => '',
// 										'prepend' => '',
// 										'append' => '',
// 										'formatting' => 'html',
// 										'maxlength' => '',
// 									),
// 									array (
// 										'key' => 'field_5298b942d7cba',
// 										'label' => __('style'),
// 										'name' => 'style',
// 										'type' => 'radio',
// 										'column_width' => '',
// 										'choices' => array (
// 											'primary' => 'Primary',
// 											'secondary' => 'Secondary',
// 											'tertiary' => 'Tertiary',
// 										),
// 										'other_choice' => 0,
// 										'save_other_choice' => 0,
// 										'default_value' => 'secondary',
// 										'layout' => 'vertical',
// 									),
// 									array (
// 										'key' => 'field_5298b970d7cbb',
// 										'label' => __('Size'),
// 										'name' => 'size',
// 										'type' => 'radio',
// 										'column_width' => '',
// 										'choices' => array (
// 											'small' => 'Small',
// 											'medium' => 'Medium',
// 											'large' => 'Large',
// 										),
// 										'other_choice' => 0,
// 										'save_other_choice' => 0,
// 										'default_value' => 'small',
// 										'layout' => 'vertical',
// 									),
// 									array (
// 										'key' => 'field_5298b9a1d7cbc',
// 										'label' => __('Link'),
// 										'name' => 'link',
// 										'type' => 'text',
// 										'column_width' => '',
// 										'default_value' => '',
// 										'placeholder' => '',
// 										'prepend' => '',
// 										'append' => '',
// 										'formatting' => 'html',
// 										'maxlength' => '',
// 									),
// 									array (
// 										'key' => 'field_5298ba0e3c197',
// 										'label' => __('Behavior'),
// 										'name' => 'behavior',
// 										'type' => 'checkbox',
// 										'column_width' => '',
// 										'choices' => array (
// 											'pop_up' => 'Open target pop up overlay',
// 											'new_window' => 'Open target in new window',
// 										),
// 										'default_value' => '',
// 										'layout' => 'vertical',
// 									),
// 								),
// 								'row_min' => '',
// 								'row_limit' => '',
// 								'layout' => 'row',
// 								'button_label' => 'Add Row',
// 							),
// 							array (
// 								'key' => 'field_5298d0c0e6310',
// 								'label' => __('Background Fill'),
// 								'name' => 'background_fill',
// 								'type' => 'select',
// 								'column_width' => '',
// 								'choices' => array (
// 									'white' => 'White',
// 									'green' => 'Green',
// 									'blue' => 'Blue',
// 									'steel' => 'Steel',
// 									'image' => 'Image',
// 								),
// 								'default_value' => 'white',
// 								'allow_null' => 0,
// 								'multiple' => 0,
// 							),
// 						),
// 					),
// 					array (
// 						'label' => __('Testimonial'),
// 						'name' => 'testimonial',
// 						'display' => 'row',
// 						'min' => '',
// 						'max' => '',
// 						'sub_fields' => array (
// 							array (
// 								'key' => 'field_527d8a1ad98d1',
// 								'label' => __('Testimonial'),
// 								'name' => 'testimonial',
// 								'type' => 'post_object',
// 								'column_width' => '',
// 								'post_type' => array (
// 									0 => 'testimonials',
// 								),
// 								'taxonomy' => array (
// 									0 => 'all',
// 								),
// 								'allow_null' => 0,
// 								'multiple' => 0,
// 							),
// 						),
// 					),
// 					array (
// 						'label' => __('Cover'),
// 						'name' => 'cover',
// 						'display' => 'row',
// 						'min' => '',
// 						'max' => '',
// 						'sub_fields' => array (
// 							array (
// 								'key' => 'field_527d9523316af',
// 								'label' => __('Heading'),
// 								'name' => 'heading',
// 								'type' => 'text',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'prepend' => '',
// 								'append' => '',
// 								'formatting' => 'html',
// 								'maxlength' => '',
// 							),
// 							array (
// 								'key' => 'field_527d9529316b0',
// 								'label' => __('Text'),
// 								'name' => 'text',
// 								'type' => 'textarea',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'maxlength' => '',
// 								'formatting' => 'br',
// 							),
// 							array (
// 								'key' => 'field_5281c4c19a914',
// 								'label' => __('Height'),
// 								'name' => 'height',
// 								'type' => 'radio',
// 								'column_width' => '',
// 								'choices' => array (
// 									'full' => 'Full',
// 									'half' => 'Half',
// 								),
// 								'other_choice' => 0,
// 								'save_other_choice' => 0,
// 								'default_value' => '',
// 								'layout' => 'vertical',
// 							),
// 							array (
// 								'key' => 'field_527d9535316b1',
// 								'label' => __('Image'),
// 								'name' => 'image',
// 								'type' => 'image',
// 								'column_width' => '',
// 								'save_format' => 'id',
// 								'preview_size' => 'thumbnail',
// 								'library' => 'all',
// 							),
// 							array (
// 								'key' => 'field_5281c5139a915',
// 								'label' => __('Link'),
// 								'name' => 'link',
// 								'type' => 'text',
// 								'conditional_logic' => array (
// 									'status' => 1,
// 									'rules' => array (
// 										array (
// 											'field' => 'field_5281c4c19a914',
// 											'operator' => '==',
// 											'value' => 'full',
// 										),
// 									),
// 									'allorany' => 'all',
// 								),
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'prepend' => '',
// 								'append' => '',
// 								'formatting' => 'html',
// 								'maxlength' => '',
// 							),
// 							array (
// 								'key' => 'field_5281c85fb9c8d',
// 								'label' => __('Link Text'),
// 								'name' => 'link_text',
// 								'type' => 'text',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'prepend' => '',
// 								'append' => '',
// 								'formatting' => 'html',
// 								'maxlength' => '',
// 							),
// 						),
// 					),
// 					array (
// 						'label' => __('Features'),
// 						'name' => 'features',
// 						'display' => 'row',
// 						'min' => '',
// 						'max' => '',
// 						'sub_fields' => array (
// 							array (
// 								'key' => 'field_5281a6ec34e26',
// 								'label' => __('Heading'),
// 								'name' => 'heading',
// 								'type' => 'text',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'prepend' => '',
// 								'append' => '',
// 								'formatting' => 'html',
// 								'maxlength' => '',
// 							),
// 							array (
// 								'key' => 'field_5281a633692af',
// 								'label' => __('Columns'),
// 								'name' => 'columns',
// 								'type' => 'select',
// 								'column_width' => '',
// 								'choices' => array (
// 									'whole' => 'One',
// 									'half' => 'Two',
// 									'third' => 'Three',
// 									'quarter' => 'Four',
// 								),
// 								'default_value' => 'third',
// 								'allow_null' => 0,
// 								'multiple' => 0,
// 							),
// 							array (
// 								'key' => 'field_527d9773e3768',
// 								'label' => __('Feature'),
// 								'name' => 'feature',
// 								'type' => 'repeater',
// 								'column_width' => '',
// 								'sub_fields' => array (
// 									array (
// 										'key' => 'field_527d9792e376b',
// 										'label' => __('Columns'),
// 										'name' => 'columns',
// 										'type' => 'select',
// 										'column_width' => '',
// 										'choices' => array (
// 											'whole' => 'One',
// 											'half' => 'Two',
// 											'third' => 'Three',
// 											'quarter' => 'Four',
// 										),
// 										'default_value' => '',
// 										'allow_null' => 1,
// 										'multiple' => 0,
// 									),
// 									array (
// 										'key' => 'field_527d977fe3769',
// 										'label' => __('text'),
// 										'name' => 'text',
// 										'type' => 'textarea',
// 										'column_width' => '',
// 										'default_value' => '',
// 										'placeholder' => '',
// 										'maxlength' => '',
// 										'formatting' => 'br',
// 									),
// 									array (
// 										'key' => 'field_527d978ce376a',
// 										'label' => __('heading'),
// 										'name' => 'heading',
// 										'type' => 'text',
// 										'column_width' => '',
// 										'default_value' => '',
// 										'placeholder' => '',
// 										'prepend' => '',
// 										'append' => '',
// 										'formatting' => 'html',
// 										'maxlength' => '',
// 									),
// 								),
// 								'row_min' => '',
// 								'row_limit' => '',
// 								'layout' => 'row',
// 								'button_label' => 'Add Feature',
// 							),
// 						),
// 					),
// 					array (
// 						'label' => __('Action'),
// 						'name' => 'action',
// 						'display' => 'row',
// 						'min' => '',
// 						'max' => '',
// 						'sub_fields' => array (
// 							array (
// 								'key' => 'field_5281a0549450a',
// 								'label' => __('Text'),
// 								'name' => 'text',
// 								'type' => 'wysiwyg',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'toolbar' => 'basic',
// 								'media_upload' => 'no',
// 							),
// 							array (
// 								'key' => 'field_5281a06b9450b',
// 								'label' => __('link'),
// 								'name' => 'link',
// 								'type' => 'text',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'prepend' => '',
// 								'append' => '',
// 								'formatting' => 'html',
// 								'maxlength' => '',
// 							),
// 							array (
// 								'key' => 'field_5281a2f09c6d1',
// 								'label' => __('Link Text'),
// 								'name' => 'link_text',
// 								'type' => 'text',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'prepend' => '',
// 								'append' => '',
// 								'formatting' => 'html',
// 								'maxlength' => '',
// 							),
// 						),
// 					),
// 					array (
// 						'label' => __('Team'),
// 						'name' => 'team',
// 						'display' => 'row',
// 						'min' => '',
// 						'max' => '',
// 						'sub_fields' => array (
// 							array (
// 								'key' => 'field_5281bf9a5754a',
// 								'label' => __('Heading'),
// 								'name' => 'heading',
// 								'type' => 'text',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'prepend' => '',
// 								'append' => '',
// 								'formatting' => 'html',
// 								'maxlength' => '',
// 							),
// 							array (
// 								'key' => 'field_5281bfac5754b',
// 								'label' => __('Team'),
// 								'name' => 'team',
// 								'type' => 'repeater',
// 								'column_width' => '',
// 								'sub_fields' => array (
// 									array (
// 										'key' => 'field_5281bfc55754c',
// 										'label' => __('image'),
// 										'name' => 'image',
// 										'type' => 'image',
// 										'column_width' => '',
// 										'save_format' => 'id',
// 										'preview_size' => 'thumbnail',
// 										'library' => 'all',
// 									),
// 									array (
// 										'key' => 'field_5281bfee5754d',
// 										'label' => __('Name'),
// 										'name' => 'name',
// 										'type' => 'text',
// 										'column_width' => '',
// 										'default_value' => '',
// 										'placeholder' => '',
// 										'prepend' => '',
// 										'append' => '',
// 										'formatting' => 'html',
// 										'maxlength' => '',
// 									),
// 								),
// 								'row_min' => '',
// 								'row_limit' => '',
// 								'layout' => 'table',
// 								'button_label' => 'Add Row',
// 							),
// 							array (
// 								'key' => 'field_5281c13553bdc',
// 								'label' => __('Image'),
// 								'name' => 'image',
// 								'type' => 'image',
// 								'column_width' => '',
// 								'save_format' => 'id',
// 								'preview_size' => 'thumbnail',
// 								'library' => 'all',
// 							),
// 						),
// 					),
// 					array (
// 						'label' => __('Grid'),
// 						'name' => 'grid',
// 						'display' => 'row',
// 						'min' => '',
// 						'max' => '',
// 						'sub_fields' => array (
// 							array (
// 								'key' => 'field_5285a670848a6',
// 								'label' => __('Text'),
// 								'name' => 'text',
// 								'type' => 'textarea',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'maxlength' => '',
// 								'formatting' => 'br',
// 							),
// 							array (
// 								'key' => 'field_5285a66b848a5',
// 								'label' => __('Heading'),
// 								'name' => 'heading',
// 								'type' => 'text',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'prepend' => '',
// 								'append' => '',
// 								'formatting' => 'html',
// 								'maxlength' => '',
// 							),
// 							array (
// 								'key' => 'field_52859966febf2',
// 								'label' => __('Repeater'),
// 								'name' => 'repeater',
// 								'type' => 'repeater',
// 								'column_width' => '',
// 								'sub_fields' => array (
// 									array (
// 										'key' => 'field_52859966febf3',
// 										'label' => __('item'),
// 										'name' => 'item',
// 										'type' => 'post_object',
// 										'column_width' => '',
// 										'post_type' => array (
// 											0 => 'all',
// 										),
// 										'taxonomy' => array (
// 											0 => 'all',
// 										),
// 										'allow_null' => 0,
// 										'multiple' => 0,
// 									),
// 								),
// 								'row_min' => '',
// 								'row_limit' => '',
// 								'layout' => 'row',
// 								'button_label' => 'Add',
// 							),
// 						),
// 					),
// 					array (
// 						'label' => __('Hero'),
// 						'name' => 'hero',
// 						'display' => 'row',
// 						'min' => '',
// 						'max' => '',
// 						'sub_fields' => array (
// 							array (
// 								'key' => 'field_5298cfd7eeffa',
// 								'label' => __('Heading'),
// 								'name' => 'heading',
// 								'type' => 'text',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'prepend' => '',
// 								'append' => '',
// 								'formatting' => 'html',
// 								'maxlength' => '',
// 							),
// 							array (
// 								'key' => 'field_5298d043eeffb',
// 								'label' => __('Text'),
// 								'name' => 'text',
// 								'type' => 'textarea',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'maxlength' => '',
// 								'formatting' => 'br',
// 							),
// 							array (
// 								'key' => 'field_5298d047eeffc',
// 								'label' => __('Image'),
// 								'name' => 'image',
// 								'type' => 'image',
// 								'column_width' => '',
// 								'save_format' => 'id',
// 								'preview_size' => 'thumbnail',
// 								'library' => 'all',
// 							),
// 							array (
// 								'key' => 'field_5298d068eeffd',
// 								'label' => __('Buttons'),
// 								'name' => 'buttons',
// 								'type' => 'repeater',
// 								'column_width' => '',
// 								'sub_fields' => array (
// 									array (
// 										'key' => 'field_5298d083eeffe',
// 										'label' => __('Text'),
// 										'name' => 'text',
// 										'type' => 'text',
// 										'column_width' => '',
// 										'default_value' => '',
// 										'placeholder' => '',
// 										'prepend' => '',
// 										'append' => '',
// 										'formatting' => 'html',
// 										'maxlength' => '',
// 									),
// 									array (
// 										'key' => 'field_5298d08beefff',
// 										'label' => __('Link'),
// 										'name' => 'link',
// 										'type' => 'text',
// 										'column_width' => '',
// 										'default_value' => '',
// 										'placeholder' => '',
// 										'prepend' => '',
// 										'append' => '',
// 										'formatting' => 'html',
// 										'maxlength' => '',
// 									),
// 									array (
// 										'key' => 'field_5298e0a2f66b6',
// 										'label' => __('Style'),
// 										'name' => 'style',
// 										'type' => 'radio',
// 										'column_width' => '',
// 										'choices' => array (
// 											'primary' => 'Primary',
// 											'secondary' => 'Secondary',
// 											'tertiary' => 'Tertiary',
// 										),
// 										'other_choice' => 0,
// 										'save_other_choice' => 0,
// 										'default_value' => '',
// 										'layout' => 'vertical',
// 									),
// 									array (
// 										'key' => 'field_5298e163f66b7',
// 										'label' => __('Size'),
// 										'name' => 'size',
// 										'type' => 'radio',
// 										'column_width' => '',
// 										'choices' => array (
// 											'small' => 'Small',
// 											'medium' => 'Medium',
// 											'large' => 'Large',
// 										),
// 										'other_choice' => 0,
// 										'save_other_choice' => 0,
// 										'default_value' => 'medium',
// 										'layout' => 'vertical',
// 									),
// 									array (
// 										'key' => 'field_5298e27be5392',
// 										'label' => __('Behavior'),
// 										'name' => 'behavior',
// 										'type' => 'checkbox',
// 										'column_width' => '',
// 										'choices' => array (
// 											'pop_up' => 'Open target pop up overlay',
// 											'new_window' => 'Open target in new window',
// 										),
// 										'default_value' => '',
// 										'layout' => 'vertical',
// 									),
// 								),
// 								'row_min' => '',
// 								'row_limit' => '',
// 								'layout' => 'row',
// 								'button_label' => 'Add Button',
// 							),
// 						),
// 					),
// 					array (
// 						'label' => __('Next'),
// 						'name' => 'next',
// 						'display' => 'row',
// 						'min' => '',
// 						'max' => '',
// 						'sub_fields' => array (
// 							array (
// 								'key' => 'field_529fc7443345b',
// 								'label' => __('Text'),
// 								'name' => 'text',
// 								'type' => 'text',
// 								'column_width' => '',
// 								'default_value' => '',
// 								'placeholder' => '',
// 								'prepend' => '',
// 								'append' => '',
// 								'formatting' => 'html',
// 								'maxlength' => '',
// 							),
// 							array (
// 								'key' => 'field_529fc74d3345c',
// 								'label' => __('Links'),
// 								'name' => 'links',
// 								'type' => 'post_object',
// 								'column_width' => '',
// 								'post_type' => array (
// 									0 => 'page',
// 								),
// 								'taxonomy' => array (
// 									0 => 'all',
// 								),
// 								'allow_null' => 0,
// 								'multiple' => 1,
// 							),
// 						),
// 					),
// 				),
// 				'button_label' => 'Add Row',
// 				'min' => -62,
// 				'max' => '',
// 			),
// 		),
// 		'location' => array (
// 			array (
// 				array (
// 					'param' => 'post_type',
// 					'operator' => '==',
// 					'value' => 'page',
// 					'order_no' => 0,
// 					'group_no' => 0,
// 				),
// 			),
// 		),
// 		'options' => array (
// 			'position' => 'acf_after_title',
// 			'layout' => 'no_box',
// 			'hide_on_screen' => array (
// 			),
// 		),
// 		'menu_order' => 0,
// 	));
// 	register_field_group(array (
// 		'id' => 'acf_page-meta',
// 		'title' => 'Page Meta',
// 		'fields' => array (
// 			array (
// 				'key' => 'field_5281ac4f1e569',
// 				'label' => __('Sub Title'),
// 				'name' => 'sub_title',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 		),
// 		'location' => array (
// 			array (
// 				array (
// 					'param' => 'post_type',
// 					'operator' => '==',
// 					'value' => 'page',
// 					'order_no' => 0,
// 					'group_no' => 0,
// 				),
// 			),
// 		),
// 		'options' => array (
// 			'position' => 'acf_after_title',
// 			'layout' => 'no_box',
// 			'hide_on_screen' => array (
// 			),
// 		),
// 		'menu_order' => 0,
// 	));
// 	register_field_group(array (
// 		'id' => 'acf_video',
// 		'title' => 'Video',
// 		'fields' => array (
// 			array (
// 				'key' => 'field_52847be0dc66c',
// 				'label' => __('Video Link'),
// 				'name' => 'video_link',
// 				'type' => 'text',
// 				'default_value' => '',
// 				'placeholder' => '',
// 				'prepend' => '',
// 				'append' => '',
// 				'formatting' => 'html',
// 				'maxlength' => '',
// 			),
// 		),
// 		'location' => array (
// 			array (
// 				array (
// 					'param' => 'post_type',
// 					'operator' => '==',
// 					'value' => 'videos',
// 					'order_no' => 0,
// 					'group_no' => 0,
// 				),
// 			),
// 		),
// 		'options' => array (
// 			'position' => 'normal',
// 			'layout' => 'no_box',
// 			'hide_on_screen' => array (
// 			),
// 		),
// 		'menu_order' => 0,
// 	));
// }




 ?>