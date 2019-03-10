<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/* Add custom functions below */

add_action( 'wp_enqueue_scripts', 'ds_enqueue_assets', 15 );
function ds_enqueue_assets() {

  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array(), et_get_theme_version() );
  wp_dequeue_style( 'divi-style' );
  wp_enqueue_style( 'child-theme', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
  wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', '', '1.1.4', true );

}//end function ds_enqueue_assets

function ds_conditional_style_enqueue($ds_handle='', $ds_path = '', $ds_version = '', $ds_dependencies = 'array()', $ds_media = 'all'){
  if(wp_style_is($ds_handle, $ds_list = 'enqueued')){
    return;
  } else {
    wp_enqueue_style($ds_handle, $ds_path, $ds_dependencies, $ds_version, $ds_media);
  }
} //end function ds_conditional_enqueue

/////////////////////////////////////////////////////
// Change the Read More Text
////////////////////////////////////////////////////
function ds_translate_text($translated) { 
  $translated = str_ireplace('read more', 'Continue Reading', $translated); 
  $translated = str_ireplace('« Older Entries', '< Older Posts', $translated); 
  $translated = str_ireplace('Next Entries »', 'Newer Posts >', $translated); 
return $translated; 
}
add_filter('gettext', 'ds_translate_text');
add_filter('ngettext', 'ds_translate_text');

/////////////////////////////////////////////////////
// NEW MENU LOCATIONS
////////////////////////////////////////////////////
add_action( 'init', 'register_dst_custom_menus' );
function register_dst_custom_menus() {
  register_nav_menu('footer-copyright-menu',__( 'Footer Copyright Menu' ));
}

////////////////////////////////////////////////////
// CHILD THEME CUSTOMIZER OPTIONS
////////////////////////////////////////////////////
require_once('includes/theme_customizer.php');


////////////////////////////////////////////////////
// CUSTOM WIDGET AREAS
////////////////////////////////////////////////////
function dst_widgets_init() {

  register_sidebar( array(
    'name'          => 'Below Posts',
    'id'            => 'below-posts-01',
    'before_widget' => '<div class="clear"></div><div id="below-posts-01" class="widget-area">',
    'after_widget'  => '</div>',
    'before_title'  => '<h1>',
    'after_title'   => '</h1>',
  ));
  register_sidebar( array(
    'name'          => 'Above Footer Fullwidth',
    'id'            => 'footer-fullwidth',
    'before_widget' => '<div class="clear"></div><div id="footer-fullwidth" class="widget-area">',
    'after_widget'  => '</div>',
    'before_title'  => '<h1>',
    'after_title'   => '</h1>',
  ));
} //end function ds_widgets_init
add_action( 'widgets_init', 'dst_widgets_init');

// Add the widget area below the posts
function dst_add_post_widgets($content) {
  if( is_singular( 'post' ) ):
    if ( is_active_sidebar('below-posts-01') ) :
      ob_start();
      dynamic_sidebar('below-posts-01');
      $content .= ob_get_contents();
      ob_end_clean();
   endif;
 endif; //function dst_add_post_widgets($content)
  return $content;
} //end function dst_add_facebook_comments_div()
add_filter('the_content', 'dst_add_post_widgets', 999999999);

////////////////////////////////////////////////////
// FEATURED IMAGES IN RSS (for MailChimp)
////////////////////////////////////////////////////
function rss_post_thumbnail($content) {
  global $post;
  if(has_post_thumbnail($post->ID)) {
  $content = '<p>' . get_the_post_thumbnail($post->ID, 'large') .
  '</p>' . get_the_content();
}
return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');


// THEME CUSTOMIZER OPTIONS

// Output custom CSS to live site
// add_action( 'wp_head' , 'dst_header_output' );
add_action( 'wp_enqueue_scripts', 'dst_header_output', 14 );

function dst_header_output() {
  $footer_background_image = esc_attr(get_theme_mod('dst_footer_background_img'));
  $header_fixed_alternate_logo = esc_attr( get_theme_mod( 'dst_header_fixed_header_logo', ''));
  if($header_fixed_alternate_logo != '' || $footer_background_image != '') {
    // $customizer_css = '<style type="text/css">';
    $customizer_css;

    if($header_fixed_alternate_logo != '') {
        $customizer_css .= '
        .logo_container a:before {
          background-image: url("' . $header_fixed_alternate_logo . '");
        }';
        $customizer_css .= file_get_contents(get_stylesheet_directory_uri() . '/css/logo.css');
    }
    if ($footer_background_image != '') {
      $customizer_css .= '#main-footer {
        background-image: url("' . $footer_background_image . '"); 
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
      }';
    }

    // $customizer_css .= '</style><!--/Customizer CSS-->';

    // echo $customizer_css;
    wp_register_style( 'customizer-css', false );
    wp_enqueue_style( 'customizer-css' );
    wp_add_inline_style( 'customizer-css', $customizer_css );
  
  } // end  if($header_top_left_image != '') {
   
} // end function dst_header_output


// change the archive titles
function dst_archive_title( $title ) {
  if ( is_category() ) {
      $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
      $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
      $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif ( is_post_type_archive() ) {
      $title = post_type_archive_title( '', false );
  } elseif ( is_tax() ) {
      $title = single_term_title( '', false );
  }

  return $title;
}
add_filter( 'get_the_archive_title', 'dst_archive_title' );