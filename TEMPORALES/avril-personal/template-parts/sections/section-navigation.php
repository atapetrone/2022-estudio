        <div class="navigator-wrapper">
	        <!--===// Start: Mobile Toggle
	        =================================-->
	        <div class="theme-mobile-nav <?php echo avril_sticky_menu(); ?>"> 
	            <div class="av-container">
	                <div class="av-columns-area">
	                    <div class="av-column-12">
	                        <div class="theme-mobile-menu">
	                        	<div class="mobile-logo">
	                            	<div class="logo">
										<?php
											if(has_custom_logo())
											{	
												the_custom_logo();
											}
											else { 
											?>
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
												<h4 class="site-title">
													<?php 
														echo esc_html(bloginfo('name'));
													?>
												</h4>
											</a>	
										<?php 						
											}
										?>
										<?php
											$description = get_bloginfo( 'description');
											if ($description) : ?>
												<p class="site-description"><?php echo $description; ?></p>
										<?php endif; ?>
									</div>
	                            </div>
	                            <div class="menu-toggle-wrap">
	                            	<div class="mobile-menu-right"></div>
									<div class="hamburger-menu">
										<button type="button" class="menu-toggle">
											<div class="top-bun"></div>
											<div class="meat"></div>
											<div class="bottom-bun"></div>
										</button>
									</div>
								</div>
	                            <div id="mobile-m" class="mobile-menu">
	                                <button type="button" class="header-close-menu close-style"></button>
	                            </div>
	                            <div class="headtop-mobi">
	                                <button type="button" class="header-above-toggle"><span></span></button>
	                            </div>
	                            <div id="mob-h-top" class="mobi-head-top"></div>
	                        </div>
	                    </div>
	                </div>
	            </div>        
	        </div>
	        <!--===// End: Mobile Toggle
	        =================================-->

	        <!--===// Start: Navigation
	        =================================-->
	        <div class="nav-area d-none d-av-block">
	        	<div class="navbar-area <?php echo avril_sticky_menu(); ?>">
		            <div class="av-container">
		                <div class="av-columns-area">
		                    <div class="av-column-2 my-auto">
		                        <div class="logo">
		                            <?php
										if(has_custom_logo())
										{	
											the_custom_logo();
										}
										else { 
										?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
											<h4 class="site-title">
												<?php 
													echo esc_html(bloginfo('name'));
												?>
											</h4>
										</a>	
									<?php 						
										}
									?>
									<?php
										$description = get_bloginfo( 'description');
										if ($description) : ?>
											<p class="site-description"><?php echo $description; ?></p>
									<?php endif; ?>
		                        </div>
		                    </div>
		                    <div class="av-column-10 my-auto">
		                        <div class="theme-menu">
		                            <nav class="menubar">
		                                 <?php 
											wp_nav_menu( 
												array(  
													'theme_location' => 'primary_menu',
													'container'  => '',
													'menu_class' => 'menu-wrap',
													'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
													'walker' => new WP_Bootstrap_Navwalker()
													 ) 
												);
										?>                   
		                            </nav>
									<?php $hide_show_cart 		= get_theme_mod( 'hide_show_cart','1'); ?>
		                            <div class="menu-right">
		                                <ul class="header-wrap-right">   
											<?php if($hide_show_cart == '1') { ?>
											<?php if ( class_exists( 'WooCommerce' ) ) { ?>
												<li class="cart-wrapper">
													<a href="javascript:void(0)" class="cart-icon-wrap" id="cart" title="View your shopping cart">                                     
														<i class="fa fa-cart-arrow-down"></i>
														<?php 
														if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
															$count = WC()->cart->cart_contents_count;
															$cart_url = wc_get_cart_url();
															
															if ( $count > 0 ) {
															?>
																 <span><?php echo esc_html( $count ); ?></span>
															<?php 
															}
															else {
																?>
																<span>0</span>
																<?php 
															}
														}
														?>
													</a>
													<!-- Shopping Cart Start -->
													<div class="shopping-cart">
														<?php get_template_part('woocommerce/cart/mini','cart');	 ?>
														
														<!--ul class="cart-items">
															<li>
																<div class="item-img">
																	<img src="assets/images/cart/cart-item1.jpg" alt="cartitem">
																</div>
																<span class="item-name">Sony DSC-RX100M III</span>
																<span class="item-price">$849.99</span>
																<span class="item-quantity">X 1</span>
															</li>
															<li>
																<div class="item-img">
																	<img src="assets/images/cart/cart-item1.jpg" alt="cartitem">
																</div>
																<span class="item-name">Sony DSC-RX100M III</span>
																<span class="item-price">$849.99</span>
																<span class="item-quantity">X 1</span>
															</li>
															<li>
																<div class="item-img">
																	<img src="assets/images/cart/cart-item1.jpg" alt="cartitem">
																</div>
																<span class="item-name">Sony DSC-RX100M III</span>
																<span class="item-price">$849.99</span>
																<span class="item-quantity">X 1</span>
															</li>
														</ul>
														<a href="javascript:void(0)" class="av-btn av-btn-primary av-btn-effect-1"><span>Checkout</span><i class="icofont-bubble-right"></i></a-->
													</div>
													<!-- Shopping Cart End -->
												</li>
											<?php } } ?>
											<?php $hide_show_search 		= get_theme_mod( 'hide_show_search','1'); ?>
											<?php if($hide_show_search == '1') { ?>
		                                    <li class="search-button">
		                                        <button id="view-search-btn" class="header-search-toggle"><i class="fa fa-search"></i></button>
												<!-- Quik search -->
												<div class="view-search-btn header-search-popup">
													<div class="search-overlay-layer"></div>
												    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Site Search', 'avril-pro' ); ?>">
												        <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'avril-pro' ); ?></span>
												        <input type="search" class="search-field header-search-field" placeholder="<?php esc_attr_e( 'Type To Search', 'avril-pro' ); ?>" name="s" id="popfocus" value="" autofocus>
												        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
												    </form>
											        <button type="button" class="close-style header-search-close"></button>
												</div>
												<!-- / -->
		                                    </li>  
											<?php } ?>
											<?php 
												$hide_show_nav_btn 	= get_theme_mod( 'hide_show_nav_btn','1'); 
												$nav_btn_lbl 		= get_theme_mod( 'nav_btn_lbl','Book Now');
												$nav_btn_link 		= get_theme_mod( 'nav_btn_link','#');
											?>
											<?php if($hide_show_nav_btn == '1') { ?>
												<li class="av-button-area">
													<a href="<?php echo esc_url($nav_btn_link);?>" target="_blank" class="av-btn av-btn-primary av-btn-effect-1"><?php echo esc_html($nav_btn_lbl);?></a>
												</li> 
											<?php } ?>	
		                                </ul>                            
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
	        </div>
	        <!--===// End:  Navigation
	        =================================-->
	    </div>
    </header>
    <!-- End: Header
    =================================-->
<?php
avril_after_header_section_trigger();
if ( !is_page_template( 'templates/template-homepage.php' ) ) {
avril_breadcrumbs_style();  
}
?>	