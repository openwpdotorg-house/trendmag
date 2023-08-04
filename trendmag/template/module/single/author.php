<?php
global $post;

$user_id     = $post->post_author;
$description = get_the_author_meta('description', $user_id);
$email       = get_the_author_meta('user_email', $user_id);
$name        = get_the_author_meta('display_name', $user_id);
$url         = trim(get_the_author_meta('user_url', $user_id));
$link        = ($url) ? $url : get_author_posts_url($user_id);

$author_role = '';
$user = new WP_User( $user_id );
if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
    foreach ( $user->roles as $role )
        $author_role = $role;
}
$author_job = get_the_author_meta('job');

?>
<div class="kopa-author-box">
    <div class="inner">
        <div class="author-thumb">
            <a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($name); ?>"><?php echo get_avatar($email, 70); ?></a>
        </div>
        <!-- /.author-thumb -->
        <div class="author-box">
            <a href="<?php echo esc_url($link); ?>" class="author-name"><?php echo esc_attr($name); ?></a>

            <?php if ( ! empty($author_role) || ! empty($author_job) ): ?>

                <span class="role">
                    <?php
                        if ( ! empty($author_role) ) {
                            echo esc_html(trendmag_uppercase_first_letter($author_role));
                        }

                        if ( ! empty($author_role) && ! empty($author_job) ) {
                            echo ', ';
                        }

                        if ( ! empty($author_job) ) {
                            echo esc_html($author_job);
                        }
                    ?>
                </span>

            <?php endif; ?>

            <div class="clearfix"></div>
            <?php if ( ! empty($description) ) : ?>
                <p class="author-description"><?php echo wp_kses_post($description); ?></p>
            <?php endif; ?>
        </div>
        <!-- /.author-box -->
    </div>
    <!-- /.inner -->
</div>
<!-- /.kopa-author-box -->
