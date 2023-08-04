<?php

add_filter( 'kopa_layout_manager_settings', 'trendmag_register_layouts');

function trendmag_get_positions(){
    $trendmag_positions = array(
        'sb_right_before'       => __( 'RIGHT BEFORE', 'trendmag'),
        'sb_after'              => __( 'AFTER', 'trendmag'),
        'sb_before_footer'      => __( 'BEFORE FOOTER', 'trendmag'),
        'sb_blog_top'           => __( 'TOP', 'trendmag'),
        'sb_info'               => __( 'INFO', 'trendmag'),
        'sb_content'            => __( 'CONTENT', 'trendmag')
    );

    if ( class_exists('Trendmag_Toolkit') && class_exists('Kopa_Framework') && ! class_exists('Trendmag_Toolkit_Plus') ) {
        $trendmag_positions['home_blog_top'] = __( 'HOME BLOG TOP', 'trendmag');
        $trendmag_positions['home_blog_after_top'] = __( 'HOME BLOG AFTER TOP', 'trendmag');
        $trendmag_positions['home_blog_content'] = __( 'HOME BLOG CONTENT', 'trendmag');
        $trendmag_positions['home_blog_after_content'] = __( 'HOME BLOG AFTER CONTENT', 'trendmag');
    }
	return apply_filters('trendmag_get_positions', $trendmag_positions);
}

function trendmag_get_sidebars(){
	return apply_filters('trendmag_get_sidebars', array(
        'sb_right_before'           => 'sb_right_before',		
		'sb_right_after'            => 'sb_right_after',
		'sb_after'                  => 'sb_after',
		'sb_before_footer'          => 'sb_before_footer',
		'sb_blog_top'          => 'sb_blog_top',
		'sb_info'                    => 'sb_info',
		'sb_content'                    => 'sb_content',
	));
}

function trendmag_register_layouts( $options ) {
	$positions = trendmag_get_positions();
	$sidebars = trendmag_get_sidebars();

	#1: Archive
	$blog_featured = array(
		'title'     => __( 'Blog Featured', 'trendmag' ),
		'preview'   => get_template_directory_uri() . '/inc/assets/images/layouts/blog-featured.png',
		'positions' => array(					
			'sb_right_before',
			'sb_after',
			'sb_before_footer',
			));

	$options['blog-layout']['positions'] = $positions;
	$options['blog-layout']['layouts'] = array(		
		'blog-featured' => $blog_featured
    );

	$options['blog-layout']['default'] = array(
		'layout_id' => 'blog-featured',
		'sidebars'  => array(			
			'blog-featured' => $sidebars
        ));

    if ( class_exists('Trendmag_Toolkit') ) {
        $blog_post_format = array(
            'title'     => __( 'Blog Format', 'trendmag' ),
            'preview'   => get_template_directory_uri() . '/inc/assets/images/layouts/blog-format.png',
            'positions' => array(
                'sb_blog_top',
                'sb_right_before',
                'sb_before_footer',
            )
        );
        $options['blog-layout']['layouts']['blog-format'] = $blog_post_format;
        $options['blog-layout']['default']['sidebars']['blog-format'] = $sidebars;
    }

	#2: Single
	$single_post = array(
		'title'     => __( 'Single post', 'trendmag' ),
		'preview'   => get_template_directory_uri() . '/inc/assets/images/layouts/single.png',
		'positions' => array(
            'sb_blog_top',
            'sb_right_before',
            'sb_right_after',
        ));

    $single_gallery = array(
        'title'     => __( 'Single gallery', 'trendmag' ),
        'preview'   => get_template_directory_uri() . '/inc/assets/images/layouts/single-gallery.png',
        'positions' => array(
            'sb_after',
            'sb_before_footer'
        ));

	$options['post-layout']['positions'] = $positions;
	$options['post-layout']['layouts'] = array(
		'single-post'     => $single_post,
		'single-gallery'     => $single_gallery
    );

	$options['post-layout']['default'] = array(
		'layout_id' => 'single-post',
		'sidebars'  => array(
			'single-post'     => array(
                'sb_blog_top' => 'sb_top',
                'sb_right_before' => 'sb_right_before',
                'sb_right_after' => 'sb_right_after',
            ),
            'single-gallery'     => array(
                'sb_after' => '',
                'sb_before_footer' => '',
            )
        ));


    #3: Front Page
    if ( class_exists('Trendmag_Toolkit') && class_exists('Kopa_Framework') && ! class_exists('Trendmag_Toolkit_Plus') ) {
        $home_blog = array(
            'title'     => __('Home blog', 'trendmag'),
            'preview'   => get_template_directory_uri() . '/inc/assets/images/layouts/home-blog.png',
            'positions' => array(
                'home_blog_top',
                'home_blog_after_top',
                'home_blog_content',
                'home_blog_after_content',
            )
        );

        $options['frontpage-layout']['positions'] = $positions;
        $options['frontpage-layout']['layouts'] = array(
            'home-blog' => $home_blog);

        $options['frontpage-layout']['default'] = array(
            'layout_id' => 'home-blog',
            'sidebars'  => array(
                'home-blog' => array(
                    'home_blog_top' => 'home_blog_top',
                    'home_blog_after_top' => 'home_blog_after_top',
                    'home_blog_content' => 'home_blog_content',
                    'home_blog_after_content' => 'home_blog_after_content',
                )
            ));

    }

    #4: Static Page
    $static_page = array(
        'title'     => __('Static page', 'trendmag'),
        'preview'   => get_template_directory_uri() . '/inc/assets/images/layouts/static-page.png',
        'positions' => array()
    );

    $page_layout = array(
        'static-page' => $static_page,
    );

    $page_layout_default = array(
        'static-page' => $sidebars,
    );

    if ( class_exists('Trendmag_Toolkit') && class_exists('Kopa_Framework') && ! class_exists('Trendmag_Toolkit_Plus') ) {
        $contact_page = array(
            'title'     => __('Contact page', 'trendmag'),
            'preview'   => get_template_directory_uri() . '/inc/assets/images/layouts/static-contact.png',
            'positions' => array(
                'sb_blog_top',
                'sb_info',
                'sb_content',
            )
        );
        $page_layout['contact-page'] = $contact_page;

        $page_layout_default = array(
            'contact-page' => array(
                'sb_blog_top' => 'sb_page_top',
                'sb_info' => 'sb_info',
                'sb_content' => 'sb_content'
            )
        );
    }

    if ( class_exists('Trendmag_Toolkit') && class_exists('Kopa_Framework') && ! class_exists('Trendmag_Toolkit_Plus') ) {
        $page_layout['home-blog'] = $home_blog;
        $page_layout_default['home-blog'] = array(
            'home_blog_top' => 'home_blog_top',
            'home_blog_after_top' => 'home_blog_after_top',
            'home_blog_content' => 'home_blog_content',
            'home_blog_after_content' => 'home_blog_after_content',
        );
    }

    $options['page-layout']['positions'] = $positions;
    $options['page-layout']['layouts'] = $page_layout;

    $options['page-layout']['default'] = array(
        'layout_id' => 'static-page',
        'sidebars'  => $page_layout_default
    );


    #5: Search Page
	$search_page = array(
		'title'     => __('Search', 'trendmag'),
		'preview'   => get_template_directory_uri() . '/inc/assets/images/layouts/search.png',
		'positions' => array(
            'sb_right_before',
            'sb_before_footer',
        ));
    
    $options['search-layout']['positions'] = $positions;
    $options['search-layout']['layouts'] = array(
        'search-page' => $search_page);

    $options['search-layout']['default'] = array(
		'layout_id' => 'search-page',
		'sidebars'  => array(
            'search-page' => $sidebars
            )
		);

	#6: Error 404
	$error_404 = array(
		'title'     => __('Error page - 404', 'trendmag'),
		'preview'   => get_template_directory_uri() . '/inc/assets/images/layouts/error-404.png',
		'positions' => array(
            'sb_info',
            'sb_content',
        ));

    $options['error404-layout']['positions'] = $positions;
    $options['error404-layout']['layouts'] = array(
        'error-404' => $error_404);

    $options['error404-layout']['default'] = array(
		'layout_id' => 'error-404',
		'sidebars'  => array(
            'error-404' => array(
                'sb_info' => 'sb_info',
                'sb_content' => 'sb_content',
            )
        ));

	return apply_filters('trendmag_custom_layouts', $options);
}