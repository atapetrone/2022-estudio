<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Avril
 */

get_header();
$pg_404_title1			= get_theme_mod('pg_404_title1','4');
$pg_404_title2			= get_theme_mod('pg_404_title2','4');
$pg_404_subtitle		= get_theme_mod('pg_404_subtitle','OOPS! YOUR PAGE NOT FOUND...');
$pg_404_btn_lbl			= get_theme_mod('pg_404_btn_lbl','Go To Home');
$pg_404_btn_link		= get_theme_mod('pg_404_btn_link');
$pg_404_img				= get_theme_mod('pg_404_img',get_template_directory_uri() . '/assets/images/bg/smile.svg');
?>
<section id="404-section" class="404-section av-py-default">
	<div class="av-container">
		<div class="av-columns-area wow fadeInUp">
			<div class="av-column-12">
				<div class="av-text-404">
					 <?php if ( ! empty( $pg_404_title1 ||  $pg_404_title2 || $pg_404_img) ) : ?>
						<h1>
						<?php
							if ( ! empty( $pg_404_title1 ) ) : 
								echo esc_html($pg_404_title1); 
							endif;
						?>
							<?php if ( ! empty( $pg_404_img ) ) : ?>
								<img src="<?php echo esc_url( $pg_404_img ); ?>" width="335" >
							<?php endif; ?>
							<?php
								if ( ! empty( $pg_404_title2 ) ) : 
									echo esc_html($pg_404_title2); 
								endif;
							?>
						</h1>
					<?php endif; ?>	
					<?php if ( ! empty($pg_404_subtitle) ) : ?>		
						<h2><?php echo esc_html($pg_404_subtitle); ?></h2>    
					<?php endif; ?>	
					<?php if ( ! empty($pg_404_btn_lbl) ) : ?>		
						<a href="<?php echo esc_url($pg_404_btn_link); ?>" class="av-btn av-btn-primary"><i class="fa fa-angle-left"></i>    <?php echo esc_html($pg_404_btn_lbl); ?></a>   
					<?php endif; ?>	
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
