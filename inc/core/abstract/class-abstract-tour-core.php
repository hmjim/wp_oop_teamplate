<?php
/**
 * Class Abstract_Tour_Core
 *
 * @package Tour/Core/Abstract
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Abstract_Tour_Core' ) ) {

	/**
	 * Abstraction of core functionality:
	 * - Realize `setup` method.
	 * - Realize prototyping of methods.
	 */
	abstract class Abstract_Tour_Core {

		/**
		 * Core
		 *
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		public function setup() {
			$this->text_domain();

			$this->theme_support();

			$this->nav_menus();
		} // end of setup method;

		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 *
		 * @link https://codex.wordpress.org/I18n_for_WordPress_Developers#Text_Domains
		 */
		abstract protected function text_domain();

		/**
		 * Setup theme features
		 *
		 * @link https://codex.wordpress.org/Theme_Features
		 */
		abstract protected function theme_support();

		/**
		 * Setup navigation menus
		 *
		 * @link https://codex.wordpress.org/Navigation_Menus
		 */
		abstract protected function nav_menus();

		/**
		 * Assets
		 *
		 * Enqueue theme assets (plugins, scripts & styles)
		 */
		public function assets() {
			$this->plugins();

			$this->styles();

			$this->scripts();
		} // end of assets method;

		/**
		 * Setup theme styles
		 *
		 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/#stylesheets
		 */
		abstract protected function styles();

		/**
		 * Setup theme scripts
		 *
		 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/#scripts
		 */
		abstract protected function scripts();

		/**
		 * Setup editor style
		 *
		 * @link https://codex.wordpress.org/Editor_Style
		 */
		abstract public function editor_style();

		/**
		 * Setup plugins styles & scripts of theme
		 *
		 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
		 */
		protected function plugins() {

			/**
			 * Not required method (can be overridden by child class).
			 * Default: empty.
			 */

		} // end of plugins method;

		/**
		 * Register custom post types.
		 *
		 * @see register_post_type()
		 * @return array (format: $slug => $args)
		 */
		public function custom_post_types() {
			return [];
		} // end of custom_post_types method;

		/**
		 * Register custom taxonomy
		 *
		 * @see register_taxonomy()
		 * @return array (format $slug => $args)
		 */
		public function custom_taxonomy() {
			return [];
		} // end of custom_taxonomy method;

	}

}
