<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Elementor\Repeater;
class WPTB_CTA_Widget extends \Elementor\Widget_Base {
    
    // Widget Slug
    public function get_name() {
        return 'wptb_cta';
    }

    // Widget Title
    public function get_title() {
        return __('WPTB CAll To Action', 'wptb');
    }

    // Widget Icon
    public function get_icon() {
        return 'eicon-sort-down';
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
				'label' => esc_html__( 'WPTB Call To Action', 'wptb' ),
			]
		);
        $this->add_control(
            'wptb_cta_type',
            [
                'label' => esc_html__('Content Style', 'wptb'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cta-basic',
                'label_block' => false,
                'options' => [
                    'cta-basic' => esc_html__('Basic', 'wptb'),
                    'cta-img'   => esc_html__('Image', 'wptb'),
                    'cta-icon'  => esc_html__('Icons', 'wptb'),
                ],
            ]
        );
        $this->add_control(
			'cta_title',
			[
				'label' => esc_html__( 'Title', 'wptb' ),
				'type' => \Elementor\Controls_Manager::TEXT,
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
			'cta_details',
			[
				'label' => esc_html__( 'Details', 'wptb' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'ai' => [
					'type' => 'text',
				],
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Victoria Street London', 'wptb' ),
                'condition' => [
                    'wptb_cta_type' => ['cta-basic', 'cta-img'],
                ],
			]
		);
        $this->add_control(
			'cta_link',
			[
				'label' => esc_html__( 'Link', 'elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'is_external' => 'true',
				],
				'dynamic' => [
					'active' => true,
				],
                'condition' => [
                    'wptb_cta_type' => ['cta-basic'],
                ],
			]
		);
        $this->add_control(
            'cta_image',
            [
                'label'   => __('Image', 'wptb'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'wptb_cta_type' => ['cta-img'],
                ],
            ]
        );
        /**
         * Condition: 'eael_cta_type' => 'cta-basic'
         */
        $repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
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

		$repeater->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'is_external' => 'true',
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'cta_social_list',
			[
				'label' => esc_html__( 'Social Icons', 'elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'social_icon' => [
							'value' => 'fab fa-facebook',
							'library' => 'fa-brands',
						],
					],
					[
						'social_icon' => [
							'value' => 'fab fa-twitter',
							'library' => 'fa-brands',
						],
					],
				],
				'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
                'condition' => [
                    'wptb_cta_type' => 'cta-icon',
                ],
			]
		);
        
        $this->end_controls_section();
    }

    // Render Widget Output
    protected function render() {

        $settings = $this->get_settings_for_display();

        // if ( ! $settings['wptb_gallery'] ) {
		// 	return;
		// }

		//$ids = wp_list_pluck( $settings['wp_gallery'], 'id' );
      
        $params['cta_type']     = $settings['wptb_cta_type'];
        $params['cta_title']    = $settings['cta_title'];
        $params['cta_details']  = $settings['cta_details'];
        $params['cta_details']  = $settings['cta_details'];
        $params['cta_image']    = $settings['cta_image'];
        $params['cta_link']     = $settings['cta_link'];

        echo wptb_call_to_acton($params);
        
    }
}
?>
