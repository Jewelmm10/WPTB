<?php
if (!defined('ABSPATH')) exit; // Prevent direct access

// Register controls for query widget
add_action('wptb/controls/query', function($widget) {
    $widget->start_controls_section(
        'content_section',
        [
            'label' => __('Query Settings', 'text-domain'),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    // Get public post types
    $post_types = get_post_types(['public' => true], 'objects');
    $post_type_options = [];
    foreach ($post_types as $post_type) {
        $post_type_options[$post_type->name] = $post_type->label;
    }

    // Get all categories
    $terms = get_terms(['taxonomy' => 'category', 'fields' => 'id=>name']);
    $category_dropdown = [0 => esc_html__('All Categories', 'wptb')];
    foreach ($terms as $id => $name) {
        $category_dropdown[$id] = $name;
    }

    $widget->add_control(
        'view_style',
        [
            'label'   => __('Display Style', 'text-domain'),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'classic'   => __('Classic', 'text-domain'),
                'showcase'  => __('Showcase', 'text-domain'),
                'minimal'   => __('Minimal', 'text-domain'),
            ],
            'default' => 'classic',
        ]
    );

    $widget->add_control(
        'post_types',
        [
            'label'    => __('Select Post Types', 'text-domain'),
            'type'     => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options'  => $post_type_options,
            'default'  => ['post'],
        ]
    );

    $widget->add_control(
        'category',
        [
            'label'       => esc_html__('Category', 'wptb'),
            'type'        => \Elementor\Controls_Manager::SELECT2,
            'multiple'    => true,
            'options'     => $category_dropdown,
            'label_block' => true,
        ]
    );

    $widget->add_control(
        'post_count',
        [
            'label'   => __('Number of Posts', 'text-domain'),
            'type'    => \Elementor\Controls_Manager::NUMBER,
            'default' => 5,
        ]
    );

    $widget->add_control(
        'offset',
        [
            'label'   => esc_html__('Offset', 'wptb'),
            'type'    => \Elementor\Controls_Manager::NUMBER,
            'default' => 0,
        ]
    );

    $widget->add_control(
        'orderby',
        [
            'label'   => esc_html__('Order By', 'wptb'),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'ID'            => 'Post ID',
                'author'        => 'Post Author',
                'title'         => 'Title',
                'date'          => 'Date',
                'modified'      => 'Last Modified Date',
                'parent'        => 'Parent Id',
                'rand'          => 'Random',
                'comment_count' => 'Comment Count',
                'menu_order'    => 'Menu Order',
            ],
            'default' => 'date',
        ]
    );

    $widget->add_control(
        'order',
        [
            'label'   => esc_html__('Order', 'wptb'),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'asc'  => esc_html__('Ascending', 'wptb'),
                'desc' => esc_html__('Descending', 'wptb'),
            ],
            'default' => 'asc',
        ]
    );

    $widget->end_controls_section();
});
