jQuery(document).ready(function() {
    
    'use strict';


    jQuery('.navigation').children('li').children('a').each(function(){
        var menu_a_text = jQuery(this).text();

        jQuery(this).empty();
        if(jQuery(this).siblings('.sub-menu').length !== 0)
            jQuery(this).append('<span>'+menu_a_text+'</span><div class="fa fa-angle-down"></div>');
        else
            jQuery(this).append('<span>'+menu_a_text+'</span>');
    });

    var e = jQuery(".MFO-header"),
        f = jQuery(".MFO-overmenu"),
        //g = jQuery(".MFO-button"),
        g = jQuery(".MFO-burger"),
        g2 = jQuery(".MFO-text"),
        h = jQuery(".MFO-menu-list li"),
        i = jQuery(".MFO-social li"),
        j = jQuery(".MFO-close-mobile");

    navigator.userAgent.match(/Trident\/7\./) && e.addClass("MFO-ie");
    var k = 400;
    e.hasClass("MFO-header-open") && (h.addClass("MFO-li-open"), i.addClass("MFO-li-open"), f.addClass("MFO-overmenu-hide"));
    var l = function() {
            e.hasClass("MFO-header-open") ? 
            (h.removeClassDelay("MFO-li-open", 140), 
                i.removeClassDelay("MFO-li-open", 140), 
                setTimeout(function() { e.removeClass("MFO-header-open"), f.removeClass("MFO-overmenu-hide")
            }, 2 * k + 200), 
                setTimeout(function() { e.removeClass("MFO-delay") }, 3 * k), 
                jQuery("#main-nav-check").prop('checked',false)) : 
            (e.addClass("MFO-header-open"), 
                f.addClass("MFO-overmenu-hide"), 
                setTimeout(function() { h.addClassDelay("MFO-li-open", 140), i.addClassDelay("MFO-li-open", 140), e.addClass("MFO-delay")
                }, k),
                jQuery("#main-nav-check").prop('checked',true))
        },
        m = function() {
            h.removeClassDelay("MFO-li-open", 140), i.removeClassDelay("MFO-li-open", 140), setTimeout(function() {
                e.removeClass("MFO-header-open"), f.removeClass("MFO-overmenu-hide")
            }, 2 * k + 200), setTimeout(function() {
                e.removeClass("MFO-delay")
            }, 3 * k), console.log("Menu closed")
        },
        n = function() {
            e.hasClass("MFO-header-open") || (e.addClass("MFO-header-open"), f.addClass("MFO-overmenu-hide"), setTimeout(function() {
                h.addClassDelay("MFO-li-open", 140), i.addClassDelay("MFO-li-open", 140), e.addClass("MFO-delay")
            }, k), console.log("Menu open"))
        };
    e.on("closeMenu", m), e.on("openMenu", n), e.on("toggleMenu", l), g.click(function(a) {
        l(), a.stopPropagation()
    }), g2.click(function(a) {
        l(), a.stopPropagation()
    }), j.click(function(a) {
        l(), a.stopPropagation()
    }), e.click(function(a) {
        a.stopPropagation()
    }), jQuery("#marianne").click(function(a) {
        a.stopPropagation()
    }), jQuery(document).click(function() {
        "/" !== window.location.pathname && "/it" !== window.location.pathname && m()
    });

    var p = jQuery(".MFO-footer"),
        q = jQuery(".MFO-footer-button"),
        r = jQuery(".MFO-footer-close");

    q.click(function() {
            p.addClass("MFO-footer-visible")
        }), r.click(function() {
            p.removeClass("MFO-footer-visible")
        }),
        function(a) {
            a.fn.addClassDelay = function(b, c) {
                a.each(a(this), function(d, e) {
                    setTimeout(function() {
                        a(e).addClass(b)
                    }, c * d)
                })
            }, a.fn.removeClassDelay = function(b, c) {
                a.each(a(this), function(d, e) {
                    setTimeout(function() {
                        a(e).removeClass(b)
                    }, c * d)
                })
            }
        }(jQuery)
});

jQuery(window).resize(function() {
    'use strict';

    var w = jQuery('.dt-boxed-container').width();
    jQuery('.dt-boxed-container .stackmenuoverlay header.stickyonscrollup').css('width',w);
});

jQuery(window).load(function() {
    'use strict';
    
    var w = jQuery('.dt-boxed-container').width();
    jQuery('.dt-boxed-container .stackmenuoverlay header.stickyonscrollup').css('width',w);
});

