<?php
/**
 * Template part for displaying author Meta
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Avril
 */

?>
<div class="xl-column-12">
	<article class="blog-post author-details">
		<div class="section-header">
			<h2><?php esc_html_e('About the Author','avril-pro'); ?></h2>
		</div>
		<?php
			$avril_author_description = get_the_author_meta( 'description' );
			$avril_author_id          = get_the_author_meta( 'ID' );
			$avril_current_user_id    = is_user_logged_in() ? wp_get_current_user()->ID : false;
		?>
		<div class="media">
			<div class="auth-mata">
				<?php echo get_avatar( get_the_author_meta('ID'), 200); ?>
			</div>
			<div class="media-body author-meta-det">
				<h4><?php the_author_link(); ?></h4>
					<?php
						if ( '' === $avril_author_description ) {
							if ( $avril_current_user_id && $avril_author_id === $avril_current_user_id ) {

								// Translators: %1$s: <a> tag. %2$s: </a>.
								printf( wp_kses_post( __( 'You haven&rsquo;t entered your Biographical Information yet. %1$sEdit your Profile%2$s now.', 'avril-pro' ) ), '<br/><a href="' . esc_url( get_edit_user_link( $avril_current_user_id ) ) . '">', '</a>' );
							}
						} else {
						?>
						<p><?php echo wp_kses_post( $avril_author_description ); ?></p>
						<?php	
						}
					?>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>" class="av-btn av-btn-primary"><?php esc_html_e('View All Post','avril-pro'); ?></a>

			</div>
		</div>	
	</article>
</div>
