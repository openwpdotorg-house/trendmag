<?php
$page_title = __('Latest News', 'trendmag');

if (is_archive()) {
    if (is_tag() || is_category() || is_tax()) {
        $term = get_queried_object();
        $page_title = $term->name;
    } else if (is_year() || is_month() || is_day()) {

    } else if (is_author()) {
        $author_id = get_queried_object_id();

        $page_title = get_the_author_meta('display_name', $author_id);
    }
    if ( is_post_type_archive('show') ) {
        $page_title = __('Fashion show', 'trendmag');
    }

    if ( is_post_type_archive('product') ) {
        $page_title = __('Shop', 'trendmag');
    }

} else if (is_search()) {
    global $wp_query;
    $s = get_search_query();
    $c = $wp_query->found_posts;
    $page_title = sprintf(__('Search Results for: %s', 'trendmag'), $s);

} else if (is_singular()) {
    global $post;
    $title = get_the_title($post);

    $custom_title = get_post_meta($post->ID, 'trendmag-page-title', true);

    if ($custom_title) {
        $title = $custom_title;
    } else {
        $post_cats = get_the_category($post->ID);
        if ( $post_cats ) {
            foreach ( $post_cats as $category ) {
                $title = $category->cat_name;
            }
        }
    }

    $page_title = $title;
} else if (is_404()) {
    $page_title = __('Page not found...', 'trendmag');
}

$page_title = apply_filters('trendmag_get_page_title', $page_title);
ob_start();
if (!empty($page_title)):
    ?>
    <h1 class="entry-cat-title"><?php echo esc_html($page_title); ?></h1>
<?php
endif;

$html = ob_get_clean();
echo apply_filters('trendmag_get_page_title_html', $html, $page_title);


