<?php
/**
 * The template for displaying collection (custom taxonomy) items
 *
 * This tax registered only if WooCommerce exists, so, we can use WC functions without checking.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/taxonomy-templates/
 *
 * @package Tour
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

get_header();

$query = Tour()->queries->collection_items;
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if ( $query->have_posts() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( $query->have_posts() ) :
					$query->the_post();

					wc_get_template_part( 'article-collection-product' );

				endwhile;

				Tour()->components->the_posts_navigation( $query );

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
