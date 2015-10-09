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

	wp_enqueue_script('jquery');

	wp_enqueue_style( 'areavoices-style', get_stylesheet_uri() );

	wp_enqueue_style(  'areavoices-icons', get_template_directory_uri() . '/css/avicons.css' ); /*RV*/

	wp_enqueue_style(  'areavoices-default', get_template_directory_uri() . '/css/style-1-default.css' ); /*RV*/

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

/**
 * Load Popular Post Wiget
 */
//require get_template_directory() . '/inc/widgets/popular-post-widget.php';
//include_once( 'include/widget/popular-post-widget.php');

/**
 * Get Image Function
 * 	Use for printing the image from image id
 * 	From: goodlayer simple theme
 */
if( !function_exists('av_get_image') ){
  function av_get_image($image, $size = 'full', $link = array(), $attr = ''){
    if( empty($image) ) return '';

    if( is_numeric($image) ){
      $alt_text = get_post_meta($image , '_wp_attachment_image_alt', true);
      $image_src = wp_get_attachment_image_src($image, $size);
      if( empty($image_src) ) return '';

      if( $link === true ){
        $image_full = wp_get_attachment_image_src($image, 'full');
        $link = array('url'=>$image_full[0]);
      }else if( !empty($link) && empty($link['url']) ){
        $image_full = wp_get_attachment_image_src($image, 'full');
        $link['url'] = $image_full[0];
      }
      $ret = '<img class="popular-post-thumbnail" src="' . $image_src[0] . '" alt="' . $alt_text . '" width="' . $image_src[1] .'" height="' . $image_src[2] . '" ' . $attr . '/>'; /*RV | Original Code */
    }else{
      if( $link === true ){
        $link = array('url'=>$image);
      }else if( !empty($link) && empty($link['url']) ){
        $link['url'] = $image;
      }
      $ret = '<img src="' . $image . '" alt="" ' . $attr . ' />';
    }

    if( !empty($link) ){
      $fancybox  = '<a href="' . $link['url'] . '" ';
      $fancybox .= (empty($link['id']))? '': 'data-fancybox-group="av-gal-' . $link['id'] . '" ';
      $fancybox .= (!empty($link['type']) && $link['type'] == 'link')? '': 'data-rel="fancybox" ';
      $fancybox .= (!empty($link['type']) && $link['type'] == 'video')? 'data-fancybox-type="iframe" ': '';
      $fancybox .= (!empty($link['new-tab']) && $link['new-tab'] == 'enable')? 'target="_blank" ': '';
      $fancybox .= '>' . $ret;
      $fancybox .= (!empty($link['close-tag']))? '': '</a>';
      return $fancybox;
    }
    return $ret;
  }
}

/**
 * Get Pagination Function
 * 	From: goodlayer simple theme
 */
 if( !function_exists('av_get_pagination') ){
  function av_get_pagination($max_num_page, $current_page, $format = 'paged'){
    if( $max_num_page <= 1 ) return '';

    $big = 999999999; // need an unlikely integer
    return 	'<div class="av-pagination">' . paginate_links(array(
      'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format' => '?' . $format . '=%#%',
      'current' => max(1, $current_page),
      'total' => $max_num_page,
      'prev_text'=> __('&lsaquo; Previous', 'areavoices'),
      'next_text'=> __('Next &rsaquo;', 'areavoices')
    )) . '</div>';
  }
}
if( !function_exists('av_get_ajax_pagination') ){
  function av_get_ajax_pagination($max_num_page, $current_page){
    if( $max_num_page <= 1 ) return '';

    $ret  = '<div class="av-pagination av-ajax">';
    if($current_page > 1){
      $ret .= '<a class="prev page-numbers" data-paged="' . (intval($current_page) - 1) . '" >';
      $ret .= __('&lsaquo; Previous', 'areavoices') . '</a>';
    }
    for($i=1; $i<=$max_num_page; $i++){
      if( $i == $current_page ){
        $ret .= '<span class="page-numbers current" data-paged="' . $i . '" >' . $i . '</span>';
      }else{
        $ret .= '<a class="page-numbers" data-paged="' . $i . '" >' . $i . '</a>';
      }
    }
    if($current_page < $max_num_page){
      $ret .= '<a class="next page-numbers" data-paged="' . (intval($current_page) + 1) . '" >';
      $ret .= __('Next &rsaquo;', 'areavoices') . '</a>';
    }
    $ret .= '</div>';
    return $ret;
  }
}

/**
 * Jetpack: Remove default Share filtering
 * 	Allows manual sharing placement.
 * 	Source: https://jetpack.me/2013/06/10/moving-sharing-icons/
 */
function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}

add_action( 'loop_start', 'jptweak_remove_share' );

/**
 * Comment List Callback Function
 *  A comment callback function to create comment list
 * 	From: goodlayer simple theme
 */
if ( !function_exists('av_comment_list') ){
  function av_comment_list( $comment, $args, $depth ){
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ){
      case 'pingback' :
      case 'trackback' :
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
<p><?php _e( 'Pingback :', 'areavoices' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'areavoices' ), '<span class="edit-link">', '</span>' ); ?></p>
<?php break; ?>

<?php default : global $post; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
<article id="comment-<?php comment_ID(); ?>" class="comment-article">
  <div class="comment-avatar"><?php echo get_avatar( $comment, 60 ); ?></div>
  <div class="comment-body">
    <header class="comment-meta">
      <div class="comment-author av-title"><?php echo get_comment_author_link(); ?></div>
      <div class="comment-reply"><?php comment_reply_link( array_merge($args, array('reply_text' => __('Reply', 'areavoices'), 'depth' => $depth, 'max_depth' => $args['max_depth'])) ); ?></div>
    </header>

    <?php if( '0' == $comment->comment_approved ){ ?>
      <p class="comment-awaiting-moderation"><?php echo __( 'Your comment is awaiting moderation.', 'areavoices' ); ?></p>
    <?php } ?>

    <section class="comment-content">
      <?php comment_text(); ?>
    </section><!-- comment-content -->

    <div class="comment-time">
      <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
        <time datetime="<?php echo get_comment_time('c'); ?>">
        <?php echo get_comment_date() . ' ' . __('at', 'areavoices') . ' ' . get_comment_time(); ?>
        </time>
      </a>
    </div>
    <?php edit_comment_link( __( 'Edit', 'areavoices' ), '<p class="edit-link">', '</p>' ); ?>
  </div><!-- comment-body -->
</article><!-- comment-article -->
<?php
      break;
    }
  }
}
