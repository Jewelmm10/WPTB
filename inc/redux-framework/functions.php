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


//Breadcrumb
if (!function_exists('wptb_breadcrumb')) {
    function wptb_breadcrumb()
    {
        $string = '';

        if (is_category()) {
            $string .= esc_html(get_cat_name( get_queried_object_id() ));
        } else if (is_singular('post')) {
            $string .= esc_html__('Blog Detail', 'wptb');
        } elseif (is_page()) {
            $string .= esc_html(get_the_title());
        } elseif (is_tag()) {
            $string .= esc_html(single_tag_title("", false));
        } elseif (is_search()) {
            $string .= esc_html(get_search_query());
        } elseif (is_404()) {
            $string .= esc_html__('Page not Found', 'wptb');
        } elseif (is_author()) {
            $string .= esc_html__('Author', 'wptb');
        } else if (is_tax()) {
            $string .= esc_html(single_cat_title("", false));
        } elseif (is_archive()) {
            $string .= esc_html__('Archive', 'wptb');
        } else if (is_home()) {
            $string = esc_html__('Articles', 'wptb');
        }

        return $string;
    }
}
// Get breadCrumb Heading
if (!function_exists('wptb_breadcrumb_heading')) {
    function wptb_breadcrumb_heading()
    {
        $page_heading = '';
        if (is_page()) {
            $page_heading = get_the_title();
        } else if (is_singular('post')) {
            $page_heading = esc_html(get_the_title());
        } else if (is_home()) {
            if ( get_framework_options ('blog_page_text') != '' && get_framework_options( 'blog_page_text' ) != "") {
                $page_heading = get_framework_options( 'blog_page_text' );
            } else {
                $page_heading = esc_html__('Latest Stories', 'wptb');
            }
        } else if (is_404()) {
            $page_heading = esc_html__('Page not found', 'wptb');
        } else if (is_archive()) {
            $page_heading = esc_html__('Blog Archive', 'wptb');
        } else if (is_search()) {
            $string = esc_html__('Entire web', 'wptb');
            if (get_search_query() != "") {
                $string = get_search_query();
            }
            $page_heading = sprintf(esc_html__('Search Results for: %s', 'wptb'), esc_html($string));
        } else if (is_category()) {
            $page_heading = esc_html(single_cat_title("", false));
        } else if (is_tag()) {
            $page_heading = esc_html__('Tag: ', 'wptb') . esc_html(single_tag_title("", false));
        } 
        return $page_heading;
    }
}

