<?php
global $trendmag_current_layout;
$trendmag_sidebar = $trendmag_current_layout['sidebars'];
?>

<?php if ( is_active_sidebar($trendmag_sidebar['home_blog_top'])) : ?>
    <div class="widget-area-1">
        <?php dynamic_sidebar($trendmag_sidebar['home_blog_top']); ?>
    </div>
    <!-- /.wigdet-area-1 -->
<?php endif; ?>

<?php if ( is_active_sidebar($trendmag_sidebar['home_blog_after_top'])) : ?>
<div class="wrapper">
    <div class="widget-area-2">
        <?php dynamic_sidebar($trendmag_sidebar['home_blog_after_top']); ?>
    </div>
    <!-- /.widget-area-2 -->
</div>
<!-- /.wrapper -->
<?php endif; ?>

<?php if ( is_active_sidebar($trendmag_sidebar['home_blog_content']) ) {
    dynamic_sidebar($trendmag_sidebar['home_blog_content']);
} ?>

<?php if ( is_active_sidebar($trendmag_sidebar['home_blog_after_content'])) : ?>
<div class="wrapper">
    <?php dynamic_sidebar($trendmag_sidebar['home_blog_after_content']); ?>
</div>
<?php endif; ?>
