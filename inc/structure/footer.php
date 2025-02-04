<?php
/**
 * Functions and template tags used in theme footer
 */

/**
 * Footer credit
 */
if ( ! function_exists( 'footer_credit' ) ) {
	function footer_credit() {
		$footer_credit_text = apply_filters( 'footer_credit_text', '' );
		if ( apply_filters( 'footer_credit', true ) && ! empty( 'footer_credit_text' ) ) : ?>

			<p class="white"><?php echo $footer_credit_text; ?></p>
            
		<?php endif;		
		
	}
}