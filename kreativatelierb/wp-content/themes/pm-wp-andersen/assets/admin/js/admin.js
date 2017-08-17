"use strict";
function pm_copy_value(from_id, to_id) {
    var from_id_val = jQuery('#' + from_id).val();
    jQuery('#' + to_id).find('span').text(from_id_val);
}

jQuery(document).ready(function () {
    function pm_hide_saved_message() {
        jQuery('.pm_save_status, .pm_reset_status').css('opacity', '0');
    }

    jQuery('.pm_menu li').click(function () {
        var pm_menu_index = parseInt(jQuery(this).index());
        jQuery('.pm_menu li.active').removeClass("active");
        jQuery(this).addClass("active");
        jQuery('.pm_admin_content .pm_hideable div.active').removeClass("active");
        jQuery('.pm_admin_content .pm_hideable > div:eq(' + pm_menu_index + ')').addClass("active");
    });

    jQuery('.pm_reset_admin_options input').click(function () {
        event.preventDefault();

        if (!confirm("Are You Sure?")) {
            return false;
        }

        jQuery('body, .pm_reset_admin_options input').css('cursor', 'wait');
        jQuery('.pm_reset_admin_options input').css('opacity', '0');

        jQuery.post(pm_admin_ajax_url, {
            action: 'pm_reset_admin_options'
        }, function (response) {
            jQuery('body').css('cursor', 'default');
            jQuery('.pm_reset_admin_options input').css('cursor', 'pointer').css('opacity', '1');
            jQuery('.pm_reset_status').css('opacity', '1');
            window.location = window.location.href;
            setTimeout(pm_hide_saved_message, 2000);
        });
    });

    jQuery(".pm_admin_form").submit(function (event) {
        event.preventDefault();
        jQuery('body, .pm_save_admin_options input').css('cursor', 'wait');
        jQuery('.pm_save_admin_options input').css('opacity', '0');
        var pm_admin_form = jQuery(this);

        jQuery.post(pm_admin_ajax_url, {
            action: 'pm_save_admin_options',
            serialize_string: JSON.stringify(pm_admin_form.serializeArray())
        }, function (response) {
            jQuery('body').css('cursor', 'default');
            jQuery('.pm_save_admin_options input').css('cursor', 'pointer').css('opacity', '1');
            jQuery('.pm_save_status').css('opacity', '1');
            setTimeout(pm_hide_saved_message, 2000);
        });
    });

    jQuery('.pm_add_custom_field').live('click', function (event) {
        jQuery(this).prev().append('<li><input type="text" name="' + jQuery(this).attr("data-name") + '[]"> <span class="pm_remove_custom_field">[Remove]</span> <span class="pm_remove_custom_field">[Drag]</span></li>');
    });

    jQuery('.pm_remove_custom_field').live('click', function (event) {
        jQuery(this).parents('li').remove();
    });

    jQuery('.pm_admin_option_image_wp_media').live('click', function (event) {
        var pm_select_image_from_media_this = jQuery(this);
        var pm_admin_option_image_wp_media_parent_div = jQuery(this).parent();
        var pm_popup_title = jQuery(this).attr("data-pm_popup_title");
        var pm_popup_button_text = jQuery(this).attr("data-pm_popup_button_text");
        event.preventDefault();

        var file_frame = wp.media.frames.file_frame = wp.media({
            title: pm_popup_title,
            button: {
                text: pm_popup_button_text,
            },
            multiple: false,
            library: {
                type: 'image'
            }
        });

        file_frame.on('select', function () {
            var pm_attachment = file_frame.state().get('selection').first().toJSON();
            pm_admin_option_image_wp_media_parent_div.find("input[type=hidden]").val(pm_attachment.id);
            pm_admin_option_image_wp_media_parent_div.find(".pm_preview_cont").find("img").remove();
            pm_admin_option_image_wp_media_parent_div.find(".pm_preview_cont").html("<img src='" + pm_attachment.url + "' alt=''>");
        });

        file_frame.open();
    });

    jQuery('.pm_admin_option_images_multiple_wp_media').live('click', function (event) {
        var pm_select_images_from_media_this = jQuery(this);
        var pm_admin_option_images_multiple_wp_media_parent_div = jQuery(this).parent();
        event.preventDefault();

        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select Images',
            button: {
                text: 'Select',
            },
            multiple: true,
            library: {
                type: 'image'
            }
        });

        file_frame.on('select', function () {
            var selection = file_frame.state().get('selection');
            selection.map(function (pm_attachment) {
                pm_attachment = pm_attachment.toJSON();
                pm_admin_option_images_multiple_wp_media_parent_div.find(".pm_preview_images").append('<li style="background-image:url(' + pm_attachment.sizes.medium.url + ');"><input type="hidden" name="' + pm_select_images_from_media_this.attr('data-name') + '[]' + '" value="' + pm_attachment.id + '"><div class="pm_remove"></div></li>');
            });
        });

        file_frame.open();
    });

    jQuery('.pm_remove_image').live('click', function (event) {
        jQuery(this).parent().find("input[type=hidden]").val("");
        jQuery(this).parent().find(".pm_preview_cont").html("");
    });

    jQuery('.pm_preview_images li .pm_remove').live('click', function (event) {
        jQuery(this).parent().remove();
    });

    if (jQuery('.pm_input_color').size() > 0) {
        jQuery(".pm_input_color").wpColorPicker();
    }

    jQuery('.pm_sortable').sortable();
});