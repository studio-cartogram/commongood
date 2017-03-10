<?php

	/* ========================================================================================================================

	Actions

	======================================================================================================================== */

	/**
	 * Front End Assets
	 **/
  add_action('wp_head','cartogram_fonts');
  add_action( 'wp_enqueue_scripts', 'cartogram_styles' );
  add_action( 'wp_enqueue_scripts', 'cartogram_scripts' );

	/**
	 * Post types and taxonomies
	 **/
	add_action('init', 'create_post_types' );
	add_action('init', 'create_taxonomies' );

	/* ========================================================================================================================

	Cartogram Post Types and Taxonomies Functions v.1.0

	======================================================================================================================== */

  if ( ! function_exists( 'create_post_types' ) ) {

    function create_post_types() {

      $works_args = array(
        'public'              => true,
        'label'               => 'Works',
        'has_archive'         => false,
        'exclude_from-search' => true,
        'supports'            => array( 'title', 'thumbnail')
      );

      $commongood_args = array(
        'public'              => true,
        'label'               => '@Commongood',
        'has_archive'         => false,
        'exclude_from-search' => true,
        'supports'            => array( 'title', 'editor', 'thumbnail')
      );

      register_post_type( 'works', $works_args );
      register_post_type( 'commongood', $commongood_args );

      flush_rewrite_rules( false );

    }

  }


  if ( ! function_exists( 'create_taxonimies' ) ) {

    function create_taxonomies() {

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

  }

	/* ========================================================================================================================

	Cartogram Custom Field Functions

	======================================================================================================================== */

  if( function_exists('acf_add_options_page') ) {

        acf_add_options_page('Homepage');

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
      add_image_size('img_thumbnail',500, 500, true);
      add_image_size('img_medium',800, 800, false);
      add_image_size('img_large',1200, 800, true);

      /* ========================================================================================================================

      Navigation Menus

      ======================================================================================================================== */

      register_nav_menus( array(
        'nav_primary'	=>  'Primary Nav',
        'nav_footer'	=>  'Footer Nav',
        'nav_social'	=>  'Social Nav'
      ) );


  /* ========================================================================================================================

  Add Font Embed Script

  ======================================================================================================================== */

	function cartogram_fonts() {

    $output = '<script src="https://use.typekit.net/ieh7owy.js"></script>
               <script>try{Typekit.load({ async: true });}catch(e){}</script>';

		echo $output;

  }



  /* ========================================================================================================================

  Extra

  ======================================================================================================================== */

  function getVimeoThumb($id, $size) {

    $vimeo = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$id.php"));
    $key = 'thumbnail_' . $size;

    return $vimeo[0][$key];
  }

?>
