<?php
/**
 * wptb engine room
 *
 * @package WPTB
 */

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/functions/extras.php';
require get_template_directory() . '/inc/classes/class-custom-post.php';

/**
 * Redux Framework
 */
if( is_redux_activated() ) {
    require get_template_directory() . '/inc/redux-framework/functions.php';
    require get_template_directory() . '/inc/redux-framework/hooks.php';
    require get_template_directory() . '/inc/redux-framework/wptb-options.php';
}
/**
 * Elementor
 */
if( is_elementor_activated() ) {
    require get_template_directory() . '/inc/elementor/class-elementor.php';
}

/**
 * structure
 */
require get_template_directory() . '/inc/structure/header.php';
require get_template_directory() . '/inc/structure/footer.php';
require get_template_directory() . '/inc/structure/layout.php';
require get_template_directory() . '/inc/structure/comments.php';
require get_template_directory() . '/inc/structure/post.php';

/**
 * widgets
 */

require get_template_directory() . '/inc/widgets/widget-functions.php';

/**
 * TGMA 
 */
require get_template_directory() . '/inc/tgm/tgm-init.php';
require get_template_directory() . '/inc/shortcodes/social.php';