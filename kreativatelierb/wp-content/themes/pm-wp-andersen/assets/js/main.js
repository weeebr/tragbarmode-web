(function ($) {
    "use strict";
    function pm_soc_block() {
        var pm_hided_icons_w = jQuery('.header_line .pm_hided_icons').width();
        jQuery('.header_line > .pm_inner').css('right', -1 * pm_hided_icons_w - 3 + 'px');
    }

    function pm_border_style_height() {
        var window_width = $(window).width();
        var window_height = $(window).height();
        var header_height = $("header").outerHeight(true);
        var content_margin_right = (window_width - $(".content").width()) / 2;
        var content_container_height = window_height - header_height - content_margin_right;
        $(".border_style .content.container, .border_style .featured_image_block").height(content_container_height + "px");
        $(".border_style .texts_area").height(content_container_height - 26 + "px");
    }

    function pm_thumbs_gallery() {
        var pm_gallery = $('.pm_gallery');
        if (pm_gallery.size() > 0) {

            if ($(window).height() > 750) {
                var data_thumbs_count = parseInt(pm_gallery.attr('data-thumbs-count'));
            } else {
                var data_thumbs_count = parseInt(pm_gallery.attr('data-min-thumbs-count'));
            }

            var data_thumbs_border_size = parseInt(pm_gallery.attr('data-thumbs-border-size'));
            var supersized_height = $('#supersized').height();
            var thumb_height = (supersized_height - data_thumbs_border_size * (data_thumbs_count - 1)) / data_thumbs_count;
            var thumbs_with_border_size = thumb_height + data_thumbs_border_size;

            $('#mCSB_1_container').css('height', supersized_height + 'px');
            $('#thumb-tray').find('li').css('width', thumb_height + 'px').css('height', thumb_height + 'px').css('margin-bottom', data_thumbs_border_size + 'px');
            $('.gallery_type_1 #supersized').css('width', 'calc(96% - ' + thumbs_with_border_size + 'px)');

            var thumb_item = $('#thumb-tray').find('li');

            $('#thumb-back').height($(thumb_item).height()).css('margin-left', ($(thumb_item).width() - $('#thumb-back').width()) / 2);
            $('#thumb-forward').height($(thumb_item).height()).css('margin-left', ($(thumb_item).width() - $('#thumb-back').width()) / 2);
        }
    }

    function pm_div_valign(valigned_div, parent_div) {
        var valigned_div = $('.' + valigned_div);

        if (valigned_div.size() > 0) {
            var data_valign_parent_div = valigned_div.attr('data-valign-parent-div');
            var data_valign_bottom_padding = valigned_div.attr('data-valign-bottom-padding');
            var valigned_div_height = valigned_div.height();
            var parent_div_height = valigned_div.parents('.' + data_valign_parent_div).height();
            var valigned_div_margin_top = (parent_div_height / 2) - (valigned_div_height / 2);

            valigned_div.css('margin-top', valigned_div_margin_top + 'px');
        }
    }

    /* Document Ready */
    $(document).ready(function () {
        var window_w = jQuery(window).width();

        $('.html_oh').parents('html').css('overflow', 'hidden');
        pm_div_valign('valign_center', 'container');

        /* MOBILE MENU */
        if (window_w < 737) {
            jQuery('.floating_container').removeClass('floating_container').addClass('menu_mobyle').css('display', 'none');
            jQuery('.second_lvl').removeClass('second_lvl').addClass('second_lvl_mobile');
            jQuery('.third_lvl').removeClass('third_lvl').addClass('third_lvl_mobile');

            jQuery('.menu_toggler').click(function () {
                jQuery('.menu_mobyle').slideToggle(1000);
            });
            jQuery('.menu-item-has-children a').click(function () {
                jQuery(this).parent().find('.second_lvl_mobile').slideToggle(1000);
                jQuery(this).parent().toggleClass('opened');
            });
            jQuery('.menu-item-2-level-has-children').click(function () {
                jQuery(this).find('.third_lvl_mobile').slideToggle(1000);
            });
        }

        //MENU HOVER
        jQuery('.menu-item-has-children').hover(function () {
            jQuery(this).find('.second_lvl').css('display', 'block');
        }, function () {
            jQuery(this).find('.second_lvl').css('display', 'none');
        });

        jQuery('.menu-item-2-level-has-children').hover(function () {
            jQuery(this).find('.third_lvl').css('display', 'block');
        }, function () {
            jQuery(this).find('.third_lvl').css('display', 'none');
        });

        $('.pm_share_cont .fa-share').click(function () {
            $(this).parents('.header_line').toggleClass('showed_socials_cont');
        });

        jQuery('.pm_toggacc_heading').click(function () {
            jQuery(this).next().slideToggle(300);
        });

        jQuery('.pm_toggacc_heading:first').next().slideToggle(300);

        pm_soc_block();
    });

    /* Window Load */
    $(window).load(function () {
        var customScrollInitClasses = $(".texts_area, .cscrollbar");
        if (customScrollInitClasses.size() > 0) {
            customScrollInitClasses.mCustomScrollbar({
                autoHideScrollbar: true,
                scrollInertia: 300
            });
        }

        $(".preloader_active").fadeOut();

        pm_border_style_height();
        pm_thumbs_gallery();
        pm_div_valign('valign_center', 'container');

        var pm_gallery = $('.pm_gallery');
        if (pm_gallery.size() > 0) {

            if ($(window).height() > 750) {
                var data_thumbs_count = parseInt(pm_gallery.attr('data-thumbs-count'));
            } else {
                var data_thumbs_count = parseInt(pm_gallery.attr('data-min-thumbs-count'));
            }

            var isAnimating = false;
        }

        //Slide Up
        $('#thumb-back').click(function () {
            var data_thumbs_border_size = parseInt(pm_gallery.attr('data-thumbs-border-size')),
                supersized_height = $('#supersized').height(),
                thumb_height = (supersized_height - data_thumbs_border_size * (data_thumbs_count - 1)) / data_thumbs_count,
                thumb_height = (supersized_height - data_thumbs_border_size * (data_thumbs_count - 1)) / data_thumbs_count,
                thumbs_with_border_size = thumb_height + data_thumbs_border_size,
                scroll_thumbs = jQuery('.supersized_here').attr('data-thumbs-scrolling-per-click'),
                a = $('#thumb-list').height(),
                top_point = ($('#thumb-list').css('top')),
                scroll_thumbs = jQuery('.supersized_here').attr('data-thumbs-scrolling-per-click'),
                increment = supersized_height + 10;

            if (parseInt(top_point) > -1 * (a - supersized_height - thumbs_with_border_size) - 10) {
                var rest_step = a - increment + (parseInt(top_point));

                if ((rest_step / increment) > 1) {
                    if (!isAnimating) {
                        $('#thumb-list').animate({
                            top: "-=" + increment,
                            queue: true
                        }, "swing", function () {
                            isAnimating = false;
                        });
                        isAnimating = true;
                    }
                } else {
                    if (!isAnimating) {
                        $('#thumb-list').animate({
                            top: "-=" + (rest_step + 10),
                            queue: true
                        }, "swing", function () {
                            isAnimating = false;
                        });
                        isAnimating = true;
                    }
                }
            }
        });

        //Slide Down
        $('#thumb-forward').click(function () {
            var data_thumbs_border_size = parseInt(pm_gallery.attr('data-thumbs-border-size')),
                supersized_height = $('#supersized').height(),
                thumb_height = (supersized_height - data_thumbs_border_size * (data_thumbs_count - 1)) / data_thumbs_count,
                thumb_height = (supersized_height - data_thumbs_border_size * (data_thumbs_count - 1)) / data_thumbs_count,
                thumbs_with_border_size = thumb_height + data_thumbs_border_size,
                scroll_thumbs = jQuery('.supersized_here').attr('data-thumbs-scrolling-per-click'),
                a = $('#thumb-list').height(),
                top_point = ($('#thumb-list').css('top')),
                scroll_thumbs = jQuery('.supersized_here').attr('data-thumbs-scrolling-per-click'),
                increment = supersized_height + 10;

            if (parseInt(top_point) < 0) {
                var rest_step = Math.abs(parseInt(top_point));

                if ((rest_step / increment) > 1) {
                    if (!isAnimating) {
                        $('#thumb-list').animate({
                            top: "+=" + increment,
                            queue: true
                        }, "swing", function () {
                            isAnimating = false;
                        });
                        isAnimating = true;
                    }
                } else {
                    if (!isAnimating) {
                        $('#thumb-list').animate({
                            top: "+=" + rest_step,
                            queue: true
                        }, "swing", function () {
                            isAnimating = false;
                        });
                        isAnimating = true;
                    }
                }
            }
        });
    });

    /* Window Resize */
    $(window).resize(function () {
        pm_border_style_height();
        pm_thumbs_gallery();
        pm_div_valign('valign_center', 'container');

        $('#thumb-list').css('top', '0');

        var window_w = jQuery(window).width();

        if (window_w < 737) {
            jQuery('.floating_container').removeClass('floating_container').addClass('menu_mobyle').css('display', 'none');
            jQuery('.second_lvl').removeClass('second_lvl').addClass('second_lvl_mobile');
            jQuery('.third_lvl').removeClass('third_lvl').addClass('third_lvl_mobile');
        } else {
            jQuery('.menu_mobyle').removeClass('menu_mobyle').addClass('floating_container').css('display', 'block');
            jQuery('.second_lvl_mobile').removeClass('second_lvl_mobile').addClass('second_lvl').css('display', 'none');
            jQuery('.third_lvl_mobile').removeClass('third_lvl_mobile').addClass('third_lvl').css('display', 'none');
        }
        pm_soc_block();
    });
})(jQuery);