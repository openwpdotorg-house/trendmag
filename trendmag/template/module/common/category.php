<?php
global $post;
$post_id = $post->ID;

$post_cats = get_the_category( $post_id );
if ( $post_cats ) {
    $count = true;
    foreach ( $post_cats as $category ) {
        if ( $count ) {
            echo sprintf('<a href="%1$s" class="entry-categories" title="%2$s" rel="category">%3$s</a>', esc_url(get_category_link($category)), esc_attr($category->name), esc_html($category->name));
        }
        $count = false;
    }
}
