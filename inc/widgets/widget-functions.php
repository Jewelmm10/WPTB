<?php
/**
 * custom function and work related to widgets.
 *
 * @package wptb
 */


/**
 * Register different widgets
 *
 * @since 1.1.8
 */
/*-----------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'dropdown_category' ) ):

    /**
     * Dropdown Category
     *
     * @return array();
     */
    function dropdown_category() {
        $categories = get_categories( array( 'hide_empty' => 1 ) );
        $category_lists = array();
        $category_lists['0'] = esc_html__( 'Select Category', 'context' );
        foreach( $categories as $category ) {
            $category_lists[esc_attr( $category->term_id )] = esc_html( $category->name );
        }
        return $category_lists;
    }
endif;
/*-----------------------------------------------------------------------------------------------------------------------*/

if ( !function_exists( 'categories_lists' ) ) :

    /**
     * Category list
     *
     * @return array();
     */
    function categories_lists() {
        $categories = get_categories( array( 'hide_empty' => 1 ) );
        $categories_lists = array();
        foreach( $categories as $category ) {
            $categories_lists[absint( $category->term_id )] = esc_html( $category->name ) .' ('. absint( $category->count ) .')';
        }
        return $categories_lists;
    }

endif;
/*-----------------------------------------------------------------------------------------------------------------------*/
add_action( 'widgets_init', 'context_register_widget' );

function context_register_widget() {

    // Recent Post
    register_widget( 'WP_Cat' );
    register_widget( 'Recent_Post' );
}

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Load widget required files
 *
 */

require get_template_directory() . '/inc/widgets/widget-fields.php';      
require get_template_directory() . '/inc/widgets/category.php';   
require get_template_directory() . '/inc/widgets/recent-post.php';   

