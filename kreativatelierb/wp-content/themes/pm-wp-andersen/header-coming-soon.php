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
    <?php wp_head(); ?>
</head>

<?php $pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true); ?>

<body <?php body_class(pm_get_body_classes()); ?>>

<!-- Header -->
<header class="container clearfix">
    <div class="row">
        <div class="span12">

            <!-- Logo -->
            <?php pm_the_logo(); ?>

            <!-- Menu -->
            <div class="fl_container">
                <div class="header_line">
                    <div class="purchase_template"><a
                            href="<?php echo(isset($pm_post_options['buy_link']) ? $pm_post_options['buy_link'] : ''); ?>"><?php echo(isset($pm_post_options['buy_link_text']) ? $pm_post_options['buy_link_text'] : ''); ?></a></div>
                </div>
            </div>

        </div>
    </div>
</header>