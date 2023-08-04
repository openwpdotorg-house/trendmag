<?php

add_filter( 'kopa_sidebar_default', 'trendmag_set_sidebar_default' );

function trendmag_set_sidebar_default( $options ) {
    $options['sb_right_after']                  = array('name' => __( 'Blog right after', 'trendmag'));
    $options['sb_after']                        = array('name' => __( 'Blog after', 'trendmag'));
    $options['sb_before_footer']                = array('name' => __( 'Blog before footer', 'trendmag'));
    $options['sb_blog_top']                = array('name' => __( 'Blog top', 'trendmag'));
    $options['sb_top']                = array('name' => __( 'Single top', 'trendmag'));
    $options['sb_page_top']                = array('name' => __( 'Page Top', 'trendmag'));
    $options['sb_info']                = array('name' => __( 'Page Info', 'trendmag'));
    $options['sb_content']                = array('name' => __( 'Page Content', 'trendmag'));

    if ( class_exists('Trendmag_Toolkit') && class_exists('Kopa_Framework') ) {
        $options['home_blog_top']                = array('name' => __( 'Home Blog Top', 'trendmag'));
        $options['home_blog_after_top']                = array('name' => __( 'Home Blog After Top', 'trendmag'));
        $options['home_blog_content']                = array('name' => __( 'Home Blog Content', 'trendmag'));
        $options['home_blog_after_content']                = array('name' => __( 'Home Blog After Content', 'trendmag'));
    }

    if ( class_exists('WooCommerce') && class_exists('Trendmag_Toolkit') ) {
        $options['sb_shop_top']                = array('name' => __( 'Shop top', 'trendmag'));
        $options['sb_shop_before_footer']                = array('name' => __( 'Shop before footer', 'trendmag'));
    }

	return $options;
}

add_filter( 'kopa_sidebar_default_attributes', 'trendmag_set_sidebar_default_attributes' );

function trendmag_set_sidebar_default_attributes($wrap) {
	$wrap['before_widget'] = '<div id="%1$s" class="widget %2$s">';
	$wrap['after_widget']  = '</div>';
	$wrap['before_title']  = '<h3 class="widget-titrle">';
	$wrap['after_title']   = '</h3>';

	return $wrap;
}

add_action('widgets_init', 'trendmag_register_fixed_sidebar');

function trendmag_register_fixed_sidebar(){
	$wrap = trendmag_set_sidebar_default_attributes(array());

	$fixed_sidebars  = array(
        'sb_right_before'    => __( 'Blog right before', 'trendmag'),
		'sb_follow_top' => __('Header (fixed)', 'trendmag'),
		'sb_footer'  => __('Footer (fixed)', 'trendmag')
	);

	foreach($fixed_sidebars as $id => $name){
		$args         = $wrap;
		$args['id']   = $id;
		$args['name'] = $name;
        
		register_sidebar($args);
	}
}


/**
 * edit before-title & after-title for only right sidebar (blog and singular)
 * @package  trendmag
 * @version 1.0.0
 * @return array $params
 */
function trendmag_apply_sidebar_params_blog($params){
    global $wp_registered_widgets;
    $widget_id      = $params[0]['widget_id'];

    $params[0]['before_title'] = '<h3 class="widget-title style-2"><span>';
    $params[0]['after_title']  = '</span></h3>';
    return $params;
}

/**
 * return a sidebar slug
 * @package  trendmag
 * @version 1.0.0
 * @return string $sidebar
 */ 
function trendmag_set_sidebar($sidebar, $position){
    global $trendmag_current_layout;
    
    if(!isset($trendmag_current_layout) || empty($trendmag_current_layout)){
        $trendmag_current_layout = trendmag_get_template_setting();
    }

    if(isset($trendmag_current_layout['sidebars'][$position])){
        $sidebar = $trendmag_current_layout['sidebars'][$position];
    }    

    return $sidebar;    
}

