<?php
$sb_info   = apply_filters('trendmag_get_sidebar', 'sb_info', 'pos_info');
$sb_content   = apply_filters('trendmag_get_sidebar', 'sb_content', 'pos_content');

global $trendmag_current_layout;


if ( $trendmag_current_layout ) {
    $trendmag_sidebar = $trendmag_current_layout['sidebars'];
    if ( isset($trendmag_sidebar['sb_info']) ) {
        $sb_top = $trendmag_sidebar['sb_info'];
    }
    if ( isset($trendmag_sidebar['sb_content']) ) {
        $sb_content = $trendmag_sidebar['sb_content'];
    }
}

?>
    <div class="wrap-top-page has-parallax" data-stellar-background-ratio="0.5">
        <div class="wrapper">
            <?php get_template_part('template/module/title'); ?>

            <?php
            $enable_breadcrumb = get_theme_mod('header-enable-breadcrumb', '1');
            if ( 1 == $enable_breadcrumb ) {
                get_template_part('template/module/breadcrumb');
            }
            ?>
        </div>
        <!-- /.wrapper -->
    </div>
    <!-- /.wrap-top-page -->
    <div class="wrapper">
        <div class="wrap-404">
            <div class="gap-60"></div>
            <img src="<?php echo esc_url(get_template_directory_uri().'/images/fixed/404.png'); ?>" alt="">
            <div class="gap-40"></div>
            <form class="search-form clearfix block" action="<?php echo esc_url(trailingslashit(home_url('/'))); ?>">
                <input type="text" class="search-text" name="s" placeholder="<?php _e('What  are you looking for?', 'trendmag'); ?>">
                <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
            </form>
            <div class="gap-50"></div>
            <div class="separator-1"></div>
        </div>
        <div class="contact-box">
            <div class="row">
                <?php
                    if ( is_active_sidebar($sb_info) ) {
                        dynamic_sidebar($sb_info);
                    }

                    if ( is_active_sidebar($sb_content) ) {
                        dynamic_sidebar($sb_content);
                    }
                ?>

            </div>
            <!-- /.row-30 -->

        </div>
        <!-- /.contact-box -->
    </div>
    <!-- /.wrapper -->
