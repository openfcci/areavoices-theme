<?php
/**
Plugin Name: NSFW (Not Safe For Work)
Plugin URI: http://wordpress.org/extend/plugins/nsfw/
Description: Wrap the NSFW content in [nsfw][/nsfw] to hide it. Readers can click on the "Show" link to read the hidden content.
Author: Zing-Ming
Version: 1.0
Author URI: http://wordpress.org/extend/plugins/profile/zingming
*/

class NotSafeForWork {
      const shortcodeName = "nsfw";

      function NotSafeForWork () {
      	       $this->__construct();
      }

      function __construct () {
      	       add_shortcode(self::shortcodeName, array($this, 'runShortcode'));
	       add_action('admin_head', array($this, 'addToAdminHead'));
      }

      function runShortcode ($atts = null, $content = null) {
	       return $this->getOpeningHtmlTags() . do_shortcode($content) . $this->getClosingHtmlTags();
      }

      function getOpeningHtmlTags () {
      	       return "<div>\n<p>" . $this->getDescription() . '<a href="javascript:;" onclick="' . $this->getOnClickJS() . '">Show</a></p>' . "\n" . '<svg class="blur" style="filter:url(#blur-effect-1);"><text x="0" y="50">';
      }

      function getClosingHtmlTags () {
      	      return "</text>\n</svg>\n</div>\n<svg id='svg-effects'>
    <filter id='blur-effect-1'>
        <feGaussianBlur stdDeviation='3' />
    </filter>
    <filter id='blur-effect-2'>
        <feGaussianBlur stdDeviation='0' />
    </filter>
</svg> ";
      }

      function getOnClickJS () {
      	      return "var noise = this.parentNode.parentNode.getElementsByTagName('svg')[0]; if (noise.classList.contains('blur')) { noise.style.filter = 'url(#blur-effect-2)'; this.innerHTML = 'Hide'; noise.style.paddingBottom = '1em'; this.parentNode.style.marginBottom = '0.5em'; } else { noise.style.filter = 'url(#blur-effect-1)'; this.innerHTML = 'Show'; }";
      }

      function getDescription () {
	       return "NSFW (Not Safe For Work): &nbsp; ";
      }

      function addToAdminHead () {
      	       echo '<script type="text/JavaScript" src="nsfwquicktag.js"></script>' . "\n";
      }
}

$notsafeforwork = new NotSafeForWork();

?>
