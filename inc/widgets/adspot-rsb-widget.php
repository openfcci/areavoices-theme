<?php
/**
 * Ad Spot Right Sidebar Widget
 * @package areavoices
 */
?>

<!-- SIDEBAR AD: Begin -->
<aside id="sidebar-ad" class="widget widget_text">
  <div class="textwidget">
    <!---<img src="<?php /*RV*/ //echo get_template_directory_uri(); ?>/images/avsidebarad.jpg" role="advertising" alt="banner ad">-->
    <div id="sidebar-ad" style="background-image: url(<?php /*RV*/ echo get_template_directory_uri(); ?>/images/av-loading.gif); background-repeat: no-repeat; background-position: center; min-height:250px"><!-- RSB AD: Start -->
      <script type="text/javascript">googletag.display('sidebar-ad');</script>
    </div><!-- RSB AD: End -->
  </div>
</aside>
<!-- SIDEBAR AD: End -->

 <?php
