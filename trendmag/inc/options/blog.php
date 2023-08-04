<?php
add_filter( 'kopa_theme_options_settings', 'trendmag_init_options_blog');

function trendmag_init_options_blog($options){

	$options[] = array(
		'title' => __('Blog', 'trendmag'),
		'type'  => 'title',
		'id'    => 'tab-blog');

        $options[] = array(
            'type'    => 'number',
            'id'      => 'blog_excerpt',
            'default' => 20,
            'title'   => __('Number words of excerpt to show', 'trendmag'),
        );

	    #1: Metadata
		$options[] = array(
			'title' => __('Metadata', 'trendmag'),
			'type'  => 'groupstart',
			'id'    => 'tab-blog-groupstart-metadata');

            $options[] = array(
                'title'   => NULL,
                'type'    => 'checkbox',
                'id'      => 'is-enable-blog-author-info',
                'default' => 1,
                'label'   => __('Author avatar', 'trendmag'),
                'desc'    => __('Check this option to display.', 'trendmag')
            );
            $options[] = array(
                'title'   => NULL,
                'type'    => 'checkbox',
                'id'      => 'is-enable-blog-time-ago',
                'default' => 1,
                'label'   => __('Time ago', 'trendmag'),
                'desc'    => __('Check this option to display.', 'trendmag')
            );
            $options[] = array(
                'title'   => NULL,
                'type'    => 'checkbox',
                'id'      => 'is-enable-blog-share-links',
                'default' => 1,
                'label'   => __('Share links', 'trendmag'),
                'desc'    => __('Check this option to display.', 'trendmag')
            );
			$options[] = array(
				'title'   => NULL,
				'type'    => 'checkbox',
				'id'      => 'is-enable-blog-category',
				'default' => 1,
				'label'   => __('Category', 'trendmag'),
				'desc'    => __('Check this option to display.', 'trendmag'),
            );
			
			$options[] = array(
				'title'   => NULL,
				'type'    => 'checkbox',
				'id'      => 'is-enable-blog-created-date',
				'default' => 1,
				'label'   => __('Created date', 'trendmag'),
				'desc'    => __('Check this option to display.', 'trendmag'),
            );

            $options[] = array(
                'title'   => NULL,
                'type'    => 'checkbox',
                'id'      => 'is-enable-blog-author-by',
                'default' => 1,
                'label'   => __('by author', 'trendmag'),
                'desc'    => __('Check this option to display.', 'trendmag')
            );

            $options[] = array(
                'title'   => NULL,
                'type'    => 'checkbox',
                'id'      => 'is-enable-blog-readmore',
                'default' => 1,
                'label'   => __('Readmore', 'trendmag'),
                'desc'    => __('Check this option to display.', 'trendmag')
            );



		$options[] = array(
			'type' => 'groupend',
			'id'   => 'tab-blog-groupend-metadata');
	    
	return apply_filters('trendmag_init_options_blog', $options);
}