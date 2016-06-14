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
			<span id="post-date" class="post-info">
				<span class="avicon-av-calendar"></span>
				<?php av_entry_date(); ?>
				<span class="separator">/</span>
			</span>
			<span id="post-author" class="post-info">
				<span class="avicon-person"></span>
				<?php the_author_posts_link(); ?>
				<span class="separator">/</span>
			</span>
			<span id="post-category" class="post-info">
				<span class="avicon-price-tag"></span>
				<?php //the_category( ', ' ); ?>
				<?php echo '<a class="category" href="'.get_category_link( get_the_category()[0]->term_id ).'" rel="category tag">'.get_the_category()[0]->cat_name.'</a>'; ?>
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
			if( function_exists('zilla_likes') ){ zilla_likes(); }
			echo '<div class="clear"></div>';
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'areavoices' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<div class="av-home av-jp-social">
		<?php
			if ( function_exists( 'sharing_display' ) ) {
			    sharing_display( '', true );
			}

			if ( class_exists( 'Jetpack_Likes' ) ) {
			    $custom_likes = new Jetpack_Likes;
			    echo $custom_likes->post_likes( '' );
			}
		?>
	</div><!-- .av-jp-social -->

	<footer class="entry-footer">
		<?php areavoices_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
