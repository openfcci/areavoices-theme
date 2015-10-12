<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package areavoices
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	//return; /* RV | Disables active sidebar check */
}
?>

<div id="secondary" class="widget-area" role="complementary">

	<!-- ABOUT ME WIDGET -->
	<?php get_template_part( 'inc/widgets/about-me-widget', 'about-me-widget' ); ?>


	<!-- SIDEBAR AD WIDGET -->
	<?php get_template_part( 'inc/widgets/adspot-rsb-widget', 'adspot-rsb-widget' ); ?>


	<!-- SEARCH WIDGET -->
	<?php get_template_part( 'inc/widgets/search-widget', 'search-widget' ); ?>

	<!-- POPULAR POSTS WIDGET -->
	<?php
		if ( is_front_page() ) { //show only one front page
			get_template_part( 'inc/widgets/popular-posts-widget', 'popular-posts-widget' );
	  }
	?>

	<!-- RECENT POSTS WIDGET -->
	<?php
		if ( !is_front_page() ) { //Show on all pages except front
			get_template_part( 'inc/widgets/recent-posts-widget', 'recent-posts-widget' );
		}
	?>

	<!-- DYNAMIC SIDEBAR: BEGIN -->
	<?php dynamic_sidebar( 'sidebar-1' ); ?>

</div><!-- #secondary -->
