<?php
global $post;
$post_url       = get_permalink($post->ID);
$post_title     = get_the_title($post->ID);
?>

<div class="share-wrap">
    <span class="entry-share"><i class="fa fa-share-alt"></i><?php _e('share', 'trendmag'); ?></span>
    <div class="wrap-link">
        <ul class="rs-ul">
            <li><a class="facebook-icon" href="<?php echo esc_url(sprintf('http://www.facebook.com/share.php?u=%s', urlencode($post_url))); ?>" title="<?php _e('Share by facebook', 'trendmag'); ?>" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter-icon" href="<?php echo esc_url(sprintf('http://twitter.com/home?status=%s+%s', $post_title, $post_url)); ?>" title="<?php _e('Share by twitter', 'trendmag'); ?>" target="_blank"  rel="nofollow"><i class="fa fa-twitter"></i></a></li>
            <li><a class="google-plus-icon" href="<?php echo esc_url(sprintf('https://plus.google.com/share?url=%s', $post_url)); ?>" title="<?php _e('Share by google plus', 'trendmag'); ?>" target="_blank" rel="nofollow"><i class="fa fa-google-plus"></i></a></li>
        </ul>
    </div>
</div>
<!-- /.share-wrap -->