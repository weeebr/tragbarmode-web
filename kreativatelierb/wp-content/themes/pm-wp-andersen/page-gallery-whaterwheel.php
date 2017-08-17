<?php
/*
*** Created by Pixel Mafia ***
*** www.pixel-mafia.com ***
*** Template Name: Gallery - WhaterWheel
*/

get_header();
the_post();
$pm_post_options = get_post_meta(get_the_ID(), PMTHEMEPREFIX . 'post_options', true);
wp_enqueue_script('reflection', PMJSURL . 'reflection.js', array(), false, true);
?>

    <!-- Content -->
    <div class="content container">
        <div class="row">
            <div class="span12 whaterWheel_content">
                <div id="carousel">
                    <?php
                    if (isset($pm_post_options['gallery_images']) && is_array($pm_post_options['gallery_images'])) {
                        $i = 1;
                        if (count($pm_post_options['gallery_images']) < 5) {
                            echo '<div class="tac">' . __('Please select at least 5 photos.', 'pm_local') . '</div>';
                        } else {
                            foreach ($pm_post_options['gallery_images'] as $pm_attach_id) {
                                echo "
                            <div class='item_block' id='item_block$i' data-count='$i'>
                                <div class='item_wrapper'>
                                    <a href='javascript:void(0)' class='item_link' data-count='$i'>
                                        <img src='" . aq_resize(wp_get_attachment_url($pm_attach_id), 980, 980, true, true, true) . "' alt='pic-$i'/>
                                    </a>
                                </div>
                            </div>
                            ";
                                $i++;
                            }
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="preloader_active"></div>

    <script type="text/javascript">
        jQuery(document).ready(function (e) {
            "use strict";
            var item_number = jQuery('.item_block').size(),
                window_w = jQuery(window).width();

            if (window_w < 737) {
                jQuery('html').css('overflow', 'visible');
            }

            jQuery(document).ready(function ($) {
                carousel_setup();
                jQuery('.item_link').click(function () {
                    move_carousel(parseInt(jQuery(this).attr('data-count')))
                });

                jQuery(document.documentElement).keyup(function (event) {
                    //Left Arrow
                    if (event.keyCode == 37) {
                        prev_slide();
                        //Right Arrow
                    } else if (event.keyCode == 39) {
                        next_slide();
                    }
                });
            });

            function next_slide() {
                var current_slide = parseInt(jQuery('.current').attr('data-count'));
                current_slide++;
                if (current_slide > item_number) current_slide = 1;
                if (current_slide < 1) current_slide = item_number;
                move_carousel(current_slide);
            }

            function prev_slide() {
                var current_slide = parseInt(jQuery('.current').attr('data-count'));
                current_slide--;
                if (current_slide > item_number) current_slide = 1;
                if (current_slide < 1) current_slide = item_number;
                move_carousel(current_slide);
            }

            jQuery(window).load(function () {
                carousel_setup();
                setTimeout(carousel_setup(), 500);
            });
            jQuery(window).resize(function () {
                carousel_setup();
                setTimeout(carousel_setup(), 500);
            });

            function move_carousel(cur) {
                var whaterWheel = jQuery("#carousel"),
                    window_w = jQuery(window).width(),
                    a = 1,
                    b = 0,
                    c = 0,
                    d = 0;

                if (window_w > 1025) {
                    whaterWheel.find('img').unreflect();
                }
                if (window_w > 960) {
                    a = 1;
                    b = 0.78;
                    c = 0.6;
                    d = 0.5;
                } else if (window_w > 760 && window_w < 960) {
                    a = 0.75;
                    b = 0.6;
                    c = 0.5;
                    d = 0.4;
                } else if (window_w < 760) {
                    a = 0.75;
                    b = 0.6;
                    c = 0.5;
                    d = 0.4;
                }

                jQuery('.prev3').removeClass('prev3');
                jQuery('.prev2').removeClass('prev2');
                jQuery('.prev').removeClass('prev');
                jQuery('.current').removeClass('current');
                jQuery('.next').removeClass('next');
                jQuery('.next2').removeClass('next2');
                jQuery('.next3').removeClass('next3');
                jQuery('#item_block' + cur).addClass('current');
                if (whaterWheel.hasClass('type5')) {
                    if ((cur + 1) > item_number) {
                        jQuery('#item_block1').addClass('next');
                        jQuery('#item_block2').addClass('next2');
                    } else if ((cur + 1) == item_number) {
                        jQuery('#item_block' + item_number).addClass('next');
                        jQuery('#item_block1').addClass('next2');
                    } else {
                        jQuery('#item_block' + (cur + 1)).addClass('next');
                        jQuery('#item_block' + (cur + 2)).addClass('next2');
                    }
                    if ((cur - 1) < 1) {
                        jQuery('#item_block' + item_number).addClass('prev');
                        jQuery('#item_block' + (item_number - 1)).addClass('prev2');
                    } else if ((cur - 1) == 1) {
                        jQuery('#item_block1').addClass('prev');
                        jQuery('#item_block' + item_number).addClass('prev2');
                    } else {
                        jQuery('#item_block' + (cur - 1)).addClass('prev');
                        jQuery('#item_block' + (cur - 2)).addClass('prev2');
                    }
                }
                else if (whaterWheel.hasClass('type7')) {
                    if ((cur + 1) > item_number) {
                        jQuery('#item_block1').addClass('next');
                        jQuery('#item_block2').addClass('next2');
                        jQuery('#item_block3').addClass('next3');
                    } else if ((cur + 1) == (item_number - 1)) {
                        jQuery('#item_block' + (item_number - 1)).addClass('next');
                        jQuery('#item_block' + (item_number)).addClass('next2');
                        jQuery('#item_block1').addClass('next3');
                    } else if ((cur + 1) == item_number) {
                        jQuery('#item_block' + item_number).addClass('next');
                        jQuery('#item_block1').addClass('next2');
                        jQuery('#item_block2').addClass('next3');
                    } else {
                        jQuery('#item_block' + (cur + 1)).addClass('next');
                        jQuery('#item_block' + (cur + 2)).addClass('next2');
                        jQuery('#item_block' + (cur + 3)).addClass('next3');
                    }
                    if ((cur - 1) < 1) {
                        jQuery('#item_block' + item_number).addClass('prev');
                        jQuery('#item_block' + (item_number - 1)).addClass('prev2');
                        jQuery('#item_block' + (item_number - 2)).addClass('prev3');
                    } else if ((cur - 2) == 1) {
                        jQuery('#item_block' + (cur - 1)).addClass('prev');
                        jQuery('#item_block' + (cur - 2)).addClass('prev2');
                        jQuery('#item_block' + item_number).addClass('prev3');
                    } else if ((cur - 1) == 1) {
                        jQuery('#item_block' + (cur - 1)).addClass('prev');
                        jQuery('#item_block' + (item_number)).addClass('prev2');
                        jQuery('#item_block' + (item_number - 1)).addClass('prev3');
                    } else {
                        jQuery('#item_block' + (cur - 1)).addClass('prev');
                        jQuery('#item_block' + (cur - 2)).addClass('prev2');
                        jQuery('#item_block' + (cur - 3)).addClass('prev3');
                    }
                }

                var cur_block_w = jQuery('.item_block.current').width();

                jQuery('.item_block.next').width(cur_block_w);
                jQuery('.item_block.next2').width(cur_block_w);
                jQuery('.item_block.next3').width(cur_block_w);

                jQuery('.prev3').css('margin-left', -1 * (jQuery('.current').width() / 2) - jQuery('.current').width() * b / 1.333 - jQuery('.current').width() * c / 1.333 - jQuery('.current').width() * d / 1.333);
                jQuery('.prev2').css('margin-left', -1 * (jQuery('.current').width() / 2) - jQuery('.current').width() * b / 1.333 - jQuery('.current').width() * c / 1.333);
                jQuery('.prev').css('margin-left', -1 * (jQuery('.current').width() / 2) - jQuery('.current').width() * b / 1.333);
                jQuery('.current').css('margin-left', -1 * (jQuery('.current').width() / 2));
                jQuery('.next').css('margin-left', -1 * (jQuery('.current').width() / 2) + jQuery('.current').width() * b / 1.333);
                jQuery('.next2').css('margin-left', -1 * (jQuery('.current').width() / 2) + jQuery('.current').width() * b / 1.333 + jQuery('.current').width() * c / 1.333);
                jQuery('.next3').css('margin-left', -1 * (jQuery('.current').width() / 2) + jQuery('.current').width() * b / 1.333 + jQuery('.current').width() * c / 1.333 + jQuery('.current').width() * d / 1.333);
                jQuery('.img_title').text(jQuery('.current').attr('data-title'));
                if (window_w > 1025) {
                    whaterWheel.find('img').reflect({height: 0.2, opacity: 0.3});
                    whaterWheel.find('canvas').each(function () {
                        jQuery(this).width(jQuery(this).prev('img').width());
                    });
                }
            }

            function carousel_setup() {
                var whaterWheel = jQuery("#carousel"),
                    window_w = jQuery(window).width(),
                    window_h = jQuery(window).height(),
                    header = jQuery('header'),
                    a = 1,
                    b = 0,
                    c = 0,
                    d = 0;

                if (window_w > 1025) {
                    whaterWheel.find('img').unreflect();
                }
                if (window_w > 960) {
                    a = 1;
                    b = 0.78;
                    c = 0.6;
                    d = 0.5;
                } else if (window_w > 760 && window_w < 960) {
                    a = 0.75;
                    b = 0.6;
                    c = 0.5;
                    d = 0.4;
                } else if (window_w < 760) {
                    a = 0.75;
                    b = 0.6;
                    c = 0.5;
                    d = 0.4;
                }

                var carousel_height = (window_h - header.height() - 1) * a;
                var carousel_width = window_w;
                whaterWheel.height(carousel_height * 0.57).width(carousel_width * 0.958).css({
                    'margin-top': carousel_height * 0.11,
                    'margin-bottom': carousel_height * 0.15
                });
                whaterWheel.width(carousel_width * 0.958);
                whaterWheel.height((window_h - header.height()) * 0.57);

                if (jQuery('.current').size() < 1) {
                    if (whaterWheel.find('.item_block').size() > 6) {
                        whaterWheel.addClass('type7');
                        jQuery('#item_block1').addClass('prev3');
                        jQuery('#item_block2').addClass('prev2');
                        jQuery('#item_block3').addClass('prev');
                        jQuery('#item_block4').addClass('current');
                        jQuery('#item_block5').addClass('next');
                        jQuery('#item_block6').addClass('next2');
                        jQuery('#item_block7').addClass('next3');
                    }
                    else if (whaterWheel.find('.item_block').size() > 4) {
                        whaterWheel.addClass('type5');
                        jQuery('#item_block1').addClass('prev2');
                        jQuery('#item_block2').addClass('prev');
                        jQuery('#item_block3').addClass('current');
                        jQuery('#item_block4').addClass('next');
                        jQuery('#item_block5').addClass('next2');
                    } else if (whaterWheel.find('.item_block').size() > 2) {
                        whaterWheel.addClass('type3');
                        jQuery('#item_block1').addClass('prev');
                        jQuery('#item_block2').addClass('current');
                        jQuery('#item_block3').addClass('next');
                    } else if (whaterWheel.find('.item_block').size() == 2) {
                        whaterWheel.addClass('type2');
                        jQuery('#item_block1').addClass('current');
                        jQuery('#item_block2').addClass('next');
                    } else if (whaterWheel.find('.item_block').size() == 1) {
                        whaterWheel.addClass('type1');
                        jQuery('#item_block1').addClass('current');
                    }
                }

                var cur_block_w = jQuery('.item_block.current').width();

                jQuery('.item_block.next').width(cur_block_w);
                jQuery('.item_block.next2').width(cur_block_w);
                jQuery('.item_block.next3').width(cur_block_w);

                jQuery('.prev3').css('margin-left', -1 * (jQuery('.current').width() / 2) - jQuery('.current').width() * b / 1.333 - jQuery('.current').width() * c / 1.333 - jQuery('.current').width() * d / 1.333);
                jQuery('.prev2').css('margin-left', -1 * (jQuery('.current').width() / 2) - jQuery('.current').width() * b / 1.333 - jQuery('.current').width() * c / 1.333);
                jQuery('.prev').css('margin-left', -1 * (jQuery('.current').width() / 2) - jQuery('.current').width() * b / 1.333);
                jQuery('.current').css('margin-left', -1 * (jQuery('.current').width() / 2));
                jQuery('.next').css('margin-left', -1 * (jQuery('.current').width() / 2) + jQuery('.current').width() * b / 1.333);
                jQuery('.next2').css('margin-left', -1 * (jQuery('.current').width() / 2) + jQuery('.current').width() * b / 1.333 + jQuery('.current').width() * c / 1.333);
                jQuery('.next3').css('margin-left', -1 * (jQuery('.current').width() / 2) + jQuery('.current').width() * b / 1.333 + jQuery('.current').width() * c / 1.333 + jQuery('.current').width() * d / 1.333);
                jQuery('.img_title').text(jQuery('.current').attr('data-title'));
                if (window_w > 1025) {
                    whaterWheel.find('img').reflect({height: 0.2, opacity: 0.3});
                    whaterWheel.find('canvas').each(function () {
                        jQuery(this).width(jQuery(this).prev('img').width());
                    });
                }
            }
        });
    </script>
<?php

get_footer();