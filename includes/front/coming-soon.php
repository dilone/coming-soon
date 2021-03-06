<?php
// Security check if plugin is being loaded via WP or not
// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Maintenance message when active
 */
function DLN_CS_maintenance_mode()
{

	$maintenance_mode_active			= (isset($_GET['av_coming_soon_preview']) && is_user_logged_in() ? true : false);

	if ($maintenance_mode_active == false) {

		$DLN_CS_options					= get_option('DLN_CS_options');

		if ((isset($DLN_CS_options['maintenance_active']) && (int)$DLN_CS_options['maintenance_active'] == 1)) {

			if ((!current_user_can('edit_themes') || !is_user_logged_in())) {

				$maintenance_mode_active 	= true;
			}

			if (isset($_GET['avcs']) && isset($DLN_CS_options['bypass_code']) && trim($_GET['avcs']) == $DLN_CS_options['bypass_code']) {

				$maintenance_mode_active = false;
				setcookie('_avcs_bypass', strtotime("+1 hour"), strtotime("+1 hour"), '/');
			}

			if (isset($_COOKIE['_avcs_bypass']) && (int)$_COOKIE['_avcs_bypass'] >= time()) {

				$maintenance_mode_active = false;
			}
		}
	}

	if ($maintenance_mode_active == true) {

		if (!isset($DLN_CS_options)) {

			$DLN_CS_options				= get_option('DLN_CS_options');
		}

		show_admin_bar(false);
		wp_enqueue_script('bootstrap-min', plugins_url('/assets/js/bootstrap.min.js', DLN_CS_PLUGIN_URL), array('jquery'), null, true);
		wp_enqueue_script('front-scripts', plugins_url('/assets/js/front.js', DLN_CS_PLUGIN_URL), array(), null, true);

		nocache_headers();

		include_once "tpl/tpl-01.php";
		exit;
	}
}
