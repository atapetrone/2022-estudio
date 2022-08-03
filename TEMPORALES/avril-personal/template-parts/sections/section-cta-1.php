<?php 
	$cta_title					= get_theme_mod('cta_title','We work in partnership with all the major <span class="primary-color"><em>technology</em></span> solutions');
	$cta_description			= get_theme_mod('cta_description','There are many variations of passages of lorem Ipsum available, but the majority');
	$cta_btn_lbl1				= get_theme_mod('cta_btn_lbl1','Purchase Now');
	$cta_btn_link1				= get_theme_mod('cta_btn_link1');
	$cta_btn_lbl2				= get_theme_mod('cta_btn_lbl2','Learn More');
	$cta_btn_link2				= get_theme_mod('cta_btn_link2');
	$cta_bg_setting				= get_theme_mod('cta_bg_setting',get_template_directory_uri() . '/assets/images/bg/cta-bg.jpg');
	$cta_bg_position			= get_theme_mod('cta_bg_position','fixed');
?>
 <section id="cta-section" class="cta-section cta-bg-image home-cta" style="background:url('<?php echo esc_url($cta_bg_setting); ?>') no-repeat  center / 100% 100% rgba(0,0,0,.7);background-attachment:<?php echo esc_attr($cta_bg_position); ?>">
    <div class="av-container">
        <div class="av-columns-area">
            <div class="av-column-12">
                <div class="cta-wrapper">
                    <div class="cta-content">
						<?php if ( ! empty( $cta_title ) ) : ?>
							<h4><?php echo wp_kses_post($cta_title); ?></H4>
						<?php endif; ?>
                        <?php if ( ! empty($cta_description) ) : ?>		
							<p><?php echo wp_kses_post($cta_description); ?></p>    
						<?php endif; ?>	
                    </div>
                    <div class="cta-btn-wrap text-av-right text-center">
						<?php if ( ! empty( $cta_btn_lbl1 ) ) : ?>
							<a href="<?php echo esc_url($cta_btn_link1); ?>" class="av-btn av-btn-primary" data-text="Contact With Us"><?php echo esc_html($cta_btn_lbl1); ?></a>
						<?php endif;?>	
						<?php if ( ! empty( $cta_btn_lbl2 ) ) : ?>
							<a class="cta-more" href="<?php echo esc_url($cta_btn_link2); ?>"><i class="fa fa-phone"></i> <span class="cta-label"><?php echo esc_html($cta_btn_lbl2); ?></span></a>
						<?php endif;?>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>