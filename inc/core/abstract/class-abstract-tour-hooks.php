<?php
/**
 * Class Abstract_Tour_Hooks
 *
 * @package Tour/Core/Abstract
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Abstract_Tour_Hooks' ) ) {

	/**
	 * Abstraction of hooks functionality:
	 * - Realize `__construct` magic method.
	 * - Realize prototyping of methods.
	 */
	abstract class Abstract_Tour_Hooks {

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
		 * Tour_Hooks constructor.
		 *
		 * @param Tour $theme - Core instance of Tour. For more info read doc of property `theme`.
		 */
		public function __construct( Tour $theme ) {
			// Setup Theme Object.
			$this->theme = $theme;

			// Core.
			$this->core();
			$this->customizer();
			$this->head();
			$this->template();
			$this->tgmpa();

			// Plugins.
			$this->jetpack();
			$this->woocommerce();
			$this->redux();

			// Custom Hooks.
			$this->custom();
		} // end of __construct method;

		/**
		 * Setup core hooks.
		 */
		abstract protected function core();

		/**
		 * Setup customizer hooks.
		 */
		abstract protected function customizer();

		/**
		 * Setup custom header hooks.
		 */
		abstract protected function head();

		/**
		 * Setup template hooks.
		 */
		abstract protected function template();

		/**
		 * Setup TGMPA hooks.
		 */
		abstract protected function tgmpa();

		/**
		 * Setup JetPack plugin hooks.
		 */
		abstract protected function jetpack();

		/**
		 * Setup WooCommerce plugin hooks.
		 */
		abstract protected function woocommerce();

		/**
		 * Setup Redux plugin hooks.
		 */
		abstract protected function redux();

		/**
		 * Setup custom hooks.
		 */
		abstract protected function custom();
	} // end of Abstract_Tour_Hooks abstract class;

} // end of if;
