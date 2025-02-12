<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class WPTB_Hero_Widget extends \Elementor\Widget_Base {
    
    // Widget Slug
    public function get_name() {
        return 'wptb_hero';
    }

    // Widget Title
    public function get_title() {
        return __('Hero Section', 'wptb');
    }

    // Widget Icon
    public function get_icon() {
        return 'eicon-image';
    }

    // Widget Categories
    public function get_categories() {
        return ['wptb-elements'];
    }

    // Register Widget Controls (Inputs)
    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Hero Content', 'wptb'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'hero_sub_title',
            [
                'label'       => __('Sub Title', 'wptb'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => __('Currently available for freelance worldwide', 'wptb'),
                'placeholder' => __('Enter sub title...', 'wptb'),
            ]
        );
        $this->add_control(
			'sub_title_icon',
            [
                'label'   => __( 'Sub Title Icon', 'wptb' ),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fa fa-arrow-right',
                    'library' => 'fa-solid',
                ]

            ]
		);
        $this->add_control(
			'hero_title',
            [
                'label'   => __( 'Title', 'wptb' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Creative Visual'

            ]
		);
        $this->add_control(
			'animated_title',
            [
                'label'   => __( 'Animated Title', 'wptb' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Designer'

            ]
		);
        $this->add_control(
            'play_prefix_image',
            [
                'label'   => __('Play Btn Prefix Img', 'wptb'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'hero_video_link',
            [
                'label' => __( 'Video Link', 'wptb' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'provide video link here', 'wptb' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'play_suffix_text',
            [
                'label'   => __('Play Btn Suffix text', 'wptb'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Work Process',
            ]
        );
        $this->add_control(
            'hero_image',
            [
                'label'   => __('Hero Image', 'wptb'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
    }

    // Render Widget Output
    protected function render() {

        $settings = $this->get_settings_for_display();
        $params['sub_title']        = $settings['hero_sub_title'];
        $params['sub_icon']         = $settings['sub_title_icon'];
        $params['hero_title']       = $settings['hero_title'];
        $params['animate_title']    = $settings['animated_title'];
        $params['prefix_img']       = $settings['play_prefix_image'];
        $params['video_link']       = $settings['hero_video_link'];
        $params['suffix_text']      = $settings['play_suffix_text'];
        $params['hero_img']         = $settings['hero_image'];

        echo wptb_hero_section($params);
        
    }
}
?>
