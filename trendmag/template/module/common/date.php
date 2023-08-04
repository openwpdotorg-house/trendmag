<?php
global $post;
$post_id = $post->ID;
?>

<span class="entry-date"><time itemprop="datePublished" datetime="<?php echo esc_attr(get_the_date('Y-m-d', $post_id)); ?>"><?php echo esc_html(get_the_date(get_option('date_format'), $post_id)); ?></time></span>