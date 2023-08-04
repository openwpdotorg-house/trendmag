<?php
$sb_right_before   = apply_filters('trendmag_get_sidebar', 'sb_right_before', 'pos_right_before');
$sb_after   = apply_filters('trendmag_get_sidebar', 'sb_after', 'pos_after');
$sb_before_footer   = apply_filters('trendmag_get_sidebar', 'sb_before_footer', 'pos_before_footer');
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
        <div class="kopa-col main-col<?php if ( ! is_active_sidebar($sb_right_before) ) { echo ' blog-no-sb-right'; }?>">
            <?php if ( have_posts() ) :
            $enable_author_info = get_theme_mod('blog_author_left', '1');
            $enable_time_ago = get_theme_mod('blog_time_ago', '1');
            $enable_share_links = get_theme_mod('blog_share', '1');
            $enable_by_author = get_theme_mod('blog_by_author', '1');
            $enable_readmore = get_theme_mod('blog_read_more', '1');
            $enable_category = get_theme_mod('blog_category', '1');
            $enable_date = get_theme_mod('blog_date', '1');
            $blog_excerpt_length = intval(get_theme_mod('blog_excerpt_length', '55'));
            ?>

            <div class="widget-area-6">
                <div class="widget kopa-articles-list-widget articles-list-5" itemscope="" itemtype="http://schema.org/Blog">
                    <div class="widget-content">
                        <ul class="rs-ul">
                            <?php while ( have_posts() ) :
                            the_post();
                                $post_id = get_the_ID();
                                $post_title = get_the_title();
                                $post_excerpt = trendmag_get_the_excerpt( get_the_excerpt(), get_the_content(), $blog_excerpt_length, '' );
                                $post_before_author_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
                                $post_before_author_name = get_the_author_meta( 'display_name' );

                                if ( empty($post_title) ) {
                                    $post_title = __('No title', 'trendmag');
                                }
                                ?>

                                <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <article class="entry-item<?php if ( ! has_post_thumbnail($post_id)) { echo ' no-thumb'; }?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                                        <?php
                                            if ( 1 == $enable_author_info || 1 == $enable_time_ago || 1 == $enable_share_links ) {
                                        ?>

                                        <div class="entry-left">
                                            <div class="divier"></div>

                                            <?php
                                                if ( 1 == $enable_author_info ) {
                                                    get_template_part('template/module/common/author-left');
                                                }

                                                if ( 1 == $enable_time_ago ) {
                                                    get_template_part('template/module/common/date-2');
                                                }

                                                # SHARE POST VIA SOCIAL

                                                if ( 1 == $enable_share_links ) {
                                                    get_template_part('template/module/blog-featured/share');
                                                }
                                            ?>

                                        </div>
                                        <!-- /.entry-left -->

                                        <?php } ?>

                                        <div class="entry-right">

                                            <?php
                                            if ( has_post_thumbnail()) {
                                                $image_slug = is_active_sidebar($sb_right_before) ? 'blog-featured' : 'blog-featured-full';
                                                if ( is_sticky() ) :
                                                ?>
                                                    <span class="sticky-post-icon">
                                                      <i class="fa fa-flash"></i>
                                                    </span>
                                                <?php endif; ?>
                                                <div class="entry-thumb" itemscope="" itemtype="http://schema.org/ImageObject">
                                                    <a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_attr($post_title); ?>" itemprop="contentUrl">
                                                        <?php trendmag_the_post_thumbnail($post_id, $image_slug, array('class' => 'img-responsive', 'itemprop' => 'thumbnailUrl') ); ?>
                                                    </a>
                                                    <?php get_template_part('template/module/common/overlay'); ?>
                                                </div>
                                                <!-- /.entry-thumb -->

                                                <?php } ?>

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
                                                <?php if ( ! empty($post_excerpt) ) { echo '<p>' . wp_kses_post($post_excerpt); echo '<a href="' . esc_url(get_permalink($post_id)) . '" class="readmore">[...]</a>'; } ?>
                                                <?php
                                                    if ($enable_by_author) :
                                                ?>
                                                    <span class="entry-author">
                                                        <?php _e(' By', 'trendmag');?><a href="<?php echo esc_url($post_before_author_link); ?>" itemprop="author"><?php echo esc_html($post_before_author_name); ?></a>
                                                    </span>
                                                <?php endif; ?>

                                                <?php if ( ! empty($post_excerpt) ) { echo '</p>'; } ?>
                                            </div>
                                            <!-- /.entry-content -->

                                            <?php
                                                if ( $enable_readmore ) {
                                                    get_template_part('template/module/common/readmore');
                                                }
                                            ?>

                                        </div>
                                        <!-- /.entry-right -->
                                        <div class="clearfix"></div>
                                    </article>
                                    <!-- /.entry-item -->
                                </li>

                                <?php
                        endwhile;
                            ?>
                        </ul>
                    </div>
                    <!-- /.widget-content -->
                </div>
                <!-- /.articles-list-5 -->
            </div>
            <!-- /.widget-area-6 -->

            <?php get_template_part('pagination'); ?>

            <?php else: ?>
                <p></p>
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

<div class="wrapper">
    <?php if ( is_active_sidebar($sb_after) ) : ?>
    <div class="widget-area-11">
        <?php dynamic_sidebar($sb_after); ?>
    </div>
    <!-- /.widget-area-11 -->
    <?php endif; ?>
</div>
<!-- /.wrapper -->

<?php if ( is_active_sidebar($sb_before_footer) ) : ?>

<div class="widget-area-12">
    <?php dynamic_sidebar($sb_before_footer); ?>
</div>
<!-- /.widget-area-12 -->

<?php endif;