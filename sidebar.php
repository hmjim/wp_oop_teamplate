<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Tour
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
