<?php
global $post;
$post_url       = get_permalink($post->ID);
$post_title     = get_the_title($post->ID);
?>

<div class="wrap-share-1">
    <a href="#" class="toggle-share-1" rel="nofollow"><?php _e('share', 'trendmag'); ?></a>
    <ul class="rs-ul share-1">
        <li class="trendmag-share-face"><a href="<?php echo esc_url(sprintf('//www.facebook.com/share.php?u=%s', urlencode($post_url))); ?>" title="<?php _e('Share by facebook', 'trendmag'); ?>" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i><?php _e('Share', 'trendmag'); ?></a></li>
        <li class="trendmag-share-twitter"><a href="<?php echo esc_url(sprintf('//twitter.com/home?status=%s+%s', $post_title, $post_url)); ?>" title="<?php _e('Share by twitter', 'trendmag'); ?>" target="_blank"  rel="nofollow"><i class="fa fa-twitter"></i><?php _e('Tweet', 'trendmag'); ?></a></li>
        <li class="trendmag-share-google-plus"><a href="<?php echo esc_url(sprintf('//plus.google.com/share?url=%s', $post_url)); ?>" title="<?php _e('Share by google plus', 'trendmag'); ?>" target="_blank" rel="nofollow"><i class="fa fa-google-plus"></i><?php _e('Google', 'trendmag'); ?></a></li>
    </ul>
</div>