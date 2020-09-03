<?php

/**
 * Uninstall plugin callback
 *
 * @return void
 */
function DLN_CS_uninstall_pugin()
{

    if (!current_user_can('activate_plugins')) {

        return;
    }

    $DLN_CS_options                = get_option('DLN_CS_options');

    if (isset($DLN_CS_options['uninstall_delete_settings']) && (int)$DLN_CS_options['uninstall_delete_settings'] === 1) {

        delete_option('DLN_CS_options');
    }

    DLN_CS_plugin_status(3);
}
