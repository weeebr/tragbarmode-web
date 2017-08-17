<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*/

add_action('add_meta_boxes', 'pm_add_post_options');
function pm_add_post_options()
{
    $types = array('post', 'page', 'portfolio');

    foreach ($types as $type) {
        add_meta_box(
            'pm_post_settings',
            PMTHEMENAME . ' ' . __('Page Settings', 'pm_local'),
            'pm_post_settings',
            $type,
            'normal',
            'high'
        );
    }
}

function pm_stripslashers_array(&$array_element)
{
    $array_element = stripslashes($array_element);
}

function pm_addslashers_array(&$item, $key)
{
    addslashes($item);
}

add_action('save_post', 'pm_post_options');
function pm_post_options()
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', get_the_ID())) {
        return;
    }

    if (!isset($_POST[PMTHEMEPREFIX . 'post_options'])) {
        $pm_post_options = array();
    } else {
        $pm_post_options = $_POST[PMTHEMEPREFIX . 'post_options'];
        array_walk_recursive($pm_post_options, 'pm_addslashers_array');
    }

    update_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', $pm_post_options);
}

function pm_get_post_option($args = array())
{
    if (!isset($args['type']) || strlen($args['type']) < 1) {
        return __("'type' can't be an empty.", "pm_local");
    }

    if ((!isset($args['name']) || strlen($args['name']) < 1) && $args['type'] !== "input_checkbox") {
        return __("'name' can't be an empty.", "pm_local");
    }

    $pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);

    if (is_array($pm_post_options)) {
        if (isset($pm_post_options[$args['name']])) {
            $optionvalue = $pm_post_options[$args['name']];
        } else {
            $optionvalue = $args['default'];
        }
    } else {
        $optionvalue = $args['default'];
    }

    $pm_compile = '<div class="pm_admin_option pm_type_' . $args['type'] . ' pm_option_name_' . $args['name'] . '">';

    switch ($args['type']) {

        case "input_text":
            $pm_compile .= "<h3>" . $args['title'] . "</h3>";
            $pm_compile .= "<input class='pm_input' name='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "]' type='text' placeholder='" . $args['placeholder'] . "' value='" . esc_attr($optionvalue) . "'>";
            break;

        case "input_radio":
            $pm_compile .= "<h3>" . $args['title'] . "</h3>";
            foreach ($args['variants'] as $key => $value) {
                $pm_compile .= "<div class='pm_stand_radio_option'><input class='pm_input pm_radio' id='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "]_" . $key . "' name='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "]' type='radio' value='" . $key . "' " . ($optionvalue == $key ? "checked" : "") . "> <label for='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "]_" . $key . "'>$value</label></div>";
            }
            break;

        case "input_range":
            $pm_compile .= "<h3>" . $args['title'] . "</h3>";
            $pm_compile .= "<input id='pm_range_" . $args['name'] . "' onchange=\"pm_copy_value('pm_range_" . $args['name'] . "','pm_range_" . $args['name'] . "_preview')\" min='" . $args['min'] . "' max='" . $args['max'] . "' class='pm_range' name='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "]' type='range' value='" . esc_attr($optionvalue) . "'>";
            $pm_compile .= "<div class='pm_range_result_preview' id='pm_range_" . $args['name'] . "_preview'><span>" . esc_attr($optionvalue) . "</span>" . $args['units'] . "</div>";
            break;

        case "select":
            $pm_compile .= "<h3>" . $args['title'] . "</h3>";
            $pm_compile .= "<select class='pm_select' name='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "]'>";
            foreach ($args['options'] as $key => $value) {
                $pm_compile .= "<option value='$key' " . ($optionvalue == $key ? "selected" : "") . ">$value</option>";
            }
            $pm_compile .= "</select>";
            break;

        case "custom_fields":
            $pm_compile .= "<h3>" . $args['title'] . "</h3>";

            $pm_compile .= '
            <div class="pm_custom_fields">
            <ul class="pm_custom_fields_list pm_sortable">';

            if (isset($optionvalue) && is_array($optionvalue)) {
                foreach ($optionvalue as $custom_field) {
                    $pm_compile .= "<li><input type='text' name='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "][]' value='" . $custom_field . "'> <span class='pm_remove_custom_field'>[Remove]</span> <span class='pm_remove_custom_field'>[Drag]</span></li>";
                }
            }

            $pm_compile .= '</ul>
            <div class="pm_add_custom_field" data-name="' . PMTHEMEPREFIX . 'post_options[' . $args['name'] . ']">[Add New]</div>
            </div>
            ';
            break;

        case "textarea":
            $pm_compile .= "<h3>" . $args['title'] . "</h3>";
            $pm_compile .= "<textarea class='pm_textarea' rows='10' cols='45' name='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "]'>" . esc_attr($optionvalue) . "</textarea>";
            break;

        case "images_multiple":
            $pm_compile .= "<h3>" . $args['title'] . "</h3>";
            #esc_attr($optionvalue)
            $pm_compile .= "<input type='button' data-name='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "]' class='pm_button pm_admin_option_images_multiple_wp_media' value='Select Images'><ul class='pm_preview_images pm_sortable'>";
            if (isset($optionvalue) && is_array($optionvalue)) {
                foreach ($optionvalue as $image_attach_id) {
                    $pm_compile .= "<li style='background-image:url(".aq_resize(wp_get_attachment_url($image_attach_id), 300, 300, true, true, true).");'><input type='hidden' name='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "][]' value='" . $image_attach_id . "'><div class='pm_remove'></div></li>";
                }
            }
            $pm_compile .= "</ul>";
            break;

        case "image":
            wp_enqueue_media();

            if (wp_get_attachment_url($optionvalue)) {
                $pm_compile .= "<h3>" . $args['title'] . "</h3>";
                $pm_compile .= "
                <div>
                    <input data-pm_popup_button_text='" . $args['popup_button_text'] . "' data-pm_popup_title='" . $args['popup_title'] . "' type='button' class='pm_admin_option_image_wp_media button button-primary' value='" . $args['init_button_text'] . "'>
                    <input type='button' class='button pm_remove_image' value='" . __('Remove Image', 'pm_local') . "'>
                    <input type='hidden' value='" . $optionvalue . "' name='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "]'>
                    <div class='pm_preview_cont'>
                        <img src='" . wp_get_attachment_url($optionvalue) . "' alt=''>
                    </div>
                </div>
                ";
            } else {
                $pm_compile .= "<h3>" . $args['title'] . "</h3>";
                $pm_compile .= "
                <div>
                    <input data-pm_popup_button_text='" . $args['popup_button_text'] . "' data-pm_popup_title='" . $args['popup_title'] . "' type='button' class='pm_admin_option_image_wp_media button button-primary' value='" . $args['init_button_text'] . "'>
                    <input type='button' class='button pm_remove_image' value='" . __('Remove Image', 'pm_local') . "'>
                    <input type='hidden' value='" . $optionvalue . "' name='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "]'>
                    <div class='pm_preview_cont'>
                        <img src='" . $optionvalue . "' alt=''>
                    </div>
                </div>
                ";
            }
            break;

        case "input_color":
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script('wp-color-picker');
            $pm_compile .= "<h3>" . $args['title'] . "</h3>";
            $pm_compile .= "
                <input type='text' class='pm_input pm_input_color' name='" . PMTHEMEPREFIX . 'post_options[' . $args['name'] . "]' value='" . esc_attr($optionvalue) . "'>
            ";
            break;
    }

    if (isset($args['description']) && strlen($args['description']) > 0) {
        $pm_compile .= "<div class='pm_admin_option_description'>" . $args['description'] . "</div>";
    }
    $pm_compile .= '</div>';

    return $pm_compile;
}

function pm_post_settings()
{
    $post_type = get_post_type();

    # input_radio
    # input_text
    # select

    # Settings for Title
    if (($post_type == 'page' || $post_type == 'portfolio' || $post_type == 'post') && ((get_page_template_slug() !== "page-gallery-supersized.php" && get_page_template_slug() !== "page-gallery-single.php"  && get_page_template_slug() !== "page-blog-fullwidth.php" && get_page_template_slug() !== "page-gallery-whaterwheel.php" && get_page_template_slug() !== "page-gallery-fullwidth.php"))) {
        echo pm_get_post_option(array(
            'name' => 'page_title',
            'type' => 'select',
            'default' => 'default',
            'options' => array('default' => 'Default', 'show' => 'Show', 'hide' => 'Hide'),
            'title' => __('Page Title', 'pm_local'),
            'description' => '',
        ));
    }

    # Settings for Galleries
    if (get_page_template_slug() == "page-gallery-supersized.php" || get_page_template_slug() == "page-gallery-single.php" || get_page_template_slug() == "page-gallery-whaterwheel.php" || get_page_template_slug() == "page-gallery-fullwidth.php") {
        echo pm_get_post_option(array(
            'name' => 'gallery_images',
            'type' => 'images_multiple',
            'default' => '',
            'title' => __('Select Images', 'pm_local'),
            'description' => '',
        ));
        echo '<style>#post-body-content {display: none !important;}</style>';
    }

    # Settings for Gallery Supersized
    if (get_page_template_slug() == "page-gallery-supersized.php") {
        echo pm_get_post_option(array(
            'name' => 'thumbs_count',
            'type' => 'input_range',
            'default' => '2',
            'min' => '2',
            'max' => '10',
            'units' => ' items',
            'title' => __('Thumbs', 'pm_local'),
            'description' => '',
        ));
        echo pm_get_post_option(array(
            'name' => 'thumbs_border',
            'type' => 'input_range',
            'default' => '10',
            'min' => '10',
            'max' => '20',
            'units' => 'px',
            'title' => __('Thumbs Border Size', 'pm_local'),
            'description' => '',
        ));
    }

    # Settings for Gallery Fullwidth
    if (get_page_template_slug() == "page-gallery-fullwidth.php") {

    }

    # Post Format Video
    if (($post_type == 'post' || $post_type == 'portfolio') && (get_post_format() == 'video')) {
        echo pm_get_post_option(array(
            'name' => 'video_iframe',
            'type' => 'textarea',
            'default' => '<iframe width="100%" height="520" src="http://www.youtube.com/embed/6AXI_GKmE6E?wmode=opaque" frameborder="0" allowfullscreen></iframe>',
            'title' => __('Video Iframe', 'pm_local'),
            'description' => '',
        ));
    }

    # Settings for Contact Page
    if ($post_type == 'page' && get_page_template_slug() == "page-contacts.php") {
        echo pm_get_post_option(array(
            'name' => 'map',
            'type' => 'textarea',
            'default' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d158858.1823707257!2d-0.10159865000000001!3d51.52864165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2sua!4v1407525630312"></iframe>',
            'title' => __('Map', 'pm_local'),
            'description' => '',
        ));
    } elseif
        # Settings for Coming Soon Page
    ($post_type == 'page' && get_page_template_slug() == "page-coming-soon.php"
    ) {
        echo pm_get_post_option(array(
            'name' => 'buy_link',
            'type' => 'input_text',
            'placeholder' => 'http://themeforest.net/item/andersen-photo-portfolio-html-template/11577966?ref=pixel-mafia',
            'default' => 'http://themeforest.net/item/andersen-photo-portfolio-html-template/11577966?ref=pixel-mafia',
            'title' => __('Link', 'pm_local'),
            'description' => '',
        ));
        echo pm_get_post_option(array(
            'name' => 'buy_link_text',
            'type' => 'input_text',
            'placeholder' => 'PURCHASE TEMPLATE',
            'default' => 'PURCHASE TEMPLATE',
            'title' => __('Link Text', 'pm_local'),
            'description' => '',
        ));
        echo pm_get_post_option(array(
            'name' => 'release_time',
            'type' => 'input_text',
            'placeholder' => '2015-12-31T23:59:59+0000',
            'default' => '2015-12-31T23:59:59+0000',
            'title' => __('Release Date', 'pm_local'),
            'description' => '',
        ));
    } elseif
        # Settings for Blog Fullwidth
    ($post_type == 'page' && get_page_template_slug() == "page-blog-fullwidth.php"
    ) {
        echo pm_get_post_option(array(
            'name' => 'posts_per_page',
            'type' => 'input_range',
            'default' => '8',
            'min' => '4',
            'max' => '16',
            'units' => ' items',
            'title' => __('Number of posts', 'pm_local'),
            'description' => '',
        ));
    } elseif
        # Settings for Blog Fullwidth
    ($post_type == 'page' && get_page_template_slug() == "page-blog-standard.php"
    ) {
        echo pm_get_post_option(array(
            'name' => 'posts_per_page',
            'type' => 'input_range',
            'default' => '3',
            'min' => '1',
            'max' => '16',
            'units' => ' items',
            'title' => __('Number of posts', 'pm_local'),
            'description' => '',
        ));
    } elseif
        # Settings for Portfolio Grid
    ($post_type == 'page' && get_page_template_slug() == "page-portfolio-grid.php"
    ) {
        echo pm_get_post_option(array(
            'name' => 'columns',
            'type' => 'input_range',
            'default' => '2',
            'min' => '2',
            'max' => '4',
            'units' => ' posts',
            'title' => __('Posts in Row', 'pm_local'),
            'description' => '',
        ));
        echo pm_get_post_option(array(
            'name' => 'posts_per_page',
            'type' => 'input_range',
            'default' => '2',
            'min' => '2',
            'max' => '10',
            'units' => ' posts',
            'title' => __('Posts Per Page', 'pm_local'),
            'description' => '',
        ));
    } elseif
        # Settings for Portfolio Fullscreen
    ($post_type == 'page' && get_page_template_slug() == "page-portfolio-fullscreen.php"
    ) {
        echo pm_get_post_option(array(
            'name' => 'columns',
            'type' => 'input_range',
            'default' => '4',
            'min' => '3',
            'max' => '4',
            'units' => ' posts',
            'title' => __('Posts in Row', 'pm_local'),
            'description' => '',
        ));
        echo pm_get_post_option(array(
            'name' => 'posts_per_page',
            'type' => 'input_range',
            'default' => '2',
            'min' => '3',
            'max' => '16',
            'units' => ' posts',
            'title' => __('Posts Per Page', 'pm_local'),
            'description' => '',
        ));
    } elseif
        # Settings for Pages
    (($post_type == 'page' || $post_type == 'portfolio' || $post_type == 'post') && ((get_page_template_slug() !== "page-gallery-supersized.php" && get_page_template_slug() !== "page-gallery-single.php" && get_page_template_slug() !== "page-gallery-whaterwheel.php" && get_page_template_slug() !== "page-gallery-fullwidth.php"))
    ) {
        echo pm_get_post_option(array(
            'name' => 'page_style',
            'type' => 'select',
            'default' => 'default',
            'options' => array('default' => 'Default', 'pm_page_style_1' => 'Standard', 'pm_page_style_2' => 'Fullwidth'),
            'title' => __('Page Style', 'pm_local'),
            'description' => '',
        ));
    }

    # Settings for Custom Fields
    if ($post_type == 'portfolio') {
        echo pm_get_post_option(array(
            'name' => 'pm_custom_fields',
            'type' => 'custom_fields',
            'default' => '',
            'title' => __('Custom Fields', 'pm_local'),
            'description' => '',
        ));
    }

}