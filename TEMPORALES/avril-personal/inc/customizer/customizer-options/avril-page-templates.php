<?php
function avril_pages_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Avril Page Templates
	=========================================*/
	$wp_customize->add_panel(
		'avril_page_templates', array(
			'priority' => 33,
			'title' => esc_html__( 'Page Templates', 'avril-pro' ),
		)
	);
	
	
	/*=========================================
	About Page
	=========================================*/
	$wp_customize->add_section(
		'about_pg_Settings', array(
			'title' => esc_html__( 'About Page', 'avril-pro' ),
			'priority' => 1,
			'panel' => 'avril_page_templates',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'about_pg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'about_pg_head',
		array(
			'type' => 'hidden',
			'label' => __('About Contents','avril-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	// About Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_about' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	// hs_pg_about
	$wp_customize->selective_refresh->add_partial(
		'hs_pg_about', array(
			'selector' => '#about-section',
			'container_inclusive' => true,
			'render_callback' => 'about_pg_Settings',
			'fallback_refresh' => true,
		)
	);

	//  Image // 
    $wp_customize->add_setting( 
    	'pg_about_img' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/about/img01.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',	
			'priority' => 3,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'pg_about_img' ,
		array(
			'label'          => esc_html__( 'Image', 'avril-pro'),
			'section'        => 'about_pg_Settings',
		) 
	));
	// About Title // 
	$wp_customize->add_setting(
    	'pg_about_title',
    	array(
	        'default'			=> __('We are Ready to Take you One Step Forward','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// About Description // 
	$wp_customize->add_setting(
    	'pg_about_desc',
    	array(
	        'default'			=> __('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour or at randomised words which don"t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn"t anything embarrassing hidden in the middle of text.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_desc',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	$wp_customize->add_setting(
    	'pg_about_btn_lbl1',
    	array(
	        'default'			=> __('Our Services','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_btn_lbl1',
		array(
		    'label'   => __('Button Label First','avril-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'pg_about_btn_link1',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',
			'priority' => 7,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_btn_link1',
		array(
		    'label'   => __('Button Link First','avril-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// Button Second //  
	$wp_customize->add_setting(
    	'pg_about_btn_lbl2',
    	array(
	        'default'			=> __('Read More','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 8,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_btn_lbl2',
		array(
		    'label'   => __('Button Label Second','avril-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'pg_about_btn_link2',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',
			'priority' => 9,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_btn_link2',
		array(
		    'label'   => __('Button Link Second','avril-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// Button Third //  
	$wp_customize->add_setting(
    	'pg_about_btn_lbl3',
    	array(
	        'default'			=> __('Watch Video','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 10,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_btn_lbl3',
		array(
		    'label'   => __('Button Label Third','avril-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'pg_about_btn_link3',
    	array(
			'default'			=> __('https://www.youtube.com/watch?v=XF7b_MNEIAg','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',
			'priority' => 11,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_about_btn_link3',
		array(
		    'label'   => __('Button Link Third','avril-pro'),
		    'section' => 'about_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	/*=========================================
	Features
	=========================================*/
	// Settings
	$wp_customize->add_setting(
		'about_feature_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 12,
		)
	);

	$wp_customize->add_control(
	'about_feature_head',
		array(
			'type' => 'hidden',
			'label' => __('Features','avril-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	// About Feature Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_about_feature' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 13,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_feature', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	
	/*=========================================
	Team
	=========================================*/
	// Settings
	$wp_customize->add_setting(
		'about_team_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 14,
		)
	);

	$wp_customize->add_control(
	'about_team_head',
		array(
			'type' => 'hidden',
			'label' => __('Team','avril-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	// About Team Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_about_team' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 15,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_team', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	Funfact
	=========================================*/
	// Settings
	$wp_customize->add_setting(
		'about_funfact_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 16,
		)
	);

	$wp_customize->add_control(
	'about_funfact_head',
		array(
			'type' => 'hidden',
			'label' => __('Funfact','avril-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	// About Funfact Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_about_fun' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 17,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_fun', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	Skill
	=========================================*/
	// Settings
	$wp_customize->add_setting(
		'about_skill_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 18,
		)
	);

	$wp_customize->add_control(
	'about_skill_head',
		array(
			'type' => 'hidden',
			'label' => __('Skills','avril-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	// About Skill Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_about_skill' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 19,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_skill', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	CTA
	=========================================*/
	// Settings
	$wp_customize->add_setting(
		'about_cta_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 20,
		)
	);

	$wp_customize->add_control(
	'about_cta_head',
		array(
			'type' => 'hidden',
			'label' => __('Call to Action','avril-pro'),
			'section' => 'about_pg_Settings',
		)
	);
	
	// About CTA Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_about_cta' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 21,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_about_cta', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'about_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	// CTA Type // 
	$wp_customize->add_setting(
    	'about_cta_type',
    	array(
	        'default'			=> 'style-2',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 22,
		)
	);	

	$wp_customize->add_control(
		'about_cta_type',
		array(
		    'label'   		=> __('Type','avril-pro'),
		    'section' 		=> 'about_pg_Settings',
			'type'			=> 'select',
			'choices'        => 
			array(
				'style-1' => __( 'Style 1', 'avril-pro' ),
				'style-2' => __( 'Style 2', 'avril-pro' ),
			) 
		) 
	);
	
	/*=========================================
	Pricing Page
	=========================================*/
	$wp_customize->add_section(
		'pricing_pg_Settings', array(
			'title' => esc_html__( 'Pricing Page', 'avril-pro' ),
			'priority' => 1,
			'panel' => 'avril_page_templates',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'price_pg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'price_pg_head',
		array(
			'type' => 'hidden',
			'label' => __('Pricing','avril-pro'),
			'section' => 'pricing_pg_Settings',
		)
	);
	
	// Pricing Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_pricing' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_pricing', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'pricing_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	// Pricing Title // 
	$wp_customize->add_setting(
    	'pg_pricing_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_pricing_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'pricing_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// Pricing Subtitle // 
	$wp_customize->add_setting(
    	'pg_pricing_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Pricing</b>                                   <b>Pricing</b><b>Pricing</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_pricing_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'pricing_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	// Pricing Description // 
	$wp_customize->add_setting(
    	'pg_pricing_desc',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_pricing_desc',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'pricing_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'pg_pricing_display_num',
			array(
				'default' => '3',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'priority' => 6,
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'pg_pricing_display_num', 
			array(
				'label'      => __( 'No. of Pricing Display', 'avril-pro' ),
				'section'  => 'pricing_pg_Settings',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 1,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 3,
						),
					),
			) ) 
		);
	}
	
	// CTA Logo
	$wp_customize->add_setting(
		'cta_logo_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'cta_logo_head',
		array(
			'type' => 'hidden',
			'label' => __('CTA With Logo','avril-pro'),
			'section' => 'pricing_pg_Settings',
		)
	);
	
	// CTA Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_cta_logo' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 8,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_cta_logo', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'pricing_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	//  Image // 
    $wp_customize->add_setting( 
    	'pg_cta_logo_img' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/bg/badge.png',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',	
			'priority' => 9,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'pg_cta_logo_img' ,
		array(
			'label'          => esc_html__( 'Image', 'avril-pro'),
			'section'        => 'pricing_pg_Settings',
		) 
	));
	
	// Title // 
	$wp_customize->add_setting(
    	'pg_pricing_cta_lg_ttl',
    	array(
	        'default'			=> __('100% No-Risk Money Back Guarantee!','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 10,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_pricing_cta_lg_ttl',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'pricing_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// Description // 
	$wp_customize->add_setting(
    	'pg_pricing_cta_lg_desc',
    	array(
	        'default'			=> __('You are fully protected by our 100% No-Risk-Double-Guarantee. If you don’t like Soliloquy over the next 15 days, then we will happily refund 100% of your money. No questions asked.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 11,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_pricing_cta_lg_desc',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'pricing_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	// FAQ
	$wp_customize->add_setting(
		'faq_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 15,
		)
	);

	$wp_customize->add_control(
	'faq_head',
		array(
			'type' => 'hidden',
			'label' => __('FAQ Section','avril-pro'),
			'section' => 'pricing_pg_Settings',
		)
	);
	
	// FAQ Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_pricing_faq' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 16,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_pricing_faq', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'pricing_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	// Title // 
	$wp_customize->add_setting(
    	'pg_pricing_faq_ttl',
    	array(
	        'default'			=> __('Frequently Asked Questions <span class="primary-color">(FAQ)</span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 17,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_pricing_faq_ttl',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'pricing_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	/**
	 * Customizer Repeater for add FAQ
	 */
	
		$wp_customize->add_setting( 'pg_pricing_faq_content', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'priority' => 18,
			'default' => avril_get_faq_default()
			)
		);
		
		$wp_customize->add_control( 
			new Avril_Repeater( $wp_customize, 
				'pg_pricing_faq_content', 
					array(
						'label'   => esc_html__('FAQ','avril-pro'),
						'section' => 'pricing_pg_Settings',
						'add_field_label'                   => esc_html__( 'Add New', 'avril-pro' ),
						'item_name'                         => esc_html__( 'FAQ', 'avril-pro' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
	/*=========================================
	CTA
	=========================================*/
	// Settings
	$wp_customize->add_setting(
		'pricing_cta_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 20,
		)
	);

	$wp_customize->add_control(
	'pricing_cta_head',
		array(
			'type' => 'hidden',
			'label' => __('Call to Action','avril-pro'),
			'section' => 'pricing_pg_Settings',
		)
	);
	
	// About CTA Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_pricing_cta' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 21,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_pricing_cta', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'pricing_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	// CTA Type // 
	$wp_customize->add_setting(
    	'pricing_cta_type',
    	array(
	        'default'			=> 'style-2',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 22,
		)
	);	

	$wp_customize->add_control(
		'pricing_cta_type',
		array(
		    'label'   		=> __('Type','avril-pro'),
		    'section' 		=> 'pricing_pg_Settings',
			'type'			=> 'select',
			'choices'        => 
			array(
				'style-1' => __( 'Style 1', 'avril-pro' ),
				'style-2' => __( 'Style 2', 'avril-pro' ),
			) 
		) 
	);		
	
	/*=========================================
	Service Page
	=========================================*/
	$wp_customize->add_section(
		'pg_service_setting', array(
			'title' => esc_html__( 'Service Page', 'avril-pro' ),
			'priority' => 3,
			'panel' => 'avril_page_templates',
		)
	);

	// Service Header Section // 
	$wp_customize->add_setting(
		'pg_service_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'pg_service_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'pg_service_setting',
		)
	);
	
	// Service Title // 
	$wp_customize->add_setting(
    	'pg_service_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_service_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'pg_service_setting',
			'type'           => 'text',
		)  
	);
	
	// Service Subtitle // 
	$wp_customize->add_setting(
    	'pg_service_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Services</b>                                   <b>Services</b><b>Services</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_service_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'pg_service_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Service Description // 
	$wp_customize->add_setting(
    	'pg_service_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_service_description',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'pg_service_setting',
			'type'           => 'textarea',
		)  
	);

	// Service content Section // 
	
	$wp_customize->add_setting(
		'pg_service_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'pg_service_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'pg_service_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add service
	 */
	
		$wp_customize->add_setting( 'pg_service_contents', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => avril_get_pg_service_default()
			)
		);
		
		$wp_customize->add_control( 
			new Avril_Repeater( $wp_customize, 
				'pg_service_contents', 
					array(
						'label'   => esc_html__('Service','avril-pro'),
						'section' => 'pg_service_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'avril-pro' ),
						'item_name'                         => esc_html__( 'Service', 'avril-pro' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
	// Service column // 
	$wp_customize->add_setting(
    	'page_Service_column',
    	array(
	        'default'			=> '4',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 9,
		)
	);	

	$wp_customize->add_control(
		'page_Service_column',
		array(
		    'label'   		=> __('Service Column','avril-pro'),
		    'section' 		=> 'pg_service_setting',
			'type'			=> 'select',
			'choices'        => 
			array(
				'6' => __( '2 column', 'avril-pro' ),
				'4' => __( '3 column', 'avril-pro' ),
				'3' => __( '4 column', 'avril-pro' ),
			) 
		) 
	);	
			
	/*=========================================
	Gallery  Page
	=========================================*/
	$wp_customize->add_section(
		'pg_gallery_setting', array(
			'title' => esc_html__( 'Gallery Page', 'avril-pro' ),
			'priority' => 4,
			'panel' => 'avril_page_templates',
		)
	);
	
	// Gallery Header Section // 
	$wp_customize->add_setting(
		'pg_gallery_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'pg_gallery_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'pg_gallery_setting',
		)
	);
	
	// Gallery Title // 
	$wp_customize->add_setting(
    	'pg_gallery_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_gallery_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'pg_gallery_setting',
			'type'           => 'text',
		)  
	);
	
	// Gallery Subtitle // 
	$wp_customize->add_setting(
    	'pg_gallery_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Gallery</b>                                   <b>Gallery</b><b>Gallery</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_gallery_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'pg_gallery_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Gallery Description // 
	$wp_customize->add_setting(
    	'pg_gallery_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_gallery_description',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'pg_gallery_setting',
			'type'           => 'textarea',
		)  
	);

	// Gallery content Section // 
	
	$wp_customize->add_setting(
		'pg_gallery_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'pg_gallery_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'pg_gallery_setting',
		)
	);
	/**
	 * Customizer Repeater for add Gallery
	 */
	
		$wp_customize->add_setting( 'pg_gallery', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => avril_get_pg_gallery_default()
			)
		);
		
		$wp_customize->add_control( 
			new Avril_Repeater( $wp_customize, 
				'pg_gallery', 
					array(
						'label'   => esc_html__('Gallery','avril-pro'),
						'section' => 'pg_gallery_setting',
						'add_field_label'                   => esc_html__( 'Add New', 'avril-pro' ),
						'item_name'                         => esc_html__( 'Gallery', 'avril-pro' ),
						'customizer_repeater_image_control' => true,
					) 
				) 
			);
	// Load More Button // 
	$wp_customize->add_setting(
    	'pg_gallery_btn',
    	array(
	        'default'			=> __('Load More','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 8,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_gallery_btn',
		array(
		    'label'   => __('Button','avril-pro'),
		    'section' => 'pg_gallery_setting',
			'type'           => 'text',
		)  
	);
	
	// Team column // 
	$wp_customize->add_setting(
    	'pg_gallery_column',
    	array(
	        'default'			=> '3',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_select',
			'priority' => 9,
		)
	);	

	$wp_customize->add_control(
		'pg_gallery_column',
		array(
		    'label'   		=> __('Gallery Column','avril-pro'),
		    'section' 		=> 'pg_gallery_setting',
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

	/*=========================================
	Contact Page
	=========================================*/
	$wp_customize->add_section(
		'contact_pg_Settings', array(
			'title' => esc_html__( 'Contact Page', 'avril-pro' ),
			'priority' => 5,
			'panel' => 'avril_page_templates',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'contact_pg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'contact_pg_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'contact_pg_Settings',
		)
	);	
	
	// Contact Title // 
	$wp_customize->add_setting(
    	'pg_contact_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 2,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_contact_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// Contact Subtitle // 
	$wp_customize->add_setting(
    	'pg_contact_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Contact</b>                                   <b>Contact</b><b>Contact</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_contact_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	// Contact Description // 
	$wp_customize->add_setting(
    	'pg_contact_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_contact_description',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	/*=========================================
	Contact Info
	=========================================*/
	$wp_customize->add_setting(
		'contact_pg_info_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'contact_pg_info_head',
		array(
			'type' => 'hidden',
			'label' => __('Info','avril-pro'),
			'section' => 'contact_pg_Settings',
		)
	);	
	
	$wp_customize->add_setting( 
		'hs_ct_info' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 8,
		) 
	);
	
	$wp_customize->add_control(
	'hs_ct_info', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril-pro' ),
			'section'     => 'contact_pg_Settings',
			'type'        => 'checkbox'
		) 
	);	
	// Info First // 
	$wp_customize->add_setting(
    	'ct_info_icon1',
    	array(
	        'default' => 'fa-envelope',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 9,
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'ct_info_icon1',
		array(
		    'label'   		=> __('First Icon','avril-pro'),
		    'section' 		=> 'contact_pg_Settings',
			'iconset' => 'fa',
			
		))  
	);
	
	// ct_info_ttl1 // 
	$wp_customize->add_setting(
    	'ct_info_ttl1',
    	array(
	        'default'			=> __('Send Your Query:','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 10,
		)
	);	
	
	$wp_customize->add_control( 
		'ct_info_ttl1',
		array(
		    'label'   => __('First Title','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// ct_info_desc1 // 
	$wp_customize->add_setting(
    	'ct_info_desc1',
    	array(
	        'default'			=> __('email@company.com','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 11,
		)
	);	
	
	$wp_customize->add_control( 
		'ct_info_desc1',
		array(
		    'label'   => __('First Description','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	// Info Second // 
	$wp_customize->add_setting(
    	'ct_info_icon2',
    	array(
	        'default' => 'fa-support',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 12,
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'ct_info_icon2',
		array(
		    'label'   		=> __('Second Icon','avril-pro'),
		    'section' 		=> 'contact_pg_Settings',
			'iconset' => 'fa',
			
		))  
	);
	
	// ct_info_ttl2 // 
	$wp_customize->add_setting(
    	'ct_info_ttl2',
    	array(
	        'default'			=> __('Priority Support:','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 13,
		)
	);	
	
	$wp_customize->add_control( 
		'ct_info_ttl2',
		array(
		    'label'   => __('Second Title','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// ct_info_desc2 // 
	$wp_customize->add_setting(
    	'ct_info_desc2',
    	array(
	        'default'			=> __('+1-202-333-3232<br>+2-302-444-2323','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 14,
		)
	);	
	
	$wp_customize->add_control( 
		'ct_info_desc2',
		array(
		    'label'   => __('Second Description','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	
	// Info Third // 
	$wp_customize->add_setting(
    	'ct_info_icon3',
    	array(
	        'default' => 'fa-location-arrow',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 15,
		)
	);	

	$wp_customize->add_control(new Avril_Icon_Picker_Control($wp_customize, 
		'ct_info_icon3',
		array(
		    'label'   		=> __('Third Icon','avril-pro'),
		    'section' 		=> 'contact_pg_Settings',
			'iconset' => 'fa',
			
		))  
	);
	
	// ct_info_ttl3 // 
	$wp_customize->add_setting(
    	'ct_info_ttl3',
    	array(
	        'default'			=> __('Office Address:','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 16,
		)
	);	
	
	$wp_customize->add_control( 
		'ct_info_ttl3',
		array(
		    'label'   => __('Third Title','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// ct_info_desc3 // 
	$wp_customize->add_setting(
    	'ct_info_desc3',
    	array(
	        'default'			=> __('568, Jb Road , EA Malbar Beach, 4005600','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 17,
		)
	);	
	
	$wp_customize->add_control( 
		'ct_info_desc3',
		array(
		    'label'   => __('Third Description','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	/*=========================================
	Contact Form
	=========================================*/
	$wp_customize->add_setting(
		'contact_pg_frm_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 18,
		)
	);

	$wp_customize->add_control(
	'contact_pg_frm_head',
		array(
			'type' => 'hidden',
			'label' => __('Contact Form','avril-pro'),
			'section' => 'contact_pg_Settings',
		)
	);	
	
	$wp_customize->add_setting( 
		'hs_ct_form' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 19,
		) 
	);
	
	$wp_customize->add_control(
	'hs_ct_form', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril-pro' ),
			'section'     => 'contact_pg_Settings',
			'type'        => 'checkbox'
		) 
	);	
	
	// ct_form_ttl // 
	$wp_customize->add_setting(
    	'ct_form_ttl',
    	array(
	        'default'			=> __('Send Your Enquiry','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 20,
		)
	);	
	
	$wp_customize->add_control( 
		'ct_form_ttl',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// ct_form_shortcode // 
	$wp_customize->add_setting(
    	'ct_form_shortcode',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 21,
		)
	);	
	
	$wp_customize->add_control( 
		'ct_form_shortcode',
		array(
		    'label'   => __('Shortcode','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	/*=========================================
	Opening Hour
	=========================================*/
	$wp_customize->add_setting(
		'contact_pg_op_hr_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 21,
		)
	);

	$wp_customize->add_control(
	'contact_pg_op_hr_head',
		array(
			'type' => 'hidden',
			'label' => __('Opening Hours','avril-pro'),
			'section' => 'contact_pg_Settings',
		)
	);	
	
	$wp_customize->add_setting( 
		'hs_pg_opening_hour' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'priority' => 22,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_opening_hour', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'avril-pro' ),
			'section'     => 'contact_pg_Settings',
			'type'        => 'checkbox'
		) 
	);	
	
	// opening_hour_ttl // 
	$wp_customize->add_setting(
    	'opening_hour_ttl',
    	array(
	        'default'			=> __('Opening Hours','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 23,
		)
	);	
	
	$wp_customize->add_control( 
		'opening_hour_ttl',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'text',
		)  
	);
	
	// opening_hour_desc // 
	$wp_customize->add_setting(
    	'opening_hour_desc',
    	array(
	        'default'			=> __('Lorem ipsum dolor sit amet, consectetur ac elit tempor incididunt labor','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 24,
		)
	);	
	
	$wp_customize->add_control( 
		'opening_hour_desc',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'type'           => 'textarea',
		)  
	);
	
	if ( class_exists( 'Avril_Page_Editor' ) ) {
		$frontpage_id = get_option( 'page_on_front' );
		$default = '';
		if ( ! empty( $frontpage_id ) ) {
			$default = get_post_field( 'post_content', $frontpage_id );
		}
		$wp_customize->add_setting(
			'pg_opening_content', array(
				'default' => __('<dl class="av-grid-dl"><dt>Monday:</dt><dd>9:00 - 19:00</dd>
                            <dt>Tuesday:</dt><dd>9:00 - 19:00</dd><dt>Wednesday:</dt><dd>9:00 - 19:00</dd><dt>Thursday:</dt><dd>9:00 - 19:00</dd><dt>Friday:</dt>
                            <dd>9:00 - 19:00</dd><dt>Saturday:</dt><dd>11:00 - 19:00</dd><dt>Sunday:</dt><dd>Closed</dd></dl>','avril-pro'),
				'sanitize_callback' => 'wp_kses_post',
				'priority' => 25,
				
			)
		);

		$wp_customize->add_control(
			new Avril_Page_Editor(
				$wp_customize, 'pg_opening_content', array(
					'label' => esc_html__( 'Content', 'avril-pro' ),
					'section' => 'contact_pg_Settings',
					'needsync' => true,
				)
			)
		);
	}
	$default = '';
	
	//  Image // 
    $wp_customize->add_setting( 
    	'opening_hour_bg_img' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/bg/contact-bg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',	
			'priority' => 26,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'opening_hour_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'avril-pro'),
			'section'        => 'contact_pg_Settings',
		) 
	));
	
	/*=========================================
	CTA
	=========================================*/
	// Settings
	$wp_customize->add_setting(
		'contact_cta_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 27,
		)
	);

	$wp_customize->add_control(
	'contact_cta_head',
		array(
			'type' => 'hidden',
			'label' => __('Call to Action','avril-pro'),
			'section' => 'contact_pg_Settings',
		)
	);
	
	// Contact CTA Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_contact_cta' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 28,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_contact_cta', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'contact_pg_Settings',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	Map
	=========================================*/
	// Settings
	$wp_customize->add_setting(
		'contact_map_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 30,
		)
	);

	$wp_customize->add_control(
	'contact_map_head',
		array(
			'type' => 'hidden',
			'label' => __('Map','avril-pro'),
			'section' => 'contact_pg_Settings',
		)
	);
	
	// Contact Map Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_pg_contact_map' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 31,
		) 
	);
	
	$wp_customize->add_control(
	'hs_pg_contact_map', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'avril-pro' ),
			'section'     => 'contact_pg_Settings',
			'type'        => 'checkbox'
		) 
	);
	
	$wp_customize->add_setting(
    	'contact_page_map_lattitude',
    	array(
	        'default'			=> '40.6700',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 32,
		)
	);
	
	$wp_customize->add_control( 
		'contact_page_map_lattitude',
		array(
		    'label'   => __('Latitude','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'settings'=> 'contact_page_map_lattitude',
			'type' => 'text',
		)  
	);
	
	$wp_customize->add_setting(
    	'contact_page_map_longitude',
    	array(
	        'default'			=> '-73.9400',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
		)
	);
	
	$wp_customize->add_control( 
		'contact_page_map_longitude',
		array(
		    'label'   => __('Longitude','avril-pro'),
		    'section' => 'contact_pg_Settings',
			'settings'=> 'contact_page_map_longitude',
			'type' => 'text',
		)  
	);
	
	/*=========================================
	Porfolio  Page
	=========================================*/
	$wp_customize->add_section(
		'pg_portfolio_setting', array(
			'title' => esc_html__( 'Porfolio Page', 'avril-pro' ),
			'priority' => 6,
			'panel' => 'avril_page_templates',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'pg_portfolio_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'pg_portfolio_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','avril-pro'),
			'section' => 'pg_portfolio_setting',
		)
	);
	
	// portfolio Tab Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'pg_hs_portfolio_tab' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'pg_hs_portfolio_tab', 
		array(
			'label'	      => esc_html__( 'Hide / Show Tab', 'avril-pro' ),
			'section'     => 'pg_portfolio_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Portfolio Header Section // 
	$wp_customize->add_setting(
		'pg_portfolio_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'pg_portfolio_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'pg_portfolio_setting',
		)
	);
	
	// Porfolio Title // 
	$wp_customize->add_setting(
    	'pg_Porfolio_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_Porfolio_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'pg_portfolio_setting',
			'type'           => 'text',
		)  
	);
	
	// Portfolio Subtitle // 
	$wp_customize->add_setting(
    	'pg_porfolio_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Porfolio</b>                                   <b>Porfolio</b><b>Porfolio</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_porfolio_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'pg_portfolio_setting',
			'type'           => 'textarea',
		)  
	);
	
	// porfolio Description // 
	$wp_customize->add_setting(
    	'pg_porfolio_desc',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_porfolio_desc',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'pg_portfolio_setting',
			'type'           => 'textarea',
		)  
	);

	// porfolio content Section // 
	
	$wp_customize->add_setting(
		'pg_porfolio_contents_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'pg_porfolio_contents_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','avril-pro'),
			'section' => 'pg_portfolio_setting',
		)
	);
	
	if ( class_exists( 'Avril_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'pg_portfolio_display_num',
			array(
				'default' => '10',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'avril_sanitize_range_value',
				'priority' => 8,
			)
		);
		$wp_customize->add_control( 
		new Avril_Customizer_Range_Control( $wp_customize, 'pg_portfolio_display_num', 
			array(
				'label'      => __( 'No. of Portfolio Display', 'avril-pro' ),
				'section'  => 'pg_portfolio_setting',
				 'media_query'   => false,
					'input_attr'    => array(
						'desktop' => array(
							'min'           => 1,
							'max'           => 100,
							'step'          => 1,
							'default_value' => 10,
						),
					),
			) ) 
		);
	}
	
	/*=========================================
	Blog Page
	=========================================*/
	$wp_customize->add_section(
		'pg_blog_setting', array(
			'title' => esc_html__( 'Blog Page', 'avril-pro' ),
			'priority' => 7,
			'panel' => 'avril_page_templates',
		)
	);
	
	// Blog Header Section // 
	$wp_customize->add_setting(
		'pg_blog_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'pg_blog_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'pg_blog_setting',
		)
	);
	
	// Blog Title // 
	$wp_customize->add_setting(
    	'pg_blog_title',
    	array(
	        'default'			=> __('Technology from tomorrow','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_blog_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'pg_blog_setting',
			'type'           => 'text',
		)  
	);
	
	// Blog Subtitle // 
	$wp_customize->add_setting(
    	'pg_blog_subtitle',
    	array(
	        'default'			=> __('Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Blog</b>                                   <b>Blog</b><b>Blog</b></span></span>','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_blog_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'pg_blog_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Blog Description // 
	$wp_customize->add_setting(
    	'pg_blog_desc',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_blog_desc',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'pg_blog_setting',
			'type'           => 'textarea',
		)  
	);
	
	
	// Blog Header Section // 
	$wp_customize->add_setting(
		'pg_blog_sticky_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'pg_blog_sticky_headings',
		array(
			'type' => 'hidden',
			'label' => __('Blog Sticky','avril-pro'),
			'section' => 'pg_blog_setting',
		)
	);
	
	if ( class_exists( 'Avril_Customize_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'avril_sticky_type', array(
				'sanitize_callback' => 'avril_sanitize_select',
				'default' => 'avril_rsb',
				'priority'  => 8,
			)
		);

		$wp_customize->add_control(
			new Avril_Customize_Control_Radio_Image(
				$wp_customize, 'avril_sticky_type', array(
					'label'     => esc_html__( 'Default Page Layout', 'avril-pro' ),
					'section'   => 'pg_blog_setting',
					'choices'   => array(
						'square' => array(
							'url' => apply_filters( 'square', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/sticky-suare.png' )),
						),
						'circle' => array(
							'url' => apply_filters( 'circle', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/sticky-circle.png' )),
						),
					),
				)
			)
		);
	}
	
	$wp_customize->add_setting(
    	'sticky_content',
    	array(
	        'default'			=> '<i class="fa fa-thumb-tack"></i>',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority'  => 9
		)
	);
	
	$wp_customize->add_control( 
		'sticky_content',
		array(
		    'label'   => __('Sticky Content','avril-pro'),
		    'section' => 'pg_blog_setting',
			'type' => 'text',
		)  
	);
	
	// Sticky Bg Color
	$wp_customize->add_setting(
	'sticky_bg_color', 
	array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#1ed12f',
		'priority'  => 10
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'sticky_bg_color', 
			array(
				'label'      => __( 'Bg Color', 'avril-pro' ),
				'section'    => 'pg_blog_setting',
				'settings'   => 'sticky_bg_color',
			) 
		) 
	);	
	/*=========================================
	Blog Single Page
	=========================================*/
	$wp_customize->add_section(
		'pg_blog_single_setting', array(
			'title' => esc_html__( 'Blog Single Page', 'avril-pro' ),
			'priority' => 8,
			'panel' => 'avril_page_templates',
		)
	);
	
	// Blog Header Section // 
	$wp_customize->add_setting(
		'pg_blog_single_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'pg_blog_single_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','avril-pro'),
			'section' => 'pg_blog_single_setting',
		)
	);
	
	// Author Meta  Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'enable_author_box' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'enable_author_box', 
		array(
			'label'	      => esc_html__( 'Hide / Show Author Box', 'avril-pro' ),
			'section'     => 'pg_blog_single_setting',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	404  Page
	=========================================*/
	$wp_customize->add_section(
		'pg_404_setting', array(
			'title' => esc_html__( '404 Page', 'avril-pro' ),
			'priority' => 9,
			'panel' => 'avril_page_templates',
		)
	);
	
	// Title // 
	$wp_customize->add_setting(
    	'pg_404_title1',
    	array(
	        'default'			=> __('4','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 1,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_404_title1',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'pg_404_setting',
			'type'           => 'text',
		)  
	);
	
	//  Image // 
    $wp_customize->add_setting( 
    	'pg_404_img' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/bg/smile.svg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',	
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'pg_404_img' ,
		array(
			'label'          => esc_html__( 'Image', 'avril-pro'),
			'section'        => 'pg_404_setting',
		) 
	));
	
	// Title // 
	$wp_customize->add_setting(
    	'pg_404_title2',
    	array(
	        'default'			=> __('4','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_404_title2',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'pg_404_setting',
			'type'           => 'text',
		)  
	);
	
	// Subtitle // 
	$wp_customize->add_setting(
    	'pg_404_subtitle',
    	array(
	        'default'			=> __('OOPS! YOUR PAGE NOT FOUND...','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_404_subtitle',
		array(
		    'label'   => __('Subtitle','avril-pro'),
		    'section' => 'pg_404_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Button Label // 
	$wp_customize->add_setting(
    	'pg_404_btn_lbl',
    	array(
	        'default'			=> __('Go To Home','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_404_btn_lbl',
		array(
		    'label'   => __('Button Label','avril-pro'),
		    'section' => 'pg_404_setting',
			'type'           => 'text',
		)  
	);
	
		// Button Link // 
	$wp_customize->add_setting(
    	'pg_404_btn_link',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'pg_404_btn_link',
		array(
		    'label'   => __('Button Link','avril-pro'),
		    'section' => 'pg_404_setting',
			'type'           => 'text',
		)  
	);
	
	/*=========================================
	Comming Soon  Page
	=========================================*/
	$wp_customize->add_section(
		'comming_soon_setting', array(
			'title' => esc_html__( 'Comming Soon Page', 'avril-pro' ),
			'priority' => 10,
			'panel' => 'avril_page_templates',
		)
	);
	$wp_customize->add_setting(
		'comming_soon_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'comming_soon_settings',
		array(
			'type' => 'hidden',
			'label' => __('Setting','avril-pro'),
			'section' => 'comming_soon_setting',
		)
	);
	
	// Enable Comming Soon // 
	$wp_customize->add_setting( 
		'enable_comming_soon' , 
			array(
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'enable_comming_soon', 
		array(
			'label'	      => esc_html__( 'Enable Comming Soon', 'avril-pro' ),
			'section'     => 'comming_soon_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Enable Form // 
	$wp_customize->add_setting( 
		'enable_comming_soon_form' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'enable_comming_soon_form', 
		array(
			'label'	      => esc_html__( 'Enable Form', 'avril-pro' ),
			'section'     => 'comming_soon_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Enable Social Icon // 
	$wp_customize->add_setting( 
		'enable_comming_soon_social' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'avril_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'enable_comming_soon_social', 
		array(
			'label'	      => esc_html__( 'Enable Social Icon', 'avril-pro' ),
			'section'     => 'comming_soon_setting',
			'type'        => 'checkbox'
		) 
	);
	
	$wp_customize->add_setting(
		'comming_soon_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'comming_soon_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','avril-pro'),
			'section' => 'comming_soon_setting',
		)
	);
	
	//  Logo // 
    $wp_customize->add_setting( 
    	'comming_soon_logo' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/logo-2.svg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',	
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'comming_soon_logo' ,
		array(
			'label'          => esc_html__( 'Logo', 'avril-pro'),
			'section'        => 'comming_soon_setting',
		) 
	));
	
	// Title // 
	$wp_customize->add_setting(
    	'comming_soon_title',
    	array(
	        'default'			=> __('We Are Launching Soon','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'comming_soon_title',
		array(
		    'label'   => __('Title','avril-pro'),
		    'section' => 'comming_soon_setting',
			'type'           => 'text',
		)  
	);
	
	// Description // 
	$wp_customize->add_setting(
    	'comming_soon_desc',
    	array(
	        'default'			=> __('There are many variations of passages of Lorem Ipsum available action in some form by injected humour.','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 3,
		)
	);	
	
	$wp_customize->add_control( 
		'comming_soon_desc',
		array(
		    'label'   => __('Description','avril-pro'),
		    'section' => 'comming_soon_setting',
			'type'           => 'textarea',
		)  
	);
	
	$wp_customize->add_setting(
		'comming_soon_time_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'comming_soon_time_head',
		array(
			'type' => 'hidden',
			'label' => __('Time','avril-pro'),
			'section' => 'comming_soon_setting',
		)
	);
	
	// Comming Soon Time // 
	$wp_customize->add_setting(
    	'comming_soon_time',
    	array(
	        'default'			=> __('2021/01/01 12:00:00','avril-pro'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'twd_sanitize_date_time',
			'priority' => 5,
		)
	);	
	$wp_customize->add_control( 
		'comming_soon_time',
		array(
		    'section' => 'comming_soon_setting',
			'type'     => 'date_time',
		)  
	);
	
	$wp_customize->add_setting(
		'comming_soon_form'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 6,
		)
	);

	$wp_customize->add_control(
	'comming_soon_form',
		array(
			'type' => 'hidden',
			'label' => __('Form','avril-pro'),
			'section' => 'comming_soon_setting',
		)
	);
	
	// Shortcode // 
	$wp_customize->add_setting(
    	'comming_soon_shortcode',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_html',
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'comming_soon_shortcode',
		array(
		    'label'   => __('Shortcode','avril-pro'),
		    'section' => 'comming_soon_setting',
			'type'           => 'textarea',
		)  
	);
	
	
	$wp_customize->add_setting(
		'comming_soon_social'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'comming_soon_social',
		array(
			'type' => 'hidden',
			'label' => __('Social Icon','avril-pro'),
			'section' => 'comming_soon_setting',
		)
	);
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'comming_soon_social_icons', 
			array(
			 'sanitize_callback' => 'avril_repeater_sanitize',
			 'priority' => 8,
			 'default' => avril_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new AVRIL_Repeater( $wp_customize, 
				'comming_soon_social_icons', 
					array(
						'label'   => esc_html__('Social Icons','avril-pro'),
						'section' => 'comming_soon_setting',
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
	
		$wp_customize->add_setting(
		'comming_soon_bg'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_text',
			'priority' => 8,
		)
	);

	$wp_customize->add_control(
	'comming_soon_bg',
		array(
			'type' => 'hidden',
			'label' => __('Background','avril-pro'),
			'section' => 'comming_soon_setting',
		)
	);	
	//  Background Image // 
    $wp_customize->add_setting( 
    	'comming_soon_bg_img' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/assets/images/bg/comingSoon-bg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'avril_sanitize_url',	
			'priority' => 9,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'comming_soon_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'avril-pro'),
			'section'        => 'comming_soon_setting',
		) 
	));		
}

add_action( 'customize_register', 'avril_pages_setting' );

// selective refresh
function avril_pages_partials( $wp_customize ){
	// pg_blog_title
	$wp_customize->selective_refresh->add_partial( 'pg_blog_title', array(
		'selector'            => '.blog-page .heading-default .ttl',
		'settings'            => 'pg_blog_title',
		'render_callback'  => 'avril_pg_blog_title_render_callback',
	) );
	
	// pg_blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'pg_blog_subtitle', array(
		'selector'            => '.blog-page .heading-default h3',
		'settings'            => 'pg_blog_subtitle',
		'render_callback'  => 'avril_pg_blog_subtitle_render_callback',
	) );
	
	// pg_blog_desc
	$wp_customize->selective_refresh->add_partial( 'pg_blog_desc', array(
		'selector'            => '.blog-page .heading-default p',
		'settings'            => 'pg_blog_desc',
		'render_callback'  => 'avril_pg_blog_desc_render_callback',
	) );

	// pg_Porfolio_title
	$wp_customize->selective_refresh->add_partial( 'pg_Porfolio_title', array(
		'selector'            => '.portfolio-page .heading-default .ttl',
		'settings'            => 'pg_Porfolio_title',
		'render_callback'  => 'avril_pg_Porfolio_title_render_callback',
	) );
	
	// pg_porfolio_subtitle
	$wp_customize->selective_refresh->add_partial( 'pg_porfolio_subtitle', array(
		'selector'            => '.portfolio-page .heading-default h3',
		'settings'            => 'pg_porfolio_subtitle',
		'render_callback'  => 'avril_pg_porfolio_subtitle_render_callback',
	) );
	
	// pg_porfolio_desc
	$wp_customize->selective_refresh->add_partial( 'pg_porfolio_desc', array(
		'selector'            => '.portfolio-page .heading-default p',
		'settings'            => 'pg_porfolio_desc',
		'render_callback'  => 'avril_pg_porfolio_desc_render_callback',
	) );

	// opening_hour_ttl
	$wp_customize->selective_refresh->add_partial( 'opening_hour_ttl', array(
		'selector'            => '#contact-section .opening-heading h4',
		'settings'            => 'opening_hour_ttl',
		'render_callback'  => 'avril_opening_hour_ttl_render_callback',	
	) );
	
	 // opening_hour_desc
	$wp_customize->selective_refresh->add_partial( 'opening_hour_desc', array(
		'selector'            => '#contact-section .opening-heading p',
		'settings'            => 'opening_hour_desc',
		'render_callback'  => 'avril_opening_hour_desc_render_callback',	
	) );

	 // ct_form_ttl
	$wp_customize->selective_refresh->add_partial( 'ct_form_ttl', array(
		'selector'            => '#contact-section .send-your-enquiry h4',
		'settings'            => 'ct_form_ttl',
		'render_callback'  => 'avril_ct_form_ttl_render_callback',	
	) );
	
	 // ct_info_ttl1
	$wp_customize->selective_refresh->add_partial( 'ct_info_ttl1', array(
		'selector'            => '#contact-section .info1 .text',
		'settings'            => 'ct_info_ttl1',
		'render_callback'  => 'avril_ct_info_ttl1_render_callback',	
	) );
	
	 // ct_info_desc1
	$wp_customize->selective_refresh->add_partial( 'ct_info_desc1', array(
		'selector'            => '#contact-section .info1 .title',
		'settings'            => 'ct_info_desc1',
		'render_callback'  => 'avril_ct_info_desc1_render_callback',
	) );
	
	 // ct_info_ttl2
	$wp_customize->selective_refresh->add_partial( 'ct_info_ttl2', array(
		'selector'            => '#contact-section .info2 .text',
		'settings'            => 'ct_info_ttl2',
		'render_callback'  => 'avril_ct_info_ttl2_render_callback',	
	) );
	
	 // ct_info_desc2
	$wp_customize->selective_refresh->add_partial( 'ct_info_desc2', array(
		'selector'            => '#contact-section .info2 .title',
		'settings'            => 'ct_info_desc2',
		'render_callback'  => 'avril_ct_info_desc2_render_callback',
	) );
	
	 // ct_info_ttl3
	$wp_customize->selective_refresh->add_partial( 'ct_info_ttl3', array(
		'selector'            => '#contact-section .info3 .text',
		'settings'            => 'ct_info_ttl3',
		'render_callback'  => 'avril_ct_info_ttl3_render_callback',	
	) );
	
	 // ct_info_desc3
	$wp_customize->selective_refresh->add_partial( 'ct_info_desc3', array(
		'selector'            => '#contact-section .info3 .title',
		'settings'            => 'ct_info_desc3',
		'render_callback'  => 'avril_ct_info_desc3_render_callback',
	) );
	
	 // pg_about_title
	$wp_customize->selective_refresh->add_partial( 'pg_about_title', array(
		'selector'            => '#about-section .about-panel h3',
		'settings'            => 'pg_about_title',
		'render_callback'  => 'avril_pg_about_title_render_callback',	
	) );
	
	 // pg_about_desc
	$wp_customize->selective_refresh->add_partial( 'pg_about_desc', array(
		'selector'            => '#about-section .about-panel p',
		'settings'            => 'pg_about_desc',
		'render_callback'  => 'avril_pg_about_desc_render_callback',
	) );
	
	// pg_about_btn_lbl1
	$wp_customize->selective_refresh->add_partial( 'pg_about_btn_lbl1', array(
		'selector'            => '#about-section .av-btn-wrapper .av-btn-primary',
		'settings'            => 'pg_about_btn_lbl1',
		'render_callback'  => 'avril_pg_about_btn_lbl1_render_callback',
	) );
	// pg_about_btn_lbl2
	$wp_customize->selective_refresh->add_partial( 'pg_about_btn_lbl2', array(
		'selector'            => '#about-section .av-btn-wrapper .av-btn-border',
		'settings'            => 'pg_about_btn_lbl2',
		'render_callback'  => 'avril_pg_about_btn_lbl2_render_callback',
	) );
	// pg_about_btn_lbl3
	$wp_customize->selective_refresh->add_partial( 'pg_about_btn_lbl3', array(
		'selector'            => '#about-section .av-btn-wrapper .av-btn-text-icon',
		'settings'            => 'pg_about_btn_lbl3',
		'render_callback'  => 'avril_pg_about_btn_lbl3_render_callback',
	) );
	
	
	// pg_pricing_title
	$wp_customize->selective_refresh->add_partial( 'pg_pricing_title', array(
		'selector'            => '.page-pricing .heading-default .ttl',
		'settings'            => 'pg_pricing_title',
		'render_callback'  => 'avril_pg_pricing_title_render_callback',
	) );
	
	// pg_pricing_subtitle
	$wp_customize->selective_refresh->add_partial( 'pg_pricing_subtitle', array(
		'selector'            => '.page-pricing .heading-default h3',
		'settings'            => 'pg_pricing_subtitle',
		'render_callback'  => 'avril_pg_pricing_subtitle_render_callback',
	) );
	
	// pg_pricing_desc
	$wp_customize->selective_refresh->add_partial( 'pg_pricing_desc', array(
		'selector'            => '.page-pricing .heading-default p',
		'settings'            => 'pg_pricing_desc',
		'render_callback'  => 'avril_pg_pricing_desc_render_callback',
	) );
	
	// pg_pricing_cta_lg_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_pricing_cta_lg_ttl', array(
		'selector'            => '.pg-price-cta-logo h4',
		'settings'            => 'pg_pricing_cta_lg_ttl',
		'render_callback'  => 'avril_pg_pricing_cta_lg_ttl_render_callback',
	) );
	
	// pg_pricing_cta_lg_desc
	$wp_customize->selective_refresh->add_partial( 'pg_pricing_cta_lg_desc', array(
		'selector'            => '.page-pricing  p',
		'settings'            => 'pg_pricing_cta_lg_desc',
		'render_callback'  => 'avril_pg_pricing_cta_lg_desc_render_callback',
	) );
	
	// pg_pricing_faq_ttl
	$wp_customize->selective_refresh->add_partial( 'pg_pricing_faq_ttl', array(
		'selector'            => '#faq-section .heading-title h3',
	) );
	
	// pg_service_title
	$wp_customize->selective_refresh->add_partial( 'pg_service_title', array(
		'selector'            => '.page-service .heading-default .ttl',
		'settings'            => 'pg_service_title',
		'render_callback'  => 'avril_pg_service_title_render_callback',
	
	) );
	
	// pg_service_subtitle
	$wp_customize->selective_refresh->add_partial( 'pg_service_subtitle', array(
		'selector'            => '.page-service .heading-default h3',
		'settings'            => 'pg_service_subtitle',
		'render_callback'  => 'avril_pg_service_subtitle_render_callback',
	
	) );
	
	// pg_service_description
	$wp_customize->selective_refresh->add_partial( 'pg_service_description', array(
		'selector'            => '.page-service .heading-default p',
		'settings'            => 'pg_service_description',
		'render_callback'  => 'avril_pg_service_description_render_callback',
	
	) );
	// pg_service_contents
	$wp_customize->selective_refresh->add_partial( 'pg_service_contents', array(
		'selector'            => '.page-service .pg-serv-content'
	
	) );
	
	// pg_gallery_title
	$wp_customize->selective_refresh->add_partial( 'pg_gallery_title', array(
		'selector'            => '.page-gallery .heading-default .ttl',
		'settings'            => 'pg_gallery_title',
		'render_callback'  => 'avril_pg_gallery_title_render_callback',
	
	) );
	
	// pg_gallery_subtitle
	$wp_customize->selective_refresh->add_partial( 'pg_gallery_subtitle', array(
		'selector'            => '.page-gallery .heading-default h3',
		'settings'            => 'pg_gallery_subtitle',
		'render_callback'  => 'avril_pg_gallery_subtitle_render_callback',
	) );
	
	// pg_gallery_description
	$wp_customize->selective_refresh->add_partial( 'pg_gallery_description', array(
		'selector'            => '.page-gallery .heading-default p',
		'settings'            => 'pg_gallery_description',
		'render_callback'  => 'avril_pg_gallery_description_render_callback',
	) );
	
	// Gallery content
	$wp_customize->selective_refresh->add_partial( 'pg_gallery', array(
		'selector'            => '.page-gallery .gallery'
	) );
	
	
	
	
	// pg_contact_title
	$wp_customize->selective_refresh->add_partial( 'pg_contact_title', array(
		'selector'            => '#contact-section .heading-default .ttl',
		'settings'            => 'pg_contact_title',
		'render_callback'  => 'avril_pg_contact_title_render_callback',
	
	) );
	
	// pg_contact_subtitle
	$wp_customize->selective_refresh->add_partial( 'pg_contact_subtitle', array(
		'selector'            => '#contact-section .heading-default h3',
		'settings'            => 'pg_contact_subtitle',
		'render_callback'  => 'avril_pg_contact_subtitle_render_callback',
	) );
	
	// pg_contact_description
	$wp_customize->selective_refresh->add_partial( 'pg_contact_description', array(
		'selector'            => '#contact-section .heading-default p',
		'settings'            => 'pg_contact_description',
		'render_callback'  => 'avril_pg_contact_description_render_callback',
	) );
	}

add_action( 'customize_register', 'avril_pages_partials' );

// pg_blog_title
function avril_pg_blog_title_render_callback() {
	return get_theme_mod( 'pg_blog_title' );
}

// pg_blog_subtitle
function avril_pg_blog_subtitle_render_callback() {
	return get_theme_mod( 'pg_blog_subtitle' );
}

// pg_blog_desc
function avril_pg_blog_desc_render_callback() {
	return get_theme_mod( 'pg_blog_desc' );
}

// pg_Porfolio_title
function avril_pg_Porfolio_title_render_callback() {
	return get_theme_mod( 'pg_Porfolio_title' );
}

// pg_porfolio_subtitle
function avril_pg_porfolio_subtitle_render_callback() {
	return get_theme_mod( 'pg_porfolio_subtitle' );
}

// pg_porfolio_desc
function avril_pg_porfolio_desc_render_callback() {
	return get_theme_mod( 'pg_porfolio_desc' );
}

// opening_hour_ttl
function avril_opening_hour_ttl_render_callback() {
	return get_theme_mod( 'opening_hour_ttl' );
}

// opening_hour_desc
function avril_opening_hour_desc_render_callback() {
	return get_theme_mod( 'opening_hour_desc' );
}

//ct_form_ttl
function avril_ct_form_ttl_render_callback() {
	return get_theme_mod( 'ct_form_ttl' );
}

// ct_info_ttl1
function avril_ct_info_ttl1_render_callback() {
	return get_theme_mod( 'ct_info_ttl1' );
}

// ct_info_desc1
function avril_ct_info_desc1_render_callback() {
	return get_theme_mod( 'ct_info_desc1' );
}

// ct_info_ttl2
function avril_ct_info_ttl2_render_callback() {
	return get_theme_mod( 'ct_info_ttl2' );
}

// ct_info_desc2
function avril_ct_info_desc2_render_callback() {
	return get_theme_mod( 'ct_info_desc2' );
}

// ct_info_ttl3
function avril_ct_info_ttl3_render_callback() {
	return get_theme_mod( 'ct_info_ttl3' );
}

// ct_info_desc3
function avril_ct_info_desc3_render_callback() {
	return get_theme_mod( 'ct_info_desc3' );
}
// pg_contact_title
function avril_pg_contact_title_render_callback() {
	return get_theme_mod( 'pg_contact_title' );
}

// pg_contact_subtitle
function avril_pg_contact_subtitle_render_callback() {
	return get_theme_mod( 'pg_contact_subtitle' );
}

// pg_contact_description
function avril_pg_contact_description_render_callback() {
	return get_theme_mod( 'pg_contact_description' );
}

// pg_gallery_title
function avril_pg_gallery_title_render_callback() {
	return get_theme_mod( 'pg_gallery_title' );
}

// pg_gallery_subtitle
function avril_pg_gallery_subtitle_render_callback() {
	return get_theme_mod( 'pg_gallery_subtitle' );
}

// pg_gallery_description
function avril_pg_gallery_description_render_callback() {
	return get_theme_mod( 'pg_gallery_description' );
}


// pg_service_title
function avril_pg_service_title_render_callback() {
	return get_theme_mod( 'pg_service_title' );
}

// pg_service_subtitle
function avril_pg_service_subtitle_render_callback() {
	return get_theme_mod( 'pg_service_subtitle' );
}

// pg_service_description
function avril_pg_service_description_render_callback() {
	return get_theme_mod( 'pg_service_description' );
}

// pg_about_title
function avril_pg_about_title_render_callback() {
	return get_theme_mod( 'pg_about_title' );
}


// pg_about_desc
function avril_pg_about_desc_render_callback() {
	return get_theme_mod( 'pg_about_desc' );
}

// pg_about_btn_lbl1
function avril_pg_about_btn_lbl1_render_callback() {
	return get_theme_mod( 'pg_about_btn_lbl1' );
}

// pg_about_btn_lbl2
function avril_pg_about_btn_lbl2_render_callback() {
	return get_theme_mod( 'pg_about_btn_lbl2' );
}
// pg_about_btn_lbl3
function avril_pg_about_btn_lbl3_render_callback() {
	return get_theme_mod( 'pg_about_btn_lbl3' );
}

// pg_pricing_title
function avril_pg_pricing_title_render_callback() {
	return get_theme_mod( 'pg_pricing_title' );
}

// pg_pricing_subtitle
function avril_pg_pricing_subtitle_render_callback() {
	return get_theme_mod( 'pg_pricing_subtitle' );
}

// pg_pricing_desc
function avril_pg_pricing_desc_render_callback() {
	return get_theme_mod( 'pg_pricing_desc' );
}

// pg_pricing_cta_lg_ttl
function avril_pg_pricing_cta_lg_ttl_render_callback() {
	return get_theme_mod( 'pg_pricing_cta_lg_ttl' );
}

// pg_pricing_cta_lg_desc
function avril_pg_pricing_cta_lg_desc_render_callback() {
	return get_theme_mod( 'pg_pricing_cta_lg_desc' );
}