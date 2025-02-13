<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class WPTB_Query_Widget extends Widget_Base {

    public function get_name() {
        return 'query_widget';
    }

    public function get_title() {
        return __('WPTB Query', 'wptb');
    }

    public function get_icon() {
        return 'eicon-post-list';
    }

    public function get_categories() {
        return ['wptb-elements'];
    }
    
    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Query Settings', 'wptb'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
    
        // Get all public post types dynamically
        $post_types = get_post_types(['public' => true], 'objects');
        $post_type_options = [];
    
        foreach ($post_types as $post_type) {
            $post_type_options[$post_type->name] = $post_type->label;
        }

        //Get all categories
        $terms = get_terms(array('taxonomy' => 'category', 'fields' => 'id=>name'));
        $category_dropdown = array(0 => esc_html__('All Categories', 'wptb'));

        foreach ($terms as $id => $name) {
            $category_dropdown[$id] = $name;
        }

        $this->add_control(
            'view_style',
            [
                'label'   => __('Display Style', 'wptb'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'classic'    => __('Classic', 'wptb'),
                    'showcase'  => __('Showcase', 'wptb'),
                    'minimal'    => __('Minimal', 'wptb'),
                ],
                'default' => 'classic',
            ]
        );
        $this->add_control(
            'post_types',
            [
                'label'    => __('Select Post Types', 'wptb'),
                'type'     => Controls_Manager::SELECT,
                'multiple' => true,
                'options'  => $post_type_options,
                'default'  => ['post'],
            ]
        );
        
        $this->add_control(
            'post_count',
            [
                'label'   => __('Number of Posts', 'wptb'),
                'type'    =>Controls_Manager::NUMBER,
                'default' => 5,
            ]
        );        
        
        $this->end_controls_section();
    }
    

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $post_types = !empty($settings['post_types']) ? $settings['post_types'] : ['post'];
        $post_count = $settings['post_count'];        
        $categories = !empty($settings['category']) ? $settings['category'] : [];
    
        // Build query arguments
        $args = [
            'post_type'      => $post_types,
            'posts_per_page' => $post_count,
        ];
    
        // Call the appropriate function based on view_style
        
        if ($settings['view_style'] == 'showcase') {
            wptb_portfolio_show($args);
        } elseif ($settings['view_style'] == 'minimal') {
            wptb_service_show($args);
        } else {
            wptb_post_show($args);
        }
    }
    
}
