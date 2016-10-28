<?php
/**
 * The template for displaying all single posts.
 *
 * @package areavoices
 */
// TODO: add nativo forced footer styles
get_header(); ?>

	<div id="primary" class="content-area" style="width: 100%;">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'marketplace_campaign' ); ?>

			<?php //the_post_navigation(); ?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
