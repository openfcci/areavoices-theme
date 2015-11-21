<?php
/**
 * areavoices functions and definitions
 *
 * @package areavoices
 */

if ( ! function_exists( 'areavoices_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function areavoices_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'areavoices', get_template_directory() . '/languages' );

	/*
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// Featured Image size for home page
	add_image_size( 'featured-image', 750, 330, true );
	add_image_size( 'medium-thumb', 400, 240, true );
	add_image_size( 'small-thumb', 95, 60, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'areavoices' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		//'aside', /*RV*/
		//'image', /*RV*/
		//'video', /*RV*/
		//'quote', /*RV*/
		//'link', /*RV*/
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'areavoices_custom_background_args', array(
		'default-color' => 'ebebeb',
		'default-image' => get_template_directory_uri() . '/images/avbackground.jpg',
	) ) );
}
endif; // areavoices_setup
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

/**
 * Enqueue scripts and styles.
 */
function areavoices_scripts() {

	/* Styles */
	wp_enqueue_style( 'areavoices-style', get_stylesheet_uri() );
	wp_enqueue_style(  'areavoices-icons', get_template_directory_uri() . '/css/avicons.css' ); /*RV*/
	wp_enqueue_style(  'areavoices-default', get_template_directory_uri() . '/css/style-1-default.css' ); /*RV*/

	/* Scripts */
	wp_enqueue_script('jquery'); /*RV*/
	wp_enqueue_script( 'areavoices-featured-slider', get_template_directory_uri() . '/js/featured-slider.js', array(), '20151104', true ); /*BS*/
	wp_enqueue_script( 'areavoices-transit', get_template_directory_uri() . '/js/min/jquery.transit.min.js', array(), '20151110', true ); /*BS*/
	wp_enqueue_script( 'areavoices-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'areavoices-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	/* Featured Content Slider Script */
	if ( is_front_page() ) {
	  $fc_slider = get_theme_mod( 'av_featured_content_slider', '' );
	  if ( get_theme_mod('av_featured_content_slider') ) {
	    wp_enqueue_script( 'areavoices-featured-slider', get_template_directory_uri() . '/js/featured-slider.js', array(), '20151104', true ); /*BS*/
	  }
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'areavoices_scripts' );


/**
 * Enqueue Google Fonts
 * @link https://www.google.com/fonts#
 */
function av_add_google_fonts() {
	//Arvo
	wp_enqueue_style( 'av-google-fonts-arvo', 'http://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic', false );
	// Open Sans
	wp_enqueue_style( 'av-google-fonts-opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600', false );
	//Font 2
	//wp_enqueue_style( 'av-google-fonts-font2', 'http://', false );
}
add_action( 'wp_enqueue_scripts', 'av_add_google_fonts' );


/**
 * Add Editor Styles to TinyMCE Post Editor
 */
	/* function av_theme_add_editor_styles() {
			//$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic' );
			//add_editor_style( $font_url );
			$av_editor_styles = get_template_directory_uri() . '/css/av-editor-styles.css';
			add_editor_style( array( $av_editor_styles ) );
	} */
	//add_action( 'admin_init', 'av_theme_add_editor_styles' ); /* RV | Editor Styles Not Currently Needed */

/**
 * Implement the Custom Header feature.
 * Source: https://codex.wordpress.org/Custom_Headers
 */
require get_template_directory() . '/inc/custom-header.php';
$args = array(
	//'default-image' => get_template_directory_uri() . '/images/header.jpg', /*RV*/
	'flex-width'    => true,
	'width'         => 1000,
	'flex-height'  	=> true,
	'height'        => 250,
	'uploads'				=> true,
	//'header-text'		=> true, /*RV*/
	//'default-text-color'     => '',
	//'random-default'         => false,
	//'wp-head-callback'       => '',
	//'admin-head-callback'    => '',
	//'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $args );

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


/**
 * Customize the "Read More" link.
 */
add_filter( 'the_content_more_link', 'areavoices_read_more_link' );
function areavoices_excerpt_more($more) {
	global $post;
	return '&hellip; <br /><a class="av-contrib-button moretag button" href="'. get_permalink($post->ID) . '"> Read More</a>';
}
add_filter('excerpt_more', 'areavoices_excerpt_more');


/************** Menus ***************/
/**
 * Remove 'Appearance'submenu pages
 */
 function av_remove_appearance_submenus() {
	 if ( is_admin() ) {
		 if ( !is_super_admin() ) { // if user is not a Super Admin:
		   $page = remove_submenu_page( 'themes.php', 'widgets.php' ); // remove 'Widgets'
			 $page = remove_submenu_page( 'themes.php', 'editcss' ); // remove 'Edit CSS'
		 }
		 $page = remove_submenu_page( 'themes.php', 'theme-editor.php' ); // remove 'Editor'
	 }
 }
 add_action( 'admin_menu', 'av_remove_appearance_submenus', 999 );

 function av_unset_appearance_submenus(){
	 if ( is_admin() ) {
		 global $submenu;
		 unset($submenu['themes.php'][15]); // remove 'Headers' link
		 unset($submenu['themes.php'][20]); // remove 'Background' link
	 }
}
add_action( 'admin_menu', 'av_unset_appearance_submenus');

/**************SHORTCODES***************/

/**
 * Implement the NSFW shortcode
 */
//require( get_template_directory() . '/inc/shortcodes/nsfw.php' );


/**************NSFW***************/

/* For adding custom field to gallery popup */
// SOURCE: https://make.wordpress.org/core/2012/12/12/attachment-editing-now-with-full-post-edit-ui/
function add_image_attachment_fields_to_edit($form_fields, $post) {
  // $form_fields is a an array of fields to include in the attachment form
  // $post is nothing but attachment record in the database
  //     $post->post_type == 'attachment'
  // attachments are considered as posts in WordPress. So value of post_type in wp_posts table will be attachment
  // now add our custom field to the $form_fields array
  // input type="text" name/id="attachments[$attachment->ID][custom1]"
  $form_fields["nsfw"] = array(
    "label" => __("NSFW"),
    "input" => "text", // this is default if "input" is omitted
    "value" => get_post_meta($post->ID, "_nsfw", true),
                //"helps" => __("Help string."),
  );
   return $form_fields;
}
// now attach our function to the hook
add_filter("attachment_fields_to_edit", "add_image_attachment_fields_to_edit", null, 2);

function add_image_attachment_fields_to_save($post, $attachment) {
  // $attachment part of the form $_POST ($_POST[attachments][postID])
        // $post['post_type'] == 'attachment'
  if( isset($attachment['nsfw']) ){
    // update_post_meta(postID, meta_key, meta_value);
    update_post_meta($post['ID'], '_nsfw', $attachment['nsfw']);
  }
  return $post;
}
// now attach our function to the hook.
add_filter("attachment_fields_to_save", "add_image_attachment_fields_to_save", null , 2);

/**************ADDITIONAL SCRIPT***************/
if( !function_exists('av_additional_script') ){
  function av_additional_script() {
		$av_custom_js = get_option('av_custom_js');
		if ( $av_custom_js ) {
			echo '<script type="text/javascript">' . $av_custom_js . '</script>';
		}
  }
}
add_action( 'wp_footer', 'av_additional_script' ); // add the additional script to footer area

/**************ADDITIONAL CSS***************/
function av_custom_css() {
	$av_custom_css = get_option('av_custom_css');
	if ( $av_custom_css ) {
		wp_add_inline_style( 'areavoices-style', $av_custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'av_custom_css' );

/**************Custom PHP***************/
// Shortcode to use: [fcc_php] yourphp(): [/fcc_php]
if( ! function_exists('fcc_insert_php') )
{
	function fcc_insert_php($content)
	{
		$fcc_php_content = $content;
		preg_match_all('!\[fcc_php[^\]]*\](.*?)\[/fcc_php[^\]]*\]!is',$fcc_php_content,$fcc_php_matches);
		$fcc_php_nummatches = count($fcc_php_matches[0]);
		for( $fcc_php_i=0; $fcc_php_i<$fcc_php_nummatches; $fcc_php_i++ )
		{
			ob_start();
			eval($fcc_php_matches[1][$fcc_php_i]);
			$fcc_php_replacement = ob_get_contents();
			ob_clean();
			ob_end_flush();
			$fcc_php_content = preg_replace('/'.preg_quote($fcc_php_matches[0][$fcc_php_i],'/').'/',$fcc_php_replacement,$fcc_php_content,1);
		}
		return $fcc_php_content;
	} // function fcc_insert_php()
	add_filter( 'the_content', 'fcc_insert_php', 9 );
} // end if( ! function_exists('fcc_insert_php') )


/**************DEBUGGING***************/
/**
 * Admin Dashboard menu debugging function:
 * Use with: 'Debug Bar Custom Info' plugin
 * (leave commented out when not in use)
 */
function wpse_136058_debug_admin_menu() {
    //echo '<pre>' . print_r( $GLOBALS[ 'submenu' ], TRUE) . '</pre>';
		$var = $GLOBALS[ 'submenu' ];
		$label = 'Appearance Submenu Items';
		do_action( 'add_debug_info', $var, $label );
}
//add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );

/**************Custom Thing***************/

/**
 * Enqueue the stylesheet.
 */
function my_enqueue_customizer_stylesheet() {

    wp_register_style( 'my-customizer-css', get_template_directory_uri() . '/css/avicons.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'my-customizer-css' );

}
add_action( 'customize_controls_print_styles', 'my_enqueue_customizer_stylesheet' );

/**
 * This function adds some styles to the WordPress Customizer
 * Source: http://aristeides.com/blog/modifying-wordpress-customizer/
 */
function my_customizer_styles() {
	?>
    <style>
		/*!
* The panel names are based on the IDs you assign to them. Use your Firebug/Chrome inspector to quickly find them.
*/

#customize-controls .accordion-section-title:before,
#customize-controls .panel-title:before {
-moz-osx-font-smoothing: grayscale;
display: inline-block;
font-family: dashicons;
font-size: 20px;
font-style: normal;
font-weight: 400;
height: 20px;
line-height: 1;
text-align: center;
text-decoration: inherit;
vertical-align: top;
width: 20px;
opacity: 0.6;
}
#customize-controls .accordion-section-title:before:hover,
#customize-controls .panel-title:before:hover {
opacity: 1.0;
}
#customize-controls .panel-title:before {
left: 2px;
margin-right: 5px;
position: relative;
top: 4px;
}
#customize-controls #accordion-section-fcc_design_layout_section .panel-title:after,
#customize-controls #accordion-section-fcc_design_layout_section > h3:after{
/* font-family: 'avicons'; */
/* content: "\e926"; */
}
#customize-controls #accordion-section-title_tagline > h3 {
color: #999;
}
#customize-controls #accordion-section-fcc_design_layout_section > h3 {
color: #999;
}
#customize-controls #accordion-section-sidebar-widgets-sidebar-top > h3 {
color: #999;
}
#customize-controls #accordion-section-sidebar-widgets-sidebar-middle > h3 {
color: #999;
}

    </style>
    <?php

}
add_action( 'customize_controls_print_styles', 'my_customizer_styles', 999 );


/**
 * Filter get_avatar
 * Reference: http://aristeides.com/blog/modifying-wordpress-customizer/
 */
	//add_filter( 'get_avatar' , 'my_custom_avatar' , 1 , 5 );
	function my_custom_avatar( $avatar, $id_or_email, $size, $default, $alt ) {
	    $user = false;
	    if ( is_numeric( $id_or_email ) ) {
	        $id = (int) $id_or_email;
	        $user = get_user_by( 'id' , $id );
	    } elseif ( is_object( $id_or_email ) ) {
	        if ( ! empty( $id_or_email->user_id ) ) {
	            $id = (int) $id_or_email->user_id;
	            $user = get_user_by( 'id' , $id );
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
	    }//end if user
	    return $avatar;
	}//end my_custom_avatar

/* Sentence Case the Post Title */
function sentence_case_the_title( $title, $id = null ) {
	$title = ucwords( $title );
    return $title;
}
add_filter( 'the_title', 'sentence_case_the_title', 10, 2 );

/**
* JetPack Related Posts
* Documentation: https://jetpack.me/support/related-posts/customize-related-posts/
*/
function jetpackme_remove_rp() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );
