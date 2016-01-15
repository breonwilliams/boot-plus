<?php


function clean_shortcodes($content) {   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']',
        '<p><span>[' => '[', 
        ']</span></p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'clean_shortcodes');



/* Full Width Color Section */

function color_section( $atts, $content = null ) {

   $atts = shortcode_atts(
        array(
            'bgcolor' => '',
            'class' => '',
        ), $atts, 'color_section' );


   $bgcolor = $atts['bgcolor'];
   $class = $atts['class'];
   
   return '<section class="'.$class.'" style="background-color: '.$bgcolor.';"><div class="container">' . do_shortcode($content) . '</div></section>';

}

add_shortcode('color_section', 'color_section');

/* Full Width Image Section */
function img_section( $atts, $content = null ) {

   $atts = shortcode_atts(
        array(
            'bgimg' => '',
            'overlay' => '',
            'class' => '',
        ), $atts, 'img_section' );


   $bgimg = $atts['bgimg'];
   $overlay = $atts['overlay'];
   $class = $atts['class'];
   
   return '

   <section class="bg-img" style="background-image: url('.$bgimg.');">
        <div class="'.$class.'" style="background:'.$overlay.';">
            <div class="container">
                ' . do_shortcode($content) . '
            </div>
        </div>
    </section>

    ';

}

add_shortcode('img_section', 'img_section');

/* Custom Div */

function custom_div( $atts, $content = null ) {

   $atts = shortcode_atts(
        array(
            'class' => '',
        ), $atts, 'custom_div' );

   $class = $atts['class'];
   
   return '<div class="'.$class.'" >' . do_shortcode($content) . '</div>';

}

add_shortcode('custom_div', 'custom_div');

/*full width background color end*/



/* Background Video */

function background_vid( $atts, $content = null ) {
    wp_enqueue_script( 'bgvid' );  
    wp_enqueue_script( 'bgvid-js' ); 

    $atts = shortcode_atts(
        array(
            'poster' => '',
            'mp4' => '',
            'padding' => '',
        ), $atts, 'background_vid' );


    $poster = $atts['poster'];
    $mp4 = $atts['mp4'];
    $padding = $atts['padding'];
    return '

<div class="video-hero jquery-background-video-wrapper demo-video-wrapper">
        <video class="jquery-background-video" autoplay muted loop poster="'.$poster.'">
            <source src="'.$mp4.'" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
        <div class="'.$padding.'">
            <div class="video-hero--content">
                ' . do_shortcode($content) . '
            </div>
        </div>
    </div>'



        ;

}

add_shortcode('background_vid', 'background_vid');

/* Modal */

function boot_modal( $atts, $content = null ) {

    $atts = shortcode_atts(
        array(
            'button' => '',
            'title' => '',
            'class' => '',
            'target' => '',
            'closeclass' => '',
            'modalsize' => '',
        ), $atts, 'boot_modal' );


    $button = $atts['button'];
    $title = $atts['title'];
    $class = $atts['class'];
    $target = $atts['target'];
    $closeclass = $atts['closeclass'];
    $modalsize = $atts['modalsize'];

    return '

        <a href="#" class="'.$class.'" data-toggle="modal" data-target="#'.$target.'">'.$button.'</a>

        <div class="modal fade" id="'.$target.'" tabindex="-1" role="modal" aria-labelledby="modal-label-3" aria-hidden="true" style="display: none;">
            <div class="modal-dialog '.$modalsize.'">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="modal-label-3">'.$title.'</h4>
                    </div>
                    <div class="modal-body">
                        ' . do_shortcode($content) . '
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="'.$closeclass.'" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>'

        ;

}

add_shortcode('boot_modal', 'boot_modal');

/* Popup Video */

function popup_video( $atts, $content = null ) {
    wp_enqueue_script( 'popupvid-min' );  
    wp_enqueue_script( 'popupvid-js' );

    $atts = shortcode_atts(
        array(
            'class' => '',
            'url' => '',
        ), $atts, 'popup_video' );

    $class = $atts['class'];
    $url = $atts['url'];

    return '

        <a href="'.$url.'" class="'.$class.' popup-video">' . do_shortcode($content) . '</a>
        '

        ;

}

add_shortcode('popup_video', 'popup_video');

/*carousel custom start*/
function carousel_wrap( $atts, $content = null ) {

    $atts = shortcode_atts(
        array(
            'class' => '',

        ), $atts, 'carousel_wrap' );


    $class = $atts['class'];

    return '

        <div class="'.$class.'">
            ' . do_shortcode($content) . '
        </div>'

        ;

}

add_shortcode('carousel_wrap', 'carousel_wrap');

/*rcarousel custom end*/