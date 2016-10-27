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
	<div id"widgets-1">

	<!-- DYNAMIC SIDEBAR-TOP: BEGIN -->
	<?php
		if ( is_active_sidebar( 'sidebar-top' ) ) {
			dynamic_sidebar( 'sidebar-top' );
		}
	?>

	<!-- ABOUT ME WIDGET -->
	<?php get_template_part( 'inc/widgets/about-me-widget', 'about-me-widget' ); ?>


	<!-- SIDEBAR AD WIDGET -->
	<?php
	if ( ! get_option( 'av_disable_ads' ) ) {
		get_template_part( 'inc/widgets/adspot-rsb-widget', 'adspot-rsb-widget' );
	}
	?>


	<!-- SEARCH WIDGET -->
	<?php get_template_part( 'inc/widgets/search-widget', 'search-widget' ); ?>

	<!-- DYNAMIC SIDEBAR-MIDDLE: BEGIN -->
	<?php
		if ( is_active_sidebar( 'sidebar-middle' ) ) {
			dynamic_sidebar( 'sidebar-middle' );
		}
	?>

	<!-- POPULAR POSTS WIDGET -->
	<?php
		if ( is_front_page() ) { //show only one front page
			if ( !get_option('av_popular_posts_widget') ) { //Show if not set to 'deactivated'
			get_template_part( 'inc/widgets/popular-posts-widget', 'popular-posts-widget' );
			}
	  }
	?>

	<!-- RECENT POSTS WIDGET -->
	<?php
		if ( !is_front_page() ) { //Show on all pages except front
			if ( !get_option('av_recent_posts_widget') ) { //Show if not set to 'deactivated'
				get_template_part( 'inc/widgets/recent-posts-widget', 'recent-posts-widget' );
			}
		}
	?>

	<!-- RECENT Comments WIDGET -->
	<?php
	if ( get_option('av_recent_comments_widget') ) { //Show only if activated
		get_template_part( 'inc/widgets/recent-comments-widget', 'recent-comments-widget' );
	}
	?>



	<!-- DYNAMIC SIDEBAR-1: BEGIN -->
	<?php
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			dynamic_sidebar( 'sidebar-1' );
		}
	?>
	<?php //dynamic_sidebar( 'sidebar-2' ); ?>

	</div><!-- #widgets-1 -->
</div><!-- #secondary -->
