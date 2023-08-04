<?php
$sb_top   = apply_filters('trendmag_get_sidebar', 'sb_top', 'pos_top');
$sb_right_before   = apply_filters('trendmag_get_sidebar', 'sb_right_before', 'pos_right_before');
$sb_right_after   = apply_filters('trendmag_get_sidebar', 'sb_right_after', 'pos_right_after');

global $trendmag_current_layout;
if ( $trendmag_current_layout ) {
    $trendmag_sidebar = $trendmag_current_layout['sidebars'];
    if ( isset($trendmag_sidebar['sb_right_before']) ) {
        $sb_right_before = $trendmag_sidebar['sb_right_before'];
    }

    if ( isset($trendmag_sidebar['sb_right_after']) ) {
        $sb_right_after = $trendmag_sidebar['sb_right_after'];
    }
}

?>

<div class="wrap-top-page has-parallax" data-stellar-background-ratio="0.5">
    <div class="wrapper">
        <?php get_template_part('template/module/title'); ?>
        <?php get_template_part('template/module/breadcrumb'); ?>
    </div>
    <!-- /.wrapper -->
</div>
<!-- /.wrap-top-page -->

<?php if ( is_active_sidebar($sb_top)) {
    add_filter('dynamic_sidebar_params', 'trendmag_apply_sidebar_params_blog');
    dynamic_sidebar($sb_top);
    remove_filter('dynamic_sidebar_params', 'trendmag_apply_sidebar_params_blog');
} else {
    echo '<div class="gap-50"></div>';
}?>

<?php
if ( have_posts() ):
    while ( have_posts() ) :
        the_post();

        $post_id = get_the_ID();
        $post_title = get_the_title();
        if ( empty($post_title) ) {
            $post_title = __('No title', 'trendmag');
        }

        $gallery = get_post_meta(get_the_ID(), 'trendmag_gallery', true);
        $custom  = get_post_meta(get_the_ID(), 'trendmag_custom', true);

        $post_format_class = 'kopa-single-post';
        $format = get_post_format();
        if ( false === $format ) {
            $post_format_class .= ' standard-post';
        } elseif( 'audio' === $format ) {
            $post_format_class .= ' audio-post';
        } elseif( 'video' === $format ) {
            $post_format_class .= ' video-post';
        } elseif( 'gallery' === $format ) {
            $post_format_class .= ' gallery-post';
        }
        ?>

    <div class="wrapper">
        <div class="kopa-row-30">
            <div class="kopa-col main-col trendmag-before">
                <div itemscope="itemscope" itemtype="http://schema.org/Blog" itemprop="mainContentOfPage">
                    <div class="<?php echo esc_attr($post_format_class); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

                        <?php
                        if(has_post_format('gallery') && !empty($gallery)){
                            get_template_part('template/module/single/featured', 'gallery');
                        }elseif(!empty($custom)){
                            get_template_part('template/module/single/featured', 'custom');
                        }else{
                            get_template_part('template/module/single/featured');
                        }
                        ?>

                        <div class="single-post-content">
                            <div class="row">
                                <?php
                                $enable_author_info_left = get_theme_mod('single_author_left', '1');
                                $enable_time_ago = get_theme_mod('single_time_ago', '1');
                                $enable_share_links_left = get_theme_mod('single_share_left', '1');
                                $enable_share_links_middle = get_theme_mod('single_share_middle', '1');

                                $enable_category = get_theme_mod('single_category', '1');
                                $enable_date = get_theme_mod('single_date', '1');
                                $enable_tag = get_theme_mod('single_tag', '1');
                                $enable_author_info_middle = get_theme_mod('single_author_middle', '1');

                                if ( 1 == $enable_author_info_left || 1 == $enable_time_ago || 1 == $enable_share_links_left ) :

                                    ?>

                                    <div class="kopa-col single-post-left">
                                        <div class="inner">
                                            <div class="divier"></div>
                                            <?php
                                            if ( 1 == $enable_author_info_left ) {
                                                get_template_part('template/module/common/author-left');
                                            }
                                            $post_before_author_name = get_the_author_meta( 'display_name' );
                                            $post_before_author_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
                                            ?>

                                            <span class="entry-author-name" itemprop="author"><?php _e('By', 'trendmag'); ?><a href="<?php echo esc_url($post_before_author_link); ?>"><?php echo esc_html($post_before_author_name); ?></a></span>

                                            <?php
                                                if ( 1 == $enable_time_ago ) {
                                                    get_template_part('template/module/common/date-2');
                                                }
                                            ?>

                                        </div>
                                    </div>
                                    <!-- /.single-post-left -->

                                    <?php endif; ?>

                                <div class="kopa-col single-post-right">
                                    <h2 class="single-post-title" itemprop="headline"><?php echo esc_html($post_title); ?></h2>
                                    <div class="entry-meta">
                                        <?php
                                        if ( $enable_category ) {
                                            get_template_part('template/module/common/category');
                                        }

                                        if ( $enable_date ) {
                                            get_template_part('template/module/common/date');
                                        }
                                        ?>
                                    </div>
                                    <div class="kopa-article-content" itemprop="text">
                                        <?php the_content(); ?>
                                    </div>
                                    <!-- /.kopa-article-content -->

                                    <?php
                                    $post_page_link = wp_link_pages(
                                        array(
                                            'before' =>'',
                                            'after' => '',
                                            'link_before' => '',
                                            'link_after' => '',
                                            'next_or_number' => 'next_and_number',
                                            'nextpagelink' => '<span>' . __('Next', 'trendmag') . '</span>',
                                            'previouspagelink' => '<span>' . __('Prev', 'trendmag') . '</span>',
                                            'echo' => false
                                        )
                                    );
                                    if ( ! empty($post_page_link) ) {
                                        echo '<div class="page-navigation"><div class="page-links-wrapper"><div class="page-links">' . $post_page_link . '</div></div></div>';
                                    }
                                    ?>

                                    <?php
                                    if ( 1 == $enable_tag ) {
                                        the_tags('<div class="kopa-tagbox"><span>' . __('Tags: ', 'trendmag') . ' </span>','','</div>');
                                    }

                                    if ( 1 == $enable_author_info_middle ) {
                                        get_template_part('template/module/single/author');
                                    }

                                    ?>
                                </div>
                                <!-- /.single-post-right -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.single-post-content -->
                    </div>
                    <!-- /.kopa-single-post -->
                </div>

                <?php
                    if ( defined('TRENDMAG_TYPE') && 'lite' == TRENDMAG_TYPE && ! class_exists('Trendmag_Toolkit_Plus') ) {
                        comments_template();
                    }
                ?>
            </div>
            <!-- /.main-col -->

            <?php if ( is_active_sidebar($sb_right_before)) : ?>

            <aside class="kopa-col sidebar">
                <div class="widget-area-7">
                    <?php
                    add_filter('dynamic_sidebar_params', 'trendmag_apply_sidebar_params_blog');
                    dynamic_sidebar($sb_right_before);
                    remove_filter('dynamic_sidebar_params', 'trendmag_apply_sidebar_params_blog');
                    ?>
                </div>
                <!-- /.widget-area-7 -->
            </aside>
            <!-- /.sidebar -->

            <?php endif; ?>

        </div>
        <!-- /.kopa-row-30 -->
    </div>
    <!-- /.wrapper -->

    <?php
        get_template_part('template/module/single/related-posts');
        ?>

    <?php
        if ( defined('TRENDMAG_TYPE') && 'pro' == TRENDMAG_TYPE && class_exists('Trendmag_Toolkit_Plus') ) :
    ?>

            <div class="wrapper">
                <div class="kopa-row-30">
                    <div class="kopa-col main-col trendmag-after">
                        <?php comments_template(); ?>
                    </div>
                    <!-- /.main-col -->

                    <?php if ( is_active_sidebar($sb_right_after)) : ?>

                    <aside class="kopa-col sidebar">
                        <?php
                        add_filter('dynamic_sidebar_params', 'trendmag_apply_sidebar_params_blog');
                        dynamic_sidebar($sb_right_after);
                        remove_filter('dynamic_sidebar_params', 'trendmag_apply_sidebar_params_blog');
                        ?>
                    </aside>
                    <!-- /.sidebar -->

                    <?php endif; ?>
                </div>
                <!-- /.kopa-row-30 -->
            </div>
            <!-- /.wrapper -->

    <?php
        endif;
    endwhile;
endif;