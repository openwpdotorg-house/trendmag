<?php
global $post;
$sb_right_before   = apply_filters('trendmag_get_sidebar', 'sb_right_before', 'pos_right_before');
global $trendmag_current_layout;
if ( $trendmag_current_layout ) {
    $trendmag_sidebar = $trendmag_current_layout['sidebars'];
    if ( isset($trendmag_sidebar['sb_right_before']) ) {
        $sb_right_before = $trendmag_sidebar['sb_right_before'];
    }
}
if ( is_active_sidebar($sb_right_before) ) {
    $image_info = trendmag_get_image_info('blog-format-gallery');
} else {
    $image_info = trendmag_get_image_info('blog-format-gallery-full');
}


$image_info = $image_info['info'];

if($gallery = get_post_meta(get_the_ID(), 'trendmag_gallery', true)):
    $ids = explode(',', $gallery);
    if(!empty($ids)){
        $slides = array();

        foreach($ids as $id){
            if ( class_exists('Trendmag_Toolkit_Plus') ) {
                if($image = wp_get_attachment_image_src( $id, 'full' )){
                    $params = array( 'width' => $image_info[0], 'height' => $image_info[1], 'crop' => true );
                    $slides[] = sprintf('<li itemscope="" itemtype="http://schema.org/ImageObject"><img src="%s" alt=""></li>', esc_url(bfi_thumb($image[0], $params)));
                }
            } else {
                if($image = wp_get_attachment_image_src( $id, $image_info )){
                    $slides[] = sprintf('<li itemscope="" itemtype="http://schema.org/ImageObject"><img src="%s" alt=""></li>', $image[0]);
                }
            }
        }

        if(!empty($slides)){
            ?>
        <div class="entry-thumb">
            <div class="widget kopa-flex-widget flex-widget-2">
                <div class="widget-content">
                    <div class="flexslider" data-slider-direction="horizontal" data-slider-speed="7000" data-slider-auto="2" data-slider-controlnav="1" data-slider-directionnav="1">
                        <ul class="rs-ul slides">
                            <?php echo implode('', $slides); ?>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-content -->
            </div>
        </div>
        <?php
        }
    }
endif;

