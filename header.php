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

		<div class="site-branding <?php if ( !get_header_image() ) : echo 'site-header'; endif; ?>">
			<div class="container">
				<div class="site-info">

					<?php if ( get_header_image() ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						  <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
						</a>
						<!-- Commented out below is test code for text-on-banner header -->
						<!-- <div id="headimg" style="background-image: url(<?php //echo header_image(); ?>); height: <?php //echo get_custom_header()->height; ?>px; width: <?php //echo get_custom_header()->width; ?>px; "> -->
							<!-- <div style="vertical-align: middle; height: <?php // echo get_custom_header()->height; ?>px; padding-top: 5%;"> -->
								<!-- <h1 class="site-title"><a href="<?php // echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color: #ffffff;"><?php // bloginfo( 'name' ); ?></a></h1> -->
								<!-- <p class="site-description" style="color: #ffffff;"><?php // bloginfo( 'description' ); ?></p></a> -->
							<!-- </div> -->
						<!-- </div>--> <!-- Custom Header -->
					<?php elseif ( !get_header_image() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color: #3d3d3d;"><?php bloginfo( 'name' ); ?></a></h1>
						<p class="site-description"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="color: #3d3d3d;"><?php bloginfo( 'description' ); ?></a></p>
					<?php endif; // End header image check. ?>


				</div><!-- .site-info -->
			</div><!-- .container -->
		</div><!-- .site-branding .site-header-->
		<?php if ( is_archive() ) { get_template_part( 'template-parts/header-title', 'header' ); } /*RV*/ ?>
		<nav id="site-navigation" class="main-navigation container" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="avicon-menu"></span></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'fallback_cb' => false ) ); ?>
		</nav><!-- #site-navigation -->
		<?php get_template_part( 'template-parts/google_ads', 'script' ); /*RV*/ ?>
	</header><!-- #masthead -->

		<?php //if ( is_archive() ) { get_template_part( 'template-parts/header-title', 'header' ); } /*RV*/ ?>

		<?php /* Featured Content Slider */
			if ( is_front_page() ) { //show only one front page
				$fc_slider = get_theme_mod( 'av_featured_content_slider', '' );
				if ( get_theme_mod('av_featured_content_slider') ) { //Show if not set to 'deactivated'
				get_template_part( 'template-parts/featured_slider');
				}
		  }
		?><!-- #featured-content-slider -->

		<?php get_template_part( 'template-parts/google_ads', 'header' ); /*RV*/ ?>

	<div id="content" class="site-content container">
