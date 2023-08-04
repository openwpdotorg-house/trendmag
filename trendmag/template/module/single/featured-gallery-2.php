<?php
$gallery = get_post_meta(get_the_ID(), 'trendmag_gallery', true);
if( $gallery ):
    $ids = explode(',', $gallery);
    if(!empty($ids)){
        $slides     = array();

        $image_info_slide = trendmag_get_image_info('widget-carousel-slides-three');
        $image_info_thumb = trendmag_get_image_info('single-gallery-1-thumb');
        if ( isset($image_info_slide['info']) ) {
            $image_info_slide = $image_info_slide['info'];
        }
        if ( isset($image_info_thumb['info']) ) {
            $image_info_thumb = $image_info_thumb['info'];
        }

        foreach($ids as $id){
            $image = wp_get_attachment_image_src( $id, $image_info_slide );
            $image_thumb = wp_get_attachment_image_src( $id, $image_info_thumb );

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
                    <div class="sp-slide">
                        <div class="entry-item">
                            <div class="entry-thumb">
                                <img src="%1$s" alt="%2$s">
                            </div>
                            <div class="entry-content">
                                <h2 class="entry-title">%2$s</h2>
                            </div>
                            <!-- /.entry-content -->
                        </div>
                        <!-- /.entry-item -->
                    </div>
            ', esc_url($image_url), esc_attr($image_caption));
            }

            if( $image_thumb ){
                $trendmag_thumbs[] = sprintf('

                    <div class="sp-thumbnail">
                        <div class="sp-thumbnail-image-container">
                            <img class="sp-thumbnail-image" src="%1$s" alt="%2$s" />
                        </div>
                    </div>
            ', esc_url($image_thumb[0]), esc_attr($image_caption));
            }
        }

        if(!empty($trendmag_slides)){
            ?>

        <div class="widget kopa-slider-pro-widget slider-pro-3">
            <div class="widget-content">
                <div class="slider-pro" data-auto-play="2" data-slider-arrows="1" data-slider-buttons="2" data-slider-width="90%" data-slider-thumbnails-position="bottom">
                    <div class="sp-slides">
                        <?php echo implode('', $trendmag_slides); ?>
                    </div>
                    <!-- /.sp-slides -->
                    <div class="sp-thumbnails">
                        <?php echo implode('', $trendmag_thumbs); ?>
                    </div>
                    <!-- /.sp-thumbnails -->
                </div>
                <!-- /.slider-pro -->
            </div>
            <!-- /.widget-content -->
        </div>

        <?php
        }
    }

endif;