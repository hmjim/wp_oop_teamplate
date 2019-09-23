<?php
/**
 * Template Name: Homepage
 *
 * File page-home.php
 *
 * Realize homepage template.
 *
 * Output primary page of site.
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
