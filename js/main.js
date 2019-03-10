//version: 1.0
jQuery(function($) {
  $(document).ready(function(){
    // Add simple lightbox
    $('.et_pb_lightbox_image').unbind('click');
    var imageLinks = $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").not('.social-share-link').not('.et_pb_gallery_image a, .envira-gallery-wrap a, .ngg-gallery-thumbnail a').attr('rel', 'gallery');

    imageLinks.magnificPopup({
      type: 'image',
      mainClass: 'mfp-fade',
      gallery:{
        enabled: true
      },
      midClick: true
    });

  }); // end document ready

  $(window).load(function(){
    //Scrolling animation for anchor tags
    if(window.location.hash) {
      smooth_scroll_to_anchor_top($(window.location.hash));
    }

    setTimeout(function() {
      setup_collapsible_submenus();
    }, 700);

  }); // end window load 

  //check if an anchor was clicked and scroll to the proper place
  $('a[href*=\\#]').on('click', function () {
    if(this.hash != '') {
      if(this.pathname === window.location.pathname){
        smooth_scroll_to_anchor_top($(this.hash));
      } 
    }
  });
      
  // scroll to the top of the anchor with an offset on desktops
  function smooth_scroll_to_anchor_top(anchor){
    if($(anchor) != 'undefined' ) {
      var window_media_query_980 = window.matchMedia("(max-width: 980px)")
      if(window_media_query_980.matches) {
        var offset_amount = 0;
      } else {
        var top_header_height = $('#top-header').height();
        var main_header_height = $('#main-header').height();
        var admin_bar_height = $('#wpadminbar').height();
        var offset_amount = top_header_height + main_header_height + admin_bar_height;
      }

      $('html,body').animate({scrollTop:($(anchor).offset().top - offset_amount) + 'px'}, 1000);
    }
  } // end function

  function setup_collapsible_submenus() {
    var $menu = $('#mobile_menu'),
        top_level_link = '#mobile_menu .menu-item-has-children > a';
         
    $menu.find('a').each(function() {
        $(this).off('click');
          
        if ( $(this).is(top_level_link) ) {
            $(this).attr('href', '#');
        }
          
        if ( ! $(this).siblings('.sub-menu').length ) {
            $(this).on('click', function(event) {
                $(this).parents('.mobile_nav').trigger('click');
            });
        } else {
            $(this).on('click', function(event) {
                event.preventDefault();
                $(this).parent().toggleClass('visible');
            });
        }
    });
  }


});
