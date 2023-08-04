<div id="kopa-main-content-page" class="kopa-main-content">
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
    <div class="gap-50"></div>
    <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();

            ?>

                <article class="entry-content">
                    <?php the_content(); ?>
                </article>

                <?php
                wp_link_pages(array(
                    'before'           => '<p class="page-links clearfix">',
                    'after'            => '</p>',
                    'next_or_number'   => 'next',
                    'nextpagelink'     => '<span class="pull-left">' . __('Next', 'trendmag') . '</span>',
                    'previouspagelink' => '<span class="pull-right">' . __('Previous', 'trendmag') . '</span>',
                    'echo'             => 1
                ));

                comments_template();
            }
        }
    ?>

</div>
<!-- /.wrap-elements -->
</div>
