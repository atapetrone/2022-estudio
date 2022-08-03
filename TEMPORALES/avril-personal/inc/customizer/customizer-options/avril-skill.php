<?php
function avril_skills_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Skill  Section
	=========================================*/
	$wp_customize->add_section(
		'skill_setting', array(
			'title' => esc_html__( 'Skill Section', 'avril-pro' ),
			'priority' => 14,
			'panel' => 'avril_frontpage_sections',
		)
	);
	
	// Skill Header Section // 
	$wp_customize->add_setting(
		'skill_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'skill_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'skill_setting',
		)
	);
	
	// Skill Title // 
	$wp_customize->add_setting(
    	'skill_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'skill_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'skill_setting',
			'type'           => 'text',
		)  
	);
	
	// Skill Subtitle // 
	$wp_customize->add_setting(
    	'skill_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Skills</b>                                   <b>Skills</b><b>Skills</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'skill_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'skill_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Skill Description // 
	$wp_customize->add_setting(
    	'skill_desc',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'skill_desc',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'skill_setting',
			'type'           => 'textarea',
		)  
	);

	// Fetaures content Section // 
	
	$wp_customize->add_setting(
		'feature_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'feature_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'skill_setting',
		)
	);
	
	//  Image // 
    $wp_customize->add_setting( 
    	'skill_img' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/about/mobileDevice.png',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',	
			'priority' => 8,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'skill_img' ,
		array(
			'label'          => esc_html__( 'Image', 'avril-pro'),
			'section'        => 'skill_setting',
		) 
	));
	
	/**
	 * Customizer Repeater for add Skills
	 */
	
		$wp_customize->add_setting( 'skills', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 9,
			 'default' => avril_get_skill_default()
			)
		);
		
		$wp_customize->add_control( 
			new Avril_Repeater( $wp_customize, 
				'skills', 
					array(
						'label'   => esc_html__('Skills','avril-pro'),
						'section' => 'skill_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'avril-pro' ),
						'item_name'                         => esc_html__( 'Skill', 'avril-pro' ),
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
}

add_action( 'customize_register', 'avril_skills_setting' );

// service selective refresh
function avril_skill_section_partials( $wp_customize ){	
	// skill_title
	$wp_customize->selective_refresh->add_partial( 'skill_title', array(
		'selector'            => '#skills-section .heading-default .ttl',
		'settings'            => 'skill_title',
		'render_callback'  => 'avril_skill_title_render_callback',
	
	) );
	
	// skill_subtitle
	$wp_customize->selective_refresh->add_partial( 'skill_subtitle', array(
		'selector'            => '#skills-section .heading-default h3',
		'settings'            => 'skill_subtitle',
		'render_callback'  => 'avril_skill_subtitle_render_callback',
	
	) );
	
	// skill_desc
	$wp_customize->selective_refresh->add_partial( 'skill_desc', array(
		'selector'            => '#skills-section .heading-default p',
		'settings'            => 'skill_desc',
		'render_callback'  => 'avril_skill_desc_render_callback',
	
	) );
	// skills
	$wp_customize->selective_refresh->add_partial( 'skills', array(
		'selector'            => '#skills-section .skills-wrapper'
	
	) );
	
	}

add_action( 'customize_register', 'avril_skill_section_partials' );

// skill_title
function avril_skill_title_render_callback() {
	return get_theme_mod( 'skill_title' );
}

// skill_subtitle
function avril_skill_subtitle_render_callback() {
	return get_theme_mod( 'skill_subtitle' );
}

// skill_desc
function avril_skill_desc_render_callback() {
	return get_theme_mod( 'skill_desc' );
}