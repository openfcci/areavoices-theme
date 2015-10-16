<?php
/**
 * The template used for displaying Google Ad content in header.php
 * rv
 * @package areavoices
 */

/*RV*/
?>

<!-- GOOGLE ADs: Begin -->
<script type='text/javascript'>
	(function() {
		var useSSL = 'https:' == document.location.protocol;
		var src = (useSSL ? 'https:' : 'http:') +
		'//www.googletagservices.com/tag/js/gpt.js';
		document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
		})();
</script>
<?php

		$curBlogId = get_current_blog_id();

		if(is_front_page()){
			$category[0]->cat_name = "homepage";
			$posttags = "";
		}
		else
		{

			$category = get_the_category();
			$posttagsArray = get_the_tags();
			$posttags = "";
			$tagsInt = 0;
			if ($posttagsArray) {
				foreach($posttagsArray as $tag) {
						if($tagsInt > 0) {
							$posttags .= ",";
						}
						$posttags .= "'" . $tag->name . "'" ;
					$tagsInt++;
				}
			}
		}
	?>
<script type='text/javascript'>
// Define ad spots
googletag.cmd.push(function() {
var leaderboard_top_ad_mapping = googletag.sizeMapping().
addSize([960, 0], [[960, 200],[728, 90]]).
addSize([728, 0], [728, 90]).
addSize([0, 0], [[320, 100], [320, 50], [300, 50]]).
build();

var sidebar_ad_mapping = googletag.sizeMapping().
addSize([0, 0], [300, 250]).
build();

gptAdSlots0=googletag.defineSlot('/7021/fcc.areavoices', [300, 50], 'leaderboard-top-ad').defineSizeMapping(leaderboard_top_ad_mapping).setTargeting('loc', 'atf').setTargeting('kw', ['homepage']).addService(googletag.pubads());
gptAdSlots1=googletag.defineSlot('/7021/fcc.areavoices', [300, 250], 'first-sidebar-ad').defineSizeMapping(sidebar_ad_mapping).setTargeting('loc', 'atf').setTargeting('kw', ['homepage']).addService(googletag.pubads());

googletag.pubads().enableSyncRendering();
googletag.pubads().enableSingleRequest();
googletag.pubads().enableVideoAds();
googletag.enableServices();
});
</script>
<!-- GOOGLE ADs: End -->
