<?php
/**
 * The template used for displaying Google Ad content in header.php
 * @package areavoices
 * @version 2016.03.21
 */

/*RV*/
?>

<!-- GOOGLE HEADER AD: Begin -->
<div id="header-banner" class="banner">
	 <div id="fcc-areavoices-header-ad" align="center">
		<div id="leaderboard-ad" class="leaderboard-ad" >
			<?php if ( ! get_option( 'av_disable_ads' ) ) { ?>
			<script type="text/javascript">
		    googletag.cmd.push(function() {
		      googletag.display('leaderboard-ad');
		    });
		  </script>
			<?php } ?>
		</div>
	</div>
</div>
<!-- GOOGLE HEADER AD: End -->
