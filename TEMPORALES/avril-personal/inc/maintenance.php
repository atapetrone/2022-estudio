<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
	<?php endif; ?>

	<!-- Included CSS -->
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/animate.css'; ?>">
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/fonts/font-awesome/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/editor-style.css'; ?>">
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/theme.css'; ?>">
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/menu.css'; ?>">
    <!-- Owl CSS -->
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/owl.carousel.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/owl.theme.default.min.css'; ?>">
    <!-- Magnific CSS -->
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/magnific-popup.css'; ?>">
    <!-- Text-Animate Css -->
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/text-animate.css'; ?>">
    <!-- Color CSS -->
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/color/default.css'; ?>">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/main.css'; ?>">
    <!-- Widget CSS -->
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/widgets.css'; ?>">
    <!-- Reponsive CSS -->
    <link rel="stylesheet" href="<?php echo AVRIL_PARENT_URI.'/assets/css/responsive.css'; ?>">

  </head>
  
  <body>
    
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

    <!--===// Start: Coming Soon
    =================================-->
	<?php 
		$comming_soon_bg_img = get_theme_mod('comming_soon_bg_img',get_template_directory_uri() .'/assets/images/bg/comingSoon-bg.jpg');
	?>
    <section id="coming-soon" class="coming-soon" style="background:url('<?php echo esc_url($comming_soon_bg_img); ?>') center center scroll rgba(0,0,0,.8);">
        <div class="av-container">
            <div class="av-columns-area wow fadeInUp">
                <div class="av-column-12">
                    <div class="coming-soon-wrapper">                        
                        <div class="av-soon-text">
							<?php 
								$comming_soon_logo = get_theme_mod('comming_soon_logo',get_template_directory_uri() .'/assets/images/logo-2.svg');
							?>
							<?php if ( ! empty( $comming_soon_logo ) ) : ?>
								<div class="av-logo-soon">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><img src="<?php echo esc_url($comming_soon_logo); ?>" alt="Avril" width="132" height="43"></a>
								</div>
							<?php endif; ?>	
							<?php 
								$comming_soon_title				= get_theme_mod('comming_soon_title','We Are Launching Soon');
								$comming_soon_desc		= get_theme_mod('comming_soon_desc','There are many variations of passages of Lorem Ipsum available action in some form by injected humour.');
							?>
							<?php if ( ! empty( $comming_soon_title ) ) : ?>		
								<h2><?php echo wp_kses_post($comming_soon_title); ?></h2>    
							<?php endif; ?>	
							<?php if ( ! empty( $comming_soon_desc ) ) : ?>		
								<p><?php echo wp_kses_post($comming_soon_desc); ?></p>    
							<?php endif; ?>	
                        </div>
                        <div class="fact-soon text-center">
                            <div class="fact-wrapper" id="countDown">
                            </div>
                        </div>
						<?php
							$enable_comming_soon_form 				= get_theme_mod( 'enable_comming_soon_form','1');
							$comming_soon_shortcode 				= get_theme_mod( 'comming_soon_shortcode');
							if($enable_comming_soon_form == '1') {
						?>
							<div class="subscribe-form-soon">
								<?php 
									if($comming_soon_shortcode != '') {
										echo do_shortcode( $comming_soon_shortcode );
									}else{
								?>
									<form role="mail" method="get" class="search-form" action="#">
										<div>
											<input type="text" class="av-search-field" placeholder="Enter Email" name="mail" id="mail">
											<button role="button" type="submit" class="av-btn av-btn-primary av-search-submit" aria-label="Search">Subscribe</button>
										</div>
									</form>
								<?php } ?>
							</div>
						<?php } ?>	
						<?php
							$enable_comming_soon_social 				= get_theme_mod( 'enable_comming_soon_social','1');
							$comming_soon_social_icons 				= get_theme_mod( 'comming_soon_social_icons',avril_get_social_icon_default());
							if($enable_comming_soon_social == '1') {
						?>
                        <div class="soon-widget">
                            <aside class="widget widget_social_widget">
                                <ul>
                                    <?php
										$comming_soon_social_icons = json_decode($comming_soon_social_icons);
										if( $comming_soon_social_icons!='' )
										{
										foreach($comming_soon_social_icons as $social_item){	
										$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'avril_translate_single_string', $social_item->icon_value, 'Comming Soon' ) : '';	
										$social_link = ! empty( $social_item->link ) ? apply_filters( 'avril_translate_single_string', $social_item->link, 'Comming Soon' ) : '';
									?>
											<li><a href="<?php echo esc_url( $social_link ); ?>"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
									<?php }} ?>
                                </ul>
                            </aside>
                        </div>
					<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Coming Soon
    =================================-->

    <!--===// Start: Scripts
    =================================-->
    <script src="<?php echo AVRIL_PARENT_URI.'/assets/js/jquery.min.js'; ?>"></script>
    <script src="<?php echo AVRIL_PARENT_URI.'/assets/js/wow.min.js'; ?>"></script>
    <script src="<?php echo AVRIL_PARENT_URI.'/assets/js/owl.carousel.min.js'; ?>"></script>
    <script src="<?php echo AVRIL_PARENT_URI.'/assets/js/jquery.magnific-popup.min.js'; ?>"></script>
    <script src="<?php echo AVRIL_PARENT_URI.'/assets/js/isotope.pkgd.js'; ?>"></script>
    <script src="<?php echo AVRIL_PARENT_URI.'/assets/js/jquery.counterup.min.js'; ?>"></script>
    <script src="<?php echo AVRIL_PARENT_URI.'/assets/js/circle-progress.min.js'; ?>"></script>
   	<script src="<?php echo AVRIL_PARENT_URI.'/assets/js/text-animate.js'; ?>"></script>
    <script src="<?php echo AVRIL_PARENT_URI.'/assets/js/countdown.js'; ?>"></script>
    <!-- Custom -->
    <script src="<?php echo AVRIL_PARENT_URI.'/assets/js/custom.js'; ?>"></script>
    <!-- End: Scripts
    =================================-->

  </body>
</html>