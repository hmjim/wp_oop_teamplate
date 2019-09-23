<?php
/**
 * Load Core of Theme
 *
 * @package Tour/Bootstrap
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load Abstraction.
require_once get_template_directory() . '/inc/core/abstract/class-abstract-tour-queries.php';
require_once get_template_directory() . '/inc/core/abstract/class-abstract-tour-ajax.php';
require_once get_template_directory() . '/inc/core/abstract/class-abstract-tour-core.php';
require_once get_template_directory() . '/inc/core/abstract/class-abstract-tour-customizer.php';
require_once get_template_directory() . '/inc/core/abstract/class-abstract-tour-plugins.php';
require_once get_template_directory() . '/inc/core/abstract/class-abstract-tour-hooks.php';
require_once get_template_directory() . '/inc/core/abstract/class-abstract-tour-woocommerce.php';

// Load Implementation.
require_once get_template_directory() . '/inc/core/classes/class-tour-conditions.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-helpers.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-sanitizes.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-core.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-ajax.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-components.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-customizer.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-head.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-hooks.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-plugins.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-queries.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-settings.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-template-classes.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-template-tags.php';
require_once get_template_directory() . '/inc/core/classes/class-tour-template.php';
require_once get_template_directory() . '/inc/core/classes/class-tour.php';
