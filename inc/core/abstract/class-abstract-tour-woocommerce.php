<?php
/**
 * Class Abstract_Tour_WooCommerce
 *
 * @package Tour/Core/Abstract
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Abstract_Tour_WooCommerce' ) ) {

	/**
	 * Abstraction of WooCommerce functionality:
	 * - Realize setup of WooCommerce.
	 * - Realize prototyping of methods.
	 */
	abstract class Abstract_Tour_WooCommerce {

		/**
		 * Only for internal theme use.
		 *
		 * WooCommerce setup function.
		 *
		 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
		 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
		 *
		 * @return void
		 */
		public function setup() {
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		} // end of setup method;

		/**
		 * Required. Register custom WooCommerce assets (or remove necessary bundled with plugin).
		 */
		abstract public function woocommerce_scripts();

	} // end of Abstract_Tour_WooCommerce abstract class;

} // end of if;
