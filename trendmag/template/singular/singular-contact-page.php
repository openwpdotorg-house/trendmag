<?php
global $trendmag_current_layout;
$trendmag_sidebar = $trendmag_current_layout['sidebars'];
?>

    <div class="wrap-top-page has-parallax" data-stellar-background-ratio="0.5">
        <div class="wrapper">
            <?php get_template_part('template/module/title'); ?>

            <?php get_template_part('template/module/breadcrumb'); ?>
        </div>
        <!-- /.wrapper -->
    </div>
    <!-- /.wrap-top-page -->

    <?php
        if ( is_active_sidebar($trendmag_sidebar['sb_blog_top']) ) {
            dynamic_sidebar($trendmag_sidebar['sb_blog_top']);
        }
    ?>

<?php if( is_active_sidebar($trendmag_sidebar['sb_info']) || is_active_sidebar($trendmag_sidebar['sb_content'] ) ) : ?>

<div class="wrapper">
    <div class="contact-box">
        <div class="row">

            <?php
            if( is_active_sidebar($trendmag_sidebar['sb_info'] ) ) {
                echo '<div class="col-md-4 col-sm-12 col-xs-4">';
                dynamic_sidebar($trendmag_sidebar['sb_info']);
                echo '</div>';
            }

            if( is_active_sidebar($trendmag_sidebar['sb_content']) ) {
                echo '<div class="col-md-8 col-sm-12 col-xs-8">';
                dynamic_sidebar($trendmag_sidebar['sb_content']);
                echo '</div>';
            }

            ?>

        </div>
        <!-- /.row-30 -->
    </div>
    <!-- /.contact-box -->
</div>
<!-- /.wrapper -->

<?php endif; ?>