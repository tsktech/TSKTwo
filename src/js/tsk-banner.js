$(document).ready(function() {
  var windowHeight = $(window).height();
  var windowScrollPosTop = $(window).scrollTop();
  var windowScrollPosBottom = windowHeight + windowScrollPosTop;

  // jQuery.fn.fixedNavbarOnScroll = function (mastheadHeight, marginTop) {
  jQuery.fn.fixedNavbarOnScroll = function (mastheadHeight) {
    return this.each(function() {
      // console.log($(window).scrollTop());
      if (!jQuery(this).hasClass("fixed-top")) {
        if ($(window).scrollTop() > mastheadHeight) {
          // setTimeout(function() {
            $(this).addClass('fixed-top rounded-bottom tsk-shadow-sm');
            if ($('body').hasClass('logged-in')) {
              $(this).addClass(marginTop);
            }
          // }, 1000);

        }
      }
      if (jQuery(this).hasClass("fixed-top")) {
        if ($(window).scrollTop() < mastheadHeight) {
          // setTimeout(function() {
            $(this).removeClass('fixed-top rounded-bottom tsk-shadow-sm');
            if ($('body').hasClass('logged-in')) {
              $(this).removeClass(marginTop);
            }
          // }, 400);

        }
      }
    });
  } // end of functio
/*setTimeout(function() {
    $('.main-nav-ul').addClass('nav-slide'); // line 57 in jquery.sticky.js
}, 100);*/

  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the
      //nav bar to stick.
    // console.log($(window).scrollTop())
    /*if ($(window).scrollTop() > 88) {
      $('#menu').addClass('fixed-top');
    }
    if ($(window).scrollTop() < 89) {
      $('#menu').removeClass('fixed-top');
    }*/
    /*var windowHeight = $(window).height();*/
    /*var windowScrollPosTop = $(window).scrollTop();*/
    /*var windowScrollPosBottom = windowHeight + windowScrollPosTop;*/
    if (! jQuery("#menu").hasClass("tsk-fixed-top")) {
        windowHeight = $(window).height();
        windowScrollPosTop = $(window).scrollTop();
        windowScrollPosBottom = windowHeight + windowScrollPosTop;
        if (! jQuery("#masthead").hasClass("navbar-new-tag")) {
          // $("#menu").fixedNavbarOnScroll(110, '');
          $("#menu").fixedNavbarOnScroll(110);
        } else {
          $("#menu").fixedNavbarOnScroll(85;
        }
    }
  });

});
