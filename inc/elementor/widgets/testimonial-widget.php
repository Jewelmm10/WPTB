<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;

class WPTB_Testimonial_Widget extends Widget_Base {
    
    // Widget Slug
    public function get_name() {
        return 'wptb_testimonial';
    }

    // Widget Title
    public function get_title() {
        return __('WPTB Testimonial', 'wptb');
    }

    // Widget Icon
    public function get_icon() {
        return 'eicon-photo-library';
    }

    // Widget Categories
    public function get_categories() {
        return ['wptb-elements'];
    }

    // Register Widget Controls
    protected function _register_controls() {
        $this->start_controls_section(
            'wptb_testimonial',
            [
                'label' => esc_html__('Testimonial Section', 'wptb'),
            ]
        );
        $this->add_control(
            'testimonial_qote_image',
            [
                'label'   => __('Quote Image', 'wptb'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'shape_image',
            [
                'label'   => __('Shape Image', 'wptb'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'wptb_testimonial_content',
            [
                'label' => esc_html__('Testimonial Content', 'wptb'),
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
			'wptb_testimonial_name',
			[
				'label'     => esc_html__( 'User Name', 'wptb'),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__( 'John Doe', 'wptb'),
				'dynamic'   => [ 'active' => true ],
				'ai' => [
					'active' => false,
				],
			]
		);

		$repeater->add_control(
			'wptb_testimonial_designation',
			[
				'label'     => esc_html__( 'Designation', 'wptb'),
				'type'      => Controls_Manager::TEXT,
				'default'   => esc_html__( 'Business Owner', 'wptb'),
				'dynamic'   => [ 'active' => true ],
				'ai'        => [
					'active' => false,
				],
			]
		);
        $repeater->add_control(
			'wptb_tesimonial_image',
			[
				'label'     => __( 'Testimonial Avatar', 'wptb'),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url'   => Utils::get_placeholder_image_src(),
				],
				'ai'        => [
					'active' => false,
				],
			]
		);
        $repeater->add_control(
			'wptb_testimonial_description',
			[
				'label'     => esc_html__( 'Testimonial Description', 'wptb'),
				'type'      => Controls_Manager::WYSIWYG,
				'default'   => esc_html__( 'Add testimonial description here. Edit and place your own text.', 'wptb'),
			]
		);
        $repeater->add_control(
            'wptb_tes_rating_num',
            [
               'label'      => __( 'Rating Number', 'wptb'),
               'type'       => Controls_Manager::SELECT,
               'default'    => '5',
               'options'    => [
                   '1'   => __( '1', 'wptb'),
                   '2'   => __( '2', 'wptb'),
                   '3'   => __( '3', 'wptb'),
                   '4'   => __( '4', 'wptb'),
                   '5'   => __( '5', 'wptb'),
               ],
            ]
        );
        $this->add_control(
            'wptb_testimonial_list',
            [
                'label'     => __('Testimonial List', 'wptb'),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'title_field' => '{{{ wptb_testimonial_name }}}',
            ]
        );


        $this->end_controls_section();
    }

    // Render Widget Output
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        if (empty($settings['wptb_testimonial_list'])) {
            return;
        }
    
        ?>
        <div class="testimonial__v1wrap pb-120" data-aos="fade-up" data-aos-duration="1000">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="swiper testimonial__slidewrap">
                        <div class="swiper-wrapper">
                            <?php foreach ($settings['wptb_testimonial_list'] as $testimonial) : ?>
                                <div class="test__slide swiper-slide">
                                    <div class="d-flex mb-40 align-items-center gap-2">
                                    <?php 
                                        $rating_number = intval($testimonial['wptb_tes_rating_num']);
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $rating_number) {
                                                echo '<i class="bi bi-star-fill ratting fz-20 text-warning"></i>'; // Filled star
                                            } else {
                                                echo '<i class="bi bi-star ratting fz-20 text-secondary"></i>'; // Unfilled star
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php echo wp_kses_post($testimonial['wptb_testimonial_description']); ?>
                                    <h4 class="base mb-2"><?php echo esc_html($testimonial['wptb_testimonial_name']); ?></h4>
                                    <span class="fz-18 ptext"><?php echo esc_html($testimonial['wptb_testimonial_designation']); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination3"></div>
                    </div>
                </div>
            </div>
    
            <div class="quote">
                <img src="<?php echo esc_url($settings['testimonial_qote_image']['url']); ?>" alt="Quote">
            </div>
            <!-- Dynamic Images -->
            <?php if (!empty($settings['wptb_testimonial_list'])) : ?>
                <?php $i = 1; ?>
                <?php foreach ($settings['wptb_testimonial_list'] as $testimonial) : ?>
                    <?php if (!empty($testimonial['wptb_tesimonial_image']['url'])) : ?>
                        <div class="man<?php echo $i; ?>">
                            <img src="<?php echo esc_url($testimonial['wptb_tesimonial_image']['url']); ?>" alt="Testimonial Avatar">
                        </div>
                    <?php endif; ?>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="test__shape">
                <img src="<?php echo esc_url($settings['shape_image']['url']); ?>" alt="Shape">
            </div>
        </div>
        <?php
    }
    
}

