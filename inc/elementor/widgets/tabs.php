<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class WPTB_Tabs_Widget extends \Elementor\Widget_Base {
    
    // Widget Slug
    public function get_name() {
        return 'wptb_tabs';
    }

    // Widget Title
    public function get_title() {
        return __('WPTB Tabs', 'wptb');
    }

    // Widget Icon
    public function get_icon() {
        return 'eicon-form-vertical';
    }

    // Widget Categories
    public function get_categories() {
        return ['wptb-elements'];
    }

    // Register Widget Controls
    protected function _register_controls() {
        $this->start_controls_section(
			'wptb_tabs',
			[
				'label' => esc_html__( 'WPTB Tabs', 'wptb' ),
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
      
        $params        = "";

        echo wptb_tabs($params);
        
    }
}
?>
