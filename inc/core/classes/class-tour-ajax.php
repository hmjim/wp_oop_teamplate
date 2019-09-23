<?php
/**
 * Class Tour_AJAX
 *
 * @package DS-WP-Base-Theme
 */

if ( ! class_exists( 'Tour_AJAX' ) ) {

	/**
	 * Realize AJAX Functionality of Theme
	 */
	class Tour_AJAX extends Abstract_Tour_AJAX {

		/**
		 * Methods naming reference:
		 *
		 * Only logged-in users events: public function priv_{action_name} {...Your code...}
		 * Only not-logged-in users events: public function nopriv_{action_name} {...Your code...}
		 * Any users: public function {action_name} {...Your code...}
		 *
		 * Use only `public` visibility for events, any else are internal.
		 */

	} // end of Tour_AJAX class;

} // end of if;
