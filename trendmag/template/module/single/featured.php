<?php 
if(!has_post_thumbnail())
	return;
global $post;
$post_id = $post->ID;
$sb_right_before   = apply_filters('trendmag_get_sidebar', 'sb_right_before', 'pos_right_before');

$image_slug = is_active_sidebar($sb_right_before) ? 'single' : 'single-full';
?>

<div class="entry-thumb">

</div>

<div class="single-post-thumb" itemscope="" itemtype="http://schema.org/ImageObject">
    <?php trendmag_the_post_thumbnail($post_id, $image_slug, array('itemprop' => 'thumbnailUrl')); ?>

    <?php
        $thumb_id = get_post_thumbnail_id($post_id);
        $thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
        if ( ! empty($thumb_alt) ) :
    ?>
        <p class="caption" itemprop="caption"><?php echo esc_html($thumb_alt); ?></p>
    <?php endif; ?>
</div>

<!-- /.enry-thumb -->