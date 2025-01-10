( function( $ ) {

  $(document).ready(function($){

    // Implement go to top
    if ( $('#btn-scrollup').length > 0 ) {

      $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
          $('#btn-scrollup').fadeIn();
        } else {
          $('#btn-scrollup').fadeOut();
        }
      });

      $('#btn-scrollup').click(function(){
        $('html, body').animate({ scrollTop: 0 }, 600);
        return false;
      });
    }

    // Notice ticker.
    var $notice_ticker = $('#notice-ticker');

    $notice_ticker.easyTicker({
      direction: 'up',
      easing: 'swing',
      speed: 'slow',
      interval: 3000,
      height: 'auto',
      visible: 1,
      mousePause: 1
    });


  });
    //Fixed header

    $(window).scroll(function () {
        if( $(window).scrollTop() > $('#main-nav').offset().top && !($('#main-nav').hasClass('fixed'))){
          $('#main-nav').addClass('fixed');
      }

      else if ( 0 === $(window).scrollTop() ){
          $('#main-nav').removeClass('fixed');
      }
  });
} )( jQuery );
