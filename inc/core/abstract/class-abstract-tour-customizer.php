<?php
/**
 * Class Abstract_Tour_Customizer
 *
 * @package Tour/Core/Abstract
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Abstract_Tour_Customizer' ) ) {

	/**
	 * Abstraction of customizer functionality:
	 * - Realize `__get` (access to `theme_mods`) and `__construct` (set property `theme`) magic methods.
	 * - Realize prototyping of methods.
	 */
	abstract class Abstract_Tour_Customizer {

		/**
		 * Core instance of Tour.
		 * This property was created, because we can not access function `Tour` inside components:
		 * Error with recursion calls.
		 *
		 * @link https://en.wikipedia.org/wiki/Recursion#In_computer_science
		 *
		 * @var $theme Tour
		 */
		protected $theme = null;

		/**
		 * Tour_Customizer constructor.
		 *
		 * @param Tour $theme - Core instance of Tour. For more info read doc of property `theme`.
		 */
		public function __construct( $theme ) {
			$this->theme = $theme;
		} // end of __construct method;

		/**
		 * Return theme mod via "magic"-property
		 *
		 * @param string $key - Theme mod name.
		 *
		 * @return mixed
		 */
		public function __get( $key ) {
			return get_theme_mod( $key );
		} // end of __get magic method;

		/**
		 * Register WP Customizer assets
		 */
		abstract public function register_assets();

		/**
		 * Register WP Customizer panels, sections & settings.
		 *
		 * @param WP_Customize_Manager $wp_customize - Manager instance passed via hook `customize_register`.
		 */
		abstract public function customize_register( WP_Customize_Manager $wp_customize );

	} // end of Abstract_Tour_Customizer abstract class;

} // end of if;
