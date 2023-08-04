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

<?php endif;