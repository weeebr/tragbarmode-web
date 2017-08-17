<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*/

get_header();
$pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);
if (!isset($pm_post_options['page_title']) || $pm_post_options['page_title'] == 'default') {
    $pm_post_options['page_title'] = pm_get_option('page_title_default');
}
?>

    <!-- Content -->
    <div class="content container">
        <div class="hred2_wrapper">
            <div class="row">
                <div class="span12 hred2">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <div class="container blog_listing_style2 pspike1">
                                    <?php

                                    while (have_posts()) {
                                        the_post();
                                        $pm_featured_image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                                        ?>
                                        <div class="pm_post">
                                            <a href="<?php the_permalink(); ?>"><h2
                                                    class="pm_post_style2_title"><?php the_title(); ?></h2></a>
                                            <div class="pm_post_formats_cont">
                                                <?php echo pm_get_post_formats(); ?>
                                            </div>
                                            <div class="pm_meta">
                                                <div class="pm_fleft">
                                                    <div class="pm_cats">
                                                        <?php the_category(', '); ?>
                                                    </div>
                                                    <?php the_tags(__('<div class="pm_tags">Tags: ', 'pm_local'), ', ', '</div>'); ?>
                                                </div>
                                                <div class="pm_fright">
                                                    <div class="social">
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <p class="pm_excerpt">
                                                <?php
                                                echo pm_get_text_truncate(get_the_excerpt(), 700);
                                                ?>
                                                <a href="<?php the_permalink(); ?>"><?php echo __('Read more &gt;', 'pm_local'); ?></a></p>
                                        </div>
                                    <?php
                                    }
                                    echo pm_get_pagination();
                                    ?>
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
                    </footer>
                </div>
            </div>
        </div>
    </div>

<?php

get_footer();