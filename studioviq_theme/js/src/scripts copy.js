$(document).ready(function(){
    

/*
		window.onscroll = function (event) {
			var bodyoffset = $('body').offset();
			console.log(bodyoffset.top);
		};
*/
/*
		var scrolling = false;
		$(window).scroll(function(){
			scrolling = true;
			var offset = window.pageYOffset;
			if(scrolling && offset >= 200 && $('#topnav.stuck').length === 0){
				$('header').fadeOut(function(){
					$(this).waypoint('sticky');
					$(this).fadeIn();
					scrolling = false;
					return;
				});
			}				
		});
*/

 
    $(window).on('scroll', function(){
      if($(document).scrollTop() >= 200){
				$('#topnav').addClass('stuck');
				$('header').stop(true).animate({'top':'0px'});
      }else if($(document).scrollTop() < 200 && $('#topnav').hasClass('stuck')){
				$('header').stop(true).animate({'top':'-72px'}, function(){
					$('#topnav').removeClass('stuck');
					if($(document).scrollTop() === 0){
						$('header').stop(true).animate({'top':'0px'},function(){
							$('#topnav').removeAttr('style');
							$('#topnav').removeAttr('class');
						});
					}
				});
				
      }
    });


    
		/* Resize of splash images (heros) */
		var viewportHeight;
		
		$(window).resize(function() {
			viewportHeight = $(window).height();
			$(".case-image, .case-intro, .case-single, .container-carousel, .container-single, .image-carousel-wrap, .slidesjs-container ").css('height' , viewportHeight);
		}).resize();

 
    $("#home-slider").owlCarousel({
      navigation : true, // Show next and prev buttons
      pagination : false,
      slideSpeed : 300,
      paginationSpeed : 400,
      autoPlay : 5000,
      singleItem : true,
      navigationText : false,
      responsiveRefreshRate : 100,
      rewindNav : true,
      transitionStyle : "fade"
		});
		
		$("#werkwijze-slider").owlCarousel({
			autoPlay : 3000,
			stopOnHover : true,
			navigation:true,
			navigationText : false,
			paginationSpeed : 1000,
			goToFirstSpeed : 2000,
			singleItem : true,
			autoHeight : true,
			transitionStyle:"fade"
		});
		
		/* TOGGLE NAVIGATION		 */
		$(function(){
			var nb = $('#navbtn');
			var n = $('#topnav nav');
			
			$(window).on('resize', function(){
			
				if(nb.is(':hidden') && n.is(':hidden') && $(window).width() > 569) {
					// if the navigation menu and nav button are both hidden,
					// then the responsive nav is closed and the nav menu is still hidden.
					// just display the nav menu which will auto-hide at <560px width and remove class.
					$('#topnav nav').show().addClass('keep-nav-closed');
				}
			
				if($(this).width() < 570 && n.hasClass('keep-nav-closed')) {
					// if the nav menu and nav button are both visible,
					// then the responsive nav transitioned from open to non-responsive, then back again.
					// re-hide the nav menu and remove the hidden class
					$('#topnav nav').hide().removeAttr('class');
				}
			});
			
			$('#topnav nav a,#topnav h1 a,#btmnav nav a').on('click', function(e){
				//e.preventDefault(); // stop all hash(#) anchor links from loading
			});
			
			$('#navbtn').on('click', function(e){
				e.preventDefault();
				$("#topnav nav").slideToggle(350);
			}); 
		});
		
		
		//dropPOI
		
		// + BOUNCE MAP POINTER + //
/*
		if ( $('#gmaproute').length ){
			$('#gmaproute').append('<span id="dropDiv" style="display:none"></span>');
			
			var $dropDiv = $('#dropDiv');
			var $this = "#gmaproute";
			var initLeft = 538;
			
		setTimeout(function(){ 
		
			$dropDiv.css({
					left	: initLeft,
					top		: 0,
					opacity	: 0,
					display	: 'block'
				}).animate({
					left	: initLeft,
					top		: 100,
					opacity: 1
				}, 1200, 'easeOutBounce');
		
			},500);
		}
*/
		// - BOUNCE MAP POINTER - //
		
				
});
