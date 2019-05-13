jQuery(document).ready(function() {
	var navbarOffset = jQuery("nav").offset().top;
	//alert(navbarOffset); // 182
	// console.log(navbarOffset);
	//
	function viewport() {
    	var e = window, a = 'inner';
	    if (!('innerWidth' in window )) {
	        a = 'client';
	        e = document.documentElement || document.body;
	    }
	    return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
	}


	var wpAdminBar = 0;
	/*if (jQuery("#wpadminbar")[0]) {
		var wpAdminBarHeight = $('#wpadminbar').height();
		if (wpAdminBar !== wpAdminBarHeight) {
			wpAdminBar = wpAdminBarHeight;
			navbarOffset = navbarOffset - wpAdminBarHeight; // wpAdminBar.height();
			console.log("wpAdminBar");
			console.log(navbarOffset);
		}



			// console.log("wpAdminBar");
			// console.log(wpAdminBar.height());
			// console.log(navbarOffset + 32);
	}*/
	//
	jQuery(".navbar-placeholder").height(jQuery("nav").outerHeight());
	jQuery(window).scroll(function(){
		var scrollPos = jQuery(window).scrollTop();
		// jQuery(".status").html(scrollPos);
		if (jQuery("#wpadminbar")[0]) {
/*			var wpAdminBarHeight = $('#wpadminbar').height();
			if (wpAdminBar !== wpAdminBarHeight) {
				wpAdminBar = wpAdminBarHeight;
				navbarOffset = navbarOffset - wpAdminBarHeight;
				console.log("wpAdminBar");
				console.log(wpAdminBarHeight);
			}*/
			// console.log(viewport().width);
			// 783px
			var wpAdminBarHeight = viewport().width;
			if (wpAdminBar !== wpAdminBarHeight) {
				if  (wpAdminBarHeight < 783) {
					wpAdminBar = wpAdminBarHeight;
					navbarOffset = navbarOffset - wpAdminBarHeight;
					console.log(navbarOffset);
				}
				console.log(wpAdminBarHeight);
			}
		}
		if (scrollPos >= navbarOffset) {
			jQuery("nav.navbar").addClass("fixed-top");
		} else {
			jQuery("nav.navbar").removeClass("fixed-top");
		}
	});
});
