<?php
/**
 * Template Name: Lookbook
 *
 * File page-lookbook.php
 *
 * Realize lookbook.
 *
 * Output list of collections.
 *
 * @package Tour
 */

get_header();

// Firstly, output page content.
while ( have_posts() ) :
	the_post();

	// Must be designed.
	the_content();
endwhile;

// Secondary, output lookbooks.
if ( Tour()->conditions->is_wc_enabled() && count( Tour()->queries->collections ) > 0 ) :
	foreach ( Tour()->queries->collections as $collection ) :
		wc_get_template( 'article-lookbook-collection.php', [
			'collection' => $collection,
		] );
	endforeach;
endif;

get_footer();
