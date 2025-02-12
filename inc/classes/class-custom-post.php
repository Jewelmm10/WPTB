<?php
/**
 * Register custom post type
 * @package WPTB
 */

class Custom_Post_Type_Manager {
    
    private $post_type;
    private $post_args;
    private $taxonomy;
    private $taxonomy_args;

    /**
     * Constructor to initialize post type and taxonomy.
     */
    public function __construct($post_type, $post_args = [], $taxonomy = '', $taxonomy_args = []) {
        $this->post_type = $post_type;
        $this->post_args = $post_args;
        $this->taxonomy = $taxonomy;
        $this->taxonomy_args = $taxonomy_args;

        add_action('init', [$this, 'register_post_type']);
        if (!empty($this->taxonomy)) {
            add_action('init', [$this, 'register_taxonomy']);
        }
    }

    /**
     * Registers the custom post type.
     */
    public function register_post_type() {
        $default_args = [
            'label'         => ucfirst($this->post_type),
            'public'        => true,
            'has_archive'   => true,
            'show_in_menu'  => true,
            'menu_position' => 5,
            'menu_icon'     => 'dashicons-admin-post',
            'supports'      => ['title', 'editor', 'thumbnail', 'excerpt', 'comments'],
            'rewrite'       => ['slug' => $this->post_type],
        ];
        $args = array_merge($default_args, $this->post_args);
        register_post_type($this->post_type, $args);
    }

    /**
     * Registers the custom taxonomy.
     */
    public function register_taxonomy() {
        $default_args = [
            'label'             => $this->taxonomy,
            'public'            => true,
            'hierarchical'      => true,
            'show_admin_column' => true,
            'rewrite'           => ['slug' => $this->taxonomy],
        ];
        $args = array_merge($default_args, $this->taxonomy_args);
        register_taxonomy($this->taxonomy, [$this->post_type], $args);
    }
}

// Portfolio
new Custom_Post_Type_Manager(
    'portfolio', 
    [
        'menu_icon' => 'dashicons-awards',
        'supports'  => ['title', 'editor', 'thumbnail'],
    ],
    'portfolio_cat',
    [
        'label'        => 'Portfolio Categories',
        'hierarchical' => true,
    ]
);

// Services
new Custom_Post_Type_Manager(
    'service',  
    [
        'menu_icon' => 'dashicons-text-page',
        'supports'  => ['title', 'editor', 'thumbnail'],
    ],
    'service_cat',
    [
        'label'        => 'Service Categories',
        'hierarchical' => true,
    ]
);
?>
