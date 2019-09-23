<?php
/**
 * Load Libraries of Theme
 *
 * @package Tour/Bootstrap
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// WordPress Libraries.
require_once get_template_directory() . '/inc/lib/classes/tgmpa/class-tgm-plugin-activation.php';

// Custom Walkers.
require_once get_template_directory() . '/inc/lib/classes/walkers/class-tour-main-menu-walker.php';
