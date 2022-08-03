<?php
/**
 * Avril Theme Customizer.
 *
 * @package Avril
 */

 if ( ! class_exists( 'Avril_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Avril_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'avril_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts',      array( $this, 'avril_controls_scripts' ) );
			add_action( 'customize_register',                      array( $this, 'avril_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'avril_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function avril_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';			
			
			/**
			 * Register controls
			 */
			$wp_customize->register_control_type( 'Avril_Control_Sortable' );
			$wp_customize->register_control_type( 'Avril_Customizer_Range_Control' );
			
			/**
			 * Helper files
			 */
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-controls.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/sanitization.php';
		}
		
		/**
		 * Customizer Controls
		 *
		 * @since 1.0.0
		 * @return void
		 */
		function avril_controls_scripts() {
				$js_prefix  = '.js';
				$css_prefix = '.css';
				
			// Customizer Core.
			wp_enqueue_script( 'avril-customizer-controls-toggle-js', AVRIL_PARENT_INC_URI . '/customizer/assets/js/customizer-toggle-control' . $js_prefix, array(), AVRIL_THEME_VERSION, true );

			// Customizer Controls.
			wp_enqueue_script( 'avril-customizer-controls-js', AVRIL_PARENT_INC_URI . '/customizer/assets/js/customizer-control' . $js_prefix, array( 'avril-customizer-controls-toggle-js' ), AVRIL_THEME_VERSION, true );
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function avril_customize_preview_js() {
			wp_enqueue_script( 'avril-customizer', AVRIL_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}

		// Include customizer customizer settings.
			
		function avril_customizer_settings() {	
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-header.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-slider.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-info.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-service.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-features.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-portfolio.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-features2.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-gallery.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-pricing.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-team.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-funfact.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-testimonial.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-cta.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-blog.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-skill.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-custom.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-footer.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-page-templates.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-general.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-sidebar.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-section_manager.php';
			require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-style-configurator.php';
		    require AVRIL_PARENT_INC_DIR . '/customizer/customizer-options/avril-typography.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Avril_Customizer::get_instance();