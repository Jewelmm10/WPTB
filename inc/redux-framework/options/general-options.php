<?php 
/**
 * General theme options.
 * 
 */
$general_options = apply_filters( 'wptb_options_sections_args', [
	'title'			=> esc_html__( 'General', 'wptb' ),
	'icon'			=> 'far fa-dot-circle',
	'fields'		=> [
		[
			'title' 	=> __('Favicon', 'wptb'),
			'subtitle' 	=> __('<em>Upload your custom Favicon image. <br>.ico or .png file required.</em>', 'wptb'),
			'id' 		=> 'favicon',
			'type' 		=> 'media',
			'default' 	=> [
				'url' 	=> get_template_directory_uri() . '/images/favicon.png',
			],
		],
		[
			'title'		=> esc_html__( 'Upload logo', 'wptb' ),
			'subtitle'	=> esc_html__( 'Upload your site header logo image', 'wptb' ),
			'id'		=> 'logo',
			'type'		=> 'media'
		],			
		[
            'title'     => esc_html__( 'Social Media', 'wptb' ),
            'id'        => 'header_section',
            'type'      => 'section',
            'indent'    => true,
        ],
        [
        	'title'		=> esc_html__( 'Social Media Pre Text', 'wptb' ),
            'subtitle'  => esc_html__( 'Header'),
        	'id'		=> 'media_pre_text',
        	'type'		=> 'text',
        	'default'	=> 'Follow Me',
        ],	
        [
        	'title'		=> esc_html__( 'Social Links', 'wptb' ),
            'subtitle'  => esc_html__( 'Header'),
        	'id'		=> 'repeater_link_id',
        	'type'		=> 'repeater',
            'fields'    => [
                [
                    'id'            => 'title_field',
                    'type'          => 'text',
                    'placeholder'   => esc_html__( 'Title', 'wptb' )
                ],
                [
                    'id'            => 'url_field',
                    'type'          => 'text',
                    'placeholder'   => esc_html__( 'Url', 'wptb' )
                ],
                [
                    'id'            => 'icon',
                    'type'          => 'icon_select',
                    'placeholder'   => esc_html__( 'Icon', 'wptb' ),
                    'default'       => 'fab fa-facebook-f',
                ]
            ]
        ],
	]
] );