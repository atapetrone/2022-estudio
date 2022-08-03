<?php 
/**
Template Name: Pricing Filter Page
*/

get_header();

$hs_pg_pricing				= get_theme_mod('hs_pg_pricing','1'); 
$pg_pricing_title			= get_theme_mod('pg_pricing_title','Technology from tomorrow');
$pg_pricing_subtitle		= get_theme_mod('pg_pricing_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Pricing</b>                                   <b>Pricing</b><b>Pricing</b></span></span>');
$pg_pricing_desc			= get_theme_mod('pg_pricing_desc','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
$pg_pricing_display_num		= get_theme_mod('pg_pricing_display_num','3');
$post_type = 'avrils_pricing';
$tax = 'pricing_categories'; 
$tax_terms = get_terms($tax);
avril_before_pricing_pg_section_trigger();
?>
  <!--===// Start: Pricing Section
    =================================-->
<?php if($hs_pg_pricing == '1') { ?>		
    <section id="pricing-section" class="pricing-section av-py-default page-pricing">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                        <?php if ( ! empty( $pg_pricing_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($pg_pricing_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $pg_pricing_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($pg_pricing_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $pg_pricing_desc ) ) : ?>		
							<p><?php echo wp_kses_post($pg_pricing_desc); ?></p>    
						<?php endif; ?>	
                    </div>
                </div>
            </div>
            <div class="av-columns-area wow fadeInUp">
				<div class="av-column-12">
                    <!-- Filter list starts -->
                    <div class="av-filter-wrapper-1">
						<?php if (!$tax_terms == 0) { ?>
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
					$args = array( 'post_type' => 'avrils_pricing','posts_per_page' => $pg_pricing_display_num);  	
					$plans = new WP_Query( $args ); 
					if( $plans->have_posts() )
					{
						while ( $plans->have_posts() ) : $plans->the_post();
						$terms = get_the_terms( $post->ID, 'pricing_categories' );
											
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
                <div class="av-column-4 av-md-column-6 mb-4 mb-av-0 av-filter-item <?php echo strtolower($tax); ?>">
                       <?php get_template_part('template-parts/pricing/pricing','content'); ?>
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
				</div>
    </section>
<?php } ?>	
    <!-- End: Pricing Section
    =================================-->

    <!--===// Start: Call to Action with logo ( Without BG Image )
    =================================-->
	<?php 
		$hs_pg_cta_logo			= get_theme_mod('hs_pg_cta_logo','1'); 
		$pg_pricing_cta_lg_ttl	= get_theme_mod('pg_pricing_cta_lg_ttl','100% No-Risk Money Back Guarantee!');
		$pg_pricing_cta_lg_desc	= get_theme_mod('pg_pricing_cta_lg_desc','You are fully protected by our 100% No-Risk-Double-Guarantee. If you don’t like Soliloquy over the next 15 days, then we will happily refund 100% of your money. No questions asked.');
		$pg_cta_logo_img				= get_theme_mod('pg_cta_logo_img',get_template_directory_uri() . '/assets/images/bg/badge.png');
	?>
	<?php if($hs_pg_cta_logo == '1') { ?>	
		<section id="cta-section" class="cta-section cta-text-content cta-shadow-two av-mb-default pg-price-cta-logo">
			<div class="av-container">
				<div class="av-columns-area">
					<div class="av-column-12">
						<div class="cta-wrapper">
							<div class="cta-img-icon">
								<?php if ( ! empty( $pg_cta_logo_img ) ) : ?>	
									<img src="<?php echo esc_url($pg_cta_logo_img); ?>" alt="" width="103" height="103">
								<?php endif; ?>	
							</div>
							<div class="cta-content">  
								<?php if ( ! empty( $pg_pricing_cta_lg_ttl ) ) : ?>		
									<h4><?php echo wp_kses_post($pg_pricing_cta_lg_ttl); ?></h4>    
								<?php endif; ?>	
								<?php if ( ! empty( $pg_pricing_cta_lg_desc ) ) : ?>		
									<p><?php echo wp_kses_post($pg_pricing_cta_lg_desc); ?></p>    
								<?php endif; ?>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>	
    <!--===// End: Call to Action with logo ( Without BG Image )
    =================================-->

    <!--===// Start: FAQ Section
    =================================-->
	<?php 
		$hs_pg_pricing_faq			= get_theme_mod('hs_pg_pricing_faq','1'); 
		$pg_pricing_faq_ttl	= get_theme_mod('pg_pricing_faq_ttl','Frequently Asked Questions <span class="primary-color">(FAQ)</span>');
		$pg_pricing_faq_content			= get_theme_mod('pg_pricing_faq_content',avril_get_faq_default());
	?>
	<?php if($hs_pg_pricing_faq == '1') { ?>
		<section id="faq-section" class="faq-section bg-primary-light av-py-default">
			<div class="av-container">
				<div class="av-columns-area">
					<div class="av-column-12">
						<div class="heading-title text-center">
							<?php if ( ! empty( $pg_pricing_faq_ttl ) ) : ?>		
								<h3><?php echo wp_kses_post($pg_pricing_faq_ttl); ?></h3>    
							<?php endif; ?>	
						</div>
					</div>
				</div>
				<div class="av-columns-area">
					<?php
						if ( ! empty( $pg_pricing_faq_content ) ) {
						$pg_pricing_faq_content = json_decode( $pg_pricing_faq_content );
						foreach ( $pg_pricing_faq_content as $faq_item ) {
							$icon = ! empty( $faq_item->icon_value ) ? apply_filters( 'avril_translate_single_string', $faq_item->icon_value, 'FAQ section' ) : '';
							$title = ! empty( $faq_item->title ) ? apply_filters( 'avril_translate_single_string', $faq_item->title, 'FAQ section' ) : '';
							$text = ! empty( $faq_item->text ) ? apply_filters( 'avril_translate_single_string', $faq_item->text, 'FAQ section' ) : '';
							$link = ! empty( $faq_item->link) ? apply_filters( 'avril_translate_single_string', $faq_item->link,'FAQ section' ) : '';
					?>
						<div class="av-column-6 mb-4">
							<div class="faq-list">
								<div class="faq-icon">
									<?php if ( ! empty( $icon ) ) {?>
										<i class="fa <?php echo esc_html( $icon ); ?>"></i>
									<?php } ?>
								</div>
								<div class="faq-content">
									<?php if ( ! empty( $title ) ) : ?>
										<h5><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $title ); ?></h5>
									<?php endif; ?>  
									<?php if ( ! empty( $text ) ) : ?>
										<p><?php echo esc_html( $text ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</section>
	<?php } ?>	
    <!--===// End: FAQ Section
    =================================-->

    <!--===// Start: Call to Action ( Without BG Image )
    =================================-->
		<?php
			$hs_pg_pricing_cta		= get_theme_mod('hs_pg_pricing_cta','1');
			if($hs_pg_pricing_cta == '1') :
				$pricing_cta_type					= get_theme_mod('pricing_cta_type','style-2');
				if($pricing_cta_type == 'style-1') :
					get_template_part('template-parts/sections/section','cta-1'); 
				 elseif ($pricing_cta_type == 'style-2' ) : 
					get_template_part('template-parts/sections/section','cta-2');
				endif;	
			endif;
			avril_after_pricing_pg_section_trigger();
		?>
    <!--===// End: Call to Action ( Without BG Image )
    =================================-->
 <?php get_footer(); ?>