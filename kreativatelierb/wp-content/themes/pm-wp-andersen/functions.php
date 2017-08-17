<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*/

if (!isset($content_width)) {
    $content_width = 940;
}

define('PMTHEMENAME', 'Andersen');
define('PMTHEMEPREFIX', 'andersen_');
define('PMTHEMEDIR', get_template_directory() . '/');
define('PMTHEMEURL', get_template_directory_uri() . '/');
define('PMIMGURL', PMTHEMEURL . "assets/img/");
define('PMJSURL', PMTHEMEURL . "assets/js/");
define('PMCSSURL', PMTHEMEURL . "assets/css/");
define('ULTIMATE_USE_BUILTIN', true);

$pm_wp_upload_dir = wp_upload_dir();
define('PMUPLOADSURL', $pm_wp_upload_dir['baseurl'] . "/");
define('PMBASEDIR', $pm_wp_upload_dir['basedir']);

require 'kitchen/init.php';