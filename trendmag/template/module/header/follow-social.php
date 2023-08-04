<?php
# FOLLOW ME VIA SOCIAL LINKS
$sb_follow_top = apply_filters('trendmag_get_sidebar', 'sb_follow_top', 'pos_follow_top');
if ( is_active_sidebar($sb_follow_top) ) {
    dynamic_sidebar($sb_follow_top);
}
echo '<div class="clearfix"></div>';
