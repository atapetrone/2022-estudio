<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Avril
 */
$portfolio_description 		= sanitize_text_field( get_post_meta( get_the_ID(),'portfolio_description', true ));
$portfolio_link 			= sanitize_text_field( get_post_meta( get_the_ID(),'portfolio_button_link', true ));
$portfolio_button_link_target 	= sanitize_text_field( get_post_meta( get_the_ID(),'portfolio_button_link_target', true ));

if($portfolio_link) { 
	$portfolio_link; 
}	
else { 
	$portfolio_link = get_post_permalink(); 
} 
?>
<figure class="portfolio-item mgf-popup">                                    
	<div class="portfolio-icon">
		<?php 
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
		?>
		<a href="<?php echo get_the_post_thumbnail_url(); ?>" class="image" title="This is a portfolio">
			<?php 
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
			?>	
			<div class="portfolio-caption">
				<h6><?php echo the_title(); ?></h6>
				<p><?php echo esc_html($portfolio_description); ?></p>
				<i class="fa fa-search"></i>
			</div>
		</a>
	</div>                                    
</figure>