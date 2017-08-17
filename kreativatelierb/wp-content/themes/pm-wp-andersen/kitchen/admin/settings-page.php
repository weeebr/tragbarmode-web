<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*/

# Add All Options
$pmAdminOptions = new pmAdminOptions();

$pmAdminOptions->addOption(
    array(
        'name' => 'favicon',
        'type' => 'image',
        'default' => PMIMGURL . 'favicon.ico',
        'title' => __('Favicon', 'pm_local'),
        'description' => 'Default: 16px x 16px',
        'popup_button_text' => 'Select',
        'popup_title' => 'Select Image',
        'init_button_text' => 'Select Image',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'apple_57',
        'type' => 'image',
        'default' => PMIMGURL . 'apple57.png',
        'title' => __('Apple Icon 57px', 'pm_local'),
        'description' => 'Default: 57px x 57px',
        'popup_button_text' => 'Select',
        'popup_title' => 'Select Image',
        'init_button_text' => 'Select Image',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'apple_72',
        'type' => 'image',
        'default' => PMIMGURL . 'apple72.png',
        'title' => __('Apple Icon 72px', 'pm_local'),
        'description' => 'Default: 72px x 72px',
        'popup_button_text' => 'Select',
        'popup_title' => 'Select Image',
        'init_button_text' => 'Select Image',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'apple_114',
        'type' => 'image',
        'default' => PMIMGURL . 'apple114.png',
        'title' => __('Apple Icon 114px', 'pm_local'),
        'description' => 'Default: 114px x 114px',
        'popup_button_text' => 'Select',
        'popup_title' => 'Select Image',
        'init_button_text' => 'Select Image',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'phone',
        'type' => 'input_text',
        'placeholder' => '+1 800 305 05 05',
        'default' => '+1 800 305 05 05',
        'title' => __('Phone', 'pm_local'),
        'description' => '',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'copyright',
        'type' => 'input_text',
        'placeholder' => '&copy; Pixel Mafia. All Rights Reserved. support@pixel-mafia.com',
        'default' => '&copy; Pixel Mafia. All Rights Reserved. support@pixel-mafia.com',
        'title' => __('Copyright', 'pm_local'),
        'description' => '',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'add_this',
        'type' => 'textarea',
        'default' => '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53cd9ea10ac882c9"></script>',
        'title' => __('Add This (Sharing Tool)', 'pm_local'),
        'description' => 'Please go to http://addthis.com and create a free account. When you get a code, enter it in this field.',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'code_before_head',
        'type' => 'textarea',
        'default' => '',
        'title' => __('Code Before &lt;/head&gt;', 'pm_local'),
        'description' => '',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'page_style_default',
        'type' => 'select',
        'default' => 'pm_page_style_1',
        'options' => array('pm_page_style_1' => 'Standard', 'pm_page_style_2' => 'Fullwidth'),
        'title' => __('Default Page Style', 'pm_local'),
        'description' => '',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'post_style_default',
        'type' => 'select',
        'default' => 'pm_page_style_1',
        'options' => array('pm_page_style_1' => 'Standard', 'pm_page_style_2' => 'Fullwidth'),
        'title' => __('Default Post Style', 'pm_local'),
        'description' => '',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'page_title_default',
        'type' => 'select',
        'default' => 'show',
        'options' => array('show' => 'Show', 'hide' => 'Hide'),
        'title' => __('Default Page Title', 'pm_local'),
        'description' => '',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'page_404_footer',
        'type' => 'textarea',
        'default' => '<div class="soc_block404"><a class="button one_letter type2 facebook404" href="#"><i class="fa fa-facebook-square"></i></a><a class="button one_letter type2 twitter404" href="#"><i class="fa fa-twitter"></i></a><a class="button one_letter type2 pinterest404" href="#"><i class="fa fa-pinterest"></i></a><a class="button one_letter type2 linkedin404" href="#"><i class="fa fa-linkedin-square"></i></a><a class="button one_letter type2 gplus404" href="#"><i class="fa fa-google-plus-square"></i></a></div>',
        'title' => __('Page 404 Footer', 'pm_local'),
        'description' => '',
    )
);

# Socials

$pmAdminOptions->addOption(
    array(
        'name' => 'pm_share_facebook',
        'type' => 'input_text',
        'placeholder' => 'http://facebook.com',
        'default' => 'http://facebook.com',
        'title' => __('Facebook', 'pm_local'),
        'description' => '',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'pm_share_twitter',
        'type' => 'input_text',
        'placeholder' => 'http://twitter.com',
        'default' => 'http://twitter.com',
        'title' => __('Twitter', 'pm_local'),
        'description' => '',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'pm_share_tumblr',
        'type' => 'input_text',
        'placeholder' => 'http://tumblr.com',
        'default' => 'http://tumblr.com',
        'title' => __('Tumblr', 'pm_local'),
        'description' => '',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'pm_share_youtube',
        'type' => 'input_text',
        'placeholder' => 'http://youtube.com',
        'default' => 'http://youtube.com',
        'title' => __('YouTube', 'pm_local'),
        'description' => '',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'pm_share_instagram',
        'type' => 'input_text',
        'placeholder' => 'http://instagram.com',
        'default' => 'http://instagram.com',
        'title' => __('Instagram', 'pm_local'),
        'description' => '',
    )
);

# Typography

$pmAdminOptions->addOption(
    array(
        'name' => 'content_font_family',
        'type' => 'select',
        'default' => 'PT Sans',
        'options' => pm_get_fonts_array_only_key_name(),
        'title' => __('Content font-family', 'pm_local'),
        'description' => '',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'content_font_size',
        'type' => 'input_range',
        'default' => '13',
        'min' => '8',
        'max' => '30',
        'units' => 'px',
        'title' => __('Content font-size', 'pm_local'),
        'description' => '',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'content_line_height',
        'type' => 'input_range',
        'default' => '20',
        'min' => '15',
        'max' => '30',
        'units' => 'px',
        'title' => __('Content line-height', 'pm_local'),
        'description' => '',
    )
);

# Header Settings

$pmAdminOptions->addOption(
    array(
        'name' => 'logo',
        'type' => 'image',
        'default' => PMIMGURL . 'logo.png',
        'title' => __('Site Logo', 'pm_local'),
        'description' => 'Default: 129px x 30px',
        'popup_button_text' => 'Select',
        'popup_title' => 'Select Image',
        'init_button_text' => 'Select Image',
    )
);

$pmAdminOptions->addOption(
    array(
        'name' => 'logo_retina',
        'type' => 'image',
        'default' => PMIMGURL . 'logo-retina.png',
        'title' => __('Retina Logo', 'pm_local'),
        'description' => 'Default: 258px x 60px',
        'popup_button_text' => 'Select',
        'popup_title' => 'Select Image',
        'init_button_text' => 'Select Image',
    )
);

# Color Options

$pmAdminOptions->addOption(
    array(
        'name' => 'theme_main_color',
        'type' => 'input_color',
        'default' => '#c9251c',
        'title' => __('Theme Color', 'pm_local'),
        'description' => '',
    )
);

# Ok, Go to the DB
if (pm_get_option('pm_theme_installed') !== 'true') {
    $pmAdminOptions->saveAllDefaultValues();
    pm_update_option('pm_theme_installed', 'true');
}

# Show Admin Settings Page
function pm_theme_settings_page()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have permissions to access this page.', 'pm_local'));
    }

    global $pmAdminOptions;
    $pm_theme = wp_get_theme();

    ?>
    <script>
        var pm_admin_ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
    </script>
    <div class="pm_admin_wrapper">
        <form action="#" method="post" class="pm_admin_form">
            <div class="pm_admin_menu">
                <div class="pm_prehead">
                    <img src="<?php echo  PMTHEMEURL . 'assets/admin/img/logo.png'; ?>" alt=""/>
                    <div class="pm_theme_ver">
                        <?php echo $pm_theme['Version']; ?>
                    </div>
                </div>
                <ul class="pm_menu">
                    <li class="active"><i class="fa fa-gear"></i> <?php echo __('General Options', 'pm_local'); ?> <i class="fa fa-angle-right fright"></i></li>
                    <li><i class="fa fa-arrow-up"></i> <?php echo __('Header Settings', 'pm_local'); ?> <i class="fa fa-angle-right fright"></i></li>
                    <li><i class="fa fa-eyedropper"></i> <?php echo __('Color Options', 'pm_local'); ?> <i class="fa fa-angle-right fright"></i></li>
                    <li><i class="fa fa-font"></i> <?php echo __('Typography', 'pm_local'); ?> <i class="fa fa-angle-right fright"></i></li>
                    <li><i class="fa fa-bullhorn"></i> <?php echo __('Socials', 'pm_local'); ?> <i class="fa fa-angle-right fright"></i></li>
                </ul>
            </div>
            <div class="pm_admin_content">
                <div class="pm_prehead">
                    <img src="<?php echo  PMTHEMEURL . 'assets/admin/img/support.png'; ?>" alt=""/> <a href="http://themeforest.net/user/pixel-mafia" target="_blank">Support</a>
                </div>
                <div class="pm_hideable">
                    <!-- General -->
                    <div class="active">
                        <?php
                        echo $pmAdminOptions->getRenderedOption('favicon');
                        echo $pmAdminOptions->getRenderedOption('apple_57');
                        echo $pmAdminOptions->getRenderedOption('apple_72');
                        echo $pmAdminOptions->getRenderedOption('apple_114');
                        echo $pmAdminOptions->getRenderedOption('phone');
                        echo $pmAdminOptions->getRenderedOption('add_this');
                        echo $pmAdminOptions->getRenderedOption('copyright');
                        echo $pmAdminOptions->getRenderedOption('code_before_head');
                        echo $pmAdminOptions->getRenderedOption('page_style_default');
                        echo $pmAdminOptions->getRenderedOption('post_style_default');
                        echo $pmAdminOptions->getRenderedOption('page_title_default');
                        echo $pmAdminOptions->getRenderedOption('page_404_footer');
                        ?>
                    </div>

                    <!-- Header Settings -->
                    <div>
                        <?php
                        echo $pmAdminOptions->getRenderedOption('logo');
                        echo $pmAdminOptions->getRenderedOption('logo_retina');
                        ?>
                    </div>

                    <!-- Color Options -->
                    <div>
                        <?php
                        echo $pmAdminOptions->getRenderedOption('theme_main_color');
                        ?>
                    </div>

                    <!-- Typography -->
                    <div>
                        <?php
                        echo $pmAdminOptions->getRenderedOption('content_font_family');
                        echo $pmAdminOptions->getRenderedOption('content_font_size');
                        echo $pmAdminOptions->getRenderedOption('content_line_height');
                        ?>
                    </div>

                    <!-- Socials -->

                    <div>
                        <?php
                        echo $pmAdminOptions->getRenderedOption('pm_share_facebook');
                        echo $pmAdminOptions->getRenderedOption('pm_share_twitter');
                        echo $pmAdminOptions->getRenderedOption('pm_share_tumblr');
                        echo $pmAdminOptions->getRenderedOption('pm_share_youtube');
                        echo $pmAdminOptions->getRenderedOption('pm_share_instagram');
                        ?>
                    </div>
                </div>
                <div class="pm_reset_admin_options">
                    <input class='pm_button pm_button_second' type="button" name="pm_reset_admin_options"
                           value="<?php _e('Reset All Settings', 'pm_local'); ?>"/>

                    <div class="pm_reset_status"><?php _e('Successfully Reseted!', 'pm_local'); ?></div>
                </div>
                <div class="pm_save_admin_options">
                    <input class='pm_button ' type="submit" name="pm_save_admin_options"
                           value="<?php _e('Save All Settings', 'pm_local'); ?>"/>

                    <div class="pm_save_status"><?php _e('Successfully Saved!', 'pm_local'); ?></div>
                </div>
            </div>
        </form>
    </div>
<?php
}