<?php
/**
 * Theme Functions
 * @package WPTB
 */
if (!defined("WPTB_DIR_PATH")) {
    define("WPTB_DIR_PATH", untrailingslashit(get_template_directory()));
}
if(!defined("WPTB_DIR_URI")){
    define("WPTB_DIR_URI", untrailingslashit(get_template_directory_uri()));
}
//print_r(WPTB_DIR_PATH);
require_once WPTB_DIR_PATH . '/inc/helpers/autoloader.php';
//add wp_bootstrap_navwalker.php file
require_once 'wp_bootstrap_navwalker.php';

function wptb_get_theme_instance()
{
    \WPTB_THEME\Inc\WPTB_THEME::get_instance();
}

/**
 * Initialize all things
 */

 require_once get_template_directory() . '/inc/init.php';

function theme_gsap_script(){
    // The core GSAP library
    wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js', array(), false, true );
    // ScrollTrigger - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js', array('gsap-js'), false, true );
    // Your animation code file - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-js2', get_template_directory_uri() . 'js/app.js', array('gsap-js'), false, true );

    // Enqueue Styles
    
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css');
    wp_enqueue_style('aos', get_template_directory_uri() . '/assets/src/library/css/aos.css');
    wp_enqueue_style('animate-css', get_template_directory_uri() . '/assets/src/library/css/animate.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/src/library/css/magnific-popup.css');
    wp_enqueue_style('swiper-bundle', get_template_directory_uri() . '/assets/src/library/css/swiper-bundle.min.css');
    wp_enqueue_style('bootstap-icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css');
    wp_enqueue_style('nice-select', get_template_directory_uri() . '/assets/src/library/css/nice-select.css');
    wp_enqueue_style('odometer', get_template_directory_uri() . '/assets/src/library/css/odometer.css');
    wp_enqueue_style('css-main', get_template_directory_uri() . '/assets/main.css');


    // Enqueue Scripts
    wp_enqueue_script('jquery-js', get_template_directory_uri() . '/assets/src/library/js/jquery-3.7.0.min.js', array('jquery'), null, true);
    wp_enqueue_script('viewport-jquery-js', get_template_directory_uri() . '/assets/src/library/js/viewport.jquery.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('aos', get_template_directory_uri() . '/assets/src/library/js/aos.js', array(), null, true);
    wp_enqueue_script('jquery-nice-select', get_template_directory_uri() . '/assets/src/library/js/jquery.nice-select.min.js', array('jquery'), null, true);
    wp_enqueue_script('swiper-bundle', get_template_directory_uri() . '/assets/src/library/js/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri() . '/assets/src/library/js/jquery.magnific-popup.min.js', array('jquery'), null, true);
    wp_enqueue_script('odometer', get_template_directory_uri() . '/assets/src/library/js/odometer.min.js', array(), null, true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/src/library/js/wow.min.js', array(), null, true);
    wp_enqueue_script('js-main', get_template_directory_uri() . '/assets/main.js', array('jquery'), null, true);
}

add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );

function theme_admin_script(){
    wp_enqueue_style('b-icon-admin', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css');
}


add_action( 'admin_enqueue_scripts', 'theme_admin_script' );

wptb_get_theme_instance();
