<?php
/**
 * The template for displaying all single posts
 *
 * @package Tour
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

get_header();

$query = Tour()->queries->single;
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( $query->have_posts() ) :
			$query->the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
