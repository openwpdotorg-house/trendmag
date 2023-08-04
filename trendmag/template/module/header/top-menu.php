<?php if ( has_nav_menu('top-nav') ) : ?>
    <a href="#" class="toggle-menu toggle-1"><?php _e('Menu', 'trendmag'); ?></a>
    <div class="top-menu-wrap need-left">
      <span class="kopa-close">
      <i class="fa fa-close"></i>
      </span>

        <div class="top-menu">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'top-nav',
                    'container' => '',
                    'menu_id' => 'top-menu',
                    'menu_class' => ''
                ));
            ?>
        </div>
        <!-- /.top-menu -->
    </div>
    <!-- /.top-menu-wrap -->
<?php endif;