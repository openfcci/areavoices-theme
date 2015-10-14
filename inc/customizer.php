<?php
/**
 * areavoices Theme Customizer
 *
 * @package areavoices
 */

 /**
  * Render input control on the Theme Customizer.
  * @link https://codex.wordpress.org/Class_Reference/WP_Customize_Control
  */
 if (class_exists('WP_Customize_Control')) {
     class WP_Customize_Category_Control extends WP_Customize_Control {
         /**
          * Render the control's content.
          *
          * @since 3.4.0
          */
         public function render_content() {
             $dropdown = wp_dropdown_categories(
                 array(
                     'name'              => '_customize-dropdown-categories-' . $this->id,
                     'echo'              => 0,
                     'show_option_none'  => __( '&mdash; Select &mdash;' ),
                     'option_none_value' => '0',
                     'selected'          => $this->value(),
                 )
             );

             // Hackily add in the data link parameter.
             $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

             printf(
                 '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                 $this->label,
                 $dropdown
             );
         }
     }
 }

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function areavoices_customize_register( $wp_customize ) {

	/**
	* Get Settings
	*/
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	* Remove Default Customizer Sections
	*/
	$wp_customize->remove_section('themes'); //Remove the 'Choose Active Theme' Section
	$wp_customize->remove_section('colors'); //Remove the 'Colors' Section ( Header Text Color | Background Color )
	$wp_customize->remove_section('static_front_page'); //Remove the 'Static Front Page' Section
	//$wp_customize->remove_section('background_image'); //Remove the 'Background Image' Section


	/**
	* Start FCC Custom
	*/

	/* Color Picker Example */
	/* $wp_customize->add_section( 'areavoices_new_section_name' , array(
    'title'      => __( 'Visible Section Name', 'areavoices' ),
    'priority'   => 30,
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'        => __( 'Header Color', 'areavoices' ),
		'section'    => 'areavoices_new_section_name',
		'settings'   => 'header_textcolor',
	)));
	$wp_customize->add_setting( 'header_textcolor' , array(
    'default'     => '#000000',
    'transport'   => 'refresh',
	)); */

	/* Design Layout */
	/* $wp_customize->add_section(
				'fcc_design_section',
				array(
						'title' => 'Design',
						'description' => 'Choose a design for the theme.',
						'priority' => 12,
				)
		);
	$wp_customize->add_setting(
			'fcc_design_layout',
			array(
					'default' => 'Design 1',
			)
	);
	$wp_customize->add_control(
			'fcc_design_layout',
			array(
					'type' => 'select',
					'label' => 'Design:',
					'section' => 'fcc_design_section',
					'choices' => array(
							'design-1' => 'Design 1',
							'design-2' => 'Design 2',
							'design-3' => 'Design 3',
							'design-4' => 'Design 4',
					),
			)
	); */

	/* Design & Layout */
	$wp_customize->add_section(
        'fcc_design_layout_section',
        array(
            'title' => 'Design & Layout',
            'description' => 'Choose a layout for the homepage.',
            'priority' => 11,
        )
    );
		$wp_customize->add_setting(
		    'fcc_design',
		    array(
		        'default' => 'Design 1',
		    )
		);
		$wp_customize->add_control(
		    'fcc_design',
		    array(
		        'type' => 'select',
		        'label' => 'Design:',
		        'section' => 'fcc_design_layout_section',
		        'choices' => array(
		            'design-1' => 'Design 1&#8211;Default',
		            'design-2' => 'Design 2&#8211;Super Awesome',
		            'design-3' => 'Design 3&#8211;Magazine',
		            'design-4' => 'Design 4&#8211;Photography',
								'design-5' => 'Design 5&#8211;Sports',
								'design-6' => 'Design 6&#8211;Arts & Entertainment',
								'design-7' => 'Design 7&#8211;Food & Drink',
								'design-8' => 'Design 8&#8211;Music',
		        ),
		    )
		);
		$wp_customize->add_setting(
		    'fcc_homepage_layout',
		    array(
		        'default' => 'fcc-homepage-layout-standard',
		    )
		);
		$wp_customize->add_control(
		    'fcc_homepage_layout',
		    array(
		        'type' => 'select',
		        'label' => 'Homepage Layout:',
		        'section' => 'fcc_design_layout_section',
		        'choices' => array(
		            'fcc-homepage-layout-standard' => 'Standard (Default)',
		            'fcc-homepage-layout-standard-featured' => 'Standard w. Featured Content',
		            'fcc-homepage-layout-tiled' => 'Tiled',
		            'fcc-homepage-layout-tiled-featured' => 'Tiled w. Featured Content',
		        ),
		    )
		);
		$wp_customize->add_setting(
		    'fcc_post_layout',
		    array(
		        'default' => 'fcc-post-layout-standard',
		    )
		);
		$wp_customize->add_control(
		    'fcc_post_layout',
		    array(
		        'type' => 'select',
		        'label' => 'Post Layout:',
		        'section' => 'fcc_design_layout_section',
		        'choices' => array(
		            'fcc-post-layout-standard' => 'Standard (Default)',
		            'fcc-post-layout-standard-featured' => 'Standard w. Featured Content',
		            'fcc-post-layout-tiled' => 'Tiled',
		            'fcc-post-layout-tiled-featured' => 'Tiled w. Featured Content',
		        ),
		    )
		);


	/* Author Bio */
	$wp_customize->add_section(
		'bio_section', // Section ID to use in Option Table
		array( // Arguments array
			'title' => __( 'About Me', 'areavoices' ), // Translatable text, change the text domain to your own
			'priority' => 12,
			'description' => __( 'Allows you to edit your themes layout.', 'areavoices' )
		)
	);
	// Author Image \\
	$default_bio_img = get_template_directory_uri() . '/images/about-me-generic.png';
	$wp_customize->add_setting('av_aboutme_avatar', array(
		'default'           => $default_bio_img,
		'capability'        => 'edit_theme_options',
		//'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'av_aboutme_avatar', array(
			'label'    => __('Profile Picture', 'areavoices'),
			'section'  => 'bio_section',
			'settings' => 'av_aboutme_avatar',
      //'context'    => 'your_setting_context'
      'priority'    => 0,
  		'flex_width'  => true,
  		'flex_height' => true,
  		'width'       => 160,
  		'height'      => 160,
	)));
  // Bio Pic Border \\
        $wp_customize->add_setting( 'av_aboutme_imgborder', array(
            'default'        => '1', // Returns '1' if checked, nothing (because false) if unchecked
        ) );
        $wp_customize->add_control( 'av_aboutme_imgborder', array(
            'label'   => 'Display border on profile picture',
            'section' => 'bio_section',
            'type'    => 'checkbox',
        ) );
	// Bio Name \\
	$wp_customize->add_setting('av_aboutme_username', array(
	    'default' => 'My Name is _____', // Default custom text
	));
	$wp_customize->add_control('av_aboutme_username', array(
	    'label' => 'About Me: Name', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));
	// Bio Text \\
	$wp_customize->add_setting('av_aboutme_description', array(
	    //'type' => 'option',
	    'default' => 'Your bio goes here.', // Default custom text
	));
	$wp_customize->add_control('av_aboutme_description', array(
	    'label' => 'About Me: Description', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'textarea', // Type of control: Text Area
	));
	// Twitter \\
	$wp_customize->add_setting('av_aboutme_twitter', array(
	    //'type' => 'option',
	    'default' => '', // Default custom text
	));
	$wp_customize->add_control('av_aboutme_twitter', array(
	    'label' => 'Twitter Profile Link', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));
	// Facebook \\
	$wp_customize->add_setting('av_aboutme_facebook', array(
	    'default' => '', // Default custom text
	));
	$wp_customize->add_control('av_aboutme_facebook', array(
	    'label' => 'Facebook Profile Link', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));
	// G+ \\
	$wp_customize->add_setting('av_aboutme_googleplus', array(
	    'default' => '', // Default custom text
	));
	$wp_customize->add_control('av_aboutme_googleplus', array(
	    'label' => 'Google+ Profile Link', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));
	// Pinterest \\
	$wp_customize->add_setting('av_aboutme_pinterest', array(
	    'default' => '', // Default custom text
	));
	$wp_customize->add_control('av_aboutme_pinterest', array(
	    'label' => 'Pinterest Profile Link', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));
	// Linkedin \\
	$wp_customize->add_setting('av_aboutme_linkedin', array(
	    'default' => '', // Default custom text
	));
	$wp_customize->add_control('av_aboutme_linkedin', array(
	    'label' => 'Linkedin Profile Link', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));
	// Instagram \\
	$wp_customize->add_setting('av_aboutme_instagram', array(
	    'default' => '', // Default custom text
	));
	$wp_customize->add_control('av_aboutme_instagram', array(
	    'label' => 'Instagram Profile Link', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));
	// YouTube \\
	$wp_customize->add_setting('av_aboutme_youtube', array(
	    'default' => '', // Default custom text
	));
	$wp_customize->add_control('av_aboutme_youtube', array(
	    'label' => 'YouTube Channel Link', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));

}
add_action( 'customize_register', 'areavoices_customize_register' );


/************************
 * Avatar Image Cropper
 ************************
 */

add_action( 'customize_register', 'avatar_image_cropper_register', 11 ); // after core

/**
 * Replace the core avatar image control with one that supports cropping.
 */
function avatar_image_cropper_register( $wp_customize ) {
	class WP_Customize_Cropped_Avatar_Image_Control extends WP_Customize_Cropped_Image_Control {
		public $type = 'avatar';

		function enqueue() {
			wp_enqueue_script( 'avatar-image-cropper', get_template_directory_uri()  . '/js/avatar-image-cropper.js', array( 'jquery', 'customize-controls' ) );
		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 */
		public function to_json() {
			parent::to_json();

			$value = $this->value();
			if ( $value ) {
				// Get the attachment model for the existing file.
				$attachment_id = attachment_url_to_postid( $value );
				if ( $attachment_id ) {
					$this->json['attachment'] = wp_prepare_attachment_for_js( $attachment_id );
				}
			}
		}
	}

	$wp_customize->register_control_type( 'WP_Customize_Cropped_Avatar_Image_Control' );

	$wp_customize->remove_control( 'av_aboutme_avatar' );
	$wp_customize->add_control( new WP_Customize_Cropped_Avatar_Image_Control( $wp_customize, 'av_aboutme_avatar', array(
		//'section'     => 'avatar_image',
		'section'     => 'bio_section',
		'label'       => __( 'Profile Picture' ),
		'priority'    => 0,
		'flex_width'  => true,
		'flex_height' => true,
		'width'       => 160,
		'height'      => 160,
	) ) );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function areavoices_customize_preview_js() {
	wp_enqueue_script( 'areavoices_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'areavoices_customize_preview_js' );
