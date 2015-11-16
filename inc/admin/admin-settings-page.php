<?php
/**
 * AreaVoices Admin Dashboard Settings Menu
 *
 * @package areavoices
 */

 /**************** AreaVoices Admin Dashboard Settings Menu ********************
 *******************************************************************************
 * Admin dashboard menu functions.
 */

   /**
    * Register Settings Page
    */
     add_action('admin_menu', 'areavoices_admin_settings_page');
     function areavoices_admin_settings_page() {
			 if ( is_super_admin() ) { //Add the page for Super Admins only
	       if ( function_exists('current_user_can') && current_user_can('manage_options') ) {
	        add_options_page(
	          'AV Theme Settings',
	          'AV Theme Settings',
	          'manage_options',
	          'av_admin_settings',
	          'av_admin_settings'
	        );
	        add_action('admin_init', 'wp_parse_pn_admin_init');
	      }
			}
     }

   /**
    * Register Settings
    */
     function wp_parse_pn_admin_init() {
			 register_setting('av-theme-settings-group', 'av_custom_css');
			 register_setting('av-theme-settings-group', 'av_custom_js');
       register_setting('av-theme-settings-group', 'av_popular_posts_widget');
       register_setting('av-theme-settings-group', 'av_recent_posts_widget');
       register_setting('av-theme-settings-group', 'av_recent_comments_widget');
     }

 /*************************** Dashboard Page **************************
 *******************************************************************************
 * Create admin dashboard page.
 */

function av_admin_settings() {
	?>

	<div class="">
		<form action="options.php" method="post">
			<?php settings_fields('av-theme-settings-group'); ?>
			<h3>Custom CSS</h3>
			<table>
				<tr>
          <td>
						<textarea id="av_custom_js" name="av_custom_css" rows="15" cols="70"><?php echo get_option('av_custom_css'); ?></textarea>
					</td>
				<tr>
      </table>
			<h3>Custom JS</h3>
			<table>
				<tr>
					<td>
						<textarea id="av_custom_js" name="av_custom_js" rows="15" cols="70"><?php echo get_option('av_custom_js'); ?></textarea>
					</td>
				<tr>
			</table>
      <h3>Popular Posts Widget</h3>
			<table>
				<tr>
					<td>
						<input type="checkbox" id="av_popular_posts_widget" name="av_popular_posts_widget" value="1" <?php checked( 1, get_option('av_popular_posts_widget'), true ); ?>  />
            <label for="av_popular_posts_widget"> Deactivate the Popular Posts Widget.</label>
					</td>
				<tr>
			</table>
      <h3>Recent Posts Widget</h3>
			<table>
				<tr>
					<td>
						<input type="checkbox" id="av_recent_posts_widget" name="av_recent_posts_widget" value="1" <?php checked( 1, get_option('av_recent_posts_widget'), true ); ?>  />
            <label for="av_recent_posts_widget"> Deactivate the Recent Posts Widget.</label>
					</td>
				<tr>
			</table>
      <h3>Recent Comments Widget</h3>
			<table>
				<tr>
					<td>
						<input type="checkbox" id="av_recent_comments_widget" name="av_recent_comments_widget" value="1" <?php checked( 1, get_option('av_recent_comments_widget'), true ); ?>  />
            <label for="av_recent_comments_widget"> Activate this setting to display the Recent Comments Widget.</label>
					</td>
				<tr>
			</table>
      <?php submit_button(); ?>
    </form>
	</div>

	<?php
} //END: av_admin_settings
