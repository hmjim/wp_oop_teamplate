<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Tour
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @version 1.0.0
 * @author Nerd studio
 * @copyright (c) 2019 nerd-studio.biz
 */

$query = Tour()->queries->header;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- TODO - BEGIN -->
<header class="header">
	<p>header</p>
</header>
<!-- TODO - END -->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'Tour' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			// Output mini-cart.
			Tour()->components->mini_cart();

			// Output account icon.
			Tour()->components->account_icon();

			// Output header search.
			Tour()->components->header_search();

			the_custom_logo();
			if ( $query->is_front_page() && $query->is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$_s_description = get_bloginfo( 'description', 'display' );
			if ( $_s_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo wp_kses( $_s_description, wp_kses_allowed_html( 'post' ) ); // Allow only content like post. ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu"
					aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'Tour' ); ?></button>
				<?php
				wp_nav_menu( [
					'theme_location' => 'primary-menu',
					'menu_id'        => 'primary-menu',
					'walker'         => new Tour_Main_Menu_Walker(),
				] );
				?>
			</nav><!-- #site-navigation -->
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
