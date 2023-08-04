<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo esc_attr(get_bloginfo('charset', 'display')); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="pingback" href="<?php echo esc_attr(get_bloginfo('pingback_url', 'display')); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="kopa-overlay"></div>
<header id="kopa-main-header" class="style-1">
<div class="top-header">
    <div class="wrapper">
        <?php

            # TOP MENU
            get_template_part('template/module/header/top-menu');

            # MAIN LOGO
            $logo_big = get_theme_mod('logo_big', '');
            $logo_big = apply_filters('trendmag_custom_logo_big', $logo_big, 'home');
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

            # FOLLOW SOCIAL
            get_template_part('template/module/header/follow-social');

        ?>

    </div>
    <!-- /.wrapper -->
</div>
<!-- /.top-header -->
<div class="middle-header nav-fix">
    <div class="wrapper">

        <?php
            # MAIN MENU MOBILE
            get_template_part('template/module/header/main-menu-mobile');

            $logo_mobile = get_theme_mod('logo_mobile', '');
            $logo_mobile = apply_filters('trendmag_custom_logo_mobile', $logo_mobile, 'home');
            if ( ! empty($logo_mobile) ) : ?>
                <div class="logo-box">
                    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                        <img class="logo-custom" src="<?php echo esc_url($logo_mobile);  ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                    </a>
                </div>
            <?php endif;

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
        # NAV LOGO
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
