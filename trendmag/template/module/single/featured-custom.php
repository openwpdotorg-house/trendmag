<?php 
if($custom = get_post_meta(get_the_ID(), 'trendmag_custom', true)):
    $format = get_post_format();
    if( 'audio' === $format ) {
        echo '<div class="single-post-thumb" itemscope="" itemtype="http://schema.org/ImageObject">';
        echo '<div class="kopa-wrap-iframe">';
    } elseif( 'video' === $format ) {
        echo '<div class="single-post-thumb">';
    }
    ?>
        <?php echo apply_filters('the_content', $custom); ?>

        <?php
            if( 'audio' === $format ) {
                echo '</div>';
            }
        ?>
    </div>
<?php endif;