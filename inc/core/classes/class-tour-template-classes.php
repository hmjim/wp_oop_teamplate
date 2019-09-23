<?php
/**
 * Class Tour_Template_Classes
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_Template_Classes' ) ) {

	/**
	 * Realize load of HTML-classes (CSS-classes).
	 */
	class Tour_Template_Classes {

		/**
		 * Change default body classes.
		 *
		 * @param array $classes - Current <body> classes.
		 *
		 * @return array
		 */
		public function body_classes( array $classes ) {
			// Adds a class of hfeed to non-singular pages.
			if ( ! is_singular() ) {
				$classes[] = 'hfeed';
			}

			// Adds a class of no-sidebar when there is no sidebar present.
			if ( ! is_active_sidebar( 'sidebar-1' ) ) {
				$classes[] = 'no-sidebar';
			}

			return $classes;
		} // end of body_classes method;

	} // end of Tour_Template_Classes class;

} // end of if;
