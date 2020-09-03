<?php

/**
 * Deactivates the plugin
 *
 * @return void
 */
function DLN_CS_deactivate_plugin()
{

    if (!current_user_can('activate_plugins')) {

        return;
    }

    $DLN_CS_options                                    = get_option('DLN_CS_options');

    $DLN_CS_options['maintenance_active']             = 0;
    $DLN_CS_options['plugin_activated']                 = 1;
    $DLN_CS_options['activation_notice_shown']         = 1;

    update_option('DLN_CS_options', $DLN_CS_options);

    DLN_CS_plugin_status(2);
}
