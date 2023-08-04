<?php
global $post;
$custom  = get_post_meta($post->ID, 'trendmag_custom', true);

?>

<?php if($custom = get_post_meta(get_the_ID(), 'trendmag_custom', true)): ?>
<div class="entry-thumb">
    <?php echo apply_filters('the_content', $custom); ?>
</div>
<?php endif;
