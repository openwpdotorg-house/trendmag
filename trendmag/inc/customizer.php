<?php
function trendmag_init_options($options){
    #Panels

    $options['panels'][] = array(
        'id'    => 'trendmag_panel_theme_option',
        'title' => __('Theme options', 'trendmag'));

    #Sections
    $options['sections'][] = array(
        'id'    => 'trendmag_section_logo_favicon',
        'panel' => 'trendmag_panel_theme_option',
        'title' => __('Logo', 'trendmag'));

    $options['sections'][] = array(
        'id'    => 'trendmag_section_custom_header',
        'panel' => 'trendmag_panel_theme_option',
        'title' => __('Header options', 'trendmag'));

    $options['sections'][] = array(
        'id'    => 'trendmag_section_custom_blog',
        'panel' => 'trendmag_panel_theme_option',
        'title' => __('Blog', 'trendmag'));

    $options['sections'][] = array(
        'id'    => 'trendmag_section_custom_single_post',
        'panel' => 'trendmag_panel_theme_option',
        'title' => __('Single post', 'trendmag'));

    $options['sections'][] = array(
        'id'    => 'trendmag_section_custom_font',
        'panel' => 'trendmag_panel_theme_option',
        'title' => __('Fonts', 'trendmag'));

    $options['sections'][] = array(
        'id'    => 'trendmag_section_custom_css',
        'panel' => 'trendmag_panel_theme_option',
        'title' => __('Custom css', 'trendmag'));


    #Settings

    #Logo
    $options['settings'][] = array(
        'settings'          => 'logo_small',
        'label'       => __('Small logo', 'trendmag'),
        'description' => '',
        'default'     => '',
        'type'        => 'image',
        'section'     => 'trendmag_section_logo_favicon',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'logo_mobile',
        'label'       => __('Mobile Logo', 'trendmag'),
        'description' => '',
        'default'     => '',
        'type'        => 'image',
        'section'     => 'trendmag_section_logo_favicon',
        'transport'   => 'refresh');

    #Header option
    $options['settings'][] = array(
        'settings'          => 'header-enable-search',
        'label'       => __('Search form', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_header',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'header-enable-breadcrumb',
        'label'       => __('Breadcrumb', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_header',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'header-page-title-bg',
        'label'       => __('Page title background', 'trendmag'),
        'description' => __('upload background for page title', 'trendmag'),
        'default'     => '',
        'type'        => 'image',
        'section'     => 'trendmag_section_custom_header',
        'transport'   => 'refresh');

    #Blog options
    $options['settings'][] = array(
        'settings'          => 'blog_excerpt_length',
        'label'       => __('Number words of excerpt to show', 'trendmag'),
        'description' => '',
        'default'     => '',
        'type'        => 'text',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_number_post_before',
        'label'       => __('Number of posts to show in before', 'trendmag'),
        'description' => '',
        'default'     => '',
        'type'        => 'text',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_author_left',
        'label'       => __('Author information in left', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_time_ago',
        'label'       => __('Time ago', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_share',
        'label'       => __('Share links', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_category',
        'label'       => __('Category', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_date',
        'label'       => __('Created date', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_by_author',
        'label'       => __('By author', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'blog_read_more',
        'label'       => __('Read more', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_blog',
        'transport'   => 'refresh');

    #Single post option
    $options['settings'][] = array(
        'settings'          => 'single_author_left',
        'label'       => __('Author information in left', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_time_ago',
        'label'       => __('Time ago', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_share_left',
        'label'       => __(' Share buttons in left', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_category',
        'label'       => __('Category', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_date',
        'label'       => __('Created date', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_share_middle',
        'label'       => __('Share buttons in middle', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_tag',
        'label'       => __('Tags', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_author_middle',
        'label'       => __('Author information in middle', 'trendmag'),
        'description' => __('Check this option to display.', 'trendmag'),
        'default'     => '1',
        'type'        => 'checkbox',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_relate_get_by',
        'label'       => __('Related posts - get by', 'trendmag'),
        'description' => '',
        'default'     => 'post_tag',
        'choices'     => array(
            'category' => 'Category',
            'post_tag' => 'Tag',
        ),
        'type'        => 'select',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    $options['settings'][] = array(
        'settings'          => 'single_relate_limit',
        'label'       => __('Related posts - Number of posts', 'trendmag'),
        'description' => __('Enter 0 to disable this option.', 'trendmag'),
        'default'     => '6',
        'type'        => 'text',
        'section'     => 'trendmag_section_custom_single_post',
        'transport'   => 'refresh');

    #Fonts

    if ( class_exists('Kopa_Framework') ) {
        $element_fonts = trendmag_get_site_elements();
        if ( $element_fonts ) {
            foreach ( $element_fonts as $slug => $font ) {

                $options['settings'][] = array(
                    'settings'          => "is_enable_custom_font_{$slug}",
                    'label'       => __('Enable custom font for ', 'trendmag') . "{$font['title']}",
                    'description' => '',
                    'default'     => '',
                    'type'        => 'checkbox',
                    'section'     => 'trendmag_section_custom_font',
                    'transport'   => 'refresh');

                $options['settings'][] = array(
                    'class_name'  => 'Trendmag_Customize_Select_Control',
                    'type'        => 'font',
                    'settings'    => "{$slug}_font_family",
                    'label'       => __('Font family', 'trendmag'),
                    'description' => '',
                    'default'     => '',
                    'section'     => 'trendmag_section_custom_font',
                    'transport'   => 'refresh',
                    'data_id' => "{$slug}_font",
                    'data_main_id' => "{$slug}_font"
                );

                $options['settings'][] = array(
                    'settings'          => "{$slug}_font_weight",
                    'label'       => __("Font weight", 'trendmag'),
                    'description' => __('With google font, some attributes value will display depends on font selected. Please reference https://www.google.com/fonts for more detail.', 'trendmag'),
                    'default'     => 'none',
                    'choices'     => array(
                        'none' => "&mdash; Select a font weight &mdash;",
                        '100' => '100',
                        '200' => '200',
                        '300' => '300',
                        '400' => '400',
                        '500' => '500',
                        '600' => '600',
                        '700' => '700',
                        '800' => '800',
                        '900' => '900',
                    ),
                    'type'        => 'select',
                    'section'     => 'trendmag_section_custom_font',
                    'transport'   => 'refresh');

                $options['settings'][] = array(
                    'settings'          => "{$slug}_font_size",
                    'label'       => __('Font size', 'trendmag'),
                    'description' => '',
                    'default'     => '',
                    'type'        => 'text',
                    'section'     => 'trendmag_section_custom_font',
                    'transport'   => 'refresh');

                $options['settings'][] = array(
                    'class_name'  => 'Trendmag_Customize_Separate_Control',
                    'type'        => 'separate',
                    'settings'    => "{$slug}_font_separate",
                    'label'       => '',
                    'description' => '',
                    'default'     => '',
                    'section'     => 'trendmag_section_custom_font',
                    'transport'   => 'refresh',
                );

            }
        }
    }

    $options['settings'][] = array(
        'settings'          => 'custom_css',
        'label'       => __('Custom css', 'trendmag'),
        'description' => __('Enter the your custom CSS code', 'trendmag'),
        'default'     => '',
        'type'        => 'textarea',
        'section'     => 'trendmag_section_custom_css',
        'transport'   => 'refresh');


    return $options;
}

add_action('customize_register', 'trendmag_customize_register_select');

function trendmag_customize_register_select(){

    class Trendmag_Customize_Select_Control extends WP_Customize_Control {
        public $type = 'font';
        public $data_id = '';
        public $data_main_id = '';

        public function render_content() {
            $all_custom_fonts    = (array) get_theme_mod( 'custom_fonts' );
            $custom_font_options = array();

            foreach ( $all_custom_fonts as $custom_font ) {
                $custom_font_name = '';
                if ( isset( $custom_font['name'] ) ) {
                    $custom_font_name = $custom_font['name'];
                }
                if ( $custom_font_name ) {
                    $custom_font_options[ $custom_font_name ] = $custom_font_name;
                }
            }

            $standard_groups = array(
                'system_fonts' => __('System Fonts', 'trendmag'),
                'google_fonts' => __('Google Fonts', 'trendmag'),
            );

            $standard_fonts = array(
                "none" => "&mdash; Select a font &mdash;",//please, always use this key: "none"
                'system_fonts' => kopa_system_font_options(),
                'google_fonts' => trendmag_google_font_options(),
            );

            ?>

        <label>

            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>

            <select class="kopa_select_font"
                    id="<?php echo esc_attr($this->data_id);?>"
                    name="<?php echo esc_attr($this->id);?>"
                    data-main-id="<?php echo esc_attr($this->data_main_id);?>"
                    <?php $this->link();?>
                >

                <?php if ( isset($standard_fonts['none']) ) :?>
                <option value="none" selected="selected"><?php echo esc_html($standard_fonts['none']); ?></option>
                <?php endif; ?>

                <?php
                if ( $standard_groups ) {
                    foreach ( $standard_groups as $key => $name ) {
                        echo sprintf('<optgroup label="%s">', esc_html($name));

                        if ( $standard_fonts[$key] ) {
                            foreach ( $standard_fonts[$key] as $k => $v ) {
                                echo sprintf('<option value="%s">%s</option>', esc_attr($k), esc_html($v));
                            }
                        }

                        echo '</optgroup>';
                    }
                }
                ?>
            </select>

        </label>

        <?php
        }
    }

    class Trendmag_Customize_Separate_Control extends WP_Customize_Control {
        public $type = 'separate';
        public function render_content() {
            ?>

        <label>

            <span style="display: block; border-bottom: 1px solid; width: 100%; height: 5px; color:#dfdfdf; margin-top:15px; margin-bottom: 15px;"></span>

        </label>

        <?php
        }

    }

}