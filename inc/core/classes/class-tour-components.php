<?php
/**
 * Class Tour_Components
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_Components' ) ) {

	/**
	 * Realize access to HTML components.
	 */
	class Tour_Components {

		/**
		 * Output blog name.
		 */
		public function blog_info_name() {
			bloginfo( 'name' );
		} // end of blog_info_name method;

		/**
		 * Output blog description.
		 */
		public function blog_info_description() {
			bloginfo( 'description' );
		} // end of blog_info_description method;

		/**
		 * Custom render function for Infinite Scroll.
		 */
		public function infinite_scroll_render() {
			while ( have_posts() ) {
				the_post();

				if ( is_search() ) {
					get_template_part( 'template-parts/content', 'search' );
				} else {
					get_template_part( 'template-parts/content', get_post_type() );
				}
			}
		} // end of infinite_scroll_render method;

		/**
		 * Output `posts_navigation` by specified query.
		 *
		 * @param null | WP_Query $query - query for use inside `the_posts_navigation`.
		 * @param array           $args - arguments of `the_posts_navigation`.
		 *
		 * @return void
		 */
		public function the_posts_navigation( $query = null, $args = [] ) {
			if ( is_a( $query, 'WP_Query' ) ) {
				global $wp_query;

				$tmp_query = $wp_query;
				$wp_query  = $query; // WPCS: override ok. Can not use `the_posts_navigation` without overriding global.

				the_posts_navigation( $args );

				$wp_query = $tmp_query; // WPCS: override ok. Restore query.
			} else {
				the_posts_navigation( $args );
			}
		} // end of the_posts_navigation method;

		/**
		 * Output mini-cart for header.php template.
		 */
		public function mini_cart() {
			if ( ! Tour()->conditions->is_wc_enabled() ) {
				return;
			}

			// Output mini-cart template.
			woocommerce_mini_cart();
		} // end of mini_cart method;

		/**
		 * Output account icon for header.php template.
		 */
		public function account_icon() {
			if ( ! Tour()->conditions->is_wc_enabled() ) {
				return;
			}

			$current_user = wp_get_current_user();

			if ( ! $current_user->exists() ) {
				return;
			}

			// Just for example of possible access to information.
			print( esc_html( $current_user->display_name ) );
		} // end of account_icon method;

		/**
		 * Output search icon for header.php template.
		 */
		public function header_search() {
			$search_url = ( get_search_link() );

			if ( Tour()->conditions->is_wc_enabled() ) {
				$search_url = ( wc_get_page_permalink( 'shop', '#' ) );
			}

			$search_value = get_search_query(); ?>
			<form action="<?php print( esc_url( $search_url ) ); ?>">
				<input type="text" name="s" value="<?php print( esc_attr( $search_value ) ); ?>" title="<?php esc_attr_e( 'Search', 'Tour' ); ?>" />
				<button class="btn"><?php esc_html_e( 'Submit', 'Tour' ); ?></button>
			</form>
			<?php
		} // end of header_search method;

	} // end of Tour_Components class;

} // end of if;
