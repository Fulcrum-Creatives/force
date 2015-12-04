(function( $ ) {
  'use strict';

  /*---------------------------------------------------------
   * Picturefill
  ---------------------------------------------------------*/
  document.createElement( "picture" );

  /*---------------------------------------------------------
   * Checkboxes
  ---------------------------------------------------------*/
  $(function() {
      $('.gfield_checkbox li').append('<span class="cust-checkbox"></div>');
  });

  $(function() {
    $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });

})( jQuery );