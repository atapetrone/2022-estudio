<?php
function avril_slider_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
	$wp_customize->add_panel(
		'avril_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'avril-pro' ),
		)
	);
	
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'avril-pro' ),
			'panel' => 'avril_frontpage_sections',
			'priority' => 1,
		)
	);
	
	// slider Contents
	$wp_customize->add_setting(
		'slider_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'slider_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','avril-pro'),
			'section' => 'slider_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add slides
	 */
	
		$wp_customize->add_setting( 'slider', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'priority' => 5,
			  'default' => avril_get_slider_default()
			)
		);
		
		$wp_customize->add_control( 
			new Avril_Repeater( $wp_customize, 
				'slider', 
					array(
						'label'   => esc_html__('Slide','avril-pro'),
						'section' => 'slider_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'avril-pro' ),
						'item_name'                         => esc_html__( 'Slide', 'avril-pro' ),
						
						
						'customizer_repeater_icon_control' => false,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control'=> true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_link2_control' => true,
						'customizer_repeater_button2_control' => true,
						'customizer_repeater_slide_align' => true,
						'customizer_repeater_checkbox_control' => true,
						'customizer_repeater_image_control' => true,	
					) 
				) 
			);

	//Overlay Enable //
	$wp_customize->add_setting( 
		'slider_overlay_enable' , 
			array(
			'default' => 0,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 6,
		) 
	);
	
	$wp_customize->add_control(
	'slider_overlay_enable', 
		array(
			'label'	      => esc_html__( 'Overlay Enable?', 'avril-pro' ),
			'section'     => 'slider_setting',
			'type'        => 'checkbox'
		) 
	);	
	
	
	// slider opacity
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'slider_opacity',
			array(
				'default'	      => '0',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'priority' => 7,
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'slider_opacity', 
			array(
				'label'      => __( 'opacity', 'avril-pro' ),
				'section'  => 'slider_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 0,
							'max'           => 0.9,
							'step'          => 0.1,
							'default_value' => 0,
						),
					),
			) ) 
		);
	}
	
	 // Overlay Color
	$wp_customize->add_setting(
	'slide_overlay_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#fff',
		'priority' => 8,
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'slide_overlay_color', 
			array(
				'label'      => __( 'Overlay Color', 'avril-pro' ),
				'section'    => 'slider_setting'
			) 
		) 
	);
	
	// $wp_customize->add_setting( 
		// 'slider_autoplay' , 
			// array(
			// 'default' => __('false', 'avril-pro' ),
			// 'capability'     => 'edit_theme_options',
			// 'sanitize_callback' => 'sanitize_text_field',
			// 'priority' => 9,
		// ) 
	// );	
		// $wp_customize->add_control('slider_autoplay', array(
		// 'label' => __('Slider Autoplay', 'avril-pro'),
		// 'section' => 'slider_setting',
		// 'settings' => 'slider_autoplay',
		// 'type'			=> 'select',
		// 'choices'        => 
			// array(
				// 'true'		=>__('True', 'avril-pro'),
				// 'false'		=>__('False', 'avril-pro'),
			// ) 
	// ));
	
	$wp_customize->add_setting( 
		'slider_animation_in' , 
			array(
			'default' => __('pulse', 'avril-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 9,
		) 
	);	
		$wp_customize->add_control('slider_animation_in', array(
		'label' => __('Animation In', 'avril-pro'),
		'section' => 'slider_setting',
		'settings' => 'slider_animation_in',
		'type'			=> 'select',
		'choices'        => 
			array(
				''		=>__('Amimation 1', 'avril-pro'),
				'pulse'		=>__('Amimation 2', 'avril-pro'),
				'fadeIn'=>__('Amimation 3', 'avril-pro'),
				'lightSpeedIn'=>__('Amimation 4', 'avril-pro'),
				'rollIn'=>__('Amimation 5', 'avril-pro'),
				'flipInX'=>__('Amimation 6', 'avril-pro'), 	
				'bounceIn'=>__('Amimation 7', 'avril-pro'),
			) 
	));
	$wp_customize->add_setting( 
		'slider_animation_out' , 
			array(
			'default' => __('fadeOut', 'avril-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 10,
		) 
	);
	$wp_customize->add_control('slider_animation_out', array(
    'label' => __('Animation Out', 'avril-pro'),
    'section' => 'slider_setting',
	'type'			=> 'select',
	'settings' => 'slider_animation_out',
	'choices'        => 
			array(
				''		=>__('Animation 1', 'avril-pro'),
				'fadeOut'=>__('Animation 2', 'avril-pro'),
				'fadeOut'=>__('Animation 3', 'avril-pro'),
				'lightSpeedOut'=>__('Animation 4', 'avril-pro'),
				'rollOut'=>__('Animation 5', 'avril-pro'),
				'flipInY'=>__('Animation 6', 'avril-pro'),
				'bounceOut'=>__('Animation 7', 'avril-pro'),
			) 
	));
	
	// slider opacity
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'slider_animation_speed',
			array(
				'default' => '9000',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'priority' => 11,
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'slider_animation_speed', 
			array(
				'label'      => __( 'Slider Speed', 'avril-pro' ),
				'section'  => 'slider_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 500,
							'max'           => 10000,
							'step'          => 500,
							'default_value' => 9000,
						),
					),
			) ) 
		);
	}
}

add_action( 'customize_register', 'avril_slider_setting' );