<?php
global $post;
$post_id = $post->ID;

$post_before_author_name = get_the_author_meta( 'display_name' );
$post_before_author_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
?>

<a href="<?php echo esc_url($post_before_author_link); ?>" class="entry-author-avatar">
    <?php echo get_avatar( get_the_author_meta( 'ID' ), 70 );?>
</a>

