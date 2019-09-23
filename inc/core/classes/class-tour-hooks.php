<?php
/**
 * Class Tour_Hooks
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_Hooks' ) ) {

	/**
	 * Realize hooks integration (add actions and filters).
	 */
	class Tour_Hooks extends Abstract_Tour_Hooks {

		/**
		 * Setup custom hooks.
		 */
		protected function custom() {

			/* Registration of your custom theme hooks goes here. */

		} // end of custom method;

		/**
		 * Setup core hooks.
		 */
		protected function core() {
			add_action( 'after_setup_theme', [ $this->theme->core, 'setup' ] );
			add_action( 'after_setup_theme', [ $this->theme->core, 'content_width' ], 0 );
			add_action( 'widgets_init', [ $this->theme->core, 'widgets' ] );
			add_action( 'wp_enqueue_scripts', [ $this->theme->core, 'assets' ] );
			add_action( 'current_screen', [ $this->theme->core, 'editor_style' ] );
			add_filter( 'ds_collector_component_post_types_custom_post_types', [ $this->theme->core, 'custom_post_types' ] );
			add_filter( 'ds_collector_component_post_types_custom_taxonomy', [ $this->theme->core, 'custom_taxonomy' ] );
		} // end of method;

		/**
		 * Setup custom header hooks.
		 */
		protected function head() {
			add_action( 'after_setup_theme', [ $this->theme->head, 'setup' ] );
			add_action( 'wp_head', [ $this->theme->head, 'pingback_header' ] );
		} // end of head method;

		/**
		 * Setup template hooks.
		 */
		protected function template() {
			add_filter( 'body_class', [ $this->theme->template->classes, 'body_classes' ] );
		} // end of template method;

		/**
		 * Setup customizer hooks.
		 */
		protected function customizer() {
			add_action( 'customize_register', [ $this->theme->settings->customizer, 'customize_register' ] );
			add_action( 'customize_preview_init', [ $this->theme->settings->customizer, 'register_assets' ] );
		} // end of customizer method;

		/**
		 * Setup TGMPA hooks.
		 */
		protected function tgmpa() {
			add_action( 'tgmpa_register', [ $this->theme->plugins, 'setup' ] );
		} // end of tgmpa method;

		/**
		 * Setup JetPack plugin hooks.
		 */
		protected function jetpack() {
			if ( ! $this->theme->conditions->is_jetpack_enabled() ) {
				return;
			}

			add_action( 'after_setup_theme', [ $this->theme->jetpack, 'setup' ] );
		} // end of jetpack method;

		/**
		 * Setup WooCommerce plugin hooks.
		 */
		protected function woocommerce() {
			if ( ! $this->theme->conditions->is_wc_enabled() ) {
				return;
			}

			add_action( 'after_setup_theme', [ $this->theme->wc, 'setup' ] );
			add_action( 'wp_enqueue_scripts', [ $this->theme->wc, 'woocommerce_scripts' ] );

			/**
			 * Disable the default WooCommerce stylesheet.
			 *
			 * Removing the default WooCommerce stylesheet and enqueuing your own will
			 * protect you during WooCommerce core updates.
			 *
			 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
			 */
			add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

			add_filter( 'body_class', [ $this->theme->wc, 'woocommerce_active_body_class' ] );
			add_filter( 'loop_shop_per_page', [ $this->theme->wc, 'woocommerce_products_per_page' ] );
			add_filter( 'woocommerce_product_thumbnails_columns', [ $this->theme->wc, 'woocommerce_thumbnail_columns' ] );
			add_filter( 'loop_shop_columns', [ $this->theme->wc, 'woocommerce_loop_columns' ] );
			add_filter( 'woocommerce_output_related_products_args', [ $this->theme->wc, 'woocommerce_related_products_args' ] );
			add_action( 'woocommerce_before_shop_loop', [ $this->theme->wc, 'woocommerce_product_columns_wrapper' ], 40 );
			add_action( 'woocommerce_after_shop_loop', [ $this->theme->wc, 'woocommerce_product_columns_wrapper_close' ], 40 );

			/**
			 * Remove default WooCommerce wrapper.
			 */
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

			add_action( 'woocommerce_before_main_content', [ $this->theme->wc, 'woocommerce_wrapper_before' ] );
			add_action( 'woocommerce_after_main_content', [ $this->theme->wc, 'woocommerce_wrapper_after' ] );
			add_filter( 'woocommerce_add_to_cart_fragments', [ $this->theme->wc, 'woocommerce_cart_link_fragment' ] );
		} // end of woocommerce method;

		/**
		 * Setup Redux plugin hooks.
		 */
		protected function redux() {
			if ( ! $this->theme->conditions->is_ds_redux_integrated() ) {
				return;
			}

			call_user_func( [ $this->theme->settings->redux, 'redux_setup' ] );
		} // end of redux method;

	} // end of Tour_Hooks class;

} // end of if;
