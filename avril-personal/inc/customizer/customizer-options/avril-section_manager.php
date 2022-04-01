<?php // Adding customizer layout manager settings
function avril_layout_manager_customizer( $wp_customize ){

	/* layout manager section */
	$wp_customize->add_section( 'frontpage_layout' , array(
		'title'      => __('Sections Reorder', 'avril-pro'),
		'priority'       => 39,
   	) );
	
	 $wp_customize->add_setting( 
		'section_reorder' , 
			array(
			'default'   => array(
							'slider',
							'info',
							'service',
							'feature',
							'portfolio',
							'feature2',
							'gallery',
							'pricing',
							'team',
							'funfact',
							'testimonial',
							'cta',
							'blog'
						),
		'sanitize_callback' => 'avril_sanitize_sortable',
		) 
	);
	
	$wp_customize->add_control( 
	new Avril_Control_Sortable( $wp_customize, 'section_reorder', 
		array(
			'label'      => __( 'Structure', 'avril-pro' ),
			'section'     => 'frontpage_layout',
			'priority'      => 2,
			'choices'     => array(
				'slider'   => __( 'Slider Section', 'avril-pro' ),
				'info'     => __( 'Info Section', 'avril-pro' ),
				'service'     => __( 'Service Section', 'avril-pro' ),
				'feature'     => __( 'Feature Section', 'avril-pro' ),
				'portfolio'   => __( 'Portfolio Section', 'avril-pro' ),
				'feature2'     => __( 'Feature Section 2', 'avril-pro' ),
				'gallery'     => __( 'Gallery Section', 'avril-pro' ),
				'pricing'     => __( 'Pricing Section', 'avril-pro' ),
				'team'   => __( 'Team Section', 'avril-pro' ),
				'funfact'     => __( 'Funfact Section', 'avril-pro' ),
				'testimonial'     => __( 'Testimonial Section', 'avril-pro' ),
				'cta'     => __( 'Call to Action Section', 'avril-pro' ),
				'blog'     => __( 'Blog Section', 'avril-pro' ),
				'skill'     => __( 'Skill Section', 'avril-pro' ),
				'custom'     => __( 'Custom Section', 'avril-pro' ),
			),
		) ) 
	);	
	
}
add_action( 'customize_register', 'avril_layout_manager_customizer' );