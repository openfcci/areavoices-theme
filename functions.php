<?php
/**
 * areavoices functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package areavoices
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( ! function_exists( 'areavoices_setup' ) ) {

	function areavoices_setup() {

		# Make theme available for translation.
		load_theme_textdomain( 'areavoices', get_template_directory() . '/languages' );

		# Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		# Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		# Featured Image size for home page
		add_image_size( 'featured-image', 750, 330, true );
		add_image_size( 'medium-thumb', 400, 240, true );
		add_image_size( 'small-thumb', 95, 60, true );

		# This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'areavoices' ),
		) );

		# Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Enable support for Post Formats.
		 * @see http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			//'aside', /*RV*/
			//'image', /*RV*/
			//'video', /*RV*/
			//'quote', /*RV*/
			//'link', /*RV*/
		) );

		# Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'areavoices_custom_background_args', array(
			'default-color' => 'ebebeb',
			'default-image' => get_template_directory_uri() . '/images/avbackground.jpg',
		) ) );
	}
} //end areavoices_setup
add_action( 'after_setup_theme', 'areavoices_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function areavoices_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'areavoices_content_width', 640 );
}
add_action( 'after_setup_theme', 'areavoices_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function areavoices_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar: Top', 'areavoices' ),
		'id'            => 'sidebar-top',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div id="bioheader" class="av-widget-title-wrapper" align="center"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar: Middle', 'areavoices' ),
		'id'            => 'sidebar-middle',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div id="bioheader" class="av-widget-title-wrapper" align="center"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar: Bottom', 'areavoices' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div id="bioheader" class="av-widget-title-wrapper" align="center"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );

}
add_action( 'widgets_init', 'areavoices_widgets_init' );

/*--------------------------------------------------------------
# Theme Support Customizations
--------------------------------------------------------------*/

/**
 * Implement the Custom Header feature.
 * Source: https://codex.wordpress.org/Custom_Headers
 */
require get_template_directory() . '/inc/custom-header.php';
$args = array(
	'flex-width'    => true,
	'width'         => 1000,
	'flex-height'  	=> true,
	'height'        => 250,
	'uploads'				=> true,
	//'default-image' => get_template_directory_uri() . '/images/header.jpg',
	//'header-text'		=> true,
	//'default-text-color'     => '',
	//'random-default'         => false,
	//'wp-head-callback'       => '',
	//'admin-head-callback'    => '',
	//'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $args );

/*--------------------------------------------------------------
# Theme Customizations
--------------------------------------------------------------*/

/**
 * Customize the "Read More" link.
 */
add_filter( 'the_content_more_link', 'areavoices_read_more_link' );
function areavoices_excerpt_more( $more ) {
	global $post;
	return '&hellip; <br /><a id="read-more-button"class="av-contrib-button moretag button" href="'. get_permalink( $post->ID ) . '"> Read More</a>';
}
add_filter( 'excerpt_more', 'areavoices_excerpt_more' );

/*--------------------------------------------------------------
# Enqueue scripts and styles
--------------------------------------------------------------*/

function areavoices_scripts() {

	/* _s default */
	wp_enqueue_style( 'areavoices-style', get_stylesheet_uri() );

	wp_enqueue_script( 'areavoices-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true ); // ToDo Update to _s current version
	//wp_enqueue_script( 'areavoices-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'areavoices-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true ); // ToDo Update to _s current version
	//wp_enqueue_script( 'areavoices-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	/* Styles */
	wp_enqueue_style( 'areavoices-icons', get_template_directory_uri() . '/css/avicons.css' );
	//wp_enqueue_style( 'areavoices-default', get_template_directory_uri() . '/css/style-1-default.css' );

	/* Scripts */
	wp_enqueue_script( 'jquery' ); // ToDo Update or improve implementation?
	wp_enqueue_script( 'areavoices-featured-slider', get_template_directory_uri() . '/js/featured-slider.js', array(), '20151104', true ); /*BS*/ // ToDo Update?
	wp_enqueue_script( 'areavoices-transit', get_template_directory_uri() . '/js/min/jquery.transit.min.js', array(), '20151110', true ); /*BS*/ // ToDo Update?

	/**
	 * WP Featherlight Lightbox
	 *
	 * Source: http://noelboss.github.io/featherlight/
	 * Gallery: https://github.com/noelboss/featherlight/#featherlight-gallery
	 * Swipe: https://github.com/noelboss/featherlight/#featherlight-gallery
	 */
	if ( ! is_admin() ) {
		if ( get_option( 'av_lightbox' ) ) {
			# Featherlight
			wp_enqueue_script( 'wp-featherlight', get_template_directory_uri() . '/js/min/wpFeatherlight.pkgd.min.js' );
			wp_enqueue_style( 'wp-featherlight', get_template_directory_uri() . '/css/wp-featherlight.min.css' );
			# Featherlight Gallery
			wp_enqueue_script( 'wp-featherlight-gallery', get_template_directory_uri() . '/js/min/featherlight.gallery.min.js' );
			wp_enqueue_script( 'wp-featherlight-gallery', get_template_directory_uri() . '/js/av-featherlight-gallery.js' ); // @ToDo Improve this
			//wp_enqueue_style( 'wp-featherlight-gallery', get_template_directory_uri() . '/css/featherlight.gallery.min.css' ); // @ToDo User this?
		}
	}

	/**
	 * Featured Content Slider Script
	 *
	 * @author Braden Stevenson <braden.stevenson@forumcomm.com>
	 * @since ?
	 * @version 16.06.01
	 */
	if ( is_front_page() ) {
		$fc_slider = get_theme_mod( 'av_featured_content_slider', '' );
		if ( get_theme_mod( 'av_featured_content_slider' ) ) {
			wp_enqueue_script( 'areavoices-featured-slider', get_template_directory_uri() . '/js/featured-slider.js', array(), '20151104', true ); /*BS*/
		}
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

} // END areavoices_scripts()
add_action( 'wp_enqueue_scripts', 'areavoices_scripts' );


/**
 * Enqueue Google Fonts
 * @link https://www.google.com/fonts
 */
function av_add_google_fonts() {
	# Arvo
	wp_enqueue_style( 'av-google-fonts-arvo', 'http://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic', false );
	# Open Sans
	wp_enqueue_style( 'av-google-fonts-opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600', false );
}
add_action( 'wp_enqueue_scripts', 'av_add_google_fonts' );


/*--------------------------------------------------------------
# Requires
--------------------------------------------------------------*/

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Admin Settings Page
 */
require get_template_directory() . '/inc/admin/admin-settings-page.php';


/*--------------------------------------------------------------
# Dashboard Menu Related Functions
--------------------------------------------------------------*/

/**
 * Remove 'Appearance'submenu pages
 */
function av_remove_appearance_submenus() {
	if ( is_admin() ) {
		if ( ! is_super_admin() ) { // if user is not a Super Admin:
			$page = remove_submenu_page( 'themes.php', 'widgets.php' ); // remove 'Widgets'
			$page = remove_submenu_page( 'themes.php', 'editcss' ); // remove 'Edit CSS'
		}
		$page = remove_submenu_page( 'themes.php', 'theme-editor.php' ); // remove 'Editor'
	}
}
add_action( 'admin_menu', 'av_remove_appearance_submenus', 999 );

/**
 * Remove 'Appearance'submenu links
 */
function av_unset_appearance_submenus() {
	if ( is_admin() ) {
		global $submenu;
		unset( $submenu['themes.php'][15] ); // remove 'Headers' link ( @ToDo: improve?)
		unset( $submenu['themes.php'][20] ); // remove 'Background' link ( @ToDo: improve?)
	}
}
add_action( 'admin_menu', 'av_unset_appearance_submenus' );

/*--------------------------------------------------------------
# AV Theme Settings Page - Related Functions
--------------------------------------------------------------*/

/**
 * ADDITIONAL SCRIPT
 * Adds additional Javascript to footer area
 */
if ( ! function_exists( 'av_additional_script' ) ) {
	function av_additional_script() {
		$av_custom_js = get_option( 'av_custom_js' );
		if ( $av_custom_js ) {
			echo '<script type="text/javascript">' . $av_custom_js . '</script>';
		}
	}
}
add_action( 'wp_footer', 'av_additional_script' );

/**
 * Enqueue Custom CSS from AV Settings
 */
function av_custom_css() {
	$av_custom_css = get_option( 'av_custom_css' );
	if ( $av_custom_css ) {
		wp_add_inline_style( 'areavoices-style', $av_custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'av_custom_css' );

/**
 * Insert Custom PHP
 * Shortcode to use: [fcc_php] yourphp(): [/fcc_php]
 */
if ( ! function_exists( 'fcc_insert_php' ) ) {
	function fcc_insert_php( $content ) {
		$fcc_php_content = $content;
		preg_match_all( '!\[fcc_php[^\]]*\](.*?)\[/fcc_php[^\]]*\]!is', $fcc_php_content, $fcc_php_matches );
		$fcc_php_nummatches = count( $fcc_php_matches[0] );
		for ( $fcc_php_i = 0; $fcc_php_i < $fcc_php_nummatches; $fcc_php_i++ ) {
			ob_start();
			eval( $fcc_php_matches[1][ $fcc_php_i ] );
			$fcc_php_replacement = ob_get_contents();
			ob_clean();
			ob_end_flush();
			$fcc_php_content = preg_replace( '/' . preg_quote( $fcc_php_matches[0][ $fcc_php_i ], '/' ) . '/', $fcc_php_replacement, $fcc_php_content, 1 );
		}
		return $fcc_php_content;
	}
	add_filter( 'the_content', 'fcc_insert_php', 9 );
}

/*--------------------------------------------------------------
# Date
--------------------------------------------------------------*/
/**
 * Returns the date with microformats for webcrawlers
 * @source: twentysixteen
 * @since 16.06.14
 * @version 16.06.14
 */
function av_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( 'Posted on', 'Used before publish date.', 'twentysixteen' ),
		esc_url( get_permalink() ),
		$time_string
	);
}

/*--------------------------------------------------------------
# Customizer Related Functions
--------------------------------------------------------------*/

/**
 * Customizer Styles
 *
 * This function adds some styles to the WordPress Customizer
 * The panel names are based on the IDs you assign to them.
 * @link http://aristeides.com/blog/modifying-wordpress-customizer/
 */
function my_customizer_styles() {
	?>
	<style>
		#customize-controls #accordion-section-title_tagline > h3,
		/* #customize-controls #accordion-section-fcc_design_layout_section > h3, */
		#customize-controls #accordion-section-colors > h3,
		#customize-controls #accordion-section-background_image > h3,
		#customize-controls #accordion-section-sidebar-widgets-sidebar-top > h3,
		#customize-controls #accordion-section-sidebar-widgets-sidebar-middle > h3,
		#customize-controls #accordion-section-static_front_page > h3 {
		color: #999;
		}
	</style>
	<?php
}
add_action( 'customize_controls_print_styles', 'my_customizer_styles', 999 );

/**
 * Enqueue AV-Icons to Customizer CSS
 */
function my_enqueue_customizer_stylesheet() {
	wp_register_style( 'my-customizer-css', get_template_directory_uri() . '/css/avicons.css', null, null, 'all' );
	wp_enqueue_style( 'my-customizer-css' );
}
add_action( 'customize_controls_print_styles', 'my_enqueue_customizer_stylesheet' );


/*--------------------------------------------------------------
# Ad & Tracking Related Functions
--------------------------------------------------------------*/

/**
 * Google Tag Manager
 *
 * Adding Content to the wp_after_body Hook
 * @author Bill Erickson
 * @link http://www.internoetics.com/2014/01/02/add-a-hook-in-wordpress-after-the-opening-body-tag/
 */
function av_after_body() {
	do_action( 'av_after_body' );
}

function insert_google_tag_manager() {
	get_template_part( 'template-parts/google_ads', 'tagmanager' );
}
add_action( 'av_after_body', 'insert_google_tag_manager' );

/*--------------------------------------------------------------
# Jetpack Related Functions
--------------------------------------------------------------*/

/**
 * JetPack Related Posts
 * @link https://jetpack.me/support/related-posts/customize-related-posts/
 */
function jetpackme_remove_rp() {
	if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
		$jprp = Jetpack_RelatedPosts::init();
		$callback = array( $jprp, 'filter_add_target_to_dom' );
		remove_filter( 'the_content', $callback, 40 );
	}
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );


/*--------------------------------------------------------------
# Lightbox Related Functions
--------------------------------------------------------------*/

/**
 * Add 'Gallery' CSS Link Class to Post Content Images When Inserted Through 'Add Media > Insert Into Post'
 * Hook: image_send_to_editor
 * @link http://freshwebdev.com/adding-custom-class-upload-insert-image-wordpress.html
 */
function fcc_give_linked_images_class( $html, $id, $caption, $title, $align, $url, $size, $alt = '' ) {
	# Separate classes with spaces, e.g. 'img image-link'
	$classes = 'gallery';

	# check if there are already classes assigned to the anchor
	if ( preg_match( '/<a.? class=".?">/', $html ) ) {
		$html = preg_replace( '/(<a.? class=".?)(".\?>)/', '$1 ' . $classes . '$2', $html );
	} else {
		$html = preg_replace( '/(<a.*?)>/', '$1 class="' . $classes . '" >', $html );
	}

	return $html;
}
add_filter( 'image_send_to_editor', 'fcc_give_linked_images_class', 10, 8 );

/**
 * Attachment ID on Images
 *
 * wp_get_attachment_image() is used for Featured Images and other images output in templates.
 * @author Bill Erickson
 * @link http://www.billerickson.net/code/add-attachment-id-class-images/
 */
function av_add_gallery_class_to_images( $attr, $attachment ) {
	if ( ! strpos( $attr['class'], 'gallery' ) ) {
		$attr['class'] .= ' gallery';
		return $attr;
	}
}
//add_filter( 'wp_get_attachment_image_attributes', 'av_add_gallery_class_to_images', 10, 2 );

/*--------------------------------------------------------------
# Misc / Deprecated / Unused
--------------------------------------------------------------*/

/**
 * Sentence Case the Post Title
 */
function sentence_case_the_title( $title, $id = null ) {
	$title = ucwords( $title );
	return $title;
}
add_filter( 'the_title', 'sentence_case_the_title', 10, 2 );

/**
 * Debugging:
 * Admin Dashboard menu debugging function:
 * Use with: 'Debug Bar Custom Info' plugin
 * (leave commented out when not in use)
 */
function wpse_136058_debug_admin_menu() {
	//echo '<pre>' . print_r( $GLOBALS[ 'submenu' ], TRUE) . '</pre>';
	$var = $GLOBALS['submenu'];
	$label = 'Appearance Submenu Items';
	do_action( 'add_debug_info', $var, $label );
}
//add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );

/**
 * Add Editor Styles to TinyMCE Post Editor
 */
function av_theme_add_editor_styles() {
	//$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic' );
	//add_editor_style( $font_url );
	$av_editor_styles = get_template_directory_uri() . '/css/av-editor-styles.css';
	add_editor_style( array( $av_editor_styles ) );
}
//add_action( 'admin_init', 'av_theme_add_editor_styles' ); /* RV | Editor Styles Not Currently Needed */

/**
 * Filter get_avatar
 * Reference: http://aristeides.com/blog/modifying-wordpress-customizer/
 */
function my_custom_avatar( $avatar, $id_or_email, $size, $default, $alt ) {

	$user = false;

	if ( is_numeric( $id_or_email ) ) {
		$id = (int) $id_or_email;
		$user = get_user_by( 'id' , $id );
	} elseif ( is_object( $id_or_email ) ) {
		if ( ! empty( $id_or_email->user_id ) ) {
			$id = (int) $id_or_email->user_id;
			$user = get_user_by( 'id', $id );
		}
	} else {
		$user = get_user_by( 'email', $id_or_email );
	}

	if ( $user && is_object( $user ) ) {

		$author_user_id = $user->data->ID;

		//Get Site Owner//
		$args = array(
			'blog_id'      => $GLOBALS['blog_id'],
			'role'         => 'administrator',
			'meta_key'     => '',
			'meta_value'   => '',
			'meta_compare' => '',
			'number'       => '1',
		);

		$site_owner = get_users( $args );

		if ( $site_owner ) {
			$site_owner_id = $site_owner[0]->ID;
		} else {
			$site_owner_id = '';
		}

		if ( $author_user_id == $site_owner_id ) {
			$siteowner_avatar = get_theme_mod( 'av_aboutme_avatar' );
			$avatar = $siteowner_avatar;
			$avatar = "<img alt='{$alt}' src='{$avatar}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
		}
	}
	 return $avatar;
}
//add_filter( 'get_avatar' , 'my_custom_avatar' , 1 , 5 );

/**************SHORTCODES***************/

/**************NSFW***************/
/**
 * Implement the NSFW shortcode
 */
//require( get_template_directory() . '/inc/shortcodes/nsfw.php' );

/**
 * For adding custom field to gallery popup
 * @link https://make.wordpress.org/core/2012/12/12/attachment-editing-now-with-full-post-edit-ui/
 */
function add_image_attachment_fields_to_edit( $form_fields, $post ) {
	// $form_fields is a an array of fields to include in the attachment form
	// $post is nothing but attachment record in the database
	// $post->post_type == 'attachment'
	// attachments are considered as posts in WordPress. So value of post_type in wp_posts table will be attachment
	// now add our custom field to the $form_fields array
	// input type="text" name/id="attachments[$attachment->ID][custom1]"
	$form_fields['nsfw'] = array(
		'label' => __( 'NSFW' ),
		'input' => 'text', // this is default if "input" is omitted
		'value' => get_post_meta( $post->ID, '_nsfw', true ),
		//"helps" => __("Help string."),
	);
	return $form_fields;
}
# now attach our function to the hook
//add_filter( 'attachment_fields_to_edit', 'add_image_attachment_fields_to_edit', null, 2 );

function add_image_attachment_fields_to_save( $post, $attachment ) {
	// $attachment part of the form $_POST ($_POST[attachments][postID])
	// $post['post_type'] == 'attachment'
	if ( isset( $attachment['nsfw'] ) ) {
		// update_post_meta(postID, meta_key, meta_value);
		update_post_meta( $post['ID'], '_nsfw', $attachment['nsfw'] );
	}
	return $post;
}
# now attach our function to the hook.
//add_filter( 'attachment_fields_to_save', 'add_image_attachment_fields_to_save', null , 2 );
