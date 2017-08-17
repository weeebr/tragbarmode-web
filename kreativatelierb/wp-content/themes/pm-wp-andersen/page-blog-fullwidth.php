<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*** Template Name: Blog Fullwidth
*/

get_header();
the_post();
$pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);
wp_enqueue_script('jscrollpane', PMJSURL . 'jquery.jscrollpane.min.js', array(), false, true);
wp_enqueue_script('mousewheel', PMJSURL . 'jquery.mousewheel.js', array(), false, true);
if (!isset($pm_post_options['page_title']) || $pm_post_options['page_title'] == 'default') {
    $pm_post_options['page_title'] = pm_get_option('page_title_default');
}
?>

    <!-- Content -->
    <div class="content container">
        <div class="row">
            <div class="pm_block_fullscreen">
                <div class="pm_block_listing">

                    <?php
                    $wp_query = new WP_Query();
                    $pm_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => (isset($pm_post_options['posts_per_page']) ? $pm_post_options['posts_per_page'] : 8)
                    );

                    $wp_query->query($pm_args);

                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                        $pm_featured_image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                        ?>
                        <div class="pm_listing_container" data-onscreen="4">
                            <div class="pm_innerwrapper">
                                <div class="pm_featured" data-src="<?php echo aq_resize($pm_featured_image_url, 800, 1433, true, true, true); ?>"
                                     style="background-image:url(<?php echo aq_resize($pm_featured_image_url, 800, 1433, true, true, true); ?>)"></div>
                                <div class="pm_incontent">
                                    <div class="pm_wrapper_inside">
                                        <section class="pm_section">
                                            <h5>
                                                <a class="pm_section_title" href="<?php the_permalink(); ?>">
                                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                                </a>
                                            </h5>

                                            <div class="pm_section_meta">
                                                <span class="pm_section_meta_data"><?php echo get_the_time("M d, Y"); ?></span>
                                                <span class="pm_section_meta_author"><?php echo '<a href="' . get_author_posts_url(get_the_author_meta('ID')) . '">' . get_the_author_meta('display_name') . '</a>'; ?></span>
                                                <span class="pm_section_meta_category"><?php the_category(', '); ?></span>
                                                <span class="pm_section_meta_comments"><a href="<?php the_permalink(); ?>"><?php echo __('Comments', 'pm_local').': '.get_comments_number(get_the_ID()); ?></a></span>
                                            </div>
                                        </section>
                                        <article class="pm_incontent contentarea">
                                            <p>
                                                <?php
                                                echo pm_get_text_truncate(get_the_excerpt(), 130);
                                                ?>
                                            </p>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php

$GLOBALS['pmJsInFooter']['blogFullwidth'] = "
<script type=\"text/javascript\">
    jQuery(window).load(function (e) {
        \"use strict\";
        var window_w = jQuery(window).width();
        pm_layout_fs();
        if (jQuery(window).width() > 760) {
            var settings = {
                showArrows: false,
                autoReinitialise: true
            };
            var pane = jQuery('.pm_block_fullscreen');
            pane.jScrollPane(settings);
        } else {
            jQuery('html, .border_style .content').css('overflow', 'visible');
        }
    });

    jQuery(window).resize(function () {
        \"use strict\";
        pm_layout_fs();
        setTimeout(pm_layout_fs(), 500);
    });

    function pm_layout_fs() {
        \"use strict\";
        var window_w = jQuery(window).width(),
                window_h = jQuery(window).height(),
                header_h = jQuery('header').height();

        if (window_w > 760) {
            jQuery('.pm_block_fullscreen').width(jQuery(window).width());
            jQuery('.jspTrack').width(window_w);
            jQuery('.pm_listing_container').each(function () {
                jQuery(this).find('.pm_featured').empty().css('background-image', 'url(' + jQuery(this).find('.pm_featured').attr('data-src') + ')');
                jQuery(this).width((jQuery(window).width() - 10) / jQuery(this).attr('data-onscreen'));
                jQuery('.pm_block_listing').width(jQuery('.pm_listing_container').size() * ((jQuery(window).width() - 10) / jQuery(this).attr('data-onscreen')));
                jQuery(this).find('.pm_featured').height(jQuery(window).height() - jQuery(this).find('.pm_incontent').height() - header_h - 90);
            });
        } else {
            jQuery('.pm_block_fullscreen').css('width', 'auto');
            jQuery('.jspTrack').css('width', 'auto');
            jQuery('.pm_listing_container').each(function () {
                if (jQuery(this).find('.pm_featured img').size() == 0) {
                    jQuery(this).find('.pm_featured').css('background-image', 'none');
                    jQuery(this).find('.pm_featured').append(\"<img src=\" + jQuery(this).find('.pm_featured').attr('data-src') + \" alt=''>\")
                }
            });
        }
    }
</script>
";

get_footer();