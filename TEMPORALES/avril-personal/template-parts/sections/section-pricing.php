<?php 
	$pricing_title				= get_theme_mod('pricing_title','Technology from tomorrow');
	$pricing_subtitle			= get_theme_mod('pricing_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Pricing</b>                                   <b>Pricing</b><b>Pricing</b></span></span>');
	$pricing_description		= get_theme_mod('pricing_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$pricing_display_num 		= get_theme_mod('pricing_display_num','3');
	$price_sec_column 			= get_theme_mod('price_sec_column','4');
?>
   <section id="pricing-section" class="pricing-section dottet-bg-image av-py-default home-pricing">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                         <?php if ( ! empty( $pricing_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($pricing_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $pricing_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($pricing_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $pricing_description ) ) : ?>		
							<p><?php echo wp_kses_post($pricing_description); ?></p>    
						<?php endif; ?>	
                    </div>
                </div>
            </div>
            <div class="av-columns-area wow fadeInUp">
				<?php 
					$args = array( 'post_type' => 'avrils_pricing','posts_per_page' => $pricing_display_num);  	
					$plans = new WP_Query( $args ); 
					if( $plans->have_posts() )
					{
						while ( $plans->have_posts() ) : $plans->the_post();
				?>
				<?php
					$plans_icon 			= sanitize_text_field( get_post_meta( get_the_ID(),'plans_icon', true ));
					$plans_subtitle 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_subtitle', true ));
					$plans_currency 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_currency', true ));
					$plans_price 			= sanitize_text_field( get_post_meta( get_the_ID(),'plans_price', true ));
					$plans_duration 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_duration', true ));
					$price_recomended 		= sanitize_text_field( get_post_meta( get_the_ID(),'price_recomended', true ));
					$plans_features_1 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_1', true ));
					
					$plans_features_2 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_2', true ));
					$plans_features_3 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_3', true ));
					$plans_features_4 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_4', true ));
					$plans_features_5 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_5', true ));
					
					$plans_features_6 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_6', true ));
					$plans_features_7 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_7', true ));
					$plans_features_8 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_8', true ));
					$plans_features_9 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_9', true ));
					
					$plans_features_10 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_10', true ));
					$plans_button_label 	= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_label', true ));
					$plans_button_link 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_link', true ));
					$plans_button_link_target 	= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_link_target', true ));
					
				?>
                <div class="av-column-<?php echo esc_attr($price_sec_column); ?> av-md-column-6 mb-4 mb-av-0">
                    <div class="pricing-item<?=($price_recomended)?' recommended':''?>">
						<?php if($price_recomended) { ?>
							<span class="recommended-badge"><?php echo esc_html($price_recomended); ?></span>
						<?php } ?>	
						<?php if($plans_icon) { ?>
							<span class="pricing-icon"><i class="fa <?php echo esc_attr($plans_icon); ?>"></i></span>
						<?php } ?>	
                        <h3><?php echo the_title(); ?></h3>
						<?php if($plans_subtitle) { ?>
							<p><?php echo esc_html($plans_subtitle); ?></p>
						<?php } ?>	
						<?php if($plans_price) { ?>
							<span class="pricing"><sup><?php echo esc_html($plans_currency); ?></sup> <?php echo esc_html($plans_price); ?></span><?php if($plans_duration) { echo esc_html($plans_duration); }?>
						<?php } ?>	
                        <ul>
                            <?php if($plans_features_1) { ?>
								<li><?php echo esc_html($plans_features_1); ?></li>
							<?php } ?>
							
							 <?php if($plans_features_2) { ?>
								<li><?php echo esc_html($plans_features_2); ?></li>
							<?php } ?>
							
							 <?php if($plans_features_3) { ?>
								<li><?php echo esc_html($plans_features_3); ?></li>
							<?php } ?>
							
							 <?php if($plans_features_4) { ?>
								<li><?php echo esc_html($plans_features_4); ?></li>
							<?php } ?>
							
							 <?php if($plans_features_5) { ?>
								<li><?php echo esc_html($plans_features_5); ?></li>
							<?php } ?>
							
							 <?php if($plans_features_6) { ?>
								<li><?php echo esc_html($plans_features_6); ?></li>
							<?php } ?>
							
							 <?php if($plans_features_7) { ?>
								<li><?php echo esc_html($plans_features_7); ?></li>
							<?php } ?>
							
							 <?php if($plans_features_8) { ?>
								<li><?php echo esc_html($plans_features_8); ?></li>
							<?php } ?>
							
							 <?php if($plans_features_9) { ?>
								<li><?php echo esc_html($plans_features_9); ?></li>
							<?php } ?>
							
							 <?php if($plans_features_10) { ?>
								<li><?php echo esc_html($plans_features_10); ?></li>
							<?php } ?>
                        </ul>
						 <?php if($plans_button_label || $plans_button_link) { ?>
							<a href="<?php echo esc_url($plans_button_link); ?>" <?php  if($plans_button_link_target) { echo "target='_blank'"; } ?> class="av-btn av-btn-primary"><?php echo esc_html($plans_button_label); ?></a>
						<?php } ?>	
                    </div>
                </div>
				<?php 
					endwhile;
					} 
				?>
            </div>
        </div>
    </section>