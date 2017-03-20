<?php
	/* ========================================================================================================================
	
	Cartogram Utility Functions v.1.0

	We've included a number of helper functions that we use in every theme we produce. 

	The main one is 'add_slug_to_body_class', this will add the page or post slug to the body class
	
	======================================================================================================================== */

	/**
	 * Print a pre formatted array to the browser - very useful for debugging
	 *
	 **/
	function print_a( $a ) {
		print( '<pre>' );
		print_r( $a );
		print( '</pre>' );
	}

	/**
	 * Simple wrapper for native get_template_part()
	 * Allows you to pass in an array of parts and output them in your theme
	 * e.g. <?php get_template_parts(array('part-1', 'part-2')); ?>
	 *
	 **/
	function get_template_parts( $parts = array() ) {
		foreach( $parts as $part ) {
			get_template_part( $part );
		};
	}

	/**
	 * Pass in a path and get back the page ID
	 * e.g. get_page_id_from_path('about/terms-and-conditions');
	 *
	 **/
	function get_page_id_from_path( $path ) {
		$page = get_page_by_path( $path );
		if( $page ) {
			return $page->ID;
		} else {
			return null;
		};
	}

	/**
	 * Append page slugs to the body class
	 * NB: Requires init via add_filter('body_class', 'add_slug_to_body_class');
	 *
	 */
	function add_slug_to_body_class( $classes ) {
		global $post;

		if( is_home() ) {			
			$key = array_search( 'blog', $classes );
			if($key > -1) {
				unset( $classes[$key] );
			};
		} elseif( is_page() ) {
			$classes[] = sanitize_html_class( $post->post_name );
		} elseif(is_singular()) {
			$classes[] = sanitize_html_class( $post->post_name );
		};

		return $classes;
	}
	
	/**
	 * Get the category id from a category name
	 *
	 */
	function get_category_id( $cat_name ){
		$term = get_term_by( 'name', $cat_name, 'category' );
		return $term->term_id;
	}

	/**
	 * Check for pagination
	 *
	 */
	function is_paginated(){
		global $wp_query;
		$total = $wp_query->max_num_pages ; 
		if ($total > 1) : 
			return true;
		endif;
	}

	/**
	 * Change the ellipsis, remove square brackets
	 *
	 */
	function excerpt_ellipsis($text) {
		return str_replace('[...]', '', $text); 
	}

	/**
	 * Remove the more link hash from defaul more link
	 *
	 */
	function cartogram_remove_more_link($content) {
		global $id;
		return str_replace('#more-'.$id.'"', '"', $content);
	}

	/**
	 * Custom More Link
	 *
	 */ 
	function more_link() {
		global $post;	
		$more_link = '<a class="link-more" href="'.get_permalink().'" title="'.get_the_title().'">';
		$more_link .= 'More<span>>></span>';
		$more_link .= '</a>';
		echo $more_link;	
	}
	
	
	/**
	 * Custom Share Links
	 *
	 */
	function landing_share() { 
		global $post;
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(), full );
		//http://atlchris.com/1665/how-to-create-custom-share-buttons-for-all-the-popular-social-services/
		//http://cferdinandi.github.io/social-sharing/
		$twitter = '<a  target="_blank" href="https://twitter.com/intent/tweet?text=' . get_the_title() . '&url=' . get_permalink() . '&via=ecobee"><i class="icon icon-twitter"></i></a>';
		$facebook = '<a  target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=' . get_permalink() . '"><i class="icon icon-facebook"></i></a>';
		$google = '<a  target="_blank" href="https://plus.google.com/share?url=' . get_permalink() . '"><i class="icon icon-twitter"></i></a>';
		$pinterest = '<a target="_blank" href="http://pinterest.com/pin/create/button/?url=' . get_permalink() . '&description=' . get_the_title() . '&media=' . $image[0] . '"><i class="icon icon-twitter"></i></a>';
		$mail = '<a href="mailto:?subject=' . get_the_title() . ' at ' . get_permalink() . '"><i class="icon icon-twitter"></i></a>';
		$content .= '<ul class="soft-half--top nav nav--btn nav--btn--tertiary"><li>' . $facebook . '</li><li>' . $twitter . '</li><li>' . $google . '</li><li>' . $pinterest . '</li><li>' . $mail . '</li></ul>';
		echo $content;
	}

	/**
	 * Remove Query Strings From Static Resources
	 */
	function landing_remove_script_version($src){
		$parts = explode('?', $src);
		return $parts[0];
	}

	/**
	 * Get Gravitar Source
	 */
	function get_avatar_src($get_avatar){
	    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
	    return $matches[1];
	}

