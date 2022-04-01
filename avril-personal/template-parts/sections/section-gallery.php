<?php 
	$gallery_title				= get_theme_mod('gallery_title','Technology from tomorrow');
	$gallery_subtitle			= get_theme_mod('gallery_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Gallery</b>                                   <b>Gallery</b><b>Gallery</b></span></span>');
	$gallery_description		= get_theme_mod('gallery_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$gallery 					= get_theme_mod('gallery',avril_get_gallery_default());	
?>
 <section id="gallery-section" class="gallery-section home-gallery">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                       <?php if ( ! empty( $gallery_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($gallery_title); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $gallery_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($gallery_subtitle); ?></h3>    
						<?php endif; ?>	
						<?php if ( ! empty( $gallery_description ) ) : ?>		
							<p><?php echo wp_kses_post($gallery_description); ?></p>    
						<?php endif; ?>	
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery gallery-area wow fadeInUp">
			<?php
				if ( ! empty( $gallery ) ) {
				$gallery = json_decode( $gallery );
				foreach ( $gallery as $gallery_item ) {
					$image = ! empty( $gallery_item->image_url ) ? apply_filters( 'avril_translate_single_string', $gallery_item->image_url, 'Gallery section' ) : '';
			?>
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
			<?php } } ?>
        </div>
    </section>