<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*/

# Echo Logo Html
if (!function_exists('pm_the_logo')) {
    function pm_the_logo()
    {
        $pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);
        $pm_output = '';

        if (wp_get_attachment_url(pm_get_option('logo'))) {
            $pm_logo = wp_get_attachment_image_src(pm_get_option('logo'), 'original');
            $width = $pm_logo[1];
            $height = $pm_logo[2];

            $pm_output .= '<img class="logotype" src="' . $pm_logo[0] . '" alt="">';
        } else {
            list($width, $height) = getimagesize(pm_get_option('logo'));
            $pm_output .= '<img class="logotype" src="' . pm_get_option('logo') . '" alt="">';
        }

        if (wp_get_attachment_url(pm_get_option('logo_retina'))) {
            $pm_logo = wp_get_attachment_image_src(pm_get_option('logo_retina'), 'original');
            $pm_output .= '<img class="logotype-retina" src="' . $pm_logo[0] . '" alt="">';
        } else {
            $pm_output .= '<img class="logotype-retina" src="' . pm_get_option('logo_retina') . '" alt="">';
        }

        echo '<div class="logo">';
        echo '<a href="' . esc_url(home_url('/')) . '" style="width:' . $width . 'px;height:' . $height . 'px;">';
        echo $pm_output;
        echo '</a>';
        echo '</div>';
    }
}

# Return Body Classes
if (!function_exists('pm_get_body_classes')) {
    function pm_get_body_classes()
    {
        $pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);
        $post_type = get_post_type();
        $classes = '';

        # Page Fullwidth style (type 2)
        if ($post_type == 'page' && (!isset($pm_post_options['page_style']) || $pm_post_options['page_style'] == 'default')) {
            $pm_post_options['page_style'] = pm_get_option('page_style_default');
        }
        if ($post_type == 'page' && $pm_post_options['page_style'] == 'pm_page_style_2' && (get_page_template_slug() !== "page-gallery-supersized.php" && get_page_template_slug() !== "page-gallery-single.php" && get_page_template_slug() !== "page-gallery-whaterwheel.php" && get_page_template_slug() !== "page-gallery-fullwidth.php")) {
            $classes .= ' border_style html_oh';
        }

        # Post Fullwidth style (type 2)
        if ($post_type == 'post' && (!isset($pm_post_options['page_style']) || $pm_post_options['page_style'] == 'default')) {
            $pm_post_options['page_style'] = pm_get_option('post_style_default');
        }
        if ($post_type == 'post' && $pm_post_options['page_style'] == 'pm_page_style_2' && (!is_category() && !is_tag() && !is_search() && !is_archive())) {
            $classes .= ' border_style html_oh';
        }

        # Portfolio Fullwidth style (type 2)
        if ($post_type == 'portfolio' && (!isset($pm_post_options['page_style']) || $pm_post_options['page_style'] == 'default')) {
            $pm_post_options['page_style'] = pm_get_option('post_style_default');
        }
        if ($post_type == 'portfolio' && $pm_post_options['page_style'] == 'pm_page_style_2') {
            $classes .= ' border_style html_oh';
        }

        # Page Gallery Supersized
        if ($post_type == 'page' && get_page_template_slug() == "page-gallery-supersized.php") {
            $classes .= ' gallery_style_vertical_thumbs html_oh';
        }

        # Page Gallery Supersized
        if (is_404()) {
            $classes .= ' border_style html_oh page404';
        }

        # Page Gallery Fullwidth
        if ($post_type == 'page' && get_page_template_slug() == "page-gallery-fullwidth.php") {
            $classes .= ' gallery_style_vertical_thumbs html_oh';
        }

        # Page Gallery Single
        if ($post_type == 'page' && get_page_template_slug() == "page-gallery-single.php") {
            $classes .= ' html_oh';
        }

        # Page Gallery Single
        if ($post_type == 'page' && get_page_template_slug() == "page-gallery-whaterwheel.php") {
            $classes .= ' html_oh gallery4';
        }

        # Page Contacts
        if ($post_type == 'page' && get_page_template_slug() == "page-contacts.php") {
            $classes .= ' border_style html_oh';
        }

        # Page Portfolio Fullscreen
        if ($post_type == 'portfolio' && get_page_template_slug() == "page-portfolio-fullscreen.php") {
            $classes .= ' border_style port_grid';
        }

        # Page Coming Soon
        if ($post_type == 'page' && get_page_template_slug() == "page-coming-soon.php") {
            $classes .= ' border_style html_oh page404';
        }

        # Page Coming Soon
        if ($post_type == 'page' && get_page_template_slug() == "page-blog-fullwidth.php") {
            $classes .= ' gallery_style_vertical_thumbs html_oh';
        }

        return $classes;
    }
}

# Return Body Classes
if (!function_exists('pm_add_this_footer')) {
    function pm_add_this_footer()
    {
        if (strlen(pm_get_option("add_this")) > 0) {
            echo pm_get_option("add_this");
        }
    }
}
add_action('wp_footer', 'pm_add_this_footer');