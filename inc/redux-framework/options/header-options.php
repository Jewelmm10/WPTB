<?php 
/**
 * Header theme options.
 * 
 */
$header_options = apply_filters( 'wptb_options_sections_args', [
	'title'			=> esc_html__( 'Header', 'wptb' ),
	'icon'			=> 'far fa-arrow-alt-circle-up',
	'fields'		=> [
        [
            'title'     => esc_html__( 'Masthead', 'wptb' ),
            'id'        => 'masthead_start',
            'type'      => 'section',
            'indent'    => true
        ],	
        [
            'title'     => esc_html__( 'Show header Lets talk', 'wptb' ),
            'id'        => 'header_btn',
            'type'      => 'switch',
            'default'   => 1,
        ],
        [
        	'title'		=> esc_html__( 'Header Lets talk', 'wptb' ),
            'subtitle'  => esc_html__( 'Header'),
        	'id'		=> 'header_quick_link',
        	'type'		=> 'repeater',
            'required'  => [ 'header_btn', 'equals', 1 ],
            'fields'    => [
                [
                    'id'            => 'title_field',
                    'type'          => 'text',
                    'placeholder'   => esc_html__( 'Lets talk', 'wptb' )
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
                    'default'       => 'fas fa-arrow-right',
                ]
            ]
            
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