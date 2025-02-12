<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly
class WPTB_Blog_Post extends Widget_Base
{

    public function get_name()
    {
        return 'wptb_blog_post';
    }

    public function get_title()
    {
        return esc_html__('WPTB Blog Post', 'wptb');
    }

    public function get_icon()
    {
        return 'eicon-banner';
    }

    public function get_categories() {
        return ['wptb-elements'];
    }

    public function get_post_name($post_type = 'post')
    {
        $options = array();
        $options = ['0' => esc_html__('None', 'wptb')];
        $abc_post = array('posts_per_page' => -1, 'post_type' => $post_type);
        $abc_post_terms = get_posts($abc_post);
        if (!empty($abc_post_terms) && !is_wp_error($abc_post_terms)) {
            foreach ($abc_post_terms as $term) {
                $options[$term->ID] = $term->post_title;
            }
            return $options;
        }
    }


    protected function register_controls()
    {

        $terms = get_terms(array('taxonomy' => 'category', 'fields' => 'id=>name'));
        $category_dropdown = array(0 => esc_html__('All Categories', 'wptb'));

        foreach ($terms as $id => $name) {
            $category_dropdown[$id] = $name;
        }


        $this->start_controls_section(

            'sec_query_main',
            [
                'label' => esc_html__('Query', 'wptb'),
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('Category', 'wptb'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $category_dropdown,
                'label_block' => true
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Posts Per Page', 'wptb'),
                'type' => Controls_Manager::NUMBER,
                'default' => '3',
            ]
        );
        $this->add_control(
            'offset',
            [
                'label' => esc_html__('Offset', 'wptb'),
                'type' => Controls_Manager::NUMBER,
                'default' => '0',
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order By', 'wptb'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'ID' => 'Post ID',
                    'author' => 'Post Author',
                    'title' => 'Title',
                    'date' => 'Date',
                    'modified' => 'Last Modified Date',
                    'parent' => 'Parent Id',
                    'rand' => 'Random',
                    'comment_count' => 'Comment Count',
                    'menu_order' => 'Menu Order',
                ),
                'default' => 'date',

            ]
        );
        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'wptb'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' => esc_html__('Ascending', 'wptb'),
                    'desc' => esc_html__('Descending', 'wptb'),
                ],
                'default' => 'asc',

            ]
        );
        

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_size',
                'default' => 'rainbow-thumbnail-sm',
                'separator' => 'none',
                'exclude' => [ 'custom' ],
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'display_options_section',
            [
                'label' => __('Display Options', 'wptb'),
            ]
        );

        $this->add_control(
            'post_title_length',
            [
                'label' => __('Post Title Length', 'wptb'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,

            ]

        );
        $this->add_control(
            'cat_display',
            [
                'type' => Controls_Manager::SWITCHER,
                'label' => __('Category Display', 'wptb'),
                'label_on' => __('On', 'wptb'),
                'label_off' => __('Off', 'wptb'),
                'default' => 'yes',
                'description' => __('Show or Hide Category. Default: On', 'wptb'),

                'separator' => 'before',
            ]
        );
        
        
        $this->end_controls_section();


    }

    protected function render()
    {

        $settings = $this->get_settings();
        wptb_post_show($settings);

    }
}
