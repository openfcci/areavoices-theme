<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package areavoices
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'areavoices' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="site-branding site-header">
			<div class="container">
				<div class="site-info">
					<?php /*RV*/ /* <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="homeS"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /> */ ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color: #3d3d3d;"><?php bloginfo( 'name' ); ?></a></h1>
					<!-- <h1 class="site-title"><?php // bloginfo( 'name' ); ?></h1> -->
					<p class="site-description"><?php bloginfo( 'description' ); ?></p></a>
				</div><!-- .site-info -->
			</div><!-- .container -->
		</div><!-- .site-branding .site-header-->
		<?php if ( is_archive() ) { get_template_part( 'template-parts/header-title', 'header' ); } /*RV*/ ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'areavoices' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'fallback_cb' => false ) ); ?>
		</nav><!-- #site-navigation -->
		<?php get_template_part( 'template-parts/google_ads', 'script' ); /*RV*/ ?>
	</header><!-- #masthead -->

		<?php //if ( is_archive() ) { get_template_part( 'template-parts/header-title', 'header' ); } /*RV*/ ?>
		<?php get_template_part( 'template-parts/google_ads', 'header' ); /*RV*/ ?>

	<div id="content" class="site-content container">
