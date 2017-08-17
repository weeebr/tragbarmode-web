<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*** Template Name: Contacts
*/

get_header();
the_post();
$pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);
if (!isset($pm_post_options['page_title']) || $pm_post_options['page_title'] == 'default') {
    $pm_post_options['page_title'] = pm_get_option('page_title_default');
}
?>

    <!-- Content -->
    <div class="content container pm_contacts_page">
        <div class="row">
            <div class="span4 hred">
                <div class="row">
                    <div class="span12 texts_area">
                        <article>
                            <div class="hidden_map_cont">
                            <?php
                            echo(isset($pm_post_options['map']) ? $pm_post_options['map'] : '');
                            ?>
                            </div>
                            <h1 class="entry-title">
                                <?php
                                if ($pm_post_options['page_title'] == 'show') {
                                    ?>
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                <?php
                                }
                                ?>
                            </h1>
                            <?php
                            the_content();
                            wp_link_pages(array('before' => '<div class="page-link">' . __('Pages', 'pm_local') . ': ', 'after' => '</div>'));
                            ?>
                        </article>
                    </div>
                </div>
            </div>
            <div class="span8">
                <?php
                echo(isset($pm_post_options['map']) ? $pm_post_options['map'] : '');
                ?>
            </div>
        </div>
    </div>

<?php

$GLOBALS['pmJsInFooter']['htmlOhVisible'] = "
<script>
jQuery(window).load(function (e) {
    'use strict';
    var window_w = jQuery(window).width();

    if (window_w < 737) {
        jQuery('html, .border_style .content').css('overflow', 'visible');
    }

    jQuery('.hidden_map_cont iframe').addClass('hidden_map');
});
</script>
";

get_footer();