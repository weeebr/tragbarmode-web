<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*/

# Load Files
require 'inc/functions.php';
require 'inc/functions-theme.php';
require 'inc/fonts.php';
require 'admin/admin-options.php';
require 'admin/settings-page.php';
require 'inc/aq-resizer.php';
require 'inc/file-generator.php';
require 'inc/ajax.php';
require 'inc/walker.php';
require 'inc/post-settings.php';
require 'tgm/class-tgm-plugin-activation.php';
require 'tgm/init.php';
require 'vc/init.php';

# Enable Shortcodes in Sidebar
add_filter('widget_text', 'do_shortcode');

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('revisions');
    add_theme_support('post-formats', array('image', 'video'));
}

add_post_type_support('portfolio', 'post-formats');

# ADD Localization Folder
add_action('init', 'pm_enable_pomo_translation');
function pm_enable_pomo_translation()
{
    load_theme_textdomain('pm_local', PMTHEMEURL . 'kitchen/languages/');
}

# ADD Theme Settings
add_action('admin_menu', 'pm_add_menu');
function pm_add_menu()
{
    add_menu_page(PMTHEMENAME . ' Settings', PMTHEMENAME, 'administrator', PMTHEMEPREFIX . 'settings_page', 'pm_theme_settings_page');
}

# Register CSS/JS
add_action('wp_enqueue_scripts', 'pm_css_js');
if (!function_exists('pm_css_js')) {
    function pm_css_js()
    {
        # CSS
        wp_enqueue_style('main', PMCSSURL . 'main.css');
        wp_enqueue_style('mCustomScrollbar', PMCSSURL . 'jquery.mCustomScrollbar.css');
        wp_enqueue_style('pm-custom', PMUPLOADSURL . 'pm-custom.css');

        # JS
        wp_enqueue_script('jquery');
        wp_enqueue_script('mCustomScrollbar', PMJSURL . 'jquery.mCustomScrollbar.concat.min.js', array(), false, true);
        wp_enqueue_script('main', PMJSURL . 'main.js', array(), false, true);
    }
}

# Register CSS/JS for Admin Settings
add_action('admin_enqueue_scripts', 'pm_admin_css_js');
function pm_admin_css_js()
{
    $protocol = is_ssl() ? 'https' : 'http';

    # CSS
    wp_enqueue_style("pm-google-fonts", "$protocol://fonts.googleapis.com/css?family=PT+Sans");
    wp_enqueue_style('pm-admin', PMTHEMEURL . 'assets/admin/css/admin.css');

    # JS
    wp_enqueue_script('jquery', 'jquery-ui-sortable');
    wp_enqueue_script('pm-admin', PMTHEMEURL . 'assets/admin/js/admin.js', array(), false, true);
}

# Register Menu
add_action('init', 'pm_register_menu');
function pm_register_menu()
{
    register_nav_menus(
        array(
            'main' => 'Main menu'
        )
    );
}
#echo pm_get_option("marker_for_recompile_custom_files");
# Generate custom.css
$pm_custom_css = new pmFileGenerator(
    $filename = "pm-custom.css",
    $filetype = "css",
    $output = '
        body {
            font-family: "' . pm_get_option('content_font_family') . '", sans-serif;
            font-size: ' . pm_get_option('content_font_size') . 'px;
            line-height: ' . ((int)pm_get_option('content_font_size') + 13) . 'px;
        }
        header {
            background-color: ' . pm_get_option('header_background_color') . ' !important;
        }
        .pm_breadcrumb_and_title {
            background-image: url(' . pm_get_option('breadcrumb_background') . ');
        }

        /* Main color */
        .content a,
        .purchase_template a:hover,
        a.button.type3:hover i:before,
        .pm_post a:hover .pm_post_style2_title,
        .pm_related_stand a:hover h5,
        .pm_cats a:hover, .pm_tags a:hover,
        .pm_toggacc_heading:hover,
        .port_work_title:hover h2,
        .pm_menu_cont .sub-menu li:hover > a,
         .pm_cats a:hover, .pm_tags a:hover {
            color: ' . pm_get_option('theme_main_color') . ';
        }

        a.button:hover,
        a.button.type6:hover,
        a.button.type2,
         input[type=submit],
          input[type=reset]:hover,
           .form-submit input[type=submit]:hover,
            input[type=submit]:active {
            background-color: ' . pm_get_option('theme_main_color') . ';
        }

        a.button.type6:hover {
            border-color: ' . pm_get_option('theme_main_color') . ';
        }

        a.button.type4:hover,
        a.button.type5:hover {
            background-color: ' . pm_get_option('theme_main_color') . ' !important;
            border-color: ' . pm_get_option('theme_main_color') . ' !important;
            color: #ffffff !important;
        }

            header .menu .current-menu-item span, header .menu li:hover span, header .menu .current-menu-parent > a span, header .menu .current-menu-ancestor > a span {
            color: ' . pm_get_option('theme_main_color') . ';
        }

        .categories li a:hover,
         .pm_section_title:hover {
            color: ' . pm_get_option('theme_main_color') . ' !important;
        }

        input:focus, textarea:focus,
         input:focus::-webkit-input-placeholder, textarea:focus::-webkit-input-placeholder,
          .pm_block_fullscreen .pm_section_meta span a:hover {
            color: ' . pm_get_option('theme_main_color') . ';
        }

        .page404 .search_button:hover {
            border-color: ' . pm_get_option('theme_main_color') . ' !important;
        }

        .subscribe_button:hover, .search_button:hover {
            background-color: ' . pm_get_option('theme_main_color') . ' !important;
            border-color: ' . pm_get_option('theme_main_color') . ' !important;
        }
    '
);