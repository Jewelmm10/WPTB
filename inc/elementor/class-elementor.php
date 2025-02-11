<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class WPTB_Elementor_Addons {
    public function __construct() {
        // Register widgets and category
        add_action('elementor/widgets/register', [ $this, 'register_widgets' ]);
        add_action('elementor/elements/categories_registered', [ $this, 'add_category' ]);
        
        // Load scripts inside the Elementor editor
        add_action('elementor/editor/after_enqueue_scripts', [ $this, 'editor_after_register_scripts' ]);


    }
    
    public function editor_after_register_scripts() {
        // Load AOS CSS
        wp_enqueue_style('aos-css', get_template_directory_uri() . '/assets/src/library/css/aos.css'); 
    
        // Load AOS JS
        wp_enqueue_script('aos', get_template_directory_uri() . '/assets/src/library/js/aos.js', [], null, true);
    
        // Load Editor Script (Make sure this file exists)
        wp_enqueue_script('editor-aos', get_template_directory_uri() . '/assets/admin/editor.js', ['jquery', 'aos'], null, true);

    }
    
    

    /**
     * Include Widget Files
     */
    private function include_widgets_files() {
        require_once get_template_directory() . '/inc/elementor/widgets/hero.php';
        require_once get_template_directory() . '/inc/elementor/widgets/marquee-image.php';
        require_once get_template_directory() . '/inc/elementor/widgets/heading.php';
        require_once get_template_directory() . '/inc/elementor/widgets/tabs-library.php';
        require_once get_template_directory() . '/inc/elementor/widgets/tabs-content.php';
        require_once get_template_directory() . '/inc/elementor/widgets/awards.php';
        require_once get_template_directory() . '/inc/elementor/widgets/blog-post.php';

        //template
        require_once get_template_directory() . '/inc/elementor/templates/hero.php';
        require_once get_template_directory() . '/inc/elementor/templates/marquee-image.php';
        require_once get_template_directory() . '/inc/elementor/templates/heading.php';
        require_once get_template_directory() . '/inc/elementor/templates/cta-box.php';
        require_once get_template_directory() . '/inc/elementor/templates/tab-section-content.php';
        require_once get_template_directory() . '/inc/elementor/templates/awards.php';
        require_once get_template_directory() . '/inc/elementor/templates/blog.php';
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
        $widgets_manager->register(new WPTB_Heading_Widget());
        $widgets_manager->register(new WPTB_Tabs_Library());
        $widgets_manager->register(new WPTB_Tab_content_Widget());
        $widgets_manager->register(new WPTB_Awards_Widget());
        $widgets_manager->register(new WPTB_Blog_Post());
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
