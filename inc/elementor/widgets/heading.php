<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class WPTB_Heading_Widget extends \Elementor\Widget_Base {
    
    // Widget Slug
    public function get_name() {
        return 'wptb_heading';
    }

    // Widget Title
    public function get_title() {
        return __('WPTB Heading', 'wptb');
    }

    // Widget Icon
    public function get_icon() {
        return 'eicon-t-letter-bold';
    }

    // Widget Categories
    public function get_categories() {
        return ['wptb-elements'];
    }

    // Register Widget Controls
    protected function _register_controls() {
        $this->start_controls_section(
			'section-title',
			[
				'label' => esc_html__( 'WPTB Heading', 'wptb' ),
			]
		);
		$this->add_control(
            'heading_type',
            [
                'label' => esc_html__('Content Style', 'wptb'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'basic',
                'label_block' => false,
                'options' => [
                    'basic' => esc_html__('Basic', 'wptb'),
                    'stand' => esc_html__('Standard', 'wptb'),
                ],
            ]
        );
        $this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'wptb' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'ai' => [
					'type' => 'text',
				],
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your title', 'wptb' ),
				'default' => esc_html__( 'Add Your Heading Text Here', 'wptb' ),
			]
		);
        $this->add_control(
			'sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'wptb' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'ai' => [
					'type' => 'text',
				],
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your title', 'wptb' ),
				'default' => esc_html__( 'Add Your Heading Text Here', 'wptb' ),
				'condition' => [
                    'heading_type' => ['basic'],
                ],
			]
		);
		$this->add_control(
            'title_img',
            [
                'label'   => __('Title Pre-Image', 'wptb'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
				'condition' => [
                    'heading_type' => ['stand'],
                ],
            ]
        );
        
        $this->end_controls_section();
    }

    // Render Widget Output
    protected function render() {

        $settings = $this->get_settings_for_display();      

        $params['heading_type']   = $settings['heading_type'];
		$params['title']    	  = $settings['title'];
        $params['sub_title']   	  = $settings['sub_title'];
        $params['title_img']   	  = $settings['title_img'];

        echo wptb_heading($params);
        
    }
}
?>
