<?php
$trendmag_get_by = get_theme_mod('single_relate_get_by', 'post_tag');
$trendmag_limit  = intval(get_theme_mod('single_relate_limit', '6'));

if ($trendmag_limit > 0) {
    global $post;
    $trendmag_taxs = array();

    if ('category' == $trendmag_get_by) {
        $trendmag_cats = get_the_category($post->ID);
        if ($trendmag_cats) {
            $ids = array();
            foreach ($trendmag_cats as $cat) {
                $ids[] = $cat->term_id;
            }
            $trendmag_taxs [] = array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $ids
            );
        }
    } else if ('post_tag' == $trendmag_get_by) {
        $trendmag_tags = get_the_tags($post->ID);
        if ($trendmag_tags) {
            $ids = array();
            foreach ($trendmag_tags as $tag) {
                $ids[] = $tag->term_id;
            }
            $trendmag_taxs [] = array(
				'taxonomy' => 'post_tag',
				'field'    => 'id',
				'terms'    => $ids
            );
        }
    }

    if ($trendmag_taxs) {
        $related_args = array(
			'post_type'      => array($post->post_type),
			'tax_query'      => $trendmag_taxs,
			'post__not_in'   => array($post->ID),
			'posts_per_page' => $trendmag_limit
        );

        $trendmag_related_posts = new WP_Query($related_args);
        if ($trendmag_related_posts->have_posts()):
            $list_classes = array('widget', 'kopa-related-post');
            $list_classes[] = sprintf('post-list-%d-items', $trendmag_related_posts->post_count);
            $item_limit = 4;

            ?>

        <div class="widget-area-8">

        <div class="widget kopa-owl-widget owl-widget-3 nav-top">
        <div class="wrapper">
        <div class="widget-header">
            <h2 class="widget-title style-1"><span><?php _e('Related posts', 'trendmag'); ?></span></h2>
        </div>
        <!-- .widget-title -->
        <div class="widget-content">
        <div class="row">

            <?php if ( $trendmag_related_posts->post_count > $item_limit) : ?>

                <div class="customNavigation">
                    <a class="btn prev"><i class="kopa-icon arrow-left"></i></a>
                    <span class="current-slide"></span>
                    <span class="text-center"> <?php _e('of', 'trendmag'); ?> </span>
                    <span class="total-slides"></span>
                    <a class="btn next"><i class="kopa-icon arrow-right"></i></a>
                </div>
                <!-- /.customNavigation -->

            <?php endif; ?>
            <div class="owl-carousel owl-theme owl-content" data-slider-item="<?php echo esc_attr($item_limit);?>" data-slider-auto="2" data-slider-navigation="2" data-slider-pagination="2">
                <?php
                    while ( $trendmag_related_posts->have_posts() ) :
                        $trendmag_related_posts->the_post();
                        $post_title = get_the_title();
                        if ( empty($post_title) ) {
                            $post_title = __('No title', 'trendmag');
                        }
                ?>

                <article class="entry-item" itemscope="" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                    <?php if ( has_post_thumbnail()) :
                        $image_slug = 'single-related';
                    ?>
                        <div class="entry-thumb" itemscope="" itemtype="http://schema.org/ImageObject">
                            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post_title); ?>" itemprop="contentUrl">
                                <?php trendmag_the_post_thumbnail(get_the_ID(), $image_slug, array('itemprop' => 'thumbnailUrl')); ?>
                            </a>
                            <?php get_template_part('template/module/common/overlay'); ?>
                        </div>
                    <?php endif;?>
                    <header>
                        <h5 class="entry-title style-1" itemprop="headline">
                            <a href="<?php the_permalink();?>" title="<?php echo esc_attr($post_title); ?>"><?php echo esc_html($post_title); ?></a>
                        </h5>
                    </header>
                    <footer>
                        <p class="entry-meta">
                            <?php
                                get_template_part('template/module/common/category');
                                get_template_part('template/module/common/post-view');
                            ?>
                        </p>
                    </footer>
                </article>
                <!-- /.entry-item -->

                <?php endwhile; ?>

            </div>
            <!-- /.owl-theme -->
        </div>
        <!-- /.kopa-row-30 -->
        </div>
        <!-- /.widget-content -->
        </div>
        <!-- /.wrapper -->
        </div>
        <!-- /.owl-widget-3 -->
        </div>
        <!-- /.widget-area-8 -->

            <?php
        endif;
        wp_reset_postdata();
    }
}