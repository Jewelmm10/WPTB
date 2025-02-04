<?php
/**
 * favicon
 */
if( ! function_exists( 'wptb_site_favicon' ) ) {
	function wptb_site_favicon() {
		$favicon_url = apply_filters( 'wptb_site_favicon', get_template_directory_uri() . '/images/favicon.png' );
		echo '<link rel="shortcut icon" href="' . esc_url( $favicon_url ) . '">';
	}
}

/**
 * Social media
 */
if( ! function_exists( 'wptb_social_media' ) ) {
	function wptb_social_media() {
	?>
	<div class="banner__rightinfo">				
		<?php echo apply_filters( 'top_social_profiles', '' ); ?>		
	</div>
	<?php
	}
}