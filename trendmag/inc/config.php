<?php

add_action('after_setup_theme', 'trendmag_after_setup_theme');

/**
 * Register action hook, filter hook and features of theme.
 * @package  trendmag
 * @version 1.0.0
 * @return null
 */ 
function trendmag_after_setup_theme() {
    global $content_width;
    $content_width = 770;
    
    add_editor_style();

    add_theme_support('html5');
    add_theme_support('title-tag');    
    add_theme_support('post-thumbnails');
    add_theme_support('loop-pagination');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-formats', array('gallery', 'audio', 'video'));
    add_theme_support( 'woocommerce' );

    add_filter('kopa_customization_init_options', 'trendmag_init_options');

    register_nav_menus(array(
        'top-nav'   => __('Top Menu', 'trendmag'),
        'main-nav'   => __('Main Menu', 'trendmag'),
        'footer-nav' => __('Footer Menu', 'trendmag'),
        'mobile-nav' => __('Mobile Menu', 'trendmag'),
        ));

    if ( !is_admin() ) {
        add_action('wp_enqueue_scripts', 'trendmag_enqueue_scripts');
        add_filter('body_class', 'trendmag_set_body_class');
        add_filter('widget_text', 'do_shortcode');
        add_action( 'wp_head', 'trendmag_wp_head' );
        add_filter('trendmag_get_sidebar', 'trendmag_set_sidebar', 10, 2);
        add_filter('trendmag_get_header', 'trendmag_get_header', 10, 2);

        #ADD NEXT PREVIOUS TO wp_link_pages FOR SINGLE POST
        add_filter('wp_link_pages_args', 'trendmag_wp_link_pages_args_add_prevnext');
        add_filter( 'wp_link_pages_link', 'trendmag_custom_link_pages' );

        add_action('pre_get_posts', 'trendmag_filter_search_post');

        #Remove attributesframeborder of oembed
        add_filter( 'embed_oembed_html', 'trendmag_remove_oembed_attributes', 10, 4 );
    }
}

/**
 * Get list of social network
 * @package  trendmag
 * @version 1.0.0
 * @return array list of social network
 */ 
function trendmag_get_list_of_social() {
    $options = array();

    $options[] = array(
        'title' => __('Facebook', 'trendmag'),
        'id' => 'facebook-url',
        'type' => 'url',
        'icon' => 'fa fa-facebook',
        );

    $options[] = array(
        'title' => __('Twitter', 'trendmag'),
        'id' => 'twitter-url',
        'type' => 'url',
        'icon' => 'fa fa-twitter',
        );

    $options[] = array(
        'title' => __('Goggle Plus', 'trendmag'),
        'id' => 'google-plus-url',
        'type' => 'url',
        'icon' => 'fa fa-google-plus',
        );    

    $options[] = array(
        'title' => __('Rss', 'trendmag'),
        'desc' => __('enter HIDE if you want to disable this option', 'trendmag'),
        'id' => 'rss-url',
        'type' => 'text',
        'icon' => 'fa fa-rss',
        );

    return apply_filters('trendmag_get_social_networks', $options);
}

function trendmag_get_image_sizes() {
    $image_sizes = array(
        array(
            'slug' => 'blog-featured',
            'info' => array(690, 300),
            'enable_custom' => true,
            'widget_title' => __('Blog featured', 'trendmag'),
            'widget_description' => __('Default size 690 x 300 px.', 'trendmag')
        ),
        array(
            'slug' => 'blog-featured-full',
            'info' => array(1050, 457),
            'enable_custom' => true,
            'widget_title' => __('Blog featured full', 'trendmag'),
            'widget_description' => __('Default size 1050 x 457 px.', 'trendmag')
        ),
        array(
            'slug' => 'widget-list-video',
            'info' => array(270, 180),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-grid-post-grid-4-posts',
            'info' => array(247, 255),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-post-video-250-140',
            'info' => array(250, 140),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-post-bxslider',
            'info' => array(240, 180),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-post-carousel',
            'info' => array(366, 245),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-post-carousel-2',
            'info' => array(302, 255),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-carousel-slides-three',
            'info' => array(908, 500),
            'enable_custom' => true,
            'widget_title' => __('(Trendmag) Slide Three', 'trendmag'),
            'widget_description' => __('Default size 908 x 500 px.', 'trendmag')
        ),
        array(
            'slug' => 'widget-carousel-slides-five-302-500',
            'info' => array(302, 500),
            'enable_custom' => true,
            'widget_title' => __('(Trendmag) Slide Five', 'trendmag'),
            'widget_description' => __('Default size 302 x 500 px.', 'trendmag')
        ),
        array(
            'slug' => 'widget-carousel-slides-five-302-255',
            'info' => array(302, 255),
            'enable_custom' => true,
            'widget_title' => __('(Trendmag) Slide Five', 'trendmag'),
            'widget_description' => __('Default size 302 x 255 px.', 'trendmag')
        ),
        array(
            'slug' => 'widget-carousel-slides-one',
            'info' => array(1366, 500),
            'enable_custom' => true,
            'widget_title' => __('(Trendmag) Slide One', 'trendmag'),
            'widget_description' => __('Default size 1366 x 500 px.', 'trendmag')
        ),
        array(
            'slug' => 'widget-first-big-other-medium-555-375',
            'info' => array(555, 375),
            'enable_custom' => true,
            'widget_title' => __('(Trendmag) List Posts With First Big, Other Medium Thumbnail', 'trendmag'),
            'widget_description' => __('Default size 555 x 375 px.', 'trendmag')
        ),
        array(
            'slug' => 'widget-first-big-other-medium-247-140',
            'info' => array(247, 140),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-recent-post',
            'info' => array(70, 70),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-list-post-two-position',
            'info' => array(247, 255),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-testimonial-carousel',
            'info' => array(101, 101),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-brand-carousel',
            'info' => array(131, 60),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-grid-post-370-230',
            'info' => array(370, 230),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-megamenu-post',
            'info' => array(255, 150),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'single',
            'info' => array(810, 430),
            'enable_custom' => true,
            'widget_title' => __('Single', 'trendmag'),
            'widget_description' => __('Default size 810 x 430 px.', 'trendmag')
        ),
        array(
            'slug' => 'single-full',
            'info' => array(1170, 550),
            'enable_custom' => true,
            'widget_title' => __('Single full', 'trendmag'),
            'widget_description' => __('Default size 1170 x 550 px.', 'trendmag')
        ),
        array(
            'slug' => 'single-related',
            'info' => array(270, 180),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'single-gallery-1-thumb',
            'info' => array(179, 100),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'single-gallery-1-slide',
            'info' => array(605, 433),
            'enable_custom' => true,
            'widget_title' => __('Single gallery 1 slide', 'trendmag'),
            'widget_description' => __('Default size 605 x 433 px.', 'trendmag')
        ),
        array(
            'slug' => 'single-gallery-1-slide-full',
            'info' => array(1150, 823),
            'enable_custom' => true,
            'widget_title' => __('Single gallery 1 slide full', 'trendmag'),
            'widget_description' => __('Default size 1150 x 823 px.', 'trendmag')
        ),
        array(
            'slug' => 'blog-home',
            'info' => array(570, 292),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-featured-gallery',
            'info' => array(179, 100),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-featured-gallery-large',
            'info' => array(601, 430),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-products-carousel-247-255',
            'info' => array(247, 255),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-woo-latest-product',
            'info' => array(150, 150),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'widget-woo-list-products',
            'info' => array(270, 180),
            'enable_custom' => false,
            'widget_title' => '',
            'widget_description' => ''
        ),
        array(
            'slug' => 'blog-format-gallery',
            'info' => array(690, 330),
            'enable_custom' => false,
            'widget_title' => __('Blog format gallery', 'trendmag'),
            'widget_description' => __('Default size 690 x 330 px.', 'trendmag')
        ),
        array(
            'slug' => 'blog-format-gallery-full',
            'info' => array(1050, 557),
            'enable_custom' => false,
            'widget_title' => __('Blog format gallery full', 'trendmag'),
            'widget_description' => __('Default size 1050 x 557 px.', 'trendmag')
        ),
    );

    return apply_filters('trendmag_get_image_sizes', $image_sizes);

}

function trendmag_get_image_info($slug) {
    $image_info = array();
    $image_sizes = trendmag_get_image_sizes();
    if ( $image_sizes ) {
        foreach( $image_sizes as $image ) {
            if ( $slug == $image['slug'] ) {
                $image_info = $image;
                break;
            }
        }
    }
    return $image_info;
}

/**
 * @param $post_id
 * @param $image_slug
 * @param array $options
 */
function trendmag_the_post_thumbnail($post_id, $image_slug, $options = array()) {
    $image_info = trendmag_get_image_info($image_slug);
    $custom_image = get_post_meta( $post_id, $image_slug, true );

    if ( ! empty($custom_image) ) {
        echo sprintf('<img src="%s" alt="%s" />', esc_url($custom_image), esc_attr(get_the_title($post_id)));
    } elseif ( $image_info ) {
        if ( isset($image_info['info']) ) {
            $image_info['info']['bfi_thumb'] = true;
            if ( ! isset($options['alt']) ) {
                $options['alt'] = esc_attr(get_the_title($post_id));
            }
            echo get_the_post_thumbnail($post_id, $image_info['info'], $options);
        }
    }
}

add_action('tgmpa_register', 'trendmag_register_required_plugins');
function trendmag_register_required_plugins() {

    $plugins = array(
        array(
            'name'     => 'Kopa Framework',
            'slug'     => 'kopatheme',
            'required' => false,
        )
    );

    $config = array(
        'has_notices'  => true,
        'is_automatic' => false
    );

    tgmpa( $plugins, $config );

}