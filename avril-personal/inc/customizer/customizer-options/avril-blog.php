<?php
function avril_blog_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Blog Section
	=========================================*/
	$wp_customize->add_section(
		'blog_setting', array(
			'title' => esc_html__( 'Blog Section', 'avril-pro' ),
			'priority' => 13,
			'panel' => 'avril_frontpage_sections',
		)
	);
	
	// Blog Header Section // 
	$wp_customize->add_setting(
		'blog_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'blog_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'blog_setting',
		)
	);
	
	// Blog Title // 
	$wp_customize->add_setting(
    	'blog_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'blog_setting',
			'type'           => 'text',
		)  
	);
	
	// Blog Subtitle // 
	$wp_customize->add_setting(
    	'blog_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Blog</b>                                   <b>Blog</b><b>Blog</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'blog_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Blog Description // 
	$wp_customize->add_setting(
    	'blog_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_description',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'blog_setting',
			'type'           => 'textarea',
		)  
	);

	// Blog content Section // 
	
	$wp_customize->add_setting(
		'blog_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'blog_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'blog_setting',
		)
	);
	// Blog Category
	$wp_customize->add_setting(
    'blog_category_id',
		array(
		'capability' => 'edit_theme_options',
		'default' => 1,
		'priority' => 8,
		//'sanitize_callback' => 'avril_sanitize_text',
		)
	);	
	$wp_customize->add_control( new Category_Dropdown_Custom_Control( $wp_customize, 
	'blog_category_id', 
		array(
		'label'   => __('Select category for Blog Section','avril-pro'),
		'section' => 'blog_setting',
		'settings'   => 'blog_category_id',
		) 
	) );
	
	
	// Blog column // 
	$wp_customize->add_setting(
    	'blog_column',
    	array(
	        'default'			=> '4',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 9,
		)
	);	

	$wp_customize->add_control(
		'blog_column',
		array(
		    'label'   		=> __('Blog Column','avril-pro'),
		    'section' 		=> 'blog_setting',
			'type'			=> 'select',
			'choices'        => 
			array(
				'6' => __( '2 column', 'avril-pro' ),
				'4' => __( '3 column', 'avril-pro' ),
				'3' => __( '4 column', 'avril-pro' ),
			) 
		) 
	);
	
	// blog_display_num
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'blog_display_num',
			array(
				'default' => '3',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'priority' => 8,
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'blog_display_num', 
			array(
				'label'      => __( 'No of Posts Display', 'avril-pro' ),
				'section'  => 'blog_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'    => 1,
							'max'    => 500,
							'step'   => 1,
							'default_value' => 3,
						),
					),
			) ) 
		);
	}
}

add_action( 'customize_register', 'avril_blog_setting' );

// service selective refresh
function avril_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .heading-default .ttl',
		'settings'            => 'blog_title',
		'render_callback'  => 'avril_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .heading-default h3',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'avril_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .heading-default p',
		'settings'            => 'blog_description',
		'render_callback'  => 'avril_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'avril_blog_section_partials' );

// blog_title
function avril_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function avril_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function avril_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}