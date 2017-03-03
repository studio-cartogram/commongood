<?php
	/* ========================================================================================================================
	
	Admin Utility Functions v.1.0
	
	======================================================================================================================== */

	/**
	 * Show Kitchen Sink in WYSIWYG Editor
	 *
	 */
	function cartogram_unhide_kitchensink($args) {
		$args['wordpress_adv_hidden'] = false;
		return $args;
	}
	/**
	 * Remove Dashboard Meta Boxes
	 *
	 */
	function cartogram_remove_dashboard_widgets() {
		global $wp_meta_boxes;
		// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
		// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
		// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	}

	/**
	 * Change Admin Menu Order
	 */
	function cartogram_custom_menu_order($menu_ord) {
		if (!$menu_ord) return true;
		return array(
			// 'index.php', // Dashboard
			// 'separator1', // First separator
			// 'edit.php?post_type=page', // Pages
			// 'edit.php', // Posts
			// 'upload.php', // Media
			// 'gf_edit_forms', // Gravity Forms
			// 'genesis', // Genesis
			// 'edit-comments.php', // Comments
			// 'separator2', // Second separator
			// 'themes.php', // Appearance
			// 'plugins.php', // Plugins
			// 'users.php', // Users
			// 'tools.php', // Tools
			// 'options-general.php', // Settings
			// 'separator-last', // Last separator
		);
	}

	/**
	 * Hide Admin Areas that are not used
	 */
	function cartogram_remove_menu_pages() {
		// remove_menu_page('link-manager.php');
	}
	
