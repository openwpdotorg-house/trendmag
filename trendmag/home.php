<?php
$header_affix = apply_filters('trendmag_get_header', '');
$footer_affix = apply_filters('trendmag_get_footer', '');

$is_override_default_template = apply_filters('trendmag_is_override_default_template', false);

get_header($header_affix);

do_action('trendmag_load_template');

if(!$is_override_default_template){
	if($trendmag_current_layout = trendmag_get_template_setting()){
		$layout_id = $trendmag_current_layout['layout_id'];
		get_template_part('template/archive/archive', $trendmag_current_layout['layout_id']);
	}else{
		get_template_part('template/archive/archive');
	}
}

get_footer($footer_affix);