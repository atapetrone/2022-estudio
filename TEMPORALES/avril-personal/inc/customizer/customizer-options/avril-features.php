<?php
function avril_features_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Service  Section
	=========================================*/
	$wp_customize->add_section(
		'feature_setting', array(
			'title' => esc_html__( 'Features Section', 'avril-pro' ),
			'priority' => 4,
			'panel' => 'avril_frontpage_sections',
		)
	);
	
	// Features Header Section // 
	$wp_customize->add_setting(
		'feature_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'feature_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'feature_setting',
		)
	);
	
	// Feature Title // 
	$wp_customize->add_setting(
    	'feature_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'feature_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'feature_setting',
			'type'           => 'text',
		)  
	);
	
	// Service Subtitle // 
	$wp_customize->add_setting(
    	'feature_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Features</b>                                   <b>Features</b><b>Features</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'feature_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'feature_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Feature Description // 
	$wp_customize->add_setting(
    	'feature_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'feature_description',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'feature_setting',
			'type'           => 'textarea',
		)  
	);

	// Fetaures content Section // 
	
	$wp_customize->add_setting(
		'feature_contents_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'feature_contents_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'feature_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Features
	 */
	
		$wp_customize->add_setting( 'features_contents', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => avril_get_features_default()
			)
		);
		
		$wp_customize->add_control( 
			new Avril_Repeater( $wp_customize, 
				'features_contents', 
					array(
						'label'   => esc_html__('Features','avril-pro'),
						'section' => 'feature_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'avril-pro' ),
						'item_name'                         => esc_html__( 'Feature', 'avril-pro' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
	// Feature column // 
	$wp_customize->add_setting(
    	'feature_column',
    	array(
	        'default'			=> '4',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 9,
		)
	);	

	$wp_customize->add_control(
		'feature_column',
		array(
		    'label'   		=> __('Features Column','avril-pro'),
		    'section' 		=> 'feature_setting',
			'type'			=> 'select',
			'choices'        => 
			array(
				'6' => __( '2 column', 'avril-pro' ),
				'4' => __( '3 column', 'avril-pro' ),
				'3' => __( '4 column', 'avril-pro' ),
			) 
		) 
	);
}

add_action( 'customize_register', 'avril_features_setting' );

// service selective refresh
function avril_features_section_partials( $wp_customize ){	
	// feature_title
	$wp_customize->selective_refresh->add_partial( 'feature_title', array(
		'selector'            => '#features-section .heading-default .ttl',
		'settings'            => 'feature_title',
		'render_callback'  => 'avril_feature_title_render_callback',
	
	) );
	
	// feature_subtitle
	$wp_customize->selective_refresh->add_partial( 'feature_subtitle', array(
		'selector'            => '#features-section .heading-default h3',
		'settings'            => 'feature_subtitle',
		'render_callback'  => 'avril_feature_subtitle_render_callback',
	
	) );
	
	// feature_description
	$wp_customize->selective_refresh->add_partial( 'feature_description', array(
		'selector'            => '#features-section .heading-default p',
		'settings'            => 'feature_description',
		'render_callback'  => 'avril_feature_description_render_callback',
	
	) );
	// features_contents
	$wp_customize->selective_refresh->add_partial( 'features_contents', array(
		'selector'            => '#features-section .features-area'
	
	) );
	
	}

add_action( 'customize_register', 'avril_features_section_partials' );

// feature_title
function avril_feature_title_render_callback() {
	return get_theme_mod( 'feature_title' );
}

// feature_subtitle
function avril_feature_subtitle_render_callback() {
	return get_theme_mod( 'feature_subtitle' );
}

// service description
function avril_feature_description_render_callback() {
	return get_theme_mod( 'feature_description' );
}