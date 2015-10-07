<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package areavoices
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	//return; /*RV*/
}
?>

<div id="secondary" class="widget-area" role="complementary">

	<!-- ABOUT ME: Begin -->
	<aside id="about-me" class="widget widget_text">
		<div id="bioheader" class="av-widget-title-wrapper" align="center">
			<h1 class="widget-title aboutme_title">
				ABOUT
			</h1>
		</div>
		<div class="textwidget">
			<p class="aboutme_avatar" align="center">
				<img src="<?php $default_avatar = get_template_directory_uri() . '/images/about-me-generic.png';
				echo get_theme_mod( 'av_aboutme_avatar', $default_avatar ); ?>"/>
			</p>
			<h4 class="aboutme_username" align="center"><?php echo get_theme_mod( 'av_aboutme_username', '' ); ?></h4>
			<p class="aboutme_description" align="center">
				<?php echo get_theme_mod( 'av_aboutme_description', '' ); ?>
			</p>
			<div class="socials_wrap"><!--Social-Sharing-Start-->

				<?php
				$twitter = get_theme_mod( 'av_aboutme_twitter' );
				$facebook = get_theme_mod( 'av_aboutme_facebook' );
				$googleplus = get_theme_mod( 'av_aboutme_googleplus' );
				$linkedin = get_theme_mod( 'av_aboutme_linkedin' );
				$pinterest = get_theme_mod( 'av_aboutme_pinterest' );
				$instagram = get_theme_mod( 'av_aboutme_instagram' );
				$youtube = get_theme_mod( 'av_aboutme_youtube' );

				/*Twitter*/
				if (!empty( $twitter )) {
					echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_twitter', '#' ) . '" target="_blank" class="social_icons social_twitter"><span class="avicon-av-twitter"></span></a></span>';
				}
				/*Facebook*/
				if (!empty( $facebook )) {
					echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_facebook', '#' ) . '" target="_blank" class="social_icons social_facebook"><span class="avicon-av-facebook"></span></a></span>';
				}
				/*Google Plus*/
				if (!empty( $googleplus )) {
					echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_googleplus', '#' ) . '" target="_blank" class="social_icons social_gplus"><span class="avicon-av-google-plus"></span></a></span>';
				}
				/*Linkedin*/
				if (!empty( $pinterest )) {
					echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_pintrest', '#' ) . '" target="_blank" class="social_icons social_pinterest"><span class="avicon-pinterest"></span></a></span>';
				}
				/*Linkedin*/
				if (!empty( $linkedin )) {
					echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_linkedin', '#' ) . '" target="_blank" class="social_icons social_linkedin"><span class="avicon-av-linkedin"></span></a></span>';
				}
				/*Instagram*/
				if (!empty( $instagram )) {
					echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_instagram', '#' ) . '" target="_blank" class="social_icons social_instagram"><span class="avicon-instagram-with-circle"></span></a></span>';
				}
				/*YouTube*/
				if (!empty( $youtube )) {
					echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_youtube', '#' ) . '" target="_blank" class="social_icons social_youtube"><span class="avicon-youtube"></span></a></span>';
				}


				?>

			</div><!--Social-Sharing-End-->
		</div>
	</aside>
	<!-- ABOUT ME: End -->

	<!-- SIDEBAR AD: Begin -->
	<aside id="sidebar-ad" class="widget widget_text">
		<div class="textwidget">
			<!---<img src="<?php /*RV*/ //echo get_template_directory_uri(); ?>/images/avsidebarad.jpg" role="advertising" alt="banner ad">-->
			<div id="sidebar-ad" style="background-image: url(<?php /*RV*/ echo get_template_directory_uri(); ?>/images/av-loading.gif); background-repeat: no-repeat; background-position: center; min-height:250px"><!-- RSB AD: Start -->
				<script type="text/javascript">googletag.display('sidebar-ad');</script>
			</div><!-- RSB AD: End -->
		</div>
	</aside>
	<!-- SIDEBAR AD: End -->

	<!-- SEARCH WIDGET: Begin -->
	<aside id="av-search-widget" class="widget widget_search">
	<div class="av-search-form">
		<form role="search" method="get" class="search-form" id="searchform" action="<?php  echo home_url(); ?>/">
			<div class="search-text" id="search-text">
	      <input type="search" class="search-field" placeholder="Search&#8230;" value="" name="s" title="Search for:">
			</div>
			<input type="submit" id="searchsubmit" value="" />
			<div class="clear"></div>
		</form>
	</div>
	</aside>
	<!-- SEARCH WIDGET: End -->

	<!-- POPULAR POSTS WIDGET: Begin -->
	<aside>
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
			$query_args['posts_per_page'] = $num_fetch;
			$query_args['orderby'] = 'meta_value_num';
			$query_args['order'] = 'desc';
			$query_args['paged'] = 1;
			$query_args['category_name'] = $category;
			$query_args['meta_key'] = '_zilla_likes';
			$query_args['ignore_sticky_posts'] = 1;
			$query_args['post__not_in'] = array(get_the_ID());
			$query = new WP_Query( $query_args );

			if($query->have_posts()){
				echo '<div class="av-recent-post-widget">';
				echo '<div id="popular-posts-header" class="av-widget-title-wrapper" align="center"><h1 class="widget-title aboutme_title">Popular</h1></div>';
				$count = $query->post_count; $last = '';
				while($query->have_posts()){ $query->the_post(); $count--;
					if( $count == 0 ){ $last = 'av-last'; }
					echo '<div class="recent-post-widget av-style-1 ' . $last . '">';
					$thumbnail = av_get_image(get_post_thumbnail_id(), 'thumbnail');
					if( !empty($thumbnail) ){
						echo '<div class="recent-post-widget-thumbnail"><a href="' . get_permalink() . '" >' . $thumbnail . '</a></div>';
					}
					echo '<div class="recent-post-widget-content">';
					echo '<h4 class="recent-post-widget-title"><a href="' . get_permalink() . '" >' . get_the_title() . '</a></h4>';
					echo '<div class="recent-post-widget-info">';
					echo '<div class="blog-info blog-comment">';
					echo '<i class="avicon-favorite"></i>';
					echo get_post_meta( get_the_ID(), '_zilla_likes', true);
					echo '</div>'; // blog-info
					echo '</div>'; // recent-post-widget-info
					echo '</div>'; // recent-post-widget-content
					echo '<div class="clear" style="height:0px;"></div>';
					echo '</div>'; // recent-post-widget
				}
				echo '<div class="clear"></div>';
				echo '</div>';
			}
			wp_reset_postdata();

			// Closing of widget
			echo $args['after_widget'];
			?>
		</div>
	</aside>
	<!-- POPULAR POSTS WIDGET: END -->

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

</div><!-- #secondary -->
