<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

class WPTB_Carousel_Widget extends Widget_Base {
    
    // Widget Slug
    public function get_name() {
        return 'wptb_carousel';
    }

    // Widget Title
    public function get_title() {
        return __('WPTB Image Carousel', 'wptb');
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
            'carousel_gallery',
            [
                'label' => esc_html__('Images Gallery', 'wptb'),
            ]
        );

        $this->add_control(
            'carousel_title',
            [
                'label' => esc_html__('Section Title', 'wptb'),
                'type' => Controls_Manager::TEXTAREA, // Fixed incorrect control type
                'dynamic' => ['active' => true],
				'default' => esc_html( 'More than 100+ companies trusted us worldwide', 'wptb' )
            ]
        );

        $this->add_control(
            'wptb_carousel',
			[
				'label' => esc_html__( 'Add Images', 'wptb' ),
				'type' => Controls_Manager::GALLERY,
				'show_label' => false,
				'dynamic' => [
					'active' => true,
				],
			]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'exclude' => ['custom'],
            ]
        );

        $gallery_columns = range(1, 10);
        $gallery_columns = array_combine($gallery_columns, $gallery_columns);

        $this->add_control(
            'carousel_columns',
            [
                'label' => esc_html__('Columns', 'wptb'),
                'type' => Controls_Manager::SELECT,
                'default' => 4,
                'options' => $gallery_columns,
            ]
        );

        $this->end_controls_section();
    }

    // Render Widget Output
    protected function render() {
        $settings = $this->get_settings_for_display();

        // Fetch images
        $gallery = $settings['wptb_carousel'];
        ?>
        <div class="sponsor__area pt-120">
            <h4 class="sponsor__title" data-aos-duration="1000">
                <?php echo esc_html($settings['carousel_title']); ?>
            </h4>
            <div class="swiper sponsor__wrap">
                <div class="swiper-wrapper">
                    <?php if (!empty($gallery)) : ?>
                        <?php foreach ($gallery as $image) : ?>
                            <div class="sponsor__slide swiper-slide">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="Image">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }
}

