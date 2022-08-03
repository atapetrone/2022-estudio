<?php 
/**
Template Name: About Page
*/

get_header();

$hs_pg_about					= get_theme_mod('hs_pg_about','1'); 
$pg_about_title					= get_theme_mod('pg_about_title','We are Ready to Take you One Step Forward');
$pg_about_desc					= get_theme_mod('pg_about_desc','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour or at randomised words which don"t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn"t anything embarrassing hidden in the middle of text.');
$pg_about_btn_lbl1				= get_theme_mod('pg_about_btn_lbl1','Our Services');
$pg_about_btn_link1				= get_theme_mod('pg_about_btn_link1');
$pg_about_btn_lbl2				= get_theme_mod('pg_about_btn_lbl2','Read More');
$pg_about_btn_link2				= get_theme_mod('pg_about_btn_link2');
$pg_about_btn_lbl3				= get_theme_mod('pg_about_btn_lbl3','Watch Video');
$pg_about_btn_link3				= get_theme_mod('pg_about_btn_link3');
$pg_about_img				= get_theme_mod('pg_about_img',get_template_directory_uri() . '/assets/images/about/img01.jpg');
avril_before_about_pg_section_trigger();
?>
 <!--===// Start: About Section
    =================================-->
<?php if($hs_pg_about == '1') { ?>	
    <section id="about-section" class="about-section av-py-default">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-6 mb-4 mb-av-0">
                    <div class="about-content mgf-popup">
                        <a href="https://www.youtube.com/watch?v=XF7b_MNEIAg" class="video">
                            <img src="assets/images/about/img01.jpg" alt=""/>
                        </a>
						<?php if ( ! empty( $pg_about_img ) ) : ?>
							<a href="<?php echo esc_url($pg_about_btn_link3); ?>" class="video">
								<img src="<?php echo esc_url($pg_about_img); ?>" alt=""/>
							</a>
						<?php endif; ?>
                    </div>
                </div>
                <div class="av-column-6">                    
                    <div class="about-panel">
                        <div class="heading-title">
							 <?php if ( ! empty($pg_about_title) ) : ?>		 
								 <h3><?php echo wp_kses_post($pg_about_title); ?></h3>	
							<?php endif; ?>	
                        </div>
						 <?php if ( ! empty($pg_about_desc) ) : ?>	
							<p><?php echo wp_kses_post($pg_about_desc); ?></p>
						<?php endif; ?>		
                        <div class="av-btn-wrapper">
							 <?php if ( ! empty($pg_about_btn_lbl1) ) : ?>
								<a href="<?php echo esc_url($pg_about_btn_link1); ?>" class="av-btn av-btn-primary"><?php echo esc_html($pg_about_btn_lbl1); ?></a>
							<?php endif; ?>		
							
							 <?php if ( ! empty($pg_about_btn_lbl2) ) : ?>
								<a href="<?php echo esc_url($pg_about_btn_link2); ?>" class="av-btn av-btn-border"><?php echo esc_html($pg_about_btn_lbl2); ?></a>
							<?php endif; ?>		
							
							<?php if ( ! empty($pg_about_btn_lbl3) ) : ?>
								<a href="<?php echo esc_url($pg_about_btn_link3); ?>" class="av-btn av-btn-text-icon popup-single-video"><i class="fa fa-play-circle-o"></i> <?php echo esc_html($pg_about_btn_lbl3); ?></a>
							<?php endif; ?>		
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </section>
<?php } ?>	
    <!-- End: About Section
    =================================-->

    <!--===// Start: Features Section
    =================================-->
	<?php 
		$hs_pg_about_feature	= get_theme_mod('hs_pg_about_feature','1'); 
		if($hs_pg_about_feature == '1') :
			get_template_part('template-parts/sections/section','features'); 
		endif;
	?>	
    <!-- End: Features Section
    =================================-->

    <!--===// Start: Team Section
    =================================-->
		<?php
			$hs_pg_about_team		= get_theme_mod('hs_pg_about_team','1');
			if($hs_pg_about_team == '1') :
				get_template_part('template-parts/sections/section','team'); 
			endif;
		?>
    <!-- End: Team Section
    =================================-->

    <!--===// Start: Fun Fact
    =================================-->
		<?php
			$hs_pg_about_fun		= get_theme_mod('hs_pg_about_fun','1');
			if($hs_pg_about_fun == '1') :
				get_template_part('template-parts/sections/section','funfact'); 
			endif;
		?>
    <!-- End: Fun Fact
    =================================-->

    <!--===// Start: Skills Section
    =================================-->
		<?php
			$hs_pg_about_skill		= get_theme_mod('hs_pg_about_skill','1');
			if($hs_pg_about_skill == '1') :
				get_template_part('template-parts/sections/section','skill'); 
			endif;
		?>
    <!--===// End: Skills Section
    =================================-->

    <!--===// Start: Call to Action ( Without BG Image )
    =================================-->
	<?php
		$hs_pg_about_cta		= get_theme_mod('hs_pg_about_cta','1');
		if($hs_pg_about_cta == '1') :
			$about_cta_type					= get_theme_mod('about_cta_type','style-2');
			if($about_cta_type == 'style-1') :
				get_template_part('template-parts/sections/section','cta-1'); 
			 elseif ($about_cta_type == 'style-2' ) : 
				get_template_part('template-parts/sections/section','cta-2');
			endif;	
		endif;
		avril_after_about_pg_section_trigger();
	?>
    <!--===// End: Call to Action ( Without BG Image )
    =================================-->
 <?php get_footer(); ?>