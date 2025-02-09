<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class WPTB_Elementor_Addons {
    public function __construct() {
        // Register widgets and category
        add_action('elementor/widgets/register', [ $this, 'register_widgets' ]);
        add_action('elementor/elements/categories_registered', [ $this, 'add_category' ]);
    }

    /**
     * Include Widget Files
     */
    private function include_widgets_files() {
        require_once get_template_directory() . '/inc/elementor/widgets/hero.php';
        require_once get_template_directory() . '/inc/elementor/widgets/marquee-image.php';
        require_once get_template_directory() . '/inc/elementor/widgets/tabs.php';
        require_once get_template_directory() . '/inc/elementor/widgets/heading.php';

        //template
        require_once get_template_directory() . '/inc/elementor/templates/hero.php';
        require_once get_template_directory() . '/inc/elementor/templates/marquee-image.php';
        require_once get_template_directory() . '/inc/elementor/templates/tabs.php';
        require_once get_template_directory() . '/inc/elementor/templates/heading.php';
    }

    /**
     * Register new Elementor widgets
     */
    public function register_widgets($widgets_manager) {
        // Include the widget files
        $this->include_widgets_files();

        // Register widget
        $widgets_manager->register(new WPTB_Hero_Widget());
        $widgets_manager->register(new WPTB_Marquee_Widget());
        $widgets_manager->register(new WPTB_Tabs_Widget());
        $widgets_manager->register(new WPTB_Heading_Widget());
    }

    /**
     * Register a custom Elementor category
     */
    public function add_category($elements_manager) {
        $elements_manager->add_category(
            'wptb-elements',
            [
                'title' => esc_html__('WPTB Elements', 'wptb'),
                'icon'  => 'fa fa-plug',
            ]
        );
    }
}

new WPTB_Elementor_Addons();
