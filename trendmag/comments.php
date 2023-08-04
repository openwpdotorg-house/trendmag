<?php
if ( post_password_required() ) {
    return;
}
?>

<div class="kopa-comments">
    <?php if (have_comments()) : ?>

        <h4>
            <?php
            printf(_n('%1$s comment', '%1$s comments',
                    get_comments_number(), 'trendmag'),
                get_comments_number());
            ?>
        </h4>

        <ul class="rs-ul">
            <?php
            wp_list_comments(array(
                'walker' => null,
                'style' => 'ul',
                'short_ping' => true,
                'callback' => 'trendmag_comment_list',
                'type' => 'all'
            ));
            ?>
        </ul>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <div class="comments-pagination">
                <?php
                paginate_comments_links(array(
                    'prev_text' => __('Prev', 'trendmag'),
                    'next_text' => __('Next', 'trendmag'),
                    'type'      => 'list',
                    'prev_next'          => True,
                ));
                //paginate_comments_links();
                ?>
            </div>
        <?php endif; ?>

        <?php if (!comments_open() && get_comments_number()) : ?>
            <blockquote><?php _e('Comments are closed.', 'trendmag'); ?></blockquote>
        <?php endif; ?>

    <?php endif; ?>
</div>

<?php trendmag_comment_form();
    //comment_form();
?>

<?php

function trendmag_comment_form($args = array(), $post_id = null) {
    if (null === $post_id) {
        $post_id = get_the_ID();
    }

    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
    $args = wp_parse_args($args);
    $args['format'] = current_theme_supports('html5', 'comment-form') ? 'html5' : 'xhtml';
    $req = get_option('require_name_email');
    $aria_req = ( $req ? "aria-required=true" : '' );
    $html5 = 'html5' === $args['format'];

    $fields = array();

    $fields['author'] = trendmag_get_comment_field($aria_req, 'text', 'comment_name', 'author', __('Name *', 'trendmag'));

    $fields['email'] = trendmag_get_comment_field($aria_req, 'text', 'comment_email', 'email', __('Email *', 'trendmag'));

    $fields['url'] = trendmag_get_comment_field($aria_req, 'text', 'comment_url', 'url', __('Website', 'trendmag'));

    $fields = apply_filters('comment_form_default_fields', $fields);

    $comment_field = trendmag_get_comment_field_message($aria_req, 'comment_message', 'comment', __('Message *', 'trendmag'));

    $defaults = array(
        'fields' => $fields,
        'comment_field' => $comment_field,
        'must_log_in' => '<p class="must-log-in">' . sprintf(__('You must be <a href="%s">logged in</a> to post a comment.', 'trendmag'), wp_login_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>',
        'logged_in_as' => '<p class="logged-in-as">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'trendmag'), get_edit_user_link(), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'id_form' => 'comments-form',
        'id_submit' => 'submit-comment',
        'title_reply' => __('Leave a comment', 'trendmag'),
        'title_reply_to' => __('Leave a comment to %s', 'trendmag'),
        'cancel_reply_link' => __('(Cancel)', 'trendmag'),
        'label_submit' => __('Post Comment', 'trendmag'),
        'format' => 'xhtml',
    );
    $args = wp_parse_args($args, apply_filters('comment_form_defaults', $defaults));
    ?>
    <?php if (comments_open($post_id)) : ?>
        <?php
        do_action('comment_form_before');
        ?>
        <div id="respond" class="comment-respond">
            <h3 id="reply-title" class="comment-reply-title">
                <?php comment_form_title($args['title_reply'], $args['title_reply_to']); ?>
                <?php cancel_comment_reply_link($args['cancel_reply_link']); ?>
            </h3>

            <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                <?php echo wp_kses_post( $args['must_log_in'] ); ?>
                <?php
                do_action('comment_form_must_log_in_after');
                ?>
            <?php else :
            ?>
                <form action="<?php echo esc_url(site_url('/wp-comments-post.php')); ?>" method="post" id="<?php echo esc_attr($args['id_form']); ?>" class="comment-form">
                    <?php
                    do_action('comment_form_top');
                    echo '<div class="row">';
                    if (is_user_logged_in()) :                
                        echo apply_filters('comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity);                    
                        do_action('comment_form_logged_in_after', $commenter, $user_identity);
                    else :
                        do_action('comment_form_before_fields');
                        foreach ((array) $args['fields'] as $name => $field) {
                            echo apply_filters("comment_form_field_{$name}", $field) . "\n";
                        }
                        do_action('comment_form_after_fields');                    
                    endif; 
                    
                    echo apply_filters('comment_form_field_comment', $args['comment_field']);
                    echo wp_kses_post($args['comment_notes_after']); 
                    ?>
                    </div>
                    <p class="form-submit">
                        <input name="submit" type="submit" id="<?php echo esc_attr($args['id_submit']); ?>" class="submit" value="<?php echo esc_attr($args['label_submit']); ?>">
                        <?php comment_id_fields($post_id); ?>
                    </p>

                    <?php do_action('comment_form', $post_id); ?>
                </form>
            <?php endif; ?>
        </div><!-- #respond -->
        <?php
        do_action('comment_form_after');
    else :
        do_action('comment_form_comments_closed');
    endif;
}

function trendmag_get_comment_field($aria_req, $type = 'text', $id = '', $name = '', $label = '',$placeholder = '', $before = NULL, $after = NULL) {
    ob_start();

    echo wp_kses_post( $before );
    ?>

    <div class="col-xs-12 col-sm-4">
        <input <?php echo esc_attr($aria_req); ?>
            type="<?php echo esc_attr($type); ?>"
            value="<?php echo wp_kses_post($label); ?>"
            onfocus="if(this.value=='<?php echo wp_kses_post($label); ?>')this.value='';"
            onblur="if(this.value=='')this.value='<?php echo wp_kses_post($label); ?>';"
            id="<?php echo esc_attr($id); ?>"
            name="<?php echo esc_attr($name); ?>"
            class="valid">
    </div>

    <?php
    echo wp_kses_post( $after );
    return ob_get_clean();
}

function trendmag_get_comment_field_message($aria_req, $id = '', $name = '', $placeholder = '') {
    ob_start();
    ?>

    <span class="col-xs-12">
        <textarea
            <?php echo esc_attr($aria_req); ?>
            name="<?php echo esc_attr($name); ?>"
            style="overflow:auto;resize:vertical ;"
            id="<?php echo esc_attr($id); ?>"
            onfocus="if(this.value=='<?php echo esc_attr($placeholder); ?>')this.value='';"
            onblur="if(this.value=='')this.value='<?php echo esc_attr($placeholder); ?>';" class="valid"><?php echo esc_attr($placeholder); ?></textarea>
    </span>

    <?php
    return ob_get_clean();
}

function trendmag_comment_list($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>

    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="entry-item">
            <div class="entry-thumb">
                <a href="<?php echo esc_url($comment->comment_author_url); ?>" target="_blank"><?php echo get_avatar($comment->comment_author_email,70); ?></a>
            </div>
            <div class="entry-box">
                <a href="<?php echo esc_url($comment->comment_author_url); ?>" target="_blank" class="cmt-name"><?php echo esc_html($comment->comment_author); ?></a>
                <span class="cmt-time"><?php _e('Posted on ', 'trendmag'); ?> <span><?php comment_time(get_option('date_format')); ?>  <?php _e('at', 'trendmag'); ?> <?php comment_time(get_option('time_format')); ?></span></span>

                <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'trendmag'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>

                <?php edit_comment_link(__('Edit', 'trendmag'), '', ''); ?>

                <div class="clearfix"></div>
                <div class="cmt-content">
                    <?php comment_text(); ?>
                </div>
            </div>
        </div>
        <!-- /.entry-item -->

        <?php
    }
    