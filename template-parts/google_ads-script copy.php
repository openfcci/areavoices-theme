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
							$posttags .= ',';
						}
						$posttags .= $tag->name;
					$tagsInt++;
				}
			}
		}
	?>
<script type='text/javascript'>
	if (jQuery(window).width() >= 728) {
		googletag.defineSlot('/7021/fcc.areavoices', [[728, 90], [960, 200]], 'div-gpt-ad-1430258018861-0').addService(googletag.pubads()).setTargeting('loc', 'atf').setTargeting('kw', ['blog_<?php echo $curBlogId;?>,<?php echo $category[0]->cat_name;?><?php if($posttags != ""){echo ",".$posttags;}?>']);
	}
	else {
		googletag.defineSlot('/7021/fcc.areavoices', [[320, 50]], 'div-gpt-ad-1430258018861-0').addService(googletag.pubads()).setTargeting('loc', 'atf').setTargeting('kw', ['blog_<?php echo $curBlogId;?>,<?php echo $category[0]->cat_name;?><?php if($posttags != ""){echo ",".$posttags;}?>']);
	}
	googletag.defineSlot('/7021/fcc.areavoices', [300, 250], 'sidebar-ad').addService(googletag.pubads()).setTargeting('loc', 'atf').setTargeting('kw', ['blog_<?php echo $curBlogId;?>,<?php echo $category[0]->cat_name;?><?php if($posttags != ""){echo ",".$posttags;}?>']);
	googletag.pubads().enableSyncRendering();
	googletag.pubads().enableSingleRequest();
	googletag.pubads().enableVideoAds();
	googletag.enableServices();
</script>
<!-- GOOGLE ADs: End -->
