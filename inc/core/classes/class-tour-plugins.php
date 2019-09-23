<?php
/**
 * Class Tour_Plugins
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_Plugins' ) ) {

	/**
	 * Loading of required plugins through TGMPA.
	 */
	class Tour_Plugins extends Abstract_Tour_Plugins {

		/**
		 * Return array of required plugins.
		 *
		 * More info available by link:
		 *
		 * @link http://tgmpluginactivation.com/configuration/
		 *
		 * @return array
		 */
		protected function required_plugins() {
			return [
				[
					'name'     => 'Unyson Framework',
					'slug'     => 'unyson',
					'required' => true,
				],
				[
					'name'     => 'Redux Framework',
					'slug'     => 'redux-framework',
					'required' => true,
				],
				[
					'name'     => 'WooCommerce',
					'slug'     => 'woocommerce',
					'required' => true,
				],
				[
					'name'     => 'YITH WooCommerce Wishlist',
					'slug'     => 'yith-woocommerce-wishlist',
					'required' => true,
				],
				[
					'name'     => 'Tour Extension Manager',
					'slug'     => 'ds-extension-manager',
					'required' => true,
					'source'   => 'https://wpdemo.dartsimple.com/wp-content/uploads/shared/plugins/ds-extension-manager.zip',
				],
			];
		} // end of required_plugins method;
	} // end of Tour_Plugins class;

} // end of if;
