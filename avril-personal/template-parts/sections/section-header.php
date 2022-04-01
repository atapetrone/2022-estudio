 <!--===// Start: Preloader
    =================================-->
	<?php  
		$hs_preloader 	= get_theme_mod( 'hs_preloader'); 
		if($hs_preloader == '1') { 
	?>
		<div class="prealoader"> 
			<div class="load-circle">
				<span class="one"></span>
			</div>  
		</div>
	<?php } ?>	
    <!-- End: Preloader
    =================================-->

    <!--===// Start: Header
    =================================-->
<?php 
	avril_before_header_section_trigger();
	$header_above_layout 	=	get_theme_mod('header_above_layout','layout-2');		
?>	
<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="custom-header" rel="home">
		<img src="<?php esc_url(header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>	
<?php endif;  ?>
    <header id="header-section" class="header header-one">
        <!--===// Start: Header Above
        =================================-->
		<?php if($header_above_layout !== 'disable') { ?>	
			<div id="above-header" class="header-above-info d-av-block d-none wow fadeInDown">
				<div class="header-widget">
					<div class="av-container">
						<div class="av-columns-area">
							<?php if($header_above_layout == 'layout-1'): ?>
								<div class="av-column-12 text-center">
									<?php do_action('avril_abv_hdr_data_first');	?>
								</div>
								<div class="av-column-12 text-center">
									<?php do_action('avril_abv_hdr_data_second'); ?>
								</div>
							<?php endif; ?>
							<?php if($header_above_layout == 'layout-2'): ?>
								<div class="av-column-5">
									<div class="widget-left text-av-left text-center">
										<?php do_action('avril_abv_hdr_data_first');	?>
									</div>
								</div>
								<div class="av-column-7">
									<div class="widget-right text-av-right text-center"> 
										<?php do_action('avril_abv_hdr_data_second');	?>
									</div>	
								</div>
							<?php endif; ?>	
						</div>
					</div>
				</div>
			</div>
		<?php } ?>	
        <!--===// End: Header Top
        =================================-->   