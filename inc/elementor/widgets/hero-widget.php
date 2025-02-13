<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

class WPTB_Hero_Widget extends Widget_Base {
    
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
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'hero_sub_title',
            [
                'label'       => __('Button Title', 'wptb'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __('Currently available for freelance worldwide', 'wptb'),
                'placeholder' => __('Enter sub title...', 'wptb'),
            ]
        );
        $this->add_control(
			'sub_title_icon',
            [
                'label'   => __( 'Button Icon', 'wptb' ),
                'type'    => Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fa fa-arrow-right',
                    'library' => 'fa-solid',
                ]

            ]
		);
        $this->add_control(
			'hero_button_link',
            [
                'label'   => __( 'Button Link', 'wptb' ),
                'type'    => Controls_Manager::URL,
                'default' => ['is_external' => 'true'],
                'dynamic' => ['active' => true],

            ]
		);
        $this->add_control(
			'hero_title',
            [
                'label'   => __( 'Title', 'wptb' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Creative Visual'

            ]
		);
        $this->add_control(
			'animated_title',
            [
                'label'   => __( 'Animated Title', 'wptb' ),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => 'Designer'

            ]
		);
        $this->add_control(
            'play_prefix_image',
            [
                'label'   => __('Play Btn Prefix Img', 'wptb'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'hero_video_link',
            [
                'label' => __( 'Video Link', 'wptb' ),
                'type' => Controls_Manager::URL,
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
                'type'    => Controls_Manager::TEXT,
                'default' => 'Work Process',
            ]
        );
        $this->add_control(
            'hero_image',
            [
                'label'   => __('Hero Image', 'wptb'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
        
        // Social Media Section (Repeater)
        $this->start_controls_section(
            'hero_social',
        [
            'label'     => esc_html__('Social Media', 'wptb'),
        ]);
        $this->add_control(
            'hero_social_title',
            [
                'label'   => __('Social Title', 'wptb'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Follow', 'wptb'),
            ]
        );
        $this->add_control(
            'hero_social_img',
            [
                'label'   => __('Arrow Image', 'wptb'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control('wptb_media_title', [
            'label'   => __('Social Title', 'wptb'),
            'type'    => Controls_Manager::TEXT,
            'default' => __('Facebook', 'wptb'),
        ]);

        $repeater->add_control('wptb_media_icon', [
            'label'         => esc_html__('Social Icon', 'wptb'),
            'type'          => Controls_Manager::ICONS,
            'recommended'   => ['fa-brands' => ['facebook', 'github', 'instagram', 'linkedin', 'twitter', 'whatsapp']],
        ]);

        $repeater->add_control('hero_social_link', [
            'label'   => esc_html__('Link', 'wptb'),
            'type'    => Controls_Manager::URL,
            'default' => ['is_external' => 'true'],
            'dynamic' => ['active' => true],
        ]);

        $this->add_control(
            'hero_media_list', 
        [
            'label'       => __('Social List', 'wptb'),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ wptb_media_title }}}',
        ]);

        $this->end_controls_section();

        $this->start_controls_section(
            'hero_left_btn', 
        [
            'label'     => esc_html__('Hero Left Feature', 'wptb'),
        ]);
        $this->add_control('hero_left_title', [
            'label'   => __('Left Feature Title', 'wptb'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'scroll down',
        ]);

        $this->add_control('hero_left_arr_img', [
            'label'   => __('Arrow Image', 'wptb'),
            'type'    => Controls_Manager::MEDIA,
            'default' => ['url' => Utils::get_placeholder_image_src()],
        ]);

        $this->add_control('hero_contact_num', [
            'label'   => __('Hero Contact', 'wptb'),
            'type'    => Controls_Manager::TEXT,
            'default' => '(+02)-574-328-301',
        ]);
        $this->add_control('hero_quick_link', [
            'label'   => __('Hero Quick Link', 'wptb'),
            'type'    => Controls_Manager::URL,
            'default' => ['is_external' => 'true'],
            'dynamic' => ['active' => true],
        ]);
        $this->add_control('hero_contact_img', [
            'label'   => __('Hero Contact Image', 'wptb'),
            'type'    => Controls_Manager::MEDIA,
            'default' => ['url' => Utils::get_placeholder_image_src()],
        ]);

        $this->end_controls_section();
    }

    // Render Widget Output
    protected function render() {

        $settings = $this->get_settings_for_display();
        $params['sub_title']        = $settings['hero_sub_title'];
        $params['sub_icon']         = $settings['sub_title_icon'];
        $params['hero_btn_link']    = $settings['hero_button_link'];
        $params['hero_title']       = $settings['hero_title'];
        $params['animate_title']    = $settings['animated_title'];
        $params['prefix_img']       = $settings['play_prefix_image'];
        $params['video_link']       = $settings['hero_video_link'];
        $params['suffix_text']      = $settings['play_suffix_text'];
        $params['hero_img']         = $settings['hero_image'];
        $params['social_title']     = $settings['hero_social_title'];
        $params['social_arrow_img'] = $settings['hero_social_img'];
        $params['hero_left_title']  = $settings['hero_left_title'];
        $params['hero_left_arrow']  = $settings['hero_left_arr_img'];
        $params['hero_contact']     = $settings['hero_contact_num'];
        $params['hero_contact_img'] = $settings['hero_contact_img'];
        $params['hero_social']      = $settings['hero_media_list'];

        echo wptb_hero_section($params);
        
    }
}
?>
