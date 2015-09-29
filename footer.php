<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package areavoices
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="copyright">
			<?php printf( esc_html__( '&copy; Copyright ', 'areavoices' )); ?><?php echo date( 'Y' ); ?> <?php echo bloginfo( 'name' ); ?> | <a href="http://areavoices.com/">Area Voices</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
