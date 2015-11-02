<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package areavoices
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
		<?php edit_post_link( esc_html__( 'Edit', 'areavoices' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
