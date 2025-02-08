<?php 
/**
 * Blog theme options.
 * 
 */
$blog_options = apply_filters( 'wptb_options_sections_args', [
	'title'			=> esc_html__( 'Blog', 'wptb' ),
	'icon'			=> 'el el-cog',
	'fields'		=> [
		[
            'id'        => 'blog_sidebar',
            'type'      => 'button_set',
			'title' 	=> __('Blog Sidebar', 'wptb'),
			'subtitle' 	=> __('Select blog sidebar to show over right or left side or hide.', 'wptb'),
			'options'  => [
				'left'       => __('Left', 'wptb'),
				'right'      => __('Right', 'wptb'),
				'no-sidebar' => __('No Sidebar', 'wptb'),
			],
			'default'  => 'right'
		],
	    [
			'id'       => 'blog_page_text',
			'type'     => 'text',
			'title'    => __('Blog Page Title', 'wptb'),
		],
		[
			'id'       => 'blog_detail_page_text',
			'type'     => 'text',
			'title'    => __('Blog Detail Page Title', 'wptb'),
		],        	
	]
] );