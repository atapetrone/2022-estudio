<?php
// code for custom post type  Pricing
		function avril_pricing() {
	
			$avril_pricing_slug = get_theme_mod('pricing_slug','pricing'); 
			register_post_type( 'avrils_pricing',
				array(
					'labels' => array(
						'name' => __('Pricing', 'avril-pro'),
						'singular_name' => __('Pricing', 'avril-pro'),
						'add_new' => __('Add New', 'avril-pro'),
						'add_new_item' => __('Add New Price Table','avril-pro'),
						'edit_item' => __('Add New Pricing','avril-pro'),
						'new_item' => __('New link ','avril-pro'),
						'all_items' => __('All Pricing','avril-pro'),
						'view_item' => __('View Link','avril-pro'),
						'search_items' => __('Search Links','avril-pro'),
						'not_found' =>  __('No Links found','avril-pro'),
						'not_found_in_trash' => __('No Links found in Trash','avril-pro'), 
						
					),
						'supports' => array('title','thumbnail','comments'),
						'show_in_nav_menus' => false,
						'public' => true,
						'menu_position' => 20,
						'rewrite' => array('slug' => $avril_pricing_slug),
						'menu_icon' => 'dashicons-list-view',
					
				)
			);
		}
		add_action( 'init', 'avril_pricing' );


		// Portfolio Meta Box

		function avril_pricing_init()
		{
							
			add_meta_box('pricing_all_meta', 'Price Table', 'avril_meta_pricing','avrils_pricing', 'normal', 'high');
			
			add_action('save_post','pricing_meta_save');
			
		}


		add_action('admin_init','avril_pricing_init');		
						

						
		function avril_meta_pricing()
		{
			global $post;
			
			$plans_subtitle 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_subtitle', true ));
			$plans_icon 			= sanitize_text_field( get_post_meta( get_the_ID(),'plans_icon', true ));
			$plans_currency 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_currency', true ));
			$plans_price 			= sanitize_text_field( get_post_meta( get_the_ID(),'plans_price', true ));
			$plans_duration 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_duration', true ));
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
			$price_recomended 		= sanitize_text_field( get_post_meta( get_the_ID(),'price_recomended', true ));
			$plans_button_label 	= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_label', true ));
			$plans_button_link 		= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_link', true ));
			$plans_button_link_target 	= sanitize_text_field( get_post_meta( get_the_ID(),'plans_button_link_target', true ));
			
			
			
			
		?>	
			
			<div class="inside">	
				<p><label><?php _e('Plans Icon','avril-pro');?></label></p>
				<p><input style="width:40%; height:40px; padding: 10px;" name="plans_icon" placeholder="<?php _e('fa-lightbulb-o','avril-pro');?>" type="text" value="<?php if (!empty($plans_icon)) echo esc_attr($plans_icon);?>"> </input></p>
				
				<p><label><?php _e('Plans Subtitle','avril-pro');?></label></p>
				<p><input style="width:40%; height:40px; padding: 10px;" name="plans_subtitle" placeholder="<?php _e('Subtitle','avril-pro');?>" type="text" value="<?php if (!empty($plans_subtitle)) echo esc_attr($plans_subtitle);?>"> </input></p>
				
				<p><label><?php _e('Plans Currency','avril-pro');?></label></p>
				<p><input style="width:40%; height:40px; padding: 10px;" name="plans_currency" placeholder="<?php _e('Plans Currency','avril-pro');?>" type="text" value="<?php if (!empty($plans_currency)) echo esc_attr($plans_currency);?>"> </input></p>

				<p><label><?php _e('Plans Price','avril-pro');?></label></p>
				<p><input style="width:40%; height:40px; padding: 10px;" name="plans_price" placeholder="<?php _e('Plans Price','avril-pro');?>" type="number" value="<?php if (!empty($plans_price)) echo esc_attr($plans_price);?>"> </input></p>

				<p><label><?php _e('Plans Duration','avril-pro');?></label></p>
				<p><input style="width:40%; height:40px; padding: 10px;" name="plans_duration" placeholder="<?php _e('Plans Duration','avril-pro');?>" type="text" value="<?php if (!empty($plans_duration)) echo esc_attr($plans_duration);?>"> </input></p>
				
				<p><label><?php _e('Recommended','avril-pro');?></label></p>
				<p><input style="width:40%; height:40px; padding: 10px;" name="price_recomended" placeholder="<?php _e('Recommended','avril-pro');?>" type="text" value="<?php if (!empty($price_recomended)) echo esc_attr($price_recomended);?>"> </input></p>
			</div>
			
			<div class="inside">	
			
				<p><label><?php _e('1. Plans Features','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;" name="plans_features_1" placeholder="Enter the Plan Features" type="text" value="<?php if (!empty($plans_features_1)) echo esc_attr($plans_features_1);?>"> </input></p>
				
				<p><label><?php _e('2. Plans Features','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;" name="plans_features_2" placeholder="Enter the Plan Features" type="text" value="<?php if (!empty($plans_features_2)) echo esc_attr($plans_features_2);?>"> </input></p>

				<p><label><?php _e('3. Plans Features','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;" name="plans_features_3" placeholder="Enter the Plan Features" type="text" value="<?php if (!empty($plans_features_3)) echo esc_attr($plans_features_3);?>"> </input></p>
				
				<p><label><?php _e('4. Plans Features','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;" name="plans_features_4" placeholder="Enter the Plan Features" type="text" value="<?php if (!empty($plans_features_4)) echo esc_attr($plans_features_4);?>"> </input></p>
				
				<p><label><?php _e('5. Plans Features','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;" name="plans_features_5" placeholder="Enter the Plan Features" type="text" value="<?php if (!empty($plans_features_5)) echo esc_attr($plans_features_5);?>"> </input></p>
				
				<p><label><?php _e('6. Plans Features','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;" name="plans_features_6" placeholder="Enter the Plan Features" type="text" value="<?php if (!empty($plans_features_6)) echo esc_attr($plans_features_6);?>"> </input></p>
				
				<p><label><?php _e('7. Plans Features','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;" name="plans_features_7" placeholder="Enter the Plan Features" type="text" value="<?php if (!empty($plans_features_7)) echo esc_attr($plans_features_7);?>"> </input></p>
				
				<p><label><?php _e('8. Plans Features','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;" name="plans_features_8" placeholder="Enter the Plan Features" type="text" value="<?php if (!empty($plans_features_8)) echo esc_attr($plans_features_8);?>"> </input></p>
				
				<p><label><?php _e('9. Plans Features','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;" name="plans_features_9" placeholder="Enter the Plan Features" type="text" value="<?php if (!empty($plans_features_9)) echo esc_attr($plans_features_9);?>"> </input></p>
				
				<p><label><?php _e('10. Plans Features','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;" name="plans_features_10" placeholder="Enter the Plan Features" type="text" value="<?php if (!empty($plans_features_10)) echo esc_attr($plans_features_10);?>"> </input></p>
				
			</div>
			
			<div class="inside">
				<p><label><?php _e('Plans Button Label','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;" name="plans_button_label" placeholder="<?php _e('Plans Button Label','avril-pro');?>" type="text" value="<?php if (!empty($plans_button_label)) echo esc_attr($plans_button_label);?>"> </input></p>
			
				<p><label><?php _e('Plans Custom URL','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;"  name="plans_button_link" placeholder="<?php _e('Plans Custom URL','avril-pro');?>" type="text" value="<?php if (!empty($plans_button_link)) echo esc_attr($plans_button_link);?>">&nbsp;</input></p>
				<p> <input name="plans_button_link_target" type="checkbox" <?php if(!empty($plans_button_link_target)) echo "checked"; ?> > </input>
				<label><?php _e(' Open link in a new tab','avril-pro'); ?> </label> </p>
			</div>
			
							
			
		<?php 	
		}


		function pricing_meta_save($post_id) 
		{
			if((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
				return;
			
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{     return ;	} 

			if(isset( $_POST['post_ID']))
			{ 	
				$post_ID = $_POST['post_ID'];				
				$post_type=get_post_type($post_ID);
				if($post_type=='avrils_pricing')
				{	
					
					update_post_meta($post_ID, 'plans_subtitle', sanitize_text_field($_POST['plans_subtitle']));
					update_post_meta($post_ID, 'plans_icon', sanitize_text_field($_POST['plans_icon']));
					update_post_meta($post_ID, 'plans_currency', sanitize_text_field($_POST['plans_currency']));
					update_post_meta($post_ID, 'plans_price', sanitize_text_field($_POST['plans_price']));
					update_post_meta($post_ID, 'plans_duration', sanitize_text_field($_POST['plans_duration']));
					update_post_meta($post_ID, 'plans_features_1', sanitize_text_field($_POST['plans_features_1']));
					
					update_post_meta($post_ID, 'plans_features_2', sanitize_text_field($_POST['plans_features_2']));
					update_post_meta($post_ID, 'plans_features_3', sanitize_text_field($_POST['plans_features_3']));
					update_post_meta($post_ID, 'plans_features_4', sanitize_text_field($_POST['plans_features_4']));
					update_post_meta($post_ID, 'plans_features_5', sanitize_text_field($_POST['plans_features_5']));
					
					update_post_meta($post_ID, 'plans_features_6', sanitize_text_field($_POST['plans_features_6']));
					update_post_meta($post_ID, 'plans_features_7', sanitize_text_field($_POST['plans_features_7']));
					update_post_meta($post_ID, 'plans_features_8', sanitize_text_field($_POST['plans_features_8']));
					update_post_meta($post_ID, 'plans_features_9', sanitize_text_field($_POST['plans_features_9']));
					
					update_post_meta($post_ID, 'plans_features_10', sanitize_text_field($_POST['plans_features_10']));
					update_post_meta($post_ID, 'price_recomended', sanitize_text_field($_POST['price_recomended']));
					update_post_meta($post_ID, 'plans_button_label', sanitize_text_field($_POST['plans_button_label']));
					update_post_meta($post_ID, 'plans_button_link', sanitize_text_field($_POST['plans_button_link']));
					update_post_meta($post_ID, 'plans_button_link_target', sanitize_text_field($_POST['plans_button_link_target']));
					
				}
			}
		}



	// Pricing Category Texonomy

		function avril_pricing_taxonomy() 
		{	
			$avril_pricing_category_slug = get_theme_mod('texo_pricing_slug','pricing_category'); 
			register_taxonomy(
				'pricing_categories',
				'avrils_pricing',
				array(
					'hierarchical' => true,
					'label' => 'Pricing Categories',
					'show_in_nav_menus' => true,
					'query_var' => true,
					'rewrite' => array('slug' => $avril_pricing_category_slug )
					)
			);
			
		}
		add_action( 'init', 'avril_pricing_taxonomy' );
		

?>