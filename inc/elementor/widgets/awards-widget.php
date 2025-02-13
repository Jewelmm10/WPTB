<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class WPTB_Awards_Widget extends Widget_Base {
    
    // Widget Slug
    public function get_name() {
        return 'wptb_awards';
    }

    // Widget Title
    public function get_title() {
        return __('WPTB Awards', 'wptb');
    }

    // Widget Icon
    public function get_icon() {
        return 'eicon-favorite';
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
				'label' => esc_html__( 'WPTB Awards', 'wptb' ),
			]
		);
        $this->add_control(
			'award_section_title',
			[
				'label' => esc_html__( 'Title', 'wptb' ),
				'type' => Controls_Manager::TEXTAREA,
				'ai' => [
					'type' => 'text',
				],
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Our Awards', 'wptb' ),
			]
		);
		
        $repeater = new Repeater();

        $repeater->add_control(
            'award_title',
            [
                'label' => __('Title', 'wptb'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Site Of The Day', 'wptb'),
            ]
        );
        $repeater->add_control(
            'award_sub_title',
            [
                'label' => __('Sub Title', 'wptb'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Css & Animation', 'wptb'),
            ]
        );
        $repeater->add_control(
            'award_date',
            [
                'label' => __('Date', 'wptb'),
                'type' => Controls_Manager::TEXT,
                'default' => __('2018', 'wptb'),
            ]
        );
        $this->add_control(
            'award_lists',
            [
                'label' => __('Award Box List', 'wptb'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ award_title }}}',
            ]
        );
        
        $this->end_controls_section();
        //style
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Background Style', 'wptb'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', 'wptb'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .awoard__section' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );
        
        $this->add_control(
            'background_image',
            [
                'label' => esc_html__('Background Image', 'wptb'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .awoard__section' => 'background-image: url("{{URL}}"); background-size: cover; background-position: center;',
                ],
            ]
        );
        
        $this->end_controls_section();
        
    }

    // Render Widget Output
    protected function render() {

        $settings = $this->get_settings_for_display();      

        $params['section_title'] = $settings['award_section_title'];
        $params['award_lists'] = $settings['award_lists']; 

        echo wptb_awards($params);
        
    }
}
?>
