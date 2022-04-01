<?php
function avril_custom_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Custom  Section
	=========================================*/
	$wp_customize->add_section(
		'custom_setting', array(
			'title' => esc_html__( 'Custom Section', 'avril-pro' ),
			'priority' => 14,
			'panel' => 'avril_frontpage_sections',
		)
	);
	
	// Custom Header Section // 
	$wp_customize->add_setting(
		'custom_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'custom_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'custom_setting',
		)
	);
	
	// Custom Title // 
	$wp_customize->add_setting(
    	'custom_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'custom_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'custom_setting',
			'type'           => 'text',
		)  
	);
	
	// Custom Subtitle // 
	$wp_customize->add_setting(
    	'custom_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Custom</b>                                   <b>Custom</b><b>Custom</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'custom_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'custom_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Custom Description // 
	$wp_customize->add_setting(
    	'custom_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'custom_description',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'custom_setting',
			'type'           => 'textarea',
		)  
	);

	// Custom content Section // 
	
	$wp_customize->add_setting(
		'custom_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'custom_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'custom_setting',
		)
	);
	
	// custom content // 
	
	$page_editor_path = trailingslashit( get_template_directory() ) . 'inc/customizer/custom-controls/controls/editor/customizer-page-editor.php';
		if ( file_exists( $page_editor_path ) ) {
			require_once( $page_editor_path );
		}
	if ( class_exists( 'Avril_Page_Editor' ) ) {
		$frontpage_id = get_option( 'page_on_front' );
		$default = '';
		if ( ! empty( $frontpage_id ) ) {
			$default = get_post_field( 'post_content', $frontpage_id );
		}
		$wp_customize->add_setting(
			'avril_custom_editor', array(
				'default' => __('Custom Section Description','avril-pro'),
				'sanitize_callback' => 'wp_kses_post',
				'priority' => 8,
				
			)
		);

		$wp_customize->add_control(
			new Avril_Page_Editor(
				$wp_customize, 'avril_custom_editor', array(
					'label' => esc_html__( 'Content', 'avril-pro' ),
					'section' => 'custom_setting',
					'needsync' => true,
				)
			)
		);
	}
	$default = '';
}

add_action( 'customize_register', 'avril_custom_setting' );

// custom selective refresh
function avril_custom_section_partials( $wp_customize ){
	// custom_title
	$wp_customize->selective_refresh->add_partial( 'custom_title', array(
		'selector'            => '#custom-section .heading-default .ttl',
		'settings'            => 'custom_title',
		'render_callback'  => 'avril_custom_title_render_callback',
	
	) );
	
	// custom_subtitle
	$wp_customize->selective_refresh->add_partial( 'custom_subtitle', array(
		'selector'            => '#custom-section .heading-default h3',
		'settings'            => 'custom_subtitle',
		'render_callback'  => 'avril_custom_subtitle_render_callback',
	) );
	
	// custom_description
	$wp_customize->selective_refresh->add_partial( 'custom_description', array(
		'selector'            => '#custom-section .heading-default p',
		'settings'            => 'custom_description',
		'render_callback'  => 'avril_custom_description_render_callback',
	) );
	
	}

add_action( 'customize_register', 'avril_custom_section_partials' );

// custom_title
function avril_custom_title_render_callback() {
	return get_theme_mod( 'custom_title' );
}

// custom_subtitle
function avril_custom_subtitle_render_callback() {
	return get_theme_mod( 'custom_subtitle' );
}

// custom_description
function avril_custom_description_render_callback() {
	return get_theme_mod( 'custom_description' );
}