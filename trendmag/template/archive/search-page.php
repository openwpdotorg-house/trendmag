<?php
$sb_right_before   = apply_filters('trendmag_get_sidebar', 'sb_right_before', 'pos_right_before');
$sb_before_footer   = apply_filters('trendmag_get_sidebar', 'sb_before_footer', 'pos_before_footer');

global $trendmag_current_layout;
if ( $trendmag_current_layout ) {
    $trendmag_sidebar = $trendmag_current_layout['sidebars'];

    if ( isset($trendmag_sidebar['sb_right_before']) ) {
        $sb_right_before = $trendmag_sidebar['sb_right_before'];
    }

    if ( isset($trendmag_sidebar['sb_before_footer']) ) {
        $sb_before_footer = $trendmag_sidebar['sb_before_footer'];
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

<div class="gap-60"></div>

<div class="wrapper">
    <div class="kopa-row-30">

        <div class="kopa-col main-col">

            <?php if ( have_posts() ) : ?>

            <div class="widget-area-6">

                <div class="widget kopa-articles-list-widget articles-list-5" itemscope="" itemtype="http://schema.org/Blog">
                    <div class="widget-content">
                        <ul class="rs-ul">

                            <?php
                            if ( have_posts() ) :
                                $enable_author_info = get_theme_mod('blog_author_left', '1');
                                $enable_time_ago = get_theme_mod('blog_time_ago', '1');
                                $enable_share_links = get_theme_mod('blog_share', '1');
                                $enable_category = get_theme_mod('blog_category', '1');
                                $enable_date = get_theme_mod('blog_date', '1');
                                $enable_by_author = get_theme_mod('blog_by_author', '1');
                                $enable_readmore = get_theme_mod('blog_read_more', '1');
                                $blog_excerpt_length = intval(get_theme_mod('blog_excerpt_length', '55'));
                            while ( have_posts()) :
                            the_post();

                            $post_id = get_the_ID();
                            $post_title = get_the_title();
                            $post_excerpt = trendmag_get_the_excerpt( get_the_excerpt(), get_the_content(), $blog_excerpt_length, '' );

                            if ( empty($post_title) ) {
                                $post_title = __('No title', 'trendmag');
                            }
                            $post_before_author_name = get_the_author_meta( 'display_name' );
                            $post_before_author_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
                            $post_more_text = trendmag_get_readmore_text();

                            ?>

                            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <article class="entry-item<?php if ( ! has_post_thumbnail($post_id)) { echo ' no-thumb'; }?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

                                    <?php
                                    if ( 1 == $enable_author_info || 1 == $enable_time_ago || 1 == $enable_share_links ) :
                                        ?>
                                        <div class="entry-left">
                                            <div class="divier"></div>

                                            <?php if ( 1 == $enable_author_info ) : ?>

                                            <a href="<?php echo esc_url($post_before_author_link); ?>" class="entry-author-avatar">
                                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 );?>
                                            </a>

                                            <?php
                                        endif;

                                            if ( 1 == $enable_time_ago ) {
                                                get_template_part('template/module/common/date-2');
                                            }
                                            # SHARE POST VIA SOCIAL

                                            if ( 1 == $enable_share_links ) {
                                                do_action('trendmag_seach_share_post_via_social');
                                            }
                                            ?>

                                        </div>
                                        <!-- /.entry-left -->

                                        <?php endif; ?>

                                    <div class="entry-right">

                                        <?php
                                        if ( is_sticky() ) {
                                            echo '<span class="sticky-post-icon"><i class="fa fa-flash"></i></span>';
                                        }
                                        $gallery = get_post_meta(get_the_ID(), 'trendmag_gallery', true);
                                        $custom  = get_post_meta(get_the_ID(), 'trendmag_custom', true);
                                        if(has_post_format('gallery') && !empty($gallery)){
                                            get_template_part('template/module/blog-post-format/content', 'gallery');
                                        }elseif(!empty($custom)){
                                            get_template_part('template/module/blog-post-format/content', 'custom');
                                        }else{
                                            get_template_part('template/module/blog-post-format/content');
                                        }

                                        ?>

                                        <header>
                                            <h3 class="entry-title style-4" itemprop="headline">
                                                <a href="<?php echo esc_url(get_permalink($post_id)); ?>" title="<?php echo esc_attr($post_title); ?>"><?php echo esc_html($post_title); ?></a>
                                            </h3>
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
                                        </header>

                                        <div class="entry-content" itemprop="text">
                                            <?php
                                            if ( ! empty($post_excerpt) ) {
                                                echo '<p>' . wp_kses_post($post_excerpt);
                                                echo '<a href="' . esc_url(get_permalink($post_id)) . '" class="readmore">[...]</a>';
                                            }

                                            if ( $enable_by_author ) :

                                                ?>

                                                <span class="entry-author">
                                                    <?php _e('By', 'trendmag');?><a href="<?php echo esc_url($post_before_author_link); ?>" itemprop="author"><?php echo esc_html($post_before_author_name); ?></a>
                                                </span>

                                                <?php endif;

                                            if ( ! empty($post_excerpt) ) { echo '</p>'; } ?>

                                        </div>
                                        <!-- /.entry-content -->

                                        <?php
                                        if ( 1 == $enable_readmore ) {
                                            get_template_part('template/module/common/readmore');
                                        }
                                        ?>

                                    </div>
                                    <!-- /.entry-right -->
                                </article>
                                <!-- /.entry-item -->
                            </li>

                            <?php endwhile; ?>

                            <?php else: ?>

                            <li>
                                <article class="entry-item" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                                    <?php _e('Nothing found ...', 'trendmag'); ?>
                                </article>
                            </li>

                            <?php endif; ?>

                        </ul>
                    </div>
                    <!-- /.widget-content -->
                </div>
                <!-- /.articles-list-5 -->

            </div>
            <!-- /.widget-area-6 -->

            <?php get_template_part('pagination'); ?>

            <?php else:?>

            <blockquote><?php _e('No items found.', 'trendmag'); ?></blockquote>

            <?php endif; ?>

        </div>
        <!-- /.main-col -->

        <?php if ( is_active_sidebar($sb_right_before) ) : ?>
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

<?php if ( is_active_sidebar($sb_before_footer) ) : ?>
<div class="widget-area-8">
    <?php dynamic_sidebar($sb_before_footer); ?>
</div>
<!-- /.widget-area-8 -->
<?php endif; ?>
