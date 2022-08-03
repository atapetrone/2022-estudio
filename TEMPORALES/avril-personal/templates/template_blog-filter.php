<?php
/**
Template Name: Blog Filter
**/

get_header();
?>
<?php 
	$tax = 'post'; 
	$categories = get_terms($tax);	
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
                    <!-- Filter list starts -->
                    <div class="av-filter-wrapper-1">
						<?php 
							$categories = get_categories();
							if (!$categories == 0) {
							?>
							<div class="av-tab-filter">
								<?php foreach ($categories as $category) { ?>
								<?php if($category->name == 'All'){ ?>
									 <a href="javascript:void(0)" data-filter="*" class="active"><?php echo $category->name; ?></a>
								<?php } else{ ?>
									<a href="javascript:void(0)" data-filter=".<?php echo $category->slug; ?>"><?php echo $category->slug; ?></a>
								<?php } } ?>
							</div>
						<?php } ?>	
                        <!-- // -->
                        <div id="av-filter-init-1" class="av-columns-area av-filter-init">
							<?php 
								$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
								$args = array( 'post_type' => 'post','paged'=>$paged );	
								$loop = new WP_Query( $args );
							?>
							<?php if( $loop->have_posts() ): ?>
								<?php while( $loop->have_posts() ): $loop->the_post(); ?>
								<?php
									$terms = get_the_category( $post->ID, 'post' );
														
									if ( $terms && ! is_wp_error( $terms ) ) : 
										$links = array();

										foreach ( $terms as $term ) 
										{
											$links[] = $term->slug;
										}
										
										$tax = join( ' ', $links );		
									else :	
										$tax = '';	
									endif;
							?>
                            <div class="av-column-4 av-sm-column-6 mb-5 av-filter-item <?php echo strtolower($tax); ?>">
                                 <?php get_template_part('template-parts/content/content','page'); ?>
                            </div>
							<?php 
								endwhile;
							endif;
						?>
                        </div>
                    </div>
                </div>
            </div>
               
        </div>
    </section>
<?php get_footer(); ?>
