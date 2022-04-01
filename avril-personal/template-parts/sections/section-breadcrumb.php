<?php 
	$hs_breadcrumb					= get_theme_mod('hs_breadcrumb','1');
	$hs_breadcrumb_bottom			= get_theme_mod('hs_breadcrumb_bottom','1');
	$breadcrumb_title_enable		= get_theme_mod('breadcrumb_title_enable','1');
	$breadcrumb_path_enable			= get_theme_mod('breadcrumb_path_enable','1');
	
if($hs_breadcrumb == '1') {	
?>
 <section id="breadcrumb-section" class="breadcrumb-area breadcrumb-center">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="breadcrumb-content">
                        <div class="breadcrumb-heading">
							<?php if($breadcrumb_title_enable == '1') { ?>
								<h2>
									<?php 
										if ( is_day() ) : 
										
											printf( __( 'Daily Archives: %s', 'avril-pro' ), get_the_date() );
										
										elseif ( is_month() ) :
										
											printf( __( 'Monthly Archives: %s', 'avril-pro' ), (get_the_date( 'F Y' ) ));
											
										elseif ( is_year() ) :
										
											printf( __( 'Yearly Archives: %s', 'avril-pro' ), (get_the_date( 'Y' ) ) );
											
										elseif ( is_category() ) :
										
											printf( __( 'Category Archives: %s', 'avril-pro' ), (single_cat_title( '', false ) ));

										elseif ( is_tag() ) :
										
											printf( __( 'Tag Archives: %s', 'avril-pro' ), (single_tag_title( '', false ) ));
											
										elseif ( is_404() ) :

											printf( __( 'Error 404', 'avril-pro' ));
											
										elseif ( is_author() ) :
										
											printf( __( 'Author: %s', 'avril-pro' ), (get_the_author( '', false ) ));		
										
										elseif ( is_tax( 'portfolio_categories' ) ) :

											printf( __( 'Portfolio Categories: %s', 'avril-pro' ), (single_term_title( '', false ) ));	
											
										elseif ( is_tax( 'pricing_categories' ) ) :

											printf( __( 'Pricing Categories: %s', 'avril-pro' ), (single_term_title( '', false ) ));	
											
										elseif ( class_exists( 'avril-pro' ) ) : 
											
											if ( is_shop() ) {
												woocommerce_page_title();
											}
											
											elseif ( is_cart() ) {
												the_title();
											}
											
											elseif ( is_checkout() ) {
												the_title();
											}
											
											else {
												the_title();
											}
										else :
												the_title();
												
										endif;
										
									?>
								</h2>
							<?php } ?>	
                        </div>
						<?php if($breadcrumb_path_enable == '1') { ?>
							<ol class="breadcrumb-list">
								<?php if (function_exists('avril_breadcrumbs')) avril_breadcrumbs();?>
							</ol>
						<?php } ?>		
                    </div>                    
                </div>
            </div>
        </div> <!-- container -->
		<?php if($hs_breadcrumb_bottom == '1') {	?>
			<div class="breadcrumb-footer">
				<div class="av-container">
					<div class="av-columns-area">
						<div class="av-column-12">
							<div class="breadcrumb-content-below">
								<ol class="breadcrumb-list">
									<li class="breadcrumb-home"><a href="index.html"><i class="fa fa-home"></i></a></li>
									<li><i class="fa fa-chevron-right"></i></li>
									<li>
										<?php 
											if ( is_day() ) : 
											
												printf( __( 'Daily Archives: %s', 'avril-pro' ), get_the_date() );
											
											elseif ( is_month() ) :
											
												printf( __( 'Monthly Archives: %s', 'avril-pro' ), (get_the_date( 'F Y' ) ));
												
											elseif ( is_year() ) :
											
												printf( __( 'Yearly Archives: %s', 'avril-pro' ), (get_the_date( 'Y' ) ) );
												
											elseif ( is_category() ) :
											
												printf( __( 'Category Archives: %s', 'avril-pro' ), (single_cat_title( '', false ) ));

											elseif ( is_tag() ) :
											
												printf( __( 'Tag Archives: %s', 'avril-pro' ), (single_tag_title( '', false ) ));
												
											elseif ( is_404() ) :

												printf( __( 'Error 404', 'avril-pro' ));
												
											elseif ( is_author() ) :
											
												printf( __( 'Author: %s', 'avril-pro' ), (get_the_author( '', false ) ));		
											
											elseif ( is_tax( 'portfolio_categories' ) ) :

												printf( __( 'Portfolio Categories: %s', 'avril-pro' ), (single_term_title( '', false ) ));	
												
											elseif ( is_tax( 'pricing_categories' ) ) :

												printf( __( 'Pricing Categories: %s', 'avril-pro' ), (single_term_title( '', false ) ));	
												
											elseif ( class_exists( 'avril-pro' ) ) : 
												
												if ( is_shop() ) {
													woocommerce_page_title();
												}
												
												elseif ( is_cart() ) {
													the_title();
												}
												
												elseif ( is_checkout() ) {
													the_title();
												}
												
												else {
													the_title();
												}
											else :
													the_title();
													
											endif;
											
										?>
									</li>
								</ol>
								<?php 
									$hs_breadcrumb_subs 	= get_theme_mod('hs_breadcrumb_subs','1');
									$breadcrumb_sub_shortcode 	= get_theme_mod('breadcrumb_sub_shortcode');
								?>
								<?php if($hs_breadcrumb_subs == '1') {	?>
									<div class="breadcrumb-widget">
										<div class="widget widget-search">
											<?php if($breadcrumb_sub_shortcode != '') {
												echo do_shortcode( $breadcrumb_sub_shortcode );
											}else{?>
											<h5 class="widget-title">Our News Latter</h5>
											<form role="mail" method="get" class="search-form" action="#">
												<div>
													<input type="text" class="av-search-field" placeholder="Enter Email" name="mail" id="mail">
													<button role="button" type="submit" class="av-btn av-btn-primary av-search-submit" aria-label="Search"><i class="fa fa-search"></i></button>
												</div>
											</form>
											<?php } ?>
										</div>
									</div>
								<?php } ?>	
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
    </section>
<?php } ?>	