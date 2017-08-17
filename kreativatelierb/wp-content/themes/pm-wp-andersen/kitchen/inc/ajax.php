<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*/

# Save Admin Options
add_action('wp_ajax_pm_save_admin_options', 'pm_save_admin_options');
function pm_save_admin_options()
{
    if (is_admin()) {
        $response = array();
        $pm_options = get_option(PMTHEMEPREFIX . "pm_options", array());
        $serialize_string = stripslashes($_POST['serialize_string']);
        foreach (json_decode($serialize_string, true) as $key => $value) {
            $pm_options[$value['name']] = $value['value'];
        };

        if (update_option(PMTHEMEPREFIX . "pm_options", $pm_options)) {
            $response['save_status'] = "saved";
            pm_update_option("marker_for_recompile_custom_files", 'yes');
        } else {
            $response['save_status'] = "nothing_changed";
        }

        echo json_encode($response);
    }
    die();
}

# Reset Admin Options
add_action('wp_ajax_pm_reset_admin_options', 'pm_reset_admin_options');
function pm_reset_admin_options()
{
    if (is_admin()) {
        pm_remove_all_options();
        echo 'Done!';
    }
    die();
}

add_action('wp_ajax_pm_get_ajax_portfolio_items', 'pm_get_ajax_portfolio_items');
add_action('wp_ajax_nopriv_pm_get_ajax_portfolio_items', 'pm_get_ajax_portfolio_items');
function pm_get_ajax_portfolio_items()
{

    if ($_REQUEST['post_type'] == 'portfolio') {
        $wp_query = new WP_Query();

        $args = array(
            'post_type' => esc_attr($_REQUEST['post_type']),
            'offset' => absint($_REQUEST['pm_showed_items']),
            'post_status' => 'publish',
            'posts_per_page' => absint($_REQUEST['items_per_page']),
        );

        $columns = absint($_REQUEST['columns']);

        $item_width = 100 / $columns;

        $wp_query->query($args);

        $pm_output = '';

        while ($wp_query->have_posts()) {
            $wp_query->the_post();

            $post_format = get_post_format();
            if (empty($post_format)) $post_format = "standard";

            $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'single-post-thumbnail');
            if (strlen($featured_image[0]) < 1) {
                $featured_image[0] = "";
            }

            $target = "";

            $categories = '';

            $pm_term_list = get_the_terms(get_the_id(), "portfolio_category");
            if (is_array($pm_term_list)) {
                foreach ($pm_term_list as $term) {
                    $catname = strtr($term->name, array(
                        " " => "-",
                        "'" => "-",
                    ));
                    $categories .= strtolower($catname) . " ";
                    $echoterm = $term->name;
                }
            } else {
                $catname = 'Uncategorized';
            }

            $pm_output .= '
            <div class="pm_portfolio_work ' . $categories . '" data-category="' . $categories . '" style="width: ' . $item_width . '%">
                <div class="pm_portfolio_work_wrapper">
                    <a href="' . get_permalink(get_the_id()) . '">
                        <div class="image_box">
                            <img src="' . aq_resize($featured_image[0], 1170, 1170, true, true, true) . '" alt="">
                            <p class="pm_portfolio_work_text">' . get_the_title() . '</p>
                        </div>
                    </a>
                </div>
            </div>';

        }

    }
    echo $pm_output;

    die();
}

?>