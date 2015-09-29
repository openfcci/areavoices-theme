<?php
/**
 * areavoices Theme Customizer
 *
 * @package areavoices
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function areavoices_customize_register( $wp_customize ) {

	// var_dump( $wp_customize->settings() );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

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
            'title' => 'Design & Layout*',
            'description' => 'Choose a layout for the homepage.',
            'priority' => 11,
        )
    );
		$wp_customize->add_setting(
		    'fcc_design_and_layout',
		    array(
		        'default' => 'Design 1',
		    )
		);
		$wp_customize->add_control(
		    'fcc_design_and_layout',
		    array(
		        'type' => 'select',
		        'label' => 'Design:',
		        'section' => 'fcc_design_layout_section',
		        'choices' => array(
		            'design-1' => 'Design 1—Default',
		            'design-2' => 'Design 2—Super Awesome',
		            'design-3' => 'Design 3—Magazine',
		            'design-4' => 'Design 4—Photography',
								'design-5' => 'Design 5—Sports',
								'design-6' => 'Design 6—Arts & Entertainment',
								'design-7' => 'Design 7—Food & Drink',
								'design-8' => 'Design 8—Music',
		        ),
		    )
		);
		$wp_customize->add_setting(
		    'fcc_design_homepage_layout',
		    array(
		        'default' => 'fcc-homepage-layout-standard',
		    )
		);
		$wp_customize->add_control(
		    'fcc_design_homepage_layout',
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
		    'fcc_design_post_layout',
		    array(
		        'default' => 'fcc-post-layout-standard',
		    )
		);
		$wp_customize->add_control(
		    'fcc_design_post_layout',
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
			'title' => __( 'About Me*', 'areavoices' ), // Translatable text, change the text domain to your own
			'priority' => 12,
			'description' => __( 'Allows you to edit your themes layout.', 'areavoices' )
		)
	);
	// Author Image \\
	$default_bio_img = get_template_directory_uri() . '/images/about-me-generic.png';
	$wp_customize->add_setting('areavoices_options[image_upload_test]', array(
		'default'           => $default_bio_img,
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
			'label'    => __('Profile Picture', 'areavoices'),
			'section'  => 'bio_section',
			'settings' => 'areavoices_options[image_upload_test]',
	)));
	// Bio \\
	$wp_customize->add_setting('areavoices_options[custom_text]', array(
	    'type' => 'option',
	    'default' => 'You bio goes here.', // Default custom text
	));
	$wp_customize->add_control('areavoices_options[custom_text]', array(
	    'label' => 'Bio', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));
	// Facebook \\
	$wp_customize->add_setting('areavoices_options[facebook]', array(
	    'type' => 'option',
	    'default' => '', // Default custom text
	));
	$wp_customize->add_control('areavoices_options[facebook]', array(
	    'label' => 'Facebook Profile Link', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));
	// Twitter \\
	$wp_customize->add_setting('areavoices_options[twitter]', array(
	    'type' => 'option',
	    'default' => '', // Default custom text
	));
	$wp_customize->add_control('areavoices_options[twitter]', array(
	    'label' => 'Twitter Profile Link', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));
	// Linkedin \\
	$wp_customize->add_setting('areavoices_options[linkedin]', array(
	    'type' => 'option',
	    'default' => '', // Default custom text
	));
	$wp_customize->add_control('areavoices_options[linkedin]', array(
	    'label' => 'Linkedin Profile Link', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));
	// Pintrest \\
	$wp_customize->add_setting('areavoices_options[pintrest]', array(
	    'type' => 'option',
	    'default' => '', // Default custom text
	));
	$wp_customize->add_control('areavoices_options[pintrest]', array(
	    'label' => 'Pintrest Profile Link', // Label of text form
	    'section' => 'bio_section', // Layout Section
	    'type' => 'text', // Type of control: text input
	));




//End FCC Custom
}
add_action( 'customize_register', 'areavoices_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function areavoices_customize_preview_js() {
	wp_enqueue_script( 'areavoices_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'areavoices_customize_preview_js' );
