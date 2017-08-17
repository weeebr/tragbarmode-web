<?php

include_once(ABSPATH . 'wp-admin/includes/plugin.php');
if (!is_plugin_active('js_composer/js_composer.php')) {
    return;
}

if (function_exists('vc_set_as_theme')) {
    add_action('vc_before_init', 'pm_vcSetAsTheme');
    function pm_vcSetAsTheme()
    {
        vc_set_as_theme($disable_updater = true);
    }
}

if (function_exists('vc_set_shortcodes_templates_dir')) {
    $pm_vc_templates_dir = get_stylesheet_directory() . '/kitchen/vc/vc_templates';
    vc_set_shortcodes_templates_dir($pm_vc_templates_dir);
}

$pm_vc_elements = array();

foreach ($pm_vc_elements as $pm_vc_element) {
    require_once 'elements/' . $pm_vc_element . '/init.php';
}