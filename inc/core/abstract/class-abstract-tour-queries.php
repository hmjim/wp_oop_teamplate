<?php
/**
 * Class Abstract_Tour_Queries
 *
 * @package Tour/Core/Abstract
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Abstract_Tour_Queries' ) ) {

	/**
	 * Abstraction of queries functionality:
	 * - Realize `__get` (access to methods via "magic"-property) magic method.
	 * - Realize access to global `wp_query`.
	 */
	abstract class Abstract_Tour_Queries {

		/**
		 * Access to queries by pseudo-params.
		 *
		 * @param string $key - Name of method to access. Must to be without arguments.
		 *
		 * @return mixed - result of method execution on success, `false` on failure.
		 */
		public function __get( $key ) {
			if ( method_exists( $this, $key ) ) {
				// If method contain required params - error will be triggered, so, here not sense to check it.
				return call_user_func( [ $this, $key ] );
			}

			return false;
		} // end of __get method;

		/**
		 * Just return global instance of WP_Query
		 *
		 * @return WP_Query
		 */
		protected function global_instance() {
			global $wp_query;

			return $wp_query;
		} // end of global_instance method;

	} // end of Abstract_Tour_Queries abstract class;

} // end of if;
