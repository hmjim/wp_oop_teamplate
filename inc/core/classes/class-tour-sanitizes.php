<?php
/**
 * Class Tour_Sanitizes
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! class_exists( 'Tour_Sanitizes' ) ) {

	/**
	 * Realize sanitize of input data.
	 */
	class Tour_Sanitizes {

		/**
		 * Sanitize data with wp_kses function (allowed HTML - post)
		 *
		 * @param string $input - Data to sanitize.
		 *
		 * @return string
		 */
		public function simple_kses( $input ) {
			$allowed = wp_kses_allowed_html( 'post' );

			return wp_kses( $input, $allowed );
		} // end of simple_kses method;

	} // end of Tour_Sanitizes class;

} // end of if;
