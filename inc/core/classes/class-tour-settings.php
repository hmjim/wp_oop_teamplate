<?php
/**
 * Class Tour_Settings
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_Settings' ) ) {

	/**
	 * Realize access to settings.
	 */
	class Tour_Settings {

		/**
		 * Redux adapter.
		 *
		 * @var Tour_Redux | null $redux - will be `null` only if plugin is not active
		 */
		public $redux = null;

		/**
		 * Customizer adapter.
		 *
		 * @var Tour_Customizer $customizer
		 */
		public $customizer = null;

		/**
		 * Core instance of Tour.
		 * This property was created, because we can not access function `Tour` inside components:
		 * Error with recursion calls.
		 *
		 * @link https://en.wikipedia.org/wiki/Recursion#In_computer_science
		 *
		 * @var Tour $theme
		 */
		private $theme = null;

		/**
		 * Tour_Settings constructor.
		 *
		 * @param Tour $theme - Core instance of Tour. For more info read doc of property `theme`.
		 */
		public function __construct( $theme ) {
			$this->theme = $theme;

			$this->setup_props();
		} // end of __construct method;

		/**
		 * Setup properties of object.
		 */
		private function setup_props() {
			/**
			 * Description (why adapter required here?):
			 *
			 * @see Tour::setup_props() (plugins section)
			 */
			if ( $this->theme->conditions->is_ds_redux_integrated() ) { // Redux is Valid Integrated?
				require_once get_template_directory() . '/inc/core/classes/class-Tour-redux.php';

				$this->redux = new Tour_Redux();
			}

			$this->customizer = new Tour_Customizer( $this->theme );
		} // end of setup_props method;

	} // end of Tour_Settings class;

} // end of if;
