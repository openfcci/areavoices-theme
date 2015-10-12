<?php
/**
 * 'About Me' Sidebar Widget
 * @package areavoices
 */
?>

 <!-- ABOUT ME: Begin -->
 <aside id="about-me" class="widget widget_text">
   <div id="bioheader" class="av-widget-title-wrapper" align="center">
     <h1 class="widget-title aboutme_title">
       ABOUT
     </h1>
   </div>
   <div class="textwidget">
     <p class="aboutme_avatar" align="center">
       <img src="<?php $default_avatar = get_template_directory_uri() . '/images/about-me-generic.png';
       echo get_theme_mod( 'av_aboutme_avatar', $default_avatar ); ?>"/>
     </p>
     <h4 class="aboutme_username" align="center"><?php echo get_theme_mod( 'av_aboutme_username', '' ); ?></h4>
     <p class="aboutme_description" align="center">
       <?php echo get_theme_mod( 'av_aboutme_description', '' ); ?>
     </p>
     <div class="socials_wrap"><!--Social-Sharing-Start-->

       <?php
       $twitter = get_theme_mod( 'av_aboutme_twitter' );
       $facebook = get_theme_mod( 'av_aboutme_facebook' );
       $googleplus = get_theme_mod( 'av_aboutme_googleplus' );
       $linkedin = get_theme_mod( 'av_aboutme_linkedin' );
       $pinterest = get_theme_mod( 'av_aboutme_pinterest' );
       $instagram = get_theme_mod( 'av_aboutme_instagram' );
       $youtube = get_theme_mod( 'av_aboutme_youtube' );

       /*Twitter*/
       if (!empty( $twitter )) {
         echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_twitter', '#' ) . '" target="_blank" class="social_icons social_twitter"><span class="avicon-av-twitter"></span></a></span>';
       }
       /*Facebook*/
       if (!empty( $facebook )) {
         echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_facebook', '#' ) . '" target="_blank" class="social_icons social_facebook"><span class="avicon-av-facebook"></span></a></span>';
       }
       /*Google Plus*/
       if (!empty( $googleplus )) {
         echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_googleplus', '#' ) . '" target="_blank" class="social_icons social_gplus"><span class="avicon-av-google-plus"></span></a></span>';
       }
       /*Linkedin*/
       if (!empty( $pinterest )) {
         echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_pintrest', '#' ) . '" target="_blank" class="social_icons social_pinterest"><span class="avicon-pinterest"></span></a></span>';
       }
       /*Linkedin*/
       if (!empty( $linkedin )) {
         echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_linkedin', '#' ) . '" target="_blank" class="social_icons social_linkedin"><span class="avicon-av-linkedin"></span></a></span>';
       }
       /*Instagram*/
       if (!empty( $instagram )) {
         echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_instagram', '#' ) . '" target="_blank" class="social_icons social_instagram"><span class="avicon-instagram-with-circle"></span></a></span>';
       }
       /*YouTube*/
       if (!empty( $youtube )) {
         echo '<span class="social_item"><a href="' . get_theme_mod( 'av_aboutme_youtube', '#' ) . '" target="_blank" class="social_icons social_youtube"><span class="avicon-youtube"></span></a></span>';
       }

       ?>

     </div><!--Social-Sharing-End-->
   </div>
 </aside>
 <!-- ABOUT ME: End -->

 <?php
