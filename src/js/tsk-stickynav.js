// https://youtu.be/utonytGKodc
// Sticky Navigation Tutorial (Fixed Position CSS + JavaScript / jQuery)

jQuery(document).ready(function() {
	var navbarOffset = jQuery("nav").offset().top;
	var wpAdminBar = 0;
	//alert(navbarOffset); // 182
	// console.log(navbarOffset);
	//

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
			var wpAdminBarHeight = $('#wpadminbar').height();
			if (wpAdminBar !== wpAdminBarHeight) {
				wpAdminBar = wpAdminBarHeight;
				navbarOffset = navbarOffset - wpAdminBarHeight;
				// console.log(navbarOffset);
				// console.log("updated");
			}
			// console.log("height " + wpAdminBarHeight);
			// console.log(wpAdminBar);
		}
		// console.log(navbarOffset);

		if (scrollPos >= navbarOffset) {
			jQuery("nav.navbar").addClass("fixed-top");
		} else {
			jQuery("nav.navbar").removeClass("fixed-top");
		}
	});
});
