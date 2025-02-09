<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package wptb
 */

/**
 * Check if Redux Framework is activated
 */
if( ! function_exists( 'is_redux_activated' ) ) {
	function is_redux_activated() {
		return class_exists( 'Redux' ) ? true : false;
	}	
}
/**
 * Check if Elementor is activated
 */
if (!function_exists('is_elementor_activated')) {
    function is_elementor_activated()
    {
        return class_exists( '\Elementor\Plugin' );
    }
}
/**
 * Get framework options 
 */
if ( ! function_exists( 'get_framework_options' ) ) {
    function get_framework_options($get_text) {
        global $wptb_options;
        if (isset($wptb_options[$get_text]) &&  $wptb_options[$get_text] != "") :
            return $wptb_options[$get_text];
           
        else :
            return false;
        endif;
    }
}


