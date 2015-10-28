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

add_action( 'widgets_init', 'av_recent_comment_widget' );
if( !function_exists('av_recent_comment_widget') ){
	function av_recent_comment_widget() {
		register_widget( 'AreaVoices_Recent_Comment' );
	}
}

if( !class_exists('AreaVoices_Recent_Comment') ){
	class AreaVoices_Recent_Comment extends WP_Widget{

		// Initialize the widget
		function __construct() {
			parent::WP_Widget(
				'av-recent-comment-widget',
				__('AreaVoices Recent Comment Widget','areavoices'),
				array('description' => __('A widget that show lastest comment', 'areavoices')));
		}

		// Output of the widget
		function widget( $args, $instance ) {
			global $theme_option;

		
		}

		// Widget Form
		function form( $instance ) {
			$title = isset($instance['title'])? $instance['title']: '';
			$category = isset($instance['category'])? $instance['category']: '';
			$num_fetch = isset($instance['num_fetch'])? $instance['num_fetch']: 3;

			?>

			<!-- Text Input -->
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title :', 'areavoices'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>

			<!-- Post Category -->
			<p>
				<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category :', 'areavoices'); ?></label>
				<select class="widefat" name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>">
				<option value="" <?php if(empty($category)) echo ' selected '; ?>><?php _e('All', 'areavoices') ?></option>
				<?php
				$category_list = av_get_term_list('category');
				foreach($category_list as $cat_slug => $cat_name){ ?>
					<option value="<?php echo $cat_slug; ?>" <?php if ($category == $cat_slug) echo ' selected '; ?>><?php echo $cat_name; ?></option>
				<?php } ?>
				</select>
			</p>

			<!-- Show Num -->
			<p>
				<label for="<?php echo $this->get_field_id('num_fetch'); ?>"><?php _e('Num Fetch :', 'areavoices'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('num_fetch'); ?>" name="<?php echo $this->get_field_name('num_fetch'); ?>" type="text" value="<?php echo $num_fetch; ?>" />
			</p>

		<?php
		}

		// Update the widget
		function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = (empty($new_instance['title']))? '': strip_tags($new_instance['title']);
			$instance['category'] = (empty($new_instance['category']))? '': strip_tags($new_instance['category']);
			$instance['num_fetch'] = (empty($new_instance['num_fetch']))? '': strip_tags($new_instance['num_fetch']);

			return $instance;
		}
	}
}
?>
