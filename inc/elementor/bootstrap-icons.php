<?php
/**
 * Bootstrap icon library for Elementor
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class WPTB_Elementor_Bootstrap_Icons {
    public function __construct() {
        // Enqueue Bootstrap Icons
        add_action('wp_enqueue_scripts', [$this, 'enqueue_bootstrap_icons']);
        add_action('elementor/editor/after_enqueue_scripts', [$this, 'enqueue_bootstrap_icons']);

        // Register Bootstrap Icons with Elementor
        add_filter('elementor/icons_manager/native', [$this, 'add_bootstrap_icons']);
    }

    /**
     * Enqueue Bootstrap Icons CSS
     */
    public function enqueue_bootstrap_icons() {
        wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css', [], '1.11.1');
    }

    /**
     * Add Bootstrap Icons to Elementor Icon Manager
     */
    public function add_bootstrap_icons($icons) {
        $bootstrap_icons = [
            'bootstrap-icons' => [
                'name'          => 'bootstrap-icons',
                'label'         => esc_html__('WPTB Icons', 'wptb'),
                'url'           => 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css',
                'enqueue'       => ['bootstrap-icons'],
                'prefix'        => 'bi-',
                'displayPrefix' => 'bi',
                'labelIcon'     => 'bi-bootstrap',
                'ver'           => '1.11.1',
                'icons'         => $this->get_bootstrap_icons_list(),
            ],
        ];

        return array_merge($icons, $bootstrap_icons);
    }

    /**
     * List of Bootstrap Icons
     */
    private function get_bootstrap_icons_list() {
        
        return [
            'arrow-up-right',
            'arrow-right',            
            'cart',
            'check-circle',
            'chevron-left',
            'chevron-right',
            'clock',
            'cloud',
            'envelope',
            'exclamation-circle',
            'eye',
            'facebook',
            'gear',
            'heart',
            'house',
            'info-circle',
            'instagram',
            'linkedin',
            'globe',
            'geo-al',
            'lightning',
            'list',
            'lock',
            'person',
            'phone',
            'play-circle',
            'search',
            'star',
            'twitter',
            'whatsapp',
            'x-circle',
            'youtube',
        ];
    }
}

// Initialize the class
new WPTB_Elementor_Bootstrap_Icons();
