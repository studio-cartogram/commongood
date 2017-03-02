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
      'public'              => true,
      'label'               => 'Works',
      'has_archive'         => false,
      'exclude_from-search' => true,
      'supports'            => array( 'title', 'excerpt', 'editor', 'thumbnail')
    );

    register_post_type( 'works', $args );

    flush_rewrite_rules( false );
  }


  function create_taxonomies() {

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

