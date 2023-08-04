<?php
    $sb_footer = apply_filters('trendmag_get_sidebar', 'sb_footer', 'pos_footer');
?>

</div>
<!-- #kopa-main-content -->

<?php if ( is_active_sidebar($sb_footer) ) : ?>
<div id="bottom-sidebar">
    <div class="wrapper">
        <div class="widget-area-11">
            <?php dynamic_sidebar($sb_footer); ?>
        </div>
        <!-- /.widget-area-11 -->
    </div>
    <!-- /.wrapper -->
</div>
<!-- #bottom-sidebar -->
<?php endif; ?>

<footer id="kopa-main-footer">

    <?php do_action('trendmag_copyright'); ?>

    <?php if ( has_nav_menu('footer-nav') ) {
        wp_nav_menu(
            array(
                'theme_location' => 'footer-nav',
                'container' => 'nav',
                'container_id' => 'footer-nav',
                'container_class' => 'footer-nav',
                'menu_id' => 'footer-menu',
                'menu_class' => 'rs-ul'
            )
        );
        # END FOOTER NAV
    } ?>

</footer>
<!-- #kopa-main-footer -->
<?php wp_footer(); ?>
</body>
</html>