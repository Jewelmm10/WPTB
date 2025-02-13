<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define theme directory and URI constants
define('WPTB_THEME_DIR', get_template_directory());
define('WPTB_THEME_URI', get_template_directory_uri());

// Include Bootstrap Icons
require_once WPTB_THEME_DIR . '/inc/elementor/bootstrap-icons.php';

class WPTB_Elementor_Addons {
    public function __construct() {
        if (!did_action('elementor/loaded')) {
            return;
        }
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        add_action('elementor/elements/categories_registered', [$this, 'add_category']);
        add_action('elementor/editor/after_enqueue_scripts', [$this, 'editor_after_register_scripts']);
    }

    public function editor_after_register_scripts() {
        // Load AOS CSS
        wp_enqueue_style('aos-css', WPTB_THEME_URI . '/assets/src/library/css/aos.css', [], '2.3.1');

        // Load AOS JS
        wp_enqueue_script('aos', WPTB_THEME_URI . '/assets/src/library/js/aos.js', [], '2.3.1', true);

        // Load Editor Script with cache-busting
        $editor_js = WPTB_THEME_DIR . '/assets/admin/editor.js';
        if (file_exists($editor_js)) {
            wp_enqueue_script('editor-aos', WPTB_THEME_URI . '/assets/admin/editor.js', ['jquery', 'aos'], filemtime($editor_js), true);
        }
    }

    private function include_widgets_files() {
        $widgets = [
            'hero', 'marquee-img', 'heading', 'tabs-library', 'tabs-content',
            'awards', 'query', 'button', 'icon-box', 'work-process', 'carousel', 'testimonial'
        ];

        $templates = ['hero', 'marquee-img', 'heading', 'tabs-content', 'awards', 'blog', 'portfolio', 'services'];

        $widgets_dir = WPTB_THEME_DIR . '/inc/elementor/widgets';
        $templates_dir = WPTB_THEME_DIR . '/inc/elementor/templates';

        // Include widgets
        foreach ($widgets as $widget) {
            $widget_file = "$widgets_dir/{$widget}-widget.php";
            if (file_exists($widget_file)) {
                require_once $widget_file;
            } else {
                error_log("Widget file not found: $widget_file");
            }
        }

        // Include templates
        foreach ($templates as $template) {
            $template_file = "$templates_dir/{$template}-template.php";
            if (file_exists($template_file)) {
                require_once $template_file;
            } else {
                error_log("Template file not found: $template_file");
            }
        }
    }

    public function register_widgets($widgets_manager) {
        $this->include_widgets_files();

        $widget_classes = [
            'hero'          => 'WPTB_Hero_Widget',
            'marquee-img'   => 'WPTB_Marquee_Widget',
            'heading'       => 'WPTB_Heading_Widget',
            'tabs-library'  => 'WPTB_Tabs_Library',
            'tabs-content'  => 'WPTB_Tab_content_Widget',
            'awards'        => 'WPTB_Awards_Widget',
            'button'        => 'WPTB_Button',
            'work-process'  => 'WPTB_Working_Widget',
            'query'         => 'WPTB_Query_Widget',
            'carousel'      => 'WPTB_Carousel_Widget',
            'testimonial'   => 'WPTB_Testimonial_Widget',
        ];

        foreach ($widget_classes as $class_name) {
            if (class_exists($class_name)) {
                $widgets_manager->register(new $class_name());
            } else {
                error_log("Widget class not found: $class_name");
            }
        }
    }

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
