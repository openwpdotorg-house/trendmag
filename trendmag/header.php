<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo esc_attr(get_bloginfo('charset', 'display')); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="pingback" href="<?php echo esc_attr(get_bloginfo('pingback_url', 'display')); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class('kopa-sub-page'); ?>>
<div class="kopa-overlay"></div>
<header id="kopa-main-header" class="style-4">
<div class="top-header">
    <div class="wrapper">

        <?php
        # TOP MENU
        get_template_part('template/module/header/top-menu');

        # FOLLOW SOCIAL
        get_template_part('template/module/header/follow-social');

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

        $logo_mobile = get_theme_mod('logo_mobile', '');
        $logo_mobile = apply_filters('trendmag_custom_logo_mobile', $logo_mobile, '');
        if ( ! empty($logo_mobile) ) : ?>

            <div class="logo-box">
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                    <img class="logo-custom" src="<?php echo esc_url($logo_mobile);  ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                </a>
            </div>

        <?php
        else:
            echo '<div class="logo-box" style="display: none;">';
                get_template_part('template/mobule/header/no-logo');
            echo '</div>';

        endif;

        # SEARCH
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

        # SEARCH
        get_template_part('template/module/search-on-main-nav');
    ?>

</div>
<!-- /.desktop-version -->

</div>
<!-- /.wrapper -->
</div>
<!-- .bottom-header -->
</header>
<!-- /#kopa-main-header -->

<div id="kopa-main-content">