<?php
function avril_testimonial_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Testimonial  Section
	=========================================*/
	$wp_customize->add_section(
		'testimonial_setting', array(
			'title' => esc_html__( 'Testimonial Section', 'avril-pro' ),
			'priority' => 11,
			'panel' => 'avril_frontpage_sections',
		)
	);
	
	// Testimnial Header Section // 
	$wp_customize->add_setting(
		'testimonial_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'testimonial_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'testimonial_setting',
		)
	);
	
	// Testimonial Title // 
	$wp_customize->add_setting(
    	'testimonial_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'testimonial_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'testimonial_setting',
			'type'           => 'text',
		)  
	);
	
	// Testimonial Subtitle // 
	$wp_customize->add_setting(
    	'testimonial_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Testimonial</b>                                   <b>Testimonial</b><b>Testimonial</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'testimonial_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'testimonial_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Testimonial Description // 
	$wp_customize->add_setting(
    	'testimonial_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'testimonial_description',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'testimonial_setting',
			'type'           => 'textarea',
		)  
	);

	// Testimonial content Section // 
	
	$wp_customize->add_setting(
		'test_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'test_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'testimonial_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Testimonial
	 */
	
		$wp_customize->add_setting( 'testimonials', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => avril_get_testimonial_default()
			)
		);
		
		$wp_customize->add_control( 
			new Avril_Repeater( $wp_customize, 
				'testimonials', 
					array(
						'label'   => esc_html__('Testimonial','avril-pro'),
						'section' => 'testimonial_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'avril-pro' ),
						'item_name'                         => esc_html__( 'Testimonial', 'avril-pro' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
	// Testimonial column // 
	$wp_customize->add_setting(
    	'testimonial_column',
    	array(
	        'default'			=> '3',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 9,
		)
	);	

	$wp_customize->add_control(
		'testimonial_column',
		array(
		    'label'   		=> __('Testimonial Column','avril-pro'),
		    'section' 		=> 'testimonial_setting',
			'type'			=> 'select',
			'choices'        => 
			array(
				'1' => __( '1', 'avril-pro' ),
				'3' => __( '3 ', 'avril-pro' ),
				'5' => __( '5', 'avril-pro' ),
			) 
		) 
	);
}

add_action( 'customize_register', 'avril_testimonial_setting' );

// Testimonial selective refresh
function avril_testimonial_section_partials( $wp_customize ){
	
	// testimonial_title
	$wp_customize->selective_refresh->add_partial( 'testimonial_title', array(
		'selector'            => '#testimonial-section .heading-default .ttl',
		'settings'            => 'testimonial_title',
		'render_callback'  => 'avril_testimonial_title_render_callback',
	
	) );
	
	// testimonial_subtitle
	$wp_customize->selective_refresh->add_partial( 'testimonial_subtitle', array(
		'selector'            => '#testimonial-section .heading-default h3',
		'settings'            => 'testimonial_subtitle',
		'render_callback'  => 'avril_testimonial_subtitle_render_callback',
	
	) );
	
	// testimonial_description
	$wp_customize->selective_refresh->add_partial( 'testimonial_description', array(
		'selector'            => '#testimonial-section .heading-default p',
		'settings'            => 'testimonial_description',
		'render_callback'  => 'avril_testimonial_description_render_callback',
	
	) );
	// testimonials
	$wp_customize->selective_refresh->add_partial( 'testimonials', array(
		'selector'            => '#testimonial-section .features-area'
	) );
	
	}

add_action( 'customize_register', 'avril_testimonial_section_partials' );

// testimonial_title
function avril_testimonial_title_render_callback() {
	return get_theme_mod( 'testimonial_title' );
}

// testimonial_subtitle
function avril_testimonial_subtitle_render_callback() {
	return get_theme_mod( 'testimonial_subtitle' );
}

// testimonial_description
function avril_testimonial_description_render_callback() {
	return get_theme_mod( 'testimonial_description' );
}