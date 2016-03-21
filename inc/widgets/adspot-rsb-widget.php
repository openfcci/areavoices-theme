<?php
/**
 * Ad Spot Right Sidebar Widget
 * @package areavoices
 * @version 2016.03.21
 */
?>

<!-- SIDEBAR AD: Begin -->
<aside id="=sidebar-ad-1" class="widget widget_text">
  <div class="textwidget">
    <div id="sidebar-ad" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/av-loading.gif); background-repeat: no-repeat; background-position: center; min-height:250px"><!-- RSB AD: Start -->
      <script type="text/javascript">
		    googletag.cmd.push(function() {
		      googletag.display('sidebar-ad');
		    });
		  </script>
    </div><!-- RSB AD: End -->
  </div>
</aside>
<!-- SIDEBAR AD: End -->

 <?php
