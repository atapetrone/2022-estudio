<?php
function avril_funfact_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Funfact Section
	=========================================*/
	$wp_customize->add_section(
		'funfact_setting', array(
			'title' => esc_html__( 'Funfact Section', 'avril-pro' ),
			'priority' => 10,
			'panel' => 'avril_frontpage_sections',
		)
	);

	// Funfact content Section // 
	
	$wp_customize->add_setting(
		'funfact_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'funfact_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'funfact_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Funfact
	 */
	
		$wp_customize->add_setting( 'funfact_contents', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			'default' => avril_get_funfact_default()
			)
		);
		
		$wp_customize->add_control( 
			new Avril_Repeater( $wp_customize, 
				'funfact_contents', 
					array(
						'label'   => esc_html__('Funfact','avril-pro'),
						'section' => 'funfact_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'avril-pro' ),
						'item_name'                         => esc_html__( 'Funfact', 'avril-pro' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
			
	// funfact column // 
	$wp_customize->add_setting(
    	'funfact_sec_column',
    	array(
	        'default'			=> '3',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 9,
		)
	);	

	$wp_customize->add_control(
		'funfact_sec_column',
		array(
		    'label'   		=> __('Funfact Column','avril-pro'),
		    'section' 		=> 'funfact_setting',
			'type'			=> 'select',
			'choices'        => 
			array(
				'12' => __( '1 column', 'avril-pro' ),
				'6' => __( '2 column', 'avril-pro' ),
				'4' => __( '3 column', 'avril-pro' ),
				'3' => __( '4 column', 'avril-pro' ),
			) 
		) 
	);
	
	// Funfact Background // 	
	$wp_customize->add_setting(
		'funfact_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 10,
		)
	);

	$wp_customize->add_control(
	'funfact_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','avril-pro'),
			'section' => 'funfact_setting',
		)
	);
	
    $wp_customize->add_setting( 
    	'funfact_bg_setting' , 
    	array(
			'default' 			=> get_template_directory_uri() . '/assets/images/bg/fun-fact-bg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',	
			'priority' => 11,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'funfact_bg_setting' ,
		array(
			'label'          => __( 'Background Image', 'avril-pro' ),
			'section'        => 'funfact_setting',
		) 
	));

	$wp_customize->add_setting( 
		'funfact_bg_position' , 
			array(
			'default' => 'fixed',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control(
		'funfact_bg_position' , 
			array(
				'label'          => __( 'Image Position', 'avril-pro' ),
				'section'        => 'funfact_setting',
				'type'           => 'radio',
				'choices'        => 
				array(
					'fixed'=> __( 'Fixed', 'avril-pro' ),
					'scroll' => __( 'Scroll', 'avril-pro' )
			)  
		) 
	);
}

add_action( 'customize_register', 'avril_funfact_setting' );

// service selective refresh
function avril_funfact_section_partials( $wp_customize ){
	
	// Funfact content
	$wp_customize->selective_refresh->add_partial( 'funfact_contents', array(
		'selector'            => '#funfact-section'
	) );
	}

add_action( 'customize_register', 'avril_funfact_section_partials' );