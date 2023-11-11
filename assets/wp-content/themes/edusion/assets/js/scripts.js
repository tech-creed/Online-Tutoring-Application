/*
Author       : theme_ocean 
Template Name: Penn - Education HTML Template
Version      : 1.0
*/
(function($) {
	'use strict';
	

	/*PRELOADER JS*/
	jQuery(window).on('load',function() {
		setTimeout(function() {
			$('body').addClass('loaded');
		}, 500);
	});
	/*END PRELOADER JS*/
		
	/*Start Popup Search Box JS*/
	
	$(".search_btn").click(function() {
		$(".search_from_area").show();
		$(".sclose_btn").show();
		$(".search_btn").hide();
		$(".sclose_btn").addClass('cdblock');
     });
	
	$(".sclose_btn").click(function() {
		$(".search_from_area").hide();
		$(".sclose_btn").hide();
		$(".search_btn").show();
		$(".sclose_btn").removeClass('cdblock');
     });
	
	/*END Popup Search Box JS*/
	
	jQuery(document).on('ready', function(){
			
		/*START MENU JS*/				
		$('#main-menu').slicknav({
			label: '',
			duration: 1000,
			easingOpen: "easeOutBounce", //available with jQuery UI
			prependTo:'#mobile_menu',
			closeOnClick: true,
			easingClose:"swing", 
			easingOpen:"swing", 
			openedSymbol: "&#9660;",
			closedSymbol: "&#9658;" 	
		});
		
		if ($(window).scrollTop() > 200) {
              $('.fixed-top').addClass('menu-bg');
          } else {
              $('.fixed-top').removeClass('menu-bg');
          }
			$(window).on('scroll', function(){
				if ( $(window).scrollTop() > 70 ) {
					$('.site-navigation, .header-white, .header').addClass('navbar-fixed');
				} else {
					$('.site-navigation, .header-white, .header').removeClass('navbar-fixed');
				}
			});		  	
		/*END MENU JS*/
		
		/*START VIDEO JS*/
		$('.video-play').magnificPopup({
            type: 'iframe'
        });
		$('.co-video-play').magnificPopup({
            type: 'iframe'
        });
		$('.product_item').mixItUp();
		/*END VIDEO JS*/	

		/* START VIDEO POPUP JS */
		$('.magnific_popup').magnificPopup({
		  disableOn: 700,
		  type: 'iframe',
		  mainClass: 'mfp-fade',
		  removalDelay: 160,
		  preloader: false,
		  fixedContentPos: false,
		  disableOn: 300
		});		

		/*START PARTNER LOGO*/
		$('.partner').owlCarousel({
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
		  items : 5,
		  itemsDesktop : [1199,3],
		  itemsDesktopSmall : [979,3]
		});
		/*END PARTNER LOGO*/		

		/*START TESTIMONIAL JS*/	
		$("#testimonial-slider").owlCarousel({
		   items:3,
			itemsDesktop:[1000,3],
			itemsDesktopSmall:[980,2],
			itemsTablet:[768,1],
			itemsMobile:[650,1],
			pagination:true,
			navigation:true,
			navigationText:["",""],
			slideSpeed:1000,
			autoPlay:true,
			loop: true
		});
		/*END TESTIMONIAL JS*/

		/* START EVENT JS */
		 $("#event-slider").owlCarousel({
			items:3,
			itemsDesktop:[1199,3],
			itemsDesktopSmall:[979,2],
			itemsTablet:[768,2],
			itemsMobile:[600,1],
			pagination: false,
			navigation:true,
			navigationText:["",""],
			slideSpeed:1000,
			autoPlay:false
		});
		/* END EVENT JS */		
		
		
	}); 		
	
	
	/*INITIATE PURE COUNTER*/
	new PureCounter();
	
	/*START WOW ANIMATION JS*/
	  new WOW().init();	
	/*END WOW ANIMATION JS*/	
	
	
})(jQuery);


  

