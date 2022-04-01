<?php
function avril_cta_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	CTA  Section
	=========================================*/
	$wp_customize->add_section(
		'cta_setting', array(
			'title' => esc_html__( 'Call to Action Section', 'avril-pro' ),
			'priority' => 12,
			'panel' => 'avril_frontpage_sections',
		)
	);
	
	// CTA Content Section // 
	$wp_customize->add_setting(
		'cta_contents'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'cta_contents',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'cta_setting',
		)
	);
	
	// CTA Type // 
	$wp_customize->add_setting(
    	'cta_type',
    	array(
	        'default'			=> 'style-1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 3,
		)
	);	

	$wp_customize->add_control(
		'cta_type',
		array(
		    'label'   		=> __('Type','avril-pro'),
		    'section' 		=> 'cta_setting',
			'type'			=> 'select',
			'choices'        => 
			array(
				'style-1' => __( 'Style 1', 'avril-pro' ),
				'style-2' => __( 'Style 2', 'avril-pro' ),
			) 
		) 
	);
	
	// CTA Title // 
	$wp_customize->add_setting(
    	'cta_title',
    	array(
	        'default'			=> __('We work in partnership with all the major <span class="primary-color"><em>technology</em></span> solutions','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	// CTA Description // 
	$wp_customize->add_setting(
    	'cta_description',
    	array(
	        'default'			=> __('There are many variations of passages of lorem Ipsum available, but the majority','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_description',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'cta_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Button First //  
	$wp_customize->add_setting(
		'cta_btn_first'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'cta_btn_first',
		array(
			'type' => 'hidden',
			'label' => __('Button First','avril-pro'),
			'section' => 'cta_setting',
		)
	);
	
	$wp_customize->add_setting(
    	'cta_btn_lbl1',
    	array(
	        'default'			=> __('Purchase Now','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 8,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_btn_lbl1',
		array(
		    'label'   => __('Button Label','avril-pro'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'cta_btn_link1',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',
			'priority' => 9,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_btn_link1',
		array(
		    'label'   => __('Link','avril-pro'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	// Button Second //  
	$wp_customize->add_setting(
		'cta_btn_second'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 10,
		)
	);

	$wp_customize->add_control(
	'cta_btn_second',
		array(
			'type' => 'hidden',
			'label' => __('Button Second','avril-pro'),
			'section' => 'cta_setting',
		)
	);
	
	$wp_customize->add_setting(
    	'cta_btn_lbl2',
    	array(
	        'default'			=> __('Learn More','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 11,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_btn_lbl2',
		array(
		    'label'   => __('Label','avril-pro'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'cta_btn_link2',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',
			'priority' => 12,
		)
	);	
	
	$wp_customize->add_control( 
		'cta_btn_link2',
		array(
		    'label'   => __('Link','avril-pro'),
		    'section' => 'cta_setting',
			'type'           => 'text',
		)  
	);
	
	// CTA Background // 	
	$wp_customize->add_setting(
		'cta_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 13,
		)
	);

	$wp_customize->add_control(
	'cta_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','avril-pro'),
			'section' => 'cta_setting',
		)
	);
	
    $wp_customize->add_setting( 
    	'cta_bg_setting' , 
    	array(
			'default' 			=> get_template_directory_uri() . '/assets/images/bg/cta-bg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',	
			'priority' => 14,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'cta_bg_setting' ,
		array(
			'label'          => __( 'Background Image', 'avril-pro' ),
			'section'        => 'cta_setting',
		) 
	));

	$wp_customize->add_setting( 
		'cta_bg_position' , 
			array(
			'default' => 'fixed',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 15,
		) 
	);
	
	$wp_customize->add_control(
		'cta_bg_position' , 
			array(
				'label'          => __( 'Image Position', 'avril-pro' ),
				'section'        => 'cta_setting',
				'type'           => 'radio',
				'choices'        => 
				array(
					'fixed'=> __( 'Fixed', 'avril-pro' ),
					'scroll' => __( 'Scroll', 'avril-pro' )
			)  
		) 
	);

}

add_action( 'customize_register', 'avril_cta_setting' );

// CTA selective refresh
function avril_ata_section_partials( $wp_customize ){
	
	// cta_title
	$wp_customize->selective_refresh->add_partial( 'cta_title', array(
		'selector'            => '.home-cta .cta-content h4',
		'settings'            => 'cta_title',
		'render_callback'  => 'avril_cta_title_render_callback',
	
	) );
	
	// cta_description
	$wp_customize->selective_refresh->add_partial( 'cta_description', array(
		'selector'            => '.home-cta .cta-content p',
		'settings'            => 'cta_description',
		'render_callback'  => 'avril_cta_description_render_callback',
	) );
	
	// cta_btn_lbl1
	$wp_customize->selective_refresh->add_partial( 'cta_btn_lbl1', array(
		'selector'            => '.home-cta  a.av-btn-primary',
		'settings'            => 'cta_btn_lbl1',
		'render_callback'  => 'avril_cta_btn_lbl1_render_callback',
	) );
	// cta_btn_lbl2
	$wp_customize->selective_refresh->add_partial( 'cta_btn_lbl2', array(
		'selector'            => '.home-cta .cta-learn-more a',
		'settings'            => 'cta_btn_lbl2',
		'render_callback'  => 'avril_cta_btn_lbl2_render_callback',
	) );
	}

add_action( 'customize_register', 'avril_ata_section_partials' );

// cta_title
function avril_cta_title_render_callback() {
	return get_theme_mod( 'cta_title' );
}


// cta_description
function avril_cta_description_render_callback() {
	return get_theme_mod( 'cta_description' );
}

// cta_btn_lbl1
function avril_cta_btn_lbl1_render_callback() {
	return get_theme_mod( 'cta_btn_lbl1' );
}

// cta_btn_lbl2
function avril_cta_btn_lbl2_render_callback() {
	return get_theme_mod( 'cta_btn_lbl2' );
}