<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Avril
 */

get_header();
$avril_blog_single_layout 			= get_theme_mod('blog_single_layout', 'avril_rsb'); 
?>
 <section id="blog-section" class="blog-section av-py-default">
	<div class="av-container">
		<div class="av-columns-area">
			<?php if($avril_blog_single_layout == 'avril_lsb'): get_sidebar(); endif; ?>	
			 <?php if($avril_blog_single_layout == 'avril_fullwidth'): ?>
				<div class="av-column-12  wow fadeInUp">
			<?php else: ?>	
				<div id="av-primary-content" class="av-column-8  wow fadeInUp">
			<?php endif; ?>	
				<?php if( have_posts() ): ?>
					<?php while( have_posts() ): the_post(); ?>
						<?php get_template_part('template-parts/content/content','page'); ?> 
					<?php endwhile; ?>
				<?php endif; ?>
				
				<?php 
					$avril_enable_author_box		= get_theme_mod('enable_author_box','1');
					if($avril_enable_author_box == '1'){
						get_template_part('template-parts/content/content-author','meta'); 
					}
				?>
				<?php comments_template( '', true ); // show comments  ?>
			</div>
			<?php if($avril_blog_single_layout == 'avril_rsb'): get_sidebar(); endif; ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
