<?php
/**
 * Class Abstract_Tour_AJAX
 *
 * @package Tour/Core/Abstract
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Abstract_Tour_AJAX' ) ) {

	/**
	 * Realize AJAX events load by __construct magic method.
	 */
	abstract class Abstract_Tour_AJAX {

		/**
		 * Allow access to components.
		 *
		 * @var Tour $theme
		 */
		private $theme = null;

		/**
		 * Abstract_Tour_AJAX constructor.
		 *
		 * Realize loading of AJAX events.
		 *
		 * @param Tour $theme - Core instance of theme for access components in AJAX class.
		 */
		public function __construct( Tour $theme ) {
			// Set core instance for allow access to components.
			$this->theme = $theme;

			// Get class methods.
			$methods = get_class_methods( $this );

			// Filter internal methods.
			$methods = array_filter( $methods, function( $item ) {
				if ( strpos( $item, '__' ) === 0 ) {
					return false;
				}

				$method = new ReflectionMethod( $this, $item );

				if ( ! $method->isPublic() ) {
					return false;
				}

				return true;
			} );

			// Load prefix for AJAX events.
			$prefix = get_template();
			$prefix = sanitize_key( apply_filters( 'Tour_ajax_prefix', $prefix ) ) . ':';

			foreach ( $methods as $item ) {
				if ( strpos( $item, 'priv_' ) === 0 ) {
					// If prefix `priv_` provided - remove prefix from method name and add private AJAX-event.
					$action = $prefix . substr( $item, 5 );

					add_action( 'wp_ajax_' . $action, [ $this, $item ] );
				} elseif ( strpos( $item, 'nopriv_' ) === 0 ) {
					// If prefix `nopriv_` provided - remove prefix from method name and add non-private AJAX-event.
					$action = $prefix . substr( $item, 7 );

					add_action( 'wp_ajax_nopriv_' . $action, [ $this, $item ] );
				} else {
					// Else add events for both logged-in status.
					$action = $prefix . $item;

					add_action( 'wp_ajax_' . $action, [ $this, $item ] );
					add_action( 'wp_ajax_nopriv_' . $action, [ $this, $item ] );
				}
			}
		} // end of __construct method;

	} // end of Abstract_Tour_AJAX abstract class;

} // end of if;
