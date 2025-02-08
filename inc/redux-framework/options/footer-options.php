<?php 
/**
 * Footer theme options.
 * 
 */
$footer_options = apply_filters( 'wptb_options_sections_args', [
	'title'			=> esc_html__( 'Footer', 'wptb' ),
	'icon'			=> 'fas fa-border-none',
	'fields'		=> [
        [
            'id'        => 'footer_credit_block_start',
            'type'      => 'section',
            'indent'    => true,
            'title'     => esc_html__( 'Footer Credit Block', 'wptb' ),
            'subtitle'  => esc_html__( 'The Footer Credit Block is available bottom of Footer.', 'wptb' ),
        ],
        [
            'id'        => 'footer_credit_block_enable',
            'type'      => 'switch',
            'title'     => esc_html__( 'Show Footer Credit Block ?', 'wptb' ),
            'default'   => 1,
        ],
        [
            'id'        => 'footer_credit',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Footer Credit', 'wptb' ),
            'default'   => '&copy; <a class="base" href="' . esc_url( home_url( '/' ) ) . '">' .  get_bloginfo( 'name' ) . '</a> - All Rights Reserved',
            'required'  => [ 'footer_credit_block_enable', 'equals', 1 ],
        ],
        [
            'id'        => 'footer_credit_block_end',
            'type'      => 'section',
            'indent'    => false
        ],
        
	]
] );