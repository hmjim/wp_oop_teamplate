<?php
/**
 * Class Abstract_Tour_Plugins
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Abstract_Tour_Plugins' ) ) {

	/**
	 * Realize internal functionality of TGMPA:
	 * - Load Configs
	 * - Realize prototyping of Required Plugins method.
	 */
	abstract class Abstract_Tour_Plugins {

		/**
		 * Setup TGMPA Configuration.
		 */
		public function setup() {
			tgmpa( $this->required_plugins(), $this->get_config() );
		} // end of setup method;

		/**
		 * Return array of required plugins.
		 *
		 * More info available by link.
		 *
		 * @link http://tgmpluginactivation.com/configuration/
		 *
		 * @return array
		 */
		abstract protected function required_plugins();

		/**
		 * Return configuration array for TGMPA.
		 *
		 * @return array
		 */
		protected function get_config() {
			return [
				'domain'       => 'Tour', // Text domain - likely want to be the same as your theme.
				'default_path' => '', // Default absolute path to pre-packaged plugins.
				'menu'         => 'install-required-plugins', // Menu slug.
				'has_notices'  => true, // Show admin notices or not.
				'is_automatic' => false, // Automatically activate plugins after installation or not.
				'message'      => '', // Message to output right before the plugins table.
				'strings'      => [
					'page_title'                      => esc_html__( 'Install Required Plugins', 'Tour' ),
					'menu_title'                      => esc_html__( 'Install Plugins', 'Tour' ),
					/* translators: %s: Plugin Name */
					'installing'                      => esc_html__( 'Installing Plugin: %s', 'Tour' ),
					'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'Tour' ),
					/* translators: %1$s: Required Plugin/Plugins */
					'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'Tour' ),
					/* translators: %1$s: Recommended Plugin/Plugins */
					'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'Tour' ),
					/* translators: %1$s: Plugin/Plugins */
					'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'Tour' ),
					/* translators: %1$s: Inactive Plugin/Plugins */
					'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'Tour' ),
					/* translators: %1$s: Inactive Plugin/Plugins */
					'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'Tour' ),
					/* translators: %1$s: Plugin/Plugins */
					'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'Tour' ),
					/* translators: %1$s: Plugin/Plugins to update */
					'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'Tour' ),
					/* translators: %1$s: Plugin/Plugins */
					'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'Tour' ),
					'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'Tour' ),
					'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'Tour' ),
					'return'                          => esc_html__( 'Return to Required Plugins Installer', 'Tour' ),
					'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'Tour' ),
					/* translators: %s: Return to dashboard link */
					'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'Tour' ),
					'nag_type'                        => 'updated',
				],
			];
		} // end of get_config method;

	} // end of Abstract_Tour_Plugins abstract class;

} // end of if;
