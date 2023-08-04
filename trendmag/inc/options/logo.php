<?php
add_filter( 'kopa_theme_options_settings', 'trendmag_init_options_logo');

function trendmag_init_options_logo($options){

	$options[] = array(
		'title' => __('Logo & Favicon', 'trendmag'),
		'type'  => 'title',
		'id'	=> 'tab-logo-and-favicon'	
	);
		$options[] = array(
			'title' => __('Logo', 'trendmag'),
			'type'  => 'groupstart',					
		);
			$options[] = array(
				'title'   => __('Nav Logo image in header 1', 'trendmag'),
				'type'    => 'upload',
				'id'      => 'nav-logo-desktop',
				'desc'    => __( 'upload your logo image', 'trendmag'),
				'mimes'   => 'image',
			);

            $options[] = array(
                'title'   => __('Logo version 1', 'trendmag'),
                'type'    => 'upload',
                'id'      => 'nav-logo-mobile',
                'desc'    => __( 'Used for home 1, Blog page mobile', 'trendmag'),
                'mimes'   => 'image',
            );

            $options[] = array(
                'title'   => __('Logo image in header 2 ( black background )', 'trendmag'),
                'type'    => 'upload',
                'id'      => 'logo-desktop-home-2',
                'desc'    => __( 'upload your logo image', 'trendmag'),
                'mimes'   => 'image',
            );

            $options[] = array(
                'title'   => __('Nav Logo image in header 2 ( black background ) ', 'trendmag'),
                'type'    => 'upload',
                'id'      => 'nav-logo-desktop-home-2',
                'desc'    => __( 'upload your logo image', 'trendmag'),
                'mimes'   => 'image',
            );

			$options[] = array(
				'title'   => __('Margin top (px)', 'trendmag'),
				'type' 	  => 'number',
				'id' 	  => 'logo-margin-top',
				'default' => '',			
			);
			$options[] = array(
				'title'   => __('Margin bottom (px)', 'trendmag'),
				'type' 	  => 'number',
				'id' 	  => 'logo-margin-bottom',
				'default' => '',			
			);
			$options[] = array(
				'title'   => __('Margin left (px)', 'trendmag'),
				'type' 	  => 'number',
				'id' 	  => 'logo-margin-left',
				'default' => '',			
			);			
			$options[] = array(
				'title'   => __('Margin right (px)', 'trendmag'),
				'type'    => 'number',				
				'id'      => 'logo-margin-right',
				'default' => '',							
			);

		$options[] = array('type' => 'groupend');

		$options[] = array(
			'title' => __('Favicon', 'trendmag'),
			'type'  => 'upload',
			'id'    => 'favicon',
			'desc'  => __('upload your favicon image', 'trendmag'),			
			'mimes' => 'image',
		);
		
		$options[] = array(
			'title' => __('Apple icon', 'trendmag'),
			'type'  => 'upload',
			'id'    => 'apple-icon',
			'desc'  => __('upload icon for apple device (152x152)', 'trendmag'),				
			'mimes' => 'image',
		);

	return $options;
}