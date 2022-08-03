<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Avril
 */
$plans_icon 			= sanitize_text_field( get_post_meta( get_the_ID(),'plans_icon', true ));
$plans_subtitle 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_subtitle', true ));
$plans_currency 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_currency', true ));
$plans_price 			= sanitize_text_field( get_post_meta( get_the_ID(),'plans_price', true ));
$plans_duration 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_duration', true ));
$price_recomended 		= sanitize_text_field( get_post_meta( get_the_ID(),'price_recomended', true ));
$plans_features_1 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_1', true ));

$plans_features_2 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_2', true ));
$plans_features_3 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_3', true ));
$plans_features_4 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_4', true ));
$plans_features_5 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_5', true ));

$plans_features_6 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_6', true ));
$plans_features_7 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_7', true ));
$plans_features_8 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_8', true ));
$plans_features_9 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_9', true ));

$plans_features_10 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_features_10', true ));
$plans_button_label 	= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_label', true ));
$plans_button_link 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_link', true ));
$plans_button_link_target 	= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_link_target', true ));
?>
 <?php if($price_recomended) { ?>
	<div class="pricing-item recommended">
		<span class="recommended-badge"><?php echo esc_html($price_recomended); ?></span>
	<?php }else{ ?>	
	<div class="pricing-item">
	<?php } ?>
	<?php if($plans_icon) { ?>
		<span class="pricing-icon"><i class="fa <?php echo esc_attr($plans_icon); ?>"></i></span>
	<?php } ?>	
	<h2><?php echo the_title(); ?></h2>
	<?php if($plans_subtitle) { ?>
		<p><?php echo esc_html($plans_subtitle); ?></p>
	<?php } ?>	
	<?php if($plans_price) { ?>
		<span class="pricing"><sup><?php echo esc_html($plans_currency); ?></sup> <?php echo esc_html($plans_price); ?></span><?php if($plans_duration) { echo esc_html($plans_duration); }?>
	<?php } ?>	
	<ul>
		 <?php if($plans_features_1) { ?>
			<li><?php echo esc_html($plans_features_1); ?></li>
		<?php } ?>
		
		 <?php if($plans_features_2) { ?>
			<li><?php echo esc_html($plans_features_2); ?></li>
		<?php } ?>
		
		 <?php if($plans_features_3) { ?>
			<li><?php echo esc_html($plans_features_3); ?></li>
		<?php } ?>
		
		 <?php if($plans_features_4) { ?>
			<li><?php echo esc_html($plans_features_4); ?></li>
		<?php } ?>
		
		 <?php if($plans_features_5) { ?>
			<li><?php echo esc_html($plans_features_5); ?></li>
		<?php } ?>
		
		 <?php if($plans_features_6) { ?>
			<li><?php echo esc_html($plans_features_6); ?></li>
		<?php } ?>
		
		 <?php if($plans_features_7) { ?>
			<li><?php echo esc_html($plans_features_7); ?></li>
		<?php } ?>
		
		 <?php if($plans_features_8) { ?>
			<li><?php echo esc_html($plans_features_8); ?></li>
		<?php } ?>
		
		 <?php if($plans_features_9) { ?>
			<li><?php echo esc_html($plans_features_9); ?></li>
		<?php } ?>
		
		 <?php if($plans_features_10) { ?>
			<li><?php echo esc_html($plans_features_10); ?></li>
		<?php } ?>
	</ul>
	<?php if($plans_button_label || $plans_button_link) { ?>
		<a href="<?php echo esc_url($plans_button_link); ?>" <?php  if($plans_button_link_target) { echo "target='_blank'"; } ?> class="av-btn av-btn-primary"><?php echo esc_html($plans_button_label); ?></a>
	<?php } ?>	
</div>