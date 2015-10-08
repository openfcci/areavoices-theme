<?php
/**
 * Template part for displaying posts.
 *
 * @package areavoices
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="post-thumb-container">
			<a href="<?php echo get_permalink();?>"><?php the_post_thumbnail( 'featured-image' ); ?></a>
		</div>
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<span class="post-info">
				<span class="avicon-av-calendar"></span>
				<a href="<?php echo get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time( 'j F Y' ); ?></a>
				<span class="separator">/</span>
			</span>
			<span class="post-info">
				<span class="avicon-person"></span>
				<?php the_author_posts_link(); ?>
				<span class="separator">/</span>
			</span>
			<span class="post-info">
				<span class="avicon-folder_open"></span>
				<?php the_category( ', ' ); ?>
			</span>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'areavoices' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

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
