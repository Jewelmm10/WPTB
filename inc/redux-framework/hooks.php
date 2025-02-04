<?php 
add_action( 'redux/page/wptb_options/enqueue',                        'redux_queue_font_awesome'  );
add_action( 'wp_head',                                                'wptb_site_favicon'         );


/**
 * General Options
 */
add_filter( 'wptb_site_favicon', 						   'rx_apply_favicon',		            10 );
add_filter( 'wptb_display_logo',                           'rx_apply_logo',                     10 );
add_filter( 'top_social_profiles',                         'rx_social_profiles',                10 );

/**
 * Header options
 */
add_filter( 'wptb_header_btn_show',                        'rx_apply_header_btn_switch',        10 );
add_filter( 'wptb_header_btn',                             'rx_apply_header_btn',               10 );

/**
 * Footer options
 */
add_filter( 'footer_credit',                               'rx_footer_credit_switch',           10 );
add_filter( 'footer_credit_text',                          'rx_footer_credit',                  10 );
add_filter( 'wptb_get_share_options',                      'rx_apply_social_networks',          10 );

