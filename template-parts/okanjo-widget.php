<?php
/**
 * Template part for displaying single posts.
 *
 * @package areavoices
 */

?>
<!-- Okanjo -->
<div id="okanjo" class="okanjo-area">
	<div class="product-widget-dropzone"
   data-mode="sense"
   data-take="<?php if ( get_option('av_okanjo_datatake') ) { echo get_option('av_okanjo_datatake'); } else { echo '4'; }; ?>"
   data-template-product-main="product.block2"
   data-template-cta-style="button"
   data-template-cta-color="<?php if ( get_option('av_okanjo_ctacolor') ) { echo get_option('av_okanjo_ctacolor'); } else { echo '#0099ff'; }; ?>"
   data-url="<?php get_permalink( $post->ID ); ?>"
   data-selectors="<?php if ( get_option('av_okanjo_dataselectors') ) { echo get_option('av_okanjo_dataselectors'); } else { echo 'h1.entry-title, div.entry-content p'; }; ?>"
   data-pools="<?php if ( get_option('av_okanjo_datapools') ) { echo get_option('av_okanjo_datapools'); } else { echo 'global'; }; ?>">
</div>
<script src="https://cdn.okanjo.com/js/latest/okanjo-bundle.min.js" crossorigin="anonymous"></script>
<script>
	okanjo.key = '<?php if ( get_option('av_okanjo_key') ) { echo get_option('av_okanjo_key'); } else { echo 'AKlb0IhnNwnvYcXvVMv7MvWGsAzAphho'; }; ?>';
  var targets = okanjo.qwery('.product-widget-dropzone'), i = 0, p = [];
  for ( ; i < targets.length; i++) {
      p.push(new okanjo.Product(targets[i]));
  }
</script>
</div><!-- Okanjo END-->
