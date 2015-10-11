<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package areavoices
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function areavoices_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'areavoices_body_classes' );

/**** CUSTOM FUNCTIONS START HERE *****/

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
} //Comment List Callback Function

/**
 * Jetpack: Remove default 'Share' filtering
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
