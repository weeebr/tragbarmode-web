<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*** Template Name: Portfolio Fullscreen
*/

get_header();
the_post();
$pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);
wp_enqueue_script('isotope', PMJSURL . 'isotope.pkgd.min.js', array(), false, true);
if (!isset($pm_post_options['page_title']) || $pm_post_options['page_title'] == 'default') {
    $pm_post_options['page_title'] = pm_get_option('page_title_default');
}
?>

    <!-- Content -->
    <div class="content container">
        <div class="port_wrapper portfolio_3_columns">
            <div class="row">
                <div class="span12">
                    <?php echo pm_get_portfolio_filter(); ?>
                    <div class="isotope"></div>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                    <a href="javascript:void(0)" class="more">more photos</a>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    "use strict";

    jQuery(window).load(function(){
        jQuery('.isotope').isotope({
            itemSelector: '.pm_portfolio_work'
        });
        setTimeout("jQuery('.isotope').isotope({itemSelector: '.pm_portfolio_work'});", 1000);
        setTimeout("jQuery('.isotope').isotope({itemSelector: '.pm_portfolio_work'});", 1500);
        setTimeout("jQuery('.isotope').isotope({itemSelector: '.pm_portfolio_work'});", 2000);
        setTimeout("jQuery('.isotope').isotope({itemSelector: '.pm_portfolio_work'});", 2500);
        jQuery('.filters li').eq(0).find('a').click();

        jQuery('.filters li a').click(function(){
            jQuery('.filters li a').removeClass('is-checked');
            jQuery('.filters li').removeClass('is-checked');
            jQuery(this).addClass('is-checked');
            jQuery(this).parent().addClass('is-checked');
            var filterSelector = jQuery(this).attr('data-category');

            jQuery('.isotope').isotope({
                filter: filterSelector
            });
            setTimeout("jQuery('.filters li a.is-checked').click();", 500);
            return false;
        });

        var pm_showed_items = 0;

        pm_get_ajax_portfolio_items("pm_get_ajax_portfolio_items", "portfolio", "<?php echo $pm_post_options['posts_per_page'] ?>", pm_showed_items, "portfolio-fullscreen", "<?php echo  $pm_post_options['posts_per_page'] ?>", "<?php echo $pm_post_options['columns'] ?>");
        pm_showed_items = pm_showed_items + <?php echo $pm_post_options['posts_per_page'] ?>;

        jQuery('.more').click(function(){
            pm_get_ajax_portfolio_items("pm_get_ajax_portfolio_items", "portfolio", "<?php echo $pm_post_options['posts_per_page'] ?>", pm_showed_items, "portfolio-fullscreen", "<?php echo  $pm_post_options['posts_per_page'] ?>", "<?php echo $pm_post_options['columns'] ?>");
            pm_showed_items = pm_showed_items + <?php echo $pm_post_options['posts_per_page'] ?>;
        });
    });

    function pm_get_ajax_portfolio_items(action, post_type, items_per_click, pm_showed_items, template, items_per_page, columns){
        jQuery.post(pm_ajaxurl, {
            action: action,
            post_type: post_type,
            items_per_click: items_per_click,
            pm_showed_items: pm_showed_items,
            template: template,
            items_per_page: items_per_page,
            columns: columns
        })
            .done(function(data){
                if (data.length < 1){
                    jQuery('.more').hide('fast');
                }

                jQuery('.isotope').isotope('insert', jQuery(data), function(){
                    jQuery('.isotope').ready(function(){
                        jQuery('.isotope').isotope({
                            leyoutMode: 'fitRows'
                        }, 'reLayout');
                    });
                });
                setTimeout("jQuery('.isotope').isotope();", 500);
            })
    }
</script>

<?php
get_footer();