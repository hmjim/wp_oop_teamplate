<?php
/**
 * Template Name: FAQ
 *
 * File page-delivery.php
 *
 * Realize FAQ template.
 *
 * Output tickets and tickets categories.
 *
 * @package Tour
 */

get_header();

while ( have_posts() ) :
	the_post();

	// Must be designed.
	the_content();
endwhile;

get_footer();
