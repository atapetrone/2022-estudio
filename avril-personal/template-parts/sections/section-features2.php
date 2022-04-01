<?php 
	$feature2_title				= get_theme_mod('feature2_title','Technology from tomorrow');
	$feature2_subtitle			= get_theme_mod('feature2_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Features</b>                                   <b>Features</b><b>Features</b></span></span>');
	$feature2_description		= get_theme_mod('feature2_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$features2_contents			= get_theme_mod('features2_contents',avril_get_features2_default());
	$feature2_column			= get_theme_mod('feature2_column','4');	
?>
<section id="features-section2" class="features-section av-py-default">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                       <?php if ( ! empty( $feature2_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($feature2_title); ?></span>
						<?php endif; ?>
					   <?php if ( ! empty( $feature2_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($feature2_subtitle); ?></h3>    
						<?php endif; ?>	                   
						<?php if ( ! empty( $feature2_description ) ) : ?>		
							<p><?php echo wp_kses_post($feature2_description); ?></p>    
						<?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="av-columns-area features-area wow fadeInUp">
				<?php
					if ( ! empty( $features2_contents ) ) {
					$features2_contents = json_decode( $features2_contents );
					foreach ( $features2_contents as $feature_item ) {
						$avril_feaures2_title = ! empty( $feature_item->title ) ? apply_filters( 'avril_translate_single_string', $feature_item->title, 'feature section' ) : '';
						$text = ! empty( $feature_item->text ) ? apply_filters( 'avril_translate_single_string', $feature_item->text, 'feature section' ) : '';
						$icon = ! empty( $feature_item->icon_value) ? apply_filters( 'avril_translate_single_string', $feature_item->icon_value,'feature section' ) : '';
						$btn_lbl = ! empty( $feature_item->text2 ) ? apply_filters( 'avril_translate_single_string', $feature_item->text2, 'feature section' ) : '';
						$avril_features_link = ! empty( $feature_item->link ) ? apply_filters( 'avril_translate_single_string', $feature_item->link, 'feature section' ) : '';
						$image = ! empty( $feature_item->image_url ) ? apply_filters( 'avril_translate_single_string', $feature_item->image_url, 'feature section' ) : '';
				?>
                <div class="av-column-<?php echo esc_attr($feature2_column); ?> av-md-column-6 mb-4">
                    <div class="features-item">
                        <div class="features-icon">
                           <?php if ( ! empty( $image )  &&  ! empty( $icon )){ ?>
								<img class="services_cols_mn_icon" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $avril_feaures2_title ) ) : ?> alt="<?php echo esc_attr( $avril_feaures2_title ); ?>" title="<?php echo esc_attr( $avril_feaures2_title ); ?>" <?php endif; ?> />
							<?php }elseif ( ! empty( $image ) ) { ?>
								<img class="services_cols_mn_icon" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $avril_feaures2_title ) ) : ?> alt="<?php echo esc_attr( $avril_feaures2_title ); ?>" title="<?php echo esc_attr( $avril_feaures2_title ); ?>" <?php endif; ?> />
							<?php }elseif ( ! empty( $icon ) ) {?>
								<i class="fa <?php echo esc_html( $icon ); ?> txt-pink"></i>
							<?php } ?>
                        </div>
                        <div class="features-content">
                            <?php if ( ! empty( $avril_feaures2_title ) ) : ?>
									<h5 class="features-title"><a href="<?php echo esc_url( $avril_features_link ); ?>"><?php echo esc_html( $avril_feaures2_title ); ?></a></h5>
								<?php endif; ?>
								<?php if ( ! empty( $text ) ) : ?>
									<p><?php echo esc_html( $text ); ?></p>
								<?php endif; ?>
								<?php if ( ! empty( $btn_lbl ) ) : ?>
									<a href="<?php echo esc_url( $avril_features_link ); ?>" class="av-link"><?php echo esc_html( $btn_lbl ); ?></a>
								<?php endif; ?>
                        </div>
                    </div>
                </div>
				<?php }} ?>
            </div>
        </div>
    </section>