<?php
/**
Template Name: Blog Masonary
**/

get_header();
?>
<?php 
	$pg_blog_title					= get_theme_mod('pg_blog_title','Technology from tomorrow');
	$pg_blog_subtitle				= get_theme_mod('pg_blog_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Blog</b>                                   <b>Blog</b><b>Blog</b></span></span>');
	$pg_blog_desc			= get_theme_mod('pg_blog_desc','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
?>

 <section id="post-section" class="post-section av-py-default blog-page">
        <div class="av-container">
			<?php if ( ! empty( $pg_blog_title ||  $pg_blog_subtitle || $pg_blog_desc) ) : ?>
				<div class="av-columns-area">
					<div class="av-column-12">
						<div class="heading-default wow fadeInUp">
							 <?php if ( ! empty( $pg_blog_title ) ) : ?>
								<span class='ttl'><?php echo wp_kses_post($pg_blog_title); ?></span>
							<?php endif; ?>
						   <?php if ( ! empty($pg_blog_subtitle) ) : ?>		
								<h3><?php echo wp_kses_post($pg_blog_subtitle); ?></h3>    
							<?php endif; ?>	                   
							<?php if ( ! empty( $pg_blog_desc ) ) : ?>		
								<p><?php echo wp_kses_post($pg_blog_desc); ?></p>    
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>	
            <div class="av-columns-area wow fadeInUp">
                <div class="av-column-12">
                	<div class="av-masonry av-masonry-3">
						<?php 
							$avril_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
							$args = array( 'post_type' => 'post','paged'=>$avril_paged );	
							$loop = new WP_Query( $args );
						?>
						<?php if( $loop->have_posts() ): ?>
						<?php while( $loop->have_posts() ): $loop->the_post(); ?>
							 <?php get_template_part('template-parts/content/content','page'); ?>
						<?php 
								endwhile;
							endif;
						?>
					</div>
				</div>
                <!-- Pagination -->
				<div class="av-column-12">
					<?php			
					$GLOBALS['wp_query']->max_num_pages = $loop->max_num_pages;						
					// Previous/next page navigation.
					the_posts_pagination( array(
					'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
					'next_text'          => '<i class="fa fa-angle-double-right"></i>',
					) ); ?>
				</div>	
				<!-- Pagination -->
            </div>
        </div>
    </section>
<?php get_footer(); ?>
