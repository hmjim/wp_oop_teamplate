<?php
/**
 * Class Tour_Queries
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_Queries' ) ) {

	/**
	 * Realize WordPress Queries of Theme.
	 *
	 * Queries methods (without params) can be accessed via __get magic method,
	 * so, just for fix IDE, reference queries there:
	 *
	 * @property WP_Query $archive
	 * @property WP_Query $index
	 * @property WP_Query $comments
	 * @property WP_Query $header
	 * @property WP_Query $page
	 * @property WP_Query $search
	 * @property WP_Query $single
	 * @property WP_Query $collection_items
	 * @property array    $collections
	 */
	class Tour_Queries extends Abstract_Tour_Queries {

		/**
		 * Template `archive.php` query.
		 *
		 * @return WP_Query
		 */
		public function archive() {
			return apply_filters( 'Tour_archive_query', $this->global_instance() );
		} // end of archive method;

		/**
		 * Template `index.php` query.
		 *
		 * @return WP_Query
		 */
		public function index() {
			return apply_filters( 'Tour_index_query', $this->global_instance() );
		} // end of index method;

		/**
		 * Template `comments.php` query.
		 *
		 * @return WP_Query
		 */
		public function comments() {
			return apply_filters( 'Tour_comments_query', $this->global_instance() );
		} // end of comments method;

		/**
		 * Template `header.php` query.
		 *
		 * @return WP_Query
		 */
		public function header() {
			return apply_filters( 'Tour_header_query', $this->global_instance() );
		} // end of header method;

		/**
		 * Template `page.php` query.
		 *
		 * @return WP_Query
		 */
		public function page() {
			return apply_filters( 'Tour_page_query', $this->global_instance() );
		} // end of page method;

		/**
		 * Template `search.php` query.
		 *
		 * @return WP_Query
		 */
		public function search() {
			return apply_filters( 'Tour_search_query', $this->global_instance() );
		} // end of search method;

		/**
		 * Template `single.php` query.
		 *
		 * @return WP_Query
		 */
		public function single() {
			return apply_filters( 'Tour_single_query', $this->global_instance() );
		} // end of single method;

		/**
		 * Template `taxonomy-collection.php` query.
		 *
		 * @return WP_Query
		 */
		public function collection_items() {
			return apply_filters( 'Tour_collection_items_query', $this->global_instance() );
		} // end of collection_items method;

		/**
		 * Get lookbooks list.
		 *
		 * @return array
		 */
		public function collections() {
			$args          = [
				'taxonomy' => 'collection',
				'number'   => apply_filters( 'Tour_collections_query_number', 4 ),
			];
			$wp_term_query = new WP_Term_Query( $args );

			if ( is_array( $wp_term_query->terms ) ) {
				return $wp_term_query->terms;
			} else {
				return [];
			}
		} // end of lookbooks method;

	} // end of Tour_Queries class;

} // end of if;
