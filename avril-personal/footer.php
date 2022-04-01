<!--===// Start: Footer
    =================================-->
	<?php avril_before_footer_section_trigger(); ?>
	<?php
		$footer_widget_layout	    = get_theme_mod('footer_widget_layout','4');
		if ($footer_widget_layout == '4') {
			$cols = 'av-column-3 av-md-column-6';
		} elseif ($footer_widget_layout == '3') {
			$cols = 'av-column-4';
		} elseif ($footer_widget_layout == '2') {
			$cols = 'av-column-6';
		} else {
			$cols = 'av-column-12';
		}
	?>	
    <footer id="footer-section" class="footer-section footer footer-dark">
		<?php 
			$hs_above_footer		= get_theme_mod('hs_above_footer','1'); 
			$footer_above_content	= get_theme_mod('footer_above_content',avril_get_footer_above_default());
			if ($hs_above_footer == '1') {
		?>
        <div class="footer-above">
            <div class="av-container">
                <div class="av-columns-area">
                    <div class="av-column-12">
                        <ul class="footer-info-wrapper wow fadeInDown">
							<?php
								if ( ! empty( $footer_above_content ) ) {
								$footer_above_content = json_decode( $footer_above_content );
								foreach ( $footer_above_content as $footer_item ) {
									$avril_pay_title = ! empty( $footer_item->title ) ? apply_filters( 'avril_translate_single_string', $footer_item->title, 'footer section' ) : '';
									$text = ! empty( $footer_item->text ) ? apply_filters( 'avril_translate_single_string', $footer_item->text, 'footer section' ) : '';
									$icon = ! empty( $footer_item->icon_value ) ? apply_filters( 'avril_translate_single_string', $footer_item->icon_value, 'footer section' ) : '';
									$avril_pay_link = ! empty( $footer_item->link ) ? apply_filters( 'avril_translate_single_string', $footer_item->link, 'footer section' ) : '';
									$image = ! empty( $footer_item->image_url ) ? apply_filters( 'avril_translate_single_string', $footer_item->image_url, 'footer section' ) : '';
							?>
								<li>
									<aside class="widget widget-contact">
										<div class="contact-area">
											<div class="contact-icon">
											   <?php if ( ! empty( $image )  &&  ! empty( $icon )){ ?>
													<img  src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $avril_pay_title ) ) : ?> alt="<?php echo esc_attr( $avril_pay_title ); ?>" title="<?php echo esc_attr( $avril_pay_title ); ?>" <?php endif; ?> />
												<?php }elseif ( ! empty( $image ) ) { ?>
													<img  src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
												<?php }elseif ( ! empty( $icon ) ) {?>
													<i class="fa <?php echo esc_html( $icon ); ?> txt-pink"></i>
												<?php } ?>
											</div>
											<a href="<?php echo esc_url( $avril_pay_link ); ?>" class="contact-info">
												<?php if ( ! empty( $avril_pay_title ) ) : ?>
													<span class="text"><?php echo esc_html( $avril_pay_title ); ?></span>
												<?php endif; ?>
												<?php if ( ! empty( $text ) ) : ?>
													<span class="title"><?php echo esc_html( $text ); ?></span>
												<?php endif; ?>
											</a>
										</div>
									</aside>
								</li>
							<?php }}?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<?php } ?>
		<?php if($footer_widget_layout !== 'disable') { ?>	
			<div class="footer-main">
				<div class="av-container">
					<div class="av-columns-area wow fadeInDown">
						<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
							<div class="<?php echo esc_attr($cols); ?> text-av-left text-center mb-av-0 mb-4">
							   <?php dynamic_sidebar( 'footer-1'); ?>
							</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
							<div class="<?php echo esc_attr($cols); ?> text-av-left text-center mb-av-0 mb-4">
							   <?php dynamic_sidebar( 'footer-2'); ?>
							</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
							<div class="<?php echo esc_attr($cols); ?> text-av-left text-center mb-av-0 mb-4">
								<?php dynamic_sidebar( 'footer-3'); ?>
							</div>
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
							<div class="<?php echo esc_attr($cols); ?> text-av-left text-center mb-av-0 mb-4">
								<?php dynamic_sidebar( 'footer-4'); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php } ?>	
		<?php 
			$avril_foot_btm_lay 				= get_theme_mod('footer_bottom_layout','layout-2');	
		?>
		<?php if($avril_foot_btm_lay !== 'disable') { ?>	
		 <div class="footer-copyright">
            <div class="av-container">
                <div class="av-columns-area">
					<?php if($avril_foot_btm_lay == 'layout-1'): ?>
						<div class="av-column-6 av-md-column-6">
						   <?php if ( function_exists( 'avril_footer_group_first' ) ) : avril_footer_group_first(); endif; ?>
						</div>
						<div class="av-column-6 av-md-column-6 text-av-right text-center">
							<div class="widget-right text-av-right text-center">
							   <?php if ( function_exists( 'avril_footer_group_second' ) ) : avril_footer_group_second(); endif; ?>
							</div>
						</div>
					<?php endif; ?>	
					<?php if($avril_foot_btm_lay == 'layout-2'): ?>
						<div class="av-column-12 av-md-column-12">
							<div class="footer-copy widget-center">
								<?php if ( function_exists( 'avril_footer_group_first' ) ) : avril_footer_group_first(); endif; ?>
								<?php if ( function_exists( 'avril_footer_group_second' ) ) : avril_footer_group_second(); endif; ?>
							</div>
						</div>
					<?php endif; ?>						
                </div>
            </div>
        </div>
		<?php } ?>
    </footer>
	<?php avril_after_footer_section_trigger(); ?>
    <!-- End: Footer
    =================================-->
	 <!-- ScrollUp -->
	 <?php 
		$hs_scroller 	= get_theme_mod('hs_scroller','1');	
		$scroller_icon 	= get_theme_mod('scroller_icon','fa-arrow-up');	
		if($hs_scroller == '1') :
	?>
		<button type=button class="scrollup"><i class="fa <?php echo esc_attr($scroller_icon);?>"></i></button>
	<?php endif; ?>	
  <!-- / -->  
</div>
<?php 
$front_pallate_enable = get_theme_mod('front_pallate_enable');
	if($front_pallate_enable == '1') :
		get_template_part('index','switcher');
	endif;
wp_footer(); ?>
</body>
</html>
