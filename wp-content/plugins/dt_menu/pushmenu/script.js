(function(cash) { "use strict";

    jQuery('.navigation li').children('a').addClass('animsition-link');

    jQuery('.navigation').children('li').children('a').each(function(){
        var menu_a_text = jQuery(this).text();

        jQuery(this).empty();

        if(jQuery(this).siblings('.dropmenu').length !== 0)
            jQuery(this).append('<span>'+menu_a_text+'</span><div class="fa fa-angle-down"></div>');
        else
            jQuery(this).append('<span>'+menu_a_text+'</span>');
    });

	
	/***********************************/
	/*MOBILE MENU*/
	/**********************************/
						 
	jQuery('.nav-menu-icon a').on("click", function() { 
		if (jQuery('.pushmenuoverlay nav').hasClass('slide-menu')) {
		  jQuery('.pushmenuoverlay nav').removeClass('slide-menu'); 

		  jQuery(this).removeClass('active');
		  jQuery('.pushmenuoverlay .searchform .search_btn').removeClass('active');
		  jQuery('.pushmenuoverlay ul.shopmenu > li.bag a').removeClass('active');

		  jQuery('.pushmenuoverlay header').css('overflow','hidden');
		  jQuery("#main-nav-check").prop('checked',false);
		} else {
		  jQuery('.pushmenuoverlay nav').addClass('slide-menu');

		  jQuery(this).addClass('active');
		  jQuery('.pushmenuoverlay .searchform .search_btn').addClass('active');
		  jQuery('.pushmenuoverlay ul.shopmenu > li.bag a').addClass('active');
		  
		  jQuery('.pushmenuoverlay header').css('overflow','visible');
		  jQuery("#main-nav-check").prop('checked',true);
		}
		return false;
	});

	jQuery("#dt-menu-mobile .toggle.close-all").on("click", function() {
		  jQuery('.pushmenuoverlay nav').removeClass('slide-menu'); 
		  jQuery('.nav-menu-icon a').removeClass('active');
		  jQuery('.pushmenuoverlay header').css('overflow','hidden');
		  //jQuery("#main-nav-check").prop('checked',false);
    }); 		 

	if (jQuery(window).width()<992){			 
		jQuery('.navigation > ul > li > a').on('click', function(){
		   if (jQuery(this).parent().find('.dropmenu').hasClass('slidemenu')) {
			   jQuery(this).parent().find('.dropmenu').removeClass('slidemenu');
		   }else{
			   jQuery('.navigation > ul > li > a').parent().find('.dropmenu').removeClass('slidemenu');
			   jQuery(this).parent().find('.dropmenu').addClass('slidemenu');
		   }
			return false;
		});
	}

	/***********************************/
	/*STICKY MENU ON BOXED CONTAINER LAYOUT*/
	/**********************************/

    jQuery(window).resize(function() {
    	var w = jQuery('.dt-boxed-container').width();
    	jQuery('.dt-boxed-container .pushmenuoverlay header.stickyonscrollup').css('width',w);
	});

	jQuery(window).load(function() {
    	var w = jQuery('.dt-boxed-container').width();
    	jQuery('.dt-boxed-container .pushmenuoverlay header.stickyonscrollup').css('width',w);
	});


	/***********************************/
	/*WINDOW LOAD*/
	/**********************************/
				 
    jQuery(window).load(function() {
    	jQuery('.pushmenuoverlay header').fadeIn(500);
		jQuery('.logo').fadeIn(500);
		jQuery('.mobile-icon').fadeIn(500);
		jQuery('#fof999998').fadeIn(500);
/*
		setTimeout (function() {
		   jQuery('.logo').fadeIn(500);
			jQuery('.mobile-icon').fadeIn(500);
		},1000);
*/
	});

				 			 
				 
})(jQuery); 