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
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on areavoices, use a find and replace
	 * to change 'areavoices' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'areavoices', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'featured-image', 750, 330, true );     // Featured Image size for home page

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
		'aside',
		'image',
		'video',
		'quote',
		'link',
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
	wp_enqueue_style( 'areavoices-style', get_stylesheet_uri() );

	wp_enqueue_style(  'areavoices-icons', get_template_directory_uri() . '/css/avicons.css' );
	
	wp_enqueue_script( 'areavoices-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'areavoices-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'areavoices_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

$args = array(
	'flex-width'    => true,
	'width'         => 1000,
	'flex-height'    => true,
	'height'        => 250,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
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
