<?php
/**
 * Class Tour_Template
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_Template' ) ) {

	/**
	 * Realize template functionality.
	 */
	class Tour_Template {

		/**
		 * Dynamic HTML classes.
		 *
		 * @var Tour_Template_Classes
		 */
		public $classes = null;

		/**
		 * Template tags.
		 *
		 * @var Tour_Template_Tags
		 */
		public $tags = null;

		/**
		 * Tour_Template constructor.
		 *
		 * Setup properties on construct.
		 */
		public function __construct() {
			$this->setup_props();
		} // end of __construct method;

		/**
		 * Setup properties.
		 */
		private function setup_props() {
			$this->classes = new Tour_Template_Classes();
			$this->tags    = new Tour_Template_Tags();
		} // end of setup_props method;

	} // end of Tour_Template class;

} // end of if;
