<?php 
/**
Template Name: Contact Page
*/

get_header();

$pg_contact_title				= get_theme_mod('pg_contact_title','Technology from tomorrow');
$pg_contact_subtitle			= get_theme_mod('pg_contact_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Contact</b>                                   <b>Contact</b><b>Contact</b></span></span>');
$pg_contact_description			= get_theme_mod('pg_contact_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
avril_before_contact_pg_section_trigger();
?>
  <!--===// Start: Contact Section
    =================================-->
    <section id="contact-section" class="contact-section av-py-default">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                       <?php if ( ! empty( $pg_contact_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($pg_contact_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $pg_contact_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($pg_contact_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $pg_contact_description ) ) : ?>		
							<p><?php echo wp_kses_post($pg_contact_description); ?></p>    
						<?php endif; ?>	
                    </div>
                </div>
            </div>
			
            <div class="av-columns-area wow fadeInUp">
				<div class="av-column-3 av-md-column-6 mb-5 mb-av-0">
				<?php 
					$hs_ct_info 					= get_theme_mod('hs_ct_info','1');
					if($hs_ct_info == '1') :
				?>
						<ul class="contact-info-wrapper wow fadeInDown">
							<?php 
								$ct_info_icon1					= get_theme_mod('ct_info_icon1','fa-envelope');
								$ct_info_ttl1					= get_theme_mod('ct_info_ttl1','Send Your Query:');
								$ct_info_desc1					= get_theme_mod('ct_info_desc1','email@company.com');
							?>
							<?php if($ct_info_icon1 !== '' || $ct_info_ttl1 !== '' || $ct_info_desc1 !== '') :?>
								<li class="info1">
									<aside class="widget widget-contact">
										<div class="contact-area">
											<div class="contact-icon">
											   <i class="fa <?php echo esc_attr($ct_info_icon1); ?>"></i>
											</div>
											<a href="javascript:void(0)" class="contact-info">
												<span class="text"><?php echo wp_kses_post($ct_info_ttl1); ?></span>
												<span class="title"><?php echo wp_kses_post($ct_info_desc1); ?></span>
											</a>
										</div>
									</aside>
								</li>
							<?php endif;?>	
							<?php 
								$ct_info_icon2					= get_theme_mod('ct_info_icon2','fa-support');
								$ct_info_ttl2					= get_theme_mod('ct_info_ttl2','Priority Support:');
								$ct_info_desc2					= get_theme_mod('ct_info_desc2','+1-202-333-3232<br>+2-302-444-2323');
							?>
							<?php if($ct_info_icon2 !== '' || $ct_info_ttl2 !== '' || $ct_info_desc2 !== '') :?>
								<li class="info2">
									<aside class="widget widget-contact">
										<div class="contact-area">
											<div class="contact-icon">
											   <i class="fa <?php echo esc_attr($ct_info_icon2); ?>"></i>
											</div>
											<a href="javascript:void(0)" class="contact-info">
												<span class="text"><?php echo wp_kses_post($ct_info_ttl2); ?></span>
												<span class="title"><?php echo wp_kses_post($ct_info_desc2); ?></span>
											</a>
										</div>
									</aside>
								</li>
							<?php endif;?>	
							<?php 
								$ct_info_icon3					= get_theme_mod('ct_info_icon3','fa-location-arrow');
								$ct_info_ttl3					= get_theme_mod('ct_info_ttl3','Office Address:');
								$ct_info_desc3					= get_theme_mod('ct_info_desc3','568, Jb Road , EA Malbar Beach, 4005600');
							?>
							<?php if($ct_info_icon3 !== '' || $ct_info_ttl3 !== '' || $ct_info_desc3 !== '') :?>
								<li class="info3">
									<aside class="widget widget-contact">
										<div class="contact-area">
											<div class="contact-icon">
											   <i class="fa <?php echo esc_attr($ct_info_icon3); ?>"></i>
											</div>
											<a href="javascript:void(0)" class="contact-info">
												<span class="text"><?php echo wp_kses_post($ct_info_ttl3); ?></span>
												<span class="title"><?php echo wp_kses_post($ct_info_desc3); ?></span>
											</a>
										</div>
									</aside>
								</li>
							<?php endif;?>	
						</ul>
				<?php endif; ?>	
				</div>
                <div class="av-column-5 av-md-column-6 mb-5 mb-av-0">
					<?php 
						$hs_ct_form 					= get_theme_mod('hs_ct_form','1');
						$ct_form_ttl 					= get_theme_mod('ct_form_ttl','Send Your Enquiry');
						$ct_form_shortcode 				= get_theme_mod('ct_form_shortcode');
						if($hs_ct_form == '1') :
					?>
                    <div class="send-your-enquiry">
                        <?php if ( ! empty( $ct_form_ttl ) ) : ?>		
							<h4><?php echo wp_kses_post($ct_form_ttl); ?></h4>    
						<?php endif; ?>	
						<?php if($ct_form_shortcode != '') {
								echo do_shortcode( $ct_form_shortcode );
							}else{?>
								<div role="form" class="wpcf7">
									<form action="#" method="post">
										<p><input type="text" name="text-1" value="" size="40" class="form-control" aria-required="true" aria-invalid="false" placeholder="Your Name"></p>
										<p><input type="text" name="text-2" value="" size="40" class="form-control" aria-required="true" aria-invalid="false" placeholder="Email Address"></p>
										<p><input type="text" name="text-3" value="" size="40" class="form-control" aria-required="true" aria-invalid="false" placeholder="Company Name"></p>
										<p><input type="number" name="text-3" value="" size="40" class="form-control" aria-required="true" aria-invalid="false" placeholder="Phone"></p>
										<p><textarea name="textarea-4" cols="40" rows="10" class="form-control" aria-invalid="false" placeholder="Type Your Message" spellcheck="false"></textarea></p>
										<p><button type="submit" id="submit" class="av-btn av-btn-primary">Send Message</button></p>
									</form>
								</div>
							<?php }?>	
                    </div>
				<?php endif; ?>
                </div>
                <div class="av-column-4 av-md-column-6 mx-auto">
					<?php 
						$hs_pg_opening_hour 					= get_theme_mod('hs_pg_opening_hour','1');
						$opening_hour_ttl 					= get_theme_mod('opening_hour_ttl','Opening Hours');
						$opening_hour_desc 				= get_theme_mod('opening_hour_desc','Lorem ipsum dolor sit amet, consectetur ac elit tempor incididunt labor');
						$pg_opening_content 					= get_theme_mod('pg_opening_content','<dl class="av-grid-dl"><dt>Monday:</dt><dd>9:00 - 19:00</dd>
                            <dt>Tuesday:</dt><dd>9:00 - 19:00</dd><dt>Wednesday:</dt><dd>9:00 - 19:00</dd><dt>Thursday:</dt><dd>9:00 - 19:00</dd><dt>Friday:</dt>
                            <dd>9:00 - 19:00</dd><dt>Saturday:</dt><dd>11:00 - 19:00</dd><dt>Sunday:</dt><dd>Closed</dd></dl>');
						$opening_hour_bg_img 				= get_theme_mod('opening_hour_bg_img',get_template_directory_uri() .'/assets/images/bg/contact-bg.jpg');
						if($hs_pg_opening_hour == '1') :
					?>
                    <div class="opening-hours" style="background:url('<?php echo esc_url($opening_hour_bg_img); ?>') center center scroll rgba(0,0,0,.8);">
                        <div class="opening-heading">
                             <?php if ( ! empty( $opening_hour_ttl ) ) : ?>		
								<h4><?php echo wp_kses_post($opening_hour_ttl); ?></h4>    
							<?php endif; ?>	
                            <?php if ( ! empty( $opening_hour_desc ) ) : ?>		
								<p><?php echo wp_kses_post($opening_hour_desc); ?></p>    
							<?php endif; ?>	
                        </div>
                         <?php if ( ! empty( $pg_opening_content ) ) : ?>		
							<p><?php echo wp_kses_post($pg_opening_content); ?></p>    
						<?php endif; ?>	
                    </div>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Contact Section
    =================================-->

    <!--===// Start: Call to Action ( Without BG Image )
    =================================-->
   
	<?php
		$hs_pg_contact_cta		= get_theme_mod('hs_pg_contact_cta','1');
		$contact_page_map_lattitude			= get_theme_mod('contact_page_map_lattitude','40.6700'); 
		$contact_page_map_longitude			= get_theme_mod('contact_page_map_longitude','-73.9400'); 
		$settings=array('lattitude'=>$contact_page_map_lattitude,'longitude'=>$contact_page_map_longitude);
		wp_register_script('avril-contact-map',get_template_directory_uri().'/assets/js/map-script.js',array('jquery'));
		wp_localize_script('avril-contact-map','contact_map_settings',$settings);
		wp_enqueue_script('avril-contact-map');
	
		if($hs_pg_contact_cta == '1') :
			get_template_part('template-parts/sections/section','cta-2');
		endif;
		avril_after_contact_pg_section_trigger();
	?>
    <!--===// End: Call to Action ( Without BG Image )
    =================================-->
 <?php get_footer(); ?>