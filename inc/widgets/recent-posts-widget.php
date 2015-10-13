<?php
/**
 * Recent Posts Widget
 * @package areavoices
 */
 ?>

 <!-- RECENT POSTS WIDGET: Begin -->
 <aside>
   <div>
     <?php
     global $theme_option;

     //$title = apply_filters( 'widget_title', $instance['title'] );
     //$thumbnail_size = empty($instance['thumbnail_size'])? 'thumbnail': $instance['thumbnail_size'];
     $category = $instance['category'];
     $num_fetch = $instance['num_fetch'];

     // Opening of widget
     echo $args['before_widget'];

     // Open of title tag
     //if( !empty($title) ){
    //   echo $args['before_title'] . $title . $args['after_title'];
    // }

     // Widget Content
			$current_post = array(get_the_ID());
			$query_args = array('post_type' => 'post', 'suppress_filters' => false);
			$query_args['posts_per_page'] = 3;
			$query_args['orderby'] = 'post_date';
			$query_args['order'] = 'desc';
			$query_args['paged'] = 1;
			$query_args['category_name'] = $category;
			$query_args['ignore_sticky_posts'] = 1;
			$query_args['post__not_in'] = array(get_the_ID());
			$query = new WP_Query( $query_args );

			if($query->have_posts()){
        //global $av_excerpt_length; $av_excerpt_length = 18;
				//add_filter('excerpt_length', 'av_set_excerpt_length');
        function av_set_excerpt_length( $length ) {
          return 10;
        }
        add_filter( 'excerpt_length', 'av_set_excerpt_length', 999 );
        function av_set_excerpt_more( $more ) {
          return '...';
        }
        add_filter( 'excerpt_more', 'av_set_excerpt_more' );


				echo '<div class="av-recent-post-widget">';
        echo '<div id="popular-posts-header" class="av-widget-title-wrapper" align="center"><h1 class="widget-title aboutme_title">Recent Posts</h1></div>';
				$count = $query->post_count; $last = '';
				while($query->have_posts()){ $query->the_post(); $count--;
					if( $count == 0 ){ $last = 'av-last'; }
					echo '<div class="recent-post-widget av-style-1 ' . $last . '">';
					$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
                    $category = get_the_category();
					if( !empty($thumbnail) ){
						echo '
                        <div class="recent-post-widget-thumbnail" style="background: url('. $thumbnail[0] .') no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"">
                        <a class ="recent-post-widget-link" href="' . get_permalink() . '" ></a>
                            <div class="recent-post-widget-content">
                                <div class="recent-post-widget-text">
                                    <div class="img-cat-contain left"><span class="img-cat left">' . esc_html( $category[0]->cat_name ) . '</span></div>
                                    <h4 class="recent-post-widget-title">
                                        ' . get_the_title() . '
                                        
                                    </h4>
                                    <div class="recent-post-widget-info">' . get_post_time('d M Y', true)  . '
                                    </div>
                                </div>
                            </div>
                        </div>';
					}
					
					echo '<div class="clear"></div>';
					echo '</div>';
				}
        echo '<div class="clear"></div>';
				echo '</div>';

				remove_filter('excerpt_length', 'av_set_excerpt_length');
        remove_filter( 'excerpt_more', 'av_set_excerpt_more' );
			}
			wp_reset_postdata();


     // Closing of widget
     echo $args['after_widget'];
     ?>
   </div>
 </aside>
 <!-- recent POSTS WIDGET: END -->

<?php
