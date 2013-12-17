<?php

	/* ========================================================================================================================
	
	Cartogram Post Types and Taxonomies Functions v.1.0
	
	======================================================================================================================== */

	function create_post_types() {

		$testimonialsLabels = array(
			'name' => __( 'Testimonials' ),
			'singular_name' => __( 'Testimonials' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Testimonial' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Testimonial' ),
			'new_item' => __( 'New Testimonial' ),
			'view' => __( 'View Testimonials' ),
			'view_item' => __( 'View Testimonial' ),
			'search_items' => __( 'Search Testimonials' ),
			'not_found' => __( 'No Testimonials found' ),
			'not_found_in_trash' => __( 'No Testimonials found in Trash' ),
			'parent' => __( 'Parent Testimonial' ),
		);
		
		$testimonialsArgs = array(
			'labels' => $testimonialsLabels,
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
		
		register_post_type( 'testimonials' , $testimonialsArgs );

		$videosLabels = array(
			'name' => __( 'Videos' ),
			'singular_name' => __( 'Videos' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Video' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Video' ),
			'new_item' => __( 'New Video' ),
			'view' => __( 'View Videos' ),
			'view_item' => __( 'View Video' ),
			'search_items' => __( 'Search Videos' ),
			'not_found' => __( 'No Videos found' ),
			'not_found_in_trash' => __( 'No Videos found in Trash' ),
			'parent' => __( 'Parent Video' ),
		);
		
		$videosArgs = array(
			'labels' => $videosLabels,
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
		
		register_post_type( 'videos' , $videosArgs );

		$faqLabels = array(
			'name' => __( 'Faq' ),
			'singular_name' => __( 'Faq' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Faq' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Faq' ),
			'new_item' => __( 'New Faq' ),
			'view' => __( 'View Faq' ),
			'view_item' => __( 'View Faq' ),
			'search_items' => __( 'Search Faq' ),
			'not_found' => __( 'No Faq found' ),
			'not_found_in_trash' => __( 'No Faq found in Trash' ),
			'parent' => __( 'Parent Faq' ),
		);
		
		$faqArgs = array(
			'labels' => $faqLabels,
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
		
		register_post_type( 'faq' , $faqArgs );

		

		$downloadsLabels = array(
			'name' => __( 'Downloads' ),
			'singular_name' => __( 'Downloads' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Download' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Download' ),
			'new_item' => __( 'New Download' ),
			'view' => __( 'View Downloads' ),
			'view_item' => __( 'View Download' ),
			'search_items' => __( 'Search Downloads' ),
			'not_found' => __( 'No Downloads found' ),
			'not_found_in_trash' => __( 'No Downloads found in Trash' ),
			'parent' => __( 'Parent Download' ),
		);
		
		$downloadsArgs = array(
			'labels' => $downloadsLabels,
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
		
		register_post_type( 'downloads' , $downloadsArgs );

	

		$jobsLabels = array(
			'name' => __( 'Jobs' ),
			'singular_name' => __( 'Jobs' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Job' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Job' ),
			'new_item' => __( 'New Job' ),
			'view' => __( 'View Jobs' ),
			'view_item' => __( 'View Job' ),
			'search_items' => __( 'Search Jobs' ),
			'not_found' => __( 'No Jobs found' ),
			'not_found_in_trash' => __( 'No Jobs found in Trash' ),
			'parent' => __( 'Parent Job' ),
		);
		
		$jobsArgs = array(
			'labels' => $jobsLabels,
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
		
		register_post_type( 'jobs' , $jobsArgs );

		$teamLabels = array(
			'name' => __( 'Team' ),
			'singular_name' => __( 'Team' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Team' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Team' ),
			'new_item' => __( 'New Team' ),
			'view' => __( 'View Team' ),
			'view_item' => __( 'View Team' ),
			'search_items' => __( 'Search Team' ),
			'not_found' => __( 'No Team found' ),
			'not_found_in_trash' => __( 'No Team found in Trash' ),
			'parent' => __( 'Parent Team' ),
		);
		
		$teamArgs = array(
			'labels' => $teamLabels,
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
		
		register_post_type( 'team' , $teamArgs );



		flush_rewrite_rules( false );

	}

	 function create_taxonomies() {
	
		$labels = array(
			'name' => __( 'Type' ),
			'singular_name' => __( 'Type' ),
			'search_items' =>  __( 'Search Types' ),
			'all_items' => __( 'All Types' ),
			'parent_item' => __( 'Parent Type' ),
			'parent_item_colon' => __( 'Parent Type:' ),
			'edit_item' => __( 'Edit Type' ),
			'update_item' => __( 'Update Type' ),
			'add_new_item' => __( 'Add New Type' ),
			'new_item_name' => __( 'New Type Name' )
	  	);
	  	register_taxonomy('type','testimonials',array(
			'hierarchical' => true,
			'labels' => $labels
	  	));

	  	$labels = array(
			'name' => __( 'Topics' ),
			'singular_name' => __( 'Topics' ),
			'search_items' =>  __( 'Search Topicss' ),
			'all_items' => __( 'All Topicss' ),
			'parent_item' => __( 'Parent Topics' ),
			'parent_item_colon' => __( 'Parent Topics:' ),
			'edit_item' => __( 'Edit Topics' ),
			'update_item' => __( 'Update Topics' ),
			'add_new_item' => __( 'Add New Topics' ),
			'new_item_name' => __( 'New Topics Name' )
	  	);
	  	register_taxonomy('topics','faq',array(
			'hierarchical' => true,
			'labels' => $labels
	  	));

	  	$labels = array(
			'name' => __( 'Product' ),
			'singular_name' => __( 'Product' ),
			'search_items' =>  __( 'Search Products' ),
			'all_items' => __( 'All Products' ),
			'parent_item' => __( 'Parent Product' ),
			'parent_item_colon' => __( 'Parent Product:' ),
			'edit_item' => __( 'Edit Product' ),
			'update_item' => __( 'Update Product' ),
			'add_new_item' => __( 'Add New Product' ),
			'new_item_name' => __( 'New Product Name' )
	  	);

	  	register_taxonomy('product',array( 'faq', 'manuals', 'tutorials', 'diagrams', 'warranties', 'videos',),array(
			'hierarchical' => true,
			'labels' => $labels
	  	));

		flush_rewrite_rules( false );
	 }
?>