<?php
global $post;
$post_id = $post->ID;
$trendmag_readmore = trendmag_get_readmore_text();
?>

<footer>
    <a href="<?php echo esc_url(get_permalink($post_id)); ?>" title="<?php echo esc_attr(get_the_title($post_id)); ?>" class="view-topic"><span><?php echo esc_html($trendmag_readmore); ?></span><i class="kopa-icon arrow-right"></i></a>
</footer>