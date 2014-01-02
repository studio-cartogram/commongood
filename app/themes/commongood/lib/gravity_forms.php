<?php

	/* ========================================================================================================================
	
	Cartogram Gravity Form Helpers v.1.0
	
	======================================================================================================================== */
	/**
	 * Allows us to add new class's structure to the submit button
	 */
	function form_submit_button($button, $form){
	    return "<button class='button' id='gform_submit_button_{$form["id"]}'><span>Submit</span></button>";
	}

	/**
	 * 	This filter is executed during form load. When set to true, 
	 *	scripts are loaded in the footer of the site, 
	 * 	instead of the default location of the header.
	 */

	function init_scripts() {
		return true;
	}


	function cartogram_pre_render_script($form) {
	 
	    if( !wp_script_is( 'gforms_gravityforms' ) )
	        wp_enqueue_script("gforms_gravityforms", GFCommon::get_base_url() . "/js/gravityforms.js", array("app"), GFCommon::$version, true);
	 
	    $script = "formElements.init();";
	 
	    GFFormDisplay::add_init_script( $form['id'], 'format_money', GFFormDisplay::ON_PAGE_RENDER, $script );
	 
	    return $form;
	}

	/**
	 * Changes the default Gravity Forms AJAX spinner.
	 *
	 * @since 1.0.0
	 *
	 * @param string $src The default spinner URL
	 * @return string $src The new spinner URL
	 */
	function cartogram_custom_gforms_spinner( $src ) {
	 
	    return get_stylesheet_directory_uri() . '/images/ajax-loader.gif';
	    
	}