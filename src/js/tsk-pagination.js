jQuery(document).ready(function(){
	var $bg_color = jQuery(".nav-previous").css("background-color");
	// console.log($bg_color);
	$(".nav-previous, .nav-next").hover(function(){
        $(this).css("background", "#EEEEEE");
    },
    function(){
        $(this).css("background", $bg_color);
 	});

});
/*,
    function(){
        $(this).css("background", "#ffffff");
 	});

 	  $(".nav-previous, .nav-next").hover(function(){
        $(this).css("background", "#F00");
    },
    function(){
        $(this).css("background", $bg-color);
 	});
*/
