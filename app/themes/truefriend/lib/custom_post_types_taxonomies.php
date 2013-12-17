<?php

	/* ========================================================================================================================
	
	Cartogram Post Types and Taxonomies Functions v.1.0
	
	======================================================================================================================== */

	function create_post_types() {

		$worksLabels = array(
			'name' => __( 'Works' ),
			'singular_name' => __( 'Works' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Work' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Work' ),
			'new_item' => __( 'New Work' ),
			'view' => __( 'View Works' ),
			'view_item' => __( 'View Work' ),
			'search_items' => __( 'Search Works' ),
			'not_found' => __( 'No Works found' ),
			'not_found_in_trash' => __( 'No Works found in Trash' ),
			'parent' => __( 'Parent Work' ),
		);
		
		$worksArgs = array(
			'labels' => $worksLabels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,		
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'taxonomies' => array(''),
			'menu_position' => null,
			'supports' => array('title', 'editor', 'thumbnail')
		); 	
		
		register_post_type( 'works' , $worksArgs );

		$peopleLabels = array(
			'name' => __( 'People' ),
			'singular_name' => __( 'Person' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Person' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Person' ),
			'new_item' => __( 'New Person' ),
			'view' => __( 'View Person' ),
			'view_item' => __( 'View Person' ),
			'search_items' => __( 'Search People' ),
			'not_found' => __( 'No People found' ),
			'not_found_in_trash' => __( 'No People found in Trash' ),
			'parent' => __( 'Parent Person' ),
		);
		
		$peopleArgs = array(
			'labels' => $peopleLabels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,		
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'taxonomies' => array(''),
			'menu_position' => null,
			'supports' => array('title', 'editor', 'thumbnail')
		); 	
		
		register_post_type( 'people' , $peopleArgs );

		

		flush_rewrite_rules( false );

	}

	 function create_taxonomies() {
	
		// $labels = array(
		// 	'name' => __( 'Type' ),
		// 	'singular_name' => __( 'Type' ),
		// 	'search_items' =>  __( 'Search Types' ),
		// 	'all_items' => __( 'All Types' ),
		// 	'parent_item' => __( 'Parent Type' ),
		// 	'parent_item_colon' => __( 'Parent Type:' ),
		// 	'edit_item' => __( 'Edit Type' ),
		// 	'update_item' => __( 'Update Type' ),
		// 	'add_new_item' => __( 'Add New Type' ),
		// 	'new_item_name' => __( 'New Type Name' )
	 //  	);
	 //  	register_taxonomy('type','testimonials',array(
		// 	'hierarchical' => true,
		// 	'labels' => $labels
	 //  	));

	

		flush_rewrite_rules( false );
	 }
?>