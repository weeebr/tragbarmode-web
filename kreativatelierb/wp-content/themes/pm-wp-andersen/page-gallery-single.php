<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*** Template Name: Gallery - Single
*/

get_header();
the_post();
$pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);
wp_enqueue_script('supersized', PMJSURL . 'supersized.min.js', array(), false, true);
?>

    <!-- Content -->
    <div class="supersized_here">
        <div class="supersized_nav" id="prevslide"></div>
        <div class="supersized_nav" id="nextslide"></div>
    </div>

    <div class="gallery_mobyle">
        <?php
        $pm_output = '';
        if (isset($pm_post_options['gallery_images']) && is_array($pm_post_options['gallery_images'])) {
            foreach ($pm_post_options['gallery_images'] as $pm_attach_id) {
                echo '<img src="' . aq_resize(wp_get_attachment_url($pm_attach_id), null, 980, true, true, true) . '" alt=""/>';
                $pm_output .= "{image: '".aq_resize(wp_get_attachment_url($pm_attach_id), null, 980, true, true, true)."'},";
            }
        }

        ?>
    </div>

    <div class="preloader_active"></div>
<?php
$GLOBALS['pmJsInFooter']['gallery3'] = '
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

                // Size & Position
                min_width: 0,			// Min width allowed (in pixels)
                min_height: 0,			// Min height allowed (in pixels)
                vertical_center: 0,			// Vertically center background
                horizontal_center: 1,			// Horizontally center background
                fit_always: 1,			// Image will never exceed browser width or height (Ignores min. dimensions)
                fit_portrait: 1,			// Portrait images will not exceed browser height
                fit_landscape: 1,			// Landscape images will not exceed browser width

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