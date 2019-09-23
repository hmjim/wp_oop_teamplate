<?php
/**
 * Class Tour_Head
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_Head' ) ) {

	/**
	 * Realize custom header functionality.
	 */
	class Tour_Head {

		/**
		 * Setup custom header.
		 */
		public function setup() {
			add_theme_support( 'custom-header', $this->custom_header_args() );
		} // end of setup method;

		/**
		 * Setup pingback header.
		 */
		public function pingback_header() {
			if ( is_singular() && pings_open() ) {
				echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
			}
		} // end of pingback_header method;

		/**
		 * Get custom header arguments.
		 *
		 * @return array
		 */
		private function custom_header_args() {
			return apply_filters( 'Tour_custom_header_args', [
				'default-image'      => '',
				'default-text-color' => '000000',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => [ $this, 'style' ],
			] );
		} // end of custom_header_args method;

		/**
		 * Load custom dynamic styles.
		 */
		public function style() {
			/**
			 * Provide your own dynamic CSS.
			 */
		} // end of style method;

	} // end of Tour_Head class;

} // end of if;
