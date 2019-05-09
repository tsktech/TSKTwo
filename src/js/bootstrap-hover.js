jQuery(document).ready(function($) {
  // hover dropdown menu
/*  $(function() {
    $('.dropdown').hover(
        function() {
          $('.dropdown-menu', this).stop(true, true).slideToggle();
          $(this).toggleClass('open');
          $('b', this).toggleClass('caret caret-up');
        }
    );
    // The code below makes the parent menu link clickable

    $('.navbar .dropdown > a').click(function(){
               location.href = this.href;
           });
  });*/

  $('.dropdown-toggle').mouseover(function() {
        $('.dropdown-menu').show();
    })

    $('.dropdown-toggle').mouseout(function() {
        t = setTimeout(function() {
            $('.dropdown-menu').hide();
        }, 100);

        $('.dropdown-menu').on('mouseenter', function() {
            $('.dropdown-menu').show();
            clearTimeout(t);
        }).on('mouseleave', function() {
            $('.dropdown-menu').hide();
        })
    })

/*  function openNav() {
    document.getElementById(".navbar-nav").style.width = "70%";
    // document.getElementById("flipkart-navbar").style.width = "50%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
  }

  function closeNav() {
    document.getElementById(".navbar-nav").style.width = "0";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
}*/
});
