<?php
/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since DustySunTheme 1.0
 */
class DustySunTheme_Customize {
   /**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    *
    * Note: To enable instant preview, we have to actually write a bit of custom
    * javascript. See live_preview() for more.
    *
    * @see add_action('customize_register',$func)
    * @param \WP_Customize_Manager $wp_customize
    * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
    * @since MyTheme 1.0
    */
   public static function dst_register ( $wp_customize ) {
     /* ========================================================== */
     //    MAIN PANEL
     /* ========================================================== */


     $wp_customize->add_panel( 'dst_child_theme_customizations_option', array(
       'priority' => 1,
       'capability' => 'edit_theme_options',
       'title' => __('CFNP Custom Options', 'dst_child_theme'),
     ));


     /* ========================================================== */
     // HEADER OPTIONS PANEL  //
     /* ========================================================== */
     $wp_customize->add_section('dst_header_section', array(
      'priority' => 10,
      'title' => __('Header', 'dst_child_theme'),
      'panel' => 'dst_child_theme_customizations_option',
      'description' => __('Customize the header.', 'dst_child_theme'),
     ));

      // Additional header image
      $wp_customize->add_setting('dst_header_fixed_header_logo');

      $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize, 'dst_header_fixed_header_logo',
            array(
                'label' => __('Fixed Header Alternate Logo','dst_child_theme'),
                'section' => 'dst_header_section',
                'settings' => 'dst_header_fixed_header_logo',
                'priority'   => 10
            )
        )
      );

      // Text number info
      $wp_customize->add_setting('dst_text_info', array(
        'default' => '',
      ));

      $wp_customize->add_control('dst_text_info', array(
        'label' => __('Text Number Info', 'dst_child_theme'),
        'section' => 'dst_header_section',
        'type' => 'text',
        'priority' => 20,
        'settings' => 'dst_text_info'
      ));


     /* ========================================================== */
     // FOOTER OPTIONS PANEL  //
     /* ========================================================== */
     $wp_customize->add_section('dst_footer_copyright_section', array(
       'priority' => 15,
       'title' => __('Footer', 'dst_child_theme'),
       'panel' => 'dst_child_theme_customizations_option',
       'description' => __('Customize the footer.', 'dst_child_theme'),
     ));

       // Copyright text
       $wp_customize->add_setting('dst_footer_copyright_text', array(
         'default' => esc_attr( get_bloginfo( 'name' )),
       ));

       $wp_customize->add_control('dst_footer_copyright_text', array(
         'label' => __('Copyright Text', 'dst_child_theme'),
         'section' => 'dst_footer_copyright_section',
         'type' => 'text',
         'priority' => 20,
         'settings' => 'dst_footer_copyright_text'
       ));

       // Copyright rights reserved
       $wp_customize->add_setting('dst_footer_copyright_reserved', array(
         'default' => 'All Rights Reserved',
       ));

       $wp_customize->add_control('dst_footer_copyright_reserved', array(
         'label' => __('Rights Reserved Text', 'dst_child_theme'),
         'section' => 'dst_footer_copyright_section',
         'type' => 'text',
         'priority' => 25,
         'settings' => 'dst_footer_copyright_reserved'
       ));

      //Footer Background Image
      $wp_customize->add_setting('dst_footer_background_img');

      $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize, 'dst_footer_background_img',
          array(
              'label' => __('Footer Background Image','dst_child_theme'),
              'section' => 'dst_footer_copyright_section',
              'settings' => 'dst_footer_background_img',
              'priority'   => 30
          )
        )
      );

     /* ========================================================== */
     //  SOCIAL MEDIA PANEL   //
     /* ========================================================== */
     // add section to panel
     $wp_customize->add_section('dst_social_media_section', array(
       'priority' => 35,
       'title' => __('Social Media Accounts', 'dst_child_theme'),
       'panel' => 'dst_child_theme_customizations_option',
       'description' => __('Additional social media accounts not listed in the Divi options.', 'dst_child_theme'),
     ));

       // LinkedIn
       $wp_customize->add_setting('dst_social_media_linkedin');

       $wp_customize->add_control('dst_social_media_linkedin', array(
         'label' => __('LinkedIn', 'dst_child_theme'),
         'section' => 'dst_social_media_section',
         'type' => 'text',
         'priority' => 25,
         'settings' => 'dst_social_media_linkedin'
       ));

       // Instagram
       $wp_customize->add_setting('dst_social_media_instagram');

       $wp_customize->add_control('dst_social_media_instagram', array(
         'label' => __('Instagram', 'dst_child_theme'),
         'section' => 'dst_social_media_section',
         'type' => 'text',
         'priority' => 15,
         'settings' => 'dst_social_media_instagram'
       ));

       // Pinterest
       $wp_customize->add_setting('dst_social_media_pinterest');

       $wp_customize->add_control('dst_social_media_pinterest', array(
         'label' => __('Pinterest', 'dst_child_theme'),
         'section' => 'dst_social_media_section',
         'type' => 'text',
         'priority' => 25,
         'settings' => 'dst_social_media_pinterest'
       ));

       // YouTube
       $wp_customize->add_setting('dst_social_media_youtube');

       $wp_customize->add_control('dst_social_media_youtube', array(
         'label' => __('YouTube', 'dst_child_theme'),
         'section' => 'dst_social_media_section',
         'type' => 'text',
         'priority' => 35,
         'settings' => 'dst_social_media_youtube'
       ));

       // YouTube
       $wp_customize->add_setting('dst_social_media_vimeo');

       $wp_customize->add_control('dst_social_media_vimeo', array(
         'label' => __('Vimeo', 'dst_child_theme'),
         'section' => 'dst_social_media_section',
         'type' => 'text',
         'priority' => 40,
         'settings' => 'dst_social_media_vimeo'
       ));

       // Snapchat
       $wp_customize->add_setting('dst_social_media_snapchat');

       $wp_customize->add_control('dst_social_media_snapchat', array(
         'label' => __('Snapchat', 'dst_child_theme'),
         'section' => 'dst_social_media_section',
         'type' => 'text',
         'priority' => 45,
         'settings' => 'dst_social_media_snapchat'
       ));

       // Email
       $wp_customize->add_setting('dst_social_media_email');

       $wp_customize->add_control('dst_social_media_email', array(
         'label' => __('Email', 'dst_child_theme'),
         'section' => 'dst_social_media_section',
         'type' => 'text',
         'priority' => 50,
         'settings' => 'dst_social_media_email'
       ));

   } //end public static function dst_register


}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'DustySunTheme_Customize' , 'dst_register' ) );
