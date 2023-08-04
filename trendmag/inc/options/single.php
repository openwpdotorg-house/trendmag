<?php
add_filter( 'kopa_theme_options_settings', 'trendmag_init_options_single');

function trendmag_init_options_single($options){

	$options[] = array(
		'title' => __('Single post', 'trendmag'),
		'type'  => 'title',
		'id'    => 'tab-single');
	    
	    #1: Metadata
		$options[] = array(
			'title' => __('Metadata', 'trendmag'),
			'type'  => 'groupstart',
			'id'    => 'tab-single-groupstart-metadata');

            $options[] = array(
                'title'   => NULL,
                'type'    => 'checkbox',
                'id'      => 'is-enable-post-author-info-left',
                'default' => 1,
                'label'   => __('Author information in left', 'trendmag'),
                'desc'    => __('Check this option to display.', 'trendmag')
            );

            $options[] = array(
                'title'   => NULL,
                'type'    => 'checkbox',
                'id'      => 'is-enable-post-time-ago',
                'default' => 1,
                'label'   => __('Time ago', 'trendmag'),
                'desc'    => __('Check this option to display.', 'trendmag')
            );

            $options[] = array(
                'title'   => NULL,
                'type'    => 'checkbox',
                'id'      => 'is-enable-post-share-buttons-left',
                'default' => 1,
                'label'   => __('Share buttons in left', 'trendmag'),
                'desc'    => __('Check this option to display.', 'trendmag')
            );

            $options[] = array(
                'title'   => NULL,
                'type'    => 'checkbox',
                'id'      => 'is-enable-post-category',
                'default' => 1,
                'label'   => __('Category', 'trendmag'),
                'desc'    => __('Check this option to display.', 'trendmag'),
            );

            $options[] = array(
                'title'   => NULL,
                'type'    => 'checkbox',
                'id'      => 'is-enable-post-created-date',
                'default' => 1,
                'label'   => __('Created date', 'trendmag'),
                'desc'    => __('Check this option to display.', 'trendmag'),
            );

            $options[] = array(
                'title'   => NULL,
                'type'    => 'checkbox',
                'id'      => 'is-enable-post-share-buttons-middle',
                'default' => 1,
                'label'   => __('Share buttons in middle', 'trendmag'),
                'desc'    => __('Check this option to display.', 'trendmag')
            );

			$options[] = array(
				'title'   => NULL,
				'type'    => 'checkbox',
				'id'      => 'is-enable-post-tag',
				'default' => 1,
				'label'   => __('Tags', 'trendmag'),
				'desc'    => __('Check this option to display.', 'trendmag'),
				);

            $options[] = array(
                'title'   => NULL,
                'type'    => 'checkbox',
                'id'      => 'is-enable-post-author-info-middle',
                'default' => 1,
                'label'   => __('Author information in middle', 'trendmag'),
                'desc'    => __('Check this option to display.', 'trendmag')
            );

		$options[] = array(
			'type' => 'groupend',
			'id'   => 'tab-single-groupend-metadata');
	    
	    #2: Related Posts
		$options[] = array(
			'title' => __('Related posts', 'trendmag'),
			'type'  => 'groupstart',
			'id'    => 'tab-single-groupstart-related-posts',
			);

			$options[] = array(
				'title'   => __('Get by', 'trendmag'),
				'type'    => 'select',
				'id'      => 'single-post-related-by',
				'default' => 'post_tag',
				'options' => array(
					'category' => __('Category', 'trendmag'),
					'post_tag' => __('Tag', 'trendmag')));

			$options[] = array(
				'title'   => __('Number of posts', 'trendmag'),
				'type'    => 'number',
				'id'      => 'single-post-related-limit',
				'default' => 6,
				'desc'    => __('Enter <code>0</code> to disable this option.', 'trendmag'));	  

		$options[] = array(
			'type' => 'groupend',
			'id'   => 'tab-single-groupstart-related-posts');

	return apply_filters('trendmag_init_options_single', $options);
}