<?php

/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*/

class pmAdminOptions
{
    public function __construct()
    {
        $this->options = array();
    }

    # Add Option
    public function addOption($array)
    {
        if (isset($this->options[$array['name']])) {
            die('This Option Name (' . $array['name'] . ') is Already Exist.');
        }

        if (!isset($array['type']) || strlen($array['type']) < 1) {
            return __("'type' can't be an empty.", "pm_local");
        }

        if (!isset($array['default'])) {
            return __("'default' can't be an empty.", "pm_local");
        }

        if ((!isset($array['name']) || strlen($array['name']) < 1) && $array['type'] !== "input_checkbox") {
            return __("'name' can't be an empty.", "pm_local");
        }

        $pm_options = get_option(PMTHEMEPREFIX . "pm_options");

        if (!isset($pm_options[$array['name']])) {
            pm_update_option($array['name'], $array['default']);
            pm_update_option("marker_for_recompile_custom_files", 'yes');
        }

        $this->options[$array['name']] = $array;
    }

    # Get Option
    public function getOption($name)
    {
        return $this->options[$name];
    }

    # Save All Options
    public function saveAllDefaultValues()
    {
        if (is_array($this->options)) {
            foreach ($this->options as $option) {
                if (isset($option['name']) && isset($option['default'])) {
                    pm_update_option($option['name'], $option['default']);
                } else {
                    die("'name' or 'default' empty.");
                }
            }
        }
    }

    # Get Rendered Option
    public function getRenderedOption($name)
    {
        $option = $this->getOption($name);

        $pm_compile = '<div class="pm_admin_option pm_type_' . $option['type'] . ' pm_option_name_' . $option['name'] . '">';

        switch ($option['type']) {

            case "input_text":
                $pm_compile .= "<h3>" . $option['title'] . "</h3>";
                $pm_compile .= "<input class='pm_input' name='" . $option['name'] . "' type='text' placeholder='" . $option['placeholder'] . "' value='" . esc_attr(pm_get_option($option['name'], $option['default'])) . "'>";
                break;

            case "input_social":
                $pm_compile .= "<h3>" . $option['title'] . "</h3>";
                $pm_compile .= "<i class='" . $option['icon'] . "'></i> <input class='pm_input' name='" . $option['name'] . "' type='text' placeholder='" . $option['placeholder'] . "' value='" . esc_attr(pm_get_option($option['name'], $option['default'])) . "'>";
                break;

            case "input_radio":
                $pm_compile .= "<h3>" . $option['title'] . "</h3>";
                foreach ($option['variants'] as $key => $value) {
                    $pm_compile .= "<div class='pm_stand_radio_option'><input class='pm_input pm_radio' id='" . $option['name'] . "_" . $key . "' name='" . $option['name'] . "' type='radio' value='" . $key . "' " . (pm_get_option($option['name'], $option['default']) == $key ? "checked" : "") . "> <label for='" . $option['name'] . "_" . $key . "'>$value</label></div>";
                }
                break;

            case "input_range":
                $pm_compile .= "<h3>" . $option['title'] . "</h3>";
                $pm_compile .= "<input id='pm_range_" . $option['name'] . "' onchange=\"pm_copy_value('pm_range_" . $option['name'] . "','pm_range_" . $option['name'] . "_preview')\" min='" . $option['min'] . "' max='" . $option['max'] . "' class='pm_range' name='" . $option['name'] . "' type='range' value='" . esc_attr(pm_get_option($option['name'], $option['default'])) . "'>";
                $pm_compile .= "<div class='pm_range_result_preview' id='pm_range_" . $option['name'] . "_preview'><span>" . esc_attr(pm_get_option($option['name'], $option['default'])) . "</span>" . $option['units'] . "</div>";
                break;

            case "select":
                $pm_compile .= "<h3>" . $option['title'] . "</h3>";
                $pm_compile .= "<select class='pm_select' name='" . $option['name'] . "'>";
                foreach ($option['options'] as $key => $value) {
                    $pm_compile .= "<option value='$key' " . (pm_get_option($option['name'], $option['default']) == $key ? "selected" : "") . ">$value</option>";
                }
                $pm_compile .= "</select>";
                break;

            case "textarea":
                $pm_compile .= "<h3>" . $option['title'] . "</h3>";
                $pm_compile .= "<textarea class='pm_textarea' rows='10' cols='45' name='" . $option['name'] . "'>" . esc_attr(pm_get_option($option['name'], $option['default'])) . "</textarea>";
                break;

            case "image":
                wp_enqueue_media();
                wp_enqueue_style('wp-color-picker');
                wp_enqueue_script('wp-color-picker');

                if (wp_get_attachment_url(pm_get_option($option['name']))) {
                    $pm_compile .= "<h3>" . $option['title'] . "</h3>";
                    $pm_compile .= "
                <div>
                    <div class='pm_preview_cont'>
                        <img src='" . wp_get_attachment_url(pm_get_option($option['name'])) . "' alt=''>
                    </div>
                    <input type='hidden' value='" . pm_get_option($option['name']) . "' name='" . $option['name'] . "'>
                    <input data-pm_popup_button_text='" . $option['popup_button_text'] . "' data-pm_popup_title='" . $option['popup_title'] . "' type='button' class='pm_button pm_admin_option_image_wp_media' value='" . $option['init_button_text'] . "'>
                    <input type='button' class='pm_button pm_remove_image pm_button_second' value='&nbsp;&nbsp;'>
                </div>
                ";
                } else {
                    $pm_compile .= "<h3>" . $option['title'] . "</h3>";
                    $pm_compile .= "
                <div>
                    <div class='pm_preview_cont'>
                        <img src='" . pm_get_option($option['name']) . "' alt=''>
                    </div>
                    <input data-pm_popup_button_text='" . $option['popup_button_text'] . "' data-pm_popup_title='" . $option['popup_title'] . "' type='button' class='pm_button pm_admin_option_image_wp_media' value='" . $option['init_button_text'] . "'>
                    <input type='button' class='pm_button pm_remove_image pm_button_second' value='&nbsp;&nbsp;'>
                    <input type='hidden' value='" . pm_get_option($option['name']) . "' name='" . $option['name'] . "'>
                </div>
                ";
                }
                break;

            case "input_color":
                wp_enqueue_style('wp-color-picker');
                wp_enqueue_script('wp-color-picker');

                $pm_compile .= "<h3>" . $option['title'] . "</h3>";
                $pm_compile .= "
                <input type='text' class='pm_input pm_input_color' name='" . $option['name'] . "' value='" . esc_attr(pm_get_option($option['name'], $option['default'])) . "'>
            ";
                break;
        }

        if (isset($option['description']) && strlen($option['description']) > 0) {
            $pm_compile .= "<div class='pm_admin_option_description'>" . $option['description'] . "</div>";
        }
        $pm_compile .= '</div>';

        return $pm_compile;
    }

    # PRE PRE PREP REPRPERPERE!
    public function preOptions()
    {
        echo '<pre>';
        print_r($this->options);
        echo '</pre>';
    }
}