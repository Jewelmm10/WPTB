<?php
/**
 * Functions and template tags used in theme header
 */

/**
 * header btn
 */



if ( ! function_exists( 'header_btn_show' ) ) {
	function header_btn_show() {
		if ( apply_filters( 'wptb_header_btn_show', true ) && ! empty( 'wptb_header_btn' ) ) : ?>

			<?php apply_filters( 'wptb_header_btn', '' ); ?>
            
		<?php endif;		
		
	}
}