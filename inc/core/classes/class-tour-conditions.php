<?php
/**
 * Class Tour_Conditions
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_Conditions' ) ) {

	/**
	 * Helpers class for conditional methods (return only booleans).
	 */
	class Tour_Conditions {

		/**
		 * Validate WC plugin status
		 *
		 * @return bool
		 */
		public function is_wc_enabled() {
			return class_exists( 'WooCommerce' );
		} // end of is_wc_enabled method;

		/**
		 * Validate DS EM plugin status
		 *
		 * @return bool
		 */
		public function is_ds_em_enabled() {
			return class_exists( 'Tour_Extension_Manager' );
		} // end of is_ds_em_enabled method;

		/**
		 * Validate Redux plugin status
		 *
		 * @return bool
		 */
		public function is_redux_enabled() {
			return class_exists( 'Redux' );
		} // end of is_redux_enabled method;

		/**
		 * Validate JetPack plugin status
		 *
		 * @return bool
		 */
		public function is_jetpack_enabled() {
			return defined( 'JETPACK__VERSION' );
		} // end of is_jetpack_enabled method;

		/**
		 * Validate DS Redux integration
		 *
		 * @return bool
		 */
		public function is_ds_redux_integrated() {
			return $this->is_ds_em_enabled() && $this->is_redux_enabled();
		} // end of is_ds_redux_integrated method;

	} // end of Tour_Conditions class;

} // end of if;
