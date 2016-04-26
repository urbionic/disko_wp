/*------------------------------------------------------------------------------
  FitVids
------------------------------------------------------------------------------*/
/**
 * FitVids.js
 *
 * @since  1.0.0
 */
(function($) {

  'use strict';

  $(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $('.c-post__content, .c-post__summary').fitVids();
  });
})(jQuery);
/*------------------------------------------------------------------------------
  Masonry
------------------------------------------------------------------------------*/
/**
 * Masonry.
 *
 * @since  1.0.0
 */
(function($) {

  'use strict';

  if ($('.page-template-home').length !== 0) {
    $(window).load(function() {
      // var $container = $('.c-portfolio-items');
      // $container.masonry({
      //   itemSelector: '.c-portfolio-item'
      // });

      var $container = $('.c-portfolio-items').masonry({
        itemSelector: '.c-portfolio-item',
        // disable initial layout
        isInitLayout: false,
      });

      // bind event
      $container.masonry( 'on', 'layoutComplete', function() {
        $('.c-portfolio-item').addClass('is-masonry');
      });

      // manually trigger initial layout
      $container.masonry();
    });
  }
})(jQuery);
/*------------------------------------------------------------------------------
  Primary Navigation
------------------------------------------------------------------------------*/
/**
 * Toggle function for the primary mobile menu.
 *
 * @since 1.0.0
 */
(function($) {

  'use strict';

  // Do nothing if Primary Navigation is not found.
  if ( 0 === $('.c-nav-primary').length ) {
    return;
  }

  // Cache
  var $win              = $(window),
      $doc              = $(document),
      $nav              = $('.c-nav-primary__mobile'),
      $menu             = $('.c-menu-primary-mobile'),
      $toggleMenu       = $('.c-nav-primary__mobile-toggle'),
      $itemHasChildren  = $('.menu-item-has-children'),
      $search           = $('.c-nav-primary__search'),
      $toggleSearch     = $('.c-nav-primary__search > i'),
      mobileWindowSize  = 1025,
      toggleSubmenuHtml = '<span><i class="fa fa-plus"></i></span>';

  // Create "+" icon for items with children.
  $itemHasChildren.children('a').after( '<a class="c-menu-primary-mobile__sub-menu-toggle">' + toggleSubmenuHtml + '</a>' );

  // Cache sub menu toggle
  var $toggleSubMenu = $('.c-menu-primary-mobile__sub-menu-toggle');

  /* Main toggle
  --------------------------------*/
  $toggleMenu.click( function () {
    $nav.toggleClass('is-active');
    $menu.toggleClass('is-active');
    $toggleMenu.toggleClass('is-active');

    $toggleMenu.children('i').toggleClass('fa-bars');
    $toggleMenu.children('i').toggleClass('fa-close');
  });


  /* Sub Menu Toggle
  --------------------------------*/
  $toggleSubMenu.click( function() {
    $(this).closest($itemHasChildren).toggleClass('is-active');
    $(this).next('.sub-menu').slideToggle();
  });


  /* Better menu user experience
  --------------------------------*/
  // Click outside of menu to close
  $doc.on('click', function(e) {
    if ( $(e.target).is('.c-nav-primary__mobile-overlay') ) {
      $toggleMenu.click();
    }
  });

  // Press escape key to close.
  $doc.keyup(function(e){
    if (e.keyCode === 27) {
      if ($nav.hasClass('is-active')) {
        $toggleMenu.click();
      }
      else if ($search.hasClass('is-active')) {
        $toggleSearch.click();
      }
    }
  });


  /* Search
  --------------------------------*/
  $toggleSearch.click(function() {
    $search.toggleClass('is-active');
    $search.find('.search-field').focus();
  });

  // Close if clicked outside of search form when open.
  $doc.click(function (e){
    if ( ! $search.is(e.target) && $search.has(e.target).length === 0) {
      $search.removeClass('is-active');
    }
  });


  /* Resizing
  --------------------------------*/
  // Reset to default non mobile state
  function notMobile() {
    if ($win.width() > mobileWindowSize) {
      $nav.removeClass('is-active');
      $menu.removeClass('is-active');
      $toggleMenu.removeClass('is-active');

      if ($toggleMenu.children('i').hasClass('fa-close')) {
        $toggleMenu.children('i').toggleClass('fa-bars');
        $toggleMenu.children('i').toggleClass('fa-close');
      }

      $toggleSubMenu.hide();
      $toggleSubMenu.next('.sub-menu').css('display', '');
    }
  }

  // Reset to default mobile state
  function isMobile() {
    if ($win.width() < mobileWindowSize ) {
      $toggleSubMenu.show();
      // Hide sub menus first.
      $toggleSubMenu.next('.sub-menu').css('display', 'none');
    }
  }

  // Init is/not Mobile
  notMobile();
  isMobile();
  // Init while resizing window
  $win.on('resize', function(e){
    notMobile();
    isMobile();
  });

})(jQuery);

/*------------------------------------------------------------------------------
  Skip Link Focus
------------------------------------------------------------------------------*/
/**
 * Skip to main content.
 *
 * @since  1.0.0
 */
( function() {
  var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
      is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
      is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

  if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
    window.addEventListener( 'hashchange', function() {
      var id = location.hash.substring( 1 ),
        element;

      if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
        return;
      }

      element = document.getElementById( id );

      if ( element ) {
        if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
          element.tabIndex = -1;
        }

        element.focus();
      }
    }, false );
  }
})();
