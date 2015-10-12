<?php
/**
 * @package areavoices
 */

?>

<!-- HEADER-TITLE: Begin -->
<?php //if ( have_posts() ) : ?>

	<header class="page-header">
		<div class="page-header-page-overlay">
			<div class="page-header-container">
				<div class="page-header-row">
							<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
				</div>
			</div>
		</div>
	</header><!-- .page-header -->

<?php //endif; ?>
<!-- HEADER-TITLE: End -->
