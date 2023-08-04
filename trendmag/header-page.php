<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo esc_attr(get_bloginfo('charset', 'display')); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="pingback" href="<?php echo esc_attr(get_bloginfo('pingback_url', 'display')); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="kopa-overlay"></div>
<header id="kopa-main-header" class="style-3">
    <div class="top-header">
        <div class="wrapper">

            <?php
                # TOP MENU
                get_template_part('template/module/header/top-menu');

                # FOLLOW ME VIA SOCIAL LINKS
                $sb_follow_top = apply_filters('trendmag_get_sidebar', 'sb_follow_top', 'pos_follow_top');
                if ( is_active_sidebar($sb_follow_top) ) {
                    dynamic_sidebar($sb_follow_top);
                }
                echo '<div class="clearfix"></div>';
            ?>

        </div>
        <!-- /.wrapper -->
    </div>
    <!-- /.top-header -->

    <div class="middle-header nav-fix">
        <div class="wrapper">
            <?php if ( has_nav_menu('mobile-nav') ) : ?>

            <div class="main-menu mobile-version">
                <a href="#" class="toggle-menu toggle-3"></a>

                <div class="main-nav-wrap need-left">
                         <span class="kopa-close">
                         <i class="fa fa-close"></i>
                         </span>

                    <div class="clearfix"></div>

                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'mobile-nav',
                            'container' => 'nav',
                            'container_id' => 'main-nav-m',
                            'container_class' => 'main-nav',
                            'menu_id' => 'main-menu-m',
                            'menu_class' => 'navgoco'
                        )
                    );
                    # END MAIN NAV MOBILE
                    ?>

                </div>
                <!-- /.main-nav-wrap -->
            </div>
            <!-- /.mobile-version -->

            <?php endif; ?>

            <?php
                $logo_big = get_theme_mod('logo_big', '');
                $logo_big = apply_filters('trendmag_custom_logo_big', $logo_big, 'page');
                echo '<div class="logo-box">';

                if ( ! empty($logo_big) ) : ?>

                    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                        <img src="<?php echo esc_url($logo_big);  ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                    </a>

                    <?php
                else:
                    get_template_part('template/module/header/no-logo');
                endif;

                echo '</div>';
            ?>

            <?php
                #SEARCH
                get_template_part('template/module/search-on-main-nav');
            ?>
        </div>
        <!-- .wrapper -->
    </div>
    <!-- /.middle-header -->

    <div class="bottom-header nav-fix">
        <div class="wrapper">
            <div class="main-menu desktop-version">
                <?php
                #NAV LOGO
                get_template_part('template/module/header/logo-nav');

                #MAIN MENU DESKTOP
                get_template_part('template/module/header/main-menu');

                #SEARCH
                get_template_part('template/module/search', 'on-main-nav');
                ?>
            </div>
            <!-- /.wrapper -->
        </div>
    </div>
    <!-- .bottom-header -->
</header>
<!-- /#kopa-main-header -->
<div id="kopa-main-content">