<?php
$enable_search = get_theme_mod('header-enable-search', '1');
if ( $enable_search ) :
?>
<div class="kopa-search-box">
    <a href="#" class="toggle-search-box"><i class="fa fa-search"></i></a>
    <form method="get" class="search-form clearfix" action="<?php echo esc_url(trailingslashit(home_url('/'))); ?>">
        <input type="text" maxlength="20" class="search-text" name="s" placeholder="<?php _e('Search...', 'trendmag'); ?>">
        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<?php endif;
