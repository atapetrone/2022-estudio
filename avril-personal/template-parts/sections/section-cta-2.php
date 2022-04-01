<?php 
	$cta_title					= get_theme_mod('cta_title','We work in partnership with all the major <span class="primary-color"><em>technology</em></span> solutions');
	$cta_description			= get_theme_mod('cta_description','There are many variations of passages of lorem Ipsum available, but the majority');
	$cta_btn_lbl1				= get_theme_mod('cta_btn_lbl1','Purchase Now');
	$cta_btn_link1				= get_theme_mod('cta_btn_link1');
	$cta_btn_lbl2				= get_theme_mod('cta_btn_lbl2','Learn More');
	$cta_btn_link2				= get_theme_mod('cta_btn_link2');
?>
<?php if ( is_page_template( 'templates/template-contact.php' ) ) { ?>
 <section id="cta-section" class="cta-section cta-shadow-one av-mb-default home-cta map-section">
	<?php 
		$hs_pg_contact_map				= get_theme_mod('hs_pg_contact_map'); 
		if($hs_pg_contact_map == '1') {
	?>
		<div id="map"></div>
	<?php }}else{ ?>	
 <section id="cta-section" class="cta-section cta-shadow-one av-mb-default home-cta">
<?php } ?>	
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
								<span class="cta-learn-more">or <a href="<?php echo esc_url($cta_btn_link2); ?>"><?php echo esc_html($cta_btn_lbl2); ?></a></span>
							<?php endif;?>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>