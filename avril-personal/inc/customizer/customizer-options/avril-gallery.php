<?php
function avril_gallery_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Gallery  Section
	=========================================*/
	$wp_customize->add_section(
		'gallery_setting', array(
			'title' => esc_html__( 'Gallery Section', 'avril-pro' ),
			'priority' => 7,
			'panel' => 'avril_frontpage_sections',
		)
	);
	
	// Gallery Header Section // 
	$wp_customize->add_setting(
		'gallery_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'gallery_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'gallery_setting',
		)
	);
	
	// Gallery Title // 
	$wp_customize->add_setting(
    	'gallery_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'gallery_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'gallery_setting',
			'type'           => 'text',
		)  
	);
	
	// Gallery Subtitle // 
	$wp_customize->add_setting(
    	'gallery_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Gallery</b>                                   <b>Gallery</b><b>Gallery</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'gallery_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'gallery_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Gallery Description // 
	$wp_customize->add_setting(
    	'gallery_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'gallery_description',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'gallery_setting',
			'type'           => 'textarea',
		)  
	);

	// Gallery content Section // 
	
	$wp_customize->add_setting(
		'gallery_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'gallery_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'gallery_setting',
		)
	);
	/**
	 * Customizer Repeater for add service
	 */
	
		$wp_customize->add_setting( 'gallery', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => avril_get_gallery_default()
			)
		);
		
		$wp_customize->add_control( 
			new Avril_Repeater( $wp_customize, 
				'gallery', 
					array(
						'label'   => esc_html__('Gallery','avril-pro'),
						'section' => 'gallery_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'avril-pro' ),
						'item_name'                         => esc_html__( 'Gallery', 'avril-pro' ),
						'customizer_repeater_image_control' => true,
					) 
				) 
			);
}

add_action( 'customize_register', 'avril_gallery_setting' );

// Gallery selective refresh
function avril_gallery_section_partials( $wp_customize ){
	
	// gallery_title
	$wp_customize->selective_refresh->add_partial( 'gallery_title', array(
		'selector'            => '.home-gallery .heading-default .ttl',
		'settings'            => 'gallery_title',
		'render_callback'  => 'avril_gallery_title_render_callback',
	
	) );
	
	// gallery_subtitle
	$wp_customize->selective_refresh->add_partial( 'gallery_subtitle', array(
		'selector'            => '.home-gallery .heading-default h3',
		'settings'            => 'gallery_subtitle',
		'render_callback'  => 'avril_gallery_subtitle_render_callback',
	) );
	
	// gallery_description
	$wp_customize->selective_refresh->add_partial( 'gallery_description', array(
		'selector'            => '.home-gallery .heading-default p',
		'settings'            => 'gallery_description',
		'render_callback'  => 'avril_gallery_description_render_callback',
	) );
	
	// Gallery content
	$wp_customize->selective_refresh->add_partial( 'gallery', array(
		'selector'            => '.home-gallery .gallery'
	) );
	
	}

add_action( 'customize_register', 'avril_gallery_section_partials' );

// gallery_title
function avril_gallery_title_render_callback() {
	return get_theme_mod( 'gallery_title' );
}

// gallery_subtitle
function avril_gallery_subtitle_render_callback() {
	return get_theme_mod( 'gallery_subtitle' );
}

// gallery_description
function avril_gallery_description_render_callback() {
	return get_theme_mod( 'gallery_description' );
}