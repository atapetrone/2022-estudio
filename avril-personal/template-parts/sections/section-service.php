<?php 
	$service_title				= get_theme_mod('service_title','Technology from tomorrow');
	$service_subtitle			= get_theme_mod('service_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Services</b>                                   <b>Services</b><b>Services</b></span></span>');
	$service_description		= get_theme_mod('service_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$service_contents			= get_theme_mod('service_contents',avril_get_service_default());
	$service_sec_column			= get_theme_mod('service_sec_column','3');
	$settings=array('items'=>$service_sec_column);
	
	wp_register_script('avril-service',get_template_directory_uri().'/assets/js/homepage/service.js',array('jquery'));
	wp_localize_script('avril-service','service_settings',$settings);
	wp_enqueue_script('avril-service');	
?>
    <section id="service-section" class="service-section service-section-hover av-py-default service-home">
    	<div class="av-container">
			<div class="av-columns-area">
				<div class="av-column-12">
					<div class="heading-default wow fadeInUp">
						<?php if ( ! empty( $service_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($service_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $service_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($service_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $service_description ) ) : ?>		
							<p><?php echo wp_kses_post($service_description); ?></p>    
						<?php endif; ?>	
					</div>
				</div>
			</div>
            <div class="services-carousel owl-carousel owl-theme wow fadeInUp">
				<?php
					if ( ! empty( $service_contents ) ) {
					$service_contents = json_decode( $service_contents );
					foreach ( $service_contents as $service_item ) {
						$avril_service_title = ! empty( $service_item->title ) ? apply_filters( 'avril_translate_single_string', $service_item->title, 'service section' ) : '';
						$text = ! empty( $service_item->text ) ? apply_filters( 'avril_translate_single_string', $service_item->text, 'service section' ) : '';
						$icon = ! empty( $service_item->icon_value) ? apply_filters( 'avril_translate_single_string', $service_item->icon_value,'service section' ) : '';
						$avril_serv_link = ! empty( $service_item->link ) ? apply_filters( 'avril_translate_single_string', $service_item->link, 'service section' ) : '';
						$image = ! empty( $service_item->image_url ) ? apply_filters( 'avril_translate_single_string', $service_item->image_url, 'service section' ) : '';
				?>
					<div class="service-item">
						<div class="service-icon">
							<?php if ( ! empty( $image )  &&  ! empty( $icon )){ ?>
								<img class="services_cols_mn_icon" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $avril_service_title ) ) : ?> alt="<?php echo esc_attr( $avril_service_title ); ?>" title="<?php echo esc_attr( $avril_service_title ); ?>" <?php endif; ?> />
							<?php }elseif ( ! empty( $image ) ) { ?>
								<img class="services_cols_mn_icon" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $avril_service_title ) ) : ?> alt="<?php echo esc_attr( $avril_service_title ); ?>" title="<?php echo esc_attr( $avril_service_title ); ?>" <?php endif; ?> />
							<?php }elseif ( ! empty( $icon ) ) {?>
								<i class="fa <?php echo esc_html( $icon ); ?> txt-pink"></i>
							<?php } ?>
						</div>
						<div class="service-content">
							<?php if ( ! empty( $avril_service_title ) ) : ?>
								<h5 class="service-title"><a href="<?php echo esc_url( $avril_serv_link ); ?>"><?php echo esc_html( $avril_service_title ); ?></a></h5>
							<?php endif; ?>
							<?php if ( ! empty( $text ) ) : ?>
								<p><?php echo esc_html( $text ); ?></p>
							<?php endif; ?>
							<a href="javascript:void(0);"><i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				<?php }}?>
            </div>
    	</div>
    </section>