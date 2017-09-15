/* <![CDATA[ */
var ef_js_vars = {
    "demo_mode": "",
    "slider_options": {
        "auto": "1",
        "transition": "fade",
        "cover": "1",
        "transition_speed": "800",
        "slide_interval": "4000"
    },
    "ef_ajax": {
        "post_type": "portfolios",
        "show_content": "",
        "postCommentNonce": "c61417e08c",
        "ajaxurl": "http:\/\/themes.evgenyfireform.com\/wp-brama\/wp-admin\/admin-ajax.php",
        "offset": "10",
        "postscount": 20,
        "terms": false,
        "no_more_text": "No more entries",
        "blog_style": "",
        "show_gallery": ""
    },
    "map_icon": "http:\/\/themes.evgenyfireform.com\/wp-brama\/wp-content\/themes\/brama\/assets\/map_marker.png",
    "woolightbox": "1",
    "parallax": "1"
};
/* ]]> */

//jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
jQuery.easing["jswing"] = jQuery.easing["swing"];
jQuery.extend(jQuery.easing, {
    def: "easeOutQuad",
    swing: function(a, b, c, d, e) {
        return jQuery.easing[jQuery.easing.def](a, b, c, d, e)
    },
    easeInQuad: function(a, b, c, d, e) {
        return d * (b /= e) * b + c
    },
    easeOutQuad: function(a, b, c, d, e) {
        return -d * (b /= e) * (b - 2) + c
    },
    easeInOutQuad: function(a, b, c, d, e) {
        if ((b /= e / 2) < 1) return d / 2 * b * b + c;
        return -d / 2 * (--b * (b - 2) - 1) + c
    },
    easeInCubic: function(a, b, c, d, e) {
        return d * (b /= e) * b * b + c
    },
    easeOutCubic: function(a, b, c, d, e) {
        return d * ((b = b / e - 1) * b * b + 1) + c
    },
    easeInOutCubic: function(a, b, c, d, e) {
        if ((b /= e / 2) < 1) return d / 2 * b * b * b + c;
        return d / 2 * ((b -= 2) * b * b + 2) + c
    },
    easeInQuart: function(a, b, c, d, e) {
        return d * (b /= e) * b * b * b + c
    },
    easeOutQuart: function(a, b, c, d, e) {
        return -d * ((b = b / e - 1) * b * b * b - 1) + c
    },
    easeInOutQuart: function(a, b, c, d, e) {
        if ((b /= e / 2) < 1) return d / 2 * b * b * b * b + c;
        return -d / 2 * ((b -= 2) * b * b * b - 2) + c
    },
    easeInQuint: function(a, b, c, d, e) {
        return d * (b /= e) * b * b * b * b + c
    },
    easeOutQuint: function(a, b, c, d, e) {
        return d * ((b = b / e - 1) * b * b * b * b + 1) + c
    },
    easeInOutQuint: function(a, b, c, d, e) {
        if ((b /= e / 2) < 1) return d / 2 * b * b * b * b * b + c;
        return d / 2 * ((b -= 2) * b * b * b * b + 2) + c
    },
    easeInSine: function(a, b, c, d, e) {
        return -d * Math.cos(b / e * (Math.PI / 2)) + d + c
    },
    easeOutSine: function(a, b, c, d, e) {
        return d * Math.sin(b / e * (Math.PI / 2)) + c
    },
    easeInOutSine: function(a, b, c, d, e) {
        return -d / 2 * (Math.cos(Math.PI * b / e) - 1) + c
    },
    easeInExpo: function(a, b, c, d, e) {
        return b == 0 ? c : d * Math.pow(2, 10 * (b / e - 1)) + c
    },
    easeOutExpo: function(a, b, c, d, e) {
        return b == e ? c + d : d * (-Math.pow(2, -10 * b / e) + 1) + c
    },
    easeInOutExpo: function(a, b, c, d, e) {
        if (b == 0) return c;
        if (b == e) return c + d;
        if ((b /= e / 2) < 1) return d / 2 * Math.pow(2, 10 * (b - 1)) + c;
        return d / 2 * (-Math.pow(2, -10 * --b) + 2) + c
    },
    easeInCirc: function(a, b, c, d, e) {
        return -d * (Math.sqrt(1 - (b /= e) * b) - 1) + c
    },
    easeOutCirc: function(a, b, c, d, e) {
        return d * Math.sqrt(1 - (b = b / e - 1) * b) + c
    },
    easeInOutCirc: function(a, b, c, d, e) {
        if ((b /= e / 2) < 1) return -d / 2 * (Math.sqrt(1 - b * b) - 1) + c;
        return d / 2 * (Math.sqrt(1 - (b -= 2) * b) + 1) + c
    },
    easeInElastic: function(a, b, c, d, e) {
        var f = 1.70158;
        var g = 0;
        var h = d;
        if (b == 0) return c;
        if ((b /= e) == 1) return c + d;
        if (!g) g = e * .3;
        if (h < Math.abs(d)) {
            h = d;
            var f = g / 4
        } else var f = g / (2 * Math.PI) * Math.asin(d / h);
        return -(h * Math.pow(2, 10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g)) + c
    },
    easeOutElastic: function(a, b, c, d, e) {
        var f = 1.70158;
        var g = 0;
        var h = d;
        if (b == 0) return c;
        if ((b /= e) == 1) return c + d;
        if (!g) g = e * .3;
        if (h < Math.abs(d)) {
            h = d;
            var f = g / 4
        } else var f = g / (2 * Math.PI) * Math.asin(d / h);
        return h * Math.pow(2, -10 * b) * Math.sin((b * e - f) * 2 * Math.PI / g) + d + c
    },
    easeInOutElastic: function(a, b, c, d, e) {
        var f = 1.70158;
        var g = 0;
        var h = d;
        if (b == 0) return c;
        if ((b /= e / 2) == 2) return c + d;
        if (!g) g = e * .3 * 1.5;
        if (h < Math.abs(d)) {
            h = d;
            var f = g / 4
        } else var f = g / (2 * Math.PI) * Math.asin(d / h);
        if (b < 1) return -.5 * h * Math.pow(2, 10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g) + c;
        return h * Math.pow(2, -10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g) * .5 + d + c
    },
    easeInBack: function(a, b, c, d, e, f) {
        if (f == undefined) f = 1.70158;
        return d * (b /= e) * b * ((f + 1) * b - f) + c
    },
    easeOutBack: function(a, b, c, d, e, f) {
        if (f == undefined) f = 1.70158;
        return d * ((b = b / e - 1) * b * ((f + 1) * b + f) + 1) + c
    },
    easeInOutBack: function(a, b, c, d, e, f) {
        if (f == undefined) f = 1.70158;
        if ((b /= e / 2) < 1) return d / 2 * b * b * (((f *= 1.525) + 1) * b - f) + c;
        return d / 2 * ((b -= 2) * b * (((f *= 1.525) + 1) * b + f) + 2) + c
    },
    easeInBounce: function(a, b, c, d, e) {
        return d - jQuery.easing.easeOutBounce(a, e - b, 0, d, e) + c
    },
    easeOutBounce: function(a, b, c, d, e) {
        if ((b /= e) < 1 / 2.75) {
            return d * 7.5625 * b * b + c
        } else if (b < 2 / 2.75) {
            return d * (7.5625 * (b -= 1.5 / 2.75) * b + .75) + c
        } else if (b < 2.5 / 2.75) {
            return d * (7.5625 * (b -= 2.25 / 2.75) * b + .9375) + c
        } else {
            return d * (7.5625 * (b -= 2.625 / 2.75) * b + .984375) + c
        }
    },
    easeInOutBounce: function(a, b, c, d, e) {
        if (b < e / 2) return jQuery.easing.easeInBounce(a, b * 2, 0, d, e) * .5 + c;
        return jQuery.easing.easeOutBounce(a, b * 2 - e, 0, d, e) * .5 + d * .5 + c
    }
});
// jQuery.browser.mobile (http://detectmobilebrowser.com/)
(function(a) {
    (jQuery.browser = jQuery.browser || {}).mobile = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))
})(navigator.userAgent || navigator.vendor || window.opera);
// Bootstrap v3.1.1 (http://getbootstrap.com)
+ function(a) {
    "use strict";
    var b = '[data-dismiss="alert"]',
        c = function(c) {
            a(c).on("click", b, this.close)
        };
    c.prototype.close = function(b) {
        function f() {
            e.trigger("closed.bs.alert").remove()
        }
        var c = a(this),
            d = c.attr("data-target");
        d || (d = c.attr("href"), d = d && d.replace(/.*(?=#[^\s]*$)/, ""));
        var e = a(d);
        b && b.preventDefault(), e.length || (e = c.hasClass("alert") ? c : c.parent()), e.trigger(b = a.Event("close.bs.alert"));
        if (b.isDefaultPrevented()) return;
        e.removeClass("in"), a.support.transition && e.hasClass("fade") ? e.one(a.support.transition.end, f).emulateTransitionEnd(150) : f()
    };
    var d = a.fn.alert;
    a.fn.alert = function(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.alert");
            e || d.data("bs.alert", e = new c(this)), typeof b == "string" && e[b].call(d)
        })
    }, a.fn.alert.Constructor = c, a.fn.alert.noConflict = function() {
        return a.fn.alert = d, this
    }, a(document).on("click.bs.alert.data-api", b, c.prototype.close)
}(jQuery), + function(a) {
    "use strict";
    var b = function(c, d) {
        this.$element = a(c), this.options = a.extend({}, b.DEFAULTS, d), this.isLoading = !1
    };
    b.DEFAULTS = {
        loadingText: "loading..."
    }, b.prototype.setState = function(b) {
        var c = "disabled",
            d = this.$element,
            e = d.is("input") ? "val" : "html",
            f = d.data();
        b += "Text", f.resetText || d.data("resetText", d[e]()), d[e](f[b] || this.options[b]), setTimeout(a.proxy(function() {
            b == "loadingText" ? (this.isLoading = !0, d.addClass(c).attr(c, c)) : this.isLoading && (this.isLoading = !1, d.removeClass(c).removeAttr(c))
        }, this), 0)
    }, b.prototype.toggle = function() {
        var a = !0,
            b = this.$element.closest('[data-toggle="buttons"]');
        if (b.length) {
            var c = this.$element.find("input");
            c.prop("type") == "radio" && (c.prop("checked") && this.$element.hasClass("active") ? a = !1 : b.find(".active").removeClass("active")), a && c.prop("checked", !this.$element.hasClass("active")).trigger("change")
        }
        a && this.$element.toggleClass("active")
    };
    var c = a.fn.button;
    a.fn.button = function(c) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.button"),
                f = typeof c == "object" && c;
            e || d.data("bs.button", e = new b(this, f)), c == "toggle" ? e.toggle() : c && e.setState(c)
        })
    }, a.fn.button.Constructor = b, a.fn.button.noConflict = function() {
        return a.fn.button = c, this
    }, a(document).on("click.bs.button.data-api", "[data-toggle^=button]", function(b) {
        var c = a(b.target);
        c.hasClass("btn") || (c = c.closest(".btn")), c.button("toggle"), b.preventDefault()
    })
}(jQuery), + function(a) {
    "use strict";
    var b = function(b) {
        this.element = a(b)
    };
    b.prototype.show = function() {
        var b = this.element,
            c = b.closest("ul:not(.dropdown-menu)"),
            d = b.data("target");
        d || (d = b.attr("href"), d = d && d.replace(/.*(?=#[^\s]*$)/, ""));
        if (b.parent("li").hasClass("active")) return;
        var e = c.find(".active:last a")[0],
            f = a.Event("show.bs.tab", {
                relatedTarget: e
            });
        b.trigger(f);
        if (f.isDefaultPrevented()) return;
        var g = a(d);
        this.activate(b.parent("li"), c), this.activate(g, g.parent(), function() {
            b.trigger({
                type: "shown.bs.tab",
                relatedTarget: e
            })
        })
    }, b.prototype.activate = function(b, c, d) {
        function g() {
            e.removeClass("active").find("> .dropdown-menu > .active").removeClass("active"), b.addClass("active"), f ? (b[0].offsetWidth, b.addClass("in")) : b.removeClass("fade"), b.parent(".dropdown-menu") && b.closest("li.dropdown").addClass("active"), d && d()
        }
        var e = c.find("> .active"),
            f = d && a.support.transition && e.hasClass("fade");
        f ? e.one(a.support.transition.end, g).emulateTransitionEnd(150) : g(), e.removeClass("in")
    };
    var c = a.fn.tab;
    a.fn.tab = function(c) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.tab");
            e || d.data("bs.tab", e = new b(this)), typeof c == "string" && e[c]()
        })
    }, a.fn.tab.Constructor = b, a.fn.tab.noConflict = function() {
        return a.fn.tab = c, this
    }, a(document).on("click.bs.tab.data-api", '[data-toggle="tab"], [data-toggle="pill"]', function(b) {
        b.preventDefault(), a(this).tab("show")
    })
}(jQuery), + function(a) {
    "use strict";
    var b = function(c, d) {
        this.$element = a(c), this.options = a.extend({}, b.DEFAULTS, d), this.transitioning = null, this.options.parent && (this.$parent = a(this.options.parent)), this.options.toggle && this.toggle()
    };
    b.DEFAULTS = {
        toggle: !0
    }, b.prototype.dimension = function() {
        var a = this.$element.hasClass("width");
        return a ? "width" : "height"
    }, b.prototype.show = function() {
        if (this.transitioning || this.$element.hasClass("in")) return;
        var b = a.Event("show.bs.collapse");
        this.$element.trigger(b);
        if (b.isDefaultPrevented()) return;
        var c = this.$parent && this.$parent.find("> .panel > .in");
        if (c && c.length) {
            var d = c.data("bs.collapse");
            if (d && d.transitioning) return;
            c.collapse("hide"), d || c.data("bs.collapse", null)
        }
        var e = this.dimension();
        this.$element.removeClass("collapse").addClass("collapsing")[e](0), this.transitioning = 1;
        var f = function() {
            this.$element.removeClass("collapsing").addClass("collapse in")[e]("auto"), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
        };
        if (!a.support.transition) return f.call(this);
        var g = a.camelCase(["scroll", e].join("-"));
        this.$element.one(a.support.transition.end, a.proxy(f, this)).emulateTransitionEnd(350)[e](this.$element[0][g])
    }, b.prototype.hide = function() {
        if (this.transitioning || !this.$element.hasClass("in")) return;
        var b = a.Event("hide.bs.collapse");
        this.$element.trigger(b);
        if (b.isDefaultPrevented()) return;
        var c = this.dimension();
        this.$element[c](this.$element[c]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse").removeClass("in"), this.transitioning = 1;
        var d = function() {
            this.transitioning = 0, this.$element.trigger("hidden.bs.collapse").removeClass("collapsing").addClass("collapse")
        };
        if (!a.support.transition) return d.call(this);
        this.$element[c](0).one(a.support.transition.end, a.proxy(d, this)).emulateTransitionEnd(350)
    }, b.prototype.toggle = function() {
        this[this.$element.hasClass("in") ? "hide" : "show"]()
    };
    var c = a.fn.collapse;
    a.fn.collapse = function(c) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.collapse"),
                f = a.extend({}, b.DEFAULTS, d.data(), typeof c == "object" && c);
            !e && f.toggle && c == "show" && (c = !c), e || d.data("bs.collapse", e = new b(this, f)), typeof c == "string" && e[c]()
        })
    }, a.fn.collapse.Constructor = b, a.fn.collapse.noConflict = function() {
        return a.fn.collapse = c, this
    }, a(document).on("click.bs.collapse.data-api", "[data-toggle=collapse]", function(b) {
        var c = a(this),
            d, e = c.attr("data-target") || b.preventDefault() || (d = c.attr("href")) && d.replace(/.*(?=#[^\s]+$)/, ""),
            f = a(e),
            g = f.data("bs.collapse"),
            h = g ? "toggle" : c.data(),
            i = c.attr("data-parent"),
            j = i && a(i);
        if (!g || !g.transitioning) j && j.find('[data-toggle=collapse][data-parent="' + i + '"]').not(c).addClass("collapsed"), c[f.hasClass("in") ? "addClass" : "removeClass"]("collapsed");
        f.collapse(h)
    })
}(jQuery), + function(a) {
    function b() {
        var a = document.createElement("bootstrap"),
            b = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "oTransitionEnd otransitionend",
                transition: "transitionend"
            };
        for (var c in b)
            if (a.style[c] !== undefined) return {
                end: b[c]
            };
        return !1
    }
    "use strict", a.fn.emulateTransitionEnd = function(b) {
        var c = !1,
            d = this;
        a(this).one(a.support.transition.end, function() {
            c = !0
        });
        var e = function() {
            c || a(d).trigger(a.support.transition.end)
        };
        return setTimeout(e, b), this
    }, a(function() {
        a.support.transition = b()
    })
}(jQuery);
// Foundation Responsive Library
(function(e, t, n, r) {
    "use strict";

    function l(e) {
        if (typeof e == "string" || e instanceof String) e = e.replace(/^['\\/"]+|(;\s?})+|['\\/"]+$/g, "");
        return e
    }
    var i = function(t) {
        var n = t.length,
            r = e("head");
        while (n--) r.has("." + t[n]).length === 0 && r.append('<meta class="' + t[n] + '" />')
    };
    i(["foundation-mq-small", "foundation-mq-medium", "foundation-mq-large", "foundation-mq-xlarge", "foundation-mq-xxlarge", "foundation-data-attribute-namespace"]), e(function() {
        typeof FastClick != "undefined" && typeof n.body != "undefined" && FastClick.attach(n.body)
    });
    var s = function(t, r) {
            if (typeof t == "string") {
                if (r) {
                    var i;
                    if (r.jquery) {
                        i = r[0];
                        if (!i) return r
                    } else i = r;
                    return e(i.querySelectorAll(t))
                }
                return e(n.querySelectorAll(t))
            }
            return e(t, r)
        },
        o = function(e) {
            var t = [];
            return e || t.push("data"), this.namespace.length > 0 && t.push(this.namespace), t.push(this.name), t.join("-")
        },
        u = function(e) {
            var t = e.split("-"),
                n = t.length,
                r = [];
            while (n--) n !== 0 ? r.push(t[n]) : this.namespace.length > 0 ? r.push(this.namespace, t[n]) : r.push(t[n]);
            return r.reverse().join("-")
        },
        a = function(t, n) {
            var r = this,
                i = !s(this).data(this.attr_name(!0));
            if (typeof t == "string") return this[t].call(this, n);
            s(this.scope).is("[" + this.attr_name() + "]") ? (s(this.scope).data(this.attr_name(!0) + "-init", e.extend({}, this.settings, n || t, this.data_options(s(this.scope)))), i && this.events(this.scope)) : s("[" + this.attr_name() + "]", this.scope).each(function() {
                var i = !s(this).data(r.attr_name(!0) + "-init");
                s(this).data(r.attr_name(!0) + "-init", e.extend({}, r.settings, n || t, r.data_options(s(this)))), i && r.events(this)
            })
        },
        f = function(e, t) {
            function n() {
                t(e[0])
            }

            function r() {
                this.one("load", n);
                if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
                    var e = this.attr("src"),
                        t = e.match(/\?/) ? "&" : "?";
                    t += "random=" + (new Date).getTime(), this.attr("src", e + t)
                }
            }
            if (!e.attr("src")) {
                n();
                return
            }
            e[0].complete || e[0].readyState === 4 ? n() : r.call(e)
        };
    t.matchMedia = t.matchMedia || function(e) {
            var t, n = e.documentElement,
                r = n.firstElementChild || n.firstChild,
                i = e.createElement("body"),
                s = e.createElement("div");
            return s.id = "mq-test-1", s.style.cssText = "position:absolute;top:-100em", i.style.background = "none", i.appendChild(s),
                function(e) {
                    return s.innerHTML = '&shy;<style media="' + e + '"> #mq-test-1 { width: 42px; }</style>', n.insertBefore(i, r), t = s.offsetWidth === 42, n.removeChild(i), {
                        matches: t,
                        media: e
                    }
                }
        }(n),
        function(e) {
            function a() {
                n && (s(a), u && jQuery.fx.tick())
            }
            var n, r = 0,
                i = ["webkit", "moz"],
                s = t.requestAnimationFrame,
                o = t.cancelAnimationFrame,
                u = "undefined" != typeof jQuery.fx;
            for (; r < i.length && !s; r++) s = t[i[r] + "RequestAnimationFrame"], o = o || t[i[r] + "CancelAnimationFrame"] || t[i[r] + "CancelRequestAnimationFrame"];
            s ? (t.requestAnimationFrame = s, t.cancelAnimationFrame = o, u && (jQuery.fx.timer = function(e) {
                e() && jQuery.timers.push(e) && !n && (n = !0, a())
            }, jQuery.fx.stop = function() {
                n = !1
            })) : (t.requestAnimationFrame = function(e) {
                var n = (new Date).getTime(),
                    i = Math.max(0, 16 - (n - r)),
                    s = t.setTimeout(function() {
                        e(n + i)
                    }, i);
                return r = n + i, s
            }, t.cancelAnimationFrame = function(e) {
                clearTimeout(e)
            })
        }(jQuery), t.Foundation = {
            name: "Foundation",
            version: "5.2.2",
            media_queries: {
                small: s(".foundation-mq-small").css("font-family").replace(/^[\/\\'"]+|(;\s?})+|[\/\\'"]+$/g, ""),
                medium: s(".foundation-mq-medium").css("font-family").replace(/^[\/\\'"]+|(;\s?})+|[\/\\'"]+$/g, ""),
                large: s(".foundation-mq-large").css("font-family").replace(/^[\/\\'"]+|(;\s?})+|[\/\\'"]+$/g, ""),
                xlarge: s(".foundation-mq-xlarge").css("font-family").replace(/^[\/\\'"]+|(;\s?})+|[\/\\'"]+$/g, ""),
                xxlarge: s(".foundation-mq-xxlarge").css("font-family").replace(/^[\/\\'"]+|(;\s?})+|[\/\\'"]+$/g, "")
            },
            stylesheet: e("<style></style>").appendTo("head")[0].sheet,
            global: {
                namespace: r
            },
            init: function(e, t, n, r, i) {
                var o = [e, n, r, i],
                    u = [];
                this.rtl = /rtl/i.test(s("html").attr("dir")), this.scope = e || this.scope, this.set_namespace();
                if (t && typeof t == "string" && !/reflow/i.test(t)) this.libs.hasOwnProperty(t) && u.push(this.init_lib(t, o));
                else
                    for (var a in this.libs) u.push(this.init_lib(a, t));
                return e
            },
            init_lib: function(t, n) {
                return this.libs.hasOwnProperty(t) ? (this.patch(this.libs[t]), n && n.hasOwnProperty(t) ? (typeof this.libs[t].settings != "undefined" ? e.extend(!0, this.libs[t].settings, n[t]) : typeof this.libs[t].defaults != "undefined" && e.extend(!0, this.libs[t].defaults, n[t]), this.libs[t].init.apply(this.libs[t], [this.scope, n[t]])) : (n = n instanceof Array ? n : new Array(n), this.libs[t].init.apply(this.libs[t], n))) : function() {}
            },
            patch: function(e) {
                e.scope = this.scope, e.namespace = this.global.namespace, e.rtl = this.rtl, e.data_options = this.utils.data_options, e.attr_name = o, e.add_namespace = u, e.bindings = a, e.S = this.utils.S
            },
            inherit: function(e, t) {
                var n = t.split(" "),
                    r = n.length;
                while (r--) this.utils.hasOwnProperty(n[r]) && (e[n[r]] = this.utils[n[r]])
            },
            set_namespace: function() {
                var t = this.global.namespace === r ? e(".foundation-data-attribute-namespace").css("font-family") : this.global.namespace;
                this.global.namespace = t === r || /false/i.test(t) ? "" : t
            },
            libs: {},
            utils: {
                S: s,
                throttle: function(e, t) {
                    var n = null;
                    return function() {
                        var r = this,
                            i = arguments;
                        n == null && (n = setTimeout(function() {
                            e.apply(r, i), n = null
                        }, t))
                    }
                },
                debounce: function(e, t, n) {
                    var r, i;
                    return function() {
                        var s = this,
                            o = arguments,
                            u = function() {
                                r = null, n || (i = e.apply(s, o))
                            },
                            a = n && !r;
                        return clearTimeout(r), r = setTimeout(u, t), a && (i = e.apply(s, o)), i
                    }
                },
                data_options: function(t) {
                    function a(e) {
                        return !isNaN(e - 0) && e !== null && e !== "" && e !== !1 && e !== !0
                    }

                    function f(t) {
                        return typeof t == "string" ? e.trim(t) : t
                    }
                    var n = {},
                        r, i, s, o = function(e) {
                            var t = Foundation.global.namespace;
                            return t.length > 0 ? e.data(t + "-options") : e.data("options")
                        },
                        u = o(t);
                    if (typeof u == "object") return u;
                    s = (u || ":").split(";"), r = s.length;
                    while (r--) i = s[r].split(":"), /true/i.test(i[1]) && (i[1] = !0), /false/i.test(i[1]) && (i[1] = !1), a(i[1]) && (i[1].indexOf(".") === -1 ? i[1] = parseInt(i[1], 10) : i[1] = parseFloat(i[1])), i.length === 2 && i[0].length > 0 && (n[f(i[0])] = f(i[1]));
                    return n
                },
                register_media: function(t, n) {
                    Foundation.media_queries[t] === r && (e("head").append('<meta class="' + n + '">'), Foundation.media_queries[t] = l(e("." + n).css("font-family")))
                },
                add_custom_rule: function(e, t) {
                    if (t === r && Foundation.stylesheet) Foundation.stylesheet.insertRule(e, Foundation.stylesheet.cssRules.length);
                    else {
                        var n = Foundation.media_queries[t];
                        n !== r && Foundation.stylesheet.insertRule("@media " + Foundation.media_queries[t] + "{ " + e + " }")
                    }
                },
                image_loaded: function(e, t) {
                    var n = this,
                        r = e.length;
                    r === 0 && t(e), e.each(function() {
                        f(n.S(this), function() {
                            r -= 1, r === 0 && t(e)
                        })
                    })
                },
                random_str: function() {
                    return this.fidx || (this.fidx = 0), this.prefix = this.prefix || [this.name || "F", (+(new Date)).toString(36)].join("-"), this.prefix + (this.fidx++).toString(36)
                }
            }
        }, e.fn.foundation = function() {
            var e = Array.prototype.slice.call(arguments, 0);
            return this.each(function() {
                return Foundation.init.apply(Foundation, [this].concat(e)), this
            })
        }
})(jQuery, this, this.document),
function(e, t, n, r) {
    "use strict";
    Foundation.libs.topbar = {
        name: "topbar",
        version: "5.2.2",
        settings: {
            index: 0,
            sticky_class: "sticky",
            custom_back_text: !0,
            back_text: "Back",
            is_hover: !0,
            mobile_show_parent_link: !1,
            scrolltop: !0,
            sticky_on: "all"
        },
        init: function(t, n, r) {
            Foundation.inherit(this, "add_custom_rule register_media throttle");
            var i = this;
            i.register_media("topbar", "foundation-mq-topbar"), this.bindings(n, r), i.S("[" + this.attr_name() + "]", this.scope).each(function() {
                var t = e(this),
                    n = t.data(i.attr_name(!0) + "-init"),
                    r = i.S("section", this),
                    s = t.children().filter("ul").first();
                t.data("index", 0);
                var o = t.parent();
                o.hasClass("fixed") || i.is_sticky(t, o, n) ? (i.settings.sticky_class = n.sticky_class, i.settings.sticky_topbar = t, t.data("height", o.outerHeight()), t.data("stickyoffset", o.offset().top)) : t.data("height", t.outerHeight()), n.assembled || i.assemble(t), n.is_hover ? i.S(".has-dropdown", t).addClass("not-click") : i.S(".has-dropdown", t).removeClass("not-click"), i.add_custom_rule(".f-topbar-fixed { padding-top: " + t.data("height") + "px }"), o.hasClass("fixed") && i.S("body").addClass("f-topbar-fixed")
            })
        },
        is_sticky: function(e, t, n) {
            var r = t.hasClass(n.sticky_class);
            return r && n.sticky_on === "all" ? !0 : r && this.small() && n.sticky_on === "small" ? !0 : r && this.medium() && n.sticky_on === "medium" ? !0 : r && this.large() && n.sticky_on === "large" ? !0 : !1
        },
        toggle: function(n) {
            var r = this;
            if (n) var i = r.S(n).closest("[" + this.attr_name() + "]");
            else var i = r.S("[" + this.attr_name() + "]");
            var s = i.data(this.attr_name(!0) + "-init"),
                o = r.S("section, .section", i);
            r.breakpoint() && (r.rtl ? (o.css({
                right: "0%"
            }), e(">.name", o).css({
                right: "100%"
            })) : (o.css({
                left: "0%"
            }), e(">.name", o).css({
                left: "100%"
            })), r.S("li.moved", o).removeClass("moved"), i.data("index", 0), i.toggleClass("expanded").css("height", "")), s.scrolltop ? i.hasClass("expanded") ? i.parent().hasClass("fixed") && (s.scrolltop ? (i.parent().removeClass("fixed"), i.addClass("fixed"), r.S("body").removeClass("f-topbar-fixed"), t.scrollTo(0, 0)) : i.parent().removeClass("expanded")) : i.hasClass("fixed") && (i.parent().addClass("fixed"), i.removeClass("fixed"), r.S("body").addClass("f-topbar-fixed")) : (r.is_sticky(i, i.parent(), s) && i.parent().addClass("fixed"), i.parent().hasClass("fixed") && (i.hasClass("expanded") ? (i.addClass("fixed"), i.parent().addClass("expanded"), r.S("body").addClass("f-topbar-fixed")) : (i.removeClass("fixed"), i.parent().removeClass("expanded"), r.update_sticky_positioning())))
        },
        timer: null,
        events: function(n) {
            var r = this,
                i = this.S;
            i(this.scope).off(".topbar").on("click.fndtn.topbar", "[" + this.attr_name() + "] .toggle-topbar", function(e) {
                e.preventDefault(), r.toggle(this)
            }).on("click.fndtn.topbar", '.top-bar .top-bar-section li a[href^="#"],[' + this.attr_name() + '] .top-bar-section li a[href^="#"]', function(t) {
                var n = e(this).closest("li");
                r.breakpoint() && !n.hasClass("back") && !n.hasClass("has-dropdown") && r.toggle()
            }).on("click.fndtn.topbar", "[" + this.attr_name() + "] li.has-dropdown", function(t) {
                var n = i(this),
                    s = i(t.target),
                    o = n.closest("[" + r.attr_name() + "]"),
                    u = o.data(r.attr_name(!0) + "-init");
                if (s.data("revealId")) {
                    r.toggle();
                    return
                }
                if (r.breakpoint()) return;
                if (u.is_hover && !Modernizr.touch) return;
                t.stopImmediatePropagation(), n.hasClass("hover") ? (n.removeClass("hover").find("li").removeClass("hover"), n.parents("li.hover").removeClass("hover")) : (n.addClass("hover"), e(n).siblings().removeClass("hover"), s[0].nodeName === "A" && s.parent().hasClass("has-dropdown") && t.preventDefault())
            }).on("click.fndtn.topbar", "[" + this.attr_name() + "] .has-dropdown>a", function(e) {
                if (r.breakpoint()) {
                    e.preventDefault();
                    var t = i(this),
                        n = t.closest("[" + r.attr_name() + "]"),
                        s = n.find("section, .section"),
                        o = t.next(".dropdown").outerHeight(),
                        u = t.closest("li");
                    n.data("index", n.data("index") + 1), u.addClass("moved"), r.rtl ? (s.css({
                        right: -(100 * n.data("index")) + "%"
                    }), s.find(">.name").css({
                        right: 100 * n.data("index") + "%"
                    })) : (s.css({
                        left: -(100 * n.data("index")) + "%"
                    }), s.find(">.name").css({
                        left: 100 * n.data("index") + "%"
                    })), n.css("height", t.siblings("ul").outerHeight(!0) + n.data("height"))
                }
            }), i(t).off(".topbar").on("resize.fndtn.topbar", r.throttle(function() {
                r.resize.call(r)
            }, 50)).trigger("resize"), i("body").off(".topbar").on("click.fndtn.topbar touchstart.fndtn.topbar", function(e) {
                var t = i(e.target).closest("li").closest("li.hover");
                if (t.length > 0) return;
                i("[" + r.attr_name() + "] li.hover").removeClass("hover")
            }), i(this.scope).on("click.fndtn.topbar", "[" + this.attr_name() + "] .has-dropdown .back", function(e) {
                e.preventDefault();
                var t = i(this),
                    n = t.closest("[" + r.attr_name() + "]"),
                    s = n.find("section, .section"),
                    o = n.data(r.attr_name(!0) + "-init"),
                    u = t.closest("li.moved"),
                    a = u.parent();
                n.data("index", n.data("index") - 1), r.rtl ? (s.css({
                    right: -(100 * n.data("index")) + "%"
                }), s.find(">.name").css({
                    right: 100 * n.data("index") + "%"
                })) : (s.css({
                    left: -(100 * n.data("index")) + "%"
                }), s.find(">.name").css({
                    left: 100 * n.data("index") + "%"
                })), n.data("index") === 0 ? n.css("height", "") : n.css("height", a.outerHeight(!0) + n.data("height")), setTimeout(function() {
                    u.removeClass("moved")
                }, 300)
            })
        },
        resize: function() {
            var e = this;
            e.S("[" + this.attr_name() + "]").each(function() {
                var t = e.S(this),
                    r = t.data(e.attr_name(!0) + "-init"),
                    i = t.parent("." + e.settings.sticky_class),
                    s;
                if (!e.breakpoint()) {
                    var o = t.hasClass("expanded");
                    t.css("height", "").removeClass("expanded").find("li").removeClass("hover"), o && e.toggle(t)
                }
                e.is_sticky(t, i, r) && (i.hasClass("fixed") ? (i.removeClass("fixed"), s = i.offset().top, e.S(n.body).hasClass("f-topbar-fixed") && (s -= t.data("height")), t.data("stickyoffset", s), i.addClass("fixed")) : (s = i.offset().top, t.data("stickyoffset", s)))
            })
        },
        breakpoint: function() {
            return !matchMedia(Foundation.media_queries.topbar).matches
        },
        small: function() {
            return matchMedia(Foundation.media_queries.small).matches
        },
        medium: function() {
            return matchMedia(Foundation.media_queries.medium).matches
        },
        large: function() {
            return matchMedia(Foundation.media_queries.large).matches
        },
        assemble: function(t) {
            var n = this,
                r = t.data(this.attr_name(!0) + "-init"),
                i = n.S("section", t),
                s = e(this).children().filter("ul").first();
            i.detach(), n.S(".has-dropdown>a", i).each(function() {
                var t = n.S(this),
                    i = t.siblings(".dropdown"),
                    s = t.attr("href");
                if (!i.find(".title.back").length) {
                    if (r.mobile_show_parent_link && s && s.length > 1) var o = e('<li class="title back js-generated"><div><a href="javascript:void(0)"></a></div></li><li><a class="parent-link js-generated" href="' + s + '">' + t.text() + "</a></li>");
                    else var o = e('<li class="title back js-generated"><div><a href="javascript:void(0)"></a></div></li>');
                    r.custom_back_text == 1 ? e("div>a", o).html(r.back_text) : e("div>a", o).html("&laquo; " + t.html()), i.prepend(o)
                }
            }), i.appendTo(t), this.sticky(), this.assembled(t)
        },
        assembled: function(t) {
            t.data(this.attr_name(!0), e.extend({}, t.data(this.attr_name(!0)), {
                assembled: !0
            }))
        },
        height: function(t) {
            var n = 0,
                r = this;
            return e("> li", t).each(function() {
                n += r.S(this).outerHeight(!0)
            }), n
        },
        sticky: function() {
            var e = this.S(t),
                n = this;
            this.S(t).on("scroll", function() {
                n.update_sticky_positioning()
            })
        },
        update_sticky_positioning: function() {
            var e = "." + this.settings.sticky_class,
                n = this.S(t),
                r = this;
            if (r.settings.sticky_topbar && r.is_sticky(this.settings.sticky_topbar, this.settings.sticky_topbar.parent(), this.settings)) {
                var i = this.settings.sticky_topbar.data("stickyoffset");
                r.S(e).hasClass("expanded") || (n.scrollTop() > i ? r.S(e).hasClass("fixed") || (r.S(e).addClass("fixed"), r.S("body").addClass("f-topbar-fixed")) : n.scrollTop() <= i && r.S(e).hasClass("fixed") && (r.S(e).removeClass("fixed"), r.S("body").removeClass("f-topbar-fixed")))
            }
        },
        off: function() {
            this.S(this.scope).off(".fndtn.topbar"), this.S(t).off(".fndtn.topbar")
        },
        reflow: function() {}
    }
}(jQuery, this, this.document);
// jQuery Transit - CSS3 transitions and transformations
(function(k) {
    k.transit = {
        version: "0.9.9",
        propertyMap: {
            marginLeft: "margin",
            marginRight: "margin",
            marginBottom: "margin",
            marginTop: "margin",
            paddingLeft: "padding",
            paddingRight: "padding",
            paddingBottom: "padding",
            paddingTop: "padding"
        },
        enabled: true,
        useTransitionEnd: false
    };
    var d = document.createElement("div");
    var q = {};

    function b(v) {
        if (v in d.style) {
            return v
        }
        var u = ["Moz", "Webkit", "O", "ms"];
        var r = v.charAt(0).toUpperCase() + v.substr(1);
        if (v in d.style) {
            return v
        }
        for (var t = 0; t < u.length; ++t) {
            var s = u[t] + r;
            if (s in d.style) {
                return s
            }
        }
    }

    function e() {
        d.style[q.transform] = "";
        d.style[q.transform] = "rotateY(90deg)";
        return d.style[q.transform] !== ""
    }
    var a = navigator.userAgent.toLowerCase().indexOf("chrome") > -1;
    q.transition = b("transition");
    q.transitionDelay = b("transitionDelay");
    q.transform = b("transform");
    q.transformOrigin = b("transformOrigin");
    q.transform3d = e();
    var i = {
        transition: "transitionEnd",
        MozTransition: "transitionend",
        OTransition: "oTransitionEnd",
        WebkitTransition: "webkitTransitionEnd",
        msTransition: "MSTransitionEnd"
    };
    var f = q.transitionEnd = i[q.transition] || null;
    for (var p in q) {
        if (q.hasOwnProperty(p) && typeof k.support[p] === "undefined") {
            k.support[p] = q[p]
        }
    }
    d = null;
    k.cssEase = {
        _default: "ease",
        "in": "ease-in",
        out: "ease-out",
        "in-out": "ease-in-out",
        snap: "cubic-bezier(0,1,.5,1)",
        easeOutCubic: "cubic-bezier(.215,.61,.355,1)",
        easeInOutCubic: "cubic-bezier(.645,.045,.355,1)",
        easeInCirc: "cubic-bezier(.6,.04,.98,.335)",
        easeOutCirc: "cubic-bezier(.075,.82,.165,1)",
        easeInOutCirc: "cubic-bezier(.785,.135,.15,.86)",
        easeInExpo: "cubic-bezier(.95,.05,.795,.035)",
        easeOutExpo: "cubic-bezier(.19,1,.22,1)",
        easeInOutExpo: "cubic-bezier(1,0,0,1)",
        easeInQuad: "cubic-bezier(.55,.085,.68,.53)",
        easeOutQuad: "cubic-bezier(.25,.46,.45,.94)",
        easeInOutQuad: "cubic-bezier(.455,.03,.515,.955)",
        easeInQuart: "cubic-bezier(.895,.03,.685,.22)",
        easeOutQuart: "cubic-bezier(.165,.84,.44,1)",
        easeInOutQuart: "cubic-bezier(.77,0,.175,1)",
        easeInQuint: "cubic-bezier(.755,.05,.855,.06)",
        easeOutQuint: "cubic-bezier(.23,1,.32,1)",
        easeInOutQuint: "cubic-bezier(.86,0,.07,1)",
        easeInSine: "cubic-bezier(.47,0,.745,.715)",
        easeOutSine: "cubic-bezier(.39,.575,.565,1)",
        easeInOutSine: "cubic-bezier(.445,.05,.55,.95)",
        easeInBack: "cubic-bezier(.6,-.28,.735,.045)",
        easeOutBack: "cubic-bezier(.175, .885,.32,1.275)",
        easeInOutBack: "cubic-bezier(.68,-.55,.265,1.55)"
    };
    k.cssHooks["transit:transform"] = {
        get: function(r) {
            return k(r).data("transform") || new j()
        },
        set: function(s, r) {
            var t = r;
            if (!(t instanceof j)) {
                t = new j(t)
            }
            if (q.transform === "WebkitTransform" && !a) {
                s.style[q.transform] = t.toString(true)
            } else {
                s.style[q.transform] = t.toString()
            }
            k(s).data("transform", t)
        }
    };
    k.cssHooks.transform = {
        set: k.cssHooks["transit:transform"].set
    };
    if (k.fn.jquery < "1.8") {
        k.cssHooks.transformOrigin = {
            get: function(r) {
                return r.style[q.transformOrigin]
            },
            set: function(r, s) {
                r.style[q.transformOrigin] = s
            }
        };
        k.cssHooks.transition = {
            get: function(r) {
                return r.style[q.transition]
            },
            set: function(r, s) {
                r.style[q.transition] = s
            }
        }
    }
    n("scale");
    n("translate");
    n("rotate");
    n("rotateX");
    n("rotateY");
    n("rotate3d");
    n("perspective");
    n("skewX");
    n("skewY");
    n("x", true);
    n("y", true);

    function j(r) {
        if (typeof r === "string") {
            this.parse(r)
        }
        return this
    }
    j.prototype = {
        setFromString: function(t, s) {
            var r = (typeof s === "string") ? s.split(",") : (s.constructor === Array) ? s : [s];
            r.unshift(t);
            j.prototype.set.apply(this, r)
        },
        set: function(s) {
            var r = Array.prototype.slice.apply(arguments, [1]);
            if (this.setter[s]) {
                this.setter[s].apply(this, r)
            } else {
                this[s] = r.join(",")
            }
        },
        get: function(r) {
            if (this.getter[r]) {
                return this.getter[r].apply(this)
            } else {
                return this[r] || 0
            }
        },
        setter: {
            rotate: function(r) {
                this.rotate = o(r, "deg")
            },
            rotateX: function(r) {
                this.rotateX = o(r, "deg")
            },
            rotateY: function(r) {
                this.rotateY = o(r, "deg")
            },
            scale: function(r, s) {
                if (s === undefined) {
                    s = r
                }
                this.scale = r + "," + s
            },
            skewX: function(r) {
                this.skewX = o(r, "deg")
            },
            skewY: function(r) {
                this.skewY = o(r, "deg")
            },
            perspective: function(r) {
                this.perspective = o(r, "px")
            },
            x: function(r) {
                this.set("translate", r, null)
            },
            y: function(r) {
                this.set("translate", null, r)
            },
            translate: function(r, s) {
                if (this._translateX === undefined) {
                    this._translateX = 0
                }
                if (this._translateY === undefined) {
                    this._translateY = 0
                }
                if (r !== null && r !== undefined) {
                    this._translateX = o(r, "px")
                }
                if (s !== null && s !== undefined) {
                    this._translateY = o(s, "px")
                }
                this.translate = this._translateX + "," + this._translateY
            }
        },
        getter: {
            x: function() {
                return this._translateX || 0
            },
            y: function() {
                return this._translateY || 0
            },
            scale: function() {
                var r = (this.scale || "1,1").split(",");
                if (r[0]) {
                    r[0] = parseFloat(r[0])
                }
                if (r[1]) {
                    r[1] = parseFloat(r[1])
                }
                return (r[0] === r[1]) ? r[0] : r
            },
            rotate3d: function() {
                var t = (this.rotate3d || "0,0,0,0deg").split(",");
                for (var r = 0; r <= 3; ++r) {
                    if (t[r]) {
                        t[r] = parseFloat(t[r])
                    }
                }
                if (t[3]) {
                    t[3] = o(t[3], "deg")
                }
                return t
            }
        },
        parse: function(s) {
            var r = this;
            s.replace(/([a-zA-Z0-9]+)\((.*?)\)/g, function(t, v, u) {
                r.setFromString(v, u)
            })
        },
        toString: function(t) {
            var s = [];
            for (var r in this) {
                if (this.hasOwnProperty(r)) {
                    if ((!q.transform3d) && ((r === "rotateX") || (r === "rotateY") || (r === "perspective") || (r === "transformOrigin"))) {
                        continue
                    }
                    if (r[0] !== "_") {
                        if (t && (r === "scale")) {
                            s.push(r + "3d(" + this[r] + ",1)")
                        } else {
                            if (t && (r === "translate")) {
                                s.push(r + "3d(" + this[r] + ",0)")
                            } else {
                                s.push(r + "(" + this[r] + ")")
                            }
                        }
                    }
                }
            }
            return s.join(" ")
        }
    };

    function m(s, r, t) {
        if (r === true) {
            s.queue(t)
        } else {
            if (r) {
                s.queue(r, t)
            } else {
                t()
            }
        }
    }

    function h(s) {
        var r = [];
        k.each(s, function(t) {
            t = k.camelCase(t);
            t = k.transit.propertyMap[t] || k.cssProps[t] || t;
            t = c(t);
            if (k.inArray(t, r) === -1) {
                r.push(t)
            }
        });
        return r
    }

    function g(s, v, x, r) {
        var t = h(s);
        if (k.cssEase[x]) {
            x = k.cssEase[x]
        }
        var w = "" + l(v) + " " + x;
        if (parseInt(r, 10) > 0) {
            w += " " + l(r)
        }
        var u = [];
        k.each(t, function(z, y) {
            u.push(y + " " + w)
        });
        return u.join(", ")
    }
    k.fn.transition = k.fn.transit = function(z, s, y, C) {
        var D = this;
        var u = 0;
        var w = true;
        if (typeof s === "function") {
            C = s;
            s = undefined
        }
        if (typeof y === "function") {
            C = y;
            y = undefined
        }
        if (typeof z.easing !== "undefined") {
            y = z.easing;
            delete z.easing
        }
        if (typeof z.duration !== "undefined") {
            s = z.duration;
            delete z.duration
        }
        if (typeof z.complete !== "undefined") {
            C = z.complete;
            delete z.complete
        }
        if (typeof z.queue !== "undefined") {
            w = z.queue;
            delete z.queue
        }
        if (typeof z.delay !== "undefined") {
            u = z.delay;
            delete z.delay
        }
        if (typeof s === "undefined") {
            s = k.fx.speeds._default
        }
        if (typeof y === "undefined") {
            y = k.cssEase._default
        }
        s = l(s);
        var E = g(z, s, y, u);
        var B = k.transit.enabled && q.transition;
        var t = B ? (parseInt(s, 10) + parseInt(u, 10)) : 0;
        if (t === 0) {
            var A = function(F) {
                D.css(z);
                if (C) {
                    C.apply(D)
                }
                if (F) {
                    F()
                }
            };
            m(D, w, A);
            return D
        }
        var x = {};
        var r = function(H) {
            var G = false;
            var F = function() {
                if (G) {
                    D.unbind(f, F)
                }
                if (t > 0) {
                    D.each(function() {
                        this.style[q.transition] = (x[this] || null)
                    })
                }
                if (typeof C === "function") {
                    C.apply(D)
                }
                if (typeof H === "function") {
                    H()
                }
            };
            if ((t > 0) && (f) && (k.transit.useTransitionEnd)) {
                G = true;
                D.bind(f, F)
            } else {
                window.setTimeout(F, t)
            }
            D.each(function() {
                if (t > 0) {
                    this.style[q.transition] = E
                }
                k(this).css(z)
            })
        };
        var v = function(F) {
            this.offsetWidth;
            r(F)
        };
        m(D, w, v);
        return this
    };

    function n(s, r) {
        if (!r) {
            k.cssNumber[s] = true
        }
        k.transit.propertyMap[s] = q.transform;
        k.cssHooks[s] = {
            get: function(v) {
                var u = k(v).css("transit:transform");
                return u.get(s)
            },
            set: function(v, w) {
                var u = k(v).css("transit:transform");
                u.setFromString(s, w);
                k(v).css({
                    "transit:transform": u
                })
            }
        }
    }

    function c(r) {
        return r.replace(/([A-Z])/g, function(s) {
            return "-" + s.toLowerCase()
        })
    }

    function o(s, r) {
        if ((typeof s === "string") && (!s.match(/^[\-0-9\.]+$/))) {
            return s
        } else {
            return "" + s + r
        }
    }

    function l(s) {
        var r = s;
        if (k.fx.speeds[r]) {
            r = k.fx.speeds[r]
        }
        return o(r, "ms")
    }
    k.transit.getTransitionValue = g
})(jQuery);
// Cube Portfolio - Responsive jQuery Grid Plugin
! function(a, b, c, d) {
    "use strict";
    var e = "cbp",
        f = "." + e;
    "function" != typeof Object.create && (Object.create = function(a) {
        function b() {}
        return b.prototype = a, new b
    }), a.expr[":"].uncached = function(b) {
        if (!a(b).is('img[src!=""]')) return !1;
        var c = new Image;
        return c.src = b.src, !c.complete
    };
    var g = {
            init: function(a, b) {
                var c, d = this;
                return d.cubeportfolio = a, d.type = b, d.isOpen = !1, d.options = d.cubeportfolio.options, "singlePageInline" === b ? (d.matrice = [-1, -1], d.height = 0, void d._createMarkupSinglePageInline()) : (d._createMarkup(), void(d.options.singlePageDeeplinking && "singlePage" === b && (d.url = location.href, "#" === d.url.slice(-1) && (d.url = d.url.slice(0, -1)), c = d.cubeportfolio.blocksAvailable.find(d.options.singlePageDelegate).filter(function() {
                    return d.url.split("#cbp=")[1] === this.getAttribute("href")
                })[0], c && (d.url = d.url.replace(/#cbp=(.+)/gi, ""), d.openSinglePage(d.cubeportfolio.blocksAvailable.find(d.options.singlePageDelegate), c)))))
            },
            _createMarkup: function() {
                var b = this;
                b.wrap = a("<div/>", {
                    "class": "cbp-popup-wrap cbp-popup-" + b.type,
                    "data-action": "lightbox" === b.type ? "close" : ""
                }).on("click" + f, function(c) {
                    if (!b.stopEvents) {
                        var d = a(c.target).attr("data-action");
                        b[d] && (b[d](), c.preventDefault())
                    }
                }), b.content = a("<div/>", {
                    "class": "cbp-popup-content"
                }).appendTo(b.wrap), a("<div/>", {
                    "class": "cbp-popup-loadingBox"
                }).appendTo(b.wrap), "ie8" === b.cubeportfolio.browser && (b.bg = a("<div/>", {
                    "class": "cbp-popup-ie8bg",
                    "data-action": "lightbox" === b.type ? "close" : ""
                }).appendTo(b.wrap)), b.navigationWrap = a("<div/>", {
                    "class": "cbp-popup-navigation-wrap"
                }).appendTo(b.wrap), b.navigation = a("<div/>", {
                    "class": "cbp-popup-navigation"
                }).appendTo(b.navigationWrap), b.closeButton = a("<button/>", {
                    "class": "cbp-popup-close",
                    title: "Close (Esc arrow key)",
                    type: "button",
                    "data-action": "close"
                }).appendTo(b.navigation), b.nextButton = a("<button/>", {
                    "class": "cbp-popup-next",
                    title: "Next (Right arrow key)",
                    type: "button",
                    "data-action": "next"
                }).appendTo(b.navigation), b.prevButton = a("<button/>", {
                    "class": "cbp-popup-prev",
                    title: "Previous (Left arrow key)",
                    type: "button",
                    "data-action": "prev"
                }).appendTo(b.navigation), "singlePage" === b.type && (b.options.singlePageCounter && (b.counter = a(b.options.singlePageCounter).appendTo(b.navigation), b.options.singlePageCounter = b.counter.text(), b.counter.text("")), b.content.on("click" + f, b.options.singlePageDelegate, function(a) {
                    a.preventDefault();
                    var c, d = b.dataArray.length,
                        e = this.getAttribute("href");
                    for (c = 0; d > c && b.dataArray[c].url !== e; c++);
                    b.singlePageJumpTo(c - b.current)
                })), a(c).on("keydown" + f, function(a) {
                    b.isOpen && (b.stopEvents || (37 === a.keyCode ? b.prev() : 39 === a.keyCode ? b.next() : 27 === a.keyCode && b.close()))
                })
            },
            _createMarkupSinglePageInline: function() {
                var b = this;
                b.wrap = a("<div/>", {
                    "class": "cbp-popup-singlePageInline"
                }).on("click" + f, function(c) {
                    if (!b.stopEvents) {
                        var d = a(c.target).attr("data-action");
                        d && (b[d](), c.preventDefault())
                    }
                }), b.content = a("<div/>", {
                    "class": "cbp-popup-content"
                }).appendTo(b.wrap), a("<div/>", {
                    "class": "cbp-popup-loadingBox"
                }).appendTo(b.wrap), b.navigation = a("<div/>", {
                    "class": "cbp-popup-navigation"
                }).appendTo(b.wrap), b.closeButton = a("<button/>", {
                    "class": "cbp-popup-close",
                    title: "Close (Esc arrow key)",
                    type: "button",
                    "data-action": "close"
                }).appendTo(b.navigation)
            },
            destroy: function() {
                var b = this,
                    d = a("body");
                a(c).off("keydown" + f), d.off("click" + f, b.options.lightboxDelegate), d.off("click" + f, b.options.singlePageDelegate), b.content.off("click" + f, b.options.singlePageDelegate), b.cubeportfolio.$obj.off("click" + f, b.options.singlePageInlineDelegate), b.cubeportfolio.$obj.removeClass("cbp-popup-isOpening"), b.cubeportfolio.blocks.removeClass("cbp-singlePageInline-active"), b.wrap.remove()
            },
            openLightbox: function(d, e) {
                var f, g, h = this,
                    i = 0,
                    j = [];
                if (!h.isOpen) {
                    if (h.cubeportfolio.singlePageInline && h.cubeportfolio.singlePageInline.isOpen && h.cubeportfolio.singlePageInline.close(), h.isOpen = !0, h.stopEvents = !1, h.dataArray = [], h.current = null, f = e.getAttribute("href"), null === f) throw new Error("HEI! Your clicked element doesn't have a href attribute.");
                    a.each(d, function(b, c) {
                        var d = c.getAttribute("href"),
                            e = d,
                            g = "isImage";
                        if (-1 === a.inArray(d, j)) {
                            if (f === d) h.current = i;
                            else if (!h.options.lightboxGallery) return;
                            /youtube/i.test(d) ? (e = "//www.youtube.com/embed/" + d.substring(d.lastIndexOf("v=") + 2) + "?autoplay=1", g = "isYoutube") : /vimeo/i.test(d) ? (e = "//player.vimeo.com/video/" + d.substring(d.lastIndexOf("/") + 1) + "?autoplay=1", g = "isVimeo") : /ted\.com/i.test(d) ? (e = "http://embed.ted.com/talks/" + d.substring(d.lastIndexOf("/") + 1) + ".html", g = "isTed") : /(\.mp4)|(\.ogg)|(\.ogv)|(\.webm)/i.test(d) && (e = d.split(-1 !== d.indexOf("|") ? "|" : "%7C"), g = "isSelfHosted"), h.dataArray.push({
                                src: e,
                                title: c.getAttribute(h.options.lightboxTitleSrc),
                                type: g
                            }), i++
                        }
                        j.push(d)
                    }), h.counterTotal = h.dataArray.length, 1 === h.counterTotal ? (h.nextButton.hide(), h.prevButton.hide(), h.dataActionImg = "") : (h.nextButton.show(), h.prevButton.show(), h.dataActionImg = 'data-action="next"'), h.wrap.appendTo(c.body), h.scrollTop = a(b).scrollTop(), a("html").css({
                        overflow: "hidden",
                        paddingRight: b.innerWidth - a(c).width()
                    }), h.wrap.show(), g = h.dataArray[h.current], h[g.type](g)
                }
            },
            openSinglePage: function(d, e) {
                var f, g = this,
                    h = 0,
                    i = [];
                if (!g.isOpen) {
                    if (g.cubeportfolio.singlePageInline && g.cubeportfolio.singlePageInline.isOpen && g.cubeportfolio.singlePageInline.close(), g.isOpen = !0, g.stopEvents = !1, g.dataArray = [], g.current = null, f = e.getAttribute("href"), null === f) throw new Error("HEI! Your clicked element doesn't have a href attribute.");
                    if (a.each(d, function(b, c) {
                            var d = c.getAttribute("href"); - 1 === a.inArray(d, i) && (f === d && (g.current = h), g.dataArray.push({
                                url: d,
                                element: c
                            }), h++), i.push(d)
                        }), g.counterTotal = g.dataArray.length, 1 === g.counterTotal ? (g.nextButton.hide(), g.prevButton.hide()) : (g.nextButton.show(), g.prevButton.show()), g.wrap.appendTo(c.body), g.scrollTop = a(b).scrollTop(), a("html").css({
                            overflow: "hidden",
                            paddingRight: b.innerWidth - a(c).width()
                        }), g.wrap.scrollTop(0), a.isFunction(g.options.singlePageCallback) && g.options.singlePageCallback.call(g, g.dataArray[g.current].url, g.dataArray[g.current].element), g.wrap.show(), g.wrap.one(g.cubeportfolio.transitionEnd, function() {
                            var a;
                            g.options.singlePageStickyNavigation && (g.wrap.addClass("cbp-popup-singlePage-sticky"), a = g.wrap[0].clientWidth, g.navigationWrap.width(a))
                        }), ("ie8" === g.cubeportfolio.browser || "ie9" === g.cubeportfolio.browser) && (setTimeout(function() {
                            g.wrap.addClass("cbp-popup-singlePage-sticky")
                        }, 1e3), g.options.singlePageStickyNavigation)) {
                        var j = g.wrap[0].clientWidth;
                        g.navigationWrap.width(j)
                    }
                    setTimeout(function() {
                        g.wrap.addClass("cbp-popup-singlePage-open")
                    }, 20), g.options.singlePageDeeplinking && (location.href = g.url + "#cbp=" + g.dataArray[g.current].url)
                }
            },
            openSinglePageInline: function(b, c, d) {
                var e, f, g, h, i, j = this,
                    k = 0,
                    l = 0,
                    m = 0;
                if (d = d || !1, j.storeBlocks = b, j.storeCurrentBlock = c, j.isOpen) return h = a(c).closest(".cbp-item").index(".cbp-item"), void(j.dataArray[j.current].url !== c.getAttribute("href") || j.current !== h ? j.cubeportfolio.singlePageInline.close("open", {
                    blocks: b,
                    currentBlock: c,
                    fromOpen: !0
                }) : j.close());
                if (j.wrap.addClass("cbp-popup-loading"), j.isOpen = !0, j.stopEvents = !1, j.dataArray = [], j.current = null, e = c.getAttribute("href"), null === e) throw new Error("HEI! Your clicked element doesn't have a href attribute.");
                i = a(c).closest(".cbp-item")[0], a.each(b, function(a, b) {
                    i === b && (j.current = a)
                }), j.dataArray[j.current] = {
                    url: e,
                    element: c
                }, a(j.dataArray[j.current].element).parents(".cbp-item").addClass("cbp-singlePageInline-active"), j.counterTotal = b.length, j.wrap.prependTo(j.cubeportfolio.blocksClone ? "clone" === j.cubeportfolio.ulHidden ? j.cubeportfolio.$ul : j.cubeportfolio.$ulClone : j.cubeportfolio.$ul), "top" === j.options.singlePageInlinePosition ? (l = 0, m = j.cubeportfolio.cols - 1) : "bottom" === j.options.singlePageInlinePosition ? (l = j.counterTotal, m = j.counterTotal, j.lastColumn = !0, d ? j.lastColumn && (j.top = j.lastColumnHeight) : (j.lastColumnHeight = j.cubeportfolio.height, j.top = j.lastColumnHeight)) : "above" === j.options.singlePageInlinePosition ? (k = Math.floor(j.current / j.cubeportfolio.cols), l = j.cubeportfolio.cols * k, m = j.cubeportfolio.cols * (k + 1) - 1) : (k = Math.floor(j.current / j.cubeportfolio.cols), l = Math.min(j.cubeportfolio.cols * (k + 1), j.counterTotal), m = Math.min(j.cubeportfolio.cols * (k + 2) - 1, j.counterTotal), f = Math.ceil((j.current + 1) / j.cubeportfolio.cols), g = Math.ceil(j.counterTotal / j.cubeportfolio.cols), j.lastColumn = f === g, d ? j.lastColumn && (j.top = j.lastColumnHeight) : (j.lastColumnHeight = j.cubeportfolio.height, j.top = j.lastColumnHeight)), j.matrice = [l, m], a.isFunction(j.options.singlePageInlineCallback) && j.options.singlePageInlineCallback.call(j, j.dataArray[j.current].url, j.dataArray[j.current].element)
            },
            _resizeSinglePageInline: function(c) {
                var d, e = this;
                c = c || !1, e.height = e.content.outerHeight(!0), e.cubeportfolio._layout(), e.cubeportfolio._processStyle(e.cubeportfolio.transition), c && e.wrap.removeClass("cbp-popup-loading"), e.cubeportfolio.$obj.addClass("cbp-popup-isOpening"), e.wrap.css({
                    height: e.height
                }), e.wrap.css({
                    top: e.top
                }), d = e.lastColumn ? e.height : 0, e.cubeportfolio._resizeMainContainer(e.cubeportfolio.transition, d), e.options.singlePageInlineInFocus && (e.scrollTop = a(b).scrollTop(), a("body,html").animate({
                    scrollTop: e.wrap.offset().top - 150
                }))
            },
            updateSinglePage: function(a) {
                var b, c = this;
                c.content.html(a), c.wrap.addClass("cbp-popup-ready"), c.wrap.removeClass("cbp-popup-loading"), c.counter && c.counter.text(c._getCounterMarkup(c.options.singlePageCounter, c.current + 1, c.counterTotal)), b = c.content.find(".cbp-slider"), b ? (c.slider = Object.create(h), c.slider._init(c, b)) : c.slider = null
            },
            updateSinglePageInline: function(a) {
                var b, c = this;
                c.content.html(a), c._loadSinglePageInline(), b = c.content.find(".cbp-slider"), b ? (c.slider = Object.create(h), c.slider._init(c, b)) : c.slider = null
            },
            _loadSinglePageInline: function() {
                var b, c, d, e = this,
                    g = [],
                    h = /url\((['"]?)(.*?)\1\)/g;
                if (d = e.wrap.children().css("backgroundImage"))
                    for (var i; i = h.exec(d);) g.push({
                        src: i[2]
                    });
                e.wrap.find("*").each(function() {
                    var b = a(this);
                    if (b.is("img:uncached") && g.push({
                            src: b.attr("src"),
                            element: b[0]
                        }), d = b.css("backgroundImage"))
                        for (var c; c = h.exec(d);) g.push({
                            src: c[2],
                            element: b[0]
                        })
                });
                var j = g.length,
                    k = 0;
                0 === j && e._resizeSinglePageInline(!0);
                var l = function() {
                    k++, k === j && e._resizeSinglePageInline(!0)
                };
                for (b = 0; j > b; b++) c = new Image, a(c).on("load" + f + " error" + f, l), c.src = g[b].src
            },
            isImage: function(b) {
                var c = this,
                    d = new Image;
                c.tooggleLoading(!0), a('<img src="' + b.src + '">').is("img:uncached") ? (a(d).on("load" + f + " error" + f, function() {
                    c.updateImagesMarkup(b.src, b.title, c._getCounterMarkup(c.options.lightboxCounter, c.current + 1, c.counterTotal)), c.tooggleLoading(!1)
                }), d.src = b.src) : (c.updateImagesMarkup(b.src, b.title, c._getCounterMarkup(c.options.lightboxCounter, c.current + 1, c.counterTotal)), c.tooggleLoading(!1))
            },
            isVimeo: function(a) {
                var b = this;
                b.updateVideoMarkup(a.src, a.title, b._getCounterMarkup(b.options.lightboxCounter, b.current + 1, b.counterTotal))
            },
            isYoutube: function(a) {
                var b = this;
                b.updateVideoMarkup(a.src, a.title, b._getCounterMarkup(b.options.lightboxCounter, b.current + 1, b.counterTotal))
            },
            isTed: function(a) {
                var b = this;
                b.updateVideoMarkup(a.src, a.title, b._getCounterMarkup(b.options.lightboxCounter, b.current + 1, b.counterTotal))
            },
            isSelfHosted: function(a) {
                var b = this;
                b.updateSelfHostedVideo(a.src, a.title, b._getCounterMarkup(b.options.lightboxCounter, b.current + 1, b.counterTotal))
            },
            _getCounterMarkup: function(a, b, c) {
                var d;
                return a.length ? (d = {
                    current: b,
                    total: c
                }, a.replace(/\{\{current}}|\{\{total}}/gi, function(a) {
                    return d[a.slice(2, -2)]
                })) : ""
            },
            updateSelfHostedVideo: function(a, b, c) {
                var d, e = this;
                e.wrap.addClass("cbp-popup-lightbox-isIframe");
                var f = '<div class="cbp-popup-lightbox-iframe"><video controls="controls" height="auto" style="width: 100%">';
                for (d = 0; d < a.length; d++) /(\.mp4)/i.test(a[d]) ? f += '<source src="' + a[d] + '" type="video/mp4">' : /(\.ogg)|(\.ogv)/i.test(a[d]) ? f += '<source src="' + a[d] + '" type="video/ogg">' : /(\.webm)/i.test(a[d]) && (f += '<source src="' + a[d] + '" type="video/webm">');
                f += 'Your browser does not support the video tag.</video><div class="cbp-popup-lightbox-bottom">' + (b ? '<div class="cbp-popup-lightbox-title">' + b + "</div>" : "") + c + "</div></div>", e.content.html(f), e.wrap.addClass("cbp-popup-ready"), e.preloadNearbyImages()
            },
            updateVideoMarkup: function(a, b, c) {
                var d = this;
                d.wrap.addClass("cbp-popup-lightbox-isIframe");
                var e = '<div class="cbp-popup-lightbox-iframe"><iframe src="' + a + '" frameborder="0" allowfullscreen scrolling="no"></iframe><div class="cbp-popup-lightbox-bottom">' + (b ? '<div class="cbp-popup-lightbox-title">' + b + "</div>" : "") + c + "</div></div>";
                d.content.html(e), d.wrap.addClass("cbp-popup-ready"), d.preloadNearbyImages()
            },
            updateImagesMarkup: function(a, b, c) {
                var d = this;
                d.wrap.removeClass("cbp-popup-lightbox-isIframe");
                var e = '<div class="cbp-popup-lightbox-figure"><img src="' + a + '" class="cbp-popup-lightbox-img" ' + d.dataActionImg + ' /><div class="cbp-popup-lightbox-bottom">' + (b ? '<div class="cbp-popup-lightbox-title">' + b + "</div>" : "") + c + "</div></div>";
                d.content.html(e), d.wrap.addClass("cbp-popup-ready"), d.resizeImage(), d.preloadNearbyImages()
            },
            next: function() {
                var a = this;
                a[a.type + "JumpTo"](1)
            },
            prev: function() {
                var a = this;
                a[a.type + "JumpTo"](-1)
            },
            lightboxJumpTo: function(a) {
                var b, c = this;
                c.current = c.getIndex(c.current + a), b = c.dataArray[c.current], c[b.type](b)
            },
            singlePageJumpTo: function(b) {
                var c = this;
                c.current = c.getIndex(c.current + b), a.isFunction(c.options.singlePageCallback) && (c.resetWrap(), c.wrap.scrollTop(0), c.wrap.addClass("cbp-popup-loading"), c.options.singlePageCallback.call(c, c.dataArray[c.current].url, c.dataArray[c.current].element), c.options.singlePageDeeplinking && (location.href = c.url + "#cbp=" + c.dataArray[c.current].url))
            },
            resetWrap: function() {
                var a = this;
                "singlePage" === a.type && a.options.singlePageDeeplinking && (location.href = a.url + "#")
            },
            getIndex: function(a) {
                var b = this;
                return a %= b.counterTotal, 0 > a && (a = b.counterTotal + a), a
            },
            close: function(c, d) {
                var e = this;
                e.isOpen = !1, "singlePageInline" === e.type ? "open" === c ? (e.wrap.addClass("cbp-popup-loading"), a(e.dataArray[e.current].element).closest(".cbp-item").removeClass("cbp-singlePageInline-active"), e.openSinglePageInline(d.blocks, d.currentBlock, d.fromOpen)) : (e.matrice = [-1, -1], e.cubeportfolio._layout(), e.cubeportfolio._processStyle(e.cubeportfolio.transition), e.cubeportfolio._resizeMainContainer(e.cubeportfolio.transition), e.wrap.css({
                    height: 0
                }), a(e.dataArray[e.current].element).parents(".cbp-item").removeClass("cbp-singlePageInline-active"), "ie8" === e.cubeportfolio.browser || "ie9" === e.cubeportfolio.browser ? (e.content.html(""), e.wrap.detach(), e.cubeportfolio.$obj.removeClass("cbp-popup-isOpening"), "promise" === c && a.isFunction(d.callback) && d.callback.call(e.cubeportfolio)) : e.wrap.one(e.cubeportfolio.transitionEnd, function() {
                    e.content.html(""), e.wrap.detach(), e.cubeportfolio.$obj.removeClass("cbp-popup-isOpening"), "promise" === c && a.isFunction(d.callback) && d.callback.call(e.cubeportfolio)
                }), e.options.singlePageInlineInFocus && a("body, html").animate({
                    scrollTop: e.scrollTop
                })) : "singlePage" === e.type ? (e.resetWrap(), a(b).scrollTop(e.scrollTop), setTimeout(function() {
                    e.stopScroll = !0, e.navigationWrap.css({
                        top: e.wrap.scrollTop()
                    }), e.wrap.removeClass("cbp-popup-singlePage-open cbp-popup-singlePage-sticky"), ("ie8" === e.cubeportfolio.browser || "ie9" === e.cubeportfolio.browser) && (e.content.html(""), e.wrap.detach(), a("html").css({
                        overflow: "",
                        paddingRight: ""
                    }), e.navigationWrap.removeAttr("style"))
                }, 0), e.wrap.one(e.cubeportfolio.transitionEnd, function() {
                    e.content.html(""), e.wrap.detach(), a("html").css({
                        overflow: "",
                        paddingRight: ""
                    }), e.navigationWrap.removeAttr("style")
                })) : (a("html").css({
                    overflow: "",
                    paddingRight: ""
                }), a(b).scrollTop(e.scrollTop), e.content.html(""), e.wrap.detach())
            },
            tooggleLoading: function(a) {
                var b = this;
                b.stopEvents = a, b.wrap[a ? "addClass" : "removeClass"]("cbp-popup-loading")
            },
            resizeImage: function() {
                if (this.isOpen) {
                    var c = a(b).height(),
                        d = a(".cbp-popup-content").find("img"),
                        e = parseInt(d.css("margin-top"), 10) + parseInt(d.css("margin-bottom"), 10);
                    d.css("max-height", c - e + "px")
                }
            },
            preloadNearbyImages: function() {
                var b, c, d = [],
                    e = this;
                d.push(e.getIndex(e.current + 1)), d.push(e.getIndex(e.current + 2)), d.push(e.getIndex(e.current + 3)), d.push(e.getIndex(e.current - 1)), d.push(e.getIndex(e.current - 2)), d.push(e.getIndex(e.current - 3));
                for (var f = d.length - 1; f >= 0; f--) "isImage" === e.dataArray[d[f]].type && (c = e.dataArray[d[f]].src, b = new Image, a('<img src="' + c + '">').is("img:uncached") && (b.src = c))
            }
        },
        h = {
            _init: function(b, c) {
                var d = this;
                d.current = 0, d.obj = c, d.$obj = a(c), d._createMarkup(), d._events()
            },
            _createMarkup: function() {
                var b, c, d = this;
                d.$ul = d.$obj.children(".cbp-slider-wrap"), d.$li = d.$ul.children(".cbp-slider-item"), d.$li.eq(0).addClass("cbp-slider-item-current"), d.$liLength = d.$li.length, b = a("<div/>", {
                    "class": "cbp-slider-arrowWrap"
                }).appendTo(d.$obj), a("<div/>", {
                    "class": "cbp-slider-arrowNext",
                    "data-action": "nextItem"
                }).appendTo(b), a("<div/>", {
                    "class": "cbp-slider-arrowPrev",
                    "data-action": "prevItem"
                }).appendTo(b), c = a("<div/>", {
                    "class": "cbp-slider-bulletWrap"
                }).appendTo(d.$obj);
                for (var e = 0; e < d.$liLength; e++) {
                    var f = 0 === e ? " cbp-slider-bullet-current" : "";
                    a("<div/>", {
                        "class": "cbp-slider-bullet" + f,
                        "data-action": "jumpToItem"
                    }).appendTo(c)
                }
            },
            _events: function() {
                var b = this;
                b.$obj.on("click" + f, function(c) {
                    var d = a(c.target).attr("data-action");
                    b[d] && (b[d](c), c.preventDefault())
                })
            },
            nextItem: function() {
                this.jumpTo(1)
            },
            prevItem: function() {
                this.jumpTo(-1)
            },
            jumpToItem: function(b) {
                var c = a(b.target),
                    d = c.index();
                this.jumpTo(d - this.current)
            },
            jumpTo: function(b) {
                var c, d = this,
                    e = this.$li.eq(this.current);
                this.current = this.getIndex(this.current + b), c = this.$li.eq(this.current), c.addClass("cbp-slider-item-next"), c.animate({
                    opacity: 1
                }, function() {
                    e.removeClass("cbp-slider-item-current"), c.removeClass("cbp-slider-item-next").addClass("cbp-slider-item-current").removeAttr("style");
                    var b = a(".cbp-slider-bullet");
                    b.removeClass("cbp-slider-bullet-current"), b.eq(d.current).addClass("cbp-slider-bullet-current")
                })
            },
            getIndex: function(a) {
                return a %= this.$liLength, 0 > a && (a = this.$liLength + a), a
            }
        },
        i = {
            _main: function(b, c, d) {
                var e = this;
                e.styleQueue = [], e.isAnimating = !1, e.defaultFilter = "*", e.registeredEvents = [], a.isFunction(d) && e._registerEvent("initFinish", d, !0), e._extendOptions(c), e.obj = b, e.$obj = a(b), e.width = e.$obj.width(), e.$obj.addClass("cbp cbp-loading"), e.$ul = e.$obj.children(), e.$ul.addClass("cbp-wrapper"), ("lazyLoading" === e.options.displayType || "fadeIn" === e.options.displayType) && e.$ul.css({
                    opacity: 0
                }), "fadeInToTop" === e.options.displayType && e.$ul.css({
                    opacity: 0,
                    marginTop: 30
                }), e._browserInfo(), e._initCSSandEvents(), e._prepareBlocks(), "lazyLoading" === e.options.displayType || "sequentially" === e.options.displayType || "bottomToTop" === e.options.displayType || "fadeInToTop" === e.options.displayType ? e._load() : e._beforeDisplay()
            },
            _extendOptions: function(b) {
                var c = this;
                b.hasOwnProperty("lightboxCounter") || b.lightboxShowCounter !== !1 || (b.lightboxCounter = ""), b.hasOwnProperty("singlePageCounter") || b.singlePageShowCounter !== !1 || (b.singlePageCounter = ""), c.options = a.extend({}, a.fn.cubeportfolio.options, b)
            },
            _browserInfo: function() {
                var a, c, d = this,
                    e = navigator.appVersion;
                d.browser = -1 !== e.indexOf("MSIE 8.") ? "ie8" : -1 !== e.indexOf("MSIE 9.") ? "ie9" : -1 !== e.indexOf("MSIE 10.") ? "ie10" : b.ActiveXObject || "ActiveXObject" in b ? "ie11" : /android/gi.test(e) ? "android" : /iphone|ipad|ipod/gi.test(e) ? "ios" : /chrome/gi.test(e) ? "chrome" : "", d.browser && d.$obj.addClass("cbp-" + d.browser), a = d._styleSupport("transition"), c = d._styleSupport("animation"), d.transition = d.transitionByFilter = a ? "css" : "animate", "animate" !== d.transition && (d.transitionEnd = {
                    WebkitTransition: "webkitTransitionEnd",
                    MozTransition: "transitionend",
                    OTransition: "oTransitionEnd otransitionend",
                    transition: "transitionend"
                }[a], d.animationEnd = {
                    WebkitAnimation: "webkitAnimationEnd",
                    MozAnimation: "Animationend",
                    OAnimation: "oAnimationEnd oanimationend",
                    animation: "animationend"
                }[c], d.supportCSSTransform = d._styleSupport("transform"), d.supportCSSTransform && d._cssHooks())
            },
            _styleSupport: function(a) {
                var b, d, e, f = a.charAt(0).toUpperCase() + a.slice(1),
                    g = ["Moz", "Webkit", "O", "ms"],
                    h = c.createElement("div");
                if (a in h.style) d = a;
                else
                    for (e = g.length - 1; e >= 0; e--)
                        if (b = g[e] + f, b in h.style) {
                            d = b;
                            break
                        } return h = null, d
            },
            _cssHooks: function() {
                function b(b, e, f) {
                    var g, h, i, j, k, l, m = a(b),
                        n = m.data("transformFn") || {},
                        o = {},
                        p = {};
                    o[f] = e, a.extend(n, o);
                    for (g in n) n.hasOwnProperty(g) && (h = n[g], p[g] = c[g](h));
                    i = p.translate || "", j = p.scale || "", l = p.skew || "", k = i + j + l, m.data("transformFn", n), b.style[d.supportCSSTransform] = k
                }
                var c, d = this;
                c = d._has3d() ? {
                    translate: function(a) {
                        return "translate3d(" + a[0] + "px, " + a[1] + "px, 0) "
                    },
                    scale: function(a) {
                        return "scale3d(" + a + ", " + a + ", 1) "
                    },
                    skew: function(a) {
                        return "skew(" + a[0] + "deg, " + a[1] + "deg) "
                    }
                } : {
                    translate: function(a) {
                        return "translate(" + a[0] + "px, " + a[1] + "px) "
                    },
                    scale: function(a) {
                        return "scale(" + a + ") "
                    },
                    skew: function(a) {
                        return "skew(" + a[0] + "deg, " + a[1] + "deg) "
                    }
                }, a.cssNumber.scale = !0, a.cssHooks.scale = {
                    set: function(a, c) {
                        "string" == typeof c && (c = parseFloat(c)), b(a, c, "scale")
                    },
                    get: function(b) {
                        var c = a.data(b, "transformFn");
                        return c && c.scale ? c.scale : 1
                    }
                }, a.fx.step.scale = function(b) {
                    a.cssHooks.scale.set(b.elem, b.now + b.unit)
                }, a.cssNumber.translate = !0, a.cssHooks.translate = {
                    set: function(a, c) {
                        b(a, c, "translate")
                    },
                    get: function(b) {
                        var c = a.data(b, "transformFn");
                        return c && c.translate ? c.translate : [0, 0]
                    }
                }, a.cssNumber.skew = !0, a.cssHooks.skew = {
                    set: function(a, c) {
                        b(a, c, "skew")
                    },
                    get: function(b) {
                        var c = a.data(b, "transformFn");
                        return c && c.skew ? c.skew : [0, 0]
                    }
                }
            },
            _has3d: function() {
                var a, e, f = c.createElement("p"),
                    g = {
                        webkitTransform: "-webkit-transform",
                        OTransform: "-o-transform",
                        msTransform: "-ms-transform",
                        MozTransform: "-moz-transform",
                        transform: "transform"
                    };
                c.body.insertBefore(f, null);
                for (a in g) g.hasOwnProperty(a) && f.style[a] !== d && (f.style[a] = "translate3d(1px,1px,1px)", e = b.getComputedStyle(f).getPropertyValue(g[a]));
                return c.body.removeChild(f), e !== d && e.length > 0 && "none" !== e
            },
            _prepareBlocks: function() {
                var a = this;
                a.blocks = a.$ul.children(".cbp-item"), a.blocksAvailable = a.blocks, a.blocks.wrapInner('<div class="cbp-item-wrapper"></div>'), a.options.caption && a._captionInit()
            },
            _captionInit: function() {
                var a = this;
                a.$obj.addClass("cbp-caption-" + a.options.caption), a["_" + a.options.caption + "Caption"]()
            },
            _captionDestroy: function() {
                var a = this;
                a.$obj.removeClass("cbp-caption-" + a.options.caption), a["_" + a.options.caption + "CaptionDestroy"]()
            },
            _noneCaption: function() {},
            _noneCaptionDestroy: function() {},
            _pushTopCaption: function() {
                var b = this;
                ("ie8" === b.browser || "ie9" === b.browser) && a(".cbp-caption").on("mouseenter" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap"),
                        d = b.find(".cbp-caption-activeWrap");
                    c.animate({
                        bottom: "100%"
                    }, "fast"), d.animate({
                        bottom: 0
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap"),
                        d = b.find(".cbp-caption-activeWrap");
                    c.animate({
                        bottom: 0
                    }, "fast"), d.animate({
                        bottom: "-100%"
                    }, "fast")
                })
            },
            _pushTopCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-defaultWrap").removeAttr("style"), c.find(".cbp-caption-activeWrap").removeAttr("style"))
            },
            _pushDownCaption: function() {
                var b = this;
                ("ie8" === b.browser || "ie9" === b.browser) && a(".cbp-caption").on("mouseenter" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap"),
                        d = b.find(".cbp-caption-activeWrap");
                    c.animate({
                        bottom: "-100%"
                    }, "fast"), d.animate({
                        bottom: 0
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap"),
                        d = b.find(".cbp-caption-activeWrap");
                    c.animate({
                        bottom: 0
                    }, "fast"), d.animate({
                        bottom: "100%"
                    }, "fast")
                })
            },
            _pushDownCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-defaultWrap").removeAttr("style"), c.find(".cbp-caption-activeWrap").removeAttr("style"))
            },
            _revealBottomCaption: function() {
                var b = this;
                ("ie8" === b.browser || "ie9" === b.browser) && a(".cbp-caption").on("mouseenter" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap");
                    c.animate({
                        bottom: "100%"
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap");
                    c.animate({
                        bottom: 0
                    }, "fast")
                })
            },
            _revealBottomCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-defaultWrap").removeAttr("style"))
            },
            _revealTopCaption: function() {
                var b = this;
                ("ie8" === b.browser || "ie9" === b.browser) && a(".cbp-caption").on("mouseenter" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap");
                    c.animate({
                        bottom: "-100%"
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap");
                    c.animate({
                        bottom: 0
                    }, "fast")
                })
            },
            _revealTopCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-defaultWrap").removeAttr("style"))
            },
            _overlayBottomRevealCaption: function() {
                var b = this;
                ("ie8" === b.browser || "ie9" === b.browser) && a(".cbp-caption").on("mouseenter" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap"),
                        d = b.find(".cbp-caption-activeWrap").height();
                    c.animate({
                        bottom: d
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap");
                    c.animate({
                        bottom: 0
                    }, "fast")
                })
            },
            _overlayBottomRevealCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-defaultWrap").removeAttr("style"))
            },
            _overlayBottomPushCaption: function() {
                var b = this;
                ("ie8" === b.browser || "ie9" === b.browser) && a(".cbp-caption").on("mouseenter" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap"),
                        d = b.find(".cbp-caption-activeWrap"),
                        e = d.height();
                    c.animate({
                        bottom: e
                    }, "fast"), d.animate({
                        bottom: 0
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap"),
                        d = b.find(".cbp-caption-activeWrap"),
                        e = d.height();
                    c.animate({
                        bottom: 0
                    }, "fast"), d.animate({
                        bottom: -e
                    }, "fast")
                })
            },
            _overlayBottomPushCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-defaultWrap").removeAttr("style"), c.find(".cbp-caption-activeWrap").removeAttr("style"))
            },
            _overlayBottomCaption: function() {
                var b = this;
                ("ie8" === b.browser || "ie9" === b.browser) && a(".cbp-caption").on("mouseenter" + f, function() {
                    a(this).find(".cbp-caption-activeWrap").animate({
                        bottom: 0
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    var b = a(this).find(".cbp-caption-activeWrap");
                    b.animate({
                        bottom: -b.height()
                    }, "fast")
                })
            },
            _overlayBottomCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-activeWrap").removeAttr("style"))
            },
            _moveRightCaption: function() {
                var b = this;
                ("ie8" === b.browser || "ie9" === b.browser) && a(".cbp-caption").on("mouseenter" + f, function() {
                    a(this).find(".cbp-caption-activeWrap").animate({
                        left: 0
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    var b = a(this).find(".cbp-caption-activeWrap");
                    b.animate({
                        left: -b.width()
                    }, "fast")
                })
            },
            _moveRightCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-activeWrap").removeAttr("style"))
            },
            _revealLeftCaption: function() {
                var b = this;
                ("ie8" === b.browser || "ie9" === b.browser) && a(".cbp-caption").on("mouseenter" + f, function() {
                    a(this).find(".cbp-caption-activeWrap").animate({
                        left: 0
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    var b = a(this).find(".cbp-caption-activeWrap");
                    b.animate({
                        left: b.width()
                    }, "fast")
                })
            },
            _revealLeftCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-activeWrap").removeAttr("style"))
            },
            _minimalCaption: function() {},
            _minimalCaptionDestroy: function() {},
            _fadeInCaption: function() {
                var b, c = this;
                ("ie8" === c.browser || "ie9" === c.browser) && (b = "ie9" === c.browser ? 1 : .8, a(".cbp-caption").on("mouseenter" + f, function() {
                    a(this).find(".cbp-caption-activeWrap").animate({
                        opacity: b
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    a(this).find(".cbp-caption-activeWrap").animate({
                        opacity: 0
                    }, "fast")
                }))
            },
            _fadeInCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-activeWrap").removeAttr("style"))
            },
            _overlayRightAlongCaption: function() {
                var b = this;
                ("ie8" === b.browser || "ie9" === b.browser) && a(".cbp-caption").on("mouseenter" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap"),
                        d = b.find(".cbp-caption-activeWrap");
                    c.animate({
                        left: d.width() / 2
                    }, "fast"), d.animate({
                        left: 0
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap"),
                        d = b.find(".cbp-caption-activeWrap");
                    c.animate({
                        left: 0
                    }, "fast"), d.animate({
                        left: -d.width()
                    }, "fast")
                })
            },
            _overlayRightAlongCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-defaultWrap").removeAttr("style"), c.find(".cbp-caption-activeWrap").removeAttr("style"))
            },
            _overlayBottomAlongCaption: function() {
                var b = this;
                ("ie8" === b.browser || "ie9" === b.browser) && a(".cbp-caption").on("mouseenter" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap"),
                        d = b.find(".cbp-caption-activeWrap");
                    c.animate({
                        bottom: d.height() / 2
                    }, "fast"), d.animate({
                        bottom: 0
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    var b = a(this),
                        c = b.find(".cbp-caption-defaultWrap"),
                        d = b.find(".cbp-caption-activeWrap");
                    c.animate({
                        bottom: 0
                    }, "fast"), d.animate({
                        bottom: -d.height()
                    }, "fast")
                })
            },
            _overlayBottomAlongCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-defaultWrap").removeAttr("style"), c.find(".cbp-caption-activeWrap").removeAttr("style"))
            },
            _zoomCaption: function() {
                var b, c = this;
                ("ie8" === c.browser || "ie9" === c.browser) && (b = "ie9" === c.browser ? 1 : .8, a(".cbp-caption").on("mouseenter" + f, function() {
                    a(this).find(".cbp-caption-activeWrap").animate({
                        opacity: b
                    }, "fast")
                }).on("mouseleave" + f, function() {
                    a(this).find(".cbp-caption-activeWrap").animate({
                        opacity: 0
                    }, "fast")
                }))
            },
            _zoomCaptionDestroy: function() {
                var b = this,
                    c = a(".cbp-caption");
                ("ie8" === b.browser || "ie9" === b.browser) && (c.off("mouseenter" + f + " mouseleave" + f), c.find(".cbp-caption-activeWrap").removeAttr("style"))
            },
            _initCSSandEvents: function() {
                var c, e, g, h, i = this;
                a(b).on("resize" + f, function() {
                    c && clearTimeout(c), c = setTimeout(function() {
                        if ("ie8" === i.browser) {
                            if (h = a(b).width(), g !== d && g === h) return;
                            g = h
                        }
                        i.$obj.removeClass("cbp-no-transition cbp-appendItems-loading"), "responsive" === i.options.gridAdjustment && i._responsiveLayout(), i._layout(), i._processStyle(i.transition), i._resizeMainContainer(i.transition), i.lightbox && i.lightbox.resizeImage(), i.singlePage && i.singlePage.options.singlePageStickyNavigation && (e = i.singlePage.wrap[0].clientWidth, e > 0 && (i.singlePage.navigationWrap.width(e), i.singlePage.navigation.width(e))), i.singlePageInline && i.singlePageInline.isOpen && i.singlePageInline.close()
                    }, 50)
                })
            },
            _load: function() {
                var b, c, d, e = this,
                    g = [],
                    h = /url\((['"]?)(.*?)\1\)/g;
                if (d = e.$obj.children().css("backgroundImage"))
                    for (var i; i = h.exec(d);) g.push({
                        src: i[2]
                    });
                e.$obj.find("*").each(function() {
                    var b = a(this);
                    if (b.is("img:uncached") && g.push({
                            src: b.attr("src"),
                            element: b[0]
                        }), d = b.css("backgroundImage"))
                        for (var c; c = h.exec(d);) g.push({
                            src: c[2],
                            element: b[0]
                        })
                });
                var j = g.length,
                    k = 0;
                0 === j && e._beforeDisplay();
                var l = function() {
                    return k++, k === j ? (e._beforeDisplay(), !1) : void 0
                };
                for (b = 0; j > b; b++) c = new Image, a(c).on("load" + f + " error" + f, l), c.src = g[b].src
            },
            _beforeDisplay: function() {
                var a = this;
                a.options.animationType && (a["_" + a.options.animationType + "Init"] && a["_" + a.options.animationType + "Init"](), a.$obj.addClass("cbp-animation-" + a.options.animationType), a.localColumnWidth = a.blocks.eq(0).outerWidth() + a.options.gapVertical, a._filterFromUrl(), "" === a.options.defaultFilter || "*" === a.options.defaultFilter ? a._display() : a.filter(a.options.defaultFilter, function() {
                    a._display()
                }, a))
            },
            _filterFromUrl: function() {
                var a = this,
                    b = /#cbpf=(.*?)([#|?&]|$)/gi.exec(location.href);
                null !== b && (a.options.defaultFilter = b[1])
            },
            _display: function() {
                var b, c, d = this;
                "responsive" === d.options.gridAdjustment && d._responsiveLayout(), d._layout(), d._processStyle("css"), d._resizeMainContainer("css"), ("lazyLoading" === d.options.displayType || "fadeIn" === d.options.displayType) && d.$ul.animate({
                    opacity: 1
                }, d.options.displayTypeSpeed), "fadeInToTop" === d.options.displayType && d.$ul.animate({
                    opacity: 1,
                    marginTop: 0
                }, d.options.displayTypeSpeed, function() {
                    d.$ul.css({
                        marginTop: 0
                    }), d.$ulClone.css({
                        marginTop: 0
                    })
                }), "sequentially" === d.options.displayType && (b = 0, d.blocks.css("opacity", 0), function e() {
                    c = d.blocksAvailable.eq(b++), c.length && (c.animate({
                        opacity: 1
                    }), setTimeout(e, d.options.displayTypeSpeed))
                }()), "bottomToTop" === d.options.displayType && (b = 0, d.blocks.css({
                    opacity: 0,
                    marginTop: 80
                }), function h() {
                    c = d.blocksAvailable.eq(b++), c.length ? (c.animate({
                        opacity: 1,
                        marginTop: 0
                    }, 400), setTimeout(h, d.options.displayTypeSpeed)) : (d.blocks.css({
                        marginTop: 0
                    }), d.blocksClone && d.blocksClone.css({
                        marginTop: 0
                    }))
                }()), setTimeout(function() {
                    d.$obj.removeClass("cbp-loading"), d._triggerEvent("initFinish"), d.$obj.trigger("initComplete"), d.$obj.addClass("cbp-ready")
                }, 0), d.lightbox = null, d.$obj.find(d.options.lightboxDelegate) && (d.lightbox = Object.create(g), d.lightbox.init(d, "lightbox"), a("body").on("click" + f, d.options.lightboxDelegate, function(b) {
                    b.preventDefault();
                    var c, e = a(this);
                    e.closest(d.$obj).length ? d.lightbox.openLightbox(d.blocksAvailable.find(d.options.lightboxDelegate), this) : (c = e.data("cbpLightbox"), c ? d.lightbox.openLightbox(a(d.options.lightboxDelegate).filter("[data-cbp-lightbox=" + c + "]"), this) : d.lightbox.openLightbox(e, this))
                })), d.singlePage = null, d.$obj.find(d.options.singlePageDelegate) && (d.singlePage = Object.create(g), d.singlePage.init(d, "singlePage"), a("body").on("click" + f, d.options.singlePageDelegate, function(b) {
                    b.preventDefault();
                    var c, e = a(this);
                    e.closest(d.$obj).length ? d.singlePage.openSinglePage(d.blocksAvailable.find(d.options.singlePageDelegate), this) : (c = e.data("cbpSinglepage"), c ? d.singlePage.openSinglePage(a(d.options.singlePageDelegate).filter("[data-cbp-singlePage=" + c + "]"), this) : d.singlePage.openSinglePage(e, this))
                })), d.singlePageInline = null, d.$obj.find(d.options.singlePageInlineDelegate) && (d.singlePageInline = Object.create(g), d.singlePageInline.init(d, "singlePageInline"), d.$obj.on("click" + f, d.options.singlePageInlineDelegate, function(a) {
                    a.preventDefault(), d.singlePageInline.openSinglePageInline(d.blocksAvailable, this)
                }))
            },
            _layout: function() {
                var b = this;
                b._layoutReset(), b.blocksAvailable.each(function(c, d) {
                    var e = a(d),
                        f = Math.ceil(e.outerWidth() / b.localColumnWidth),
                        g = 0;
                    if (f = Math.min(f, b.cols), b.singlePageInline && c >= b.singlePageInline.matrice[0] && c <= b.singlePageInline.matrice[1] && (g = b.singlePageInline.height), 1 === f) b._placeBlocks(e, b.colVert, g);
                    else {
                        var h, i, j = b.cols + 1 - f,
                            k = [];
                        for (i = 0; j > i; i++) h = b.colVert.slice(i, i + f), k[i] = Math.max.apply(Math, h);
                        b._placeBlocks(e, k, g)
                    }
                }), b.$obj.removeClass(function(a, b) {
                    return (b.match(/\bcbp-cols-\d+/gi) || []).join(" ")
                }), b.$obj.addClass("cbp-cols-" + b.cols)
            },
            _layoutReset: function() {
                var a, b = this;
                for ("alignCenter" === b.options.gridAdjustment ? (b.$obj.attr("style", ""), b.width = b.$obj.width(), b.cols = Math.max(Math.floor((b.width + b.options.gapVertical) / b.localColumnWidth), 1), b.width = b.cols * b.localColumnWidth - b.options.gapVertical, b.$obj.css("max-width", b.width)) : (b.width = b.$obj.width(), b.cols = Math.max(Math.floor((b.width + b.options.gapVertical) / b.localColumnWidth), 1)), b.colVert = [], a = b.cols; a--;) b.colVert.push(0)
            },
            _responsiveLayout: function() {
                var b, c, d = this;
                d.columnWidthCache ? d.localColumnWidth = d.columnWidthCache : d.columnWidthCache = d.localColumnWidth, d.width = d.$obj.outerWidth() + d.options.gapVertical, d.cols = Math.max(Math.round(d.width / d.localColumnWidth), 1), c = d.width - d.options.gapVertical * d.cols, d.localColumnWidth = parseInt(c / d.cols, 10) + d.options.gapVertical, b = d.localColumnWidth / d.columnWidthCache, d.blocks.each(function() {
                    var c = a(this),
                        e = a.data(this, "cbp-wxh");
                    e || (e = a.data(this, "cbp-wxh", {
                        width: c.outerWidth(),
                        height: c.outerHeight()
                    })), c.css("width", d.localColumnWidth - d.options.gapVertical), c.css("height", Math.floor(e.height * b))
                }), d.blocksClone && d.blocksClone.each(function() {
                    var c = a(this),
                        e = a.data(this, "cbp-wxh");
                    e || (e = a.data(this, "cbp-wxh", {
                        width: c.outerWidth(),
                        height: c.outerHeight()
                    })), c.css("width", d.localColumnWidth - d.options.gapVertical), c.css("height", Math.floor(e.height * b))
                })
            },
            _resizeMainContainer: function(a, b) {
                var c = this;
                b = b || 0, c.height = Math.max.apply(Math, c.colVert) + b, c.$obj[a]({
                    height: c.height - c.options.gapHorizontal
                }, 400)
            },
            _processStyle: function(a) {
                for (var b = this, c = b.styleQueue.length - 1; c >= 0; c--) b.styleQueue[c].$el[a](b.styleQueue[c].style);
                b.styleQueue = []
            },
            _placeBlocks: function(a, b, c) {
                var d, e, f, g, h, i, j = this,
                    k = Math.min.apply(Math, b),
                    l = 0;
                for (h = 0, i = b.length; i > h; h++)
                    if (b[h] === k) {
                        l = h;
                        break
                    }
                for (j.singlePageInline && 0 !== c && (j.singlePageInline.top = k), k += c, d = Math.round(j.localColumnWidth * l), e = Math.round(k), j.styleQueue.push({
                        $el: a,
                        style: j.supportCSSTransform ? j._withCSS3(d, e) : j._withCSS2(d, e)
                    }), f = k + a.outerHeight() + j.options.gapHorizontal, g = j.cols + 1 - i, h = 0; g > h; h++) j.colVert[l + h] = f
            },
            _withCSS2: function(a, b) {
                return {
                    left: a,
                    top: b
                }
            },
            _withCSS3: function(a, b) {
                return {
                    translate: [a, b]
                }
            },
            _duplicateContent: function(a) {
                var b = this;
                b.$ulClone = b.$ul.clone(), b.blocksClone = b.$ulClone.children(), b.$ulClone.css(a), b.ulHidden = "clone", b.$obj.append(b.$ulClone)
            },
            _fadeOutFilter: function(a, b, c) {
                var d = this;
                "*" !== c && (b = b.filter(c), a = d.blocks.not(".cbp-item-hidden").not(c).addClass("cbp-item-hidden")), b.removeClass("cbp-item-hidden"), d.blocksAvailable = d.blocks.filter(c), a.length && d.styleQueue.push({
                    $el: a,
                    style: {
                        opacity: 0
                    }
                }), b.length && d.styleQueue.push({
                    $el: b,
                    style: {
                        opacity: 1
                    }
                }), d._layout(), d._processStyle(d.transitionByFilter), d._resizeMainContainer(d.transition), setTimeout(function() {
                    d._filterFinish()
                }, 400)
            },
            _quicksandFilter: function(a, b, c) {
                var d = this;
                "*" !== c && (b = b.filter(c), a = d.blocks.not(".cbp-item-hidden").not(c).addClass("cbp-item-hidden")), b.removeClass("cbp-item-hidden"), d.blocksAvailable = d.blocks.filter(c), a.length && d.styleQueue.push({
                    $el: a,
                    style: {
                        scale: .01,
                        opacity: 0
                    }
                }), b.length && d.styleQueue.push({
                    $el: b,
                    style: {
                        scale: 1,
                        opacity: 1
                    }
                }), d._layout(), d._processStyle(d.transitionByFilter), d._resizeMainContainer(d.transition), setTimeout(function() {
                    d._filterFinish()
                }, 400)
            },
            _flipOutFilter: function(a, b, c) {
                var d = this;
                "*" !== c && (b = b.filter(c), a = d.blocks.not(".cbp-item-hidden").not(c).addClass("cbp-item-hidden")), b.removeClass("cbp-item-hidden"), d.blocksAvailable = d.blocks.filter(c), a.length && ("ie8" === d.browser || "ie9" === d.browser ? d.styleQueue.push({
                    $el: a,
                    style: {
                        opacity: 0
                    }
                }) : a.find(".cbp-item-wrapper").removeClass("cbp-animation-flipOut-in").addClass("cbp-animation-flipOut-out")), b.length && ("ie8" === d.browser || "ie9" === d.browser ? d.styleQueue.push({
                    $el: b,
                    style: {
                        opacity: 1
                    }
                }) : b.find(".cbp-item-wrapper").removeClass("cbp-animation-flipOut-out").addClass("cbp-animation-flipOut-in")), d._layout(), d._processStyle(d.transitionByFilter), d._resizeMainContainer(d.transition), setTimeout(function() {
                    d._filterFinish()
                }, 400)
            },
            _flipBottomFilter: function(a, b, c) {
                var d = this;
                "*" !== c && (b = b.filter(c), a = d.blocks.not(".cbp-item-hidden").not(c).addClass("cbp-item-hidden")), b.removeClass("cbp-item-hidden"), d.blocksAvailable = d.blocks.filter(c), a.length && ("ie8" === d.browser || "ie9" === d.browser ? d.styleQueue.push({
                    $el: a,
                    style: {
                        opacity: 0
                    }
                }) : a.find(".cbp-item-wrapper").removeClass("cbp-animation-flipBottom-in").addClass("cbp-animation-flipBottom-out")), b.length && ("ie8" === d.browser || "ie9" === d.browser ? d.styleQueue.push({
                    $el: b,
                    style: {
                        opacity: 1
                    }
                }) : b.find(".cbp-item-wrapper").removeClass("cbp-animation-flipBottom-out").addClass("cbp-animation-flipBottom-in")), d._layout(), d._processStyle(d.transitionByFilter), d._resizeMainContainer(d.transition), setTimeout(function() {
                    d._filterFinish()
                }, 400)
            },
            _scaleSidesFilter: function(a, b, c) {
                var d = this;
                "*" !== c && (b = b.filter(c), a = d.blocks.not(".cbp-item-hidden").not(c).addClass("cbp-item-hidden")), b.removeClass("cbp-item-hidden"), d.blocksAvailable = d.blocks.filter(c), a.length && ("ie8" === d.browser || "ie9" === d.browser ? d.styleQueue.push({
                    $el: a,
                    style: {
                        opacity: 0
                    }
                }) : a.find(".cbp-item-wrapper").removeClass("cbp-animation-scaleSides-in").addClass("cbp-animation-scaleSides-out")), b.length && ("ie8" === d.browser || "ie9" === d.browser ? d.styleQueue.push({
                    $el: b,
                    style: {
                        opacity: 1
                    }
                }) : b.find(".cbp-item-wrapper").removeClass("cbp-animation-scaleSides-out").addClass("cbp-animation-scaleSides-in")), d._layout(), d._processStyle(d.transitionByFilter), d._resizeMainContainer(d.transition), setTimeout(function() {
                    d._filterFinish()
                }, 400)
            },
            _skewFilter: function(a, b, c) {
                var d = this;
                "*" !== c && (b = b.filter(c), a = d.blocks.not(".cbp-item-hidden").not(c).addClass("cbp-item-hidden")), b.removeClass("cbp-item-hidden"), d.blocksAvailable = d.blocks.filter(c), a.length && d.styleQueue.push({
                    $el: a,
                    style: {
                        skew: [50, 0],
                        scale: .01,
                        opacity: 0
                    }
                }), b.length && d.styleQueue.push({
                    $el: b,
                    style: {
                        skew: [0, 0],
                        scale: 1,
                        opacity: 1
                    }
                }), d._layout(), d._processStyle(d.transitionByFilter), d._resizeMainContainer(d.transition), setTimeout(function() {
                    d._filterFinish()
                }, 400)
            },
            _sequentiallyInit: function() {
                this.transitionByFilter = "css"
            },
            _sequentiallyFilter: function(a, b, c) {
                var d = this,
                    e = d.blocksAvailable;
                d.blocksAvailable = d.blocks.filter(c), d.$obj.addClass("cbp-no-transition"), "ie8" === d.browser || "ie9" === d.browser ? e[d.transition]({
                    top: "-=30",
                    opacity: 0
                }, 300) : e[d.transition]({
                    top: -30,
                    opacity: 0
                }), setTimeout(function() {
                    "*" !== c && (b = b.filter(c), a = d.blocks.not(".cbp-item-hidden").not(c).addClass("cbp-item-hidden")), b.removeClass("cbp-item-hidden"), a.length && a.css({
                        display: "none"
                    }), b.length && b.css("display", "block"), d._layout(), d._processStyle(d.transitionByFilter), d._resizeMainContainer(d.transition), ("ie8" === d.browser || "ie9" === d.browser) && d.blocksAvailable.css("top", "-=30");
                    var e, f = 0;
                    ! function g() {
                        e = d.blocksAvailable.eq(f++), e.length ? (e[d.transition]("ie8" === d.browser || "ie9" === d.browser ? {
                            top: "+=30",
                            opacity: 1
                        } : {
                            top: 0,
                            opacity: 1
                        }), setTimeout(g, 130)) : setTimeout(function() {
                            d._filterFinish()
                        }, 600)
                    }()
                }, 600)
            },
            _fadeOutTopInit: function() {
                this.transitionByFilter = "css"
            },
            _fadeOutTopFilter: function(a, b, c) {
                var d = this;
                d.blocksAvailable = d.blocks.filter(c), "ie8" === d.browser || "ie9" === d.browser ? d.$ul[d.transition]({
                    top: -30,
                    opacity: 0
                }, 350) : d.$ul[d.transition]({
                    top: -30,
                    opacity: 0
                }), d.$obj.addClass("cbp-no-transition"), setTimeout(function() {
                    "*" !== c && (b = b.filter(c), a = d.blocks.not(".cbp-item-hidden").not(c).addClass("cbp-item-hidden")), b.removeClass("cbp-item-hidden"), a.length && a.css("opacity", 0), b.length && b.css("opacity", 1), d._layout(), d._processStyle(d.transitionByFilter), d._resizeMainContainer(d.transition), "ie8" === d.browser || "ie9" === d.browser ? d.$ul[d.transition]({
                        top: 0,
                        opacity: 1
                    }, 350) : d.$ul[d.transition]({
                        top: 0,
                        opacity: 1
                    }), setTimeout(function() {
                        d._filterFinish()
                    }, 400)
                }, 400)
            },
            _boxShadowInit: function() {
                var a = this;
                "ie8" === a.browser || "ie9" === a.browser ? a.options.animationType = "fadeOut" : a.blocksAvailable.append('<div class="cbp-animation-boxShadowMask"></div>')
            },
            _boxShadowFilter: function(a, b, c) {
                var d = this;
                "*" !== c && (b = b.filter(c), a = d.blocks.not(".cbp-item-hidden").not(c).addClass("cbp-item-hidden")), b.removeClass("cbp-item-hidden");
                var e = d.blocks.find(".cbp-animation-boxShadowMask");
                e.addClass("cbp-animation-boxShadowShow"), e.removeClass("cbp-animation-boxShadowActive cbp-animation-boxShadowInactive"), d.blocksAvailable = d.blocks.filter(c);
                var f = {};
                a.length && (a.find(".cbp-animation-boxShadowMask").addClass("cbp-animation-boxShadowActive"), d.styleQueue.push({
                    $el: a,
                    style: {
                        opacity: 0
                    }
                }), f = a.last()), b.length && (b.find(".cbp-animation-boxShadowMask").addClass("cbp-animation-boxShadowInactive"), d.styleQueue.push({
                    $el: b,
                    style: {
                        opacity: 1
                    }
                }), f = b.last()), d._layout(), f.length ? f.one(d.transitionEnd, function() {
                    e.removeClass("cbp-animation-boxShadowShow"), d._filterFinish()
                }) : (e.removeClass("cbp-animation-boxShadowShow"), d._filterFinish()), d._processStyle(d.transitionByFilter), d._resizeMainContainer(d.transition)
            },
            _bounceLeftInit: function() {
                var a = this;
                a._duplicateContent({
                    left: "-100%",
                    opacity: 0
                }), a.transitionByFilter = "css", a.$ul.addClass("cbp-wrapper-front")
            },
            _bounceLeftFilter: function(a, b, c) {
                var d, e, f, g = this;
                g.$obj.addClass("cbp-no-transition"), "clone" === g.ulHidden ? (g.ulHidden = "first", d = g.$ulClone, f = g.$ul, e = g.blocksClone) : (g.ulHidden = "clone", d = g.$ul, f = g.$ulClone, e = g.blocks), b = e.filter(".cbp-item-hidden"), "*" !== c && (b = b.filter(c), e.not(".cbp-item-hidden").not(c).addClass("cbp-item-hidden")), b.removeClass("cbp-item-hidden"), g.blocksAvailable = e.filter(c), g._layout(), f[g.transition]({
                    left: "-100%",
                    opacity: 0
                }).removeClass("cbp-wrapper-front").addClass("cbp-wrapper-back"), d[g.transition]({
                    left: 0,
                    opacity: 1
                }).addClass("cbp-wrapper-front").removeClass("cbp-wrapper-back"), g._processStyle(g.transitionByFilter), g._resizeMainContainer(g.transition), setTimeout(function() {
                    g._filterFinish()
                }, 400)
            },
            _bounceTopInit: function() {
                var a = this;
                a._duplicateContent({
                    top: "-100%",
                    opacity: 0
                }), a.transitionByFilter = "css", a.$ul.addClass("cbp-wrapper-front")
            },
            _bounceTopFilter: function(a, b, c) {
                var d, e, f, g = this;
                g.$obj.addClass("cbp-no-transition"), "clone" === g.ulHidden ? (g.ulHidden = "first", d = g.$ulClone, f = g.$ul, e = g.blocksClone) : (g.ulHidden = "clone", d = g.$ul, f = g.$ulClone, e = g.blocks), b = e.filter(".cbp-item-hidden"), "*" !== c && (b = b.filter(c), e.not(".cbp-item-hidden").not(c).addClass("cbp-item-hidden")), b.removeClass("cbp-item-hidden"), g.blocksAvailable = e.filter(c), g._layout(), f[g.transition]({
                    top: "-100%",
                    opacity: 0
                }).removeClass("cbp-wrapper-front").addClass("cbp-wrapper-back"), d[g.transition]({
                    top: 0,
                    opacity: 1
                }).addClass("cbp-wrapper-front").removeClass("cbp-wrapper-back"), g._processStyle(g.transitionByFilter), g._resizeMainContainer(g.transition), setTimeout(function() {
                    g._filterFinish()
                }, 400)
            },
            _bounceBottomInit: function() {
                var a = this;
                a._duplicateContent({
                    top: "100%",
                    opacity: 0
                }), a.transitionByFilter = "css"
            },
            _bounceBottomFilter: function(a, b, c) {
                var d, e, f, g = this;
                g.$obj.addClass("cbp-no-transition"), "clone" === g.ulHidden ? (g.ulHidden = "first", d = g.$ulClone, f = g.$ul, e = g.blocksClone) : (g.ulHidden = "clone", d = g.$ul, f = g.$ulClone, e = g.blocks), b = e.filter(".cbp-item-hidden"), "*" !== c && (b = b.filter(c), e.not(".cbp-item-hidden").not(c).addClass("cbp-item-hidden")), b.removeClass("cbp-item-hidden"), g.blocksAvailable = e.filter(c), g._layout(), f[g.transition]({
                    top: "100%",
                    opacity: 0
                }).removeClass("cbp-wrapper-front").addClass("cbp-wrapper-back"), d[g.transition]({
                    top: 0,
                    opacity: 1
                }).addClass("cbp-wrapper-front").removeClass("cbp-wrapper-back"), g._processStyle(g.transitionByFilter), g._resizeMainContainer(g.transition), setTimeout(function() {
                    g._filterFinish()
                }, 400)
            },
            _moveLeftInit: function() {
                var a = this;
                a._duplicateContent({
                    left: "100%",
                    opacity: 0
                }), a.$ulClone.addClass("no-trans"), a.transitionByFilter = "css"
            },
            _moveLeftFilter: function(a, b, c) {
                var d, e, f, g = this;
                "*" !== c && (b = b.filter(c)), b.removeClass("cbp-item-hidden"), g.$obj.addClass("cbp-no-transition"), "clone" === g.ulHidden ? (g.ulHidden = "first", d = g.$ulClone, f = g.$ul, e = g.blocksClone) : (g.ulHidden = "clone", d = g.$ul, f = g.$ulClone, e = g.blocks), e.css("opacity", 0), e.addClass("cbp-item-hidden"), g.blocksAvailable = e.filter(c), g.blocksAvailable.css("opacity", 1), g.blocksAvailable.removeClass("cbp-item-hidden"), g._layout(), f[g.transition]({
                    left: "-100%",
                    opacity: 0
                }), d.removeClass("no-trans"), "css" === g.transition ? (d[g.transition]({
                    left: 0,
                    opacity: 1
                }), f.one(g.transitionEnd, function() {
                    f.addClass("no-trans").css({
                        left: "100%",
                        opacity: 0
                    }), g._filterFinish()
                })) : d[g.transition]({
                    left: 0,
                    opacity: 1
                }, function() {
                    f.addClass("no-trans").css({
                        left: "100%",
                        opacity: 0
                    }), g._filterFinish()
                }), g._processStyle(g.transitionByFilter), g._resizeMainContainer(g.transition)
            },
            _slideLeftInit: function() {
                var a = this;
                a._duplicateContent({}), a.$ul.addClass("cbp-wrapper-front"), a.$ulClone.css("opacity", 0), a.transitionByFilter = "css"
            },
            _slideLeftFilter: function(a, b, c) {
                var d, e, f, g, h = this;
                h.blocks.show(), h.blocksClone.show(), "*" !== c && (b = b.filter(c)), b.removeClass("cbp-item-hidden"), h.$obj.addClass("cbp-no-transition"), h.blocks.find(".cbp-item-wrapper").removeClass("cbp-animation-slideLeft-out cbp-animation-slideLeft-in"), h.blocksClone.find(".cbp-item-wrapper").removeClass("cbp-animation-slideLeft-out cbp-animation-slideLeft-in"), h.$ul.css({
                    opacity: 1
                }), h.$ulClone.css({
                    opacity: 1
                }), "clone" === h.ulHidden ? (h.ulHidden = "first", e = h.blocks, f = h.blocksClone, d = h.blocksClone, h.$ul.removeClass("cbp-wrapper-front"), h.$ulClone.addClass("cbp-wrapper-front")) : (h.ulHidden = "clone", e = h.blocksClone, f = h.blocks, d = h.blocks, h.$ul.addClass("cbp-wrapper-front"), h.$ulClone.removeClass("cbp-wrapper-front")), d.css("opacity", 0), d.addClass("cbp-item-hidden"), h.blocksAvailable = d.filter(c), h.blocksAvailable.css({
                    opacity: 1
                }), h.blocksAvailable.removeClass("cbp-item-hidden"), h._layout(), "css" === h.transition ? (e.find(".cbp-item-wrapper").addClass("cbp-animation-slideLeft-out"), f.find(".cbp-item-wrapper").addClass("cbp-animation-slideLeft-in"), g = e.find(".cbp-item-wrapper").last(), g.length ? g.one(h.animationEnd, function() {
                    h._filterFinish()
                }) : h._filterFinish()) : (e.find(".cbp-item-wrapper").animate({
                    left: "-100%"
                }, 400, function() {
                    h._filterFinish()
                }), f.find(".cbp-item-wrapper").css("left", "100%"), f.find(".cbp-item-wrapper").animate({
                    left: 0
                }, 400)), h._processStyle(h.transitionByFilter), h._resizeMainContainer("animate")
            },
            _slideDelayInit: function() {
                this._wrapperFilterInit()
            },
            _slideDelayFilter: function(a, b, c) {
                this._wrapperFilter(a, b, c, "slideDelay", !0)
            },
            _3dflipInit: function() {
                this._wrapperFilterInit()
            },
            _3dflipFilter: function(a, b, c) {
                this._wrapperFilter(a, b, c, "3dflip", !0)
            },
            _rotateSidesInit: function() {
                this._wrapperFilterInit()
            },
            _rotateSidesFilter: function(a, b, c) {
                this._wrapperFilter(a, b, c, "rotateSides", !0)
            },
            _flipOutDelayInit: function() {
                this._wrapperFilterInit()
            },
            _flipOutDelayFilter: function(a, b, c) {
                this._wrapperFilter(a, b, c, "flipOutDelay", !1)
            },
            _foldLeftInit: function() {
                this._wrapperFilterInit()
            },
            _foldLeftFilter: function(a, b, c) {
                this._wrapperFilter(a, b, c, "foldLeft", !0)
            },
            _unfoldInit: function() {
                this._wrapperFilterInit()
            },
            _unfoldFilter: function(a, b, c) {
                this._wrapperFilter(a, b, c, "unfold", !0)
            },
            _scaleDownInit: function() {
                this._wrapperFilterInit()
            },
            _scaleDownFilter: function(a, b, c) {
                this._wrapperFilter(a, b, c, "scaleDown", !0)
            },
            _frontRowInit: function() {
                this._wrapperFilterInit()
            },
            _frontRowFilter: function(a, b, c) {
                this._wrapperFilter(a, b, c, "frontRow", !0)
            },
            _rotateRoomInit: function() {
                this._wrapperFilterInit()
            },
            _rotateRoomFilter: function(a, b, c) {
                this._wrapperFilter(a, b, c, "rotateRoom", !0)
            },
            _wrapperFilterInit: function() {
                var a = this;
                a._duplicateContent({}), a.$ul.addClass("cbp-wrapper-front"), a.$ulClone.css("opacity", 0), a.transitionByFilter = "css"
            },
            _wrapperFilter: function(b, c, d, e, f) {
                var g, h, i, j, k = this;
                if (k.blocks.show(), k.blocksClone.show(), "*" !== d && (c = c.filter(d)), c.removeClass("cbp-item-hidden"), k.$obj.addClass("cbp-no-transition"), k.blocks.find(".cbp-item-wrapper").removeClass("cbp-animation-" + e + "-out cbp-animation-" + e + "-in cbp-animation-" + e + "-fadeOut").css("style", ""), k.blocksClone.find(".cbp-item-wrapper").removeClass("cbp-animation-" + e + "-out cbp-animation-" + e + "-in cbp-animation-" + e + "-fadeOut").css("style", ""), k.$ul.css({
                        opacity: 1
                    }), k.$ulClone.css({
                        opacity: 1
                    }), "clone" === k.ulHidden ? (k.ulHidden = "first", g = k.blocksClone, k.$ul.removeClass("cbp-wrapper-front"), k.$ulClone.addClass("cbp-wrapper-front")) : (k.ulHidden = "clone", g = k.blocks, k.$ul.addClass("cbp-wrapper-front"), k.$ulClone.removeClass("cbp-wrapper-front")), h = k.blocksAvailable, g.css("opacity", 0), g.addClass("cbp-item-hidden"), k.blocksAvailable = g.filter(d), k.blocksAvailable.css({
                        opacity: 1
                    }), k.blocksAvailable.removeClass("cbp-item-hidden"), i = k.blocksAvailable, k._layout(), "css" === k.transition) {
                    var l = 0,
                        m = 0;
                    i.each(function(b, c) {
                        a(c).find(".cbp-item-wrapper").addClass("cbp-animation-" + e + "-in").css("animation-delay", m / 20 + "s"), m++
                    }), h.each(function(b, c) {
                        l >= m && f ? a(c).find(".cbp-item-wrapper").addClass("cbp-animation-" + e + "-fadeOut") : a(c).find(".cbp-item-wrapper").addClass("cbp-animation-" + e + "-out").css("animation-delay", l / 20 + "s"), l++
                    }), j = h.find(".cbp-item-wrapper").first(), j.length ? j.one(k.animationEnd, function() {
                        k._filterFinish(), ("ie10" === k.browser || "ie11" === k.browser) && setTimeout(function() {
                            a(".cbp-item-wrapper").removeClass("cbp-animation-" + e + "-in")
                        }, 300)
                    }) : (k._filterFinish(), ("ie10" === k.browser || "ie11" === k.browser) && setTimeout(function() {
                        a(".cbp-item-wrapper").removeClass("cbp-animation-" + e + "-in")
                    }, 300))
                } else h.find(".cbp-item-wrapper").animate({
                    left: "-100%"
                }, 400, function() {
                    k._filterFinish()
                }), i.find(".cbp-item-wrapper").css("left", "100%"), i.find(".cbp-item-wrapper").animate({
                    left: 0
                }, 400);
                k._processStyle(k.transitionByFilter), k._resizeMainContainer("animate")
            },
            _filterFinish: function() {
                var a = this;
                a.isAnimating = !1, a._triggerEvent("filterFinish"), a.$obj.trigger("filterComplete")
            },
            _registerEvent: function(a, b, c) {
                var d = this;
                d.registeredEvents[a] || (d.registeredEvents[a] = [], d.registeredEvents.push(a)), d.registeredEvents[a].push({
                    func: b,
                    oneTime: c || !1
                })
            },
            _triggerEvent: function(a) {
                var b = this;
                if (b.registeredEvents[a])
                    for (var c = b.registeredEvents[a].length - 1; c >= 0; c--) b.registeredEvents[a][c].func.call(b), b.registeredEvents[a][c].oneTime && b.registeredEvents[a].splice(c, 1)
            },
            init: function(b, c) {
                var d = a.data(this, "cubeportfolio");
                if (d) throw new Error("cubeportfolio is already initialized. Please destroy it before initialize again!");
                d = a.data(this, "cubeportfolio", Object.create(i)), d._main(this, b, c)
            },
            destroy: function(c) {
                var d = a.data(this, "cubeportfolio");
                if (!d) throw new Error("cubeportfolio is not initialized. Please initialize before calling destroy method!");
                a.isFunction(c) && d._registerEvent("destroyFinish", c, !0), a.removeData(this, "cubeportfolio"), a.each(d.blocks, function() {
                    a.removeData(this, "transformFn"), a.removeData(this, "cbp-wxh")
                }), d.$obj.removeClass("cbp cbp-loading cbp-ready cbp-no-transition"), d.$ul.removeClass("cbp-wrapper-front cbp-wrapper-back cbp-wrapper no-trans").removeAttr("style"), d.$obj.removeAttr("style"), d.$ulClone && d.$ulClone.remove(), d.browser && d.$obj.removeClass("cbp-" + d.browser), a(b).off("resize" + f), d.lightbox && d.lightbox.destroy(), d.singlePage && d.singlePage.destroy(), d.singlePageInline && d.singlePageInline.destroy(), d.blocks.removeClass("cbp-item-hidden").removeAttr("style"), d.blocks.find(".cbp-item-wrapper").children().unwrap(), d.options.caption && d._captionDestroy(), d.options.animationType && ("boxShadow" === d.options.animationType && a(".cbp-animation-boxShadowMask").remove(), d.$obj.removeClass("cbp-animation-" + d.options.animationType)), d._triggerEvent("destroyFinish")
            },
            filter: function(b, c, d) {
                var e, f, g, h = d || a.data(this, "cubeportfolio");
                if (!h) throw new Error("cubeportfolio is not initialized. Please initialize before calling filter method!");
                b = "*" === b || "" === b ? "*" : b, h.isAnimating || h.defaultFilter === b || ("ie8" === h.browser || "ie9" === h.browser ? h.$obj.removeClass("cbp-no-transition cbp-appendItems-loading") : (h.obj.classList.remove("cbp-no-transition"), h.obj.classList.remove("cbp-appendItems-loading")), h.defaultFilter = b, h.isAnimating = !0, a.isFunction(c) && h._registerEvent("filterFinish", c, !0), e = h.blocks.filter(".cbp-item-hidden"), f = [], h.singlePageInline && h.singlePageInline.isOpen ? h.singlePageInline.close("promise", {
                    callback: function() {
                        h["_" + h.options.animationType + "Filter"](f, e, b)
                    }
                }) : h["_" + h.options.animationType + "Filter"](f, e, b), h.options.filterDeeplinking && (g = location.href.replace(/#cbpf=(.*?)([#|?&]|$)/gi, ""), location.href = g + "#cbpf=" + b, h.singlePage && h.singlePage.url && (h.singlePage.url = location.href)))
            },
            showCounter: function(b, c) {
                var d = a.data(this, "cubeportfolio");
                if (!d) throw new Error("cubeportfolio is not initialized. Please initialize before calling showCounter method!");
                d.elems = b, a.each(b, function() {
                    var b, c = a(this),
                        e = c.data("filter");
                    e = "*" === e || "" === e ? "*" : e, b = d.blocks.filter(e).length, c.find(".cbp-filter-counter").text(b)
                }), a.isFunction(c) && c.call(d)
            },
            appendItems: function(b, c) {
                var d = this,
                    e = a.data(d, "cubeportfolio");
                if (!e) throw new Error("cubeportfolio is not initialized. Please initialize before calling appendItems method!");
                e.singlePageInline && e.singlePageInline.isOpen ? e.singlePageInline.close("promise", {
                    callback: function() {
                        i._addItems.call(d, b, c)
                    }
                }) : i._addItems.call(d, b, c)
            },
            _addItems: function(b, c) {
                var d, e, f, g, h = a.data(this, "cubeportfolio");
                a.isFunction(c) && h._registerEvent("appendItemsFinish", c, !0), h.$obj.addClass("cbp-no-transition cbp-appendItems-loading"), b = a(b).css("opacity", 0), b.filter(".cbp-item").wrapInner('<div class="cbp-item-wrapper"></div>'), g = b.filter(h.defaultFilter), h.ulHidden ? "first" === h.ulHidden ? (b.appendTo(h.$ulClone), h.blocksClone = h.$ulClone.children(), e = h.blocksClone, f = b.clone(), f.appendTo(h.$ul), h.blocks = h.$ul.children()) : (b.appendTo(h.$ul), h.blocks = h.$ul.children(), e = h.blocks, f = b.clone(), f.appendTo(h.$ulClone), h.blocksClone = h.$ulClone.children()) : (b.appendTo(h.$ul), h.blocks = h.$ul.children(), e = h.blocks), h.options.caption && (h._captionDestroy(), h._captionInit()), d = h.defaultFilter, h.blocksAvailable = e.filter(d), e.not(".cbp-item-hidden").not(d).addClass("cbp-item-hidden"), "responsive" === h.options.gridAdjustment && h._responsiveLayout(), h._layout(), h._processStyle(h.transitionByFilter), h._resizeMainContainer("animate");
                var j = b.filter(".cbp-item-hidden");
                switch (h.options.animationType) {
                    case "flipOut":
                        j.find(".cbp-item-wrapper").addClass("cbp-animation-flipOut-out");
                        break;
                    case "scaleSides":
                        j.find(".cbp-item-wrapper").addClass("cbp-animation-scaleSides-out");
                        break;
                    case "flipBottom":
                        j.find(".cbp-item-wrapper").addClass("cbp-animation-flipBottom-out")
                }
                g.animate({
                    opacity: 1
                }, 800, function() {
                    switch (h.options.animationType) {
                        case "bounceLeft":
                        case "bounceTop":
                        case "bounceBottom":
                            h.blocks.css("opacity", 1), h.blocksClone.css("opacity", 1);
                            break;
                        case "flipOut":
                        case "scaleSides":
                        case "flipBottom":
                            j.css("opacity", 1)
                    }
                }), h.elems && i.showCounter.call(this, h.elems), setTimeout(function() {
                    h._triggerEvent("appendItemsFinish")
                }, 900)
            }
        };
    a.fn.cubeportfolio = function(a) {
        var b = arguments;
        return this.each(function() {
            if (i[a]) return i[a].apply(this, Array.prototype.slice.call(b, 1));
            if ("object" != typeof a && a) throw new Error("Method " + a + " does not exist on jQuery.cubeportfolio.js");
            return i.init.apply(this, b)
        })
    }, a.fn.cubeportfolio.options = {
        defaultFilter: "*",
        filterDeeplinking: !1,
        animationType: "fadeOut",
        gridAdjustment: "default",
        gapHorizontal: 10,
        gapVertical: 10,
        caption: "pushTop",
        displayType: "default",
        displayTypeSpeed: 400,
        lightboxDelegate: ".cbp-lightbox",
        lightboxGallery: !0,
        lightboxTitleSrc: "data-title",
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
        singlePageDelegate: ".cbp-singlePage",
        singlePageDeeplinking: !0,
        singlePageStickyNavigation: !0,
        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
        singlePageCallback: function() {},
        singlePageInlineDelegate: ".cbp-singlePageInline",
        singlePageInlinePosition: "top",
        singlePageInlineInFocus: !0,
        singlePageInlineCallback: function() {}
    }
}(jQuery, window, document);
// Smartresize
(function(c, b) {
    var a = function(g, d, e) {
        var h;
        return function f() {
            var k = this,
                j = arguments;

            function i() {
                if (!e) {
                    g.apply(k, j)
                }
                h = null
            }
            if (h) {
                clearTimeout(h)
            } else {
                if (e) {
                    g.apply(k, j)
                }
            }
            h = setTimeout(i, d || 300)
        }
    };
    jQuery.fn[b] = function(d) {
        return d ? this.bind("resize", a(d)) : this.trigger(b)
    }
})(jQuery, "smartresize");
// imagesLoaded PACKAGED v3.0.4
(function() {
    function c() {}
    var l = c.prototype;

    function h(w, x) {
        var v = w.length;
        while (v--) {
            if (w[v].listener === x) {
                return v
            }
        }
        return -1
    }

    function j(v) {
        return function w() {
            return this[v].apply(this, arguments)
        }
    }
    l.getListeners = function t(v) {
        var y = this._getEvents();
        var w;
        var x;
        if (typeof v === "object") {
            w = {};
            for (x in y) {
                if (y.hasOwnProperty(x) && v.test(x)) {
                    w[x] = y[x]
                }
            }
        } else {
            w = y[v] || (y[v] = [])
        }
        return w
    };
    l.flattenListeners = function r(x) {
        var v = [];
        var w;
        for (w = 0; w < x.length; w += 1) {
            v.push(x[w].listener)
        }
        return v
    };
    l.getListenersAsObject = function e(v) {
        var x = this.getListeners(v);
        var w;
        if (x instanceof Array) {
            w = {};
            w[v] = x
        }
        return w || x
    };
    l.addListener = function f(v, y) {
        var x = this.getListenersAsObject(v);
        var z = typeof y === "object";
        var w;
        for (w in x) {
            if (x.hasOwnProperty(w) && h(x[w], y) === -1) {
                x[w].push(z ? y : {
                    listener: y,
                    once: false
                })
            }
        }
        return this
    };
    l.on = j("addListener");
    l.addOnceListener = function a(v, w) {
        return this.addListener(v, {
            listener: w,
            once: true
        })
    };
    l.once = j("addOnceListener");
    l.defineEvent = function p(v) {
        this.getListeners(v);
        return this
    };
    l.defineEvents = function q(v) {
        for (var w = 0; w < v.length; w += 1) {
            this.defineEvent(v[w])
        }
        return this
    };
    l.removeListener = function b(v, z) {
        var y = this.getListenersAsObject(v);
        var w;
        var x;
        for (x in y) {
            if (y.hasOwnProperty(x)) {
                w = h(y[x], z);
                if (w !== -1) {
                    y[x].splice(w, 1)
                }
            }
        }
        return this
    };
    l.off = j("removeListener");
    l.addListeners = function m(v, w) {
        return this.manipulateListeners(false, v, w)
    };
    l.removeListeners = function s(v, w) {
        return this.manipulateListeners(true, v, w)
    };
    l.manipulateListeners = function g(w, x, z) {
        var y;
        var A;
        var B = w ? this.removeListener : this.addListener;
        var v = w ? this.removeListeners : this.addListeners;
        if (typeof x === "object" && !(x instanceof RegExp)) {
            for (y in x) {
                if (x.hasOwnProperty(y) && (A = x[y])) {
                    if (typeof A === "function") {
                        B.call(this, y, A)
                    } else {
                        v.call(this, y, A)
                    }
                }
            }
        } else {
            y = z.length;
            while (y--) {
                B.call(this, x, z[y])
            }
        }
        return this
    };
    l.removeEvent = function o(v) {
        var y = typeof v;
        var x = this._getEvents();
        var w;
        if (y === "string") {
            delete x[v]
        } else {
            if (y === "object") {
                for (w in x) {
                    if (x.hasOwnProperty(w) && v.test(w)) {
                        delete x[w]
                    }
                }
            } else {
                delete this._events
            }
        }
        return this
    };
    l.removeAllListeners = j("removeEvent");
    l.emitEvent = function u(v, x) {
        var A = this.getListenersAsObject(v);
        var B;
        var z;
        var y;
        var w;
        for (y in A) {
            if (A.hasOwnProperty(y)) {
                z = A[y].length;
                while (z--) {
                    B = A[y][z];
                    if (B.once === true) {
                        this.removeListener(v, B.listener)
                    }
                    w = B.listener.apply(this, x || []);
                    if (w === this._getOnceReturnValue()) {
                        this.removeListener(v, B.listener)
                    }
                }
            }
        }
        return this
    };
    l.trigger = j("emitEvent");
    l.emit = function k(v) {
        var w = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(v, w)
    };
    l.setOnceReturnValue = function i(v) {
        this._onceReturnValue = v;
        return this
    };
    l._getOnceReturnValue = function n() {
        if (this.hasOwnProperty("_onceReturnValue")) {
            return this._onceReturnValue
        } else {
            return true
        }
    };
    l._getEvents = function d() {
        return this._events || (this._events = {})
    };
    if (typeof define === "function" && define.amd) {
        define(function() {
            return c
        })
    } else {
        if (typeof module === "object" && module.exports) {
            module.exports = c
        } else {
            this.EventEmitter = c
        }
    }
}.call(this));
(function(d) {
    var a = document.documentElement;
    var e = function() {};
    if (a.addEventListener) {
        e = function(h, g, f) {
            h.addEventListener(g, f, false)
        }
    } else {
        if (a.attachEvent) {
            e = function(h, g, f) {
                h[g + f] = f.handleEvent ? function() {
                    var i = d.event;
                    i.target = i.target || i.srcElement;
                    f.handleEvent.call(f, i)
                } : function() {
                    var i = d.event;
                    i.target = i.target || i.srcElement;
                    f.call(h, i)
                };
                h.attachEvent("on" + g, h[g + f])
            }
        }
    }
    var c = function() {};
    if (a.removeEventListener) {
        c = function(h, g, f) {
            h.removeEventListener(g, f, false)
        }
    } else {
        if (a.detachEvent) {
            c = function(i, g, f) {
                i.detachEvent("on" + g, i[g + f]);
                try {
                    delete i[g + f]
                } catch (h) {
                    i[g + f] = undefined
                }
            }
        }
    }
    var b = {
        bind: e,
        unbind: c
    };
    if (typeof define === "function" && define.amd) {
        define(b)
    } else {
        d.eventie = b
    }
})(this);
(function(f) {
    var d = f.jQuery;
    var c = f.console;
    var a = typeof c !== "undefined";

    function g(k, j) {
        for (var l in j) {
            k[l] = j[l]
        }
        return k
    }
    var i = Object.prototype.toString;

    function e(j) {
        return i.call(j) === "[object Array]"
    }

    function b(m) {
        var l = [];
        if (e(m)) {
            l = m
        } else {
            if (typeof m.length === "number") {
                for (var k = 0, j = m.length; k < j; k++) {
                    l.push(m[k])
                }
            } else {
                l.push(m)
            }
        }
        return l
    }

    function h(m, k) {
        function l(q, p, o) {
            if (!(this instanceof l)) {
                return new l(q, p)
            }
            if (typeof q === "string") {
                q = document.querySelectorAll(q)
            }
            this.elements = b(q);
            this.options = g({}, this.options);
            if (typeof p === "function") {
                o = p
            } else {
                g(this.options, p)
            }
            if (o) {
                this.on("always", o)
            }
            this.getImages();
            if (d) {
                this.jqDeferred = new d.Deferred()
            }
            var r = this;
            setTimeout(function() {
                r.check()
            })
        }
        l.prototype = new m();
        l.prototype.options = {};
        l.prototype.getImages = function() {
            this.images = [];
            for (var r = 0, o = this.elements.length; r < o; r++) {
                var s = this.elements[r];
                if (s.nodeName === "IMG") {
                    this.addImage(s)
                }
                var u = s.querySelectorAll("img");
                for (var q = 0, t = u.length; q < t; q++) {
                    var p = u[q];
                    this.addImage(p)
                }
            }
        };
        l.prototype.addImage = function(o) {
            var p = new n(o);
            this.images.push(p)
        };
        l.prototype.check = function() {
            var t = this;
            var p = 0;
            var r = this.images.length;
            this.hasAnyBroken = false;
            if (!r) {
                this.complete();
                return
            }

            function q(v, u) {
                if (t.options.debug && a) {
                    c.log("confirm", v, u)
                }
                t.progress(v);
                p++;
                if (p === r) {
                    t.complete()
                }
                return true
            }
            for (var o = 0; o < r; o++) {
                var s = this.images[o];
                s.on("confirm", q);
                s.check()
            }
        };
        l.prototype.progress = function(o) {
            this.hasAnyBroken = this.hasAnyBroken || !o.isLoaded;
            var p = this;
            setTimeout(function() {
                p.emit("progress", p, o);
                if (p.jqDeferred) {
                    p.jqDeferred.notify(p, o)
                }
            })
        };
        l.prototype.complete = function() {
            var o = this.hasAnyBroken ? "fail" : "done";
            this.isComplete = true;
            var p = this;
            setTimeout(function() {
                p.emit(o, p);
                p.emit("always", p);
                if (p.jqDeferred) {
                    var q = p.hasAnyBroken ? "reject" : "resolve";
                    p.jqDeferred[q](p)
                }
            })
        };
        if (d) {
            d.fn.imagesLoaded = function(p, q) {
                var o = new l(this, p, q);
                return o.jqDeferred.promise(d(this))
            }
        }
        var j = {};

        function n(o) {
            this.img = o
        }
        n.prototype = new m();
        n.prototype.check = function() {
            var o = j[this.img.src];
            if (o) {
                this.useCached(o);
                return
            }
            j[this.img.src] = this;
            if (this.img.complete && this.img.naturalWidth !== undefined) {
                this.confirm(this.img.naturalWidth !== 0, "naturalWidth");
                return
            }
            var p = this.proxyImage = new Image();
            k.bind(p, "load", this);
            k.bind(p, "error", this);
            p.src = this.img.src
        };
        n.prototype.useCached = function(o) {
            if (o.isConfirmed) {
                this.confirm(o.isLoaded, "cached was confirmed")
            } else {
                var p = this;
                o.on("confirm", function(q) {
                    p.confirm(q.isLoaded, "cache emitted confirmed");
                    return true
                })
            }
        };
        n.prototype.confirm = function(o, p) {
            this.isConfirmed = true;
            this.isLoaded = o;
            this.emit("confirm", this, p)
        };
        n.prototype.handleEvent = function(o) {
            var p = "on" + o.type;
            if (this[p]) {
                this[p](o)
            }
        };
        n.prototype.onload = function() {
            this.confirm(true, "onload");
            this.unbindProxyEvents()
        };
        n.prototype.onerror = function() {
            this.confirm(false, "onerror");
            this.unbindProxyEvents()
        };
        n.prototype.unbindProxyEvents = function() {
            k.unbind(this.proxyImage, "load", this);
            k.unbind(this.proxyImage, "error", this)
        };
        return l
    }
    if (typeof define === "function" && define.amd) {
        define(["eventEmitter/EventEmitter", "eventie/eventie"], h)
    } else {
        f.imagesLoaded = h(f.EventEmitter, f.eventie)
    }
})(window);
// jQuery FlexSlider v2.4.0
! function($) {
    $.flexslider = function(e, t) {
        var a = $(e);
        a.vars = $.extend({}, $.flexslider.defaults, t);
        var n = a.vars.namespace,
            i = window.navigator && window.navigator.msPointerEnabled && window.MSGesture,
            s = ("ontouchstart" in window || i || window.DocumentTouch && document instanceof DocumentTouch) && a.vars.touch,
            r = "click touchend MSPointerUp keyup",
            o = "",
            l, c = "vertical" === a.vars.direction,
            d = a.vars.reverse,
            u = a.vars.itemWidth > 0,
            v = "fade" === a.vars.animation,
            p = "" !== a.vars.asNavFor,
            m = {},
            f = !0;
        $.data(e, "flexslider", a), m = {
            init: function() {
                a.animating = !1, a.currentSlide = parseInt(a.vars.startAt ? a.vars.startAt : 0, 10), isNaN(a.currentSlide) && (a.currentSlide = 0), a.animatingTo = a.currentSlide, a.atEnd = 0 === a.currentSlide || a.currentSlide === a.last, a.containerSelector = a.vars.selector.substr(0, a.vars.selector.search(" ")), a.slides = $(a.vars.selector, a), a.container = $(a.containerSelector, a), a.count = a.slides.length, a.syncExists = $(a.vars.sync).length > 0, "slide" === a.vars.animation && (a.vars.animation = "swing"), a.prop = c ? "top" : "marginLeft", a.args = {}, a.manualPause = !1, a.stopped = !1, a.started = !1, a.startTimeout = null, a.transitions = !a.vars.video && !v && a.vars.useCSS && function() {
                    var e = document.createElement("div"),
                        t = ["perspectiveProperty", "WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"];
                    for (var n in t)
                        if (void 0 !== e.style[t[n]]) return a.pfx = t[n].replace("Perspective", "").toLowerCase(), a.prop = "-" + a.pfx + "-transform", !0;
                    return !1
                }(), a.ensureAnimationEnd = "", "" !== a.vars.controlsContainer && (a.controlsContainer = $(a.vars.controlsContainer).length > 0 && $(a.vars.controlsContainer)), "" !== a.vars.manualControls && (a.manualControls = $(a.vars.manualControls).length > 0 && $(a.vars.manualControls)), a.vars.randomize && (a.slides.sort(function() {
                    return Math.round(Math.random()) - .5
                }), a.container.empty().append(a.slides)), a.doMath(), a.setup("init"), a.vars.controlNav && m.controlNav.setup(), a.vars.directionNav && m.directionNav.setup(), a.vars.keyboard && (1 === $(a.containerSelector).length || a.vars.multipleKeyboard) && $(document).bind("keyup", function(e) {
                    var t = e.keyCode;
                    if (!a.animating && (39 === t || 37 === t)) {
                        var n = 39 === t ? a.getTarget("next") : 37 === t ? a.getTarget("prev") : !1;
                        a.flexAnimate(n, a.vars.pauseOnAction)
                    }
                }), a.vars.mousewheel && a.bind("mousewheel", function(e, t, n, i) {
                    e.preventDefault();
                    var s = a.getTarget(0 > t ? "next" : "prev");
                    a.flexAnimate(s, a.vars.pauseOnAction)
                }), a.vars.pausePlay && m.pausePlay.setup(), a.vars.slideshow && a.vars.pauseInvisible && m.pauseInvisible.init(), a.vars.slideshow && (a.vars.pauseOnHover && a.hover(function() {
                    a.manualPlay || a.manualPause || a.pause()
                }, function() {
                    a.manualPause || a.manualPlay || a.stopped || a.play()
                }), a.vars.pauseInvisible && m.pauseInvisible.isHidden() || (a.vars.initDelay > 0 ? a.startTimeout = setTimeout(a.play, a.vars.initDelay) : a.play())), p && m.asNav.setup(), s && a.vars.touch && m.touch(), (!v || v && a.vars.smoothHeight) && $(window).bind("resize orientationchange focus", m.resize), a.find("img").attr("draggable", "false"), setTimeout(function() {
                    a.vars.start(a)
                }, 200)
            },
            asNav: {
                setup: function() {
                    a.asNav = !0, a.animatingTo = Math.floor(a.currentSlide / a.move), a.currentItem = a.currentSlide, a.slides.removeClass(n + "active-slide").eq(a.currentItem).addClass(n + "active-slide"), i ? (e._slider = a, a.slides.each(function() {
                        var e = this;
                        e._gesture = new MSGesture, e._gesture.target = e, e.addEventListener("MSPointerDown", function(e) {
                            e.preventDefault(), e.currentTarget._gesture && e.currentTarget._gesture.addPointer(e.pointerId)
                        }, !1), e.addEventListener("MSGestureTap", function(e) {
                            e.preventDefault();
                            var t = $(this),
                                n = t.index();
                            $(a.vars.asNavFor).data("flexslider").animating || t.hasClass("active") || (a.direction = a.currentItem < n ? "next" : "prev", a.flexAnimate(n, a.vars.pauseOnAction, !1, !0, !0))
                        })
                    })) : a.slides.on(r, function(e) {
                        e.preventDefault();
                        var t = $(this),
                            i = t.index(),
                            s = t.offset().left - $(a).scrollLeft();
                        0 >= s && t.hasClass(n + "active-slide") ? a.flexAnimate(a.getTarget("prev"), !0) : $(a.vars.asNavFor).data("flexslider").animating || t.hasClass(n + "active-slide") || (a.direction = a.currentItem < i ? "next" : "prev", a.flexAnimate(i, a.vars.pauseOnAction, !1, !0, !0))
                    })
                }
            },
            controlNav: {
                setup: function() {
                    a.manualControls ? m.controlNav.setupManual() : m.controlNav.setupPaging()
                },
                setupPaging: function() {
                    var e = "thumbnails" === a.vars.controlNav ? "control-thumbs" : "control-paging",
                        t = 1,
                        i, s;
                    if (a.controlNavScaffold = $('<ol class="' + n + "control-nav " + n + e + '"></ol>'), a.pagingCount > 1)
                        for (var l = 0; l < a.pagingCount; l++) {
                            if (s = a.slides.eq(l), i = "thumbnails" === a.vars.controlNav ? '<img src="' + s.attr("data-thumb") + '"/>' : "<a>" + t + "</a>", "thumbnails" === a.vars.controlNav && !0 === a.vars.thumbCaptions) {
                                var c = s.attr("data-thumbcaption");
                                "" != c && void 0 != c && (i += '<span class="' + n + 'caption">' + c + "</span>")
                            }
                            a.controlNavScaffold.append("<li>" + i + "</li>"), t++
                        }
                    a.controlsContainer ? $(a.controlsContainer).append(a.controlNavScaffold) : a.append(a.controlNavScaffold), m.controlNav.set(), m.controlNav.active(), a.controlNavScaffold.delegate("a, img", r, function(e) {
                        if (e.preventDefault(), "" === o || o === e.type) {
                            var t = $(this),
                                i = a.controlNav.index(t);
                            t.hasClass(n + "active") || (a.direction = i > a.currentSlide ? "next" : "prev", a.flexAnimate(i, a.vars.pauseOnAction))
                        }
                        "" === o && (o = e.type), m.setToClearWatchedEvent()
                    })
                },
                setupManual: function() {
                    a.controlNav = a.manualControls, m.controlNav.active(), a.controlNav.bind(r, function(e) {
                        if (e.preventDefault(), "" === o || o === e.type) {
                            var t = $(this),
                                i = a.controlNav.index(t);
                            t.hasClass(n + "active") || (a.direction = i > a.currentSlide ? "next" : "prev", a.flexAnimate(i, a.vars.pauseOnAction))
                        }
                        "" === o && (o = e.type), m.setToClearWatchedEvent()
                    })
                },
                set: function() {
                    var e = "thumbnails" === a.vars.controlNav ? "img" : "a";
                    a.controlNav = $("." + n + "control-nav li " + e, a.controlsContainer ? a.controlsContainer : a)
                },
                active: function() {
                    a.controlNav.removeClass(n + "active").eq(a.animatingTo).addClass(n + "active")
                },
                update: function(e, t) {
                    a.pagingCount > 1 && "add" === e ? a.controlNavScaffold.append($("<li><a>" + a.count + "</a></li>")) : 1 === a.pagingCount ? a.controlNavScaffold.find("li").remove() : a.controlNav.eq(t).closest("li").remove(), m.controlNav.set(), a.pagingCount > 1 && a.pagingCount !== a.controlNav.length ? a.update(t, e) : m.controlNav.active()
                }
            },
            directionNav: {
                setup: function() {
                    var e = $('<ul class="' + n + 'direction-nav"><li class="' + n + 'nav-prev"><a class="' + n + 'prev" href="#">' + a.vars.prevText + '</a></li><li class="' + n + 'nav-next"><a class="' + n + 'next" href="#">' + a.vars.nextText + "</a></li></ul>");
                    a.controlsContainer ? ($(a.controlsContainer).append(e), a.directionNav = $("." + n + "direction-nav li a", a.controlsContainer)) : (a.append(e), a.directionNav = $("." + n + "direction-nav li a", a)), m.directionNav.update(), a.directionNav.bind(r, function(e) {
                        e.preventDefault();
                        var t;
                        ("" === o || o === e.type) && (t = a.getTarget($(this).hasClass(n + "next") ? "next" : "prev"), a.flexAnimate(t, a.vars.pauseOnAction)), "" === o && (o = e.type), m.setToClearWatchedEvent()
                    })
                },
                update: function() {
                    var e = n + "disabled";
                    1 === a.pagingCount ? a.directionNav.addClass(e).attr("tabindex", "-1") : a.vars.animationLoop ? a.directionNav.removeClass(e).removeAttr("tabindex") : 0 === a.animatingTo ? a.directionNav.removeClass(e).filter("." + n + "prev").addClass(e).attr("tabindex", "-1") : a.animatingTo === a.last ? a.directionNav.removeClass(e).filter("." + n + "next").addClass(e).attr("tabindex", "-1") : a.directionNav.removeClass(e).removeAttr("tabindex")
                }
            },
            pausePlay: {
                setup: function() {
                    var e = $('<div class="' + n + 'pauseplay"><a></a></div>');
                    a.controlsContainer ? (a.controlsContainer.append(e), a.pausePlay = $("." + n + "pauseplay a", a.controlsContainer)) : (a.append(e), a.pausePlay = $("." + n + "pauseplay a", a)), m.pausePlay.update(a.vars.slideshow ? n + "pause" : n + "play"), a.pausePlay.bind(r, function(e) {
                        e.preventDefault(), ("" === o || o === e.type) && ($(this).hasClass(n + "pause") ? (a.manualPause = !0, a.manualPlay = !1, a.pause()) : (a.manualPause = !1, a.manualPlay = !0, a.play())), "" === o && (o = e.type), m.setToClearWatchedEvent()
                    })
                },
                update: function(e) {
                    "play" === e ? a.pausePlay.removeClass(n + "pause").addClass(n + "play").html(a.vars.playText) : a.pausePlay.removeClass(n + "play").addClass(n + "pause").html(a.vars.pauseText)
                }
            },
            touch: function() {
                function t(t) {
                    a.animating ? t.preventDefault() : (window.navigator.msPointerEnabled || 1 === t.touches.length) && (a.pause(), g = c ? a.h : a.w, S = Number(new Date), x = t.touches[0].pageX, b = t.touches[0].pageY, f = u && d && a.animatingTo === a.last ? 0 : u && d ? a.limit - (a.itemW + a.vars.itemMargin) * a.move * a.animatingTo : u && a.currentSlide === a.last ? a.limit : u ? (a.itemW + a.vars.itemMargin) * a.move * a.currentSlide : d ? (a.last - a.currentSlide + a.cloneOffset) * g : (a.currentSlide + a.cloneOffset) * g, p = c ? b : x, m = c ? x : b, e.addEventListener("touchmove", n, !1), e.addEventListener("touchend", s, !1))
                }

                function n(e) {
                    x = e.touches[0].pageX, b = e.touches[0].pageY, h = c ? p - b : p - x, y = c ? Math.abs(h) < Math.abs(x - m) : Math.abs(h) < Math.abs(b - m);
                    var t = 500;
                    (!y || Number(new Date) - S > t) && (e.preventDefault(), !v && a.transitions && (a.vars.animationLoop || (h /= 0 === a.currentSlide && 0 > h || a.currentSlide === a.last && h > 0 ? Math.abs(h) / g + 2 : 1), a.setProps(f + h, "setTouch")))
                }

                function s(t) {
                    if (e.removeEventListener("touchmove", n, !1), a.animatingTo === a.currentSlide && !y && null !== h) {
                        var i = d ? -h : h,
                            r = a.getTarget(i > 0 ? "next" : "prev");
                        a.canAdvance(r) && (Number(new Date) - S < 550 && Math.abs(i) > 50 || Math.abs(i) > g / 2) ? a.flexAnimate(r, a.vars.pauseOnAction) : v || a.flexAnimate(a.currentSlide, a.vars.pauseOnAction, !0)
                    }
                    e.removeEventListener("touchend", s, !1), p = null, m = null, h = null, f = null
                }

                function r(t) {
                    t.stopPropagation(), a.animating ? t.preventDefault() : (a.pause(), e._gesture.addPointer(t.pointerId), w = 0, g = c ? a.h : a.w, S = Number(new Date), f = u && d && a.animatingTo === a.last ? 0 : u && d ? a.limit - (a.itemW + a.vars.itemMargin) * a.move * a.animatingTo : u && a.currentSlide === a.last ? a.limit : u ? (a.itemW + a.vars.itemMargin) * a.move * a.currentSlide : d ? (a.last - a.currentSlide + a.cloneOffset) * g : (a.currentSlide + a.cloneOffset) * g)
                }

                function o(t) {
                    t.stopPropagation();
                    var a = t.target._slider;
                    if (a) {
                        var n = -t.translationX,
                            i = -t.translationY;
                        return w += c ? i : n, h = w, y = c ? Math.abs(w) < Math.abs(-n) : Math.abs(w) < Math.abs(-i), t.detail === t.MSGESTURE_FLAG_INERTIA ? void setImmediate(function() {
                            e._gesture.stop()
                        }) : void((!y || Number(new Date) - S > 500) && (t.preventDefault(), !v && a.transitions && (a.vars.animationLoop || (h = w / (0 === a.currentSlide && 0 > w || a.currentSlide === a.last && w > 0 ? Math.abs(w) / g + 2 : 1)), a.setProps(f + h, "setTouch"))))
                    }
                }

                function l(e) {
                    e.stopPropagation();
                    var t = e.target._slider;
                    if (t) {
                        if (t.animatingTo === t.currentSlide && !y && null !== h) {
                            var a = d ? -h : h,
                                n = t.getTarget(a > 0 ? "next" : "prev");
                            t.canAdvance(n) && (Number(new Date) - S < 550 && Math.abs(a) > 50 || Math.abs(a) > g / 2) ? t.flexAnimate(n, t.vars.pauseOnAction) : v || t.flexAnimate(t.currentSlide, t.vars.pauseOnAction, !0)
                        }
                        p = null, m = null, h = null, f = null, w = 0
                    }
                }
                var p, m, f, g, h, S, y = !1,
                    x = 0,
                    b = 0,
                    w = 0;
                i ? (e.style.msTouchAction = "none", e._gesture = new MSGesture, e._gesture.target = e, e.addEventListener("MSPointerDown", r, !1), e._slider = a, e.addEventListener("MSGestureChange", o, !1), e.addEventListener("MSGestureEnd", l, !1)) : e.addEventListener("touchstart", t, !1)
            },
            resize: function() {
                !a.animating && a.is(":visible") && (u || a.doMath(), v ? m.smoothHeight() : u ? (a.slides.width(a.computedW), a.update(a.pagingCount), a.setProps()) : c ? (a.viewport.height(a.h), a.setProps(a.h, "setTotal")) : (a.vars.smoothHeight && m.smoothHeight(), a.newSlides.width(a.computedW), a.setProps(a.computedW, "setTotal")))
            },
            smoothHeight: function(e) {
                if (!c || v) {
                    var t = v ? a : a.viewport;
                    e ? t.animate({
                        height: a.slides.eq(a.animatingTo).height()
                    }, e) : t.height(a.slides.eq(a.animatingTo).height())
                }
            },
            sync: function(e) {
                var t = $(a.vars.sync).data("flexslider"),
                    n = a.animatingTo;
                switch (e) {
                    case "animate":
                        t.flexAnimate(n, a.vars.pauseOnAction, !1, !0);
                        break;
                    case "play":
                        t.playing || t.asNav || t.play();
                        break;
                    case "pause":
                        t.pause()
                }
            },
            uniqueID: function(e) {
                return e.filter("[id]").add(e.find("[id]")).each(function() {
                    var e = $(this);
                    e.attr("id", e.attr("id") + "_clone")
                }), e
            },
            pauseInvisible: {
                visProp: null,
                init: function() {
                    var e = m.pauseInvisible.getHiddenProp();
                    if (e) {
                        var t = e.replace(/[H|h]idden/, "") + "visibilitychange";
                        document.addEventListener(t, function() {
                            m.pauseInvisible.isHidden() ? a.startTimeout ? clearTimeout(a.startTimeout) : a.pause() : a.started ? a.play() : a.vars.initDelay > 0 ? setTimeout(a.play, a.vars.initDelay) : a.play()
                        })
                    }
                },
                isHidden: function() {
                    var e = m.pauseInvisible.getHiddenProp();
                    return e ? document[e] : !1
                },
                getHiddenProp: function() {
                    var e = ["webkit", "moz", "ms", "o"];
                    if ("hidden" in document) return "hidden";
                    for (var t = 0; t < e.length; t++)
                        if (e[t] + "Hidden" in document) return e[t] + "Hidden";
                    return null
                }
            },
            setToClearWatchedEvent: function() {
                clearTimeout(l), l = setTimeout(function() {
                    o = ""
                }, 3e3)
            }
        }, a.flexAnimate = function(e, t, i, r, o) {
            if (a.vars.animationLoop || e === a.currentSlide || (a.direction = e > a.currentSlide ? "next" : "prev"), p && 1 === a.pagingCount && (a.direction = a.currentItem < e ? "next" : "prev"), !a.animating && (a.canAdvance(e, o) || i) && a.is(":visible")) {
                if (p && r) {
                    var l = $(a.vars.asNavFor).data("flexslider");
                    if (a.atEnd = 0 === e || e === a.count - 1, l.flexAnimate(e, !0, !1, !0, o), a.direction = a.currentItem < e ? "next" : "prev", l.direction = a.direction, Math.ceil((e + 1) / a.visible) - 1 === a.currentSlide || 0 === e) return a.currentItem = e, a.slides.removeClass(n + "active-slide").eq(e).addClass(n + "active-slide"), !1;
                    a.currentItem = e, a.slides.removeClass(n + "active-slide").eq(e).addClass(n + "active-slide"), e = Math.floor(e / a.visible)
                }
                if (a.animating = !0, a.animatingTo = e, t && a.pause(), a.vars.before(a), a.syncExists && !o && m.sync("animate"), a.vars.controlNav && m.controlNav.active(), u || a.slides.removeClass(n + "active-slide").eq(e).addClass(n + "active-slide"), a.atEnd = 0 === e || e === a.last, a.vars.directionNav && m.directionNav.update(), e === a.last && (a.vars.end(a), a.vars.animationLoop || a.pause()), v) s ? (a.slides.eq(a.currentSlide).css({
                    opacity: 0,
                    zIndex: 1
                }), a.slides.eq(e).css({
                    opacity: 1,
                    zIndex: 2
                }), a.wrapup(f)) : (a.slides.eq(a.currentSlide).css({
                    zIndex: 1
                }).animate({
                    opacity: 0
                }, a.vars.animationSpeed, a.vars.easing), a.slides.eq(e).css({
                    zIndex: 2
                }).animate({
                    opacity: 1
                }, a.vars.animationSpeed, a.vars.easing, a.wrapup));
                else {
                    var f = c ? a.slides.filter(":first").height() : a.computedW,
                        g, h, S;
                    u ? (g = a.vars.itemMargin, S = (a.itemW + g) * a.move * a.animatingTo, h = S > a.limit && 1 !== a.visible ? a.limit : S) : h = 0 === a.currentSlide && e === a.count - 1 && a.vars.animationLoop && "next" !== a.direction ? d ? (a.count + a.cloneOffset) * f : 0 : a.currentSlide === a.last && 0 === e && a.vars.animationLoop && "prev" !== a.direction ? d ? 0 : (a.count + 1) * f : d ? (a.count - 1 - e + a.cloneOffset) * f : (e + a.cloneOffset) * f, a.setProps(h, "", a.vars.animationSpeed), a.transitions ? (a.vars.animationLoop && a.atEnd || (a.animating = !1, a.currentSlide = a.animatingTo), a.container.unbind("webkitTransitionEnd transitionend"), a.container.bind("webkitTransitionEnd transitionend", function() {
                        clearTimeout(a.ensureAnimationEnd), a.wrapup(f)
                    }), clearTimeout(a.ensureAnimationEnd), a.ensureAnimationEnd = setTimeout(function() {
                        a.wrapup(f)
                    }, a.vars.animationSpeed + 100)) : a.container.animate(a.args, a.vars.animationSpeed, a.vars.easing, function() {
                        a.wrapup(f)
                    })
                }
                a.vars.smoothHeight && m.smoothHeight(a.vars.animationSpeed)
            }
        }, a.wrapup = function(e) {
            v || u || (0 === a.currentSlide && a.animatingTo === a.last && a.vars.animationLoop ? a.setProps(e, "jumpEnd") : a.currentSlide === a.last && 0 === a.animatingTo && a.vars.animationLoop && a.setProps(e, "jumpStart")), a.animating = !1, a.currentSlide = a.animatingTo, a.vars.after(a)
        }, a.animateSlides = function() {
            !a.animating && f && a.flexAnimate(a.getTarget("next"))
        }, a.pause = function() {
            clearInterval(a.animatedSlides), a.animatedSlides = null, a.playing = !1, a.vars.pausePlay && m.pausePlay.update("play"), a.syncExists && m.sync("pause")
        }, a.play = function() {
            a.playing && clearInterval(a.animatedSlides), a.animatedSlides = a.animatedSlides || setInterval(a.animateSlides, a.vars.slideshowSpeed), a.started = a.playing = !0, a.vars.pausePlay && m.pausePlay.update("pause"), a.syncExists && m.sync("play")
        }, a.stop = function() {
            a.pause(), a.stopped = !0
        }, a.canAdvance = function(e, t) {
            var n = p ? a.pagingCount - 1 : a.last;
            return t ? !0 : p && a.currentItem === a.count - 1 && 0 === e && "prev" === a.direction ? !0 : p && 0 === a.currentItem && e === a.pagingCount - 1 && "next" !== a.direction ? !1 : e !== a.currentSlide || p ? a.vars.animationLoop ? !0 : a.atEnd && 0 === a.currentSlide && e === n && "next" !== a.direction ? !1 : a.atEnd && a.currentSlide === n && 0 === e && "next" === a.direction ? !1 : !0 : !1
        }, a.getTarget = function(e) {
            return a.direction = e, "next" === e ? a.currentSlide === a.last ? 0 : a.currentSlide + 1 : 0 === a.currentSlide ? a.last : a.currentSlide - 1
        }, a.setProps = function(e, t, n) {
            var i = function() {
                var n = e ? e : (a.itemW + a.vars.itemMargin) * a.move * a.animatingTo,
                    i = function() {
                        if (u) return "setTouch" === t ? e : d && a.animatingTo === a.last ? 0 : d ? a.limit - (a.itemW + a.vars.itemMargin) * a.move * a.animatingTo : a.animatingTo === a.last ? a.limit : n;
                        switch (t) {
                            case "setTotal":
                                return d ? (a.count - 1 - a.currentSlide + a.cloneOffset) * e : (a.currentSlide + a.cloneOffset) * e;
                            case "setTouch":
                                return d ? e : e;
                            case "jumpEnd":
                                return d ? e : a.count * e;
                            case "jumpStart":
                                return d ? a.count * e : e;
                            default:
                                return e
                        }
                    }();
                return -1 * i + "px"
            }();
            a.transitions && (i = c ? "translate3d(0," + i + ",0)" : "translate3d(" + i + ",0,0)", n = void 0 !== n ? n / 1e3 + "s" : "0s", a.container.css("-" + a.pfx + "-transition-duration", n), a.container.css("transition-duration", n)), a.args[a.prop] = i, (a.transitions || void 0 === n) && a.container.css(a.args), a.container.css("transform", i)
        }, a.setup = function(e) {
            if (v) a.slides.css({
                width: "100%",
                "float": "left",
                marginRight: "-100%",
                position: "relative"
            }), "init" === e && (s ? a.slides.css({
                opacity: 0,
                display: "block",
                webkitTransition: "opacity " + a.vars.animationSpeed / 1e3 + "s ease",
                zIndex: 1
            }).eq(a.currentSlide).css({
                opacity: 1,
                zIndex: 2
            }) : 0 == a.vars.fadeFirstSlide ? a.slides.css({
                opacity: 0,
                display: "block",
                zIndex: 1
            }).eq(a.currentSlide).css({
                zIndex: 2
            }).css({
                opacity: 1
            }) : a.slides.css({
                opacity: 0,
                display: "block",
                zIndex: 1
            }).eq(a.currentSlide).css({
                zIndex: 2
            }).animate({
                opacity: 1
            }, a.vars.animationSpeed, a.vars.easing)), a.vars.smoothHeight && m.smoothHeight();
            else {
                var t, i;
                "init" === e && (a.viewport = $('<div class="' + n + 'viewport"></div>').css({
                    overflow: "hidden",
                    position: "relative"
                }).appendTo(a).append(a.container), a.cloneCount = 0, a.cloneOffset = 0, d && (i = $.makeArray(a.slides).reverse(), a.slides = $(i), a.container.empty().append(a.slides))), a.vars.animationLoop && !u && (a.cloneCount = 2, a.cloneOffset = 1, "init" !== e && a.container.find(".clone").remove(), a.container.append(m.uniqueID(a.slides.first().clone().addClass("clone")).attr("aria-hidden", "true")).prepend(m.uniqueID(a.slides.last().clone().addClass("clone")).attr("aria-hidden", "true"))), a.newSlides = $(a.vars.selector, a), t = d ? a.count - 1 - a.currentSlide + a.cloneOffset : a.currentSlide + a.cloneOffset, c && !u ? (a.container.height(200 * (a.count + a.cloneCount) + "%").css("position", "absolute").width("100%"), setTimeout(function() {
                    a.newSlides.css({
                        display: "block"
                    }), a.doMath(), a.viewport.height(a.h), a.setProps(t * a.h, "init")
                }, "init" === e ? 100 : 0)) : (a.container.width(200 * (a.count + a.cloneCount) + "%"), a.setProps(t * a.computedW, "init"), setTimeout(function() {
                    a.doMath(), a.newSlides.css({
                        width: a.computedW,
                        "float": "left",
                        display: "block"
                    }), a.vars.smoothHeight && m.smoothHeight()
                }, "init" === e ? 100 : 0))
            }
            u || a.slides.removeClass(n + "active-slide").eq(a.currentSlide).addClass(n + "active-slide"), a.vars.init(a)
        }, a.doMath = function() {
            var e = a.slides.first(),
                t = a.vars.itemMargin,
                n = a.vars.minItems,
                i = a.vars.maxItems;
            a.w = void 0 === a.viewport ? a.width() : a.viewport.width(), a.h = e.height(), a.boxPadding = e.outerWidth() - e.width(), u ? (a.itemT = a.vars.itemWidth + t, a.minW = n ? n * a.itemT : a.w, a.maxW = i ? i * a.itemT - t : a.w, a.itemW = a.minW > a.w ? (a.w - t * (n - 1)) / n : a.maxW < a.w ? (a.w - t * (i - 1)) / i : a.vars.itemWidth > a.w ? a.w : a.vars.itemWidth, a.visible = Math.floor(a.w / a.itemW), a.move = a.vars.move > 0 && a.vars.move < a.visible ? a.vars.move : a.visible, a.pagingCount = Math.ceil((a.count - a.visible) / a.move + 1), a.last = a.pagingCount - 1, a.limit = 1 === a.pagingCount ? 0 : a.vars.itemWidth > a.w ? a.itemW * (a.count - 1) + t * (a.count - 1) : (a.itemW + t) * a.count - a.w - t) : (a.itemW = a.w, a.pagingCount = a.count, a.last = a.count - 1), a.computedW = a.itemW - a.boxPadding
        }, a.update = function(e, t) {
            a.doMath(), u || (e < a.currentSlide ? a.currentSlide += 1 : e <= a.currentSlide && 0 !== e && (a.currentSlide -= 1), a.animatingTo = a.currentSlide), a.vars.controlNav && !a.manualControls && ("add" === t && !u || a.pagingCount > a.controlNav.length ? m.controlNav.update("add") : ("remove" === t && !u || a.pagingCount < a.controlNav.length) && (u && a.currentSlide > a.last && (a.currentSlide -= 1, a.animatingTo -= 1), m.controlNav.update("remove", a.last))), a.vars.directionNav && m.directionNav.update()
        }, a.addSlide = function(e, t) {
            var n = $(e);
            a.count += 1, a.last = a.count - 1, c && d ? void 0 !== t ? a.slides.eq(a.count - t).after(n) : a.container.prepend(n) : void 0 !== t ? a.slides.eq(t).before(n) : a.container.append(n), a.update(t, "add"), a.slides = $(a.vars.selector + ":not(.clone)", a), a.setup(), a.vars.added(a)
        }, a.removeSlide = function(e) {
            var t = isNaN(e) ? a.slides.index($(e)) : e;
            a.count -= 1, a.last = a.count - 1, isNaN(e) ? $(e, a.slides).remove() : c && d ? a.slides.eq(a.last).remove() : a.slides.eq(e).remove(), a.doMath(), a.update(t, "remove"), a.slides = $(a.vars.selector + ":not(.clone)", a), a.setup(), a.vars.removed(a)
        }, m.init()
    }, $(window).blur(function(e) {
        focused = !1
    }).focus(function(e) {
        focused = !0
    }), $.flexslider.defaults = {
        namespace: "flex-",
        selector: ".slides > li",
        animation: "fade",
        easing: "swing",
        direction: "horizontal",
        reverse: !1,
        animationLoop: !0,
        smoothHeight: !1,
        startAt: 0,
        slideshow: !0,
        slideshowSpeed: 7e3,
        animationSpeed: 600,
        initDelay: 0,
        randomize: !1,
        fadeFirstSlide: !0,
        thumbCaptions: !1,
        pauseOnAction: !0,
        pauseOnHover: !1,
        pauseInvisible: !0,
        useCSS: !0,
        touch: !0,
        video: !1,
        controlNav: !0,
        directionNav: !0,
        prevText: "Previous",
        nextText: "Next",
        keyboard: !0,
        multipleKeyboard: !1,
        mousewheel: !1,
        pausePlay: !1,
        pauseText: "Pause",
        playText: "Play",
        controlsContainer: "",
        manualControls: "",
        sync: "",
        asNavFor: "",
        itemWidth: 0,
        itemMargin: 0,
        minItems: 1,
        maxItems: 0,
        move: 0,
        allowOneSlide: !0,
        start: function() {},
        before: function() {},
        after: function() {},
        end: function() {},
        added: function() {},
        removed: function() {},
        init: function() {}
    }, $.fn.flexslider = function(e) {
        if (void 0 === e && (e = {}), "object" == typeof e) return this.each(function() {
            var t = $(this),
                a = e.selector ? e.selector : ".slides > li",
                n = t.find(a);
            1 === n.length && e.allowOneSlide === !0 || 0 === n.length ? (n.fadeIn(400), e.start && e.start(t)) : void 0 === t.data("flexslider") && new $.flexslider(this, e)
        });
        var t = $(this).data("flexslider");
        switch (e) {
            case "play":
                t.play();
                break;
            case "pause":
                t.pause();
                break;
            case "stop":
                t.stop();
                break;
            case "next":
                t.flexAnimate(t.getTarget("next"), !0);
                break;
            case "prev":
            case "previous":
                t.flexAnimate(t.getTarget("prev"), !0);
                break;
            default:
                "number" == typeof e && t.flexAnimate(e, !0)
        }
    }
}(jQuery);
// Shadowbox.js, version 3.0.3
(function(window, undefined) {
    var S = {
        version: "3.0.3"
    };
    var ua = navigator.userAgent.toLowerCase();
    if (ua.indexOf("windows") > -1 || ua.indexOf("win32") > -1) {
        S.isWindows = true
    } else {
        if (ua.indexOf("macintosh") > -1 || ua.indexOf("mac os x") > -1) {
            S.isMac = true
        } else {
            if (ua.indexOf("linux") > -1) {
                S.isLinux = true
            }
        }
    }
    S.isIE = ua.indexOf("msie") > -1;
    S.isIE6 = ua.indexOf("msie 6") > -1;
    S.isIE7 = ua.indexOf("msie 7") > -1;
    S.isGecko = ua.indexOf("gecko") > -1 && ua.indexOf("safari") == -1;
    S.isWebKit = ua.indexOf("applewebkit/") > -1;
    var inlineId = /#(.+)$/,
        galleryName = /^(light|shadow)box\[(.*?)\]/i,
        inlineParam = /\s*([a-z_]*?)\s*=\s*(.+)\s*/,
        fileExtension = /[0-9a-z]+$/i,
        scriptPath = /(.+\/)shadowbox\.js/i;
    var open = false,
        initialized = false,
        lastOptions = {},
        slideDelay = 0,
        slideStart, slideTimer;
    S.current = -1;
    S.dimensions = null;
    S.ease = function(state) {
        return 1 + Math.pow(state - 1, 3)
    };
    S.errorInfo = {
        fla: {
            name: "Flash",
            url: "http://www.adobe.com/products/flashplayer/"
        },
        qt: {
            name: "QuickTime",
            url: "http://www.apple.com/quicktime/download/"
        },
        wmp: {
            name: "Windows Media Player",
            url: "http://www.microsoft.com/windows/windowsmedia/"
        },
        f4m: {
            name: "Flip4Mac",
            url: "http://www.flip4mac.com/wmv_download.htm"
        }
    };
    S.gallery = [];
    S.onReady = noop;
    S.path = null;
    S.player = null;
    S.playerId = "sb-player";
    S.options = {
        animate: true,
        animateFade: true,
        autoplayMovies: true,
        continuous: false,
        enableKeys: true,
        flashParams: {
            bgcolor: "#000000",
            allowfullscreen: true
        },
        flashVars: {},
        flashVersion: "9.0.115",
        handleOversize: "resize",
        handleUnsupported: "link",
        onChange: noop,
        onClose: noop,
        onFinish: noop,
        onOpen: noop,
        showMovieControls: true,
        skipSetup: false,
        slideshowDelay: 0,
        viewportPadding: 20
    };
    S.getCurrent = function() {
        return S.current > -1 ? S.gallery[S.current] : null
    };
    S.hasNext = function() {
        return S.gallery.length > 1 && (S.current != S.gallery.length - 1 || S.options.continuous)
    };
    S.isOpen = function() {
        return open
    };
    S.isPaused = function() {
        return slideTimer == "pause"
    };
    S.applyOptions = function(options) {
        lastOptions = apply({}, S.options);
        apply(S.options, options)
    };
    S.revertOptions = function() {
        apply(S.options, lastOptions)
    };
    S.init = function(options, callback) {
        if (initialized) {
            return
        }
        initialized = true;
        if (S.skin.options) {
            apply(S.options, S.skin.options)
        }
        if (options) {
            apply(S.options, options)
        }
        if (!S.path) {
            var path, scripts = document.getElementsByTagName("script");
            for (var i = 0, len = scripts.length; i < len; ++i) {
                path = scriptPath.exec(scripts[i].src);
                if (path) {
                    S.path = path[1];
                    break
                }
            }
        }
        if (callback) {
            S.onReady = callback
        }
        bindLoad()
    };
    S.open = function(obj) {
        if (open) {
            return
        }
        var gc = S.makeGallery(obj);
        S.gallery = gc[0];
        S.current = gc[1];
        obj = S.getCurrent();
        if (obj == null) {
            return
        }
        S.applyOptions(obj.options || {});
        filterGallery();
        if (S.gallery.length) {
            obj = S.getCurrent();
            if (S.options.onOpen(obj) === false) {
                return
            }
            open = true;
            S.skin.onOpen(obj, load)
        }
    };
    S.close = function() {
        if (!open) {
            return
        }
        open = false;
        if (S.player) {
            S.player.remove();
            S.player = null
        }
        if (typeof slideTimer == "number") {
            clearTimeout(slideTimer);
            slideTimer = null
        }
        slideDelay = 0;
        listenKeys(false);
        S.options.onClose(S.getCurrent());
        S.skin.onClose();
        S.revertOptions()
    };
    S.play = function() {
        if (!S.hasNext()) {
            return
        }
        if (!slideDelay) {
            slideDelay = S.options.slideshowDelay * 1000
        }
        if (slideDelay) {
            slideStart = now();
            slideTimer = setTimeout(function() {
                slideDelay = slideStart = 0;
                S.next()
            }, slideDelay);
            if (S.skin.onPlay) {
                S.skin.onPlay()
            }
        }
    };
    S.pause = function() {
        if (typeof slideTimer != "number") {
            return
        }
        slideDelay = Math.max(0, slideDelay - (now() - slideStart));
        if (slideDelay) {
            clearTimeout(slideTimer);
            slideTimer = "pause";
            if (S.skin.onPause) {
                S.skin.onPause()
            }
        }
    };
    S.change = function(index) {
        if (!(index in S.gallery)) {
            if (S.options.continuous) {
                index = (index < 0 ? S.gallery.length + index : 0);
                if (!(index in S.gallery)) {
                    return
                }
            } else {
                return
            }
        }
        S.current = index;
        if (typeof slideTimer == "number") {
            clearTimeout(slideTimer);
            slideTimer = null;
            slideDelay = slideStart = 0
        }
        S.options.onChange(S.getCurrent());
        load(true)
    };
    S.next = function() {
        S.change(S.current + 1)
    };
    S.previous = function() {
        S.change(S.current - 1)
    };
    S.setDimensions = function(height, width, maxHeight, maxWidth, topBottom, leftRight, padding, preserveAspect) {
        var originalHeight = height,
            originalWidth = width;
        var extraHeight = 2 * padding + topBottom;
        if (height + extraHeight > maxHeight) {
            height = maxHeight - extraHeight
        }
        var extraWidth = 2 * padding + leftRight;
        if (width + extraWidth > maxWidth) {
            width = maxWidth - extraWidth
        }
        var changeHeight = (originalHeight - height) / originalHeight,
            changeWidth = (originalWidth - width) / originalWidth,
            oversized = (changeHeight > 0 || changeWidth > 0);
        if (preserveAspect && oversized) {
            if (changeHeight > changeWidth) {
                width = Math.round((originalWidth / originalHeight) * height)
            } else {
                if (changeWidth > changeHeight) {
                    height = Math.round((originalHeight / originalWidth) * width)
                }
            }
        }
        S.dimensions = {
            height: height + topBottom,
            width: width + leftRight,
            innerHeight: height,
            innerWidth: width,
            top: Math.floor((maxHeight - (height + extraHeight)) / 2 + padding),
            left: Math.floor((maxWidth - (width + extraWidth)) / 2 + padding),
            oversized: oversized
        };
        return S.dimensions
    };
    S.makeGallery = function(obj) {
        var gallery = [],
            current = -1;
        if (typeof obj == "string") {
            obj = [obj]
        }
        if (typeof obj.length == "number") {
            each(obj, function(i, o) {
                if (o.content) {
                    gallery[i] = o
                } else {
                    gallery[i] = {
                        content: o
                    }
                }
            });
            current = 0
        } else {
            if (obj.tagName) {
                var cacheObj = S.getCache(obj);
                obj = cacheObj ? cacheObj : S.makeObject(obj)
            }
            if (obj.gallery) {
                gallery = [];
                var o;
                for (var key in S.cache) {
                    o = S.cache[key];
                    if (o.gallery && o.gallery == obj.gallery) {
                        if (current == -1 && o.content == obj.content) {
                            current = gallery.length
                        }
                        gallery.push(o)
                    }
                }
                if (current == -1) {
                    gallery.unshift(obj);
                    current = 0
                }
            } else {
                gallery = [obj];
                current = 0
            }
        }
        each(gallery, function(i, o) {
            gallery[i] = apply({}, o)
        });
        return [gallery, current]
    };
    S.makeObject = function(link, options) {
        var obj = {
            content: link.href,
            title: link.getAttribute("title") || "",
            link: link
        };
        if (options) {
            options = apply({}, options);
            each(["player", "title", "height", "width", "gallery"], function(i, o) {
                if (typeof options[o] != "undefined") {
                    obj[o] = options[o];
                    delete options[o]
                }
            });
            obj.options = options
        } else {
            obj.options = {}
        }
        if (!obj.player) {
            obj.player = S.getPlayer(obj.content)
        }
        var rel = link.getAttribute("rel");
        if (rel) {
            var match = rel.match(galleryName);
            if (match) {
                obj.gallery = escape(match[2])
            }
            each(rel.split(";"), function(i, p) {
                match = p.match(inlineParam);
                if (match) {
                    obj[match[1]] = match[2]
                }
            })
        }
        return obj
    };
    S.getPlayer = function(content) {
        if (content.indexOf("#") > -1 && content.indexOf(document.location.href) == 0) {
            return "inline"
        }
        var q = content.indexOf("?");
        if (q > -1) {
            content = content.substring(0, q)
        }
        var ext, m = content.match(fileExtension);
        if (m) {
            ext = m[0].toLowerCase()
        }
        if (ext) {
            if (S.img && S.img.ext.indexOf(ext) > -1) {
                return "img"
            }
            if (S.swf && S.swf.ext.indexOf(ext) > -1) {
                return "swf"
            }
            if (S.flv && S.flv.ext.indexOf(ext) > -1) {
                return "flv"
            }
            if (S.qt && S.qt.ext.indexOf(ext) > -1) {
                if (S.wmp && S.wmp.ext.indexOf(ext) > -1) {
                    return "qtwmp"
                } else {
                    return "qt"
                }
            }
            if (S.wmp && S.wmp.ext.indexOf(ext) > -1) {
                return "wmp"
            }
        }
        return "iframe"
    };

    function filterGallery() {
        var err = S.errorInfo,
            plugins = S.plugins,
            obj, remove, needed, m, format, replace, inlineEl, flashVersion;
        for (var i = 0; i < S.gallery.length; ++i) {
            obj = S.gallery[i];
            remove = false;
            needed = null;
            switch (obj.player) {
                case "flv":
                case "swf":
                    if (!plugins.fla) {
                        needed = "fla"
                    }
                    break;
                case "qt":
                    if (!plugins.qt) {
                        needed = "qt"
                    }
                    break;
                case "wmp":
                    if (S.isMac) {
                        if (plugins.qt && plugins.f4m) {
                            obj.player = "qt"
                        } else {
                            needed = "qtf4m"
                        }
                    } else {
                        if (!plugins.wmp) {
                            needed = "wmp"
                        }
                    }
                    break;
                case "qtwmp":
                    if (plugins.qt) {
                        obj.player = "qt"
                    } else {
                        if (plugins.wmp) {
                            obj.player = "wmp"
                        } else {
                            needed = "qtwmp"
                        }
                    }
                    break
            }
            if (needed) {
                if (S.options.handleUnsupported == "link") {
                    switch (needed) {
                        case "qtf4m":
                            format = "shared";
                            replace = [err.qt.url, err.qt.name, err.f4m.url, err.f4m.name];
                            break;
                        case "qtwmp":
                            format = "either";
                            replace = [err.qt.url, err.qt.name, err.wmp.url, err.wmp.name];
                            break;
                        default:
                            format = "single";
                            replace = [err[needed].url, err[needed].name]
                    }
                    obj.player = "html";
                    obj.content = '<div class="sb-message">' + sprintf(S.lang.errors[format], replace) + "</div>"
                } else {
                    remove = true
                }
            } else {
                if (obj.player == "inline") {
                    m = inlineId.exec(obj.content);
                    if (m) {
                        inlineEl = get(m[1]);
                        if (inlineEl) {
                            obj.content = inlineEl.innerHTML
                        } else {
                            remove = true
                        }
                    } else {
                        remove = true
                    }
                } else {
                    if (obj.player == "swf" || obj.player == "flv") {
                        flashVersion = (obj.options && obj.options.flashVersion) || S.options.flashVersion;
                        if (S.flash && !S.flash.hasFlashPlayerVersion(flashVersion)) {
                            obj.width = 310;
                            obj.height = 177
                        }
                    }
                }
            }
            if (remove) {
                S.gallery.splice(i, 1);
                if (i < S.current) {
                    --S.current
                } else {
                    if (i == S.current) {
                        S.current = i > 0 ? i - 1 : i
                    }
                }--i
            }
        }
    }

    function listenKeys(on) {
        if (!S.options.enableKeys) {
            return
        }(on ? addEvent : removeEvent)(document, "keydown", handleKey)
    }

    function handleKey(e) {
        if (e.metaKey || e.shiftKey || e.altKey || e.ctrlKey) {
            return
        }
        var code = keyCode(e),
            handler;
        switch (code) {
            case 81:
            case 88:
            case 27:
                handler = S.close;
                break;
            case 37:
                handler = S.previous;
                break;
            case 39:
                handler = S.next;
                break;
            case 32:
                handler = typeof slideTimer == "number" ? S.pause : S.play;
                break
        }
        if (handler) {
            preventDefault(e);
            handler()
        }
    }

    function load(changing) {
        listenKeys(false);
        var obj = S.getCurrent();
        var player = (obj.player == "inline" ? "html" : obj.player);
        if (typeof S[player] != "function") {
            throw "unknown player " + player
        }
        if (changing) {
            S.player.remove();
            S.revertOptions();
            S.applyOptions(obj.options || {})
        }
        S.player = new S[player](obj, S.playerId);
        if (S.gallery.length > 1) {
            var next = S.gallery[S.current + 1] || S.gallery[0];
            if (next.player == "img") {
                var a = new Image();
                a.src = next.content
            }
            var prev = S.gallery[S.current - 1] || S.gallery[S.gallery.length - 1];
            if (prev.player == "img") {
                var b = new Image();
                b.src = prev.content
            }
        }
        S.skin.onLoad(changing, waitReady)
    }

    function waitReady() {
        if (!open) {
            return
        }
        if (typeof S.player.ready != "undefined") {
            var timer = setInterval(function() {
                if (open) {
                    if (S.player.ready) {
                        clearInterval(timer);
                        timer = null;
                        S.skin.onReady(show)
                    }
                } else {
                    clearInterval(timer);
                    timer = null
                }
            }, 10)
        } else {
            S.skin.onReady(show)
        }
    }

    function show() {
        if (!open) {
            return
        }
        S.player.append(S.skin.body, S.dimensions);
        S.skin.onShow(finish)
    }

    function finish() {
        if (!open) {
            return
        }
        if (S.player.onLoad) {
            S.player.onLoad()
        }
        S.options.onFinish(S.getCurrent());
        if (!S.isPaused()) {
            S.play()
        }
        listenKeys(true)
    }
    if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function(obj, from) {
            var len = this.length >>> 0;
            from = from || 0;
            if (from < 0) {
                from += len
            }
            for (; from < len; ++from) {
                if (from in this && this[from] === obj) {
                    return from
                }
            }
            return -1
        }
    }

    function now() {
        return (new Date).getTime()
    }

    function apply(original, extension) {
        for (var property in extension) {
            original[property] = extension[property]
        }
        return original
    }

    function each(obj, callback) {
        var i = 0,
            len = obj.length;
        for (var value = obj[0]; i < len && callback.call(value, i, value) !== false; value = obj[++i]) {}
    }

    function sprintf(str, replace) {
        return str.replace(/\{(\w+?)\}/g, function(match, i) {
            return replace[i]
        })
    }

    function noop() {}

    function get(id) {
        return document.getElementById(id)
    }

    function remove(el) {
        el.parentNode.removeChild(el)
    }
    var supportsOpacity = true,
        supportsFixed = true;

    function checkSupport() {
        var body = document.body,
            div = document.createElement("div");
        supportsOpacity = typeof div.style.opacity === "string";
        div.style.position = "fixed";
        div.style.margin = 0;
        div.style.top = "20px";
        body.appendChild(div, body.firstChild);
        supportsFixed = div.offsetTop == 20;
        body.removeChild(div)
    }
    S.getStyle = (function() {
        var opacity = /opacity=([^)]*)/,
            getComputedStyle = document.defaultView && document.defaultView.getComputedStyle;
        return function(el, style) {
            var ret;
            if (!supportsOpacity && style == "opacity" && el.currentStyle) {
                ret = opacity.test(el.currentStyle.filter || "") ? (parseFloat(RegExp.$1) / 100) + "" : "";
                return ret === "" ? "1" : ret
            }
            if (getComputedStyle) {
                var computedStyle = getComputedStyle(el, null);
                if (computedStyle) {
                    ret = computedStyle[style]
                }
                if (style == "opacity" && ret == "") {
                    ret = "1"
                }
            } else {
                ret = el.currentStyle[style]
            }
            return ret
        }
    })();
    S.appendHTML = function(el, html) {
        if (el.insertAdjacentHTML) {
            el.insertAdjacentHTML("BeforeEnd", html)
        } else {
            if (el.lastChild) {
                var range = el.ownerDocument.createRange();
                range.setStartAfter(el.lastChild);
                var frag = range.createContextualFragment(html);
                el.appendChild(frag)
            } else {
                el.innerHTML = html
            }
        }
    };
    S.getWindowSize = function(dimension) {
        if (document.compatMode === "CSS1Compat") {
            return document.documentElement["client" + dimension]
        }
        return document.body["client" + dimension]
    };
    S.setOpacity = function(el, opacity) {
        var style = el.style;
        if (supportsOpacity) {
            style.opacity = (opacity == 1 ? "" : opacity)
        } else {
            style.zoom = 1;
            if (opacity == 1) {
                if (typeof style.filter == "string" && (/alpha/i).test(style.filter)) {
                    style.filter = style.filter.replace(/\s*[\w\.]*alpha\([^\)]*\);?/gi, "")
                }
            } else {
                style.filter = (style.filter || "").replace(/\s*[\w\.]*alpha\([^\)]*\)/gi, "") + " alpha(opacity=" + (opacity * 100) + ")"
            }
        }
    };
    S.clearOpacity = function(el) {
        S.setOpacity(el, 1)
    };

    function getTarget(e) {
        return e.target
    }

    function getPageXY(e) {
        return [e.pageX, e.pageY]
    }

    function preventDefault(e) {
        e.preventDefault()
    }

    function keyCode(e) {
        return e.keyCode
    }

    function addEvent(el, type, handler) {
        jQuery(el).bind(type, handler)
    }

    function removeEvent(el, type, handler) {
        jQuery(el).unbind(type, handler)
    }
    jQuery.fn.shadowbox = function(options) {
        return this.each(function() {
            var el = jQuery(this);
            var opts = jQuery.extend({}, options || {}, jQuery.metadata ? el.metadata() : jQuery.meta ? el.data() : {});
            var cls = this.className || "";
            opts.width = parseInt((cls.match(/w:(\d+)/) || [])[1]) || opts.width;
            opts.height = parseInt((cls.match(/h:(\d+)/) || [])[1]) || opts.height;
            Shadowbox.setup(el, opts)
        })
    };
    var loaded = false,
        DOMContentLoaded;
    if (document.addEventListener) {
        DOMContentLoaded = function() {
            document.removeEventListener("DOMContentLoaded", DOMContentLoaded, false);
            S.load()
        }
    } else {
        if (document.attachEvent) {
            DOMContentLoaded = function() {
                if (document.readyState === "complete") {
                    document.detachEvent("onreadystatechange", DOMContentLoaded);
                    S.load()
                }
            }
        }
    }

    function doScrollCheck() {
        if (loaded) {
            return
        }
        try {
            document.documentElement.doScroll("left")
        } catch (e) {
            setTimeout(doScrollCheck, 1);
            return
        }
        S.load()
    }

    function bindLoad() {
        if (document.readyState === "complete") {
            return S.load()
        }
        if (document.addEventListener) {
            document.addEventListener("DOMContentLoaded", DOMContentLoaded, false);
            window.addEventListener("load", S.load, false)
        } else {
            if (document.attachEvent) {
                document.attachEvent("onreadystatechange", DOMContentLoaded);
                window.attachEvent("onload", S.load);
                var topLevel = false;
                try {
                    topLevel = window.frameElement === null
                } catch (e) {}
                if (document.documentElement.doScroll && topLevel) {
                    doScrollCheck()
                }
            }
        }
    }
    S.load = function() {
        if (loaded) {
            return
        }
        if (!document.body) {
            return setTimeout(S.load, 13)
        }
        loaded = true;
        checkSupport();
        S.onReady();
        if (!S.options.skipSetup) {
            S.setup()
        }
        S.skin.init()
    };
    S.plugins = {};
    if (navigator.plugins && navigator.plugins.length) {
        var names = [];
        each(navigator.plugins, function(i, p) {
            names.push(p.name)
        });
        names = names.join(",");
        var f4m = names.indexOf("Flip4Mac") > -1;
        S.plugins = {
            fla: names.indexOf("Shockwave Flash") > -1,
            qt: names.indexOf("QuickTime") > -1,
            wmp: !f4m && names.indexOf("Windows Media") > -1,
            f4m: f4m
        }
    } else {
        var detectPlugin = function(name) {
            var axo;
            try {
                axo = new ActiveXObject(name)
            } catch (e) {}
            return !!axo
        };
        S.plugins = {
            fla: detectPlugin("ShockwaveFlash.ShockwaveFlash"),
            qt: detectPlugin("QuickTime.QuickTime"),
            wmp: detectPlugin("wmplayer.ocx"),
            f4m: false
        }
    }
    var relAttr = /^(light|shadow)box/i,
        expando = "shadowboxCacheKey",
        cacheKey = 1;
    S.cache = {};
    S.select = function(selector) {
        var links = [];
        if (!selector) {
            var rel;
            each(document.getElementsByTagName("a"), function(i, el) {
                rel = el.getAttribute("rel");
                if (rel && relAttr.test(rel)) {
                    links.push(el)
                }
            })
        } else {
            var length = selector.length;
            if (length) {
                if (typeof selector == "string") {
                    if (S.find) {
                        links = S.find(selector)
                    }
                } else {
                    if (length == 2 && typeof selector[0] == "string" && selector[1].nodeType) {
                        if (S.find) {
                            links = S.find(selector[0], selector[1])
                        }
                    } else {
                        for (var i = 0; i < length; ++i) {
                            links[i] = selector[i]
                        }
                    }
                }
            } else {
                links.push(selector)
            }
        }
        return links
    };
    S.setup = function(selector, options) {
        each(S.select(selector), function(i, link) {
            S.addCache(link, options)
        })
    };
    S.teardown = function(selector) {
        each(S.select(selector), function(i, link) {
            S.removeCache(link)
        })
    };
    S.addCache = function(link, options) {
        var key = link[expando];
        if (key == undefined) {
            key = cacheKey++;
            link[expando] = key;
            addEvent(link, "click", handleClick)
        }
        S.cache[key] = S.makeObject(link, options)
    };
    S.removeCache = function(link) {
        removeEvent(link, "click", handleClick);
        delete S.cache[link[expando]];
        link[expando] = null
    };
    S.getCache = function(link) {
        var key = link[expando];
        return (key in S.cache && S.cache[key])
    };
    S.clearCache = function() {
        for (var key in S.cache) {
            S.removeCache(S.cache[key].link)
        }
        S.cache = {}
    };

    function handleClick(e) {
        S.open(this);
        if (S.gallery.length) {
            preventDefault(e)
        }
    }
    S.find = (function() {
        var chunker = /((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^[\]]*\]|['"][^'"]*['"]|[^[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,
            done = 0,
            toString = Object.prototype.toString,
            hasDuplicate = false,
            baseHasDuplicate = true;
        [0, 0].sort(function() {
            baseHasDuplicate = false;
            return 0
        });
        var Sizzle = function(selector, context, results, seed) {
            results = results || [];
            var origContext = context = context || document;
            if (context.nodeType !== 1 && context.nodeType !== 9) {
                return []
            }
            if (!selector || typeof selector !== "string") {
                return results
            }
            var parts = [],
                m, set, checkSet, extra, prune = true,
                contextXML = isXML(context),
                soFar = selector;
            while ((chunker.exec(""), m = chunker.exec(soFar)) !== null) {
                soFar = m[3];
                parts.push(m[1]);
                if (m[2]) {
                    extra = m[3];
                    break
                }
            }
            if (parts.length > 1 && origPOS.exec(selector)) {
                if (parts.length === 2 && Expr.relative[parts[0]]) {
                    set = posProcess(parts[0] + parts[1], context)
                } else {
                    set = Expr.relative[parts[0]] ? [context] : Sizzle(parts.shift(), context);
                    while (parts.length) {
                        selector = parts.shift();
                        if (Expr.relative[selector]) {
                            selector += parts.shift()
                        }
                        set = posProcess(selector, set)
                    }
                }
            } else {
                if (!seed && parts.length > 1 && context.nodeType === 9 && !contextXML && Expr.match.ID.test(parts[0]) && !Expr.match.ID.test(parts[parts.length - 1])) {
                    var ret = Sizzle.find(parts.shift(), context, contextXML);
                    context = ret.expr ? Sizzle.filter(ret.expr, ret.set)[0] : ret.set[0]
                }
                if (context) {
                    var ret = seed ? {
                        expr: parts.pop(),
                        set: makeArray(seed)
                    } : Sizzle.find(parts.pop(), parts.length === 1 && (parts[0] === "~" || parts[0] === "+") && context.parentNode ? context.parentNode : context, contextXML);
                    set = ret.expr ? Sizzle.filter(ret.expr, ret.set) : ret.set;
                    if (parts.length > 0) {
                        checkSet = makeArray(set)
                    } else {
                        prune = false
                    }
                    while (parts.length) {
                        var cur = parts.pop(),
                            pop = cur;
                        if (!Expr.relative[cur]) {
                            cur = ""
                        } else {
                            pop = parts.pop()
                        }
                        if (pop == null) {
                            pop = context
                        }
                        Expr.relative[cur](checkSet, pop, contextXML)
                    }
                } else {
                    checkSet = parts = []
                }
            }
            if (!checkSet) {
                checkSet = set
            }
            if (!checkSet) {
                throw "Syntax error, unrecognized expression: " + (cur || selector)
            }
            if (toString.call(checkSet) === "[object Array]") {
                if (!prune) {
                    results.push.apply(results, checkSet)
                } else {
                    if (context && context.nodeType === 1) {
                        for (var i = 0; checkSet[i] != null; i++) {
                            if (checkSet[i] && (checkSet[i] === true || checkSet[i].nodeType === 1 && contains(context, checkSet[i]))) {
                                results.push(set[i])
                            }
                        }
                    } else {
                        for (var i = 0; checkSet[i] != null; i++) {
                            if (checkSet[i] && checkSet[i].nodeType === 1) {
                                results.push(set[i])
                            }
                        }
                    }
                }
            } else {
                makeArray(checkSet, results)
            }
            if (extra) {
                Sizzle(extra, origContext, results, seed);
                Sizzle.uniqueSort(results)
            }
            return results
        };
        Sizzle.uniqueSort = function(results) {
            if (sortOrder) {
                hasDuplicate = baseHasDuplicate;
                results.sort(sortOrder);
                if (hasDuplicate) {
                    for (var i = 1; i < results.length; i++) {
                        if (results[i] === results[i - 1]) {
                            results.splice(i--, 1)
                        }
                    }
                }
            }
            return results
        };
        Sizzle.matches = function(expr, set) {
            return Sizzle(expr, null, null, set)
        };
        Sizzle.find = function(expr, context, isXML) {
            var set, match;
            if (!expr) {
                return []
            }
            for (var i = 0, l = Expr.order.length; i < l; i++) {
                var type = Expr.order[i],
                    match;
                if ((match = Expr.leftMatch[type].exec(expr))) {
                    var left = match[1];
                    match.splice(1, 1);
                    if (left.substr(left.length - 1) !== "\\") {
                        match[1] = (match[1] || "").replace(/\\/g, "");
                        set = Expr.find[type](match, context, isXML);
                        if (set != null) {
                            expr = expr.replace(Expr.match[type], "");
                            break
                        }
                    }
                }
            }
            if (!set) {
                set = context.getElementsByTagName("*")
            }
            return {
                set: set,
                expr: expr
            }
        };
        Sizzle.filter = function(expr, set, inplace, not) {
            var old = expr,
                result = [],
                curLoop = set,
                match, anyFound, isXMLFilter = set && set[0] && isXML(set[0]);
            while (expr && set.length) {
                for (var type in Expr.filter) {
                    if ((match = Expr.match[type].exec(expr)) != null) {
                        var filter = Expr.filter[type],
                            found, item;
                        anyFound = false;
                        if (curLoop === result) {
                            result = []
                        }
                        if (Expr.preFilter[type]) {
                            match = Expr.preFilter[type](match, curLoop, inplace, result, not, isXMLFilter);
                            if (!match) {
                                anyFound = found = true
                            } else {
                                if (match === true) {
                                    continue
                                }
                            }
                        }
                        if (match) {
                            for (var i = 0;
                                (item = curLoop[i]) != null; i++) {
                                if (item) {
                                    found = filter(item, match, i, curLoop);
                                    var pass = not ^ !!found;
                                    if (inplace && found != null) {
                                        if (pass) {
                                            anyFound = true
                                        } else {
                                            curLoop[i] = false
                                        }
                                    } else {
                                        if (pass) {
                                            result.push(item);
                                            anyFound = true
                                        }
                                    }
                                }
                            }
                        }
                        if (found !== undefined) {
                            if (!inplace) {
                                curLoop = result
                            }
                            expr = expr.replace(Expr.match[type], "");
                            if (!anyFound) {
                                return []
                            }
                            break
                        }
                    }
                }
                if (expr === old) {
                    if (anyFound == null) {
                        throw "Syntax error, unrecognized expression: " + expr
                    } else {
                        break
                    }
                }
                old = expr
            }
            return curLoop
        };
        var Expr = Sizzle.selectors = {
            order: ["ID", "NAME", "TAG"],
            match: {
                ID: /#((?:[\w\u00c0-\uFFFF-]|\\.)+)/,
                CLASS: /\.((?:[\w\u00c0-\uFFFF-]|\\.)+)/,
                NAME: /\[name=['"]*((?:[\w\u00c0-\uFFFF-]|\\.)+)['"]*\]/,
                ATTR: /\[\s*((?:[\w\u00c0-\uFFFF-]|\\.)+)\s*(?:(\S?=)\s*(['"]*)(.*?)\3|)\s*\]/,
                TAG: /^((?:[\w\u00c0-\uFFFF\*-]|\\.)+)/,
                CHILD: /:(only|nth|last|first)-child(?:\((even|odd|[\dn+-]*)\))?/,
                POS: /:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^-]|$)/,
                PSEUDO: /:((?:[\w\u00c0-\uFFFF-]|\\.)+)(?:\((['"]*)((?:\([^\)]+\)|[^\2\(\)]*)+)\2\))?/
            },
            leftMatch: {},
            attrMap: {
                "class": "className",
                "for": "htmlFor"
            },
            attrHandle: {
                href: function(elem) {
                    return elem.getAttribute("href")
                }
            },
            relative: {
                "+": function(checkSet, part) {
                    var isPartStr = typeof part === "string",
                        isTag = isPartStr && !/\W/.test(part),
                        isPartStrNotTag = isPartStr && !isTag;
                    if (isTag) {
                        part = part.toLowerCase()
                    }
                    for (var i = 0, l = checkSet.length, elem; i < l; i++) {
                        if ((elem = checkSet[i])) {
                            while ((elem = elem.previousSibling) && elem.nodeType !== 1) {}
                            checkSet[i] = isPartStrNotTag || elem && elem.nodeName.toLowerCase() === part ? elem || false : elem === part
                        }
                    }
                    if (isPartStrNotTag) {
                        Sizzle.filter(part, checkSet, true)
                    }
                },
                ">": function(checkSet, part) {
                    var isPartStr = typeof part === "string";
                    if (isPartStr && !/\W/.test(part)) {
                        part = part.toLowerCase();
                        for (var i = 0, l = checkSet.length; i < l; i++) {
                            var elem = checkSet[i];
                            if (elem) {
                                var parent = elem.parentNode;
                                checkSet[i] = parent.nodeName.toLowerCase() === part ? parent : false
                            }
                        }
                    } else {
                        for (var i = 0, l = checkSet.length; i < l; i++) {
                            var elem = checkSet[i];
                            if (elem) {
                                checkSet[i] = isPartStr ? elem.parentNode : elem.parentNode === part
                            }
                        }
                        if (isPartStr) {
                            Sizzle.filter(part, checkSet, true)
                        }
                    }
                },
                "": function(checkSet, part, isXML) {
                    var doneName = done++,
                        checkFn = dirCheck;
                    if (typeof part === "string" && !/\W/.test(part)) {
                        var nodeCheck = part = part.toLowerCase();
                        checkFn = dirNodeCheck
                    }
                    checkFn("parentNode", part, doneName, checkSet, nodeCheck, isXML)
                },
                "~": function(checkSet, part, isXML) {
                    var doneName = done++,
                        checkFn = dirCheck;
                    if (typeof part === "string" && !/\W/.test(part)) {
                        var nodeCheck = part = part.toLowerCase();
                        checkFn = dirNodeCheck
                    }
                    checkFn("previousSibling", part, doneName, checkSet, nodeCheck, isXML)
                }
            },
            find: {
                ID: function(match, context, isXML) {
                    if (typeof context.getElementById !== "undefined" && !isXML) {
                        var m = context.getElementById(match[1]);
                        return m ? [m] : []
                    }
                },
                NAME: function(match, context) {
                    if (typeof context.getElementsByName !== "undefined") {
                        var ret = [],
                            results = context.getElementsByName(match[1]);
                        for (var i = 0, l = results.length; i < l; i++) {
                            if (results[i].getAttribute("name") === match[1]) {
                                ret.push(results[i])
                            }
                        }
                        return ret.length === 0 ? null : ret
                    }
                },
                TAG: function(match, context) {
                    return context.getElementsByTagName(match[1])
                }
            },
            preFilter: {
                CLASS: function(match, curLoop, inplace, result, not, isXML) {
                    match = " " + match[1].replace(/\\/g, "") + " ";
                    if (isXML) {
                        return match
                    }
                    for (var i = 0, elem;
                        (elem = curLoop[i]) != null; i++) {
                        if (elem) {
                            if (not ^ (elem.className && (" " + elem.className + " ").replace(/[\t\n]/g, " ").indexOf(match) >= 0)) {
                                if (!inplace) {
                                    result.push(elem)
                                }
                            } else {
                                if (inplace) {
                                    curLoop[i] = false
                                }
                            }
                        }
                    }
                    return false
                },
                ID: function(match) {
                    return match[1].replace(/\\/g, "")
                },
                TAG: function(match, curLoop) {
                    return match[1].toLowerCase()
                },
                CHILD: function(match) {
                    if (match[1] === "nth") {
                        var test = /(-?)(\d*)n((?:\+|-)?\d*)/.exec(match[2] === "even" && "2n" || match[2] === "odd" && "2n+1" || !/\D/.test(match[2]) && "0n+" + match[2] || match[2]);
                        match[2] = (test[1] + (test[2] || 1)) - 0;
                        match[3] = test[3] - 0
                    }
                    match[0] = done++;
                    return match
                },
                ATTR: function(match, curLoop, inplace, result, not, isXML) {
                    var name = match[1].replace(/\\/g, "");
                    if (!isXML && Expr.attrMap[name]) {
                        match[1] = Expr.attrMap[name]
                    }
                    if (match[2] === "~=") {
                        match[4] = " " + match[4] + " "
                    }
                    return match
                },
                PSEUDO: function(match, curLoop, inplace, result, not) {
                    if (match[1] === "not") {
                        if ((chunker.exec(match[3]) || "").length > 1 || /^\w/.test(match[3])) {
                            match[3] = Sizzle(match[3], null, null, curLoop)
                        } else {
                            var ret = Sizzle.filter(match[3], curLoop, inplace, true ^ not);
                            if (!inplace) {
                                result.push.apply(result, ret)
                            }
                            return false
                        }
                    } else {
                        if (Expr.match.POS.test(match[0]) || Expr.match.CHILD.test(match[0])) {
                            return true
                        }
                    }
                    return match
                },
                POS: function(match) {
                    match.unshift(true);
                    return match
                }
            },
            filters: {
                enabled: function(elem) {
                    return elem.disabled === false && elem.type !== "hidden"
                },
                disabled: function(elem) {
                    return elem.disabled === true
                },
                checked: function(elem) {
                    return elem.checked === true
                },
                selected: function(elem) {
                    elem.parentNode.selectedIndex;
                    return elem.selected === true
                },
                parent: function(elem) {
                    return !!elem.firstChild
                },
                empty: function(elem) {
                    return !elem.firstChild
                },
                has: function(elem, i, match) {
                    return !!Sizzle(match[3], elem).length
                },
                header: function(elem) {
                    return /h\d/i.test(elem.nodeName)
                },
                text: function(elem) {
                    return "text" === elem.type
                },
                radio: function(elem) {
                    return "radio" === elem.type
                },
                checkbox: function(elem) {
                    return "checkbox" === elem.type
                },
                file: function(elem) {
                    return "file" === elem.type
                },
                password: function(elem) {
                    return "password" === elem.type
                },
                submit: function(elem) {
                    return "submit" === elem.type
                },
                image: function(elem) {
                    return "image" === elem.type
                },
                reset: function(elem) {
                    return "reset" === elem.type
                },
                button: function(elem) {
                    return "button" === elem.type || elem.nodeName.toLowerCase() === "button"
                },
                input: function(elem) {
                    return /input|select|textarea|button/i.test(elem.nodeName)
                }
            },
            setFilters: {
                first: function(elem, i) {
                    return i === 0
                },
                last: function(elem, i, match, array) {
                    return i === array.length - 1
                },
                even: function(elem, i) {
                    return i % 2 === 0
                },
                odd: function(elem, i) {
                    return i % 2 === 1
                },
                lt: function(elem, i, match) {
                    return i < match[3] - 0
                },
                gt: function(elem, i, match) {
                    return i > match[3] - 0
                },
                nth: function(elem, i, match) {
                    return match[3] - 0 === i
                },
                eq: function(elem, i, match) {
                    return match[3] - 0 === i
                }
            },
            filter: {
                PSEUDO: function(elem, match, i, array) {
                    var name = match[1],
                        filter = Expr.filters[name];
                    if (filter) {
                        return filter(elem, i, match, array)
                    } else {
                        if (name === "contains") {
                            return (elem.textContent || elem.innerText || getText([elem]) || "").indexOf(match[3]) >= 0
                        } else {
                            if (name === "not") {
                                var not = match[3];
                                for (var i = 0, l = not.length; i < l; i++) {
                                    if (not[i] === elem) {
                                        return false
                                    }
                                }
                                return true
                            } else {
                                throw "Syntax error, unrecognized expression: " + name
                            }
                        }
                    }
                },
                CHILD: function(elem, match) {
                    var type = match[1],
                        node = elem;
                    switch (type) {
                        case "only":
                        case "first":
                            while ((node = node.previousSibling)) {
                                if (node.nodeType === 1) {
                                    return false
                                }
                            }
                            if (type === "first") {
                                return true
                            }
                            node = elem;
                        case "last":
                            while ((node = node.nextSibling)) {
                                if (node.nodeType === 1) {
                                    return false
                                }
                            }
                            return true;
                        case "nth":
                            var first = match[2],
                                last = match[3];
                            if (first === 1 && last === 0) {
                                return true
                            }
                            var doneName = match[0],
                                parent = elem.parentNode;
                            if (parent && (parent.sizcache !== doneName || !elem.nodeIndex)) {
                                var count = 0;
                                for (node = parent.firstChild; node; node = node.nextSibling) {
                                    if (node.nodeType === 1) {
                                        node.nodeIndex = ++count
                                    }
                                }
                                parent.sizcache = doneName
                            }
                            var diff = elem.nodeIndex - last;
                            if (first === 0) {
                                return diff === 0
                            } else {
                                return (diff % first === 0 && diff / first >= 0)
                            }
                    }
                },
                ID: function(elem, match) {
                    return elem.nodeType === 1 && elem.getAttribute("id") === match
                },
                TAG: function(elem, match) {
                    return (match === "*" && elem.nodeType === 1) || elem.nodeName.toLowerCase() === match
                },
                CLASS: function(elem, match) {
                    return (" " + (elem.className || elem.getAttribute("class")) + " ").indexOf(match) > -1
                },
                ATTR: function(elem, match) {
                    var name = match[1],
                        result = Expr.attrHandle[name] ? Expr.attrHandle[name](elem) : elem[name] != null ? elem[name] : elem.getAttribute(name),
                        value = result + "",
                        type = match[2],
                        check = match[4];
                    return result == null ? type === "!=" : type === "=" ? value === check : type === "*=" ? value.indexOf(check) >= 0 : type === "~=" ? (" " + value + " ").indexOf(check) >= 0 : !check ? value && result !== false : type === "!=" ? value !== check : type === "^=" ? value.indexOf(check) === 0 : type === "$=" ? value.substr(value.length - check.length) === check : type === "|=" ? value === check || value.substr(0, check.length + 1) === check + "-" : false
                },
                POS: function(elem, match, i, array) {
                    var name = match[2],
                        filter = Expr.setFilters[name];
                    if (filter) {
                        return filter(elem, i, match, array)
                    }
                }
            }
        };
        var origPOS = Expr.match.POS;
        for (var type in Expr.match) {
            Expr.match[type] = new RegExp(Expr.match[type].source + /(?![^\[]*\])(?![^\(]*\))/.source);
            Expr.leftMatch[type] = new RegExp(/(^(?:.|\r|\n)*?)/.source + Expr.match[type].source)
        }
        var makeArray = function(array, results) {
            array = Array.prototype.slice.call(array, 0);
            if (results) {
                results.push.apply(results, array);
                return results
            }
            return array
        };
        try {
            Array.prototype.slice.call(document.documentElement.childNodes, 0)
        } catch (e) {
            makeArray = function(array, results) {
                var ret = results || [];
                if (toString.call(array) === "[object Array]") {
                    Array.prototype.push.apply(ret, array)
                } else {
                    if (typeof array.length === "number") {
                        for (var i = 0, l = array.length; i < l; i++) {
                            ret.push(array[i])
                        }
                    } else {
                        for (var i = 0; array[i]; i++) {
                            ret.push(array[i])
                        }
                    }
                }
                return ret
            }
        }
        var sortOrder;
        if (document.documentElement.compareDocumentPosition) {
            sortOrder = function(a, b) {
                if (!a.compareDocumentPosition || !b.compareDocumentPosition) {
                    if (a == b) {
                        hasDuplicate = true
                    }
                    return a.compareDocumentPosition ? -1 : 1
                }
                var ret = a.compareDocumentPosition(b) & 4 ? -1 : a === b ? 0 : 1;
                if (ret === 0) {
                    hasDuplicate = true
                }
                return ret
            }
        } else {
            if ("sourceIndex" in document.documentElement) {
                sortOrder = function(a, b) {
                    if (!a.sourceIndex || !b.sourceIndex) {
                        if (a == b) {
                            hasDuplicate = true
                        }
                        return a.sourceIndex ? -1 : 1
                    }
                    var ret = a.sourceIndex - b.sourceIndex;
                    if (ret === 0) {
                        hasDuplicate = true
                    }
                    return ret
                }
            } else {
                if (document.createRange) {
                    sortOrder = function(a, b) {
                        if (!a.ownerDocument || !b.ownerDocument) {
                            if (a == b) {
                                hasDuplicate = true
                            }
                            return a.ownerDocument ? -1 : 1
                        }
                        var aRange = a.ownerDocument.createRange(),
                            bRange = b.ownerDocument.createRange();
                        aRange.setStart(a, 0);
                        aRange.setEnd(a, 0);
                        bRange.setStart(b, 0);
                        bRange.setEnd(b, 0);
                        var ret = aRange.compareBoundaryPoints(Range.START_TO_END, bRange);
                        if (ret === 0) {
                            hasDuplicate = true
                        }
                        return ret
                    }
                }
            }
        }

        function getText(elems) {
            var ret = "",
                elem;
            for (var i = 0; elems[i]; i++) {
                elem = elems[i];
                if (elem.nodeType === 3 || elem.nodeType === 4) {
                    ret += elem.nodeValue
                } else {
                    if (elem.nodeType !== 8) {
                        ret += getText(elem.childNodes)
                    }
                }
            }
            return ret
        }(function() {
            var form = document.createElement("div"),
                id = "script" + (new Date).getTime();
            form.innerHTML = "<a name='" + id + "'/>";
            var root = document.documentElement;
            root.insertBefore(form, root.firstChild);
            if (document.getElementById(id)) {
                Expr.find.ID = function(match, context, isXML) {
                    if (typeof context.getElementById !== "undefined" && !isXML) {
                        var m = context.getElementById(match[1]);
                        return m ? m.id === match[1] || typeof m.getAttributeNode !== "undefined" && m.getAttributeNode("id").nodeValue === match[1] ? [m] : undefined : []
                    }
                };
                Expr.filter.ID = function(elem, match) {
                    var node = typeof elem.getAttributeNode !== "undefined" && elem.getAttributeNode("id");
                    return elem.nodeType === 1 && node && node.nodeValue === match
                }
            }
            root.removeChild(form);
            root = form = null
        })();
        (function() {
            var div = document.createElement("div");
            div.appendChild(document.createComment(""));
            if (div.getElementsByTagName("*").length > 0) {
                Expr.find.TAG = function(match, context) {
                    var results = context.getElementsByTagName(match[1]);
                    if (match[1] === "*") {
                        var tmp = [];
                        for (var i = 0; results[i]; i++) {
                            if (results[i].nodeType === 1) {
                                tmp.push(results[i])
                            }
                        }
                        results = tmp
                    }
                    return results
                }
            }
            div.innerHTML = "<a href='#'></a>";
            if (div.firstChild && typeof div.firstChild.getAttribute !== "undefined" && div.firstChild.getAttribute("href") !== "#") {
                Expr.attrHandle.href = function(elem) {
                    return elem.getAttribute("href", 2)
                }
            }
            div = null
        })();
        if (document.querySelectorAll) {
            (function() {
                var oldSizzle = Sizzle,
                    div = document.createElement("div");
                div.innerHTML = "<p class='TEST'></p>";
                if (div.querySelectorAll && div.querySelectorAll(".TEST").length === 0) {
                    return
                }
                Sizzle = function(query, context, extra, seed) {
                    context = context || document;
                    if (!seed && context.nodeType === 9 && !isXML(context)) {
                        try {
                            return makeArray(context.querySelectorAll(query), extra)
                        } catch (e) {}
                    }
                    return oldSizzle(query, context, extra, seed)
                };
                for (var prop in oldSizzle) {
                    Sizzle[prop] = oldSizzle[prop]
                }
                div = null
            })()
        }(function() {
            var div = document.createElement("div");
            div.innerHTML = "<div class='test e'></div><div class='test'></div>";
            if (!div.getElementsByClassName || div.getElementsByClassName("e").length === 0) {
                return
            }
            div.lastChild.className = "e";
            if (div.getElementsByClassName("e").length === 1) {
                return
            }
            Expr.order.splice(1, 0, "CLASS");
            Expr.find.CLASS = function(match, context, isXML) {
                if (typeof context.getElementsByClassName !== "undefined" && !isXML) {
                    return context.getElementsByClassName(match[1])
                }
            };
            div = null
        })();

        function dirNodeCheck(dir, cur, doneName, checkSet, nodeCheck, isXML) {
            for (var i = 0, l = checkSet.length; i < l; i++) {
                var elem = checkSet[i];
                if (elem) {
                    elem = elem[dir];
                    var match = false;
                    while (elem) {
                        if (elem.sizcache === doneName) {
                            match = checkSet[elem.sizset];
                            break
                        }
                        if (elem.nodeType === 1 && !isXML) {
                            elem.sizcache = doneName;
                            elem.sizset = i
                        }
                        if (elem.nodeName.toLowerCase() === cur) {
                            match = elem;
                            break
                        }
                        elem = elem[dir]
                    }
                    checkSet[i] = match
                }
            }
        }

        function dirCheck(dir, cur, doneName, checkSet, nodeCheck, isXML) {
            for (var i = 0, l = checkSet.length; i < l; i++) {
                var elem = checkSet[i];
                if (elem) {
                    elem = elem[dir];
                    var match = false;
                    while (elem) {
                        if (elem.sizcache === doneName) {
                            match = checkSet[elem.sizset];
                            break
                        }
                        if (elem.nodeType === 1) {
                            if (!isXML) {
                                elem.sizcache = doneName;
                                elem.sizset = i
                            }
                            if (typeof cur !== "string") {
                                if (elem === cur) {
                                    match = true;
                                    break
                                }
                            } else {
                                if (Sizzle.filter(cur, [elem]).length > 0) {
                                    match = elem;
                                    break
                                }
                            }
                        }
                        elem = elem[dir]
                    }
                    checkSet[i] = match
                }
            }
        }
        var contains = document.compareDocumentPosition ? function(a, b) {
            return a.compareDocumentPosition(b) & 16
        } : function(a, b) {
            return a !== b && (a.contains ? a.contains(b) : true)
        };
        var isXML = function(elem) {
            var documentElement = (elem ? elem.ownerDocument || elem : 0).documentElement;
            return documentElement ? documentElement.nodeName !== "HTML" : false
        };
        var posProcess = function(selector, context) {
            var tmpSet = [],
                later = "",
                match, root = context.nodeType ? [context] : context;
            while ((match = Expr.match.PSEUDO.exec(selector))) {
                later += match[0];
                selector = selector.replace(Expr.match.PSEUDO, "")
            }
            selector = Expr.relative[selector] ? selector + "*" : selector;
            for (var i = 0, l = root.length; i < l; i++) {
                Sizzle(selector, root[i], tmpSet)
            }
            return Sizzle.filter(later, tmpSet)
        };
        return Sizzle
    })();
    S.flash = (function() {
        var swfobject = function() {
            var UNDEF = "undefined",
                OBJECT = "object",
                SHOCKWAVE_FLASH = "Shockwave Flash",
                SHOCKWAVE_FLASH_AX = "ShockwaveFlash.ShockwaveFlash",
                FLASH_MIME_TYPE = "application/x-shockwave-flash",
                EXPRESS_INSTALL_ID = "SWFObjectExprInst",
                win = window,
                doc = document,
                nav = navigator,
                domLoadFnArr = [],
                regObjArr = [],
                objIdArr = [],
                listenersArr = [],
                script, timer = null,
                storedAltContent = null,
                storedAltContentId = null,
                isDomLoaded = false,
                isExpressInstallActive = false;
            var ua = function() {
                var w3cdom = typeof doc.getElementById != UNDEF && typeof doc.getElementsByTagName != UNDEF && typeof doc.createElement != UNDEF,
                    playerVersion = [0, 0, 0],
                    d = null;
                if (typeof nav.plugins != UNDEF && typeof nav.plugins[SHOCKWAVE_FLASH] == OBJECT) {
                    d = nav.plugins[SHOCKWAVE_FLASH].description;
                    if (d && !(typeof nav.mimeTypes != UNDEF && nav.mimeTypes[FLASH_MIME_TYPE] && !nav.mimeTypes[FLASH_MIME_TYPE].enabledPlugin)) {
                        d = d.replace(/^.*\s+(\S+\s+\S+$)/, "$1");
                        playerVersion[0] = parseInt(d.replace(/^(.*)\..*$/, "$1"), 10);
                        playerVersion[1] = parseInt(d.replace(/^.*\.(.*)\s.*$/, "$1"), 10);
                        playerVersion[2] = /r/.test(d) ? parseInt(d.replace(/^.*r(.*)$/, "$1"), 10) : 0
                    }
                } else {
                    if (typeof win.ActiveXObject != UNDEF) {
                        var a = null,
                            fp6Crash = false;
                        try {
                            a = new ActiveXObject(SHOCKWAVE_FLASH_AX + ".7")
                        } catch (e) {
                            try {
                                a = new ActiveXObject(SHOCKWAVE_FLASH_AX + ".6");
                                playerVersion = [6, 0, 21];
                                a.AllowScriptAccess = "always"
                            } catch (e) {
                                if (playerVersion[0] == 6) {
                                    fp6Crash = true
                                }
                            }
                            if (!fp6Crash) {
                                try {
                                    a = new ActiveXObject(SHOCKWAVE_FLASH_AX)
                                } catch (e) {}
                            }
                        }
                        if (!fp6Crash && a) {
                            try {
                                d = a.GetVariable("$version");
                                if (d) {
                                    d = d.split(" ")[1].split(",");
                                    playerVersion = [parseInt(d[0], 10), parseInt(d[1], 10), parseInt(d[2], 10)]
                                }
                            } catch (e) {}
                        }
                    }
                }
                var u = nav.userAgent.toLowerCase(),
                    p = nav.platform.toLowerCase(),
                    webkit = /webkit/.test(u) ? parseFloat(u.replace(/^.*webkit\/(\d+(\.\d+)?).*$/, "$1")) : false,
                    ie = false,
                    windows = p ? /win/.test(p) : /win/.test(u),
                    mac = p ? /mac/.test(p) : /mac/.test(u);
                return {
                    w3cdom: w3cdom,
                    pv: playerVersion,
                    webkit: webkit,
                    ie: ie,
                    win: windows,
                    mac: mac
                }
            }();
            var onDomLoad = function() {
                if (!ua.w3cdom) {
                    return
                }
                addDomLoadEvent(main);
                if (ua.ie && ua.win) {
                    try {
                        doc.write("<script id=__ie_ondomload defer=true src=//:><\/script>");
                        script = getElementById("__ie_ondomload");
                        if (script) {
                            addListener(script, "onreadystatechange", checkReadyState)
                        }
                    } catch (e) {}
                }
                if (ua.webkit && typeof doc.readyState != UNDEF) {
                    timer = setInterval(function() {
                        if (/loaded|complete/.test(doc.readyState)) {
                            callDomLoadFunctions()
                        }
                    }, 10)
                }
                if (typeof doc.addEventListener != UNDEF) {
                    doc.addEventListener("DOMContentLoaded", callDomLoadFunctions, null)
                }
                addLoadEvent(callDomLoadFunctions)
            }();

            function checkReadyState() {
                if (script.readyState == "complete") {
                    script.parentNode.removeChild(script);
                    callDomLoadFunctions()
                }
            }

            function callDomLoadFunctions() {
                if (isDomLoaded) {
                    return
                }
                if (ua.ie && ua.win) {
                    var s = createElement("span");
                    try {
                        var t = doc.getElementsByTagName("body")[0].appendChild(s);
                        t.parentNode.removeChild(t)
                    } catch (e) {
                        return
                    }
                }
                isDomLoaded = true;
                if (timer) {
                    clearInterval(timer);
                    timer = null
                }
                var dl = domLoadFnArr.length;
                for (var i = 0; i < dl; i++) {
                    domLoadFnArr[i]()
                }
            }

            function addDomLoadEvent(fn) {
                if (isDomLoaded) {
                    fn()
                } else {
                    domLoadFnArr[domLoadFnArr.length] = fn
                }
            }

            function addLoadEvent(fn) {
                if (typeof win.addEventListener != UNDEF) {
                    win.addEventListener("load", fn, false)
                } else {
                    if (typeof doc.addEventListener != UNDEF) {
                        doc.addEventListener("load", fn, false)
                    } else {
                        if (typeof win.attachEvent != UNDEF) {
                            addListener(win, "onload", fn)
                        } else {
                            if (typeof win.onload == "function") {
                                var fnOld = win.onload;
                                win.onload = function() {
                                    fnOld();
                                    fn()
                                }
                            } else {
                                win.onload = fn
                            }
                        }
                    }
                }
            }

            function main() {
                var rl = regObjArr.length;
                for (var i = 0; i < rl; i++) {
                    var id = regObjArr[i].id;
                    if (ua.pv[0] > 0) {
                        var obj = getElementById(id);
                        if (obj) {
                            regObjArr[i].width = obj.getAttribute("width") ? obj.getAttribute("width") : "0";
                            regObjArr[i].height = obj.getAttribute("height") ? obj.getAttribute("height") : "0";
                            if (hasPlayerVersion(regObjArr[i].swfVersion)) {
                                if (ua.webkit && ua.webkit < 312) {
                                    fixParams(obj)
                                }
                                setVisibility(id, true)
                            } else {
                                if (regObjArr[i].expressInstall && !isExpressInstallActive && hasPlayerVersion("6.0.65") && (ua.win || ua.mac)) {
                                    showExpressInstall(regObjArr[i])
                                } else {
                                    displayAltContent(obj)
                                }
                            }
                        }
                    } else {
                        setVisibility(id, true)
                    }
                }
            }

            function fixParams(obj) {
                var nestedObj = obj.getElementsByTagName(OBJECT)[0];
                if (nestedObj) {
                    var e = createElement("embed"),
                        a = nestedObj.attributes;
                    if (a) {
                        var al = a.length;
                        for (var i = 0; i < al; i++) {
                            if (a[i].nodeName == "DATA") {
                                e.setAttribute("src", a[i].nodeValue)
                            } else {
                                e.setAttribute(a[i].nodeName, a[i].nodeValue)
                            }
                        }
                    }
                    var c = nestedObj.childNodes;
                    if (c) {
                        var cl = c.length;
                        for (var j = 0; j < cl; j++) {
                            if (c[j].nodeType == 1 && c[j].nodeName == "PARAM") {
                                e.setAttribute(c[j].getAttribute("name"), c[j].getAttribute("value"))
                            }
                        }
                    }
                    obj.parentNode.replaceChild(e, obj)
                }
            }

            function showExpressInstall(regObj) {
                isExpressInstallActive = true;
                var obj = getElementById(regObj.id);
                if (obj) {
                    if (regObj.altContentId) {
                        var ac = getElementById(regObj.altContentId);
                        if (ac) {
                            storedAltContent = ac;
                            storedAltContentId = regObj.altContentId
                        }
                    } else {
                        storedAltContent = abstractAltContent(obj)
                    }
                    if (!(/%$/.test(regObj.width)) && parseInt(regObj.width, 10) < 310) {
                        regObj.width = "310"
                    }
                    if (!(/%$/.test(regObj.height)) && parseInt(regObj.height, 10) < 137) {
                        regObj.height = "137"
                    }
                    doc.title = doc.title.slice(0, 47) + " - Flash Player Installation";
                    var pt = ua.ie && ua.win ? "ActiveX" : "PlugIn",
                        dt = doc.title,
                        fv = "MMredirectURL=" + win.location + "&MMplayerType=" + pt + "&MMdoctitle=" + dt,
                        replaceId = regObj.id;
                    if (ua.ie && ua.win && obj.readyState != 4) {
                        var newObj = createElement("div");
                        replaceId += "SWFObjectNew";
                        newObj.setAttribute("id", replaceId);
                        obj.parentNode.insertBefore(newObj, obj);
                        obj.style.display = "none";
                        var fn = function() {
                            obj.parentNode.removeChild(obj)
                        };
                        addListener(win, "onload", fn)
                    }
                    createSWF({
                        data: regObj.expressInstall,
                        id: EXPRESS_INSTALL_ID,
                        width: regObj.width,
                        height: regObj.height
                    }, {
                        flashvars: fv
                    }, replaceId)
                }
            }

            function displayAltContent(obj) {
                if (ua.ie && ua.win && obj.readyState != 4) {
                    var el = createElement("div");
                    obj.parentNode.insertBefore(el, obj);
                    el.parentNode.replaceChild(abstractAltContent(obj), el);
                    obj.style.display = "none";
                    var fn = function() {
                        obj.parentNode.removeChild(obj)
                    };
                    addListener(win, "onload", fn)
                } else {
                    obj.parentNode.replaceChild(abstractAltContent(obj), obj)
                }
            }

            function abstractAltContent(obj) {
                var ac = createElement("div");
                if (ua.win && ua.ie) {
                    ac.innerHTML = obj.innerHTML
                } else {
                    var nestedObj = obj.getElementsByTagName(OBJECT)[0];
                    if (nestedObj) {
                        var c = nestedObj.childNodes;
                        if (c) {
                            var cl = c.length;
                            for (var i = 0; i < cl; i++) {
                                if (!(c[i].nodeType == 1 && c[i].nodeName == "PARAM") && !(c[i].nodeType == 8)) {
                                    ac.appendChild(c[i].cloneNode(true))
                                }
                            }
                        }
                    }
                }
                return ac
            }

            function createSWF(attObj, parObj, id) {
                var r, el = getElementById(id);
                if (el) {
                    if (typeof attObj.id == UNDEF) {
                        attObj.id = id
                    }
                    if (ua.ie && ua.win) {
                        var att = "";
                        for (var i in attObj) {
                            if (attObj[i] != Object.prototype[i]) {
                                if (i.toLowerCase() == "data") {
                                    parObj.movie = attObj[i]
                                } else {
                                    if (i.toLowerCase() == "styleclass") {
                                        att += ' class="' + attObj[i] + '"'
                                    } else {
                                        if (i.toLowerCase() != "classid") {
                                            att += " " + i + '="' + attObj[i] + '"'
                                        }
                                    }
                                }
                            }
                        }
                        var par = "";
                        for (var j in parObj) {
                            if (parObj[j] != Object.prototype[j]) {
                                par += '<param name="' + j + '" value="' + parObj[j] + '" />'
                            }
                        }
                        el.outerHTML = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"' + att + ">" + par + "</object>";
                        objIdArr[objIdArr.length] = attObj.id;
                        r = getElementById(attObj.id)
                    } else {
                        if (ua.webkit && ua.webkit < 312) {
                            var e = createElement("embed");
                            e.setAttribute("type", FLASH_MIME_TYPE);
                            for (var k in attObj) {
                                if (attObj[k] != Object.prototype[k]) {
                                    if (k.toLowerCase() == "data") {
                                        e.setAttribute("src", attObj[k])
                                    } else {
                                        if (k.toLowerCase() == "styleclass") {
                                            e.setAttribute("class", attObj[k])
                                        } else {
                                            if (k.toLowerCase() != "classid") {
                                                e.setAttribute(k, attObj[k])
                                            }
                                        }
                                    }
                                }
                            }
                            for (var l in parObj) {
                                if (parObj[l] != Object.prototype[l]) {
                                    if (l.toLowerCase() != "movie") {
                                        e.setAttribute(l, parObj[l])
                                    }
                                }
                            }
                            el.parentNode.replaceChild(e, el);
                            r = e
                        } else {
                            var o = createElement(OBJECT);
                            o.setAttribute("type", FLASH_MIME_TYPE);
                            for (var m in attObj) {
                                if (attObj[m] != Object.prototype[m]) {
                                    if (m.toLowerCase() == "styleclass") {
                                        o.setAttribute("class", attObj[m])
                                    } else {
                                        if (m.toLowerCase() != "classid") {
                                            o.setAttribute(m, attObj[m])
                                        }
                                    }
                                }
                            }
                            for (var n in parObj) {
                                if (parObj[n] != Object.prototype[n] && n.toLowerCase() != "movie") {
                                    createObjParam(o, n, parObj[n])
                                }
                            }
                            el.parentNode.replaceChild(o, el);
                            r = o
                        }
                    }
                }
                return r
            }

            function createObjParam(el, pName, pValue) {
                var p = createElement("param");
                p.setAttribute("name", pName);
                p.setAttribute("value", pValue);
                el.appendChild(p)
            }

            function removeSWF(id) {
                var obj = getElementById(id);
                if (obj && (obj.nodeName == "OBJECT" || obj.nodeName == "EMBED")) {
                    if (ua.ie && ua.win) {
                        if (obj.readyState == 4) {
                            removeObjectInIE(id)
                        } else {
                            win.attachEvent("onload", function() {
                                removeObjectInIE(id)
                            })
                        }
                    } else {
                        obj.parentNode.removeChild(obj)
                    }
                }
            }

            function removeObjectInIE(id) {
                var obj = getElementById(id);
                if (obj) {
                    for (var i in obj) {
                        if (typeof obj[i] == "function") {
                            obj[i] = null
                        }
                    }
                    obj.parentNode.removeChild(obj)
                }
            }

            function getElementById(id) {
                var el = null;
                try {
                    el = doc.getElementById(id)
                } catch (e) {}
                return el
            }

            function createElement(el) {
                return doc.createElement(el)
            }

            function addListener(target, eventType, fn) {
                target.attachEvent(eventType, fn);
                listenersArr[listenersArr.length] = [target, eventType, fn]
            }

            function hasPlayerVersion(rv) {
                var pv = ua.pv,
                    v = rv.split(".");
                v[0] = parseInt(v[0], 10);
                v[1] = parseInt(v[1], 10) || 0;
                v[2] = parseInt(v[2], 10) || 0;
                return (pv[0] > v[0] || (pv[0] == v[0] && pv[1] > v[1]) || (pv[0] == v[0] && pv[1] == v[1] && pv[2] >= v[2])) ? true : false
            }

            function createCSS(sel, decl) {
                if (ua.ie && ua.mac) {
                    return
                }
                var h = doc.getElementsByTagName("head")[0],
                    s = createElement("style");
                s.setAttribute("type", "text/css");
                s.setAttribute("media", "screen");
                if (!(ua.ie && ua.win) && typeof doc.createTextNode != UNDEF) {
                    s.appendChild(doc.createTextNode(sel + " {" + decl + "}"))
                }
                h.appendChild(s);
                if (ua.ie && ua.win && typeof doc.styleSheets != UNDEF && doc.styleSheets.length > 0) {
                    var ls = doc.styleSheets[doc.styleSheets.length - 1];
                    if (typeof ls.addRule == OBJECT) {
                        ls.addRule(sel, decl)
                    }
                }
            }

            function setVisibility(id, isVisible) {
                var v = isVisible ? "visible" : "hidden";
                if (isDomLoaded && getElementById(id)) {
                    getElementById(id).style.visibility = v
                } else {
                    createCSS("#" + id, "visibility:" + v)
                }
            }

            function urlEncodeIfNecessary(s) {
                var regex = /[\\\"<>\.;]/;
                var hasBadChars = regex.exec(s) != null;
                return hasBadChars ? encodeURIComponent(s) : s
            }
            var cleanup = function() {
                if (ua.ie && ua.win) {
                    window.attachEvent("onunload", function() {
                        var ll = listenersArr.length;
                        for (var i = 0; i < ll; i++) {
                            listenersArr[i][0].detachEvent(listenersArr[i][1], listenersArr[i][2])
                        }
                        var il = objIdArr.length;
                        for (var j = 0; j < il; j++) {
                            removeSWF(objIdArr[j])
                        }
                        for (var k in ua) {
                            ua[k] = null
                        }
                        ua = null;
                        for (var l in swfobject) {
                            swfobject[l] = null
                        }
                        swfobject = null
                    })
                }
            }();
            return {
                registerObject: function(objectIdStr, swfVersionStr, xiSwfUrlStr) {
                    if (!ua.w3cdom || !objectIdStr || !swfVersionStr) {
                        return
                    }
                    var regObj = {};
                    regObj.id = objectIdStr;
                    regObj.swfVersion = swfVersionStr;
                    regObj.expressInstall = xiSwfUrlStr ? xiSwfUrlStr : false;
                    regObjArr[regObjArr.length] = regObj;
                    setVisibility(objectIdStr, false)
                },
                getObjectById: function(objectIdStr) {
                    var r = null;
                    if (ua.w3cdom) {
                        var o = getElementById(objectIdStr);
                        if (o) {
                            var n = o.getElementsByTagName(OBJECT)[0];
                            if (!n || (n && typeof o.SetVariable != UNDEF)) {
                                r = o
                            } else {
                                if (typeof n.SetVariable != UNDEF) {
                                    r = n
                                }
                            }
                        }
                    }
                    return r
                },
                embedSWF: function(swfUrlStr, replaceElemIdStr, widthStr, heightStr, swfVersionStr, xiSwfUrlStr, flashvarsObj, parObj, attObj) {
                    if (!ua.w3cdom || !swfUrlStr || !replaceElemIdStr || !widthStr || !heightStr || !swfVersionStr) {
                        return
                    }
                    widthStr += "";
                    heightStr += "";
                    if (hasPlayerVersion(swfVersionStr)) {
                        setVisibility(replaceElemIdStr, false);
                        var att = {};
                        if (attObj && typeof attObj === OBJECT) {
                            for (var i in attObj) {
                                if (attObj[i] != Object.prototype[i]) {
                                    att[i] = attObj[i]
                                }
                            }
                        }
                        att.data = swfUrlStr;
                        att.width = widthStr;
                        att.height = heightStr;
                        var par = {};
                        if (parObj && typeof parObj === OBJECT) {
                            for (var j in parObj) {
                                if (parObj[j] != Object.prototype[j]) {
                                    par[j] = parObj[j]
                                }
                            }
                        }
                        if (flashvarsObj && typeof flashvarsObj === OBJECT) {
                            for (var k in flashvarsObj) {
                                if (flashvarsObj[k] != Object.prototype[k]) {
                                    if (typeof par.flashvars != UNDEF) {
                                        par.flashvars += "&" + k + "=" + flashvarsObj[k]
                                    } else {
                                        par.flashvars = k + "=" + flashvarsObj[k]
                                    }
                                }
                            }
                        }
                        addDomLoadEvent(function() {
                            createSWF(att, par, replaceElemIdStr);
                            if (att.id == replaceElemIdStr) {
                                setVisibility(replaceElemIdStr, true)
                            }
                        })
                    } else {
                        if (xiSwfUrlStr && !isExpressInstallActive && hasPlayerVersion("6.0.65") && (ua.win || ua.mac)) {
                            isExpressInstallActive = true;
                            setVisibility(replaceElemIdStr, false);
                            addDomLoadEvent(function() {
                                var regObj = {};
                                regObj.id = regObj.altContentId = replaceElemIdStr;
                                regObj.width = widthStr;
                                regObj.height = heightStr;
                                regObj.expressInstall = xiSwfUrlStr;
                                showExpressInstall(regObj)
                            })
                        }
                    }
                },
                getFlashPlayerVersion: function() {
                    return {
                        major: ua.pv[0],
                        minor: ua.pv[1],
                        release: ua.pv[2]
                    }
                },
                hasFlashPlayerVersion: hasPlayerVersion,
                createSWF: function(attObj, parObj, replaceElemIdStr) {
                    if (ua.w3cdom) {
                        return createSWF(attObj, parObj, replaceElemIdStr)
                    } else {
                        return undefined
                    }
                },
                removeSWF: function(objElemIdStr) {
                    if (ua.w3cdom) {
                        removeSWF(objElemIdStr)
                    }
                },
                createCSS: function(sel, decl) {
                    if (ua.w3cdom) {
                        createCSS(sel, decl)
                    }
                },
                addDomLoadEvent: addDomLoadEvent,
                addLoadEvent: addLoadEvent,
                getQueryParamValue: function(param) {
                    var q = doc.location.search || doc.location.hash;
                    if (param == null) {
                        return urlEncodeIfNecessary(q)
                    }
                    if (q) {
                        var pairs = q.substring(1).split("&");
                        for (var i = 0; i < pairs.length; i++) {
                            if (pairs[i].substring(0, pairs[i].indexOf("=")) == param) {
                                return urlEncodeIfNecessary(pairs[i].substring((pairs[i].indexOf("=") + 1)))
                            }
                        }
                    }
                    return ""
                },
                expressInstallCallback: function() {
                    if (isExpressInstallActive && storedAltContent) {
                        var obj = getElementById(EXPRESS_INSTALL_ID);
                        if (obj) {
                            obj.parentNode.replaceChild(storedAltContent, obj);
                            if (storedAltContentId) {
                                setVisibility(storedAltContentId, true);
                                if (ua.ie && ua.win) {
                                    storedAltContent.style.display = "block"
                                }
                            }
                            storedAltContent = null;
                            storedAltContentId = null;
                            isExpressInstallActive = false
                        }
                    }
                }
            }
        }();
        return swfobject
    })();
    S.lang = {
        code: "en",
        of: "of",
        loading: "loading",
        cancel: "Cancel",
        next: "Next",
        previous: "Previous",
        play: "Play",
        pause: "Pause",
        close: "Close",
        errors: {
            single: 'You must install the <a href="{0}">{1}</a> browser plugin to view this content.',
            shared: 'You must install both the <a href="{0}">{1}</a> and <a href="{2}">{3}</a> browser plugins to view this content.',
            either: 'You must install either the <a href="{0}">{1}</a> or the <a href="{2}">{3}</a> browser plugin to view this content.'
        }
    };
    var pre, proxyId = "sb-drag-proxy",
        dragData, dragProxy, dragTarget;

    function resetDrag() {
        dragData = {
            x: 0,
            y: 0,
            startX: null,
            startY: null
        }
    }

    function updateProxy() {
        var dims = S.dimensions;
        apply(dragProxy.style, {
            height: dims.innerHeight + "px",
            width: dims.innerWidth + "px"
        })
    }

    function enableDrag() {
        resetDrag();
        var style = ["position:absolute", "cursor:" + (S.isGecko ? "-moz-grab" : "move"), "background-color:" + (S.isIE ? "#fff;filter:alpha(opacity=0)" : "transparent")].join(";");
        S.appendHTML(S.skin.body, '<div id="' + proxyId + '" style="' + style + '"></div>');
        dragProxy = get(proxyId);
        updateProxy();
        addEvent(dragProxy, "mousedown", startDrag)
    }

    function disableDrag() {
        if (dragProxy) {
            removeEvent(dragProxy, "mousedown", startDrag);
            remove(dragProxy);
            dragProxy = null
        }
        dragTarget = null
    }

    function startDrag(e) {
        preventDefault(e);
        var xy = getPageXY(e);
        dragData.startX = xy[0];
        dragData.startY = xy[1];
        dragTarget = get(S.player.id);
        addEvent(document, "mousemove", positionDrag);
        addEvent(document, "mouseup", endDrag);
        if (S.isGecko) {
            dragProxy.style.cursor = "-moz-grabbing"
        }
    }

    function positionDrag(e) {
        var player = S.player,
            dims = S.dimensions,
            xy = getPageXY(e);
        var moveX = xy[0] - dragData.startX;
        dragData.startX += moveX;
        dragData.x = Math.max(Math.min(0, dragData.x + moveX), dims.innerWidth - player.width);
        var moveY = xy[1] - dragData.startY;
        dragData.startY += moveY;
        dragData.y = Math.max(Math.min(0, dragData.y + moveY), dims.innerHeight - player.height);
        apply(dragTarget.style, {
            left: dragData.x + "px",
            top: dragData.y + "px"
        })
    }

    function endDrag() {
        removeEvent(document, "mousemove", positionDrag);
        removeEvent(document, "mouseup", endDrag);
        if (S.isGecko) {
            dragProxy.style.cursor = "-moz-grab"
        }
    }
    S.img = function(obj, id) {
        this.obj = obj;
        this.id = id;
        this.ready = false;
        var self = this;
        pre = new Image();
        pre.onload = function() {
            self.height = obj.height ? parseInt(obj.height, 10) : pre.height;
            self.width = obj.width ? parseInt(obj.width, 10) : pre.width;
            self.ready = true;
            pre.onload = null;
            pre = null
        };
        pre.src = obj.content
    };
    S.img.ext = ["bmp", "gif", "jpg", "jpeg", "png"];
    S.img.prototype = {
        append: function(body, dims) {
            var img = document.createElement("img");
            img.id = this.id;
            img.src = this.obj.content;
            img.style.position = "absolute";
            var height, width;
            if (dims.oversized && S.options.handleOversize == "resize") {
                height = dims.innerHeight;
                width = dims.innerWidth
            } else {
                height = this.height;
                width = this.width
            }
            img.setAttribute("height", height);
            img.setAttribute("width", width);
            body.appendChild(img)
        },
        remove: function() {
            var el = get(this.id);
            if (el) {
                remove(el)
            }
            disableDrag();
            if (pre) {
                pre.onload = null;
                pre = null
            }
        },
        onLoad: function() {
            var dims = S.dimensions;
            if (dims.oversized && S.options.handleOversize == "drag") {
                enableDrag()
            }
        },
        onWindowResize: function() {
            var dims = S.dimensions;
            switch (S.options.handleOversize) {
                case "resize":
                    var el = get(this.id);
                    el.height = dims.innerHeight;
                    el.width = dims.innerWidth;
                    break;
                case "drag":
                    if (dragTarget) {
                        var top = parseInt(S.getStyle(dragTarget, "top")),
                            left = parseInt(S.getStyle(dragTarget, "left"));
                        if (top + this.height < dims.innerHeight) {
                            dragTarget.style.top = dims.innerHeight - this.height + "px"
                        }
                        if (left + this.width < dims.innerWidth) {
                            dragTarget.style.left = dims.innerWidth - this.width + "px"
                        }
                        updateProxy()
                    }
                    break
            }
        }
    };
    S.iframe = function(obj, id) {
        this.obj = obj;
        this.id = id;
        var overlay = get("sb-overlay");
        this.height = obj.height ? parseInt(obj.height, 10) : overlay.offsetHeight;
        this.width = obj.width ? parseInt(obj.width, 10) : overlay.offsetWidth
    };
    S.iframe.prototype = {
        append: function(body, dims) {
            var html = '<iframe id="' + this.id + '" name="' + this.id + '" height="100%" width="100%" frameborder="0" marginwidth="0" marginheight="0" style="visibility:hidden" onload="this.style.visibility=\'visible\'" scrolling="auto"';
            if (S.isIE) {
                html += ' allowtransparency="true"';
                if (S.isIE6) {
                    html += " src=\"javascript:false;document.write('');\""
                }
            }
            html += "></iframe>";
            body.innerHTML = html
        },
        remove: function() {
            var el = get(this.id);
            if (el) {
                remove(el);
                if (S.isGecko) {
                    delete window.frames[this.id]
                }
            }
        },
        onLoad: function() {
            var win = S.isIE ? get(this.id).contentWindow : window.frames[this.id];
            win.location.href = this.obj.content
        }
    };
    S.html = function(obj, id) {
        this.obj = obj;
        this.id = id;
        this.height = obj.height ? parseInt(obj.height, 10) : 300;
        this.width = obj.width ? parseInt(obj.width, 10) : 500
    };
    S.html.prototype = {
        append: function(body, dims) {
            var div = document.createElement("div");
            div.id = this.id;
            div.className = "html";
            div.innerHTML = this.obj.content;
            body.appendChild(div)
        },
        remove: function() {
            var el = get(this.id);
            if (el) {
                remove(el)
            }
        }
    };
    S.swf = function(obj, id) {
        this.obj = obj;
        this.id = id;
        this.height = obj.height ? parseInt(obj.height, 10) : 300;
        this.width = obj.width ? parseInt(obj.width, 10) : 300
    };
    S.swf.ext = ["swf"];
    S.swf.prototype = {
        append: function(body, dims) {
            var tmp = document.createElement("div");
            tmp.id = this.id;
            body.appendChild(tmp);
            var height = dims.innerHeight,
                width = dims.innerWidth,
                swf = this.obj.content,
                version = S.options.flashVersion,
                express = S.path + "expressInstall.swf",
                flashvars = S.options.flashVars,
                params = S.options.flashParams;
            S.flash.embedSWF(swf, this.id, width, height, version, express, flashvars, params)
        },
        remove: function() {
            S.flash.expressInstallCallback();
            S.flash.removeSWF(this.id)
        },
        onWindowResize: function() {
            var dims = S.dimensions,
                el = get(this.id);
            el.height = dims.innerHeight;
            el.width = dims.innerWidth
        }
    };
    var jwControllerHeight = 20;
    S.flv = function(obj, id) {
        this.obj = obj;
        this.id = id;
        this.height = obj.height ? parseInt(obj.height, 10) : 300;
        if (S.options.showMovieControls) {
            this.height += jwControllerHeight
        }
        this.width = obj.width ? parseInt(obj.width, 10) : 300
    };
    S.flv.ext = ["flv", "m4v"];
    S.flv.prototype = {
        append: function(body, dims) {
            var tmp = document.createElement("div");
            tmp.id = this.id;
            body.appendChild(tmp);
            var height = dims.innerHeight,
                width = dims.innerWidth,
                swf = S.path + "player.swf",
                version = S.options.flashVersion,
                express = S.path + "expressInstall.swf",
                flashvars = apply({
                    file: this.obj.content,
                    height: height,
                    width: width,
                    autostart: (S.options.autoplayMovies ? "true" : "false"),
                    controlbar: (S.options.showMovieControls ? "bottom" : "none"),
                    backcolor: "0x000000",
                    frontcolor: "0xCCCCCC",
                    lightcolor: "0x557722"
                }, S.options.flashVars),
                params = S.options.flashParams;
            S.flash.embedSWF(swf, this.id, width, height, version, express, flashvars, params)
        },
        remove: function() {
            S.flash.expressInstallCallback();
            S.flash.removeSWF(this.id)
        },
        onWindowResize: function() {
            var dims = S.dimensions,
                el = get(this.id);
            el.height = dims.innerHeight;
            el.width = dims.innerWidth
        }
    };
    var qtControllerHeight = 16;
    S.qt = function(obj, id) {
        this.obj = obj;
        this.id = id;
        this.height = obj.height ? parseInt(obj.height, 10) : 300;
        if (S.options.showMovieControls) {
            this.height += qtControllerHeight
        }
        this.width = obj.width ? parseInt(obj.width, 10) : 300
    };
    S.qt.ext = ["dv", "mov", "moov", "movie", "mp4", "avi", "mpg", "mpeg"];
    S.qt.prototype = {
        append: function(body, dims) {
            var opt = S.options,
                autoplay = String(opt.autoplayMovies),
                controls = String(opt.showMovieControls);
            var html = "<object",
                movie = {
                    id: this.id,
                    name: this.id,
                    height: this.height,
                    width: this.width,
                    kioskmode: "true"
                };
            if (S.isIE) {
                movie.classid = "clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B";
                movie.codebase = "http://www.apple.com/qtactivex/qtplugin.cab#version=6,0,2,0"
            } else {
                movie.type = "video/quicktime";
                movie.data = this.obj.content
            }
            for (var m in movie) {
                html += " " + m + '="' + movie[m] + '"'
            }
            html += ">";
            var params = {
                src: this.obj.content,
                scale: "aspect",
                controller: controls,
                autoplay: autoplay
            };
            for (var p in params) {
                html += '<param name="' + p + '" value="' + params[p] + '">'
            }
            html += "</object>";
            body.innerHTML = html
        },
        remove: function() {
            try {
                document[this.id].Stop()
            } catch (e) {}
            var el = get(this.id);
            if (el) {
                remove(el)
            }
        }
    };
    var wmpControllerHeight = (S.isIE ? 70 : 45);
    S.wmp = function(obj, id) {
        this.obj = obj;
        this.id = id;
        this.height = obj.height ? parseInt(obj.height, 10) : 300;
        if (S.options.showMovieControls) {
            this.height += wmpControllerHeight
        }
        this.width = obj.width ? parseInt(obj.width, 10) : 300
    };
    S.wmp.ext = ["asf", "avi", "mpg", "mpeg", "wm", "wmv"];
    S.wmp.prototype = {
        append: function(body, dims) {
            var opt = S.options,
                autoplay = opt.autoplayMovies ? 1 : 0;
            var movie = '<object id="' + this.id + '" name="' + this.id + '" height="' + this.height + '" width="' + this.width + '"',
                params = {
                    autostart: opt.autoplayMovies ? 1 : 0
                };
            if (S.isIE) {
                movie += ' classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6"';
                params.url = this.obj.content;
                params.uimode = opt.showMovieControls ? "full" : "none"
            } else {
                movie += ' type="video/x-ms-wmv"';
                movie += ' data="' + this.obj.content + '"';
                params.showcontrols = opt.showMovieControls ? 1 : 0
            }
            movie += ">";
            for (var p in params) {
                movie += '<param name="' + p + '" value="' + params[p] + '">'
            }
            movie += "</object>";
            body.innerHTML = movie
        },
        remove: function() {
            if (S.isIE) {
                try {
                    window[this.id].controls.stop();
                    window[this.id].URL = "movie" + now() + ".wmv";
                    window[this.id] = function() {}
                } catch (e) {}
            }
            var el = get(this.id);
            if (el) {
                setTimeout(function() {
                    remove(el)
                }, 10)
            }
        }
    };
    var overlayOn = false,
        visibilityCache = [],
        pngIds = ["sb-nav-close", "sb-nav-next", "sb-nav-play", "sb-nav-pause", "sb-nav-previous"],
        container, overlay, wrapper, doWindowResize = true;

    function animate(el, property, to, duration, callback) {
        var isOpacity = (property == "opacity"),
            anim = isOpacity ? S.setOpacity : function(el, value) {
                el.style[property] = "" + value + "px"
            };
        if (duration == 0 || (!isOpacity && !S.options.animate) || (isOpacity && !S.options.animateFade)) {
            anim(el, to);
            if (callback) {
                callback()
            }
            return
        }
        var from = parseFloat(S.getStyle(el, property)) || 0;
        var delta = to - from;
        if (delta == 0) {
            if (callback) {
                callback()
            }
            return
        }
        duration *= 1000;
        var begin = now(),
            ease = S.ease,
            end = begin + duration,
            time;
        var interval = setInterval(function() {
            time = now();
            if (time >= end) {
                clearInterval(interval);
                interval = null;
                anim(el, to);
                if (callback) {
                    callback()
                }
            } else {
                anim(el, from + ease((time - begin) / duration) * delta)
            }
        }, 10)
    }

    function setSize() {
        container.style.height = S.getWindowSize("Height") + "px";
        container.style.width = S.getWindowSize("Width") + "px"
    }

    function setPosition() {
        container.style.top = document.documentElement.scrollTop + "px";
        container.style.left = document.documentElement.scrollLeft + "px"
    }

    function toggleTroubleElements(on) {
        if (on) {
            each(visibilityCache, function(i, el) {
                el[0].style.visibility = el[1] || ""
            })
        } else {
            visibilityCache = [];
            each(S.options.troubleElements, function(i, tag) {
                each(document.getElementsByTagName(tag), function(j, el) {
                    visibilityCache.push([el, el.style.visibility]);
                    el.style.visibility = "hidden"
                })
            })
        }
    }

    function toggleNav(id, on) {
        var el = get("sb-nav-" + id);
        if (el) {
            el.style.display = on ? "" : "none"
        }
    }

    function toggleLoading(on, callback) {
        var loading = get("sb-loading"),
            playerName = S.getCurrent().player,
            anim = (playerName == "img" || playerName == "html");
        if (on) {
            S.setOpacity(loading, 0);
            loading.style.display = "block";
            var wrapped = function() {
                S.clearOpacity(loading);
                if (callback) {
                    callback()
                }
            };
            if (anim) {
                animate(loading, "opacity", 1, S.options.fadeDuration, wrapped)
            } else {
                wrapped()
            }
        } else {
            var wrapped = function() {
                loading.style.display = "none";
                S.clearOpacity(loading);
                if (callback) {
                    callback()
                }
            };
            if (anim) {
                animate(loading, "opacity", 0, S.options.fadeDuration, wrapped)
            } else {
                wrapped()
            }
        }
    }

    function buildBars(callback) {
        var obj = S.getCurrent();
        get("sb-title-inner").innerHTML = obj.title || "";
        var close, next, play, pause, previous;
        if (S.options.displayNav) {
            close = true;
            var len = S.gallery.length;
            if (len > 1) {
                if (S.options.continuous) {
                    next = previous = true
                } else {
                    next = (len - 1) > S.current;
                    previous = S.current > 0
                }
            }
            if (S.options.slideshowDelay > 0 && S.hasNext()) {
                pause = !S.isPaused();
                play = !pause
            }
        } else {
            close = next = play = pause = previous = false
        }
        toggleNav("close", close);
        toggleNav("next", next);
        toggleNav("play", play);
        toggleNav("pause", pause);
        toggleNav("previous", previous);
        var counter = "";
        if (S.options.displayCounter && S.gallery.length > 1) {
            var len = S.gallery.length;
            if (S.options.counterType == "skip") {
                var i = 0,
                    end = len,
                    limit = parseInt(S.options.counterLimit) || 0;
                if (limit < len && limit > 2) {
                    var h = Math.floor(limit / 2);
                    i = S.current - h;
                    if (i < 0) {
                        i += len
                    }
                    end = S.current + (limit - h);
                    if (end > len) {
                        end -= len
                    }
                }
                while (i != end) {
                    if (i == len) {
                        i = 0
                    }
                    counter += '<a onclick="Shadowbox.change(' + i + ');"';
                    if (i == S.current) {
                        counter += ' class="sb-counter-current"'
                    }
                    counter += ">" + (++i) + "</a>"
                }
            } else {
                counter = [S.current + 1, S.lang.of, len].join(" ")
            }
        }
        get("sb-counter").innerHTML = counter;
        callback()
    }

    function showBars(callback) {
        var titleInner = get("sb-title-inner"),
            infoInner = get("sb-info-inner"),
            duration = 0.35;
        titleInner.style.visibility = infoInner.style.visibility = "";
        if (titleInner.innerHTML != "") {
            animate(titleInner, "marginTop", 0, duration)
        }
        animate(infoInner, "marginTop", 0, duration, callback)
    }

    function hideBars(anim, callback) {
        var title = get("sb-title"),
            info = get("sb-info"),
            titleHeight = title.offsetHeight,
            infoHeight = info.offsetHeight,
            titleInner = get("sb-title-inner"),
            infoInner = get("sb-info-inner"),
            duration = (anim ? 0.35 : 0);
        animate(titleInner, "marginTop", titleHeight, duration);
        animate(infoInner, "marginTop", infoHeight * -1, duration, function() {
            titleInner.style.visibility = infoInner.style.visibility = "hidden";
            callback()
        })
    }

    function adjustHeight(height, top, anim, callback) {
        var wrapperInner = get("sb-wrapper-inner"),
            duration = (anim ? S.options.resizeDuration : 0);
        animate(wrapper, "top", top, duration);
        animate(wrapperInner, "height", height, duration, callback)
    }

    function adjustWidth(width, left, anim, callback) {
        var duration = (anim ? S.options.resizeDuration : 0);
        animate(wrapper, "left", left, duration);
        animate(wrapper, "width", width, duration, callback)
    }

    function setDimensions(height, width) {
        var bodyInner = get("sb-body-inner"),
            height = parseInt(height),
            width = parseInt(width),
            topBottom = wrapper.offsetHeight - bodyInner.offsetHeight,
            leftRight = wrapper.offsetWidth - bodyInner.offsetWidth,
            maxHeight = overlay.offsetHeight,
            maxWidth = overlay.offsetWidth,
            padding = parseInt(S.options.viewportPadding) || 20,
            preserveAspect = (S.player && S.options.handleOversize != "drag");
        return S.setDimensions(height, width, maxHeight, maxWidth, topBottom, leftRight, padding, preserveAspect)
    }
    var K = {};
    K.markup = '<div id="sb-container"><div id="sb-overlay"></div><div id="sb-wrapper"><div id="sb-title"><div id="sb-title-inner"></div></div><div id="sb-wrapper-inner"><div id="sb-body"><div id="sb-body-inner"></div><div id="sb-loading"><div id="sb-loading-inner"><span>{loading}</span></div></div></div></div><div id="sb-info"><div id="sb-info-inner"><div id="sb-counter"></div><div id="sb-nav"><a id="sb-nav-close" title="{close}" onclick="Shadowbox.close()"></a><a id="sb-nav-next" title="{next}" onclick="Shadowbox.next()"></a><a id="sb-nav-play" title="{play}" onclick="Shadowbox.play()"></a><a id="sb-nav-pause" title="{pause}" onclick="Shadowbox.pause()"></a><a id="sb-nav-previous" title="{previous}" onclick="Shadowbox.previous()"></a></div></div></div></div></div>';
    K.options = {
        animSequence: "sync",
        counterLimit: 10,
        counterType: "default",
        displayCounter: true,
        displayNav: true,
        fadeDuration: 0.35,
        initialHeight: 160,
        initialWidth: 320,
        modal: false,
        overlayColor: "#000",
        overlayOpacity: 0.5,
        resizeDuration: 0.35,
        showOverlay: true,
        troubleElements: ["select", "object", "embed", "canvas"]
    };
    K.init = function() {
        S.appendHTML(document.body, sprintf(K.markup, S.lang));
        K.body = get("sb-body-inner");
        container = get("sb-container");
        overlay = get("sb-overlay");
        wrapper = get("sb-wrapper");
        if (!supportsFixed) {
            container.style.position = "absolute"
        }
        if (!supportsOpacity) {
            var el, m, re = /url\("(.*\.png)"\)/;
            each(pngIds, function(i, id) {
                el = get(id);
                if (el) {
                    m = S.getStyle(el, "backgroundImage").match(re);
                    if (m) {
                        el.style.backgroundImage = "none";
                        el.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true,src=" + m[1] + ",sizingMethod=scale);"
                    }
                }
            })
        }
        var timer;
        addEvent(window, "resize", function() {
            if (timer) {
                clearTimeout(timer);
                timer = null
            }
            if (open) {
                timer = setTimeout(K.onWindowResize, 10)
            }
        })
    };
    K.onOpen = function(obj, callback) {
        doWindowResize = false;
        container.style.display = "block";
        setSize();
        var dims = setDimensions(S.options.initialHeight, S.options.initialWidth);
        adjustHeight(dims.innerHeight, dims.top);
        adjustWidth(dims.width, dims.left);
        if (S.options.showOverlay) {
            overlay.style.backgroundColor = S.options.overlayColor;
            S.setOpacity(overlay, 0);
            if (!S.options.modal) {
                addEvent(overlay, "click", S.close)
            }
            overlayOn = true
        }
        if (!supportsFixed) {
            setPosition();
            addEvent(window, "scroll", setPosition)
        }
        toggleTroubleElements();
        container.style.visibility = "visible";
        if (overlayOn) {
            animate(overlay, "opacity", S.options.overlayOpacity, S.options.fadeDuration, callback)
        } else {
            callback()
        }
    };
    K.onLoad = function(changing, callback) {
        toggleLoading(true);
        while (K.body.firstChild) {
            remove(K.body.firstChild)
        }
        hideBars(changing, function() {
            if (!open) {
                return
            }
            if (!changing) {
                wrapper.style.visibility = "visible"
            }
            buildBars(callback)
        })
    };
    K.onReady = function(callback) {
        if (!open) {
            return
        }
        var player = S.player,
            dims = setDimensions(player.height, player.width);
        var wrapped = function() {
            showBars(callback)
        };
        switch (S.options.animSequence) {
            case "hw":
                adjustHeight(dims.innerHeight, dims.top, true, function() {
                    adjustWidth(dims.width, dims.left, true, wrapped)
                });
                break;
            case "wh":
                adjustWidth(dims.width, dims.left, true, function() {
                    adjustHeight(dims.innerHeight, dims.top, true, wrapped)
                });
                break;
            default:
                adjustWidth(dims.width, dims.left, true);
                adjustHeight(dims.innerHeight, dims.top, true, wrapped)
        }
    };
    K.onShow = function(callback) {
        toggleLoading(false, callback);
        doWindowResize = true
    };
    K.onClose = function() {
        if (!supportsFixed) {
            removeEvent(window, "scroll", setPosition)
        }
        removeEvent(overlay, "click", S.close);
        wrapper.style.visibility = "hidden";
        var callback = function() {
            container.style.visibility = "hidden";
            container.style.display = "none";
            toggleTroubleElements(true)
        };
        if (overlayOn) {
            animate(overlay, "opacity", 0, S.options.fadeDuration, callback)
        } else {
            callback()
        }
    };
    K.onPlay = function() {
        toggleNav("play", false);
        toggleNav("pause", true)
    };
    K.onPause = function() {
        toggleNav("pause", false);
        toggleNav("play", true)
    };
    K.onWindowResize = function() {
        if (!doWindowResize) {
            return
        }
        setSize();
        var player = S.player,
            dims = setDimensions(player.height, player.width);
        adjustWidth(dims.width, dims.left);
        adjustHeight(dims.innerHeight, dims.top);
        if (player.onWindowResize) {
            player.onWindowResize()
        }
    };
    S.skin = K;
    window.Shadowbox = S
})(window);
// jQuery eFparallax
(function(e) {
    e.eFparallax = function(t) {
        var n = {
            keyframes: [{
                wrapper: "html",
                duration: "200%",
                animations: [{
                    selector: "",
                    translateY: "-50%",
                    scale: [1.05, .95]
                }]
            }]
        };
        var r = this;
        r.settings = {};
        r.init = function() {
            r.settings = e.extend({}, n, t);
            r.settings.temp = {
                PROPERTIES: ["translateX", "translateY", "opacity", "rotate", "scale"],
                winDow: e(window),
                wrappers: [],
                currentWrapper: null,
                bodyHeight: 0,
                windowHeight: 0,
                windowWidth: 0,
                prevKeyframesDurations: 0,
                scrollTop: 0,
                relativeScrollTop: 0,
                currentKeyframe: 0,
                keyframes: 0
            };
            r.scrollIntervalID = setInterval(r.updatePage, 10);
            r.setupValues();
            if (t.init) t.init.call(r)
        };
        r.setupValues = function() {
            r.settings.temp.scrollTop = r.settings.temp.winDow.scrollTop();
            r.settings.temp.windowHeight = r.settings.temp.winDow.height();
            r.settings.temp.windowWidth = r.settings.temp.winDow.width();
            r.convertAllPropsToPx();
            r.buildPage()
        };
        r.buildPage = function() {
            var t, n, i;
            for (t = 0; t < r.settings.keyframes.length; t++) {
                r.settings.temp.bodyHeight += r.settings.keyframes[t].duration;
                if (e.inArray(r.settings.keyframes[t].wrapper, r.settings.temp.wrappers) == -1) {
                    r.settings.temp.wrappers.push(r.settings.keyframes[t].wrapper)
                }
                for (n = 0; n < r.settings.keyframes[t].animations.length; n++) {
                    Object.keys(r.settings.keyframes[t].animations[n]).forEach(function(e) {
                        value = r.settings.keyframes[t].animations[n][e];
                        if (e !== "selector" && value instanceof Array === false) {
                            var i = [];
                            i.push(r.getDefaultPropertyValue(e), value);
                            value = i
                        }
                        r.settings.keyframes[t].animations[n][e] = value
                    })
                }
            }
            r.settings.temp.winDow.scroll(0);
            r.settings.temp.currentWrapper = r.settings.temp.wrappers[0];
            e(r.settings.temp.currentWrapper).show()
        };
        r.convertAllPropsToPx = function() {
            var e, t, n;
            for (e = 0; e < r.settings.keyframes.length; e++) {
                r.settings.keyframes[e].duration = r.convertPercentToPx(r.settings.keyframes[e].duration, "y");
                for (t = 0; t < r.settings.keyframes[e].animations.length; t++) {
                    Object.keys(r.settings.keyframes[e].animations[t]).forEach(function(s) {
                        value = r.settings.keyframes[e].animations[t][s];
                        if (s !== "selector") {
                            if (value instanceof Array) {
                                for (n = 0; n < value.length; n++) {
                                    if (typeof value[n] === "string") {
                                        if (s === "translateY") {
                                            value[n] = r.convertPercentToPx(value[n], "y")
                                        } else {
                                            value[n] = r.convertPercentToPx(value[n], "x")
                                        }
                                    }
                                }
                            } else {
                                if (typeof value === "string") {
                                    if (s === "translateY") {
                                        value = r.convertPercentToPx(value, "y")
                                    } else {
                                        value = r.convertPercentToPx(value, "x")
                                    }
                                }
                            }
                            r.settings.keyframes[e].animations[t][s] = value
                        }
                    })
                }
            }
        };
        r.getDefaultPropertyValue = function(e) {
            switch (e) {
                case "translateX":
                    return 0;
                case "translateY":
                    return 0;
                case "scale":
                    return 1;
                case "rotate":
                    return 0;
                case "opacity":
                    return 1;
                default:
                    return null
            }
        };
        r.updatePage = function() {
            window.requestAnimationFrame(function() {
                r.setScrollTops();
                if (r.settings.temp.scrollTop > 0 && r.settings.temp.scrollTop <= r.settings.temp.bodyHeight - r.settings.temp.windowHeight) {
                    r.animateElements();
                    r.setKeyframe()
                }
            })
        };
        r.setScrollTops = function() {
            r.settings.temp.scrollTop = r.settings.temp.winDow.scrollTop();
            r.settings.temp.relativeScrollTop = r.settings.temp.scrollTop - r.settings.temp.prevKeyframesDurations
        };
        r.animateElements = function() {
            var t, n, i, s, o, u;
            for (var a = 0; a < r.settings.keyframes[r.settings.temp.currentKeyframe].animations.length; a++) {
                t = r.settings.keyframes[r.settings.temp.currentKeyframe].animations[a];
                n = r.calcPropValue(t, "translateY");
                i = r.calcPropValue(t, "translateX");
                s = r.calcPropValue(t, "scale");
                o = r.calcPropValue(t, "rotate");
                u = r.calcPropValue(t, "opacity");
                e(t.selector).css({
                    transform: "translate3d(" + i + "px, " + n + "px, 0) scale(" + s + ") rotate(" + o + "deg)",
                    opacity: u
                })
            }
        };
        r.calcPropValue = function(e, t) {
            var n = e[t];
            if (n) {
                n = r.easeInOutQuad(r.settings.temp.relativeScrollTop, n[0], n[1] - n[0], r.settings.keyframes[r.settings.temp.currentKeyframe].duration)
            } else {
                n = r.getDefaultPropertyValue(t)
            }
            return n
        };
        r.easeInOutQuad = function(e, t, n, r) {
            return -n / 2 * (Math.cos(Math.PI * e / r) - 1) + t
        };
        r.setKeyframe = function() {
            if (r.settings.temp.scrollTop > r.settings.keyframes[r.settings.temp.currentKeyframe].duration + r.settings.temp.prevKeyframesDurations) {
                r.settings.temp.prevKeyframesDurations += r.settings.keyframes[r.settings.temp.currentKeyframe].duration;
                r.settings.temp.currentKeyframe++;
                r.showCurrentWrappers()
            } else if (r.settings.temp.scrollTop < r.settings.temp.prevKeyframesDurations) {
                r.settings.temp.currentKeyframe--;
                r.settings.temp.prevKeyframesDurations -= r.settings.keyframes[r.settings.temp.currentKeyframe].duration;
                r.showCurrentWrappers()
            }
        };
        r.showCurrentWrappers = function() {
            var t;
            if (r.settings.keyframes[r.settings.temp.currentKeyframe].wrapper != r.settings.temp.currentWrapper) {
                e(r.settings.temp.currentWrapper).hide();
                e(r.settings.keyframes[r.settings.temp.currentKeyframe].wrapper).show();
                r.settings.temp.currentWrapper = r.settings.keyframes[r.settings.temp.currentKeyframe].wrapper
            }
        };
        r.convertPercentToPx = function(e, t) {
            if (typeof e === "string" && e.match(/%/g)) {
                if (t === "y") e = parseFloat(e) / 100 * r.settings.temp.windowHeight;
                if (t === "x") e = parseFloat(e) / 100 * r.settings.temp.windowWidth
            }
            return e
        };
        r.init()
    }
})(jQuery);
//Froogaloop2.js
var Froogaloop = function() {
    function e(a) {
        return new e.fn.init(a)
    }

    function h(a, c, b) {
        if (!b.contentWindow.postMessage) return !1;
        var f = b.getAttribute("src").split("?")[0],
            a = JSON.stringify({
                method: a,
                value: c
            });
        "//" === f.substr(0, 2) && (f = window.location.protocol + f);
        b.contentWindow.postMessage(a, f)
    }

    function j(a) {
        var c, b;
        try {
            c = JSON.parse(a.data), b = c.event || c.method
        } catch (f) {}
        "ready" == b && !i && (i = !0);
        if (a.origin != k) return !1;
        var a = c.value,
            e = c.data,
            g = "" === g ? null : c.player_id;
        c = g ? d[g][b] : d[b];
        b = [];
        if (!c) return !1;
        void 0 !==
            a && b.push(a);
        e && b.push(e);
        g && b.push(g);
        return 0 < b.length ? c.apply(null, b) : c.call()
    }

    function l(a, c, b) {
        b ? (d[b] || (d[b] = {}), d[b][a] = c) : d[a] = c
    }
    var d = {},
        i = !1,
        k = "";
    e.fn = e.prototype = {
        element: null,
        init: function(a) {
            "string" === typeof a && (a = document.getElementById(a));
            this.element = a;
            a = this.element.getAttribute("src");
            "//" === a.substr(0, 2) && (a = window.location.protocol + a);
            for (var a = a.split("/"), c = "", b = 0, f = a.length; b < f; b++) {
                if (3 > b) c += a[b];
                else break;
                2 > b && (c += "/")
            }
            k = c;
            return this
        },
        api: function(a, c) {
            if (!this.element ||
                !a) return !1;
            var b = this.element,
                f = "" !== b.id ? b.id : null,
                d = !c || !c.constructor || !c.call || !c.apply ? c : null,
                e = c && c.constructor && c.call && c.apply ? c : null;
            e && l(a, e, f);
            h(a, d, b);
            return this
        },
        addEvent: function(a, c) {
            if (!this.element) return !1;
            var b = this.element,
                d = "" !== b.id ? b.id : null;
            l(a, c, d);
            "ready" != a ? h("addEventListener", a, b) : "ready" == a && i && c.call(null, d);
            return this
        },
        removeEvent: function(a) {
            if (!this.element) return !1;
            var c = this.element,
                b;
            a: {
                if ((b = "" !== c.id ? c.id : null) && d[b]) {
                    if (!d[b][a]) {
                        b = !1;
                        break a
                    }
                    d[b][a] = null
                } else {
                    if (!d[a]) {
                        b = !1;
                        break a
                    }
                    d[a] = null
                }
                b = !0
            }
            "ready" != a && b && h("removeEventListener", a, c)
        }
    };
    e.fn.init.prototype = e.fn;
    window.addEventListener ? window.addEventListener("message", j, !1) : window.attachEvent("onmessage", j);
    return window.Froogaloop = window.$f = e
}();
// App.js

! function(e) {
    "use strict";
    
    var t = [];
    
    t.slider_options = {
        auto: "undefined" != typeof ef_js_vars.slider_options.auto && ef_js_vars.slider_options.auto && "0" !== ef_js_vars.slider_options.auto,
        transition: "undefined" != typeof ef_js_vars.slider_options.transition ? ef_js_vars.slider_options.transition : "fade",
        cover: "undefined" != typeof ef_js_vars.slider_options && ef_js_vars.slider_options.cover && "0" !== ef_js_vars.slider_options.cover,
        caption_easing: "easeOutCirc",
        transition_speed: "undefined" != typeof ef_js_vars.slider_options.transition_speed ? parseInt(ef_js_vars.slider_options.transition_speed, 10) : 800,
        slide_interval: "undefined" != typeof ef_js_vars.slider_options.slide_interval ? parseInt(ef_js_vars.slider_options.slide_interval, 10) : 5e3,
        css_engine: !0
    }, 
    t.zoomLevel = "undefined" != typeof ef_js_vars.map_zoom ? parseInt(ef_js_vars.map_zoom, null) : 15, t.map_marker = "undefined" != typeof ef_js_vars.map_marker ? ef_js_vars.map_marker : !1, e(document).foundation(), t.isHome = e(".page-template-templateshome-template-php").length, t.breakPoint = 1200, t.support_transforms = Modernizr.csstransforms, t.adminBarHgt = e("body.admin-bar").length ? 32 : 0, t.main_slideshow = e(".fireform-slider-inner"), t.sidebar = {
        Width: e("#ef-sidebar").width(),
        Closed: !0
    }, t.scrollOffsetY = 0, t.mainTitle = e("#ef-main-title"), t.oldText = t.mainTitle.text(), t.parallaxSpeedIndex = 3, t.angle = e("#ef-header-angle"), t.rotateElement = e("#ef-slideshow-nav"), t.video = "undefined" != typeof ef_js_vars.video, t.hasSliderNav = t.rotateElement.length, t.gridContainer = e("#ef-portfolio"), t.filtersContainer = e("#ef-portfolio-filter"), t.ifBlog = e("#ef-blog-inner").length, t.gridContainerBlog = e(".ef-grid-blog"), t.homeBgSlider = e(".ef-home-default").length, t.isIE = /(Trident\/[7]{1})/i.test(navigator.userAgent), e.fn.global_transition = t.support_transforms ? e.fn.transition : e.fn.animate, t.isMobile = Modernizr.touch || e.browser.mobile || navigator.userAgent.match(/Windows Phone/) || navigator.userAgent.match(/Zune/), t.angleHalfHeight = function() {
        return e("#ef-header-angle").length ? e("#ef-header-angle").height() / 2 : 0
    }, t.delay_fn = function() {
        var e = 0;
        return function(t, i) {
            clearTimeout(e), e = setTimeout(t, i)
        }
    }(), t.ifSmallScreen = function() {
        return e(window).width() <= t.breakPoint
    }, t.bodyHeight = function() {
        (t.hasSliderNav || t.video) && e("body").css({
            minHeight: e(window).height() + e("#ef-header").height() - t.angleHalfHeight() - t.adminBarHgt
        })
    }, t.headerMin = function() {
        /*
        e("#ef-header-inner").css(e(window).height() > e("#ef-header-inner").height() ? {
            minHeight: e(window).height() - t.angleHalfHeight() - t.adminBarHgt - e("#ef-site-name").height()
        } : {
            minHeight: "inherit"
        })
        */
    }, t.navAngleFn = function() {
        if (Modernizr.csstransforms) {
            var e = 180 * -Math.atan(t.angle.height() / t.angle.width()) / Math.PI;
            t.rotateElement.css({
                WebkitTransform: "rotate(" + e + "deg)",
                MozTransform: "rotate(" + e + "deg)",
                msTransform: "rotate(" + e + "deg)",
                transform: "rotate(" + e + "deg)"
            })
        }
    }, t.hideHead = function() {
        e("body").removeClass("ef-menu-active"), 
        e("#main-nav-check").prop('checked',false),
        t.ifSmallScreen() ? (t.gridContainerBlog.length && t.gridContainerBlog.data("masonry") && t.gridContainerBlog.data("masonry").layout(), e(window).trigger("resize"), e("#ef-site-nav").css({
            width: "0%"
        }), e("body").removeClass("ef-menu-animation")) : (e("#ef-site-nav").css({
            width: "0%",
            transition: "width ease 0.8s"
        }), t.delay_fn(function() {
            e("body").removeClass("ef-menu-animation"), t.isIE && e(".ef-default-logo1").css({
                position: ""
            })
        }, 800))
    }, t.showHead = function() {
        e("#main-nav-check").prop('checked',true),
        t.ifSmallScreen() ? 
            (
                e("#ef-site-nav").css({ width: "100%" }), 
                e("body").addClass("ef-menu-active").addClass("ef-menu-animation")
            ) : (
                e("body").addClass("ef-menu-animation"), 
                t.isIE && e(".ef-default-logo1").css({ position: "fixed" }), 
                t.delay_fn(function() {
                    e("#ef-site-nav").stop().global_transition({ width: "100%" }, 800, function() {
                        e("body").addClass("ef-menu-active")
                    })
                }, 100))
    }, t.hasAjaxLink = function() {
        return "undefined" != typeof ef_js_vars.ef_ajax && ef_js_vars.ef_ajax.offset < ef_js_vars.ef_ajax.postscount && e(".cbp-l-loadMore-text-link").length
    }, e.fn.ef_anglesBorder = function() {
        var t, i = e(this);
        i.each(function() {
            t = e(this).parent().width(), e(this).css(e(this).parent().hasClass("ef-bottom-angle") || !e(this).parent("a") ? {
                borderRightWidth: t
            } : {
                borderLeftWidth: t
            })
        })
    }, e.fn.ef_adjustImagePositioning = function(i) {
        var o = e(this).width(),
            n = e(this).height();
        e(this).find(".ef-adjust-position").css({
            width: "",
            height: ""
        }).each(function() {
            var a, s, r, l = e(this),
                d = n / o,
                f = l.width(),
                c = l.height(),
                p = c / f;
            r = isNaN(t.slider_options.cover) ? !1 : !t.slider_options.cover, d > p || r ? (s = n, a = n / p) : (s = o * p, a = o), l.css({
                width: a,
                height: s,
                left: (o - a) / 2,
                top: (n - s) / 2
            }), i && i()
        })
    }, t.MediaElementInit = function() {
        e('video[id^="ef-video-player-"]').each(function() {
            {
                var i = e(this).parent(".ef-ext-vid").length || e(this).parent("#ef-video-header").length;
                e(this), new MediaElementPlayer(this, {
                    enableKeyboard: !1,
                    features: t.isHome ? [] : ["playpause", "current", "progress", "duration", "tracks", "volume", "fullscreen"],
                    success: function(o) {
                        i && (mejs.MediaFeatures.isiOS ? (e(o).parents(".mejs-container").css({
                            opacity: 1
                        }), e("figure.slide_desc").css({
                            display: "block"
                        }).addClass("ef-animate-caption"), e("#ef-loader").remove()) : "youtube" !== o.pluginType && "flash" !== o.pluginType && (t.isMobile ? o.pause() : o.setMuted(!0), o.addEventListener("loadedmetadata", function() {
                            e("#ef-loader").remove(), o.setCurrentTime(0), o.setMuted(!1), e(o).parents(".mejs-container").global_transition({
                                opacity: 1
                            }), e("figure.slide_desc").css({
                                display: "block"
                            }).addClass("ef-animate-caption")
                        }, !1)), e(".ef-vid-play").on("click", function() {
                            return mejs.MediaFeatures.isiOS && "youtube" == o.pluginType || o.play(), e("body").addClass("ef-fullscreen-vid"), !1
                        }), o.addEventListener("pause", function() {
                            e("body").removeClass("ef-fullscreen-vid"), e(o).parents(".mejs-container").addClass("ef-vid-paused")
                        }))
                    },
                    error: function() {}
                })
            }
        })
    };
    var i = [];

    if (i.play = !1, i.cycle = 0, i.slideSpeed = 4e3, i.keycodes = new Array(37, 39), i.runSBslideshow = function() {
            i.cycle = setTimeout(function() {
                Shadowbox.next()
            }, i.slideSpeed), e("#sb-progress").find("span").finish().css({
                width: "0"
            }).animate({
                width: "100%"
            }, i.slideSpeed), i.play = !0
        }, i.stopSlideshow = function() {
            clearTimeout(i.cycle), e("#sb-progress").find("span").finish().css({
                width: "0"
            }), e("#sb-container").removeClass("sb-playing"), i.play = !1
        }, Shadowbox.init({
            animate: !0,
            overlayColor: "#fff",
            overlayOpacity: 1,
            viewportPadding: 40,
            continuous: !0,
            modal: !1,
            enableKeys: !0,
            onOpen: function() {
                var t = e("#sb-title").clone();
                e("#sb-title").remove(), t.appendTo("#sb-info"), Object.keys(Shadowbox.cache).length > 1 && (e('<div id="sb-custom-play"></div>').appendTo("#sb-wrapper-inner"), e('<div id="sb-custom-prev"></div><div id="sb-custom-next"></div>').appendTo("#sb-container"), e('<div id="sb-progress"><span></span></div>').appendTo("#sb-container"), e("#sb-container").find("div").on("click", function() {
                    e(this).is("#sb-custom-prev") ? Shadowbox.previous() : e(this).is("#sb-custom-next") && Shadowbox.next(), (e(this).is("#sb-custom-prev") || e(this).is("#sb-custom-next")) && i.play === !0 && i.stopSlideshow()
                }), e("#sb-custom-play").on("click", function() {
                    e(this);
                    i.play === !1 ? (i.runSBslideshow(), e("#sb-container").addClass("sb-playing"), e(document).on("keydown", function(t) {
                        e.inArray(t.which, i.keycodes) > -1 && i.stopSlideshow()
                    })) : i.stopSlideshow()
                }), e("#sb-info-inner").css({
                    display: ""
                })), e("#sb-title").css({
                    display: ""
                })
            },
            onFinish: function() {
                e("#sb-container").addClass("sb-opened"), i.play === !0 && i.runSBslideshow()
            },
            onClose: function() {
                i.stopSlideshow(), e("#sb-container").removeClass("sb-opened"), e("#sb-custom-prev, #sb-progress, #sb-custom-next, #sb-custom-play, #sb-custom-close").remove(), e("#sb-custom-close, #sb-info-inner, #sb-title").css({
                    display: "none"
                })
            },
            displayNav: !1
        }), e("#ef-sidebar").css({
            x: t.sidebar.Width + 100
        }), t.isHome && !t.homeBgSlider && e("#ef-header").css({
            zIndex: "10"
        }), e("#ef-loading-overlay").delay(500).global_transition({
            left: "100%"
        }, 500, function() {
            e("#ef-sidebar").css({
                display: "block"
            }).animate({
                x: t.sidebar.Width - 40
            })
        }), e(window).on("beforeunload", function() {
            e("#ef-loading-overlay").css({
                left: 0,
                right: "100%"
            }).global_transition({
                right: 0
            }, 500)
        }), e(".entry-content").find("p > iframe").each(function() {
            e(this).wrap('<s class="ef-responsive-iframe"></s>')
        }), e("html").addClass(t.isMobile ? "ef-touch" : "ef-no-touch"), navigator.userAgent.match(/(iPad|iPhone|iPod)/g) && e("html").addClass("ef-appleios"), e(".ef-searchform").submit(function(t) {
            var i = e(this).find("#s");
            i.val() || (t.preventDefault(), i.focus())
        }), e(window).width() < 1024 && t.isMobile && e("img[data-src]").each(function() {
            var t = e(this).attr("data-src");
            return e(this).removeAttr("data-src").attr("src", t)
        }), t.isMobile ? (e("#ef-sidebar").append('<div id="ef-toggle-sidebar"></div>'), e("#ef-toggle-sidebar").on("click", function() {
            t.sidebar.Closed ? e("#ef-sidebar").global_transition({
                x: 0
            }, 800, "easeOutExpo") : e("#ef-sidebar").global_transition({
                x: t.sidebar.Width - 40
            }, 800, "easeOutExpo"), t.sidebar.Closed = !t.sidebar.Closed
        })) : e("#ef-sidebar").hover(function() {
            e("#ef-sidebar").stop().animate({
                x: 0
            }, 800, "easeInOutQuint")
        }, function() {
            e("#ef-sidebar").stop().animate({
                x: t.sidebar.Width - 40
            }, 800, "easeInOutQuint")
        }), t.hideHead(), 
        e("#ef-toggle-menu").on("click", function() {
            return e("body").hasClass("ef-menu-active") ? t.hideHead() : t.showHead(), !1
        }), 
        e("#dt-menu-mobile .toggle.close-all").on("click", function() {
            return e("body").hasClass("ef-menu-active") ? t.hideHead() : t.showHead(), !1
        }), 
        e(document).keyup(function(t) {
            var i = t.keyCode ? t.keyCode : t.which;
            27 === i && e(".ef-menu-active").length && e("#ef-toggle-menu").click()
        }), t.main_slideshow.length) {
        e('<figure class="slide_desc ef-animate-caption"></figure>').insertAfter("#fireform-slider-wrapper");
        var o = e("figure.slide_desc"),
            n = [],
            a = [],
            s = [];
        t.main_slideshow.imagesLoaded(function() {
            t.main_slideshow.css({
                visibility: "visible",
                opacity: 0
            }).flexslider({
                animation: t.slider_options.transition,
                slideshow: t.slider_options.auto,
                slideshowSpeed: t.slider_options.slide_interval,
                animationSpeed: t.slider_options.transition_speed,
                useCSS: t.slider_options.css_engine,
                controlNav: t.homeBgSlider,
                directionNav: e("body.single").length,
                prevText: "",
                nextText: "",
                controlsContainer: "#fireform-slider-wrapper",
                keyboard: !0,
                multipleKeyboard: !0,
                animationLoop: !0,
                pauseOnAction: !1,
                reverse: !1,
                start: function(i) {
                    (t.homeBgSlider || t.hasSliderNav) && e('<a id="ef-to-project" class="icon-ef-right-small" href="#"></a>').insertAfter(e("#ef-header")), i.count <= 1 && t.main_slideshow.parent().find(".flex-direction-nav").remove(), i.ef_adjustImagePositioning(function() {
                        i.delay(300).global_transition({
                            opacity: 1
                        }, 1e3, function() {
                            e("#ef-loader").remove()
                        })
                    }), d(i.currentSlide, i.direction), e(".ef-footer-angle").ef_anglesBorder(), e("figure.slide_desc, .flex-control-paging").css({
                        display: "block"
                    })
                },
                before: function(e) {
                    var t = e.animatingTo;
                    r(t), d(t)
                },
                after: function() {
                    o.addClass("ef-animate-caption")
                }
            })
        }), t.main_slideshow.find(".ef-slide").each(function() {
            n.push(e(this).find(".html-desc").html()), a.push(e(this).data("url")), s.push(e(this).hasClass("ef-dark-slide"))
        });
        var r = function(t) {
                e("body").removeClass("ef-dark-adjustor"), s[t] && e("body").addClass("ef-dark-adjustor")
            },
            l = !1,
            d = function(i) {
                a[i] && t.isHome ? e("#ef-to-project").attr("href", a[i]).css({
                    bottom: 0
                }) : e("#ef-to-project").attr("href", "").css({
                    bottom: ""
                }), n[i] ? (o.html(n[i]), l && o.removeClass("ef-animate-caption"), l = !0) : o.html("")
            };
        e(".ef-slideshow-prev").on("click", function(e) {
            e.preventDefault(), t.main_slideshow.data("flexslider").flexAnimate(t.main_slideshow.data("flexslider").getTarget("prev"))
        }), e(".ef-slideshow-next").on("click", function(e) {
            e.preventDefault(), t.main_slideshow.data("flexslider").flexAnimate(t.main_slideshow.data("flexslider").getTarget("next"))
        })
    }
    var f;
    e("#ef-to-content").on("click", function() {
        return f = t.isHome ? e(window).height() + e(document).height() : e(".ef-advanced-layout").length ? e("#ef-content > main").offset().top : e("#ef-content").offset().top, e("html, body").animate({
            scrollTop: f
        }, 1e3), !1
    });
    var c = {
            init: function() {
                var t = this;
                t.post_per = parseInt(ef_js_vars.ef_ajax.offset, 10), t.offset = t.post_per, t.total = parseInt(ef_js_vars.ef_ajax.postscount, 10), t.isActive = !1, t.loadMore = e(".cbp-l-loadMore-text-link"), t.window = e(window), t.addEvents(), t.getNewItems()
            },
            addEvents: function() {
                var e = this;
                e.window.on("scroll.loadMoreObject", function() {
                    e.getNewItems()
                })
            },
            getNewItems: function() {
                var i, o, n = this;
                n.isActive || n.loadMore.hasClass("cbp-l-loadMore-text-stop") || (i = n.loadMore.offset().top, o = n.window.scrollTop() + n.window.height(), i > o || (n.isActive = !0, e.ajax({
                    type: "post",
                    cache: !1,
                    timeout: 8e3,
                    url: ef_js_vars.ef_ajax.ajaxurl,
                    data: {
                        action: "ef_ajax_posts",
                        post_type: ef_js_vars.ef_ajax.post_type,
                        offset: n.offset,
                        posts_per: n.post_per,
                        postCommentNonce: ef_js_vars.ef_ajax.postCommentNonce,
                        terms: ef_js_vars.ef_ajax.terms,
                        show_content: ef_js_vars.ef_ajax.show_content,
                        blog_style: ef_js_vars.ef_ajax.blog_style,
                        show_gallery: ef_js_vars.ef_ajax.show_gallery
                    }
                }).done(function(a) {
                    var s, r = function() {
                        n.loadMore.text(ef_js_vars.ef_ajax.no_more_text), n.loadMore.addClass("cbp-l-loadMore-text-stop"), n.window.off("scroll.loadMoreObject"), t.delay_fn(function() {
                            e(".cbp-l-loadMore-text").fadeOut()
                        }, 1200)
                    };
                    0 !== e(a).find(".ef-post").length ? s = e(a).find(".ef-post") : r();
                    var l = function(e) {
                            n.offset < n.total ? (n.isActive = !1, i = n.loadMore.offset().top, o = n.window.scrollTop() + n.window.height(), o >= i && n.getNewItems()) : r(), e && e()
                        },
                        d = "undefined" != typeof s ? s : !1;
                    d && (t.gridContainer.length ? t.gridContainer.cubeportfolio("appendItems", d, l) : (d.hide(), e("#ef-blog-inner").append(d), d.imagesLoaded(function() {
                        d.show(), t.gridContainerBlog.length ? t.gridContainerBlog.data("masonry").appended(d) : d.global_transition({
                            opacity: 0,
                            scale: .8
                        }, 0), t.MediaElementInit(), d.imagesLoaded(function() {
                            t.gridContainerBlog.length ? t.delay_fn(function() {
                                l()
                            }, 500) : (l(), d.global_transition({
                                opacity: 1,
                                scale: 1
                            }))
                        })
                    })), n.offset = n.offset + n.post_per)
                }).fail(function() {
                    n.isActive = !1
                })))
            }
        },
        p = Object.create(c);
    if (t.gridContainer.length && (t.gridContainer.cubeportfolio({
            animationType: "scaleSides",
            defaultFilter: "*",
            gapHorizontal: 40,
            gapVertical: 40,
            gridAdjustment: "responsive",
            displayType: "sequentially",
            displayTypeSpeed: 100
        }), t.filtersContainer.on("click", "a", function() {
            var i = e(this);
            return e.data(t.gridContainer[0], "cubeportfolio").isAnimating || (t.filtersContainer.find("li").removeClass("cbp-filter-item-active"), i.parent("li").addClass("cbp-filter-item-active")), t.gridContainer.cubeportfolio("filter", i.data("filter"), function() {}), !1
        }), t.gridContainer.cubeportfolio("showCounter", t.filtersContainer.find("a")), t.hasAjaxLink() && (t.gridContainer.on("initComplete", function() {
            p.init()
        }), t.gridContainer.on("filterComplete", function() {
            p.window.trigger("scroll.loadMoreObject")
        }))), t.gridContainerBlog.length ? t.gridContainerBlog.imagesLoaded(function() {
            t.gridContainerBlog.masonry({
                itemSelector: ".ef-post",
                isInitLayout: !1
            }), t.gridContainerBlog.masonry("once", "layoutComplete", function() {
                t.hasAjaxLink() && t.delay_fn(function() {
                    p.init()
                }, 800)
            }).layout()
        }) : t.ifBlog && t.hasAjaxLink() && p.init(), e('div.gallery[id^="gallery"]').find("a").has("img").each(function() {
            var t = e(this).children("img").attr("alt");
            e(this).attr("title", t)
        }), e('div.gallery[id^="gallery"]').has(".gallery-icon > a").each(function(t) {
            var i = e("a:first > img", this).attr("src"),
                o = e("a:first", this).attr("href"),
                n = "wp-native-gallery-" + t;
            o.substr(-3, 3) == i.substr(-3, 3) && e("a", this).addClass("ef-gallery-lightbox-" + t).attr("rel", n), Shadowbox.setup(".ef-gallery-lightbox-" + t, {
                gallery: n
            }), t++
        }), ef_js_vars.woolightbox && e(".woocommerce.single-product").has("a.zoom") && Shadowbox.setup("a.zoom", {
            gallery: "zoom"
        }), t.MediaElementInit(), e(".ef-adjust-position").length ? e(".ef-positioner").imagesLoaded(function() {
            e(".ef-positioner").ef_adjustImagePositioning(function() {
                e(".ef-positioner").children("img").first().css({
                    visibility: "visible",
                    opacity: "0"
                }).delay(300).global_transition({
                    opacity: "1"
                }, 1e3, function() {
                    e("#ef-loader").remove()
                })
            })
        }) : e("#ef-loader").remove(), t.keyframes = t.isHome ? t.homeBgSlider ? [] : [{
            duration: "200%",
            animations: [{
                selector: "figure.slide_desc",
                translateY: ["-20%", "20%"],
                opacity: [0, 3],
                scale: [.9, 1.12]
            }, {
                selector: ".ef-parallax-block",
                translateY: ["10%", "-10%"]
            }]
        }] : [{
            duration: "200%",
            animations: [{
                selector: "#ef-header-inner",
                translateY: "250%",
                scale: 0,
                opacity: -1
            }, {
                selector: ".ef-parallax-block",
                translateY: ["0", "-50%"]
            }]
        }], !ef_js_vars.parallax || t.isIE || t.isMobile || e.eFparallax({
            keyframes: t.keyframes
        }), e(window).smartresize(function() {
            t.isHome ? (e(window).width() <= 767 && e(".fireform-slider-inner, #ef-video-header").css({
                height: e(window).height()
            }), e("html").ef_adjustImagePositioning()) : e(".ef-positioner").ef_adjustImagePositioning()
            /*, e("#ef-site-nav-inner").css({width: e(window).width()})*/
        }), e(window).on("resize orientationchange", function() {
            var i = t.sidebar.Width;
            t.sidebar.Width = e("#ef-sidebar").width(), i !== t.sidebar.Width && e("#ef-sidebar").css({
                x: t.sidebar.Width - 40
            })
        }), e(window).on("resize", function() {
            if (t.headerMin(), t.isHome && !t.homeBgSlider && ("undefined" != typeof t.main_slideshow && t.main_slideshow.length && t.navAngleFn(), t.bodyHeight()), e(".ef-header-angle, .ef-footer-angle").ef_anglesBorder(), "undefined" != typeof t.main_slideshow && t.slider_options.auto) {
                var i = t.main_slideshow.data("flexslider");
                "undefined" != typeof i && i.playing && (i.pause(), i.play())
            }
        }).trigger("resize"), e(document).on("webkitfullscreenchange mozfullscreenchange fullscreenchange", function() {
            e(window).trigger("resize")
        }), e(window).scroll(function() {
            t.homeBgSlider || (t.scrollOffsetY = e(document).scrollTop(), t.scrollOffsetY > .8 * e("#ef-header-inner").height() ? e("body").addClass("ef-header-out") : e("body").removeClass("ef-header-out"))
        }).trigger("scroll"), t.openedCart = !1, e("body").on("click", "a.cart-contents", function() {
            return t.openedCart ? (e(".ef-mini-cart").css({
                display: "none"
            }), e("#ef-sidebar").css({
                display: "block"
            })) : (e(".ef-mini-cart").css({
                display: "block"
            }), e("#ef-sidebar").css({
                display: "none"
            })), t.openedCart = !t.openedCart, !1
        }), e(".ef-share-buttons").each(function() {
            e(this).find("a:not(.icon-ef-mail)").on("click", function() {
                if (e(this).hasClass("icon-ef-pinterest")) {
                    var i = document.createElement("script");
                    return i.setAttribute("type", "text/javascript"), i.setAttribute("charset", "UTF-8"), i.setAttribute("src", "http://assets.pinterest.com/js/pinmarklet.js?r=" + 99999999 * Math.random()), document.body.appendChild(i), !1
                }
                if (!t.isMobile) {
                    {
                        var o = 500,
                            n = 500,
                            a = screen.width / 2 - o / 2,
                            s = screen.height / 2 - n / 2;
                        window.open(e(this).prop("href"), e(this).prop("title"), "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=1, resizable=1, copyhistory=no, width=" + o + ", height=" + n + ", top=" + s + ", left=" + a)
                    }
                    return !1
                }
            })
        }), e("#ef-ext-video-v").length) {
        var m = e("#ef-ext-video-v")[0],
            u = $f(m),
            h = function() {
                e("body").removeClass("ef-fullscreen-vid")
            },
            g = function() {
                e("body").addClass("ef-fullscreen-vid")
            };
        u.addEvent("ready", function() {
            u.addEvent("pause", h), u.addEvent("finish", h), u.addEvent("playProgress", g), e(".ef-vid-play").on("click", function() {
                return mejs.MediaFeatures.isiOS ? e("body").addClass("ef-fullscreen-vid") : u.api("play"), !1
            })
        })
    }
    if (t.video && e("#ef-to-project").length && e("#ef-to-project").css({
            bottom: 0
        }), "undefined" != typeof google && t.map_marker) {
        var y = {
                zoom: t.zoomLevel,
                center: new google.maps.LatLng(t.map_marker.lat, t.map_marker.lon),
                scrollwheel: !1,
                navigationControl: !1,
                mapTypeControl: !1,
                panControl: !1,
                zoomControl: !1,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.LEFT_CENTER
                },
                scaleControl: !1,
                styles: [{
                    featureType: "water",
                    elementType: "geometry.fill",
                    stylers: [{
                        color: "#d3d3d3"
                    }]
                }, {
                    featureType: "transit",
                    stylers: [{
                        color: "#808080"
                    }, {
                        visibility: "off"
                    }]
                }, {
                    featureType: "road.highway",
                    elementType: "geometry.stroke",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#b3b3b3"
                    }]
                }, {
                    featureType: "road.highway",
                    elementType: "geometry.fill",
                    stylers: [{
                        color: "#ffffff"
                    }]
                }, {
                    featureType: "road.local",
                    elementType: "geometry.fill",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#ffffff"
                    }, {
                        weight: 1.8
                    }]
                }, {
                    featureType: "road.local",
                    elementType: "geometry.stroke",
                    stylers: [{
                        color: "#d7d7d7"
                    }]
                }, {
                    featureType: "poi",
                    elementType: "geometry.fill",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#ebebeb"
                    }]
                }, {
                    featureType: "administrative",
                    elementType: "geometry",
                    stylers: [{
                        color: "#a7a7a7"
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "geometry.fill",
                    stylers: [{
                        color: "#ffffff"
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "geometry.fill",
                    stylers: [{
                        color: "#ffffff"
                    }]
                }, {
                    featureType: "landscape",
                    elementType: "geometry.fill",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#efefef"
                    }]
                }, {
                    featureType: "road",
                    elementType: "labels.text.fill",
                    stylers: [{
                        color: "#696969"
                    }]
                }, {
                    featureType: "administrative",
                    elementType: "labels.text.fill",
                    stylers: [{
                        visibility: "on"
                    }, {
                        color: "#737373"
                    }]
                }, {
                    featureType: "poi",
                    elementType: "labels.icon",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "poi",
                    elementType: "labels",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {
                    featureType: "road.arterial",
                    elementType: "geometry.stroke",
                    stylers: [{
                        color: "#d6d6d6"
                    }]
                }, {
                    featureType: "road",
                    elementType: "labels.icon",
                    stylers: [{
                        visibility: "off"
                    }]
                }, {}, {
                    featureType: "poi",
                    elementType: "geometry.fill",
                    stylers: [{
                        color: "#dadada"
                    }]
                }]
            },
            v = document.getElementById("ef-gmap"),
            b = new google.maps.Map(v, y),
            _ = .3 * -window.innerWidth,
            w = .2 * window.innerHeight,
            C = new google.maps.LatLng(t.map_marker.lat, t.map_marker.lon);
        b.panBy(_, w), window.onload = function() {
            e("#ef-loader").remove();
            var i = new google.maps.MarkerImage(ef_js_vars.marker_img, null, null, null, new google.maps.Size(90, 95)),
                o = new google.maps.Marker({
                    position: C,
                    animation: google.maps.Animation.DROP,
                    map: b,
                    icon: i
                }),
                n = document.getElementById("ef-expand-map");
            if (null !== n) {
                var a = !0;
                n.addEventListener("click", function() {
                    a ? (document.body.className += " ef-show-map", b.setOptions({
                        zoomControl: !0,
                        scrollwheel: !0
                    }), b.panBy(-_, -w)) : (document.body.classList.remove("ef-show-map"), b.setOptions({
                        zoomControl: !1,
                        scrollwheel: !1
                    }), b.panBy(_, w)), a = !a
                })
            }
            t.delay_fn(function() {
                o.setAnimation(google.maps.Animation.BOUNCE)
            }, 1500)
        }
    }
}(jQuery);


jQuery(window).resize(function() {
    'use strict';

    var w = jQuery('.dt-boxed-container').width();
    var h = jQuery('body').height();
    jQuery('.dt-boxed-container .sidemenuoverlay header.stickyonscrollup').css('width',w);
    jQuery('.dt-boxed-container .sidemenuoverlay #ef-header').css('width',w);
    jQuery('.dt-boxed-container .sidemenuoverlay #ef-site-nav-inner').css('width',w);
    //jQuery('.dt-boxed-container .sidemenuoverlay #ef-site-nav').css('height',h);

    jQuery('#ef-site-nav').css('height',h);
    //var h = jQuery('.dt-boxed-stretched-container').height();
    //jQuery('.dt-boxed-stretched-container .sidemenuoverlay #ef-site-nav').css('height',h);
    //jQuery('.dt-boxed-stretched-container .sidemenuoverlay #ef-site-nav').css('height',h);
});

jQuery(window).load(function() {
    'use strict';
    
    var w = jQuery('.dt-boxed-container').width();
    var h = jQuery('body').height();
    //var h = jQuery('.dt-boxed-container').height();
    jQuery('.dt-boxed-container .sidemenuoverlay header.stickyonscrollup').css('width',w);
    jQuery('.dt-boxed-container .sidemenuoverlay #ef-header').css('width',w);
    jQuery('.dt-boxed-container .sidemenuoverlay #ef-site-nav-inner').css('width',w);
    //jQuery('.dt-boxed-container .sidemenuoverlay #ef-site-nav').css('height',h);

    //var h = jQuery('.dt-boxed-stretched-container').height();
    //jQuery('.dt-boxed-stretched-container .sidemenuoverlay #ef-site-nav').css('height',h);
    jQuery('#ef-site-nav').css('height',h);
});
