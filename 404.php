<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package areavoices
 */

get_header(); ?>

	<div id="fourohfour" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 id="fourohfour-title" class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'areavoices' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p id="fourohfour-pic" align="middle"><img width="" height="" src="<?php /*RV*/ echo get_template_directory_uri(); ?>/images/404.gif"></p><!-- RSB AD: Start -->

					<p align="middle"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'areavoices' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php if ( areavoices_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'areavoices' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>

					<?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'areavoices' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
