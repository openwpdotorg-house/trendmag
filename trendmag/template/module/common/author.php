<?php
global $post;
$post_id = $post->ID;

$post_author_name = get_the_author_meta( 'display_name' );
$post_author_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
?>

<span class="entry-author">
    <?php _e('By', 'trendmag'); ?>
    <a href="<?php echo esc_url($post_author_link); ?>"><?php echo esc_html($post_author_name); ?></a>
</span>

