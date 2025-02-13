<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

class WPTB_Marquee_Widget extends Widget_Base {
    
    // Widget Slug
    public function get_name() {
        return 'wptb_marquee';
    }

    // Widget Title
    public function get_title() {
        return __('Marquee Images Gallery', 'wptb');
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
			'section_gallery',
			[
				'label' => esc_html__( 'Marquee Images Gallery', 'wptb' ),
			]
		);

        $this->add_control(
			'wptb_gallery',
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
				'exclude' => [ 'custom' ],
			]
		);

		$gallery_columns = range( 1, 10 );
		$gallery_columns = array_combine( $gallery_columns, $gallery_columns );

		$this->add_control(
			'gallery_columns',
			[
				'label' => esc_html__( 'Columns', 'wptb' ),
				'type' => Controls_Manager::SELECT,
				'default' => 4,
				'options' => $gallery_columns,
			]
		);
        $this->add_control(
			'gallery_rand',
			[
				'label' => esc_html__( 'Order By', 'wptb' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default', 'wptb' ),
					'rand' => esc_html__( 'Random', 'wptb' ),
				],
				'default' => '',
			]
		);
        $this->add_control(
			'direction',
			[
				'label' => esc_html__( 'Direction', 'wptb' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'left' => esc_html__( 'To Left', 'wptb' ),
					'right' => esc_html__( 'To Right', 'wptb' ),
				],
				'default' => 'left',
			]
		);
        
        $this->end_controls_section();
    }

    // Render Widget Output
    protected function render() {

        $settings = $this->get_settings_for_display();      
        $params['wptb_gallery']        = $settings['wptb_gallery'];
        $params['gallery_columns']     = $settings['gallery_columns'];
        $params['gallery_rand']        = $settings['gallery_rand'];
        $params['direction']           = $settings['direction'];

        echo wptb_marquee_gallery($params);
        
    }
}
?>
