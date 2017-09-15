//var $ = jQuery.noConflict();
var $window_width = jQuery(window).width();
var $window_height = jQuery(window).height();
var paspartu_width;
var paspartu_width_init = 0;

jQuery(document).ready(function() {
	"use strict";
    //check paspartu width depending on window size

    paspartu_width = $window_width < 1024 ? 0.02 : paspartu_width_init;

    //contentMinHeight();
	//contentMinHeightWithPaspartu();
    setMenuRevealPosition();
    setPaspartuHeight();
});

jQuery(window).load(function(){
	"use strict";
});

jQuery(window).scroll(function() {
	"use strict";

    setMenuRevealPosition();
});

jQuery(window).resize(function() {
	"use strict";


    $window_width = jQuery(window).width();
    $window_height = jQuery(window).height();

    //check paspartu width depending on window size
    paspartu_width = $window_width < 1024 ? 0.02 : paspartu_width_init;

    //contentMinHeight();
	//contentMinHeightWithPaspartu();
    setMenuRevealPosition();
    setPaspartuHeight();
});

/*
 ** Calculating minimal height for content
 */
function contentMinHeight(){
	"use strict";
	
	if(jQuery('header .header_bottom').length){
		var headerColorString = jQuery('header .header_bottom').css('background-color');
		var headerTransparency = headerColorString.substring(headerColorString.indexOf('(') + 1, headerColorString.lastIndexOf(')')).split(/,\s*/)[3];
		var haeder_add = headerTransparency == undefined && !jQuery('header.page_header').hasClass('transparent') ? jQuery('header.page_header').height() : 0;
		jQuery('body .content').css('min-height',$window_height - haeder_add - jQuery('footer:not(.uncover)').height());
	}
}

/*
** Calculating minimal height for content when paspartu is enabled
*/

function contentMinHeightWithPaspartu(){
    "use strict";

    if (jQuery('.paspartu_enabled').length) {
        var content_height;
        var paspartu_final_width_px = 0;
        var paspartu_width_px = $window_width*paspartu_width;
        var footer_height = jQuery('footer').height();

        if (jQuery('.vertical_menu_enabled').length){
            if (jQuery('.paspartu_top').length && jQuery('.paspartu_middle_inner').length){
                paspartu_final_width_px += paspartu_width_px;
            }
        }
        else {
            if (jQuery('.paspartu_top').length){
                paspartu_final_width_px += paspartu_width_px;
            }
        }
        if (jQuery('.paspartu_bottom').length || !jQuery('.disable_bottom_paspartu').length){
            paspartu_final_width_px += paspartu_width_px;
        }

        if (jQuery('.vertical_menu_enabled').length){
            content_height = $window_height - paspartu_final_width_px - footer_height;
        }
        else {
            var header_height = jQuery('.page_header').height();
            content_height = $window_height - header_height - paspartu_final_width_px - footer_height;
        }

        if(jQuery('.content').length){
            jQuery('.content').css('min-height',content_height);
        }
    }
}

function setMenuRevealPosition(){
    "use strict";

    var boxed_stretched_width = 0;
    var menu_top = 0;

    if (jQuery('.dt-boxed-stretched-container').length) {
        boxed_stretched_width = jQuery('.dt-boxed-stretched-container').width();
    }

    if (jQuery('.dt-boxed-stretched-container #head-page').length) {
        jQuery('.dt-boxed-stretched-container #head-page').css('width',boxed_stretched_width);
/*
        menu_top = jQuery('.dt-boxed-stretched-container #head-page').css('top');
        if (jQuery('.admin-bar .paspartu_top').length && parseInt(menu_top)>0) {
            jQuery('.admin-bar .paspartu_top').css('padding-top',menu_top);
        }
*/
    }

    var wpadminbar_height = 0;
    if (jQuery('#wpadminbar').length) {
        wpadminbar_height = jQuery('#wpadminbar').height();
    }

    var paspartu_inner_top = 0;
    if (jQuery('.admin-bar .paspartu_inner').length) {
        paspartu_inner_top = jQuery('.admin-bar .paspartu_inner').css('padding-top');
    }
/*
    if (jQuery('.admin-bar .paspartu_top').length) {
        jQuery('.admin-bar .paspartu_top').css('padding-top',parseInt(wpadminbar_height) + parseInt(paspartu_inner_top) + 1);
    }
*/
}

function setPaspartuHeight() {
/*
    if (jQuery('.paspartu_left').length){
        jQuery('.paspartu_left').css('height',0.3 * jQuery(document).height());
        //jQuery('.paspartu_left').css('height',jQuery(document).height()-50);
    }

    if (jQuery('.paspartu_right').length){
        jQuery('.paspartu_right').css('height',0.3 * jQuery(document).height())
        //jQuery('.paspartu_right').css('height',jQuery(document).height()-50);
    }
*/
}
