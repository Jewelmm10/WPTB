<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;

class WPTB_Need_Project extends Widget_Base {

	public function get_name() {
		return 'wptb-icon-box';
	}

	public function get_title() {
		return esc_html__( 'WPTB Need Project', 'wptb' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

    public function get_categories() {
        return ['wptb-elements'];
    }

	protected function register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'WPTB Need Project', 'wptb' ),
			]
		);
        $this->add_control(
			'need_title',
			[
				'label' => esc_html__( 'Title', 'wptb' ),
				'type' => Controls_Manager::TEXT,
                'default'   => esc_html__( 'Need a Project?', 'wptb' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $this->add_control(
			'need_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'wptb' ),
				'type' => Controls_Manager::TEXTAREA,
                'default'   => esc_html__( 'Let\'s work together.', 'wptb' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $this->add_control(
            'need_section_img',
            [
                'label'   => __('Need Section Image', 'wptb'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'need_info_box',
            [
                'label' => __('Info Box Title', 'wptb'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Email', 'wptb'),
            ]
        );

        $repeater->add_control(
            'need_sub',
            [
                'label' => __('Info Box Details', 'wptb'),
                'type' => Controls_Manager::TEXT,
                'default' => __('demo@gmail.com', 'wptb'),
            ]
        );
        $repeater->add_control(
            'need_link',
            [
                'label' => __('Info Box Link', 'wptb'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'wptb'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'need_social_icon',
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
				],
			]
        );
        $this->add_control(
            'info_box_list',
            [
                'label' => __('Info Box', 'wptb'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ need_info_box }}}',
            ]
        );


		$this->end_controls_section();

	}


	protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <div class="pro__metting__content">
                    <div class="project__head">
                        <span class="common__sub">
                            <?php echo esc_html($settings['need_title']); ?>
                        </span>
                        <h2 class="fw-500">
                            <?php echo esc_html($settings['need_sub_title']); ?>
                        </h2>
                    </div>
    
                    <?php if (!empty($settings['info_box_list'])) : ?>
                        <?php foreach ($settings['info_box_list'] as $item) : 
                            $target = $item['need_link']['is_external'] ? ' target="_blank"' : '';
                            $nofollow = $item['need_link']['nofollow'] ? ' rel="nofollow"' : '';
                            $url = !empty($item['need_link']['url']) ? esc_url($item['need_link']['url']) : '#';
                        ?>
                            <div class="about__contbox__item pb-30 pt-30 aos-init">
                                <span class="icon">
                                    <i class="<?php echo esc_attr($item['need_social_icon']['value']); ?>"></i>
                                </span>
                                <span class="box">
                                    <span class="ptext fz-18 mb-1 d-block">
                                        <?php echo esc_html($item['need_info_box']); ?>
                                    </span>
                                    <a href="<?php echo $url; ?>" <?php echo $target . $nofollow; ?>>
                                        <?php echo esc_html($item['need_sub']); ?>
                                    </a>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="pro__mettingthumb">
                    <img src="<?php echo esc_url($settings['need_section_img']['url']); ?>" alt="img">
                </div>
            </div>
        </div>
        <?php
    }
    
    

}