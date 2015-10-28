<?php

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
	       return $this->getImage(). $this->getOpeningHtmlTags() . do_shortcode($content) . $this->getClosingHtmlTags();
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

      function getImage() {
global $more;
$more = 1;
$link = get_permalink();
$content = get_the_content();
$count = substr_count($content, '<img');
$start = 0;
for($i=1;$i<=$count;$i++) {
$imgBeg = strpos($content, '<img', $start);
$post = substr($content, $imgBeg);
$imgEnd = strpos($post, '>');
$postOutput = substr($post, 0, $imgEnd+1);
$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '',$postOutput);;
$image[$i] = $postOutput;
$start=$imgEnd+1;
echo '<a class="blur" href="">'.$image[$i]."</a>";
}

$more = 0;
}

      function addToAdminHead () {
      	       echo '<script type="text/JavaScript" src="nsfwquicktag.js"></script>' . "\n";
      }
}

$notsafeforwork = new NotSafeForWork();

?>
