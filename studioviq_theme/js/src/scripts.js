$(function(){
		
		
	/*-----------------------------------------------------------------------------------*/
	/*	Header
	/*-----------------------------------------------------------------------------------*/
	
	/* Starting Animation on Load */

	jQuery('#intro').animate({opacity: '1'}, 500).fadeIn(600, function() {
		jQuery('#caption').animate({opacity: '1', 'padding-top': '0'}, 500,function() {
			//jQuery('#sub-caption').animate({opacity: '1', 'padding-top': '0'}, 500,function() {
				if(jQuery(window).width()<767){	
					jQuery('#explore').animate({opacity: '1', 'margin-top': '2em', 'top': '0' }, 1000);
				} else {
					jQuery('#explore').animate({opacity: '1', 'margin-top': '4em',  'top': '0'}, 1000);
				}
			//});
		});
	});
	
	/*-----------------------------------------------------------------------------------*/
	/*	Navigation
	/*-----------------------------------------------------------------------------------*/
	if ($('body').hasClass('custom-page')) {
		jQuery('#top-bar').stop().animate({top:'0px'}, 300);
		
		/* Responsive Menu Click */
		jQuery('#menu-mobile').click(function(){
			if ( jQuery("ul.header-nav").is(":visible") ) {
				jQuery("ul.header-nav").slideUp(500);
				jQuery('#menu-mobile').removeClass('active');
			} else { 
				jQuery("ul.header-nav").slideDown(500);
				jQuery('#menu-mobile').addClass('active');
			}
		});
		
		
		/* On Resize show menu on desktop if hidden */
		jQuery(window).resize(function() {
			if(jQuery(window).width()>992){	
				if (jQuery("ul.header-nav").is(":hidden") ) {
					jQuery("ul.header-nav").show();
					jQuery('#menu-mobile').addClass('active');		
				}
			} else {
				if (jQuery("ul.header-nav").is(":visible") ) {
					jQuery("ul.header-nav").hide();
					jQuery('#menu-mobile').removeClass('active');		
				}
			}
		});
		
	}
	
	if (jQuery('body').hasClass('home') ) {
	
		var animate='down';		
		
		jQuery(window).bind('scroll', function () {
			/* Animation for Top Navigation */
			var scrollTop = jQuery(window).scrollTop();
			
			if (scrollTop > jQuery('#header').height()-53 && animate === 'down') {
				animate='up';
				jQuery('#top-bar').stop().animate({top:'0'}, 300);
			} else if(scrollTop < jQuery('#header').height()-53 && animate === 'up'){
				animate='down';
				jQuery('#top-bar').stop().animate({top:'-75px'}, 300);
			}
			
			/* Update Section on Top-Bar */
			jQuery('section').each(function(){
				if (scrollTop > jQuery(this).offset().top-53){
					var section = jQuery(this).attr('id');
					$("#top-navigation ul li").each(function(){
						if(section === jQuery(this).find('a').attr('href').replace("#","") && jQuery(this).not('.active')){
							$("#top-navigation ul li").removeClass('active');
							jQuery(this).addClass('active');
						}
					});
				}
			});
		});
	
	
		/* Responsive Menu Click */
		jQuery('#menu-mobile').click(function(){
			if ( jQuery("ul.header-nav").is(":visible") ) {
				jQuery("ul.header-nav").slideUp(500);
				jQuery('#menu-mobile').removeClass('active');
			} else { 
				jQuery("ul.header-nav").slideDown(500);
				jQuery('#menu-mobile').addClass('active');
			}
		});
		
		
		/* On Resize show menu on desktop if hidden */
		jQuery(window).resize(function() {
			if(jQuery(window).width()>992){	
				if (jQuery("ul.header-nav").is(":hidden") ) {
					jQuery("ul.header-nav").show();
					jQuery('#menu-mobile').addClass('active');		
				}
			} else {
				if (jQuery("ul.header-nav").is(":visible") ) {
					jQuery("ul.header-nav").hide();
					jQuery('#menu-mobile').removeClass('active');		
				}
			}
		});
		
		
		/*-----------------------------------------------------------------------------------*/
		/*	Smooth Scroll - Navigation + .scroll items
		/*-----------------------------------------------------------------------------------*/
		
		jQuery('ul.header-nav li').bind('click',function(event){
			var anchor = jQuery(this).find('a');
			
			jQuery('ul.header-nav li').removeClass('active');
			jQuery(this).addClass('active');
			
			if(jQuery(window).width()<768){
				jQuery('html, body').stop().animate({
					scrollTop: jQuery(anchor.attr('href')).offset().top-43
				}, 1500,'easeInOutExpo');	
				jQuery("ul.header-nav").slideUp(500);
			jQuery('#menu-mobile').removeClass('active');
			} else {
				jQuery('html, body').stop().animate({
					scrollTop: jQuery(anchor.attr('href')).offset().top-52
				}, 1500,'easeInOutExpo');
			}
			
			event.preventDefault();
		});
		
		jQuery('.scroll').bind('click',function(event){
		
			if (jQuery(this).hasClass('header')){
				//console.log('cenas');
				jQuery('html, body').stop().animate({
					scrollTop: 0
				}, 1500,'easeInOutExpo');
			} else {
			if(jQuery(window).width()<=767){	
					jQuery('html, body').stop().animate({
						scrollTop: jQuery('#header').height()-43
					}, 1500,'easeInOutExpo');
					jQuery("#top-navigation ul").slideUp(500);
				jQuery('#menu-mobile').removeClass('active');
				} else {
					jQuery('html, body').stop().animate({
						scrollTop: jQuery('#header').height()-52
					}, 1500,'easeInOutExpo');
				}
			}
			
			event.preventDefault();
		});
		
		if(window.location.hash) {
			jQuery('html, body').stop().animate({
				scrollTop: jQuery(location.hash).offset().top-43
			}, 1500,'easeInOutExpo');
		}

	}
	
	
	/*-----------------------------------------------------------------------------------*/
	/*	Offcanvas Navigation
	/*-----------------------------------------------------------------------------------*/	
		
	/*
if (jQuery('.show-offcanvas').is(':visible')) {
	
		// Off-canvas Menu Click
		jQuery('.show-offcanvas').click(function(){
			if ( jQuery("#offcanvas-navigation").hasClass('active') ) {
				if (jQuery('body').hasClass('single-project')) {
					jQuery("#offcanvas .show-offcanvas").hide();
					jQuery("#project-top-bar .show-offcanvas").show();
				}
					jQuery("#page").removeClass('move');
					jQuery("#offcanvas-navigation, .show-offcanvas").removeClass('active');
					jQuery("body").css("overflow-y", "auto");
				} else { 
				if (jQuery('body').hasClass('single-project')) {
					jQuery("#offcanvas .show-offcanvas").show();
					jQuery("#project-top-bar .show-offcanvas").hide();
				}
					jQuery("#page").addClass('move');
					jQuery("#offcanvas-navigation, .show-offcanvas").addClass('active');
					jQuery("body").css("overflow-y", "hidden");
			}
		});	
	}
*/
	
	/*-----------------------------------------------------------------------------------*/
	/*	Works
	/*-----------------------------------------------------------------------------------*/
	
	/* Works Top Bar */
	/*
jQuery(window).bind('scroll', function () {
		var scrollTop = jQuery(window).scrollTop();
		
		if($('#project-details').length !== 0) {
			if (scrollTop > jQuery('#project-details').offset().top-125) {
				jQuery('#project-top-bar').addClass('fixed').stop().animate({top:0},500);
			} else if(scrollTop < jQuery('#project-details').offset().top-125){
				jQuery('#project-top-bar').stop().animate({top:'-60px'},500,function(){
					jQuery('#project-top-bar').removeClass('fixed');
				});
			}
		}
	});
*/
	
	/* If we're on medium or large device animate next and previous project name while hovering arrow's */
	if(jQuery(window).width()>991){	
		jQuery('#next-project').mouseenter(function() {
			jQuery("#next-project-name").stop().animate({"right":"80px","opacity":"1"}, 500);
		}).mouseleave(function() {
			jQuery("#next-project-name").animate({"right":"110px","opacity":"0"}, 500);
		});
		jQuery('#previous-project').mouseenter(function() {
			jQuery("#previous-project-name").stop().animate({"left":"80px","opacity":"1"}, 500);
		}).mouseleave(function() {
			jQuery("#previous-project-name").animate({"left":"110px","opacity":"0"}, 500);
		});
	}
	
	
	/*-----------------------------------------------------------------------------------*/
	/*	Animations
	/*-----------------------------------------------------------------------------------*/	
	
	/*
if (jQuery('body').hasClass('single-project')) {
		jQuery("#page").fadeIn(750);
	}
*/
	
	/*-----------------------------------------------------------------------------------*/
	/*	Loading of pages
	/*-----------------------------------------------------------------------------------*/	

	/*
jQuery('.load').click(function(){
		event.preventDefault();
		href = jQuery(this).attr("href");
			jQuery("#page").fadeOut(150, function(){
			window.location.href = href;
		});
	});
*/
	
});