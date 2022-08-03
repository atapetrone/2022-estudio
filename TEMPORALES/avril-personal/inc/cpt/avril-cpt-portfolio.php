<?php
// code for custom post type  portfolio
		 

		function avril_portfolio() {
	
			$portfolio_slug = get_theme_mod('portfolio_slug','portfolio'); 
			register_post_type( 'avril_portfolio',
				array(
					'labels' => array(
						'name' => __('Portfolio', 'avril-pro'),
						'singular_name' => __('Portfolio', 'avril-pro'),
						'add_new' => __('Add New', 'avril-pro'),
						'add_new_item' => __('Add New Portfolio','avril-pro'),
						'edit_item' => __('Edit Portfolio','avril-pro'),
						'new_item' => __('New Facebook link ','avril-pro'),
						'all_items' => __('All Portfolio','avril-pro'),
						'view_item' => __('View Link','avril-pro'),
						'search_items' => __('Search Links','avril-pro'),
						'not_found' =>  __('No Links found','avril-pro'),
						'not_found_in_trash' => __('No Links found in Trash','avril-pro'), 
						
					),
						'supports' => array('title','thumbnail','comments'),
						'show_in_nav_menus' => false,
						'public' => true,
						'menu_position' => 20,
						'rewrite' => array('slug' => $portfolio_slug),
						'menu_icon' => 'dashicons-schedule',
					
				)
			);
		}
		add_action( 'init', 'avril_portfolio' );


		// Portfolio Meta Box

		function avril_portfolio_init()
		{
							
			add_meta_box('portfolio_all_meta', 'Portfolio Description', 'avril_meta_portfolio','avril_portfolio', 'normal', 'high');
			
			add_action('save_post','avril_meta_portfolio_save');
		}


		add_action('admin_init','avril_portfolio_init');		
						

						
		function avril_meta_portfolio()
		{
			global $post;
			
			$portfolio_description 			= sanitize_text_field( get_post_meta( get_the_ID(),'portfolio_description', true ));
			$portfolio_button_link 			= sanitize_text_field( get_post_meta( get_the_ID(),'portfolio_button_link', true ));
			$portfolio_button_link_target 	= sanitize_text_field( get_post_meta( get_the_ID(),'portfolio_button_link_target', true ));
		?>	
			<h3><i><?php esc_html_e('Portfolio Short Detail','avril-pro'); ?></i></h3>
			
			<div class="inside">
				<label><?php _e('Portfolio Description','avril-pro');?></label>
				<p><textarea style="width:100%; height:100px; padding: 10px;" placeholder="<?php _e('Portfolio Description','avril-pro');?>" name="portfolio_description" rows="5" cols="10" ><?php if (!empty($portfolio_description)) echo esc_attr($portfolio_description);?></textarea></p>
			</div>
			
			
			<h3><i><?php esc_html_e('Portfolio Single View Detail','avril-pro'); ?></i></h3>

			
			<div class="inside">				
				<p><label><?php _e('Portfolio URL','avril-pro');?></label></p>
				<p><input style="width:100%; height:40px; padding: 10px;"  name="portfolio_button_link" placeholder="<?php _e('Portfolio URL','avril-pro');?>" type="text" value="<?php if (!empty($portfolio_button_link)) echo esc_attr($portfolio_button_link);?>">&nbsp;</input></p>
				<p> <input name="portfolio_button_link_target" type="checkbox" <?php if(!empty($portfolio_button_link_target)) echo "checked"; ?> > </input>
				<label><?php _e('Open link in a new tab','avril-pro'); ?> </label> </p>
			</div>				
			
		<?php 	
		}


		function avril_meta_portfolio_save($post_id) 
		{
			if(isset( $_POST['post_ID']))
			{ 	
				$post_ID = $_POST['post_ID'];				
				$post_type=get_post_type($post_ID);
				if($post_type=='avril_portfolio')
				{	
					update_post_meta($post_ID, 'portfolio_description', sanitize_text_field($_POST['portfolio_description']));
					update_post_meta($post_ID, 'portfolio_button_link', sanitize_text_field($_POST['portfolio_button_link']));
					update_post_meta($post_ID, 'portfolio_button_link_target', sanitize_text_field($_POST['portfolio_button_link_target']));
				}
			}
		}
		
		// Portfolio Category Texonomy
		
		function avril_portfolio_taxonomy() {
		
		$texo_portfolio_slug = get_theme_mod('texo_portfolio_slug','portfolio_category'); 
		register_taxonomy('portfolio_categories', 'avril_portfolio',
			array(
				'hierarchical' => true,
				'label' => 'Portfolio Categories',
				'show_in_nav_menus' => true,
				'query_var' => true,
				'rewrite' => array('slug' => $texo_portfolio_slug )
			)
		);
	
	
		//Default category id		
		$defualt_tex_id = get_option('custom_texo_portfolio_id');
		//quick update category
		if((isset($_POST['action'])) && (isset($_POST['taxonomy']))){		
			wp_update_term($_POST['tax_ID'], 'portfolio_categories', array(
			  'name' => $_POST['name'],
			  'slug' => $_POST['slug']
			));	
			update_option('custom_texo_portfolio_id', $defualt_tex_id);
		}
		else 
		{ 	//insert default category 
			if(!$defualt_tex_id){
				wp_insert_term('ALL','portfolio_categories', array('description'=> 'Default Category','slug' => 'All'));
				$Current_text_id = term_exists('ALL', 'portfolio_categories');
				update_option('custom_texo_portfolio_id', $Current_text_id['term_id']);
			}
		}
		//update category
		if(isset($_POST['submit']) && isset($_POST['action']) )
		{	wp_update_term(isset($_POST['tag_ID']), 'portfolio_categories', array(
			  'name' => isset($_POST['name']),
			  'slug' => isset($_POST['slug']),
			  'description' => isset($_POST['description'])
			));
		}
		// Delete default category
		if(isset($_POST['action']) && isset($_POST['tag_ID']) )
		{	if(($_POST['tag_ID'] == $defualt_tex_id) && $_POST['action']	 =="delete-tag")
			{	
				delete_option('custom_texo_portfolio_id'); 
			} 
		}
	}
	add_action( 'init', 'avril_portfolio_taxonomy' );

?>