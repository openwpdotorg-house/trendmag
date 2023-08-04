<?php

add_action('wp_enqueue_scripts', 'trendmag_customize_page_title_bg', 20);
add_action('wp_enqueue_scripts', 'trendmag_customize_font_enqueue_scripts', 20);
add_action('wp_enqueue_scripts', 'trendmag_customize_css', 40);

function trendmag_customize_page_title_bg() {
    $image_bg = get_theme_mod('header-page-title-bg', '');
    if ( ! empty($image_bg) ) {
        $logo_css = ".wrap-top-page {background: url({$image_bg}); background-repeat: no-repeat;background-position: center top;}";
        wp_add_inline_style('trendmag-style', $logo_css);
    }
}

function trendmag_customize_font_enqueue_scripts(){
    $fonts = trendmag_get_site_elements();

    $google_font_in_use = array();
    $custom_font_in_use = array();
    $css = array();

    $google_fonts = array();
    if ( class_exists('Kopa_Framework') ) {
        $google_fonts = kopa_google_font_options();
    }

    $custom_fonts = (array) get_theme_mod( 'custom_fonts' );

    foreach ($fonts as $key => $font) {

        if(1 == (int) get_theme_mod( "is_enable_custom_font_{$key}", 0 ) ){
            $tmp_family = get_theme_mod("{$key}_font_family");
            $tmp_weight = get_theme_mod("{$key}_font_weight");
            $tmp_size = get_theme_mod("{$key}_font_size");
            $tmp_css = array();

            if( !empty( $tmp_weight ) && 'none' != $tmp_weight ){
                $tmp_css[] = sprintf('font-weight: %s;', $tmp_weight);
            }

            if( !empty( $tmp_size ) && (int) $tmp_size > 0 ){
                $tmp_css[] = sprintf('font-size: %spx;', $tmp_size);
            }

            if(!empty( $tmp_family ) &&  ( 'none' !== $tmp_family ) ){
                $tmp_css[] = sprintf('font-family: %s;', $tmp_family);

                // check :  is google font
                if( isset($google_fonts[$tmp_family]) ){
                    // if true
                    if( !isset( $google_font_in_use[$tmp_family] ) ){
                        // add to list
                        $google_font_in_use[$tmp_family] = array();
                    }
                }else{
                    foreach($custom_fonts as $custom_font){
                        if( $tmp_family == $custom_font['name'] ){
                            if( !isset( $custom_font_in_use[$tmp_family] ) ){
                                $custom_font_in_use[$tmp_family] = $custom_font;
                            }
                        }
                    }
                }
            }

            if(!empty( $tmp_css )){
                $css[] = sprintf('%s { %s }', $font['element'], implode(' ', $tmp_css) );
            }

        }
    }


    if(!empty( $css )){
        wp_add_inline_style('trendmag-style', implode(' ', $css) );
    }

    // enqueue google font in use
    if( !empty($google_font_in_use) ){
        foreach($google_font_in_use as $font_family => $font_style){
            $font_family = str_replace(' ', '+', $font_family);

            $url = sprintf( '//fonts.googleapis.com/css?family=%s', $font_family);
            if( !empty($font_style) ){
                $url .= sprintf(':%s', implode(',', $font_style) );
            }
            wp_enqueue_style('trendmag-' . strtolower( $font_family ) , $url, array(), NULL);
        }
    }
}

function trendmag_customize_css(){
    $custom_css = get_theme_mod('custom_css', '');
    if( !empty($custom_css) ){
        wp_add_inline_style('trendmag-style', $custom_css);
    }
}