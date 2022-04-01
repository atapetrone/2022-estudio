<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package avril
 */

get_header();
$avril_default_pg_layout 		= get_theme_mod('avril_default_pg_layout', 'avril_rsb'); 
?>
<section id="post-section" class="post-section av-py-default blog-page">
	<div class="av-container">
		<div class="av-columns-area wow fadeInUp">
			<?php if($avril_default_pg_layout == 'avril_lsb'): 
					if ( class_exists( 'WooCommerce' ) ) {
						if( is_account_page() || is_cart() || is_checkout() ) {
							get_sidebar('woocommerce');
						}
						else{ 
							get_sidebar();
						}
					}
					else{ 
						get_sidebar();
					}
			endif; ?>	
			 <?php if($avril_default_pg_layout == 'avril_fullwidth'): ?>
				<div class="av-column-12  wow fadeInUp">
			<?php else: ?>	
				<div id="av-primary-content" class="av-column-8  wow fadeInUp">
			<?php endif; ?>	
				<?php 		
					if( have_posts()) :  the_post();
					
					the_content(); 
					endif;
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
			</div>
			<?php if($avril_default_pg_layout == 'avril_rsb'):
				//get_sidebar();
				if ( class_exists( 'WooCommerce' ) ) {
					if( is_account_page() || is_cart() || is_checkout() ) {
						get_sidebar('woocommerce');
					}
					else{ 
						get_sidebar();
					}
				}
				else{ 
					get_sidebar();
				}
				endif;
			?>
		</div>
	</div>
</section> 	
<?php get_footer(); ?>