<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*** Template Name: Coming Soon
*/

get_header('coming-soon');
the_post();
$pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);
wp_enqueue_script('countdown', PMJSURL . 'jquery.countdown.js', array(), false, true);
if (!isset($pm_post_options['page_title']) || $pm_post_options['page_title'] == 'default') {
    $pm_post_options['page_title'] = pm_get_option('page_title_default');
}
?>

    <!-- Content -->
    <div class="content container">
        <div class="page_coming_soon">
            <div class="valign_center" data-valign-parent-div="page_coming_soon" data-valign-bottom-padding="0">
                <h1>
                    <?php
                    if ($pm_post_options['page_title'] == 'show') {
                        ?>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php
                    }
                    ?>
                </h1>

                <time><?php echo(isset($pm_post_options['release_time']) ? $pm_post_options['release_time'] : ''); ?></time>

                <script>
                    jQuery(document).ready(function () {
                        "use strict";
                        jQuery('time').countDown({
                            with_separators: false,
                            label_dd: 'D',
                            label_hh: 'H',
                            label_mm: 'M',
                            label_ss: 'S',
                        });
                    });
                </script>

                <?php
                the_content();
                wp_link_pages(array('before' => '<div class="page-link">' . __('Pages', 'pm_local') . ': ', 'after' => '</div>'));
                ?>
            </div>
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

    jQuery('.hidden_map_cont iframe').addClass('hidden_map');
});
</script>
";

get_footer();