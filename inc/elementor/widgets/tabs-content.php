<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Elementor\Repeater;
class WPTB_Tab_content_Widget extends \Elementor\Widget_Base {
    
    // Widget Slug
    public function get_name() {
        return 'wptb_tabs_content';
    }

    // Widget Title
    public function get_title() {
        return __('WPTB Tab Content', 'wptb');
    }

    // Widget Icon
    public function get_icon() {
        return 'eicon-tabs';
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
				'label' => esc_html__( 'WPTB Tabs Content', 'wptb' ),
			]
		);
        $this->add_control(
            'tabs_content_type',
            [
                'label' => esc_html__('Content Style', 'wptb'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'tabs-basic',
                'label_block' => false,
                'options' => [
                    'tabs-basic' => esc_html__('Basic', 'wptb'),
                    'tabs-list' => esc_html__('List View', 'wptb'),
                ],
            ]
        );

        $this->add_control(
            'section_img',
            [
                'label'   => __('Section Image', 'wptb'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'tabs_title',
            [
                'label' => __('Title', 'wptb'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Personal Info', 'wptb'),
            ]
        );
        $this->add_control(
            'tabs_desc',
            [
                'label' => __('Descriptions', 'wptb'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('Neque porro quisquam est, qui dolorem ipsum quia dolor sit consectetur,', 'wptb'),
            ]
        );
        
        $repeater = new Repeater();

        $repeater->add_control(
            'tabs_info_box',
            [
                'label' => __('Info Box Title', 'wptb'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Email', 'wptb'),
            ]
        );

        $repeater->add_control(
            'tabs_sub',
            [
                'label' => __('Sub Title', 'wptb'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('demo@gmail.com', 'wptb'),
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => __('Type', 'wptb'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'basic' => __('Basic', 'wptb'),
                    'icon' => __('Icons', 'wptb'),
                    'img' => __('Image', 'wptb'),
                ],
                'default' => 'basic',
            ]
        );
        $repeater->add_control(
            'info_box_img',
            [
                'label'   => __('Image', 'wptb'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => ['img'],
                ],
            ]
        );
        $repeater->add_control(
            'conte_link',
            [
                'label' => __('Link', 'wptb'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'wptb'),
                'condition' => [
                    'type' => 'basic',
                ],
            ]
        );

        // Nested Repeater (Only for Type 2 - Social Icons)
        $child_repeater = new Repeater();
        $child_repeater->add_control(
            'tabs_social_icon',
            [
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'social',
				'default' => [
					'value' => 'fab fa-facebook',
					'library' => 'fa-brands',
				],
				'recommended' => [
					'fa-brands' => [						
						'facebook',
						'github',
						'instagram',
						'linkedin',
						'pinterest',
						'skype',
						'telegram',
						'twitter',
						'whatsapp',
						'x-twitter',
						'youtube',
					],
					'fa-solid' => [
						'envelope',
						'link',
						'rss',
					],
				],
			]
        );
        $child_repeater->add_control(
            'social_link',
            [
                'label' => __('Social Link', 'wptb'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-social-link.com', 'wptb'),
            ]
        );
        $repeater->add_control(
            'socials',
            [
                'label' => __('Social Icons', 'wptb'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $child_repeater->get_controls(),
                'title_field' => '{{{ tabs_social_icon.value }}}',
                'condition' => [
                    'type' => 'icon',
                ],
            ]
        );
        $this->add_control(
            'info_box_list',
            [
                'label' => __('Info Box', 'wptb'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ tabs_info_box }}}',
                'condition' => [
                    'tabs_content_type' => 'tabs-basic',
                ],
            ]
        );

        $list_view = new Repeater();

        $list_view->add_control(
            'list_title_view',
            [
                'label' => __('Title', 'wptb'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Programming Course', 'wptb'),
            ]
        );
        $list_view->add_control(
            'list_sub_title',
            [
                'label' => __('Sub Title', 'wptb'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('New York University', 'wptb'),
            ]
        );
        $list_view->add_control(
            'list_date',
            [
                'label' => __('Date', 'wptb'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('2011-2013', 'wptb'),
            ]
        );
        $this->add_control(
            'info_box_list_view',
            [
                'label' => __('Info Box List', 'wptb'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $list_view->get_controls(),
                'title_field' => '{{{ list_title_view }}}',
                'condition' => [
                    'tabs_content_type' => 'tabs-list',
                ],
            ]
        );
        
        $this->end_controls_section();
    }

    // Render Widget Output
    protected function render() {

        $settings = $this->get_settings_for_display();      
        $params['section_img']      = $settings['section_img'];
        $params['tabs_title']       = $settings['tabs_title'];
        $params['tabs_desc']        = $settings['tabs_desc'];
        $params['info_box_list']    = $settings['info_box_list'];
        $params['info_list_view']   = $settings['info_box_list_view'];

        echo wptb_tabs_section_content($params);
        
    }
}
?>
