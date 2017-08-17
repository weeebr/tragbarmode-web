<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*/

get_header(); ?>

    <!-- Content -->
    <div class="content container">
        <div class="page404Container">
            <div class="top404 valign_center" data-valign-parent-div="page404Container" data-valign-bottom-padding="0">
                <h1><?php echo __('404 Error', 'pm_local'); ?></h1>

                <h2><?php echo __('sorry, it looks like there was an error', 'pm_local'); ?></h2>

                <p><?php echo __('There’s a lot of reasons why this page is 404. Don’t waste your time enjoying the look of it. You could return to the homepage or search using the search box below.', 'pm_local'); ?></p>

                <div class="search404">
                    <?php get_search_form(true); ?>
                </div>
                <?php echo pm_get_option('page_404_footer'); ?>
            </div>
        </div>
    </div>
    <div class="preloader_active"></div>
    <script type="text/javascript">
        jQuery(document).ready(function (e) {
            "use strict";
            var window_w = jQuery(window).width();

            if (window_w < 737) {
                jQuery('html').css('overflow', 'visible');
            }
        });
    </script>

<?php get_footer();