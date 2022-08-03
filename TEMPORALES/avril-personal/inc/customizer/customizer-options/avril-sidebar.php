<?php
function avril_sidebar_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	/*=========================================
	Avril Sidebar
	=========================================*/
	$wp_customize->add_section(
        'avril_blog_settings',
        array(
        	'priority'      => 3,
            'title' 		=> __('Sidebar','avril-pro'),
			'panel' => 'avril_general',
		)
    );
	
	if ( class_exists( 'Avril_Customize_Control_Radio_Image' ) ) {
		// Default pages
		$wp_customize->add_setting(
			'avril_default_pg_layout', array(
				'sanitize_callback' => 'avril_sanitize_select',
				'default' => 'avril_rsb',
			)
		);

		$wp_customize->add_control(
			new Avril_Customize_Control_Radio_Image(
				$wp_customize, 'avril_default_pg_layout', array(
					'label'     => esc_html__( 'Default Page Layout', 'avril-pro' ),
					'section'   => 'avril_blog_settings',
					'priority'  => 1,
					'choices'   => array(
						'avril_lsb' => array(
							'url' => apply_filters( 'avril_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'avril_fullwidth' => array(
							'url' => apply_filters( 'avril_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'avril_rsb' => array(
							'url' => apply_filters( 'avril_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		// Archive pages
		$wp_customize->add_setting(
			'archive_pg_layout', array(
				'sanitize_callback' => 'avril_sanitize_select',
				'default' => 'avril_rsb',
			)
		);

		$wp_customize->add_control(
			new Avril_Customize_Control_Radio_Image(
				$wp_customize, 'archive_pg_layout', array(
					'label'     => esc_html__( 'Archive Page Layout', 'avril-pro' ),
					'section'   => 'avril_blog_settings',
					'priority'  => 2,
					'choices'   => array(
						'avril_lsb' => array(
							'url' => apply_filters( 'avril_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'avril_fullwidth' => array(
							'url' => apply_filters( 'avril_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'avril_rsb' => array(
							'url' => apply_filters( 'avril_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Single page
		$wp_customize->add_setting(
			'blog_single_layout', array(
				'sanitize_callback' => 'avril_sanitize_select',
				'default' => 'avril_rsb',
			)
		);

		$wp_customize->add_control(
			new Avril_Customize_Control_Radio_Image(
				$wp_customize, 'blog_single_layout', array(
					'label'     => esc_html__( 'Single Page Layout', 'avril-pro' ),
					'section'   => 'avril_blog_settings',
					'priority'  => 3,
					'choices'   => array(
						'avril_lsb' => array(
							'url' => apply_filters( 'avril_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'avril_fullwidth' => array(
							'url' => apply_filters( 'avril_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'avril_rsb' => array(
							'url' => apply_filters( 'avril_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Blog page
		$wp_customize->add_setting(
			'blog_page_layout', array(
				'sanitize_callback' => 'avril_sanitize_select',
				'default' => 'avril_rsb',
			)
		);

		$wp_customize->add_control(
			new Avril_Customize_Control_Radio_Image(
				$wp_customize, 'blog_page_layout', array(
					'label'     => esc_html__( 'Blog Page Layout', 'avril-pro' ),
					'section'   => 'avril_blog_settings',
					'priority'  => 4,
					'choices'   => array(
						'avril_lsb' => array(
							'url' => apply_filters( 'avril_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'avril_fullwidth' => array(
							'url' => apply_filters( 'avril_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'avril_rsb' => array(
							'url' => apply_filters( 'avril_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
		
		// Search page
		$wp_customize->add_setting(
			'search_pg_layout', array(
				'sanitize_callback' => 'avril_sanitize_select',
				'default' => 'avril_rsb',
			)
		);

		$wp_customize->add_control(
			new Avril_Customize_Control_Radio_Image(
				$wp_customize, 'search_pg_layout', array(
					'label'     => esc_html__( 'Search Page Layout', 'avril-pro' ),
					'section'   => 'avril_blog_settings',
					'priority'  => 5,
					'choices'   => array(
						'avril_lsb' => array(
							'url' => apply_filters( 'avril_lsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/lsb.svg' )),
						),
						'avril_fullwidth' => array(
							'url' => apply_filters( 'avril_fullwidth', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
						'avril_rsb' => array(
							'url' => apply_filters( 'avril_rsb', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/rsb.svg' )),
						),
					),
				)
			)
		);
	}
	
	// Widget options
	$wp_customize->add_setting(
		'sidebar_options'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'sidebar_options',
		array(
			'type' => 'hidden',
			'label' => __('Options','avril-pro'),
			'section' => 'avril_blog_settings',
			'priority'  => 6
		)
	);
	// Sidebar Width 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'avril_sidebar_width',
			array(
				'default'	      => esc_html__( '35', 'avril-pro' ),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'avril_sidebar_width', 
			array(
				'label'      => __( 'Sidebar Width', 'avril-pro' ),
				'section'  => 'avril_blog_settings',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 25,
							'max'           => 50,
							'step'          => 1,
							'default_value' => 35,
						),
					),
				'priority'  => 7
			) ) 
		);
	}
	
	// Widget Typography
	$wp_customize->add_setting(
		'sidebar_typography'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'sidebar_typography',
		array(
			'type' => 'hidden',
			'label' => __('Typography','avril-pro'),
			'section' => 'avril_blog_settings',
			'priority'  => 21,
		)
	);
	
	// Widget Title // 
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'sidebar_wid_ttl_size',
			array(
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'transport'         => 'postMessage'
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'sidebar_wid_ttl_size', 
			array(
				'label'      => __( 'Widget Title Font Size', 'avril-pro' ),
				'section'  => 'avril_blog_settings',
				'priority'  => 22,
				 'media_query'   => true,
                'input_attr'    => array(
                    'mobile'  => array(
                        'min'           => 5,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                    'tablet'  => array(
                        'min'           => 5,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                    'desktop' => array(
                        'min'           => 5,
                        'max'           => 100,
                        'step'          => 1,
                        'default_value' => 20,
                    ),
                ),
			) ) 
		);
	}
}
add_action( 'customize_register', 'avril_sidebar_settings' );