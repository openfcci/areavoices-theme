<?php
/**
 * Search Right Sidebar Widget
 * @package areavoices
 */
 ?>

 <!-- SEARCH WIDGET: Begin -->
 <aside id="av-search-widget" class="widget widget_search">
 <div class="av-search-form">
   <form role="search" method="get" class="search-form" id="searchform" action="<?php  echo home_url(); ?>/">
     <div class="search-text" id="search-text">
       <input type="search" class="search-field" placeholder="Search&#8230;" value="" name="s" title="Search for:">
     </div>
     <input type="submit" id="searchsubmit" value="" />
     <div class="clear"></div>
   </form>
 </div>
 </aside>
 <!-- SEARCH WIDGET: End -->

  <?php
