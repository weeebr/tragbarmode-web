<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*/

get_header();
the_post();
$pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);
$pm_featured_image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
if (!isset($pm_post_options['page_style']) || $pm_post_options['page_style'] == 'default') {
    $pm_post_options['page_style'] = pm_get_option('page_style_default');
}
if (!isset($pm_post_options['page_title']) || $pm_post_options['page_title'] == 'default') {
    $pm_post_options['page_title'] = pm_get_option('page_title_default');
}

if (isset($pm_post_options['page_style']) && $pm_post_options['page_style'] == 'pm_page_style_2') {
    ?>

    <!-- Content -->
    <div class="content container">
        <div class="row">
            <div
                class="<?php echo (isset($pm_featured_image_url) && strlen($pm_featured_image_url) > 0) ? 'span4' : 'span12' ?> hred">
                <div class="row">
                    <div class="span12 texts_area">
                        <article>
                            <img class="hidden_img"
                                 src="<?php echo aq_resize($pm_featured_image_url, 1398, 933, true, true, true); ?>"
                                 alt=""/>

                            <?php
                            if ($pm_post_options['page_title'] == 'show') {
                                ?>
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            <?php
                            }
                            the_content();
                            wp_link_pages(array('before' => '<div class="page-link">' . __('Pages', 'pm_local') . ': ', 'after' => '</div>'));
                            ?>
                            <div class="row">
                                <div class="span12">
                                    <?php comments_template(); ?>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <?php
            if ((isset($pm_featured_image_url) && strlen($pm_featured_image_url) > 0)) {
                echo '<div class="span8 featured_image_block" style="background-image: url(' . aq_resize($pm_featured_image_url, 1398, 933, true, true, true) . ')"></div>';
            }
            ?>

        </div>
    </div>

    <?php

    $GLOBALS['pmJsInFooter']['htmlOhVisible'] = "
<script>
jQuery(document).ready(function (e) {
    'use strict';
    var window_w = jQuery(window).width();

    if (window_w < 737) {
        jQuery('html').css('overflow', 'visible');
    }
});
</script>
";

} else {
    ?>
    <!-- Content -->
    <div class="content container single_style">
        <div class="hred2_wrapper">
            <div class="row">
                <div class="span12 hred2">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="container blog_listing_style2">
                                    <?php
                                    if ($pm_post_options['page_title'] == 'show') {
                                        ?>
                                        <h1 class="entry-title"><?php the_title(); ?></h1>
                                    <?php
                                    }
                                    ?>
                                    <div class="pm_post">
                                        <?php
                                        the_content();
                                        wp_link_pages(array('before' => '<div class="page-link">' . __('Pages', 'pm_local') . ': ', 'after' => '</div>'));
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="span12">
                                            <?php comments_template(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hred style2"></div>
                    <footer>
                        <div class="row">
                            <div class="span6">
                                <?php echo pm_get_option('copyright'); ?>
                            </div>
                            <div class="span6">
                                <div class="pm_inner">
                                    <div class="pm_share_cont">
                                        <div class="pm_hided_icons">
                                            <?php if (strlen(pm_get_option('pm_share_facebook')) > 0) {
                                                echo '<a class="pm_share_facebook" href="' . pm_get_option('pm_share_facebook') . '"></a>';
                                            } ?>
                                            <?php if (strlen(pm_get_option('pm_share_twitter')) > 0) {
                                                echo '<a class="pm_share_twitter" href="' . pm_get_option('pm_share_twitter') . '"></a>';
                                            } ?>
                                            <?php if (strlen(pm_get_option('pm_share_tumblr')) > 0) {
                                                echo '<a class="pm_share_tumblr" href="' . pm_get_option('pm_share_tumblr') . '"></a>';
                                            } ?>
                                            <?php if (strlen(pm_get_option('pm_share_youtube')) > 0) {
                                                echo '<a class="pm_share_youtube" href="' . pm_get_option('pm_share_youtube') . '"></a>';
                                            } ?>
                                            <?php if (strlen(pm_get_option('pm_share_instagram')) > 0) {
                                                echo '<a class="pm_share_instagram" href="' . pm_get_option('pm_share_instagram') . '"></a>';
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="pm_phone"><?php echo pm_get_option('phone'); ?></div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
<?php
}

get_footer();