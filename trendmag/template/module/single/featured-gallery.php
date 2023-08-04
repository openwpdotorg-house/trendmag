<?php
$gallery = get_post_meta(get_the_ID(), 'trendmag_gallery', true);
if( $gallery ):
    $ids = explode(',', $gallery);
    if(!empty($ids)){
        $slides     = array();
        $sb_right_before   = apply_filters('trendmag_get_sidebar', 'sb_right_before', 'pos_right_before');

        $image_slug = is_active_sidebar($sb_right_before) ? 'single-gallery-1-slide' : 'single-gallery-1-slide-full';
        $data_slider_width = is_active_sidebar($sb_right_before) ? '605px' : '1000px';

        $image_info_slide = trendmag_get_image_info($image_slug);
        $image_info_thumb = trendmag_get_image_info('single-gallery-1-thumb');
        if ( isset($image_info_slide['info']) ) {
            $image_info_slide = $image_info_slide['info'];
        }
        if ( isset($image_info_thumb['info']) ) {
            $image_info_thumb = $image_info_thumb['info'];
        }

        foreach($ids as $id){


            if ( class_exists('Trendmag_Toolkit_Plus') ) {
                $image = wp_get_attachment_image_src( $id, 'full' );
                $image_thumb = wp_get_attachment_image_src( $id, 'full' );
            } else {
                $image = wp_get_attachment_image_src( $id, $image_info_slide );
                $image_thumb = wp_get_attachment_image_src( $id, $image_info_thumb );
            }

            $thumb_caption = wp_get_attachment_image($id,'full');
            $image_caption = '';
            if (!empty($thumb_caption)) {
                $_thumb = array();
                $regex = '#<\s*img [^\>]*alt\s*=\s*(["\'])(.*?)\1#im';
                preg_match($regex, $thumb_caption, $_thumb);
                $image_caption = $_thumb[2];
            }

            if( $image ){
                if ( class_exists('Trendmag_Toolkit_Plus') ) {
                    $params = array( 'width' => $image_info_slide[0], 'height' => $image_info_slide[1], 'crop' => true );
                    $image_url = bfi_thumb($image[0], $params);
                } else {
                    $image_url = $image[0];
                }

                $trendmag_slides[] = sprintf('
            <div class="sp-slide" title="%2$s">
                <a href="#" title="%2$s"><img class="sp-image" src="%1$s" alt="%2$s"/></a>
                <h4 class="entry-title style-10">
                    %2$s
                </h4>
            </div>
            ', esc_url($image_url), esc_attr($image_caption));
            }

            if( $image_thumb ){
                $trendmag_thumbs[] = sprintf('
                <div class="sp-thumbnail">
                    <div class="sp-thumbnail-image-container" title="%2$s">
                        <a href="#" title="%2$s"><img class="sp-thumbnail-image" src="%1$s" alt="%2$s"/></a>
                    </div>
                </div>
            ', esc_url($image_thumb[0]), esc_attr($image_caption));
            }
        }

        if(!empty($trendmag_slides)){
            ?>
        <div class="single-post-thumb">
            <div class="widget kopa-slider-pro-widget slider-pro-2">
                <div class="widget-content">
                    <div class="slider-pro" data-auto-play="2" data-slider-arrows="2" data-slider-buttons="2" data-slider-width="<?php echo esc_attr($data_slider_width); ?>" data-slider-orientation="horizontal" data-slider-thumbnails-position="right">
                        <div class="sp-slides">
                            <?php echo implode('', $trendmag_slides); ?>
                        </div>

                        <div class="sp-thumbnails">
                            <?php echo implode('', $trendmag_thumbs); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
    }

endif;