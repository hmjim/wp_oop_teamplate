<?php
/**
 * Class Tour_WooCommerce
 *
 * @package Tour/Core/Classes
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tour_WooCommerce' ) ) {

	/**
	 * Realize WooCommerce integration.
	 */
	class Tour_WooCommerce extends Abstract_Tour_WooCommerce {

		/**
		 * WooCommerce specific scripts & stylesheets.
		 */
		public function woocommerce_scripts() {
			wp_enqueue_style( 'Tour-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

			$font_path   = wc()->plugin_url() . '/assets/fonts/';
			$inline_font = '@font-face {
				font-family: "star";
				src: url("' . $font_path . 'star.eot");
				src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
					url("' . $font_path . 'star.woff") format("woff"),
					url("' . $font_path . 'star.ttf") format("truetype"),
					url("' . $font_path . 'star.svg#star") format("svg");
				font-weight: normal;
				font-style: normal;
			}';

			wp_add_inline_style( 'Tour-woocommerce-style', $inline_font );
		} // end of woocommerce_scripts method;

		/**
		 * Add 'woocommerce-active' class to the body tag.
		 *
		 * @param  array $classes CSS classes applied to the body tag.
		 * @return array $classes modified to include 'woocommerce-active' class.
		 */
		public function woocommerce_active_body_class( $classes ) {
			$classes[] = 'woocommerce-active';

			return $classes;
		} // end of woocommerce_active_body_class method;

		/**
		 * Products per page.
		 *
		 * @return integer number of products.
		 */
		public function woocommerce_products_per_page() {
			return 12;
		} // end of woocommerce_products_per_page method;

		/**
		 * Product gallery thumnbail columns.
		 *
		 * @return integer number of columns.
		 */
		public function woocommerce_thumbnail_columns() {
			return 4;
		} // end of woocommerce_thumbnail_columns method;

		/**
		 * Default loop columns on product archives.
		 *
		 * @return integer products per row.
		 */
		public function woocommerce_loop_columns() {
			return 3;
		} // end of woocommerce_loop_columns method;

		/**
		 * Related Products Args.
		 *
		 * @param array $args related products args.
		 * @return array $args related products args.
		 */
		public function woocommerce_related_products_args( $args ) {
			$defaults = [
				'posts_per_page' => 3,
				'columns'        => 3,
			];

			$args = wp_parse_args( $defaults, $args );

			return $args;
		} // end of woocommerce_related_products_args method;

		/**
		 * Product columns wrapper.
		 */
		public function woocommerce_product_columns_wrapper() {
			$columns = $this->woocommerce_loop_columns();
			echo '<div class="columns-' . absint( $columns ) . '">';
		} // end of woocommerce_product_columns_wrapper method;

		/**
		 * Product columns wrapper close.
		 */
		public function woocommerce_product_columns_wrapper_close() {
			echo '</div>';
		} // end of woocommerce_product_columns_wrapper_close method;

		/**
		 * Before Content.
		 *
		 * Wraps all WooCommerce content in wrappers which match the theme markup.
		 */
		public function woocommerce_wrapper_before() {
			?>
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
			<?php
		} // end of woocommerce_wrapper_before method;

		/**
		 * After Content.
		 *
		 * Closes the wrapping divs.
		 */
		public function woocommerce_wrapper_after() {
			?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php
		} // end of woocommerce_wrapper_after method;

		/**
		 * Cart Fragments.
		 *
		 * Ensure cart contents update when products are added to the cart via AJAX.
		 *
		 * @param array $fragments Fragments to refresh via AJAX.
		 * @return array Fragments to refresh via AJAX.
		 */
		public function woocommerce_cart_link_fragment( $fragments ) {
			ob_start();
			$this->woocommerce_cart_link();
			$fragments['a.cart-contents'] = ob_get_clean();

			return $fragments;
		} // end of woocommerce_cart_link_fragment method;

		/**
		 * Cart Link.
		 *
		 * Displayed a link to the cart including the number of items present and the cart total.
		 */
		public function woocommerce_cart_link() {
			?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'Tour' ); ?>">
				<?php
				$item_count_text = sprintf(
					/* translators: number of items in the mini cart. */
					_n( '%d item', '%d items', wc()->cart->get_cart_contents_count(), 'Tour' ),
					wc()->cart->get_cart_contents_count()
				);
				?>
				<span class="amount"><?php echo wp_kses_data( wc()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
			</a>
			<?php
		} // end of woocommerce_cart_link method;

		/**
		 * Display Header Cart.
		 */
		public function woocommerce_header_cart() {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}
			?>
			<ul id="site-header-cart" class="site-header-cart">
				<li class="<?php echo esc_attr( $class ); ?>">
					<?php $this->woocommerce_cart_link(); ?>
				</li>
				<li>
					<?php
					$instance = [
						'title' => '',
					];

					the_widget( 'WC_Widget_Cart', $instance );
					?>
				</li>
			</ul>
			<?php
		} // end of woocommerce_header_cart method;

	} // end of Tour_WooCommerce class;

} // end of if;
