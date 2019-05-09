/*global jQuery:false */
jQuery(document).ready(function($) {
/*"use strict";*/

	$(function() {
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
	});


	//add some elements with animate effect
	/*$(".box").hover(
		function () {
			$(this).find('span.badge').addClass("animated fadeInLeft");
			$(this).find('.ico').addClass("animated fadeIn");
		},
		function () {
			$(this).find('span.badge').removeClass("animated fadeInLeft");
			$(this).find('.ico').removeClass("animated fadeIn");
		}
	);*/

	//Navi hover
/*	$('.dropdown').hover(function () {
		$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
	},
	function () {
		$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
	});*/

});
