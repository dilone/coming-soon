<?php

/**
 * List all plugins by AV Themes
 *
 * @return void
 */

if (!function_exists('AV_Plugins_plugin_options_page')) {

	function AV_Plugins_plugin_options_page()
	{

		$av_plugins = dilone_get_plugins();

		include(DLN_CS_PLUGIN_PATH . 'includes/admin/tpl/av-plugins-main.php');
	}
}

/**
 * Coming Soon options page.
 *
 * @return void
 */
function DLN_CS_plugin_options_page()
{

	$plugin_options			= get_option('DLN_CS_options');

	include(DLN_CS_PLUGIN_PATH . 'includes/admin/tpl/plugin-options.php');
}
