<?php
/**
 * Class Tour_Redux
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_Redux' ) ) {

	/**
	 * Realize Redux integration.
	 */
	class Tour_Redux implements Tour_Redux_Theme {

		const SLUG = 'Tour';

		/**
		 * Redux DSManager (helper class) instance.
		 *
		 * @var Tour_Redux_Integration
		 */
		private $manager = null;

		/**
		 * Return Redux option value via "magic"-property.
		 *
		 * @param string $key - Redux option name.
		 *
		 * @return mixed
		 */
		public function __get( $key ) {
			return self::get_redux_option( $key );
		} // end of __get method;

		/**
		 * Return instance of Redux DSManager.
		 *
		 * @return Tour_Redux_Integration
		 */
		public function get_manager() {
			return new Tour_Redux_Integration();
		} // end of get_manager method;

		/**
		 * - Setup Options Panel Name
		 * - Setup Args of Redux
		 * - Setup Sections of Redux
		 * - Setup Fields of Redux
		 *
		 * @return void
		 */
		public function redux_setup() {
			$this->manager = $this->get_manager();

			$this->manager->ds_redux_setup_options_panel_name( self::SLUG );

			$this->setup_args( $this->manager );
			$this->setup_sections( $this->manager );
			$this->setup_fields( $this->manager );

			$this->manager->ds_redux_init();
		} // end of redux_setup method;

		/**
		 * Setup Args of Redux
		 *
		 * @param Tour_Redux_Integration $manager - Instance of Redux DSManager.
		 */
		public function setup_args( $manager ) {
			$theme = wp_get_theme();
			$name  = apply_filters( 'Tour_redux_name', esc_html( $theme->get( 'Name' ) ) );
			$logo  = apply_filters( 'Tour_redux_logo', esc_url( get_template_directory_uri() . '/assets/images/redux/logo.png' ) );

			$manager->ds_redux_add_args( 'display_name', $name );
			$manager->ds_redux_add_args( 'menu_title', $name );
			$manager->ds_redux_add_args( 'page_title', $name );
			$manager->ds_redux_add_args( 'menu_icon', $logo );
			$manager->ds_redux_add_args( 'page_icon', $logo );
		} // end of setup_args method;

		/**
		 * Setup Sections of Redux
		 *
		 * @param Tour_Redux_Integration $manager - Instance of Redux DSManager.
		 */
		public function setup_sections( $manager ) {
			$manager->ds_redux_add_section( esc_html__( 'Homepage', 'Tour' ), 'homepage' );
		} // end of setup_sections method;

		/**
		 * Setup Fields of Redux
		 *
		 * @param Tour_Redux_Integration $manager - Instance of Redux DSManager.
		 */
		public function setup_fields( $manager ) {
			// Homepage Fields.
			$this->homepage_slider_collections();

		} // end of setup_fields method;

		/**
		 * Setup homepage slider collections selector.
		 *
		 * Option name: homepage-slider-collections
		 */
		private function homepage_slider_collections() {
			$options = Tour_Redux_Options::build();

			$id          = 'homepage-slider-collections';
			$title       = esc_html__( 'Collections for Homepage Slider', 'Tour' );
			$choices     = [];
			$common_args = [
				'multi'    => true,
				'sortable' => true,
				'data'     => 'terms',
				'args'     => [
					'taxonomies' => [ 'collection' ],
				],
			];

			$options->addSelectOption( $id, 'homepage', $title, $choices, false, '', $common_args )->setup( $this->manager );
		} // end of homepage_slider_collections method;

		/**
		 * Return Redux option value.
		 *
		 * @param string        $option - Redux option name.
		 * @param callable|null $sanitize_callback - Sanitize callback. If provided - return escaped value.
		 *
		 * @return mixed
		 */
		public static function get_redux_option( $option, callable $sanitize_callback = null ) {
			// There are can be any manipulation with option, before you fetch data from Redux.
			$option = Redux::getOption( self::SLUG, $option );

			if ( is_null( $sanitize_callback ) ) {
				return $option;
			} else {
				return call_user_func( $sanitize_callback, $option );
			}
		} // end of get_redux_option method;

	} // end of Tour_Redux class;

} // end of if;
