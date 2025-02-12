<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme exertio
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'wptb_register_required_plugins' );

function wptb_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'               => esc_html__( 'Elementor', 'wptb'), 
			'slug'               => 'elementor',
			'source'             => '',
			'required'           => true, 
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => esc_url( 'https://downloads.wordpress.org/plugin/elementor.3.12.1.zip'
			 ),
			'is_callable'        => '',
		),

		array(
			'name'               => esc_html__( 'Redux Framework', 'wptb'), 
			'slug'               => 'redux-framework',
			'source'             => '',
			'required'           => true, 
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => esc_url( 'https://downloads.wordpress.org/plugin/redux-framework.4.4.0.zip'
			 ),
			'is_callable'        => '',
		),
		array(
            'name' => esc_html__('One Click Demo Import', 'wptb'),
            'slug' => 'one-click-demo-import',
            'source' => '', 
            'required' => true, 
            'version' => '', 
            'force_activation' => false, 
            'force_deactivation' => false,
            'external_url' => esc_url('https://downloads.wordpress.org/plugin/one-click-demo-import.3.3.0.zip'),
            'is_callable' => '',
        ),
		array(
            'name' => esc_html__('Contact Form 7', 'wptb'),
            'slug' => 'contact-form-7',
            'source' => '', 
            'required' => true, 
            'version' => '', 
            'force_activation' => false, 
            'force_deactivation' => false,
            'external_url' => esc_url('https://downloads.wordpress.org/plugin/contact-form-7.5.5.6.1.zip'),
            'is_callable' => '',
        ),
		
	);

	$config = array(
		'id'           => 'wptb', 
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}