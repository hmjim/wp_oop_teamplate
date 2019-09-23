<?php
/**
 * Template Name: Delivery
 *
 * File page-delivery.php
 *
 * Realize delivery page template.
 *
 * Output delivery information.
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
