<?php
/**
 * This template is used for inserting Google Tag Manager script into header.php
 * @package areavoices
 */
?><!-- Google Tag Manager -->
	<div id="google-tag-manager">
		<noscript>
		  <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WN7BTV" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<script>
		  (function(w, d, s, l, i) {
		    w[l] = w[l] || [];
		    w[l].push({
		      'gtm.start': new Date().getTime(),
		      event: 'gtm.js'
		    });
		    var f = d.getElementsByTagName(s)[0],
		      j = d.createElement(s),
		      dl = l != 'dataLayer' ? '&l=' + l : '';
		    j.async = true;
		    j.src =
		      '//www.googletagmanager.com/gtm.js?id=' + i + dl;
		    f.parentNode.insertBefore(j, f);
		  })(window, document, 'script', 'dataLayer', 'GTM-WN7BTV');
		</script>
	</div>
	<!-- End Google Tag Manager -->
