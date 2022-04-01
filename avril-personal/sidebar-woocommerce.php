<?php
/**
 * side bar template
 *
 * @package WordPress
 * @subpackage spasalon
 */
?>
<?php if ( ! is_active_sidebar( 'avril-woocommerce-sidebar' ) ) {	return; } ?>
<div id="av-secondary-content" class="av-column-4 mb-6 mb-av-0 wow fadeInUp">
	<section class="sidebar">
		<?php dynamic_sidebar('avril-woocommerce-sidebar'); ?>
	</section>
</div>