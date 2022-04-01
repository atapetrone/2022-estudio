<?php 
	$hs_portfolio_tab			= get_theme_mod('hs_portfolio_tab','1'); 
	$Porfolio_title				= get_theme_mod('Porfolio_title','Technology from tomorrow');
	$porfolio_subtitle			= get_theme_mod('porfolio_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Portfolio</b>                                   <b>Portfolio</b><b>Portfolio</b></span></span>');
	$porfolio_description		= get_theme_mod('porfolio_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$portfolio_display_num = get_theme_mod('portfolio_display_num','10');
	$post_type = 'avril_portfolio';
	$tax = 'portfolio_categories'; 
	$tax_terms = get_terms($tax);	
?>
 <section id="portfolio-section" class="portfolio-section av-py-default home-portfolio">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                        <?php if ( ! empty( $Porfolio_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($Porfolio_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $porfolio_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($porfolio_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $porfolio_description ) ) : ?>		
							<p><?php echo wp_kses_post($porfolio_description); ?></p>    
						<?php endif; ?>	
                    </div>
                </div>
            </div>
			<?php if ( function_exists( 'avril_portfolio' ) ){ ?>
            <div class="av-columns-area wow fadeInUp">
                <div class="av-column-12">
                    <!-- Filter list starts -->
                    <div class="av-filter-wrapper-1">
						<?php if($hs_portfolio_tab == '1') { ?>	
							<div class="av-tab-filter">
								<?php	foreach ($tax_terms as $tax_term) {	?>
								<?php if($tax_term->name == 'All'){ ?>
									 <a href="javascript:void(0)" data-filter="*" class="active"><?php echo $tax_term->name; ?></a>
								<?php }else{ ?>
									<a href="javascript:void(0)" data-filter=".<?php echo $tax_term->slug; ?>"><?php echo $tax_term->name; ?></a>
								<?php } } ?>
							</div>
						<?php } ?>	
                        <!-- // -->
                        <div id="av-filter-init-1" class="av-columns-area av-filter-init">
							<?php 
								$args = array( 'post_type' => 'avril_portfolio','posts_per_page' => $portfolio_display_num);  
								$portfolio = new WP_Query( $args ); 
								if( $portfolio->have_posts() )
								{
									while ( $portfolio->have_posts() ) : $portfolio->the_post();
							?>
							<?php
								
								$portfolio_description 		= sanitize_text_field( get_post_meta( get_the_ID(),'portfolio_description', true ));
								$portfolio_link 			= sanitize_text_field( get_post_meta( get_the_ID(),'portfolio_button_link', true ));
								$portfolio_button_link_target 	= sanitize_text_field( get_post_meta( get_the_ID(),'portfolio_button_link_target', true ));
							
							?>
							<?php 	
								if($portfolio_link) { 
									$portfolio_link; 
								}	
								else { 
									$portfolio_link = get_post_permalink(); 
								} 
							?>
							<?php
								$terms = get_the_terms( $post->ID, 'portfolio_categories' );
													
								if ( $terms && ! is_wp_error( $terms ) ) : 
									$links = array();

									foreach ( $terms as $term ) 
									{
										$links[] = $term->slug;
									}
									
									$tax = join( ' ', $links );		
								else :	
									$tax = '';	
								endif;
							?>
                            <div class="av-column-3 av-sm-column-6 mb-5 av-filter-item <?php echo strtolower($tax); ?>">
                                <figure class="portfolio-item mgf-popup">                                    
                                    <div class="portfolio-icon">
										<?php 
										$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
										?>
                                        <a href="<?php echo get_the_post_thumbnail_url(); ?>" class="image" title="This is a portfolio">
                                            <?php 
												if ( has_post_thumbnail() ) {
													the_post_thumbnail();
												}
											?>	
                                            <div class="portfolio-caption">
                                                <h6><?php echo the_title(); ?></h6>
                                                <p><?php echo esc_html($portfolio_description); ?></p>
                                                <i class="fa fa-search"></i>
                                            </div>
                                        </a>
                                    </div>                                    
                                </figure>
                            </div>
							<?php 	
								endwhile; 
								}
							?>
                        </div>
                    </div>
                </div>
            </div>
			<?php } ?>
        </div>
    </section>