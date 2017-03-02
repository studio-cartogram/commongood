<?php

	/* ========================================================================================================================

	Actions

	======================================================================================================================== */

  add_action('wp_head','cartogram_fonts');
  add_action( 'after_setup_cartogram', 'cartogram_setup' );
  add_action( 'wp_enqueue_scripts', 'cartogram_styles' );
  add_action( 'wp_enqueue_scripts', 'cartogram_scripts' );

	/* ========================================================================================================================

	Cartogram Post Types and Taxonomies Functions v.1.0

	======================================================================================================================== */

  function create_post_types() {
    $args = array(
      'public'        => true,
      'label'         => 'Resources',
      'has_archive'   => true,
      'supports'      => array( 'title', 'excerpt', 'editor', 'thumbnail')
    );

    register_post_type( 'resources', $args );

    $args = array(
      'public'        => true,
      'label'         => 'Components',
      'has_archive'   => false,
      'exclude_from-search' => true,
      'supports'      => array( 'title', 'excerpt', 'editor', 'thumbnail')
    );

    register_post_type( 'components', $args );

    flush_rewrite_rules( false );
  }


  function create_taxonomies() {

    $labels = array(
      'name'                       => _x( 'Programs', 'taxonomy general name' ),
      'singular_name'              => _x( 'Program', 'taxonomy singular name' ),
      'search_items'               => __( 'Search Programs' ),
      'popular_items'              => __( 'Popular Programs' ),
      'all_items'                  => __( 'All Programs' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit Program' ),
      'update_item'                => __( 'Update Program' ),
      'add_new_item'               => __( 'Add New Program' ),
      'new_item_name'              => __( 'New Program Name' ),
      'separate_items_with_commas' => __( 'Separate Programs with commas' ),
      'add_or_remove_items'        => __( 'Add or remove Programs' ),
      'choose_from_most_used'      => __( 'Choose from the most used Programs' ),
      'not_found'                  => __( 'No Programs found.' ),
      'menu_name'                  => __( 'Programs' ),
    );

    $args = array(
      'hierarchical'      => false,
      'labels'            => $labels,
    );

    register_taxonomy( 'programs', array('resources'), $args );

    $labels = array(
      'name'                       => _x( 'Media', 'taxonomy general name' ),
      'singular_name'              => _x( 'Media', 'taxonomy singular name' ),
      'search_items'               => __( 'Search Media' ),
      'popular_items'              => __( 'Popular Media' ),
      'all_items'                  => __( 'All Media' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit Media' ),
      'update_item'                => __( 'Update Media' ),
      'add_new_item'               => __( 'Add New Media' ),
      'new_item_name'              => __( 'New Media Name' ),
      'separate_items_with_commas' => __( 'Separate Media with commas' ),
      'add_or_remove_items'        => __( 'Add or remove Media' ),
      'choose_from_most_used'      => __( 'Choose from the most used Media' ),
      'not_found'                  => __( 'No Media found.' ),
      'menu_name'                  => __( 'Media' ),
    );

    $args = array(
      'hierarchical'      => false,
      'labels'            => $labels,
    );

    register_taxonomy( 'media', array('resources'), $args );

    $labels = array(
      'name'                       => _x( 'Grade', 'taxonomy general name' ),
      'singular_name'              => _x( 'Grade', 'taxonomy singular name' ),
      'search_items'               => __( 'Search Grades' ),
      'popular_items'              => __( 'Popular Grades' ),
      'all_items'                  => __( 'All Grades' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit Grade' ),
      'update_item'                => __( 'Update Grade' ),
      'add_new_item'               => __( 'Add New Grade' ),
      'new_item_name'              => __( 'New Grade Name' ),
      'separate_items_with_commas' => __( 'Separate Grade with commas' ),
      'add_or_remove_items'        => __( 'Add or remove Grade' ),
      'choose_from_most_used'      => __( 'Choose from the most used Grade' ),
      'not_found'                  => __( 'No Grades found.' ),
      'menu_name'                  => __( 'Grades' ),
    );

    $args = array(
      'hierarchical'      => false,
      'labels'            => $labels,
    );

    register_taxonomy( 'grades', array('resources'), $args );

    $labels = array(
      'name'                       => _x( 'Topics', 'taxonomy general name' ),
      'singular_name'              => _x( 'Topic', 'taxonomy singular name' ),
      'search_items'               => __( 'Search Topics' ),
      'popular_items'              => __( 'Popular Topics' ),
      'all_items'                  => __( 'All Topics' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit Topic' ),
      'update_item'                => __( 'Update Topic' ),
      'add_new_item'               => __( 'Add New Topic' ),
      'new_item_name'              => __( 'New Topic Name' ),
      'separate_items_with_commas' => __( 'Separate Topic with commas' ),
      'add_or_remove_items'        => __( 'Add or remove Topic' ),
      'choose_from_most_used'      => __( 'Choose from the most used Topic' ),
      'not_found'                  => __( 'No Topics found.' ),
      'menu_name'                  => __( 'Topics' ),
    );

    $args = array(
      'hierarchical'      => false,
      'labels'            => $labels,
    );

    register_taxonomy( 'topics', array('resources'), $args );

    $labels = array(
      'name'                       => _x( 'Role', 'taxonomy general name' ),
      'singular_name'              => _x( 'Role', 'taxonomy singular name' ),
      'search_items'               => __( 'Search Roles' ),
      'popular_items'              => __( 'Popular Roles' ),
      'all_items'                  => __( 'All Roles' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit Role' ),
      'update_item'                => __( 'Update Role' ),
      'add_new_item'               => __( 'Add New Role' ),
      'new_item_name'              => __( 'New Role Name' ),
      'separate_items_with_commas' => __( 'Separate Role with commas' ),
      'add_or_remove_items'        => __( 'Add or remove Role' ),
      'choose_from_most_used'      => __( 'Choose from the most used Role' ),
      'not_found'                  => __( 'No Roles found.' ),
      'menu_name'                  => __( 'Roles' ),
    );

    $args = array(
      'hierarchical'      => false,
      'labels'            => $labels,
    );

    register_taxonomy( 'roles', array('resources'), $args );

    flush_rewrite_rules( false );
  }

	/* ========================================================================================================================

	Cartogram Custom Field Functions

	======================================================================================================================== */

  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page('Homepage');
    acf_add_options_page('Footer');

  }

	/* ========================================================================================================================

	Scripts

	======================================================================================================================== */

  if ( ! function_exists( 'cartogram_scripts' ) ) {

    function cartogram_scripts() {

      $theme_dir = get_stylesheet_directory_uri();

      wp_enqueue_script( 'main', "$theme_dir/assets/js/main.js", array(), null, true );

    }

  }

	/* ========================================================================================================================

	Styles

  ======================================================================================================================== */

  if ( ! function_exists( 'cartogram_styles' ) ) {

    function cartogram_styles() {
      $theme_dir = get_stylesheet_directory_uri();

      wp_enqueue_style( 'main', "$theme_dir/assets/css/main.css", array(), null, 'all' );
    }
  }

	/* ========================================================================================================================

	Theme Setup

	======================================================================================================================== */

  if ( ! function_exists( 'cartogram_setup' ) ) {

    function cartogram_setup() {

      /* ========================================================================================================================

      HTML

      ======================================================================================================================== */

      add_theme_support( 'html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption'
      ) );

      /* ========================================================================================================================

      Images

      - Set thumbnail sizes and add any additional featured images.

      ======================================================================================================================== */

      add_theme_support('post-thumbnails');
      add_image_size('img_small',350, 350, false);
      add_image_size('img_medium',800, 800, false);
      add_image_size('img_large',1200, 800, true);

      /* ========================================================================================================================

      Navigation Menus

      ======================================================================================================================== */

      register_nav_menus( array(
        'nav_primary'	=>  'Primary Nav',
        'nav_footer'	=>  'Footer Nav'
      ) );

    }
  }

  /* ========================================================================================================================

  Add Font Embed Script

  ======================================================================================================================== */

	function cartogram_fonts() {

    $output = "<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,400italic,700italic' rel='stylesheet' type='text/css'>";

		echo $output;

	}

