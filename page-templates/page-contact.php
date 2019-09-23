<?php
/**
 * Template Name: Contact
 *
 * File page-contact.php
 *
 * Realize contact page template.
 *
 * Output contact form and contact information.
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
