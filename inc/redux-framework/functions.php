<?php
/**
 * Template content
 * inside wordpress the loop
 * @package  WPTB
 */

/**
 * Enqueues font awesome for Redux Theme Options
 * 
 * @return void
 */
function redux_queue_font_awesome() {
    wp_register_style(
		'redux-font-awesome',
		get_template_directory_uri() . '/assets/css/fontawesome.min.css',
		array(),
		time(),
		'all'
    );
    wp_enqueue_style( 'redux-font-awesome' );
}

/**
 * Favicon set
 */
if ( ! function_exists( 'rx_apply_favicon' ) ) {
    function rx_apply_favicon( $favicon_url ) {
        global $wptb_options;

        $favicon_url = $wptb_options['favicon']['url'];

        return $favicon_url;
    }
}

/**
 * Logo upload
 */
if ( ! function_exists( 'rx_apply_logo' ) ) {
    function rx_apply_logo( $logo ) {
        global $wptb_options;

        if ( ! empty( $wptb_options['logo']['url'] ) ) {            
            $logo = '<img alt="Mohammad-Jewel" src="' . $wptb_options['logo']['url'] . '"/>';           
        }       

        return $logo;
    }
}

/**
 * Header social profiles
 */
if ( ! function_exists( 'rx_social_profiles' ) ) {

    function rx_social_profiles() {
        global $wptb_options;

        // Check if the required fields exist and are arrays
        $pre_text = isset( $wptb_options['media_pre_text'] ) ? esc_html( $wptb_options['media_pre_text'] ) : 'Follow';            
        ?>
        <div class="right__infoscroll">
			<a href="#0" class="scroll">
				<?php echo $pre_text; ?>
			</a>
			<a href="#0" class="scroll__bar">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/src/img/scroll-down.png" alt="img">
			</a>
		</div>
		<div class="banner__xlsocial">
			<ul class="banner__soci d-grid justify-content-center">
            <?php
                foreach ( $wptb_options['title_field'] as $key => $title ) {
                    $url      = isset( $wptb_options['url_field'][ $key ] ) ? esc_url( $wptb_options['url_field'][ $key ] ) : '#';
                    $icon     = isset( $wptb_options['icon'][ $key ] ) ? esc_attr( $wptb_options['icon'][ $key ] ) : '';
                    echo '<li><a href="' . $url . '"><i class="' . $icon . '"></i></a></li>';                      
                } 
            ?>
            </ul>
		</div>
	
        <?php
       
        
    }
}


/**
 * Display header btn
 */
if ( ! function_exists( 'rx_apply_header_btn_switch' ) ) {
    function rx_apply_header_btn_switch( $enable ) {
        global $wptb_options;
        
        if( isset( $wptb_options['header_btn'] ) ) {
            $enable = $wptb_options['header_btn'];
        }

        return $enable;
    }
}

/**
 * Display header btn text
 */

 if ( ! function_exists( 'rx_apply_header_btn' ) ) {

    function rx_apply_header_btn() {
        global $wptb_options;
        
        // Check if the required fields exist and are arrays      
        $title      = isset( $wptb_options['title_field'][ 1 ] ) ? $wptb_options['title_field'][ 1 ] : 'Lets talk';
        $url        = isset( $wptb_options['url_field'][ 1 ] ) ? esc_url( $wptb_options['url_field'][ 1 ] ) : '#';
        $icon       = isset( $wptb_options['icon'][ 1 ] ) ? esc_attr( $wptb_options['icon'][ 1 ] ) : '';
        ?>
        <a href="<?php echo $url; ?>" class="d-flex fw-500 cmn--btn align-items-center gap-2">
            <span class="get__text"><?php echo $title; ?></span>
            <span>
                <i class="<?php echo $icon; ?>"></i>                       
            </span>
        </a>  

        <?php     
        
    }
}

/**
 * Display footer credit block
 */
if ( ! function_exists( 'rx_footer_credit_switch' ) ) {
    function rx_footer_credit_switch($enable) {
        global $wptb_options;
        if ( isset( $wptb_options['footer_credit_block_enable'] ) ) {
            $enable = $wptb_options['footer_credit_block_enable'];
        }
        return $enable;
    }
}

/**
 * Display footer credit text
 */
if ( ! function_exists( 'rx_footer_credit' ) ) {
    function rx_footer_credit($text) {
        global $wptb_options;
        if ( isset( $wptb_options['footer_credit'] ) ) {
            $text = $wptb_options['footer_credit'];
        }
        return $text;
    }
}

