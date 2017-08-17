<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*/

# Work With Options
if (!function_exists('pm_get_option')) {
    function pm_get_option($name, $default = '')
    {
        $pm_options = get_option(PMTHEMEPREFIX . "pm_options", $default);

        if (isset($pm_options[$name])) {
            if (gettype($pm_options[$name]) == "string") {
                return stripslashes($pm_options[$name]);
            } else {
                return $pm_options[$name];
            }
        } else {
            return $default;
        }

    }
}

if (!function_exists('pm_update_option')) {
    function pm_update_option($name, $value)
    {
        $pm_options = get_option(PMTHEMEPREFIX . "pm_options", array());
        $pm_options[$name] = $value;

        if (update_option(PMTHEMEPREFIX . "pm_options", $pm_options)) {
            return true;
        }
    }
}

if (!function_exists('pm_delete_option')) {
    function pm_delete_option($name)
    {
        $pm_options = get_option(PMTHEMEPREFIX . "pm_options", array());
        if (isset($pm_options[$name])) {
            unset($pm_options[$name]);
        }

        if (update_option(PMTHEMEPREFIX . "pm_options", $pm_options)) {
            return true;
        }
    }
}

if (!function_exists('pm_show_all_options')) {
    function pm_show_all_options()
    {
        echo '<pre>';
        print_r(get_option(PMTHEMEPREFIX . "pm_options", array()));
        echo '</pre>';
    }
}

if (!function_exists('pm_remove_all_options')) {
    function pm_remove_all_options()
    {
        delete_option(PMTHEMEPREFIX . "pm_options");
    }
}

if (!function_exists('pm_check_isset_option')) {
    function pm_check_isset_option($key, $value)
    {
        $pm_options = get_option(PMTHEMEPREFIX . "pm_options", array());

        if (!isset($pm_options[$key])) {
            $pm_options[$key] = $value;
        }
        if (update_option(PMTHEMEPREFIX . "pm_options", $pm_options)) {
            return true;
        }
    }
}

function pm_title_tag()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'pm_title_tag');

if (!function_exists('_wp_render_title_tag')) {
    function theme_slug_render_title()
    {
        ?>
        <title><?php wp_title('|', true, 'right'); ?></title>
    <?php
    }

    add_action('wp_head', 'theme_slug_render_title');
}

function pm_get_breadcrumb()
{
    $pm_breadcrumb_on_home = 1;
    $pm_separator = '';
    $pm_home = '<i class="fa fa-home"></i>';
    $pm_current = 1;
    $pm_before = '<span class="current">';
    $pm_after = '</span>';
    $pm_output = '';

    global $post;

    if (is_home() || is_front_page()) {

        if ($pm_breadcrumb_on_home == 1) $pm_output .= '<div class="pm_breadcrumbs"><span>' . $pm_home . '</span></div>';

    } else {

        $pm_output .= '<div class="pm_breadcrumbs"><a href="' . home_url() . '">' . $pm_home . '</a>' . $pm_separator . '';

        # Category listing
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) $pm_output .= get_category_parents($thisCat->parent, TRUE, ' ' . $pm_separator . ' ');
            $pm_output .= $pm_before . 'Archive "' . single_cat_title('', false) . '"' . $pm_after;

        } # Portfolio
        elseif (get_post_type() == 'portfolio') {

            the_terms($post->ID, 'portfolio_category', '', '', '');

            if ($pm_current == 1) $pm_output .= ' ' . $pm_separator . ' ' . $pm_before . get_the_title() . $pm_after;

        } # Search
        elseif (is_search()) {
            $pm_output .= $pm_before . 'Search for "' . get_search_query() . '"' . $pm_after;

        } elseif (is_day()) {
            $pm_output .= '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $pm_separator . ' ';
            $pm_output .= '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $pm_separator . ' ';
            $pm_output .= $pm_before . get_the_time('d') . $pm_after;

        } elseif (is_month()) {
            $pm_output .= '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $pm_separator . ' ';
            $pm_output .= $pm_before . get_the_time('F') . $pm_after;

        } elseif (is_year()) {
            $pm_output .= $pm_before . get_the_time('Y') . $pm_after;

        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {

                $parent_id = $post->post_parent;
                if ($parent_id > 0) {
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        $pm_output .= $breadcrumbs[$i];
                        if ($i != count($breadcrumbs) - 1) $pm_output .= ' ' . $pm_separator . ' ';
                    }
                    if ($pm_current == 1) $pm_output .= ' ' . $pm_separator . ' ' . $pm_before . get_the_title() . $pm_after;
                } else {
                    $pm_output .= $pm_before . get_the_title() . $pm_after;
                }

            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $pm_separator . ' ');
                if ($pm_current == 0) $cats = preg_replace("#^(.+)\s$pm_separator\s$#", "$1", $cats);
                $pm_output .= $cats;
                if ($pm_current == 1) $pm_output .= $pm_before . get_the_title() . $pm_after;
            }

        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            $pm_output .= $pm_before . $post_type->labels->singular_name . $pm_after;

        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            $pm_output .= get_category_parents($cat, TRUE, ' ' . $pm_separator . ' ');
            $pm_output .= '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($pm_current == 1) $pm_output .= ' ' . $pm_separator . ' ' . $pm_before . get_the_title() . $pm_after;

        } elseif (is_page() && !$post->post_parent) {
            if ($pm_current == 1) $pm_output .= $pm_before . get_the_title() . $pm_after;

        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                $pm_output .= $breadcrumbs[$i];
                if ($i != count($breadcrumbs) - 1) $pm_output .= ' ' . $pm_separator . ' ';
            }
            if ($pm_current == 1) $pm_output .= '' . $pm_separator . '' . $pm_before . get_the_title() . $pm_after;

        } elseif (is_tag()) {
            $pm_output .= $pm_before . __('Tag', 'pm_local') . ' "' . single_tag_title('', false) . '"' . $pm_after;

        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            $pm_output .= $pm_before . __('Author', 'pm_local') . $userdata->display_name . $pm_after;

        } elseif (is_404()) {
            $pm_output .= $pm_before . __('Error 404', 'pm_local') . $pm_after;
        }

        $pm_output .= '</div>';

    }

    return $pm_output;
}

function pm_pre($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

if (!function_exists('pm_js_in_footer')) {
    function pm_js_in_footer()
    {
        if (isset($GLOBALS['pmJsInFooter']) && is_array($GLOBALS['pmJsInFooter'])) {
            foreach ($GLOBALS['pmJsInFooter'] as $id => $js) {
                echo $js;
            }
        }
    }
}
add_action('wp_footer', 'pm_js_in_footer');

if (!function_exists('pm_wp_head')) {
    function pm_wp_head()
    {
        echo(strlen(pm_get_option('code_before_head')) > 0 ? pm_get_option('code_before_head') : '');
    }
}
add_action('wp_head', 'pm_wp_head');

if (!function_exists('pm_get_pagination')) {
    function pm_get_pagination($range = 10)
    {
        $pm_output = "";
        global $paged, $wp_query;

        if (empty($paged)) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }

        $max_page = $wp_query->max_num_pages;

        if ($max_page > 1) {
            $pm_output .= '<div class="pm_paging">';
        }

        if ($max_page > 1) {
            if (!$paged) {
                $paged = 1;
            }
            if ($max_page > $range) {
                if ($paged < $range) {
                    for ($i = 1; $i <= ($range + 1); $i++) {
                        $pm_output .= "<a href='" . get_pagenum_link($i) . "'";
                        if ($i == $paged) $pm_output .= " class='active'";
                        $pm_output .= "><span>$i</span></a>";
                    }
                } elseif ($paged >= ($max_page - ceil(($range / 2)))) {
                    for ($i = $max_page - $range; $i <= $max_page; $i++) {
                        $pm_output .= "<a href='" . get_pagenum_link($i) . "'";
                        if ($i == $paged) $pm_output .= " class='active'";
                        $pm_output .= "><span>$i</span></a>";
                    }
                } elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
                    for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
                        $pm_output .= "<a href='" . get_pagenum_link($i) . "'";
                        if ($i == $paged) $pm_output .= " class='active'";
                        $pm_output .= "><span>$i</span></a>";
                    }
                }
            } else {
                for ($i = 1; $i <= $max_page; $i++) {
                    $pm_output .= "<a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) $pm_output .= " class='active'";
                    $pm_output .= "><span>$i</span></a>";
                }
            }
        }
        if ($max_page > 1) {
            $pm_output .= '</div>';
        }

        return $pm_output;
    }
}

if (!function_exists('pm_get_post_formats')) {
    function pm_get_post_formats()
    {
        $pm_output = '';

        if (get_post_format() == 'image') {
            $pm_featured_image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
            $pm_output .= '<img src="' . aq_resize($pm_featured_image_url, 1170, 520, true, true, true) . '" alt="">';
        } elseif (get_post_format() == 'video') {
            $pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);
            $pm_output .= (isset($pm_post_options['video_iframe']) ? $pm_post_options['video_iframe'] : '');
        } else {
            $pm_featured_image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
            $pm_output .= '<img class="aligncenter" src="' . $pm_featured_image_url . '" alt="">';
        }

        return $pm_output;
    }
}

if (!function_exists('pm_get_portfolio_filter')) {
    function pm_get_portfolio_filter()
    {
        $pm_output = '';
        $args = array('taxonomy' => 'Category');
        $terms = get_terms('portfolio_category', $args);

        if (count($terms) > 0) {
            $pm_output .= '
            <li class="filter-item is-checked">';

            $pm_output .= '
                <a href="#filter" data-category="*" class="is-checked">' . __('All Photos', 'pm_local') . '</a>
            </li>';

            if (is_array($terms)) {
                foreach ($terms as $term) {

                    $catname = strtr($term->name, array(
                        ' ' => '-',
                    ));
                    $catname = strtolower($catname);

                    $pm_output .= '
                    <li class="filter-item">';

                    $pm_output .= '
                        <a href="#filter" data-category=".' . $catname . '">' . $term->name . '</a>
                    </li>
                    ';
                }
            }
            return '<ul id="filters" class="menu filters clearfix">' . $pm_output . '</ul>';
        }
    }
}

if (!function_exists('pm_comment')) {
    function pm_comment($comment, $args, $depth)
    {
        $max_depth_comment = ($args['max_depth'] > 1 ? 1 : $args['max_depth']);
        $GLOBALS['comment'] = $comment; ?>

        <div <?php comment_class('comment_box'); ?>>
            <?php echo get_avatar($comment->comment_author_email, 65); ?>

            <div class="comment_body">
                <p class="subscriber"><?php printf('%1$s', get_comment_date("F d, Y")) ?>, <?php printf('%s', get_comment_author_link()) ?> <?php edit_comment_link('(Edit)', '  ', '') ?></p>


                <?php if ($comment->comment_approved == '0') { ?>
                    <p class="comment_content"><em><?php _e('Your comment is awaiting moderation.', 'pm_local'); ?></em>
                    </p>
                <?php } else {
                    comment_text();
                } ?>
            </div>

        </div>
    <?php
    }
}

if (!function_exists('pm_get_text_truncate')) {
    function pm_get_text_truncate($string, $length, $strip_shortcodes = true, $strip_tags = true, $break_words = false)
    {
        if ($length == 0) {
            return '';
        }
        if ($strip_shortcodes == true) {
            $string = strip_shortcodes($string);
        }
        if ($strip_tags == true) {
            $string = strip_tags($string);
        }

        if (mb_strlen($string, 'utf8') > $length) {
            $length -= mb_strlen("... ", 'utf8');
            if (!$break_words) {
                $string = preg_replace('/\s+\S+\s*$/su', '', mb_substr($string, 0, $length + 1, 'utf8'));
            }
            return mb_substr($string, 0, $length, 'utf8') . "... ";
        } else {
            return $string;
        }
    }
}