<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*** Template Name: Portfolio Grid
*/

get_header();
the_post();
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
                    <div class="container port_grid_wrapper">
                        <div class="row">
                            <div class="span12">
                                <div class="portfolio_grid_style2 pm_port_<?php echo (isset($pm_post_options['columns']) ? $pm_post_options['columns'] : 2); ?>_columns">
                                    <h1 class="entry-title">
                                        <?php
                                        if ($pm_post_options['page_title'] == 'show') {
                                            ?>
                                            <h1 class="entry-title"><?php the_title(); ?></h1>
                                        <?php
                                        }
                                        ?>
                                    </h1>

                                    <?php the_content(); ?>

                                    <div class="portfolio_grid_style2_listing">

                                        <?php
                                        $wp_query = new WP_Query();
                                        global $paged;
                                        $pm_args = array(
                                            'post_type' => 'portfolio',
                                            'paged' => $paged,
                                            'posts_per_page' => (isset($pm_post_options['posts_per_page']) ? $pm_post_options['posts_per_page'] : 4)
                                        );

                                        $wp_query->query($pm_args);

                                        while ($wp_query->have_posts()) {
                                            $wp_query->the_post();
                                            $pm_featured_image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                                            ?>
                                            <div class="port_work">
                                                <div class="pm_innerpadding">
                                                    <div class="featured_image_cont">
                                                        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo aq_resize($pm_featured_image_url, 660, 513, true, true, true); ?>" alt="" class="featured_image"/></a>
                                                    </div>
                                                    <a href="#" class="port_work_title"><h2><?php the_title(); ?></h2></a>

                                                    <p class="desc">
                                                        <?php
                                                        the_excerpt();
                                                        ?>
                                                        <a href="<?php the_permalink(); ?>"><?php echo __('Read more &gt;', 'pm_local'); ?></a></p>
                                                    </p></div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="hred style2"></div>
                                    <?php echo pm_get_pagination(); ?>
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