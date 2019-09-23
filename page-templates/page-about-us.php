<?php
/**
 * Template Name: About Us
 *
 * File page-about-us.php
 *
 * Realize About Us template.
 *
 * Output information about site owners.
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
