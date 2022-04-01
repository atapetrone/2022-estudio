<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Avril
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-items mb-6'); ?>>
	<figure class="post-image">
	   <a href="<?php esc_url(the_permalink()); ?>" class="post-hover">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
		</a>
		<div class="post-meta imu">
			<span class="post-list">
			   <ul class="post-categories"><li><a href="<?php esc_url(the_permalink()); ?>"><?php the_category(' '); ?></a></li></ul>
			</span>
		</div>
	</figure>
	<?php get_template_part('template-parts/content/content','sticky'); ?>
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