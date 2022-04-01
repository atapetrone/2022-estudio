<?php
/* Shortcode for frontpage section
Slider section:			[Avril_Slider]
Info section:			[Avril_Info]
Slider section:			[Avril_Slider]
Service section:		[Avril_Service]
Features section:		[Avril_Features]
Portfolio section:		[Avril_Portfolio]
Features2 section:		[Avril_Features2]
Gallery section:		[Avril_Gallery]
Pricing section:		[Avril_Pricing]
Team section:			[Avril_Team]
Funfact section:		[Avril_Funfact]
Testimonial section:	[Avril_Testimonial]
CTA1 section:			[Avril_CTA1]
CTA2 section:			[Avril_CTA2]
Blog section:			[Avril_Blog]
Skill section:			[Avril_Skill]
Custom section:			[Avril_Custom]
*/

/* Shortcode for Slider Section */
function avril_slider_shortcode() {
	get_template_part('template-parts/sections/section','slider');
}
add_shortcode('Avril_Slider', 'avril_slider_shortcode');



/* Shortcode for Info Section */
function avril_info_shortcode() {
	get_template_part('template-parts/sections/section','info');
}
add_shortcode('Avril_Info', 'avril_info_shortcode');



/* Shortcode for Service Section */
function avril_service_shortcode() {
	get_template_part('template-parts/sections/section','service');
}
add_shortcode('Avril_Service', 'avril_service_shortcode');



/* Shortcode for Features Section */
function avril_features_shortcode() {
	get_template_part('template-parts/sections/section','features');
}
add_shortcode('Avril_Features', 'avril_features_shortcode');



/* Shortcode for Portfolio Section */
function avril_portfolio_shortcode() {
	get_template_part('template-parts/sections/section','portfolio');
}
add_shortcode('Avril_Portfolio', 'avril_portfolio_shortcode');



/* Shortcode for Features2 Section */
function avril_features2_shortcode() {
	get_template_part('template-parts/sections/section','features2');
}
add_shortcode('Avril_Features2', 'avril_features2_shortcode');



/* Shortcode for Gallery Section */
function avril_gallery_shortcode() {
	get_template_part('template-parts/sections/section','gallery');
}
add_shortcode('Avril_Gallery', 'avril_gallery_shortcode');




/* Shortcode for Pricing Section */
function avril_pricing_shortcode() {
	get_template_part('template-parts/sections/section','pricing');
}
add_shortcode('Avril_Pricing', 'avril_pricing_shortcode');




/* Shortcode for Team Section */
function avril_team_shortcode() {
	get_template_part('template-parts/sections/section','team');
}
add_shortcode('Avril_Team', 'avril_team_shortcode');



/* Shortcode for Funfact Section */
function avril_funfact_shortcode() {
	get_template_part('template-parts/sections/section','funfact');
}
add_shortcode('Avril_Funfact', 'avril_funfact_shortcode');



/* Shortcode for Testimonial Section */
function avril_testimonial_shortcode() {
	get_template_part('template-parts/sections/section','testimonial');
}
add_shortcode('Avril_Testimonial', 'avril_testimonial_shortcode');



/* Shortcode for CTA1 Section */
function avril_cta1_shortcode() {
	get_template_part('template-parts/sections/section','cta-1');
}
add_shortcode('Avril_CTA1', 'avril_cta1_shortcode');



/* Shortcode for CTA2 Section */
function avril_cta2_shortcode() {
	get_template_part('template-parts/sections/section','cta-2');
}
add_shortcode('Avril_CTA2', 'avril_cta2_shortcode');



/* Shortcode for Blog Section */
function avril_blog_shortcode() {
	get_template_part('template-parts/sections/section','blog');
}
add_shortcode('Avril_Blog', 'avril_blog_shortcode');



/* Shortcode for Skill Section */
function avril_skill_shortcode() {
	get_template_part('template-parts/sections/section','skill');
}
add_shortcode('Avril_Skill', 'avril_skill_shortcode');



/* Shortcode for Custom Section */
function avril_custom_shortcode() {
	get_template_part('template-parts/sections/section','custom');
}
add_shortcode('Avril_Custom', 'avril_custom_shortcode');