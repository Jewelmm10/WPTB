<?php 
/**
 * Social Share options.
 * 
 */
$social_share_options = apply_filters( 'wptb_options_sections_args', [
	'title'			=> esc_html__( 'Social Share', 'wptb' ),
	'icon'			=> 'fas fa-share-alt',
	'fields'		=> [
        [
            'title'     => esc_html__( 'Masthead', 'wptb' ),
            'id'        => 'masthead_start',
            'type'      => 'section',
            'indent'    => true
        ],	
        [
            'title'     => esc_html__( 'Enable Share Option', 'wptb' ),
            'id'        => 'share_enable',
            'type'      => 'switch',
            'default'   => 1,
        ],
        [
        	'title'		=> esc_html__( 'Sortable Sharing', 'wptb' ),
            'id'        => 'social_share',
        	'type'      => 'sortable', 
            'mode'      => 'checkbox',
            'required'  => array('share_enable','=',1),
            'options'     => array(
                'bi bi-facebook'  => '<i class="bi bi-facebook"></i> Facebook',
                'bi bi-twitter'   => '<i class="bi bi-twitter"></i> Twitter',
                'bi bi-linkedin'  => '<i class="bi bi-linkedin"></i> LinkedIn',
                'bi bi-instagram' => '<i class="bi bi-instagram"></i> Instagram',
                'bi bi-youtube'   => '<i class="bi bi-youtube"></i> YouTube',
                'bi bi-whatsapp'  => '<i class="bi bi-whatsapp"></i> WhatsApp',
            ),
            'default'   => array(
                'facebook'  => true,
                'twitter'   => true,
                'linkedin'  => true,
                'whatsapp'  => false,
            )
            
        ],	
        [
            'id'       => 'social_follow',
            'type'     => 'sortable',
            'title'    => 'Social Media Follow Links',
            'desc'     => 'Sort and add your social media follow links.',
            'options'  => array(
                'facebook'  => 'Facebook',
                'twitter'   => 'Twitter',
                'linkedin'  => 'LinkedIn',
                'instagram' => 'Instagram',
            ),
            'default'  => array(
                'facebook'  => 'https://facebook.com/',
                'twitter'   => 'https://twitter.com/',
                'linkedin'  => 'https://linkedin.com/',
                'instagram' => 'https://instagram.com/',
            ),
        ],
        [
            'id'     => 'masthead_end',
            'type'   => 'section',
            'indent' => false,
        ],
        [
		    'id'     => 'header_section_end',
		    'type'   => 'section',
		    'indent' => false,
		]
		
	]
] );
