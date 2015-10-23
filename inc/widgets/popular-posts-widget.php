<?php
/**
 * Popular Posts Widget
 * @package areavoices
 */
 ?>

 <!-- POPULAR POSTS WIDGET: Begin -->
 <?php if( function_exists('zilla_likes') ) { ?>
 <aside id="av-popular-posts-widget" class="widget widget_search">
   <div>
     <?php
     global $theme_option;

     $title = apply_filters( 'widget_title', $instance['title'] );
     $category = $instance['category'];
     $num_fetch = $instance['num_fetch'];

     // Opening of widget
     echo $args['before_widget'];

     // Open of title tag
     if( !empty($title) ){
       echo $args['before_title'] . $title . $args['after_title'];
     }

     // Widget Content
     $current_post = array(get_the_ID());
     $query_args = array('post_type' => 'post', 'suppress_filters' => false);
     $query_args['posts_per_page'] = 4;
     $query_args['orderby'] = 'meta_value_num';
     $query_args['order'] = 'desc';
     $query_args['paged'] = 1;
     $query_args['category_name'] = $category;
     $query_args['meta_key'] = '_zilla_likes';
     $query_args['ignore_sticky_posts'] = 1;
     $query_args['post__not_in'] = array(get_the_ID());
     $query = new WP_Query( $query_args );

     if($query->have_posts()){
       echo '<div class="av-popular-post-widget">';
       echo '<div id="popular-posts-header" class="av-widget-title-wrapper" align="center"><h1 class="widget-title aboutme_title">Popular</h1></div>';
       $count = $query->post_count; $last = '';
       while($query->have_posts()){ $query->the_post(); $count--;
         if( $count == 0 ){ $last = 'av-last'; }
         echo '<div class="popular-post-widget av-style-1 ' . $last . '">';
         $thumbnail = av_get_image(get_post_thumbnail_id(), 'thumbnail');
         if( !empty($thumbnail) ){
           echo '<div class="popular-post-widget-thumbnail"><a href="' . get_permalink() . '" >' . $thumbnail . '</a></div>';
         }
         echo '<div class="popular-post-widget-content">';
         echo '<h4 class="popular-post-widget-title"><a href="' . get_permalink() . '" >' . get_the_title() . '</a></h4>';
         echo '<div class="popular-post-widget-info">';
         echo '<div class="blog-info blog-comment">';
         echo '<i class="avicon-favorite"></i>';
         echo get_post_meta( get_the_ID(), '_zilla_likes', true);
         echo '</div>'; // blog-info
         echo '</div>'; // popular-post-widget-info
         echo '</div>'; // popular-post-widget-content
         echo '<div class="clear" style="height:0px;"></div>';
         echo '</div>'; // popular-post-widget
       }
       //echo '<div class="clear"></div>';
       echo '</div>';
     }
     wp_reset_postdata();

     // Closing of widget
     echo $args['after_widget'];
     ?>
   </div>
 </aside>
 <?php } ?>
 <!-- POPULAR POSTS WIDGET: END -->

  <?php
