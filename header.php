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
					<?php /* <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /> */ ?>
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p></a>
				</div><!-- .site-info -->
			</div><!-- .container -->
		</div><!-- .site-branding .site-header-->

	</header><!-- #masthead -->

	<div id="header-banner-ad" class="banner-ad">
		 <img src="<?php echo get_template_directory_uri(); ?>/images/avbannerad.png" role="advertising" alt="banner ad" />  <!-- MAKE THIS AN AD SPACE -->
		<!-- <div id="fcc-areavoices-header-ad">
			<div id="div-gpt-ad-1430258018861-0">
				<script type="text/javascript">
				googletag.display('div-gpt-ad-1430258018861-0');
				</script>
			</div>
		</div> -->
	</div>

	<div id="content" class="site-content container">
