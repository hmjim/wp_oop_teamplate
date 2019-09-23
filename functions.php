<?php
/**
 * Primary functions file. Realize theme functionality.
 *
 * @package Tour
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return instance of core theme class.
 *
 * Short function name without prefix in this case are allowed,
 * because in WP repositories not plugins or themes with same name
 *
 * @return Tour
 */
function Tour() {
	return Tour::instance();
} // end of Tour function;

// Load Libraries.
require_once get_template_directory() . '/inc/bootstrap/lib.php';

// Load Theme.
require_once get_template_directory() . '/inc/bootstrap/core.php';

// Init Theme.
Tour();


// do_shortcode('[onTour_logo]');
function onTour_logo_func( $atts, $content ) {
	if ( has_custom_logo() ) {
		return get_custom_logo();
	}
}

add_shortcode( 'onTour_logo', 'onTour_logo_func' );

//login form shortcode

function onTuour_login_form_popup( $atts, $content ) {
	ob_start();
	$html = load_template( get_template_directory() . '/template-parts/login-modal.php', true );

	//$html = require_once get_template_directory() . '/template-parts/login-modal.php';
	return ob_get_clean();
}

add_shortcode( 'onTour_login_form_modal', 'onTuour_login_form_popup' );

add_action( 'wp_enqueue_scripts', 'true_include_myscript' );
function true_include_myscript() {
	wp_enqueue_script( 'Tour-main-script', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), null, true );
}

function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );