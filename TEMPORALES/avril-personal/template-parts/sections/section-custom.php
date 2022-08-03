<?php 
	$custom_title					= get_theme_mod('custom_title','Technology from tomorrow');
	$custom_subtitle				= get_theme_mod('custom_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Custom</b>                                   <b>Custom</b><b>Custom</b></span></span>');
	$custom_description			= get_theme_mod('custom_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$avril_custom_editor			= get_theme_mod('avril_custom_editor','Custom Section Description');
?>
 <section id="custom-section" class="post-section post-shadow av-py-default">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                        <?php if ( ! empty( $custom_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($custom_title); ?></span>
						<?php endif; ?>
					   <?php if ( ! empty( $custom_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($custom_subtitle); ?></h3>    
						<?php endif; ?>	                   
						<?php if ( ! empty( $custom_description ) ) : ?>		
							<p><?php echo wp_kses_post($custom_description); ?></p>    
						<?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="av-columns-area wow fadeInUp">
					<div class="av-column-12 av-md-column-12 mb-4 mb-av-0">
						<?php 
							if ( ! empty( $avril_custom_editor ) ) : 	
								 echo wp_kses_post($avril_custom_editor);  
							 endif; 
						 ?>
					</div>
            </div>
        </div>
    </section>