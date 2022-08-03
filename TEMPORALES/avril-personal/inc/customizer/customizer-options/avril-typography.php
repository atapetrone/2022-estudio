<?php
function avril_typography( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	$wp_customize->add_panel(
		'avril_typography', array(
			'priority' => 38,
			'title' => esc_html__( 'Typography', 'avril-pro' ),
		)
	);	
	
	/*=========================================
	Avril Typography
	=========================================*/
	$wp_customize->add_section(
        'avril_typography',
        array(
        	'priority'      => 1,
            'title' 		=> __('Body Typography','avril-pro'),
			'panel'  		=> 'avril_typography',
		)
    );
	
	 /**
     * Font Family
     */

    $wp_customize->add_setting(
        'avril_body_font_family', array(
            'capability'        => 'edit_theme_options',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'avril_sanitize_typography_fonts',
        )
    );

    $wp_customize->add_control(
        new Avril_Font_Selector(
            $wp_customize, 'avril_body_font_family', array(
                'label'             => esc_html__( 'Font Family', 'avril-pro' ),
                'section'           => 'avril_typography',
                'priority'          => 1,
                'type'              => 'select',
            )
        )
    );
	
	// Body Font Size // 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'avril_body_font_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'avril_body_font_size', 
			array(
				'label'      => __( 'Size', 'avril-pro' ),
				'section'  => 'avril_typography',
				'priority'      => 2,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 1,
                        'max'           => 50,
                        'step'          => 1,
                        'default_value' => 16,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 50,
                        'step'          => 1,
                        'default_value' => 16,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 50,
                        'step'          => 1,
                        'default_value' => 16,
                    ),
                ),
			) ) 
		);
	}
	
	// Body Font Size // 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'avril_body_line_height',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'avril_body_line_height', 
			array(
				'label'      => __( 'Line Height', 'avril-pro' ),
				'section'  => 'avril_typography',
				'priority'      => 3,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.6,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.6,
                    ),
                    'desktop' => array(
                       'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.6,
                    ),
				)	
			) ) 
		);
	}
	
	// Body Font Size // 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'avril_body_ltr_space',
			array(
                'default'           => '0.1',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'avril_body_ltr_space', 
			array(
				'label'      => __( 'Letter Spacing', 'avril-pro' ),
				'section'  => 'avril_typography',
				'priority'      => 4,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
                    'tablet'  => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
                    'desktop' => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
				)	
			) ) 
		);
	}
	
	// Body Font weight // 
	 $wp_customize->add_setting( 'avril_body_font_weight', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'avril_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'avril_body_font_weight', array(
            'label'       => __( 'Weight', 'avril-pro' ),
            'section'     => 'avril_typography',
            'type'        =>  'select',
            'priority'    => 5,
            'choices'     =>  array(
                'inherit'   =>  __( 'Default', 'avril-pro' ),
                '100'       =>  __( 'Thin: 100', 'avril-pro' ),
                '200'       =>  __( 'Light: 200', 'avril-pro' ),
                '300'       =>  __( 'Book: 300', 'avril-pro' ),
                '400'       =>  __( 'Normal: 400', 'avril-pro' ),
                '500'       =>  __( 'Medium: 500', 'avril-pro' ),
                '600'       =>  __( 'Semibold: 600', 'avril-pro' ),
                '700'       =>  __( 'Bold: 700', 'avril-pro' ),
                '800'       =>  __( 'Extra Bold: 800', 'avril-pro' ),
                '900'       =>  __( 'Black: 900', 'avril-pro' ),
                ),
            )
        )
    );
	
	// Body Font style // 
	 $wp_customize->add_setting( 'avril_body_font_style', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'avril_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'avril_body_font_style', array(
            'label'       => __( 'Font Style', 'avril-pro' ),
            'section'     => 'avril_typography',
            'type'        =>  'select',
            'priority'    => 6,
            'choices'     =>  array(
                'inherit'   =>  __( 'Inherit', 'avril-pro' ),
                'normal'       =>  __( 'Normal', 'avril-pro' ),
                'italic'       =>  __( 'Italic', 'avril-pro' ),
                'oblique'       =>  __( 'oblique', 'avril-pro' ),
                ),
            )
        )
    );
	// Body Text Transform // 
	 $wp_customize->add_setting( 'avril_body_text_transform', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'avril_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'avril_body_text_transform', array(
                'label'       => __( 'Transform', 'avril-pro' ),
                'section'     => 'avril_typography',
                'type'        => 'select',
                'priority'    => 7,
                'choices'     => array(
                    'inherit'       =>  __( 'Default', 'avril-pro' ),
                    'uppercase'     =>  __( 'Uppercase', 'avril-pro' ),
                    'lowercase'     =>  __( 'Lowercase', 'avril-pro' ),
                    'capitalize'    =>  __( 'Capitalize', 'avril-pro' ),
                ),
            )
        )
    );
	
	// Body Text Decoration // 
	 $wp_customize->add_setting( 'avril_body_txt_decoration', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'avril_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'avril_body_txt_decoration', array(
                'label'       => __( 'Text Decoration', 'avril-pro' ),
                'section'     => 'avril_typography',
                'type'        => 'select',
                'priority'    => 8,
                'choices'     => array(
                    'inherit'       =>  __( 'Inherit', 'avril-pro' ),
                    'underline'     =>  __( 'Underline', 'avril-pro' ),
                    'overline'     =>  __( 'Overline', 'avril-pro' ),
                    'line-through'    =>  __( 'Line Through', 'avril-pro' ),
					'none'    =>  __( 'None', 'avril-pro' ),
                ),
            )
        )
    );
	/*=========================================
	 Avril Typography Headings
	=========================================*/
	$wp_customize->add_section(
        'avril_headings_typography',
        array(
        	'priority'      => 2,
            'title' 		=> __('Headings','avril-pro'),
			'panel'  		=> 'avril_typography',
		)
    );
	
	/*=========================================
	 Avril Typography H1
	=========================================*/
	for ( $i = 1; $i <= 6; $i++ ) {
	if($i  == '1'){$j=36;}elseif($i  == '2'){$j=32;}elseif($i  == '3'){$j=28;}elseif($i  == '4'){$j=24;}elseif($i  == '5'){$j=20;}else{$j=16;}
	$wp_customize->add_setting(
		'h' . $i . '_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'h' . $i . '_typography',
		array(
			'type' => 'hidden',
			'label' => esc_html('H' . $i .'','avril-pro'),
			'section' => 'avril_headings_typography',
		)
	);
	
    $wp_customize->add_setting(
        'avril_h' . $i . '_font_family', array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'avril_sanitize_typography_fonts',
        )
    );

    $wp_customize->add_control(
        new Avril_Font_Selector(
            $wp_customize, 'avril_h' . $i . '_font_family', array(
                'label'             => esc_html__( 'Font Family', 'avril-pro' ),
                'section'           => 'avril_headings_typography',
                'type'              => 'select',
            )
        )
    );

	// Heading Font Size // 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'avril_h' . $i . '_font_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'avril_h' . $i . '_font_size', 
			array(
				'label'      => __( 'Font Size', 'avril-pro' ),
				'section'  => 'avril_headings_typography',
				'media_query'   => true,
				'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 1,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => $j,
                    ),
                    'tablet'  => array(
                        'min'           => 1,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => $j,
                    ),
                    'desktop' => array(
                       'min'           => 1,
                        'max'           => 100,
                        'step'          => 1,
					    'default_value' => $j,
                    ),
				)	
			) ) 
		);
	}
	
	// Heading Font Size // 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'avril_h' . $i . '_line_height',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'avril_h' . $i . '_line_height', 
			array(
				'label'      => __( 'Line Height', 'avril-pro' ),
				'section'  => 'avril_headings_typography',
				'media_query'   => true,
				'input_attrs' => array(
					'min'    => 0,
					'max'    => 5,
					'step'   => 0.1,
					//'suffix' => 'px', //optional suffix
				),
				 'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.2,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.2,
                    ),
                    'desktop' => array(
                       'min'           => 0,
                        'max'           => 3,
                        'step'          => 0.1,
                        'default_value' => 1.2,
                    ),
				)	
			) ) 
		);
		}
	// Heading Letter Spacing // 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'avril_h' . $i . '_ltr_spacing',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'avril_h' . $i . '_ltr_spacing', 
			array(
				'label'      => __( 'Letter Spacing', 'avril-pro' ),
				'section'  => 'avril_headings_typography',
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0.1,
                    ),
                    'tablet'  => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0.1,
                    ),
                    'desktop' => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0.1,
                    ),
				)	
			) ) 
		);
	}
	
	// Heading Font weight // 
	 $wp_customize->add_setting( 'avril_h' . $i . '_font_weight', array(
		  'capability'        => 'edit_theme_options',
		  'default'           => '700',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'avril_sanitize_select',
		) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'avril_h' . $i . '_font_weight', array(
            'label'       => __( 'Font Weight', 'avril-pro' ),
            'section'     => 'avril_headings_typography',
            'type'        =>  'select',
            'choices'     =>  array(
                'inherit'   =>  __( 'Inherit', 'avril-pro' ),
                '100'       =>  __( 'Thin: 100', 'avril-pro' ),
                '200'       =>  __( 'Light: 200', 'avril-pro' ),
                '300'       =>  __( 'Book: 300', 'avril-pro' ),
                '400'       =>  __( 'Normal: 400', 'avril-pro' ),
                '500'       =>  __( 'Medium: 500', 'avril-pro' ),
                '600'       =>  __( 'Semibold: 600', 'avril-pro' ),
                '700'       =>  __( 'Bold: 700', 'avril-pro' ),
                '800'       =>  __( 'Extra Bold: 800', 'avril-pro' ),
                '900'       =>  __( 'Black: 900', 'avril-pro' ),
                ),
            )
        )
    );
	
	// Heading Font style // 
	 $wp_customize->add_setting( 'avril_h' . $i . '_font_style', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'avril_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'avril_h' . $i . '_font_style', array(
            'label'       => __( 'Font Style', 'avril-pro' ),
            'section'     => 'avril_headings_typography',
            'type'        =>  'select',
            'choices'     =>  array(
                'inherit'   =>  __( 'Inherit', 'avril-pro' ),
                'normal'       =>  __( 'Normal', 'avril-pro' ),
                'italic'       =>  __( 'Italic', 'avril-pro' ),
                'oblique'       =>  __( 'oblique', 'avril-pro' ),
                ),
            )
        )
    );
	
	// Heading Text Transform // 
	 $wp_customize->add_setting( 'avril_h' . $i . '_text_transform', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'avril_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'avril_h' . $i . '_text_transform', array(
                'label'       => __( 'Text Transform', 'avril-pro' ),
                'section'     => 'avril_headings_typography',
                'type'        => 'select',
                'choices'     => array(
                    'inherit'       =>  __( 'Default', 'avril-pro' ),
                    'uppercase'     =>  __( 'Uppercase', 'avril-pro' ),
                    'lowercase'     =>  __( 'Lowercase', 'avril-pro' ),
                    'capitalize'    =>  __( 'Capitalize', 'avril-pro' ),
                ),
            )
        )
    );
	
	// Heading Text Decoration // 
	 $wp_customize->add_setting( 'avril_h' . $i . '_text_decoration', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'avril_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'avril_h' . $i . '_text_decoration', array(
                'label'       => __( 'Text Decoration', 'avril-pro' ),
                'section'     => 'avril_headings_typography',
                'type'        => 'select',
                'choices'     => array(
                    'inherit'       =>  __( 'Inherit', 'avril-pro' ),
                    'underline'     =>  __( 'Underline', 'avril-pro' ),
                    'overline'     =>  __( 'Overline', 'avril-pro' ),
                    'line-through'    =>  __( 'Line Through', 'avril-pro' ),
					'none'    =>  __( 'None', 'avril-pro' ),
                ),
            )
        )
    );
}


/*=========================================
	Avril Typography Menus
=========================================*/
	$wp_customize->add_section(
        'avril_menu_typography',
        array(
        	'priority'      => 2,
            'title' 		=> __('Menu','avril-pro'),
			'panel'  		=> 'avril_typography',
		)
    );
	
	 /**
     * Font Family
     */

    $wp_customize->add_setting(
        'avril_menu_font_family', array(
            'capability'        => 'edit_theme_options',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new Avril_Font_Selector(
            $wp_customize, 'avril_menu_font_family', array(
                'label'             => esc_html__( 'Font Family', 'avril-pro' ),
                'section'           => 'avril_menu_typography',
                'priority'          => 1,
                'type'              => 'select',
            )
        )
    );
	
	// Menu Font Size // 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'avril_menu_font_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'avril_menu_font_size', 
			array(
				'label'      => __( 'Size', 'avril-pro' ),
				'section'  => 'avril_menu_typography',
				'priority'      => 2,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 1,
                        'max'           => 50,
                        'step'          => 1,
                        'default_value' => 15,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 50,
                        'step'          => 1,
                        'default_value' => 15,
                    ),
                    'desktop' => array(
                        'min'           => 0,
                        'max'           => 50,
                        'step'          => 1,
                        'default_value' => 15,
                    ),
                ),
			) ) 
		);
	}
	
	// Menu Font Size // 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'avril_menu_line_height',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'avril_menu_line_height', 
			array(
				'label'      => __( 'Line Height', 'avril-pro' ),
				'section'  => 'avril_menu_typography',
				'priority'      => 3,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 0,
                        'max'           => 5,
                        'step'          => 0.1,
                        'default_value' => 3,
                    ),
                    'tablet'  => array(
                        'min'           => 0,
                        'max'           => 5,
                        'step'          => 0.1,
                        'default_value' => 3,
                    ),
                    'desktop' => array(
                       'min'           => 0,
                        'max'           => 5,
                        'step'          => 0.1,
                        'default_value' => 3,
                    ),
				)	
			) ) 
		);
	}
	
	// Menu Font Size // 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'avril_menu_ltr_space',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'avril_menu_ltr_space', 
			array(
				'label'      => __( 'Letter Spacing', 'avril-pro' ),
				'section'  => 'avril_menu_typography',
				'priority'      => 4,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
                    'tablet'  => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
                    'desktop' => array(
                       'min'           => -10,
                        'max'           => 10,
                        'step'          => 1,
                        'default_value' => 0,
                    ),
				)	
			) ) 
		);
	}
	
	// Menu Font weight // 
	 $wp_customize->add_setting( 'avril_menu_font_weight', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'avril_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'avril_menu_font_weight', array(
            'label'       => __( 'Weight', 'avril-pro' ),
            'section'     => 'avril_menu_typography',
            'type'        =>  'select',
            'priority'    => 5,
            'choices'     =>  array(
                'inherit'   =>  __( 'Default', 'avril-pro' ),
                '100'       =>  __( 'Thin: 100', 'avril-pro' ),
                '200'       =>  __( 'Light: 200', 'avril-pro' ),
                '300'       =>  __( 'Book: 300', 'avril-pro' ),
                '400'       =>  __( 'Normal: 400', 'avril-pro' ),
                '500'       =>  __( 'Medium: 500', 'avril-pro' ),
                '600'       =>  __( 'Semibold: 600', 'avril-pro' ),
                '700'       =>  __( 'Bold: 700', 'avril-pro' ),
                '800'       =>  __( 'Extra Bold: 800', 'avril-pro' ),
                '900'       =>  __( 'Black: 900', 'avril-pro' ),
                ),
            )
        )
    );
	
	// Body Font style // 
	 $wp_customize->add_setting( 'avril_menu_font_style', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'avril_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
                $wp_customize, 'avril_menu_font_style', array(
            'label'       => __( 'Font Style', 'avril-pro' ),
            'section'     => 'avril_menu_typography',
            'type'        =>  'select',
            'priority'    => 6,
            'choices'     =>  array(
                'inherit'   =>  __( 'Inherit', 'avril-pro' ),
                'normal'       =>  __( 'Normal', 'avril-pro' ),
                'italic'       =>  __( 'Italic', 'avril-pro' ),
                'oblique'       =>  __( 'oblique', 'avril-pro' ),
                ),
            )
        )
    );
	// Menu Text Transform // 
	 $wp_customize->add_setting( 'avril_menu_text_transform', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'avril_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'avril_menu_text_transform', array(
                'label'       => __( 'Transform', 'avril-pro' ),
                'section'     => 'avril_menu_typography',
                'type'        => 'select',
                'priority'    => 7,
                'choices'     => array(
                    'inherit'       =>  __( 'Default', 'avril-pro' ),
                    'uppercase'     =>  __( 'Uppercase', 'avril-pro' ),
                    'lowercase'     =>  __( 'Lowercase', 'avril-pro' ),
                    'capitalize'    =>  __( 'Capitalize', 'avril-pro' ),
                ),
            )
        )
    );
	
	// Body Text Decoration // 
	 $wp_customize->add_setting( 'avril_menu_txt_decoration', array(
      'capability'        => 'edit_theme_options',
      'default'           => 'inherit',
      'transport'         => 'postMessage',
      'sanitize_callback' => 'avril_sanitize_select',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize, 'avril_menu_txt_decoration', array(
                'label'       => __( 'Decoration', 'avril-pro' ),
                'section'     => 'avril_menu_typography',
                'type'        => 'select',
                'priority'    => 8,
                'choices'     => array(
                    'inherit'       =>  __( 'Inherit', 'avril-pro' ),
                    'underline'     =>  __( 'Underline', 'avril-pro' ),
                    'overline'     =>  __( 'Overline', 'avril-pro' ),
                    'line-through'    =>  __( 'Line Through', 'avril-pro' ),
					'none'    =>  __( 'None', 'avril-pro' ),
                ),
            )
        )
    );
}
add_action( 'customize_register', 'avril_typography' );