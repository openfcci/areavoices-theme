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
	       return $this->getOpeningHtmlTags() . $content . $this->getClosingHtmlTags();
      }

      function getOpeningHtmlTags () {
      	       return "<div>\n<p>" . $this->getDescription() . '<a href="javascript:;" onclick="' . $this->getOnClickJS() . '">Show</a></p>' . "\n" . '<div style="display:none;">';
      }

      function getClosingHtmlTags () {
      	      return "</div>\n</div>\n";
      }

      function getOnClickJS () {
      	      return "var noise = this.parentNode.parentNode.getElementsByTagName('div')[0]; if (noise.style.display == 'none') { noise.style.display = ''; this.innerHTML = 'Hide'; noise.style.paddingBottom = '1em'; this.parentNode.style.marginBottom = '0.5em'; } else { noise.style.display = 'none'; this.innerHTML = 'Show'; }";
      }

      function getDescription () {
	       return "NSFW (Not Safe For Work): &nbsp; ";
      }

      function addToAdminHead () {
      	       echo '<script type="text/JavaScript" src="' . WP_PLUGIN_URL .'/'. plugin_basename(dirname(__FILE__)) . '/nsfwquicktag.js"></script>' . "\n";
      }
}

$notsafeforwork = new NotSafeForWork();

?>
