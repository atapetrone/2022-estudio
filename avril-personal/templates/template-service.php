<?php 
/**
Template Name: Service Page
*/

get_header();

$pg_service_title			= get_theme_mod('pg_service_title','Technology from tomorrow');
$pg_service_subtitle 		= get_theme_mod('pg_service_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Services</b>                                   <b>Services</b><b>Services</b></span></span>');
$pg_service_description		= get_theme_mod('pg_service_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
$pg_service_contents		= get_theme_mod('pg_service_contents',avril_get_pg_service_default());
avril_before_service_pg_section_trigger();
$page_Service_column			= get_theme_mod('page_Service_column','4');
?>
 <!--===// Start: Service Section
    =================================-->
    <section id="service-section" class="service-section service-section-hover av-py-default page-service">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                        <?php if ( ! empty( $pg_service_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($pg_service_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $pg_service_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($pg_service_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $pg_service_description ) ) : ?>		
							<p><?php echo wp_kses_post($pg_service_description); ?></p>    
						<?php endif; ?>	
                    </div>
                </div>
            </div>
            <div class="av-columns-area wow fadeInUp pg-serv-content service-row">
				<?php
					if ( ! empty( $pg_service_contents ) ) {
					$pg_service_contents = json_decode( $pg_service_contents );
					foreach ( $pg_service_contents as $service_item ) {
						$avril_service_title = ! empty( $service_item->title ) ? apply_filters( 'avril_translate_single_string', $service_item->title, 'Page service section' ) : '';
						$text = ! empty( $service_item->text ) ? apply_filters( 'avril_translate_single_string', $service_item->text, 'Page service section' ) : '';
						$icon = ! empty( $service_item->icon_value) ? apply_filters( 'avril_translate_single_string', $service_item->icon_value,'Page service section' ) : '';
						$avril_service_link = ! empty( $service_item->link ) ? apply_filters( 'avril_translate_single_string', $service_item->link, 'Page service section' ) : '';
						$image = ! empty( $service_item->image_url ) ? apply_filters( 'avril_translate_single_string', $service_item->image_url, 'Page service section' ) : '';
				?>
					<div class="av-column-<?php echo esc_attr($page_Service_column); ?> av-md-column-6 mb-1 av-load-item av-load-3 p-0">
						<div class="service-item">
							<div class="service-icon">
								<?php if ( ! empty( $image )  &&  ! empty( $icon )){ ?>
									<img class="services_cols_mn_icon" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $avril_service_title ) ) : ?> alt="<?php echo esc_attr( $avril_service_title ); ?>" title="<?php echo esc_attr( $avril_service_title ); ?>" <?php endif; ?> />
								<?php }elseif ( ! empty( $image ) ) { ?>
									<img class="services_cols_mn_icon" src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
								<?php }elseif ( ! empty( $icon ) ) {?>
									<i class="fa <?php echo esc_html( $icon ); ?> txt-pink"></i>
								<?php } ?>
							</div>
							<div class="service-content">
								<?php if ( ! empty( $avril_service_title ) ) : ?>
									<h5 class="service-title"><a href="<?php echo esc_url( $avril_service_link ); ?>"><?php echo esc_html( $avril_service_title ); ?></a></h5>
								<?php endif; ?>
								<?php if ( ! empty( $text ) ) : ?>
									<p><?php echo esc_html( $text ); ?></p>
								<?php endif; ?>
								<a href="javascript:void(0);"><i class="fa fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
				<?php } } ?>
            </div>
            <div class="av-columns-area wow fadeInUp">
            	<div class="av-column-12 text-center mt-6">
                    <a href="javascript:void(0)" class="av-btn av-btn-primary av-load-btn"><?php echo esc_html_e( 'Load More','avril-pro' ); ?> <span class="av-load-spinner"></span></a>
                </div>
            </div>
        </div>
    </section>
<?php avril_after_service_pg_section_trigger(); ?>	
    <!-- End: Service Section
    =================================-->
 <?php get_footer(); ?>