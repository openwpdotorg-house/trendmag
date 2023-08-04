<?php
add_filter( 'kopa_theme_options_settings', 'trendmag_init_options_header');

function trendmag_init_options_header($options){

	$options[] = array(
		'title' => __('Header', 'trendmag'),
		'type'  => 'title',
		'id'	=> 'tab-header'	
	);

		$options[] = array(			
			'type' 	  => 'checkbox',			
			'id' 	  => 'is-enable-top-search-form',
			'default' => 1,
			'label'   => __( 'Search form', 'trendmag' ),
			'desc'    => __('Check this option to display.', 'trendmag'),
		);
		$options[] = array(			
			'type' 	  => 'checkbox',			
			'id' 	  => 'is-enable-breadcrumb',
			'default' => 1,
			'label'   => __( 'Breadcrumb', 'trendmag' ),
			'desc'    => __('Check this option to display.', 'trendmag'),
		);

        $options[] = array(
            'title'   => __('Page title background', 'trendmag'),
            'type'    => 'upload',
            'id'      => 'page_title_bg',
            'desc'    => __( 'upload background for page title', 'trendmag'),
            'mimes'   => 'image',
        );
	
	return $options;
}