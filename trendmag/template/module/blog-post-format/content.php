<?php
    $sb_right   = apply_filters('trendmag_get_sidebar', 'sb_right_before', 'pos_right_before');
    $image_slug = is_active_sidebar($sb_right) ? 'blog-featured' : 'blog-featured-full';
?>

<?php if ( has_post_thumbnail() ) : ?>

<div class="entry-thumb" itemscope="" itemtype="http://schema.org/ImageObject">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="contentUrl">
        <?php trendmag_the_post_thumbnail(get_the_id(), $image_slug, array('itemprop' => 'thumbnailUrl')); ?>
    </a>
    <?php get_template_part('template/module/common/overlay'); ?>
</div>
<!-- /.entry-thumb -->

<?php endif;