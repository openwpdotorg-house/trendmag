<?php
global $post;
$post_id = $post->ID;
?>
<span class="entry-time-1">
    <?php echo esc_html(human_time_diff( strtotime(get_the_time('F j, Y g:i a', $post_id)), current_time('timestamp') ) . __(' ago', 'trendmag')); ?>
</span>