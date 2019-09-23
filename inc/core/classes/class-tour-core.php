<?php
/**
 * Class Tour_Core
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_Core' ) ) {

	/**
	 * Realize core functionality (like content-width, sidebars, etc.)
	 */
	class Tour_Core extends Abstract_Tour_Core {

		/**
		 * Set the content width in pixels, based on the theme's design and stylesheet.
		 *
		 * Priority 0 to make it available to lower priority callbacks.
		 *
		 * @global int $content_width
		 */
		public function content_width() {
			// This variable is intended to be overruled from themes.
			// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
			// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
			$GLOBALS['content_width'] = apply_filters( 'Tour_content_width', 640 );
		} // end of content_width method;

		/**
		 * Register widget area.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 */
		public function widgets() {
			register_sidebar( [
				'name'          => esc_html__( 'Sidebar', 'Tour' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'Tour' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			] );
		} // end of widgets method;

		/**
		 * Setup theme styles
		 *
		 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/#stylesheets
		 */
		protected function styles() {
			wp_enqueue_style( 'Tour-style', get_stylesheet_uri() );

			wp_enqueue_style( 'Tour-design-style', get_template_directory_uri() . '/assets/css/main.css', [], Tour::THEME_VERSION );
		} // end of styles method;

		/**
		 * Setup theme scripts
		 *
		 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/#scripts
		 */
		protected function scripts() {
			/**  wp_register_script( 'Tour-main-script', get_template_directory_uri() . '/assets/js/main.js' );
			wp_localize_script( 'Tour-main-script', 'TourTheme', $this->Tour_main_script_object_properties() );
			wp_enqueue_script( 'Tour-main-script', array('jquery'), null, true  );
			 */

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		} // end of scripts method;

		/**
		 * Return localize object properties for Tour-main-script.
		 *
		 * @return array - Object properties.
		 */
		private function Tour_main_script_object_properties() {
			$template = get_template();

			return [
				'ajax_url'    => admin_url( 'admin-ajax.php' ),
				'ajax_prefix' => sanitize_key( apply_filters( 'Tour_ajax_prefix', $template ) ) . ':',
			];
		} // end of Tour_main_script_object_properties method;

		/**
		 * Setup editor style
		 *
		 * @link https://codex.wordpress.org/Editor_Style
		 */
		public function editor_style() {
			add_editor_style( get_template_directory_uri() . '/assets/css/editor.css' );
		} // end of editor_style method;

		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 *
		 * @link https://codex.wordpress.org/I18n_for_WordPress_Developers#Text_Domains
		 */
		protected function text_domain() {
			load_theme_textdomain( 'Tour', get_template_directory() . '/languages' );
		} // end of text_domain method;

		/**
		 * Setup theme features
		 *
		 * @link https://codex.wordpress.org/Theme_Features
		 */
		protected function theme_support() {
			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
			add_theme_support( 'title-tag' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			 */
			add_theme_support( 'post-thumbnails' );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', [
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			] );

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'Tour_custom_background_args', [
				'default-color' => 'ffffff',
				'default-image' => '',
			] ) );

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support( 'custom-logo', [
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			] );
		} // end of theme_support method;

		/**
		 * Setup navigation menus
		 *
		 * @link https://codex.wordpress.org/Navigation_Menus
		 */
		protected function nav_menus() {
			// This theme uses wp_nav_menu() in one location.
			register_nav_menus( [
				'primary-menu' => esc_html__( 'Primary', 'Tour' ),
			] );
		} // end of nav_menus method;

		/**
		 * Return array of custom taxonomies.
		 *
		 * @return array
		 */
		public function custom_taxonomy() {
			$result = [];

			// Alternative check for WooCommerce exists.
			if ( post_type_exists( 'product' ) ) {
				$result['collection'] = [
					'post-types' => [ 'product', 'product_variation' ],
					'args'       => [
						'label'                 => '',
						'labels'                => [
							'name'              => esc_html__( 'Collections', 'Tour' ),
							'singular_name'     => esc_html__( 'Collection', 'Tour' ),
							'search_items'      => esc_html__( 'Search Collections', 'Tour' ),
							'all_items'         => esc_html__( 'All Collections', 'Tour' ),
							'parent_item'       => esc_html__( 'Parent Collection', 'Tour' ),
							'parent_item_colon' => esc_html__( 'Parent Collection:', 'Tour' ),
							'edit_item'         => esc_html__( 'Edit Collection', 'Tour' ),
							'update_item'       => esc_html__( 'Update Collection', 'Tour' ),
							'add_new_item'      => esc_html__( 'Add New Collection', 'Tour' ),
							'new_item_name'     => esc_html__( 'New Collection Name', 'Tour' ),
							'menu_name'         => esc_html__( 'Collections', 'Tour' ),
						],
						'description'           => esc_html__( 'Group your products in Collections.', 'Tour' ),
						'public'                => true,
						'publicly_queryable'    => null,
						'show_in_nav_menus'     => true,
						'show_ui'               => true,
						'show_tagcloud'         => true,
						'show_in_rest'          => null,
						'rest_base'             => null,
						'hierarchical'          => true,
						'update_count_callback' => '',
						'rewrite'               => true,
						'capabilities'          => [],
						'meta_box_cb'           => 'post_categories_meta_box',
						'show_admin_column'     => false,
						'_builtin'              => false,
						'show_in_quick_edit'    => null,
					],
				];
			}

			return $result;
		}

	} // end of Tour_Core class;

} // end of if;
