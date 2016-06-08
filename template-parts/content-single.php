<?php
/**
 * Template part for displaying single posts.
 *
 * @package areavoices
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('av-single-post'); ?>>
	<header class="entry-header">
		<div class="post-thumb-container">
			<a href="<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); echo $large_image_url[0]; ?>" class="gallery">
			<?php the_post_thumbnail( 'featured-image' ); ?>
		</a>
		</div>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<!--
		<div class="entry-meta">
			<?php //areavoices_posted_on(); ?>
		</div> --> <!-- .entry-meta -->

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<span class="post-info">
				<span id="post-date" class="avicon-av-calendar"></span>
				<a href="<?php echo get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time( 'j F Y' ); ?></a>
				<span class="separator">/</span>
			</span>
			<span id="post-author" class="post-info">
				<span class="avicon-person"></span>
				<?php the_author_posts_link(); ?>
				<span class="separator">/</span>
			</span>
			<span id="post-category" class="post-info">
				<span class="avicon-price-tag"></span>
				<?php the_category( ', ' ); ?>
				<span id="post-likes" class="separator">/</span>
			</span>
			<span id="post-likes" class="post-info">
				<?php if( function_exists('zilla_likes') ){ zilla_likes(); } ?>
			</span>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<div class="av-post av-jp-social">
			<?php
				if ( function_exists( 'sharing_display' ) ) {
				    sharing_display( '', true );
				}
				if ( class_exists( 'Jetpack_Likes' ) ) {
				    $custom_likes = new Jetpack_Likes;
				    echo $custom_likes->post_likes( '' );
				} ?>

				<!--Nativo Sponsored Content-->
				<div id="ad-content-distribution" class="nativo-container">
				</div>

				<?php
				/*** Jetpack Related Posts ***/
				if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
				    echo do_shortcode( '[jetpack-related-posts]' );
				}
			?>
		</div><!-- .av-jp-social -->
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'areavoices' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php areavoices_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
