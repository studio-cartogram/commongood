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
		$more_link = '<p><a class="link-more" href="'.get_permalink().'" title="'.get_the_title().'">';
		$more_link .= 'Read More<span></span>';
		$more_link .= '</a></p>';
		echo $more_link;
	}


	/**
	 * Custom Share Links
	 *
	 */
	function cartogram_share() {
		global $post;
		//http://atlchris.com/1665/how-to-create-custom-share-buttons-for-all-the-popular-social-services/
		$twitter = '<a target="_blank" href="http://twitter.com/home?status=' . get_the_title() . '+' . get_permalink() . '"><i class="foundsocialicon-twitter"></i></a>';
		$facebook = '<a target="_blank" href="http://www.facebook.com/share.php?u=' . get_permalink() . '&title='  . get_the_title() . '"><i class="foundsocialicon-facebook"></i></a>';
		$mail = '<a href="mailto:?subject=' . get_the_title() . ' at ' . get_permalink() . '"><i class="foundicon-mail"></i></a>';
		$content .= '<ul class="link-list social icons"><li>' . $twitter . '</li><li>' . $facebook . '</li><li>' . $mail . '</li></ul>';
		echo $content;
    }

	/**
	 * Remove Query Strings From Static Resources
	 */
	function cartogram_remove_script_version($src){
		$parts = explode('?', $src);
		return $parts[0];
    }

	/**
	 * Remove Recent Comments from Head 
	 */
    function my_remove_recent_comments_style() {
        global $wp_widget_factory;
        remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
    }
