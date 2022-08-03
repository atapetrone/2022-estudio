<?php 
	$skill_title			= get_theme_mod('skill_title','Technology from tomorrow');
	$skill_subtitle			= get_theme_mod('skill_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Skills</b>                                   <b>Skills</b><b>Skills</b></span></span>');
	$skill_desc				= get_theme_mod('skill_desc','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$skills					= get_theme_mod('skills',avril_get_skill_default());
	$skill_img				= get_theme_mod('skill_img',get_template_directory_uri() . '/assets/images/about/img01.jpg');
?>
<section id="skills-section" class="skills-section av-py-default">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                        <?php if ( ! empty( $skill_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($skill_title); ?></span>
						<?php endif; ?>
					   <?php if ( ! empty( $skill_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($skill_subtitle); ?></h3>    
						<?php endif; ?>	                   
						<?php if ( ! empty( $skill_desc ) ) : ?>		
							<p><?php echo wp_kses_post($skill_desc); ?></p>    
						<?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="av-columns-area wow fadeInUp">
                <div class="av-column-5 av-md-column-6 mb-4 mb-av-0">
                    <div class="skills-image">
						<?php if ( ! empty( $skill_img ) ) : ?>	
							<img src="<?php echo esc_url($skill_img); ?>" alt=""/>
						<?php endif; ?>	
                    </div>
                </div>
                <div class="av-column-7 av-md-column-6">
                    <div class="skills-wrapper">
						<?php
							if ( ! empty( $skills ) ) {
							$skills = json_decode( $skills );
							foreach ( $skills as $skill_item ) {
								$avril_skill_title = ! empty( $skill_item->title ) ? apply_filters( 'avril_translate_single_string', $skill_item->title, 'Skill section' ) : '';
								$subtitle = ! empty( $skill_item->subtitle ) ? apply_filters( 'avril_translate_single_string', $skill_item->subtitle, 'Skill section' ) : '';
								$text = ! empty( $skill_item->text ) ? apply_filters( 'avril_translate_single_string', $skill_item->text, 'Skill section' ) : '';
						?>
							<div class="skills-panel">
								<div class="skills-growth">
									<div class="progressbar" data-animate="false">
										<?php if ( ! empty( $avril_skill_title ) ) : ?>
											<div class="circle" data-percent="<?php echo esc_html($avril_skill_title); ?>">
												<div></div>
											</div>
										<?php endif; ?>	
									</div>
								</div>
								<div class="skills-content">
									<?php if ( ! empty( $subtitle ) ) : ?>
										<h4><?php echo esc_html($subtitle); ?></h4>
									<?php endif; ?>		
									<?php if ( ! empty( $text ) ) : ?>
										<p><?php echo esc_html($text); ?></p>
									<?php endif; ?>	
								</div>
							</div>
						<?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </section> 