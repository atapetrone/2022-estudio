<?php 
/**
Template Name: Homepage
*/

get_header();

$section_reorder 		= get_theme_mod( 'section_reorder', array( 'slider', 'info', 'service', 'feature','portfolio','feature2','gallery','pricing','team','funfact','testimonial','cta','blog' )); 
?>

<?php
foreach ( $section_reorder as $data_order ) : 

	if ( 'slider' === $data_order ) :
	
		avril_before_slider_section_trigger();
		get_template_part('template-parts/sections/section','slider');
		avril_after_slider_section_trigger();
		
	 elseif ( 'info' === $data_order ) : 
		
		avril_before_info_section_trigger();
		get_template_part('template-parts/sections/section','info'); 
		avril_after_info_section_trigger();
		
	elseif ( 'service' === $data_order ) : 	
		
		avril_before_service_section_trigger();
		get_template_part('template-parts/sections/section','service'); 
		avril_after_service_section_trigger();
		
	elseif ( 'feature' === $data_order ) : 		
		
		avril_before_feature_section_trigger();
		get_template_part('template-parts/sections/section','features');
		avril_after_feature_section_trigger();
		
	elseif ( 'portfolio' === $data_order ) : 			
		
		avril_before_portfolio_section_trigger();
		get_template_part('template-parts/sections/section','portfolio');
		avril_after_portfolio_section_trigger();	
		
	elseif ( 'feature2' === $data_order ) : 	
		
		avril_before_feature2_section_trigger();
		get_template_part('template-parts/sections/section','features2'); 
		avril_after_feature2_section_trigger();
		
	elseif ( 'gallery' === $data_order ) :	
		
		avril_before_gallery_section_trigger();
		get_template_part('template-parts/sections/section','gallery');
		avril_after_gallery_section_trigger();
		
	elseif ( 'pricing' === $data_order ) :	
		
		avril_before_pricing_section_trigger();
		get_template_part('template-parts/sections/section','pricing');
		avril_after_pricing_section_trigger();		
		
	elseif ( 'team' === $data_order ) :		
		
		avril_before_team_section_trigger();
		get_template_part('template-parts/sections/section','team');
		avril_after_team_section_trigger();	
	 	
	elseif ( 'funfact' === $data_order ) :			
		
		avril_before_funfact_section_trigger();
		get_template_part('template-parts/sections/section','funfact');
		avril_after_funfact_section_trigger();		
		
	elseif ( 'testimonial' === $data_order ) :			
		
		avril_before_testimonial_section_trigger();	
		get_template_part('template-parts/sections/section','testimonial');
		avril_after_testimonial_section_trigger();	
		
	elseif ( 'cta' === $data_order ) :	
		avril_before_cta_section_trigger();	
		$cta_type					= get_theme_mod('cta_type','style-1');
		if($cta_type == 'style-1') :
			get_template_part('template-parts/sections/section','cta-1'); 
		 elseif ($cta_type == 'style-2' ) : 
			get_template_part('template-parts/sections/section','cta-2');
		endif;	
		avril_after_cta_section_trigger();	
		
	elseif ( 'blog' === $data_order ) :		
		
		avril_before_blog_section_trigger();
		get_template_part('template-parts/sections/section','blog'); 
		avril_after_blog_section_trigger();
	
	elseif ( 'skill' === $data_order ) :		
		
		avril_before_skill_section_trigger();
		get_template_part('template-parts/sections/section','skill'); 	
		avril_after_skill_section_trigger();		
		
	elseif ( 'custom' === $data_order ) :		
		
		avril_before_custom_section_trigger();
		get_template_part('template-parts/sections/section','custom'); 	
		avril_after_custom_section_trigger();
		
   endif; endforeach;	
	
 get_footer(); ?>