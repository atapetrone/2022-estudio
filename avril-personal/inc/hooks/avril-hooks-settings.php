<?php
/**
 * Add a Hook panel in the main WordPress menu
 *
 * Based on WordPress Settings API https://codex.wordpress.org/Settings_API
 *
 */

/**
 * Class Avril_Hooks_Settings
 */
class Avril_Hooks_Settings {

	/**
	 * Settings base
	 *
	 * @access private
	 * @var string
	 */
	private $settings_base;

	/**
	 * Hooks Settings
	 *
	 * @access private
	 * @var string
	 */
	private $hooks_settings;

	/**
	 * Avril_Hooks_Settings constructor.
	 */
	public function __construct() {

		$this->settings_base = '';

		// Initialise settings
		add_action( 'admin_init', array( $this, 'init' ) );

		// Register plugin settings
		add_action( 'admin_init', array( $this, 'register_settings' ) );

		// Add settings page to menu
		add_action( 'admin_menu', array( $this, 'add_menu_item' ) );
	}

	/**
	 * Initialise settings
	 *
	 * @return void
	 */
	public function init() {
		$this->hooks_settings = $this->hooks_settings_fields();
	}

	/**
	 * Add settings page to admin menu
	 *
	 * @return void
	 */
	public function add_menu_item() {
		$page = add_theme_page( esc_html__( 'Avril PRO hooks', 'avril-pro' ), esc_html__( 'Avril PRO hooks', 'avril-pro' ), 'edit_theme_options', 'avril_hooks_settings', array( $this, 'build_hooks_settings_page' ) );
		add_action( 'admin_print_styles-' . $page, array( $this, 'hooks_settings_assets' ) );
	}

	/**
	 * Enqueue scripts and styles needed
	 */
	public function hooks_settings_assets() {
		wp_enqueue_script( 'avril-pro-hooks-seetings-js', get_template_directory_uri() . '/inc/hooks/js/functions.js', array( 'jquery' ) );
		wp_enqueue_style( 'avril-pro-hooks-settings-css', get_template_directory_uri() . '/inc/hooks/css/hooks.css', array() );
	}

	/**
	 * Build hooks settings fields
	 *
	 * @return array Fields displayed on hooks settings page
	 */
	private function hooks_settings_fields() {

		$hooks_settings['standard'] = array(
			'title'  => '',
			'fields' => array(
			
			
			    // Top Header Section
				array(
					'name' => esc_html__( 'Before Header Section', 'avril-pro' ),
					'id'   => 'avril_before_header_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Header Section', 'avril-pro' ),
					'id'   => 'avril_after_header_section_hook',
					'type' => 'textarea',
				),
				
				// Slider Section
				array(
					'name' => esc_html__( 'Before Slider Section', 'avril-pro' ),
					'id'   => 'avril_before_slider_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Slider Section', 'avril-pro' ),
					'id'   => 'avril_after_slider_section_hook',
					'type' => 'textarea',
				),
				
				// Info Section
				array(
					'name' => esc_html__( 'Before Info Section', 'avril-pro' ),
					'id'   => 'avril_before_info_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Info Section', 'avril-pro' ),
					'id'   => 'avril_after_info_section_hook',
					'type' => 'textarea',
				),
				
				// Service Section
				array(
					'name' => esc_html__( 'Before Service Section', 'avril-pro' ),
					'id'   => 'avril_before_service_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Service Section', 'avril-pro' ),
					'id'   => 'avril_after_service_section_hook',
					'type' => 'textarea',
				),
				
			// Feature Section
				array(
					'name' => esc_html__( 'Before Feature Section', 'avril-pro' ),
					'id'   => 'avril_before_feature_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Feature Section', 'avril-pro' ),
					'id'   => 'avril_after_feature_section_hook',
					'type' => 'textarea',
				),	

			// Portfolio Section
				array(
					'name' => esc_html__( 'Before Portfolio Section', 'avril-pro' ),
					'id'   => 'avril_before_portfolio_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Portfolio Section', 'avril-pro' ),
					'id'   => 'avril_after_portfolio_section_hook',
					'type' => 'textarea',
				),	

			// Feature2 Section
				array(
					'name' => esc_html__( 'Before Feature2 Section', 'avril-pro' ),
					'id'   => 'avril_before_feature2_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Feature2 Section', 'avril-pro' ),
					'id'   => 'avril_after_feature2_section_hook',
					'type' => 'textarea',
				),	
				
				// Gallery Section
				array(
					'name' => esc_html__( 'Before Gallery Section', 'avril-pro' ),
					'id'   => 'avril_before_gallery_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Gallery Section', 'avril-pro' ),
					'id'   => 'avril_after_gallery_section_hook',
					'type' => 'textarea',
				),	
				
				// Pricing Section
				array(
					'name' => esc_html__( 'Before Pricing Section', 'avril-pro' ),
					'id'   => 'avril_before_pricing_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Pricing Section', 'avril-pro' ),
					'id'   => 'avril_after_pricing_section_hook',
					'type' => 'textarea',
				),
				
				// Team Section
				array(
					'name' => esc_html__( 'Before Team Section', 'avril-pro' ),
					'id'   => 'avril_before_team_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Team Section', 'avril-pro' ),
					'id'   => 'avril_after_team_section_hook',
					'type' => 'textarea',
				),
				
				// Funfact Section
				array(
					'name' => esc_html__( 'Before Funfact Section', 'avril-pro' ),
					'id'   => 'avril_before_funfact_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Funfact Section', 'avril-pro' ),
					'id'   => 'avril_after_funfact_section_hook',
					'type' => 'textarea',
				),
				
				// Testimonial Section
				array(
					'name' => esc_html__( 'Before Testimonial Section', 'avril-pro' ),
					'id'   => 'avril_before_testimonial_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Testimonial Section', 'avril-pro' ),
					'id'   => 'avril_after_testimonial_section_hook',
					'type' => 'textarea',
				),
				
				// CTA Section
				array(
					'name' => esc_html__( 'Before CTA Section', 'avril-pro' ),
					'id'   => 'avril_before_cta_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After CTA Section', 'avril-pro' ),
					'id'   => 'avril_after_cta_section_hook',
					'type' => 'textarea',
				),
				
				// Blog Section
				array(
					'name' => esc_html__( 'Before Blog Section', 'avril-pro' ),
					'id'   => 'avril_before_blog_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Blog Section', 'avril-pro' ),
					'id'   => 'avril_after_blog_section_hook',
					'type' => 'textarea',
				),
				
				// Skill Section
				array(
					'name' => esc_html__( 'Before Skill Section', 'avril-pro' ),
					'id'   => 'avril_before_skill_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Skill Section', 'avril-pro' ),
					'id'   => 'avril_after_skill_section_hook',
					'type' => 'textarea',
				),
				
				// Custom Section
				array(
					'name' => esc_html__( 'Before Custom Section', 'avril-pro' ),
					'id'   => 'avril_before_custom_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Custom Section', 'avril-pro' ),
					'id'   => 'avril_after_custom_section_hook',
					'type' => 'textarea',
				),
				
				// Footer Section
				array(
					'name' => esc_html__( 'Before Footer Section', 'avril-pro' ),
					'id'   => 'avril_before_footer_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Footer Section', 'avril-pro' ),
					'id'   => 'avril_after_footer_section_hook',
					'type' => 'textarea',
				),
				
				//  About Page
				array(
					'name' => esc_html__( 'Before About Page', 'avril-pro' ),
					'id'   => 'avril_before_about_pg_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After About Page', 'avril-pro' ),
					'id'   => 'avril_after_about_pg_section_hook',
					'type' => 'textarea',
				),
				
				//  Contact Page
				array(
					'name' => esc_html__( 'Before Contact Page', 'avril-pro' ),
					'id'   => 'avril_before_contact_pg_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Contact Page', 'avril-pro' ),
					'id'   => 'avril_after_contact_pg_section_hook',
					'type' => 'textarea',
				),
				
				//  Gallery Page
				array(
					'name' => esc_html__( 'Before Gallery Page', 'avril-pro' ),
					'id'   => 'avril_before_gallery_pg_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Gallery Page', 'avril-pro' ),
					'id'   => 'avril_after_gallery_pg_section_hook',
					'type' => 'textarea',
				),
				
				//  Service Page
				array(
					'name' => esc_html__( 'Before Service Page', 'avril-pro' ),
					'id'   => 'avril_before_service_pg_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Service Page', 'avril-pro' ),
					'id'   => 'avril_after_service_pg_section_hook',
					'type' => 'textarea',
				),
				
				//  Pricing Page
				array(
					'name' => esc_html__( 'Before Pricing Page', 'avril-pro' ),
					'id'   => 'avril_before_pricing_pg_section_hook',
					'type' => 'textarea',
				),
				
				array(
					'name' => esc_html__( 'After Pricing Page', 'avril-pro' ),
					'id'   => 'avril_after_pricing_pg_section_hook',
					'type' => 'textarea',
				),
			),
		);

		$hooks_settings = apply_filters( 'avril_hooks_settings_fields', $hooks_settings );

		return $hooks_settings;
	}

	/**
	 * Register settings
	 */
	public function register_settings() {

		if ( ! empty( $this->hooks_settings ) ) {

			if ( is_array( $this->hooks_settings ) ) {

				foreach ( $this->hooks_settings as $section => $data ) {

					/* Add a new section on the Hooks Settings page for each Hook */
					add_settings_section(
						$section, $data['title'], array(
							$this,
							'hooks_settings_section_callback',
						), 'avril_hooks_settings'
					);

					foreach ( $data['fields'] as $field ) {

						// Register field
						register_setting( 'avril_hooks_settings', 'avril_hooks', '' );

						// Add field to page
						add_settings_field(
							'avril_hooks[' . $field['id'] . ']', $field['name'], array(
								$this,
								'display_field',
							), 'avril_hooks_settings', $section, array(
								'field' => $field,
							)
						);
					}
				}
			}
		}
	}

	/**
	 * Callback for add_settings_section
	 */
	public function hooks_settings_section_callback() {
		$html = '';
		echo $html;
	}

	/**
	 * Generate HTML for displaying fields
	 *
	 * @param  array $args Field data.
	 * @return void
	 */
	public function display_field( $args ) {

		$field = $args['field'];

		$html = '';

		$option_name = $this->settings_base . $field['id'];
		$option      = get_option( 'avril_hooks' );

		$data = '';
		if ( isset( $option[ $option_name ] ) ) {
			$data = $option[ $option_name ];
		} elseif ( isset( $field['default'] ) ) {
			$data = $field['default'];
		}

		switch ( $field['type'] ) {

			case 'textarea':
				$checked = '';
				if ( isset( $option[ $field['id'] . '_php' ] ) && 'true' == $option[ $field['id'] . '_php' ] ) {
					$checked = 'checked="checked"';
				}
				$html .= '<textarea class="avril_hook_field_textarea" id="avril_hooks[' . esc_attr( $field['id'] ) . ']" name="avril_hooks[' . esc_attr( $field['id'] ) . ']" placeholder="' . ( ( ! empty( $field['description'] ) ) ? esc_attr( $field['description'] ) : '' ) . '" >' . esc_textarea( $data ) . '</textarea>';
				$html .= '<div class="execute"><input type="checkbox" name="avril_hooks[' . esc_attr( $field['id'] ) . '_php]" id="avril_hooks[' . esc_attr( $field['id'] ) . '_php]" value="true" ' . $checked . ' /> <label for="avril_hooks[' . esc_attr( $field['id'] ) . '_php]">' . esc_html__( 'Execute PHP', 'avril-pro' ) . '</label></div>';
				break;

			case 'checkbox':
				break;

		}

		echo $html;
	}

	/**
	 * Build hooks settings page
	 */
	public function build_hooks_settings_page() {

		$html = '';

		$html .= '<div class="wrap" id="avril_hooks_settings">';

		$html .= '<h1 class="wp-heading-inline">' . esc_html__( 'Avril PRO hooks', 'avril-pro' ) . '</h1>';

		$html .= '<input type="text" id="avril_search_hooks" onkeyup="avril_filter_hooks()" placeholder="Search hooks...">';

		$html .= '<div id="poststuff">';
		$html .= '<div id="post-body" class="metabox-holder columns-2">';
		$html .= '<form method="post" action="options.php" enctype="multipart/form-data">';

		/* Main page content */
		$html .= '<div id="post-body-content">';
		ob_start();
		settings_fields( 'avril_hooks_settings' );
		do_settings_sections( 'avril_hooks_settings' );
		$html .= ob_get_clean();
		$html .= '</div><!-- #post-body-content -->';

		/* Side box */
		$html .= '<div id="postbox-container-1">';
		$html .= '<div class="postbox">';
		$html .= '<h3 class="hndle">' . esc_html__( 'Avril PRO hooks', 'avril-pro' ) . '</h3>';
		$html .= '<div class="inside">';
		$html .= '<div class="submitbox" id="submitpost">';
		$html .= '<div id="minor-publishing">';
		$html .= '<p>' . esc_html__( 'Shortcodes are allowed. If you check the Execute PHP checkbox, you can also use PHP.', 'avril-pro' ) . '</p>';
		$html .= '</div><!-- #minor-publishing -->';
		$html .= '<div id="major-publishing-actions">';
		$html .= '<div id="publishing-action">';
		$html .= '<input name="Submit" type="submit" class="button button-primary button-large" value="' . esc_attr( __( 'Save hooks', 'avril-pro' ) ) . '" />';
		$html .= '</div><!-- .publishing-action -->';
		$html .= '<div class="clear"></div>';
		$html .= '</div><!-- #major-publishing-actions -->';
		$html .= '</div><!-- #submitpost -->';
		$html .= '</div><!-- .inside -->';
		$html .= '</div><!-- .postbox -->';
		$html .= '</div><!-- #postbox-container-1 -->';

		$html .= '</form>';
		$html .= '</div><!-- #post-body -->';
		$html .= '</div><!-- #poststuff -->';
		$html .= '</div><!-- #Avril_Hooks_Settings -->';

		echo $html;
	}
}

$avril_hooks_settings = new Avril_Hooks_Settings();