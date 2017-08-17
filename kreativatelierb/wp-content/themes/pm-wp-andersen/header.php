<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Basic -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo pm_get_option('favicon'); ?>" type="image/x-icon">

    <!-- Apple Touch -->
    <link rel="apple-touch-icon" href="<?php echo pm_get_option('apple_57'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo pm_get_option('apple_72'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo pm_get_option('apple_114'); ?>">

    <!-- Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Responsive -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript">
        var pm_ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <?php wp_head(); ?>
</head>

<?php $pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true); ?>

<body <?php body_class(pm_get_body_classes()); ?>>

<header class="container clearfix">
    <div class="row">
        <div class="span12">

            <!-- Logo -->
            <?php pm_the_logo(); ?>

            <!-- Menu -->
            <a class="menu_toggler" href="javascript:void(0)"></a>

            <div class="floating_container">
                <nav>
                    <?php
                    $pm_menu_locations = get_nav_menu_locations();
                    if (isset($pm_menu_locations['main']) && $pm_menu_locations['main'] !== 0) {
                        wp_nav_menu(array('theme_location' => 'main', 'menu_class' => 'menu', 'depth' => '3', 'walker' => new PM_Nav_Menu()));
                    } else {
                        echo '<div class="pm_menu_notify">'.__('Please create and select menu in Appearance &gt; Menus.', 'pm_local').'</div>';
                    } ?>
                    <div class="clear"></div>
                </nav>
                <div class="header_line">
                    <div class="pm_inner">
                        <div class="pm_share_cont">
                            <i class="fa fa-share"></i>

                            <div class="pm_hided_icons">
                                <?php if (strlen(pm_get_option('pm_share_facebook')) > 0) {echo '<a class="pm_share_facebook" href="'.pm_get_option('pm_share_facebook').'"></a>';} ?>
                                <?php if (strlen(pm_get_option('pm_share_twitter')) > 0) {echo '<a class="pm_share_twitter" href="'.pm_get_option('pm_share_twitter').'"></a>';} ?>
                                <?php if (strlen(pm_get_option('pm_share_tumblr')) > 0) {echo '<a class="pm_share_tumblr" href="'.pm_get_option('pm_share_tumblr').'"></a>';} ?>
                                <?php if (strlen(pm_get_option('pm_share_youtube')) > 0) {echo '<a class="pm_share_youtube" href="'.pm_get_option('pm_share_youtube').'"></a>';} ?>
                                <?php if (strlen(pm_get_option('pm_share_instagram')) > 0) {echo '<a class="pm_share_instagram" href="'.pm_get_option('pm_share_instagram').'"></a>';} ?>
                            </div>
                        </div>
                        <div class="pm_phone"><?php echo pm_get_option('phone'); ?></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>