<?php
function avril_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'avril-pro'),
		) 
	);
	/*=========================================
	Footer Types
	=========================================*/
	$wp_customize->add_section(
        'footer_type',
        array(
        	'priority'      => 1,
            'title' 		=> __('Footer Type','avril-pro'),
			'panel'  		=> 'footer_section',
		)
    );
	
	$wp_customize->add_setting( 
		'avril_footer_type' , 
			array(
			'default' => __('footer-dark', 'avril-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
		) 
	);

	$wp_customize->add_control(
	'avril_footer_type' , 
		array(
			'label'          => __( 'Footer Type', 'avril-pro' ),
			'section'        => 'footer_type',
			'type'           => 'select',
			'choices'        => 
			array(
				'footer-dark'   => __( 'Footer Dark', 'avril-pro' ),
				'footer-light' 	=> __( 'Footer Light', 'avril-pro' ),
			) 
		) 
	);
	/*=========================================
	Footer Above
	=========================================*/	
	$wp_customize->add_section(
        'footer_above',
        array(
            'title' 		=> __('Footer Above','avril-pro'),
			'panel'  		=> 'footer_section',
			'priority'      => 2,
		)
    );
	// hide/show
	$wp_customize->add_setting( 
		'hs_above_footer' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'transport'         => $selective_refresh,
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_above_footer', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril-pro' ),
			'section'     => 'footer_above',
			'type'        => 'checkbox'
		) 
	);	
	//content
	$wp_customize->add_setting( 'footer_above_content', 
		array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'default' => avril_get_footer_above_default(),
			 'priority' => 2,
			)
		);
		
		$wp_customize->add_control( 
			new AVRIL_Repeater( $wp_customize, 
				'footer_above_content', 
					array(
						'label'   => esc_html__('Content','avril-pro'),
						'section' => 'footer_above',
						'add_field_label'                   => esc_html__( 'Add New', 'avril-pro' ),
						'item_name'                         => esc_html__( 'Content', 'avril-pro' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);	
			
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copy_Section',
        array(
            'title' 		=> __('Below Footer','avril-pro'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );

	if ( class_exists( 'Avril_Customize_Control_Radio_Image' ) ) {

		$wp_customize->add_setting(
			'footer_bottom_layout', array(
				'sanitize_callback' => 'avril_sanitize_select',
				'default' => 'layout-2',
			)
		);

		$wp_customize->add_control(
			new Avril_Customize_Control_Radio_Image(
				$wp_customize, 'footer_bottom_layout', array(
					'label'     => esc_html__( 'Layout', 'avril-pro' ),
					'section'   => 'footer_copy_Section',
					'priority'  => 2,
					'choices'   => array(
						'disable' => array(
							'url' => apply_filters( 'avril-disable', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/none.svg' )),
						),
						'layout-1' => array(
							'url' => apply_filters( 'avril-layout-1', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/layout-center.svg' )),
						),
						'layout-2' => array(
							'url' => apply_filters( 'avril-layout-2', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/full-width.svg' )),
						),
					),
				)
			)
		);
	}	
	
	$wp_customize->add_setting( 
		'footer_bottom_1' , 
			array(
			'default' => __('custom', 'avril-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
		) 
	);

	$wp_customize->add_control(
	'footer_bottom_1' , 
		array(
			'label'          => __( 'Section 1', 'avril-pro' ),
			'section'        => 'footer_copy_Section',
			'settings'   	 => 'footer_bottom_1',
			'priority'      => 3,
			'type'           => 'select',
			'choices'        => 
			array(
				'none'       => __( 'None', 'avril-pro' ),
				'custom' => __( 'Text / Html', 'avril-pro' ),
				'widget' => __( 'Widget', 'avril-pro' ),
				'menu'   => __( 'Footer Menu', 'avril-pro' )
			) 
		) 
	);
	
	
	// footer first text // 
	$avril_footer_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'avril-pro' );
	$wp_customize->add_setting(
    	'footer_first_custom',
    	array(
			'default' => $avril_footer_copyright,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
		)
	);	

	$wp_customize->add_control( 
		'footer_first_custom',
		array(
		    'label'   		=> __('Section 1 Custom Text','avril-pro'),
		    'section'		=> 'footer_copy_Section',
			'type' 			=> 'textarea',
			'priority'      => 4,
			'transport'         => $selective_refresh,
		)  
	);	
	
	$wp_customize->add_setting( 
		'footer_bottom_2' , 
			array(
			'default' => __('none', 'avril-pro' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
		) 
	);

	$wp_customize->add_control(
	'footer_bottom_2' , 
		array(
			'label'          => __( 'Section 2', 'avril-pro' ),
			'section'        => 'footer_copy_Section',
			'settings'   	 => 'footer_bottom_2',
			'priority'      => 5,
			'type'           => 'select',
			'choices'        => 
			array(
				'none'       => __( 'None', 'avril-pro' ),
				'custom' => __( 'Text / Html', 'avril-pro' ),
				'widget' => __( 'Widget', 'avril-pro' ),
				'menu'   => __( 'Footer Menu', 'avril-pro' )
			) 
		) 
	);
	
	// footer second text // 
	$wp_customize->add_setting(
    	'footer_second_custom',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'footer_second_custom',
		array(
		    'label'   		=> __('Section 2 Custom Text','avril-pro'),
		    'section'		=> 'footer_copy_Section',
			'type' 			=> 'textarea',
			'priority'      => 6,
		)  
	);	

	// Footer Widget // 
	$wp_customize->add_section(
        'footer_widget',
        array(
            'title' 		=> __('Footer Widget Area','avril-pro'),
			'panel'  		=> 'footer_section',
			'priority'      => 3,
		)
    );
	
	// Widget Layout
	$wp_customize->add_setting(
		'footer_widget_display'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_widget_display',
		array(
			'type' => 'hidden',
			'label' => __('Widget Layout','avril-pro'),
			'section' => 'footer_widget',
			'priority'  => 1,
		)
	);
	
	if ( class_exists( 'Avril_Customize_Control_Radio_Image' ) ) {

		$wp_customize->add_setting(
			'footer_widget_layout', array(
				'sanitize_callback' => 'avril_sanitize_text',
				'default' => '4',
			)
		);

		$wp_customize->add_control(
			new Avril_Customize_Control_Radio_Image(
				$wp_customize, 'footer_widget_layout', array(
					'label'     => esc_html__( 'Widget Layout', 'avril-pro' ),
					'section'   => 'footer_widget',
					'priority'  => 2,
					'choices'   => array(
						'disable' => array(
							'url' => apply_filters( 'disable', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/none.svg' ),
						),
						'1' => array(
							'url' => apply_filters( '1', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/widget-1.svg' ),
						),
						'2' => array(
							'url' => apply_filters( '2', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/widget-2.svg' ),
						),
						'3' => array(
							'url' => apply_filters( '3', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/widget-3.svg' ),
						),
						'4' => array(
							'url' => apply_filters( '4', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/widget-4.svg' ),
						),
					),
				)
			)
		);
	}
}
add_action( 'customize_register', 'avril_footer' );
// Footer selective refresh
function avril_footer_partials( $wp_customize ){

	// hide show Social
	$wp_customize->selective_refresh->add_partial(
		'hs_above_footer', array(
			'selector' => '#footer-section .footer-above',
			'container_inclusive' => true,
			'render_callback' => 'footer_above',
			'fallback_refresh' => true,
		)
	);
	
	// hs_footer_copy
	$wp_customize->selective_refresh->add_partial(
		'hs_footer_copy', array(
			'selector' => '#footer-section .footer-copyright .widget-left .copyright-text',
			'container_inclusive' => true,
			'render_callback' => 'footer_bottom',
			'fallback_refresh' => true,
		)
	);
	
	// hs_footer_menu
	$wp_customize->selective_refresh->add_partial(
		'hs_footer_menu', array(
			'selector' => '#footer-section .footer-copyright .widget-right .widget',
			'container_inclusive' => true,
			'render_callback' => 'footer_bottom',
			'fallback_refresh' => true,
		)
	);
	// copyright_content
	$wp_customize->selective_refresh->add_partial( 'copyright_content', array(
		'selector'            => '#footer-section .footer-copyright .widget-left .copyright-text',
		'settings'            => 'copyright_content',
		'render_callback'  => 'avril_copyright_render_callback',
	
	) );
	}

add_action( 'customize_register', 'avril_footer_partials' );

// copyright_content
function avril_copyright_render_callback() {
	return get_theme_mod( 'copyright_content' );
}