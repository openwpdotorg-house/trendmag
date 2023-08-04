<?php
define('TRENDMAG_TYPE', 'lite'); // pro or lite

#API
require get_template_directory() . '/api/BFIThumb.class.php';
require get_template_directory() . '/api/kopa-customization.php';
require get_template_directory() . '/api/tgm-plugin-activation.class.php';

#FUNCTION
require get_template_directory() . '/inc/util.php';
require get_template_directory() . '/inc/hook.php';
require get_template_directory() . '/inc/config.php';
if ( class_exists('WooCommerce') ) {
    require get_template_directory() . '/woocommerce/woocommerce.php';
}

#FEATURED
require get_template_directory() . '/inc/options.php';
require get_template_directory() . '/inc/layout.php';
require get_template_directory() . '/inc/sidebar.php';

#CUSTOMIZE
require get_template_directory() . '/inc/customize.php';
require get_template_directory() . '/inc/customizer.php';
