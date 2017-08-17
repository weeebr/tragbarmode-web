<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*** Template Name: Gallery - Supersized
*/

get_header();
the_post();
$pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);
wp_enqueue_script('supersized', PMJSURL . 'supersized.min.js', array(), false, true);
?>

    <!-- Content -->
    <div class="supersized_here gallery_type_1 pm_gallery" data-thumbs-count="<?php echo $pm_post_options['thumbs_count']; ?>" data-min-thumbs-count="2"
         data-thumbs-border-size="<?php echo $pm_post_options['thumbs_border']; ?>" data-thumbs-scrolling-per-click="<?php echo $pm_post_options['thumbs_count']; ?>">
        <div class="supersized_nav" id="prevslide"></div>
        <div class="supersized_nav" id="nextslide"></div>
        <div id="thumb-tray" class="load-item cscrollbar">
            <div id="thumb-back"></div>
            <div id="thumb-forward"></div>
        </div>
    </div>

    <div class="gallery_mobyle">
        <?php
        $pm_output = '';
        if (isset($pm_post_options['gallery_images']) && is_array($pm_post_options['gallery_images'])) {
            foreach ($pm_post_options['gallery_images'] as $pm_attach_id) {
                echo '<img src="' . aq_resize(wp_get_attachment_url($pm_attach_id), 1920, 1023, true, true, true) . '" alt=""/>';
                $pm_output .= "{image: '".aq_resize(wp_get_attachment_url($pm_attach_id), 1920, 1023, true, true, true)."', thumb: '".aq_resize(wp_get_attachment_url($pm_attach_id), 700, 700, true, true, true)."'},";
            }
        }

        ?>
    </div>

    <div class="preloader_active"></div>
<?php
$GLOBALS['pmJsInFooter']['gallery1'] = '
    <script type="text/javascript">

        jQuery(window).load(function (e) {
            "use strict";

            jQuery.supersized({

                // Functionality
                start_slide: 1,			// Start slide (0 is random)
                new_window: 1,			// Image links open in new window/tab
                autoplay: true,
                pause_hover: true,
                slide_interval: 5000,
                keyboard_nav: 1,
                transition: 1,
                transition_speed: 700,
                performance: 2,          // 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed //  (Only works for Firefox/IE, not Webkit)
                slide_links: 1,			// Individual links for each slide (Options: false, \'num\', \'name\', \'blank\')
                thumb_links: 1,			// Individual thumb links for each slide
                thumbnail_navigation: 1,			// Thumbnail navigation
                navigation: 1,          // Slideshow controls on/off

                // Size & Position
                min_width: 100,		// Min width allowed (in pixels)
                min_height: 100,		// Min height allowed (in pixels)
                vertical_center: 1,			// Vertically center background
                horizontal_center: 1,			// Horizontally center background
                fit_always: 0,			// Image will never exceed browser width or height (Ignores min. dimensions)
                fit_portrait: 1,			// Portrait images will not exceed browser height
                fit_landscape: 0,			// Landscape images will not exceed browser width

                // Components
                slides: ['.(strlen($pm_output) > 0 ? substr($pm_output, 0, -1) : "").']

            });

            jQuery(\'#prevslide\').click(function () {
                api.prevSlide();
            });

            jQuery(\'#nextslide\').click(function () {
                api.nextSlide();
            });

            var window_w = jQuery(window).width();

            if (window_w < 737) {
                jQuery(\'html\').css(\'overflow\', \'visible\');
            }
        });
    </script>
';

get_footer();