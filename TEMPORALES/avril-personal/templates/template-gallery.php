<?php 
/**
Template Name: Gallery Page
*/

get_header();

$pg_gallery_title				= get_theme_mod('pg_gallery_title','Technology from tomorrow');
$pg_gallery_subtitle			= get_theme_mod('pg_gallery_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Gallery</b>                                   <b>Gallery</b><b>Gallery</b></span></span>');
$pg_gallery_description			= get_theme_mod('pg_gallery_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
$pg_gallery 					= get_theme_mod('pg_gallery',avril_get_pg_gallery_default());
$pg_gallery_column				= get_theme_mod('pg_gallery_column','3');
$pg_gallery_btn					= get_theme_mod('pg_gallery_btn','Load More');
avril_before_gallery_pg_section_trigger();
?>
 <!--===// Start: Gallery Section
    =================================-->
    <section id="gallery-section" class="gallery-section av-py-default page-gallery">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                         <?php if ( ! empty( $pg_gallery_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($pg_gallery_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $pg_gallery_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($pg_gallery_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $pg_gallery_description ) ) : ?>		
							<p><?php echo wp_kses_post($pg_gallery_description); ?></p>    
						<?php endif; ?>	
                    </div>
                </div>
            </div>
            <div class="av-columns-area wow fadeInUp">
				<?php
					if ( ! empty( $pg_gallery ) ) {
					$pg_gallery = json_decode( $pg_gallery );
					foreach ( $pg_gallery as $gallery_item ) {
						$image = ! empty( $gallery_item->image_url ) ? apply_filters( 'avril_translate_single_string', $gallery_item->image_url, 'Gallery section' ) : '';
				?>
					<div class="av-column-<?php echo esc_attr($pg_gallery_column); ?> av-sm-column-6 mb-5 av-load-4">
						<figure class="gallery-item mgf-popup">                
							<div class="gallery-icon">
								<a href="<?php echo esc_url( $image ); ?>" class="image" title="This is a gallery">
									<?php if ( ! empty( $image ) ): ?>
										<img src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> /> 
									<?php endif; ?>		
									<div class="gallery-caption">
										<i class="fa fa-search"></i>
									</div>
								</a>
							</div>
						</figure>
					</div>
				<?php } } ?>
                <div class="av-column-12 text-center mt-4">
					 <?php if ( ! empty( $pg_gallery_btn ) ) : ?>
						<a href="javascript:void(0)" class="av-btn av-btn-primary av-load-btn"><?php echo esc_html( $pg_gallery_btn ); ?>  <span class="av-load-spinner"></span></a>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php avril_after_gallery_pg_section_trigger(); ?>	
    <!-- End: Gallery Section
    =================================-->
 <?php get_footer(); ?>