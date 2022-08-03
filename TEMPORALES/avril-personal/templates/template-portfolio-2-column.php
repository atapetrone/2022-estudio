<?php 
/**
Template Name: Portfolio 2 Column
*/

get_header();
$pg_hs_portfolio_tab		= get_theme_mod('pg_hs_portfolio_tab','1'); 
$pg_Porfolio_title			= get_theme_mod('pg_Porfolio_title','Technology from tomorrow');
$pg_porfolio_subtitle		= get_theme_mod('pg_porfolio_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Portfolio</b>                                   <b>Portfolio</b><b>Portfolio</b></span></span>');
$pg_porfolio_desc			= get_theme_mod('pg_porfolio_desc','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
$pg_portfolio_display_num 	= get_theme_mod('pg_portfolio_display_num','10');
$post_type = 'avril_portfolio';
$tax = 'portfolio_categories'; 
$tax_terms = get_terms($tax);	
?>	
   <!--===// Start: Portfolio Section
    =================================-->
    <section id="portfolio-section" class="portfolio-section av-py-default portfolio-page">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                       <?php if ( ! empty( $pg_Porfolio_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($pg_Porfolio_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $pg_porfolio_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($pg_porfolio_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $pg_porfolio_desc ) ) : ?>		
							<p><?php echo wp_kses_post($pg_porfolio_desc); ?></p>    
						<?php endif; ?>	
                    </div>
                </div>
            </div>
            <div class="av-columns-area wow fadeInUp">
                <div class="av-column-12">
                    <!-- Filter list starts -->
                    <div class="av-filter-wrapper-1">
                        <?php if($pg_hs_portfolio_tab == '1') { ?>	
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
								$args = array( 'post_type' => 'avril_portfolio','posts_per_page' => $pg_portfolio_display_num);  
								$portfolio = new WP_Query( $args ); 
								if( $portfolio->have_posts() )
								{
									while ( $portfolio->have_posts() ) : $portfolio->the_post();
									
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
                            <div class="av-column-6 av-sm-column-6 mb-5 av-filter-item <?php echo strtolower($tax); ?>">
                               <?php get_template_part('template-parts/portfolio/portfolio','content'); ?>
                            </div>
							<?php 	
								endwhile; 
								}
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Portfolio Section
    =================================-->


 <?php get_footer(); ?>