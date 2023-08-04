<?php
global $post;
if ( function_exists('trendmag_get_view_count_for_post') ) {
    $trendmag_post_view = trendmag_get_view_count_for_post($post->ID);
    if ( $trendmag_post_view ) :
        if ( 1 == $trendmag_post_view ) {
            $trendmag_view = __(' view', 'trendmag');
        } else {
            $trendmag_view = __(' views', 'trendmag');
        }
        ?>
    <span class="entry-share"><i class="fa fa-eye"></i><?php echo esc_html($trendmag_post_view) . $trendmag_view; ?></span>
    <?php endif;
}
