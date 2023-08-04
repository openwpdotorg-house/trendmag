<?php
    $more_text = trendmag_get_readmore_text();
    $more_icon = trendmag_get_readmore_icon();
    global $post;
?>
<div class="overlay">
    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" title="<?php esc_attr(get_the_title($post->ID)); ?>"><?php echo esc_html($more_text); ?></a>
    <span><?php echo esc_html($more_icon); ?></span>
</div>