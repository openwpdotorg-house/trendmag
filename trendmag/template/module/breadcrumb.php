<?php
$enable_breadcrumb = get_theme_mod('header-enable-breadcrumb', 1);
if ( ! $enable_breadcrumb ) {
    return;
}

global $post, $wp_query;
$current_class = 'current-page';
$prefix        = ' &raquo; ';

$breadcrumb = '';

if (is_archive()) {
    if (is_tag()) {
        $term = get_term(get_queried_object_id(), 'post_tag');
        $breadcrumb .= $prefix . sprintf('<span class="%1$s" itemprop="title">%2$s</span></span>', $current_class, $term->name);
    } else if (is_category()) {
        $terms_link = explode($prefix, substr(get_category_parents(get_queried_object_id(), TRUE, $prefix), 0, (strlen($prefix) * -1)));
        $n = count($terms_link);
        if ($n > 1) {
            for ($i = 0; $i < ($n - 1); $i++) {
                $breadcrumb .= $prefix . $terms_link[$i];
            }
        }
        $breadcrumb .= $prefix . sprintf('<span itemprop="title" class="%1$s">%2$s</span>', $current_class, get_the_category_by_ID(get_queried_object_id()));
    } else if (is_year() || is_month() || is_day()) {
        $breadcrumb .= $prefix . sprintf('<span itemprop="title" class="%1$s">%2$s</span></a>', $current_class, get_the_archive_title(''));
    }else if (is_author()) {

        $author_id = get_queried_object_id();
        $breadcrumb .= $prefix . sprintf('<span itemprop="title">%2$s</span></a>', $current_class, sprintf(__('Posts created by %1$s', 'trendmag'), esc_attr(get_the_author_meta('display_name', $author_id))));
    } else if(is_tax()){
        $term = get_queried_object();
        if(isset($term->taxonomy)){
            $breadcrumb .= $prefix . sprintf('<a class="%1$s" itemprop="url" title="%2$s"><span itemprop="title">%2$s</span></a>', $current_class, esc_html($term->name));
        }
    }
    if ( is_post_type_archive('show') ) {
        $breadcrumb .= $prefix . sprintf('<span itemprop="title" class="%1$s">%2$s</span>', $current_class, get_the_archive_title());
    }

} else if (is_search()) {
    $breadcrumb .= $prefix . sprintf('<span itemprop="title" class="%1$s">%2$s</span>', $current_class, __('Search page', 'trendmag'));
} else if (is_singular()) {
    if (is_page()) {
        if (is_front_page()) {
            $breadcrumb = NULL;
        } else {
            $post_ancestors = get_post_ancestors($post);
            if ($post_ancestors) {
                $post_ancestors = array_reverse($post_ancestors);
                foreach ($post_ancestors as $crumb)
                    $breadcrumb .= $prefix . sprintf('<a href="%1$s" itemprop="url" title=">%2$s"><span itemprop="title">%2$s</span></a>', get_permalink($crumb), esc_html(get_the_title($crumb)));
            }
            $breadcrumb .= $prefix . sprintf('<span itemprop="title" class="%1$s">%2$s</span>', $current_class, esc_html(get_the_title(get_queried_object_id())));
        }
    } else {
        if (is_single()){
            $categories = get_the_category(get_queried_object_id());
            if ($categories) {
                foreach ($categories as $category) {
                    $breadcrumb .= sprintf('<span><a href="%1$s" itemprop="url" title="%3$s"><span itemprop="title">%2$s</span></a></span>', get_category_link($category->term_id), esc_html($category->name), esc_attr($category->name));
                }
            }
        }        
        $breadcrumb .= sprintf('<span itemprop="title" class="%1$s">%2$s</span>', $current_class, esc_html(get_the_title(get_queried_object_id())));
    }    
} else if (is_404()) {
    $breadcrumb .= $prefix . sprintf('<span class="%1$s" itemprop="title">%2$s</span>', $current_class, __('Page not found', 'trendmag'));
} else if(is_home()) {
    $breadcrumb .= sprintf('<span class="%1$s" itemprop="title">%2$s</span>', $current_class, __('Latest News', 'trendmag'));
}

ob_start();
?>

<div class="kopa-breadcrumb" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
        <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
            <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>">
                <span itemprop="title"><?php _e('Home', 'trendmag'); ?></span>
            </a>
        </span>

        <?php echo $breadcrumb;?>
</div>
<?php

$html = ob_get_clean();
do_action('trendmag_breadcrumb');
echo apply_filters('trendmag_get_breadcrumb', $html);

