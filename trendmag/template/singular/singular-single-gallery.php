<?php
$sb_after   = apply_filters('trendmag_get_sidebar', '', 'pos_after');
$sb_before_footer   = apply_filters('trendmag_get_sidebar', 'sb_before_footer', 'pos_single_gallery_before_footer');

global $trendmag_current_layout;
if ( $trendmag_current_layout ) {
    $trendmag_sidebar = $trendmag_current_layout['sidebars'];
    if ( isset($trendmag_sidebar['sb_after']) ) {
        $sb_after = $trendmag_sidebar['sb_after'];
    }
    if ( isset($trendmag_sidebar['sb_before_footer']) ) {
        $sb_before_footer = $trendmag_sidebar['sb_before_footer'];
    }
}

?>
<div class="wrap-top-page has-parallax" data-stellar-background-ratio="0.5">
    <div class="wrapper">
        <?php
        get_template_part('template/module/title');
        get_template_part('template/module/breadcrumb');
        ?>

    </div>
    <!-- /.wrapper -->
</div>
<!-- /.wrap-top-page -->
<div class="gap-60"></div>
<div class="wrapper">
<div class="kopa-row-30">
<div class="kopa-col main-col">

    <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();

                get_template_part('template/module/single/featured-gallery-2');
            }
        }
    ?>


<?php
if ( is_active_sidebar($sb_after) ) {
    dynamic_sidebar($sb_after);
}
?>


</div>
<!-- /.main-col -->
</div>
<!-- /.kopa-row-30 -->
</div>
<!-- /.wrapper -->

<?php
    if ( is_active_sidebar($sb_before_footer) ) {
        dynamic_sidebar($sb_before_footer);
    }
?>
