<?php
/**
 * The template used for displaying the featured slider in header.php
 * rv
 * @package areavoices
 */

 // WP_Query arguments
 $args = array (
 	'post_type'              => array( 'post' ),
 	'post_status'            => array( 'publish' ),
 	'posts_per_page'         => '6',
 	'ignore_sticky_posts'    => false,
 );

$loop = new WP_Query( $args );

// Check that we have query results.
if ( $loop->have_posts() ) { ?>
  <!-- FEATURED SLIDER: Begin -->
  <div id="responsive_check"></div>
  <div id="slider" class=" <?php if ( 'layout-2' == get_theme_mod( 'av_featured_content_slider_layout' ) ) : ?> layout2 <?php   else : ?> layout1 <?php endif; ?>">
    <a class="control_next"><span class="avicon-chevron_right"></span></a>
    <a class="control_prev"><span class="avicon-chevron_left"></span></a>
    <ul>
    <?php
    while ( $loop->have_posts() ) {
      $loop->the_post();
      $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
      $link = get_post_permalink();
      $category = get_the_category();
      ?>
      <li>
      <a href="<?php echo $link ?>">
        <div class="featured-wrapper" style="background-image: url(<?php echo $thumbnail[0]; ?>); -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; height:100%">
         <div class="slider-gradient">
           <div class="featured-info-wrapper">
              <div class="featured-category"><?php echo esc_html( $category[0]->cat_name ) ?></div>
              <div class="featured-title"><?php echo get_the_title(); ?></div>
              <div class="featured-date"><?php echo get_post_time('F j, Y', true) ?></div>
           </div>
         </div>
        </div>
        </a>
      </li>
      <?php
    }
    ?>
    </ul>
  </div>
  <!-- FEATURED SLIDER: End -->

<?php }

/*BS*/
?>




<?php wp_reset_postdata(); // Restore original post data. ?>
