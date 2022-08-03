<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Avril
 */

get_header();
$avril_search_pg_layout 				= get_theme_mod('search_pg_layout', 'avril_rsb');
?>
<section id="post-section" class="post-section av-py-default blog-page">
	<div class="av-container">
		<div class="av-columns-area wow fadeInUp">
			<?php if($avril_search_pg_layout == 'avril_lsb'): get_sidebar(); endif; ?>	
			 <?php if($avril_search_pg_layout == 'avril_fullwidth'): ?>
				<div class="av-column-12  wow fadeInUp">
			<?php else: ?>	
				<div id="av-primary-content" class="av-column-8  wow fadeInUp">
			<?php endif; ?>	
			
				<?php if( have_posts() ): ?>
				
					<?php while( have_posts() ) : the_post();
					
							get_template_part('template-parts/content/content','page'); 
							
					endwhile; 
					the_posts_navigation();
					?>
					
				<?php else: ?>
				
					<?php get_template_part('template-parts/content/content','none'); ?>
					
				<?php endif; ?>
			</div>
			<?php if($avril_search_pg_layout == 'avril_rsb'): get_sidebar(); endif; ?>
		</div>
	</div>
</section> 
<?php get_footer(); ?>
