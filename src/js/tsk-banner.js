$(document).ready(function() {
  var windowHeight = $(window).height();
  var windowScrollPosTop = $(window).scrollTop();
  var windowScrollPosBottom = windowHeight + windowScrollPosTop;

  jQuery.fn.fixedNavbarOnScroll = function (mastheadHeight, marginTop) {
    return this.each(function() {
      // console.log($(window).scrollTop());
      if (!jQuery(this).hasClass("fixed-top")) {
        if ($(window).scrollTop() > mastheadHeight) {
          $(this).addClass('fixed-top');
          if ($('body').hasClass('logged-in')) {
            $(this).addClass(marginTop);
          }
        }
      }
      if (jQuery(this).hasClass("fixed-top")) {
        if ($(window).scrollTop() < mastheadHeight) {
          $(this).removeClass('fixed-top');
          if ($('body').hasClass('logged-in')) {
            $(this).removeClass(marginTop);
          }
        }
      }
    });
  } // end of functio


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
    if (!jQuery("#menu").hasClass("tsk-fixed-top")) {
        windowHeight = $(window).height();
        windowScrollPosTop = $(window).scrollTop();
        windowScrollPosBottom = windowHeight + windowScrollPosTop;
        $("#menu").fixedNavbarOnScroll(85, 'mt-3');

    }
  });

});
