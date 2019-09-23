<?php
/**
 * Class Tour_Customizer
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_Customizer' ) ) {

	/**
	 * Realize WP Customizer functionality.
	 */
	class Tour_Customizer extends Abstract_Tour_Customizer {

		/**
		 * Register WP Customizer assets
		 */
		public function register_assets() {
			wp_enqueue_script( 'Tour-customizer', get_template_directory_uri() . '/assets/js/customizer.js', [ 'customize-preview' ], Tour::THEME_VERSION, true );
		} // end of register_assets method;

		/**
		 * Register WP Customizer panels, sections & settings.
		 *
		 * @param WP_Customize_Manager $wp_customize - Manager instance passed via hook `customize_register`.
		 */
		public function customize_register( WP_Customize_Manager $wp_customize ) {
			$this->change_theme_mods_transport( $wp_customize );
			$this->selective_refresh( $wp_customize );
		} // end of customize_register method;

		/**
		 * Change transport type of default settings.
		 *
		 * @param WP_Customize_Manager $wp_customize - Manager instance passed via hook `customize_register`.
		 */
		private function change_theme_mods_transport( WP_Customize_Manager $wp_customize ) {
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		} // end of change_theme_mods_transport method;

		/**
		 * Setup selective refresh for theme partials.
		 *
		 * @param WP_Customize_Manager $wp_customize - Manager instance passed via hook `customize_register`.
		 */
		private function selective_refresh( WP_Customize_Manager $wp_customize ) {
			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial( 'blogname', [
					'selector'        => '.site-title a',
					'render_callback' => [ $this->theme->components, 'blog_info_name' ],
				] );
				$wp_customize->selective_refresh->add_partial( 'blogdescription', [
					'selector'        => '.site-description',
					'render_callback' => [ $this->theme->components, 'blog_info_description' ],
				] );
			}
		} // end of selective_refresh method;

	} // end of Tour_Customizer class;

} // end of if;
