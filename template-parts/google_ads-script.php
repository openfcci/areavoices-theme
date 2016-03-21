<?php
/**
 * The template used for displaying Google Ad content in header.php
 * @package areavoices
 * @version 2016.03.21
 */
?>

<!-- GOOGLE DFP AD TAGS -->
<script type='text/javascript'>
	(function() {
		var useSSL = 'https:' == document.location.protocol;
		var src = (useSSL ? 'https:' : 'http:') +
		'//www.googletagservices.com/tag/js/gpt.js';
		document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
		})();
</script>

<?php
/**
 * Build the Tags
 */
$curBlogId = get_current_blog_id();

if( is_home() ){
	$category[0] = new StdClass;
	$category[0]->cat_name = "'homepage'" . "," . "'blog_" . $curBlogId . "'";
	$posttags = "";
}
else
{
	$categoryArray = get_the_category();
	$category = "";
	$catInt = 0;
		if ($categoryArray) {
			foreach($categoryArray as $cat) {
				if($catInt > 0) {
					$category .= ",";
				}
				$category .= "'" . str_replace('&', 'and', htmlspecialchars_decode($cat->name)) . "'" ;
			$catInt++;
		}
	}
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
var gptAdSlots = [];

googletag.cmd.push(function() {
	var leaderboard_ad_mapping = googletag.sizeMapping().
	addSize([0, 0], [[320, 100], [320, 50], [300, 50]]).
  addSize([980, 0], [[980, 330], [728, 90], [960, 200], [930, 180], [970, 90], [970, 250], [970, 66], [980, 120]]).
  addSize([970, 0], [[728, 90], [960, 200], [930, 180], [970, 90], [970, 250], [970, 66], [980, 120]]).
  addSize([960, 0], [[728, 90], [960, 200], [930, 180]]).
  addSize([728, 0], [728, 90]).
  build();

	var sidebar_ad_mapping = googletag.sizeMapping().
	addSize([0, 0], [[300, 250], [320, 100], [320, 50], [300, 50]]).
  addSize([728, 0], [300, 250]).
  build();

	gptAdSlots[0] = googletag.defineSlot('/7021/fcc.forum/fcc.areavoices', [300, 50], 'leaderboard-ad')
	.defineSizeMapping(leaderboard_ad_mapping)
	.addService(googletag.companionAds())
	.addService(googletag.pubads())
	.setTargeting('loc', 'atf')
	.setTargeting('kw', [
		<?php
		if( is_home() ) {
			echo "'homepage'" . "," . "'blog_" . $curBlogId . "'";
		}
		else {
			echo "'blog_" . $curBlogId . "'" . "," . $category;
			if( $posttags != "" ) { echo "," . $posttags; }
		}
		?>
	]);

	gptAdSlots[1] = googletag.defineSlot('/7021/fcc.forum/fcc.areavoices', [300, 250], 'sidebar-ad')
	.defineSizeMapping(sidebar_ad_mapping)
	.addService(googletag.companionAds())
  .addService(googletag.pubads())
	.setTargeting('loc', 'atf')
	.setTargeting('kw', [
		<?php
		if( is_home() ) {
			echo "'homepage'" . "," . "'blog_" . $curBlogId . "'";
		}
		else {
			echo "'blog_" . $curBlogId . "'" . "," . $category;
			if( $posttags != "" ) { echo "," . $posttags; }
		}
		?>
	]);

	googletag.enableServices();

});

googletag.pubads().enableSyncRendering();
googletag.pubads().enableSingleRequest();
googletag.pubads().enableVideoAds();
googletag.enableServices();

</script>
<!-- END GOOGLE DFP AD TAGS-->
