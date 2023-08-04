<?php if ( has_nav_menu('main-nav') ) {
    $main_nav_args = array(
        'theme_location' => 'main-nav',
        'container' => 'nav',
        'container_id' => 'main-nav',
        'container_class' => 'main-nav',
        'menu_id' => 'main-menu',
        'menu_class' => 'sf-menu'
    );
    if ( class_exists('TT_Walker_Main_Menu') ) {
        $main_nav_args['walker'] = new  TT_Walker_Main_Menu();
    }

    wp_nav_menu( $main_nav_args );
}