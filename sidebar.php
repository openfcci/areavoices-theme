<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package areavoices
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	//return; /*RV*/
}
?>

<div id="secondary" class="widget-area" role="complementary">

	<!-- ABOUT ME: Begin -->
	<aside id="about-me" class="widget widget_text">
		<div id="bioheader" class="av-widget-title-wrapper" align="center">
			<h1 class="widget-title">
				ABOUT
			</h1>
		</div>
		<div class="textwidget">
			<p align="center">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about-me-generic.png" alt="author" />
			</p>
			<p align="center">
				<strong>
					My name is ______.
				</strong><br>
					You bio goes here.
			</p>
		</div>
	</aside>
	<!-- ABOUT ME: End -->

	<!-- Sidebar AD: Begin -->
	<aside id="sidebar-ad" class="widget widget_text">
		<div class="textwidget">
			<!---<img src="<?php /*RV*/ //echo get_template_directory_uri(); ?>/images/avsidebarad.jpg" role="advertising" alt="banner ad">-->
			<div id="sidebar-ad" style="background-image: url(<?php /*RV*/ echo get_template_directory_uri(); ?>/images/av-loading.gif); background-repeat: no-repeat; background-position: center; min-height:250px"><!-- RSB AD: Start -->
				<script type="text/javascript">googletag.display('sidebar-ad');</script>
			</div><!-- RSB AD: End -->
		</div>
	</aside>
	<!-- Sidebar AD: End -->

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
