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
			 register_setting('av-theme-settings-group', 'av_disable_ads');
			 register_setting('av-theme-settings-group', 'av_disable_gtm');
       register_setting('av-theme-settings-group', 'av_popular_posts_widget');
       register_setting('av-theme-settings-group', 'av_recent_posts_widget');
       register_setting('av-theme-settings-group', 'av_recent_comments_widget');
       register_setting('av-theme-settings-group', 'av_lightbox');
       register_setting('av-theme-settings-group', 'av_okanjo_enable');
       register_setting('av-theme-settings-group', 'av_okanjo_key');
       register_setting('av-theme-settings-group', 'av_okanjo_datatake');
       register_setting('av-theme-settings-group', 'av_okanjo_ctacolor');
       register_setting('av-theme-settings-group', 'av_okanjo_dataselectors');
       register_setting('av-theme-settings-group', 'av_okanjo_datapools');
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
			<hr>
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
      <hr>
      <h3>Lightbox</h3>
      <table>
        <tr>
          <td>
            <input type="checkbox" id="av_lightbox" name="av_lightbox" value="1" <?php checked( 1, get_option('av_lightbox'), true ); ?>  />
            <label for="av_lightbox"> Enable lightbox effect on post content images.</label>
          </td>
        <tr>
      </table>
			<hr>
			<h3>Disable Ads</h3>
			<table>
				<tr>
					<td>
						<input type="checkbox" id="av_disable_ads" name="av_disable_ads" value="1" <?php checked( 1, get_option('av_disable_ads'), true ); ?>  />
            <label for="av_disable_ads"> Disable ad spots on this site.</label>
					</td>
				<tr>
			</table>
			<h3>Disable Google Tag Manager</h3>
			<table>
				<tr>
					<td>
						<input type="checkbox" id="av_disable_gtm" name="av_disable_gtm" value="1" <?php checked( 1, get_option('av_disable_gtm'), true ); ?>  />
            <label for="av_disable_gtm"> Do not render the Google Tag Manager scripts.</label>
					</td>
				<tr>
			</table>
      <hr>
      <h2>Okanjo Advertising</h2>
        <table>
        <tr>
          <td>
            <input type="checkbox" id="av_okanjo_enable" name="av_okanjo_enable" value="1" <?php checked( 1, get_option('av_okanjo_enable'), true ); ?>  />
            <label for="av_okanjo_enable">Enable Okanjo advertising on this site.</label>
          </td>
        </tr>
      </table>
      <table class="form-table">
        <tr>
          <th scope="row"><label>Okanjo API Widget Key</label></th>
          <td>
            <input type="text" class="regular-text" id="av_okanjo_key" name="av_okanjo_key" placeholder="AKlb0IhnNwnvYcXvVMv7MvWGsAzAphho" value="<?php echo get_option('av_okanjo_key'); ?>">
          </td>
        </tr>
      </table>
      <table class="form-table">
        <tr>
          <th scope="row"><label>Okanjo Data Pools</label></th>
          <td>
            <input type="text" class="regular-text" id="av_okanjo_datapools" name="av_okanjo_datapools" placeholder="global" value="<?php echo get_option('av_okanjo_datapools'); ?>">
          </td>
        </tr>
      </table>
      <table class="form-table">
        <tr>
          <th scope="row"><label>Okanjo CTA Color</label></th>
          <td>
            <input type="text" class="regular-text" id="av_okanjo_ctacolor" name="av_okanjo_ctacolor" placeholder="#0099ff" value="<?php echo get_option('av_okanjo_ctacolor'); ?>">
          </td>
        </tr>
      </table>
      <table class="form-table">
        <tr>
          <th scope="row"><label>Okanjo Data Take</label></th>
          <td>
            <select name="av_okanjo_datatake" id="av_okanjo_datatake">
              <option <?php if ( ! get_option('av_okanjo_datatake') ) { echo 'selected="selected"'; }; ?> value="4"></option>
              <option <?php if ( get_option('av_okanjo_datatake') === '1' ) { echo 'selected="selected"'; }; ?> value="1">1</option>
              <option <?php if ( get_option('av_okanjo_datatake') === '2' ) { echo 'selected="selected"'; }; ?> value="2">2</option>
              <option <?php if ( get_option('av_okanjo_datatake') === '3' ) { echo 'selected="selected"'; }; ?> value="3">3</option>
              <option <?php if ( get_option('av_okanjo_datatake') === '4' ) { echo 'selected="selected"'; }; ?> value="4">4</option>
              <option <?php if ( get_option('av_okanjo_datatake') === '5' ) { echo 'selected="selected"'; }; ?> value="5">5</option>
              <option <?php if ( get_option('av_okanjo_datatake') === '6' ) { echo 'selected="selected"'; }; ?> value="6">6</option>
              <option <?php if ( get_option('av_okanjo_datatake') === '7' ) { echo 'selected="selected"'; }; ?> value="7">7</option>
              <option <?php if ( get_option('av_okanjo_datatake') === '8' ) { echo 'selected="selected"'; }; ?> value="8">8</option>
            </select>
          </td>
        </tr>
      </table>
			<table>
				<tr>
          <h3>Okanjo Data Selectors</h3>
					<td>
						<textarea id="av_okanjo_dataselectors" name="av_okanjo_dataselectors" rows="4" cols="70" placeholder="h1.entry-title, div.entry-content p"><?php echo get_option('av_okanjo_dataselectors'); ?></textarea>
					</td>
				<tr>
			</table>
			<hr>
      <?php submit_button(); ?>
    </form>
	</div>

	<?php
} //END: av_admin_settings
