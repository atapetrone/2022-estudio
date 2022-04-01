<?php 
	$avril_blog_title			= get_theme_mod('blog_title','Technology from tomorrow');
	$blog_subtitle				= get_theme_mod('blog_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Blog</b>                                   <b>Blog</b><b>Blog</b></span></span>');
	$blog_description			= get_theme_mod('blog_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$blog_category_id			= get_theme_mod('blog_category_id');
	$blog_column				= get_theme_mod('blog_column','4');
	$blog_display_num			= get_theme_mod('blog_display_num','3');
?>
 <section id="post-section" class="post-section post-shadow av-py-default home-blog">
        <div class="av-container">
            <div class="av-columns-area">
                <div class="av-column-12">
                    <div class="heading-default wow fadeInUp">
                        <?php if ( ! empty( $avril_blog_title ) ) : ?>
							<span class='ttl'><?php echo wp_kses_post($avril_blog_title); ?></span>
						<?php endif; ?>
					   <?php if ( ! empty( $blog_subtitle ) ) : ?>		
							<h3><?php echo wp_kses_post($blog_subtitle); ?></h3>    
						<?php endif; ?>	                   
						<?php if ( ! empty( $blog_description ) ) : ?>		
							<p><?php echo wp_kses_post($blog_description); ?></p>    
						<?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="av-columns-area wow fadeInUp">
				<?php 	
				$args = array( 'post_type' => 'post', 'category__in' => $blog_category_id, 'posts_per_page' => $blog_display_num,'post__not_in'=>get_option("sticky_posts")) ; 	
					query_posts( $args );
					if(query_posts( $args ))
					{	
					while(have_posts()):the_post(); 
				?>
					<div class="av-column-<?php echo esc_attr($blog_column); ?> av-md-column-6 mb-4 mb-av-0">
						<article class="post-items">
							<figure class="post-image">
								<a href="<?php esc_url(the_permalink()); ?>" class="post-hover">
									<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
								</a>
								<span class="posted-on post-date">
									<a href="<?php echo esc_url(the_date('Y/m/d')); ?>"><span><?php echo esc_html(get_the_date('j')); ?></span><?php echo esc_html(get_the_date('M, Y')); ?></a>
								</span>
								<div class="post-meta imu">
									<span class="post-list">
										<ul class="post-categories"><li><a href="<?php esc_url(the_permalink()); ?>"><?php the_category(' '); ?></a></li></ul>
									</span>
								</div>
							</figure>
							<div class="post-content">
								<div class="post-meta up">
									<span class="posted-on">
										<a href="<?php echo esc_url(the_date('Y/m/d')); ?>"><?php echo esc_html(get_the_date('M j Y')); ?></a>
									</span>
								</div>
								<?php     
									if ( is_single() ) :
									
									the_title('<h5 class="post-title">', '</h5>' );
									
									else:
									
									the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
									
									endif; 
									
									the_content( 
											sprintf( 
												__( 'Read More', 'avril-pro' ), 
												'<span class="screen-reader-text">  '.get_the_title().'</span>' 
											) 
										);
								?> 
								<div class="post-meta down">
									<span class="author-name">
										<i class="fa fa-user-secret"></i> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html(the_author()); ?></a>
									</span>
									<span class="comments-link">
										<i class="fa fa-comment"></i> <a href="<?php echo esc_url(get_comments_link( $post->ID )); ?>"><?php echo esc_html(get_comments_number($post->ID)); ?> <?php esc_html_e('Comments','avril-pro'); ?></a>
									</span>
									<!--span class="favourite-link">
										<i class="icofont-heart-alt"></i> <a href="javascript:void(0)">474</a>
									</span-->
								</div>
							</div>
						</article>
					</div>
				<?php 
					endwhile; 
					}
				?>
            </div>
        </div>
    </section>