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
        require_once get_template_directory() . '/inc/elementor/widgets/button.php';
        require_once get_template_directory() . '/inc/elementor/widgets/icon-box.php';
        require_once get_template_directory() . '/inc/elementor/widgets/working-process.php';
        require_once get_template_directory() . '/inc/elementor/widgets/query.php';
        require_once get_template_directory() . '/inc/elementor/widgets/carousel.php';
        require_once get_template_directory() . '/inc/elementor/widgets/testimonial.php';

        //template
        require_once get_template_directory() . '/inc/elementor/templates/hero.php';
        require_once get_template_directory() . '/inc/elementor/templates/marquee-image.php';
        require_once get_template_directory() . '/inc/elementor/templates/heading.php';
        require_once get_template_directory() . '/inc/elementor/templates/cta-box.php';
        require_once get_template_directory() . '/inc/elementor/templates/tab-section-content.php';
        require_once get_template_directory() . '/inc/elementor/templates/awards.php';
        require_once get_template_directory() . '/inc/elementor/templates/blog.php';
        require_once get_template_directory() . '/inc/elementor/templates/portfolio.php';
        require_once get_template_directory() . '/inc/elementor/templates/services.php';
    }

    /**
     * Register new Elementor widgets
     */
    public function register_widgets($widgets_manager) {
        // Include the widget files
        $this->include_widgets_files();

        // Register widget
        $widgets_manager->register(new WPTB_Hero_Widget());
        $widgets_manager->register(new WPTB_Need_Project());
        $widgets_manager->register(new WPTB_Marquee_Widget());
        $widgets_manager->register(new WPTB_Heading_Widget());
        $widgets_manager->register(new WPTB_Tabs_Library());
        $widgets_manager->register(new WPTB_Tab_content_Widget());
        $widgets_manager->register(new WPTB_Awards_Widget());
        $widgets_manager->register(new WPTB_Blog_Post());
        $widgets_manager->register(new WPTB_Button());
        $widgets_manager->register(new WPTB_Working_Widget());
        $widgets_manager->register(new WPTB_Query_Widget());
        $widgets_manager->register(new WPTB_Carousel_Widget());
        $widgets_manager->register(new WPTB_Testimonial_Widget());
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
