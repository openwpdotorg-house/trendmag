<?php
$logo_small = get_theme_mod('logo_small', '');
$logo_small = apply_filters('trendmag_custom_logo_small', $logo_small, '');
if ( ! empty($logo_small) ) : ?>

<div class="nav-logo">
    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
        <img class="logo-custom" src="<?php echo esc_url($logo_small);  ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
    </a>
</div>

<?php
endif;