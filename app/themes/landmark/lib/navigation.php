<?php
	/* ========================================================================================================================
	
	Cartogram Navigation v.1.0
	
	======================================================================================================================== */

	add_theme_support('menus');

	/**
	 * Button Shortcode
	 *
	 */
	function cartogram_button($a) {
		extract(shortcode_atts(array(
			'label' 	=> 'Button Text',
			'id' 	=> '1',
			'url'	=> '',
			'target' => '_parent',		
			'size'	=> '',
			'ptag'	=> false
		), $a));
		
		$link = $url ? $url : get_permalink($id);	
		
		if($ptag) :
			return  wpautop('<a href="'.$link.'" target="'.$target.'" class="btn '.$size.'">'.$label.'</a>');
		else :
			return '<a href="'.$link.'" target="'.$target.'" class="btn btn--primary btn--'.$size.'">'.$label.'</a>';
		endif;
	
	}


?>
