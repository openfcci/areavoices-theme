<?php
/**
 * Plugin Name: AreaVoices Recent Comment
 * Plugin URI: http://AreaVoices.com/
 * Description: A widget that show recent comment.
 * Version: 1.0
 * Author: AreaVoices
 * Author URI: http://www.AreaVoices.com
 *
 */
echo '<aside id="av-recent-comments-widget" class="widget widget_search">';
 			$recent_comments = get_comments( array(
 				'number' => '4', //Number of Posts
 				'status' => 'approve')
 			);

			$date_format = get_option('date_format');

			echo '<div class="av-recent-post-widget">';
			echo '<div id="recent-comments-header" class="av-widget-title-wrapper" align="center"><h1 class="widget-title aboutme_title">Recent Comments</h1></div>';
 			echo '<div class="av-recent-comment-widget">';
 			foreach( $recent_comments as $recent_comment ) {
 					$comment_permalink = get_permalink($recent_comment->comment_post_ID) . '#comment-' . $recent_comment->comment_ID;
 					echo '<div class="recent-comment-widget">';

 					echo '<div class="recent-comment-widget-thumbnail"><a href="' . $comment_permalink . '" >';
 					echo get_avatar( $recent_comment->user_id, 55 );
 					echo '</a></div>';

 					echo '<div class="recent-comment-widget-content">';
 					echo '<div class="recent-comment-widget-title"><a href="' . $comment_permalink . '" >' . $recent_comment->comment_author . '</a></div>';

 					echo '<div class="recent-comment-widget-info">';
 					echo __('Commented On', 'areavoices') . ' ';
 					echo get_comment_date( $date_format, $recent_comment->comment_ID);
 					echo '</div>';

 					echo '<div class="recent-comment-widget-excerpt">';
 					echo substr($recent_comment->comment_content, 0, 90);
 					if( strlen($recent_comment->comment_content) > 90 ){
 						echo '...';
 					}
 					echo '</div>';
 					echo '</div>';

 					echo '<div class="clear"></div>';
 					echo '</div>';

 			}
 			echo '<div class="clear"></div>';
 			echo '</div>';

			echo '</div>';echo '</div>';

			echo '</aside>';

 ?>
