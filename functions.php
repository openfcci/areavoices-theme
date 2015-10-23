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
		'default-color' => 'ebebeb', /*RV*/
		'default-image' => get_template_directory_uri() . '/images/avbackground.jpg', /*RV*/
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
		'name'          => esc_html__( 'Sidebar', 'areavoices' ),
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
	wp_enqueue_script( 'areavoices-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'areavoices-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

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
	//Font 2
	//wp_enqueue_style( 'av-google-fonts-font2', 'http://', false );
}
//add_action( 'wp_enqueue_scripts', 'av_add_google_fonts' );

/**
 * Add Editor Styles to TinyMCE Post Editor
 */
function av_theme_add_editor_styles() {
		//$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic' );
		//add_editor_style( $font_url );
		$av_editor_styles = get_template_directory_uri() . '/css/av-editor-styles.css';
		add_editor_style( array( $av_editor_styles ) );
}
add_action( 'admin_init', 'av_theme_add_editor_styles' );

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
 * Customize the "Read More" link.
 */
add_filter( 'the_content_more_link', 'areavoices_read_more_link' );
function areavoices_excerpt_more($more) {
	global $post;
	return '<br /><a class="av-contrib-button moretag button" href="'. get_permalink($post->ID) . '"> Read More</a>';
}
add_filter('excerpt_more', 'areavoices_excerpt_more');

/**************SHORTCODES***************/

/**
* block quote shortcode
*/

function quote( $atts, $content = null ) {
    return '<div class="blockquote"><span class="avicon-quotes-right article-quote"></span>'.$content.'</div>';
}
add_shortcode("quote", "quote");
