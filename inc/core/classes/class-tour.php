<?php
/**
 * Class Tour
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Core class.
 * Realizes access to all components of system and bootstrap the theme.
 *
 * Class can not exist in child themes or anywhere else, so, not check class_exists(...) and set as `final`.
 */
final class Tour {

	const THEME_VERSION = '1.0.0';

	/**
	 * HTML components.
	 *
	 * @var Tour_Components $components
	 */
	public $components = null;

	/**
	 * Custom header.
	 *
	 * @var Tour_Head $head
	 */
	public $head = null;

	/**
	 * Theme hooks.
	 *
	 * @var Tour_Hooks $hooks
	 */
	public $hooks = null;

	/**
	 * WP Queries.
	 *
	 * @var Tour_Queries $queries
	 */
	public $queries = null;

	/**
	 * WooCommerce adapter.
	 *
	 * @var Tour_WooCommerce | null $wc - will be `null` only if plugin is not active
	 */
	public $wc = null;

	/**
	 * Conditional helpers.
	 *
	 * @var Tour_Conditions $conditions
	 */
	public $conditions = null;

	/**
	 * Theme settings.
	 *
	 * @var Tour_Settings $settings
	 */
	public $settings = null;

	/**
	 * JetPack adapter.
	 *
	 * @var Tour_JetPack | null $jetpack - will be `null` only if plugin is not active
	 */
	public $jetpack = null;

	/**
	 * Template methods.
	 *
	 * @var Tour_Template $template
	 */
	public $template = null;

	/**
	 * Required plugins.
	 *
	 * @var Tour_Plugins $plugins
	 */
	public $plugins = null;

	/**
	 * Helpers methods.
	 *
	 * @var Tour_Helpers $helpers
	 */
	public $helpers = null;

	/**
	 * Core methods.
	 *
	 * @var Tour_Core $core
	 */
	public $core = null;

	/**
	 * Sanitize methods.
	 *
	 * @var Tour_Sanitizes
	 */
	public $sanitize = null;

	/**
	 * Instance of theme class.
	 *
	 * @var self $instance
	 */
	private static $instance = null;

	/**
	 * Return instance of class.
	 *
	 * @return Tour
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	} // end of instance method;

	/**
	 * Tour constructor.
	 *
	 * Setup properties of class on construct.
	 */
	private function __construct() {
		$this->setup_props();
	} // end of __construct method;

	/**
	 * Disallow cloning of object.
	 */
	private function __clone() {}

	/**
	 * Disallow serialization of object.
	 */
	private function __wakeup() {}

	/**
	 * Setup properties.
	 */
	private function setup_props() {
		$this->helpers    = new Tour_Helpers(); // Setup Helpers.
		$this->sanitize   = new Tour_Sanitizes(); // Setup Sanitizes.
		$this->conditions = new Tour_Conditions(); // Setup Helpers Conditions.
		$this->core       = new Tour_Core(); // Setup Core (content-width, sidebars, etc.).
		$this->components = new Tour_Components(); // Setup Components (HTML).
		$this->plugins    = new Tour_Plugins(); // Setup TGMPA.
		$this->head       = new Tour_Head(); // Setup Custom Header.
		$this->queries    = new Tour_Queries(); // Setup WP Queries.
		$this->settings   = new Tour_Settings( $this ); // Setup Settings.
		$this->template   = new Tour_Template(); // Setup Template Functions (classes & tags).

		// It is not reasonable to require plugins compatibility files in bootstrap file,
		// because here we can check their status through internal functionality.
		if ( $this->conditions->is_wc_enabled() ) {
			require_once get_template_directory() . '/inc/core/classes/class-tour-woocommerce.php';

			$this->wc = new Tour_WooCommerce();
		}

		if ( $this->conditions->is_jetpack_enabled() ) {
			require_once get_template_directory() . '/inc/core/classes/class-tour-jetpack.php';

			$this->jetpack = new Tour_JetPack( $this );
		}

		// Setup theme hooks.
		$this->hooks = new Tour_Hooks( $this );

		// Load AJAX events after core components.
		new Tour_AJAX( $this );

		// Allow plugins to handle theme load.
		do_action( 'Tour_loaded', $this );
	} // end of setup_props method;

} // end of Tour class;
