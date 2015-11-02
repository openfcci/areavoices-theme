<?php
/**
 * AreaVoices Admin Dashboard Theme Appearance Menu
 *
 * @package areavoices
 */

 /**************** AreaVoices Admin Dashboard Appearance Menu ********************
 *******************************************************************************
 * Admin dashboard menu functions.
 */


 function areavoices_theme_appearance_menu() {

     add_theme_page(
         'AreaVoices Theme',            // The title to be displayed in the browser window for this page.
         'AreaVoices Theme',            // The text to be displayed for this menu item
         'administrator',            // Which type of users can see this menu item
         'areavoices_theme_options',    // The unique ID - that is, the slug - for this menu item
         'areavoices_theme_display'     // The name of the function to call when rendering this menu's page
     );

 } // end areavoices_theme_appearance_menu
 add_action( 'admin_menu', 'areavoices_theme_appearance_menu' );

 /**
  * Renders a simple page to display for the theme menu defined above.
  */
 function areavoices_theme_display() {
 ?>
     <!-- Create a header in the default WordPress 'wrap' container -->
     <div class="wrap">

         <div id="icon-themes" class="icon32"></div>
         <h2>AreaVoices Theme Options</h2>
         <?php settings_errors(); ?>

         <form method="post" action="options.php">
             <?php settings_fields( 'areavoices_theme_display_options' ); ?>
             <?php do_settings_sections( 'areavoices_theme_display_options' ); ?>
             <?php submit_button(); ?>
         </form>

     </div><!-- /.wrap -->
 <?php
 } // end areavoices_theme_display

 function areavoices_initialize_theme_options() {

     // If the theme options don't exist, create them.
     if( false == get_option( 'areavoices_theme_display_options' ) ) {
         add_option( 'areavoices_theme_display_options' );
     } // end if

     // First, we register a section. This is necessary since all future options must belong to a
     add_settings_section(
         'general_settings_section',         // ID used to identify this section and with which to register options
         'Display Options',                  // Title to be displayed on the administration page
         'areavoices_general_options_callback', // Callback used to render the description of the section
         'areavoices_theme_display_options'     // Page on which to add this section of options
     );

     // Next, we'll introduce the fields for toggling the visibility of content elements.
     add_settings_field(
         'show_header',                      // ID used to identify the field throughout the theme
         'Header',                           // The label to the left of the option interface element
         'areavoices_toggle_header_callback',   // The name of the function responsible for rendering the option interface
         'areavoices_theme_display_options',    // The page on which this option will be displayed
         'general_settings_section',         // The name of the section to which this field belongs
         array(                              // The array of arguments to pass to the callback. In this case, just a description.
             'Activate this setting to display the header.'
         )
     );

     add_settings_field(
         'show_content',
         'Content',
         'areavoices_toggle_content_callback',
         'areavoices_theme_display_options',
         'general_settings_section',
         array(
             'Activate this setting to display the content.'
         )
     );

     add_settings_field(
         'show_footer',
         'Footer',
         'areavoices_toggle_footer_callback',
         'areavoices_theme_display_options',
         'general_settings_section',
         array(
             'Activate this setting to display the footer.'
         )
     );

     // Finally, we register the fields with WordPress
     register_setting(
         'areavoices_theme_display_options',
         'areavoices_theme_display_options'
     );

 } // end areavoices_initialize_theme_options
 add_action('admin_init', 'areavoices_initialize_theme_options');

 function areavoices_general_options_callback() {
     echo '<p>Select which areas of content you wish to display.</p>';
 } // end areavoices_general_options_callback

 function areavoices_toggle_header_callback($args) {

     // First, we read the options collection
     $options = get_option('areavoices_theme_display_options');
     $show_header = $options['show_header'];


     // Next, we update the name attribute to access this element's ID in the context of the display options array
     // We also access the show_header element of the options collection in the call to the checked() helper function
     $html = '<input type="checkbox" id="show_header" name="areavoices_theme_display_options[show_header]" value="1" ' . checked(1, $show_header, false ) . '/>';

     // Here, we'll take the first argument of the array and add it to a label next to the checkbox
     $html .= '<label for="show_header"> '  . $args[0] . '</label>';

     echo $html;

 } // end areavoices_toggle_header_callback

 function areavoices_toggle_content_callback($args) {

     $options = get_option('areavoices_theme_display_options');

     $html = '<input type="checkbox" id="show_content" name="areavoices_theme_display_options[show_content]" value="1" ' . checked(1, $options['show_content'], false) . '/>';
     $html .= '<label for="show_content"> '  . $args[0] . '</label>';

     echo $html;

 } // end areavoices_toggle_content_callback

 function areavoices_toggle_footer_callback($args) {

     $options = get_option('areavoices_theme_display_options');

     $html = '<input type="checkbox" id="show_footer" name="areavoices_theme_display_options[show_footer]" value="1" ' . checked(1, $options['show_footer'], false) . '/>';
     $html .= '<label for="show_footer"> '  . $args[0] . '</label>';

     echo $html;

 } // end areavoices_toggle_footer_callback
