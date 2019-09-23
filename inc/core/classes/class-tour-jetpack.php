<?php
/**
 * Class Tour_JetPack
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_JetPack' ) ) {

	/**
	 * Realize integration with JetPack plugin.
	 */
	class Tour_JetPack {

		/**
		 * Core instance of Tour.
		 * This property was created, because we can not access function `Tour` inside components:
		 * Error with recursion calls.
		 *
		 * @link https://en.wikipedia.org/wiki/Recursion#In_computer_science
		 *
		 * @var $theme Tour
		 */
		private $theme = null;

		/**
		 * Tour_JetPack constructor.
		 *
		 * Setup `theme` property.
		 *
		 * @param Tour $theme - Core instance of Tour. For more info read doc of property `theme`.
		 */
		public function __construct( Tour $theme ) {
			$this->theme = $theme;
		} // end of __construct method;

		/**
		 * Setup JetPack integration.
		 */
		public function setup() {
			// Add theme support for Infinite Scroll.
			add_theme_support( 'infinite-scroll', [
				'container' => 'main',
				'render'    => [ $this->theme->components, 'infinite_scroll_render' ],
				'footer'    => 'page',
			] );

			// Add theme support for Responsive Videos.
			add_theme_support( 'jetpack-responsive-videos' );

			// Add theme support for Content Options.
			add_theme_support( 'jetpack-content-options', [
				'post-details'    => [
					'stylesheet' => 'Tour-style',
					'date'       => '.posted-on',
					'categories' => '.cat-links',
					'tags'       => '.tags-links',
					'author'     => '.byline',
					'comment'    => '.comments-link',
				],
				'featured-images' => [
					'archive' => true,
					'post'    => true,
					'page'    => true,
				],
			] );
		} // end of setup method;

	} // end of Tour_JetPack class;

} // end of if;
