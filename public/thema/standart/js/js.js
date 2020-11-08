//addActive,fitter,inMiddle,hideOthers,Goto,hideBody,makeAnim,goo,randomer,isExist,logger,makegoTop,openSelects,iScreen.,.replaceAll,.trim,.contains
var locsA = [], bxslider;
$(document).ready(function () {
    inMiddle(".ihover,.istand");
    $('.slide > ul').bxSlider({ auto: true, controls: false, pager: true, pause: 5000, autoHover: false, adaptiveHeight: true, captions: true });
    $('.news-slide ul').bxSlider({ auto: true, pause: 6000, controls: false, pager: true, moveSlides: 1, randomStart: false });
    bxslider = $('.product-slide ul').bxSlider({ auto: true, pause: 4000, controls: false, pager: false, slideWidth: 65, slideMargin: 20, minSlides: 1, maxSlides: 3, moveSlides: 1, randomStart: false });
    try { $(".fancybox").fancybox(); } catch (e) { }
    $('[data-toggle="tooltip"]').tooltip({ container: "body" });
    manuelFuncs();
});
function manuelFuncs() {
    $("a").attr("ontouchstart", "true");
    responsiveHeighter();
    addActive();
    addActive(".side-menu > ul > li", 0, ".side-menu"); addActive(".itab", 0, ".itabs", 1);
    focusZoom();
    $("body").prepend('<div class="iwrapper"></div>');
    subMenu();
    ipop.load();
    $("[animate]").each(function (i) { var me = $(this); setTimeout(function () { var anim = $(me).attr("animate"); if (anim) { cssAnim($(me), anim); $(me).css("visibility", "visible"); } }, 100 * i); });
    $("[data-animate]").each(function () { $(this).mouseenter(function () { var anim = $(this).attr("data-animate"); cssAnim($(this), anim); }); });
    makegoTop();
}
$(document).ready(function () { if (!iScreen.xs()) { fixedTop(); } });
function fixedTop(c, xPos) {
    var isStatic = $("body").data("staticbar");
    if (!isStatic) {
        c = c ? c : ".topbar";
        if (!xPos) { var p = $(c).position().top; if (p) { xPos = p; } else { xPos = 100; } }
        $("body").prepend("<div class='header'></div>");
        var h = 0;
        if ($(c).length > 0) {
            h = $(c).innerHeight();
            $(window).scroll(function () {
                var uzunluk = $(document).scrollTop();
                if (uzunluk > xPos) {
                    if ($(".ifix").not(".static").length < 1) {
                        $(c).clone().prependTo(".header").addClass("ifix").removeClass("static");
                        cssAnim(".header .ifix", "fadeInDown");
                        subMenu(".ifix #bs > ul > li");/*optionality*/
                    }
                } else { $(".header .ifix").remove(); }
            });
        }
        return h;
    }
}
function cssAnim(c, x) {
    $(c).addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass(x + " animated");
    });
}
function subMenu(c) {
    c = c ? c : "#bs > ul > li"; var w = ".iwrapper";
    $(c).each(function () {
        var e = $(this); var sub = $(e).find(".submenu");
        if ($(e).find("ul").length > 0) {
            $(e).mouseenter(function () { $(w).addClass("open"); }).mouseleave(function () { $(w).removeClass("open"); })
            .click(function () { $(w).addClass("opened"); }).focusout(function () { $(w).removeClass("opened"); });
        }
        if ($(sub).length > 0) {
            $(e).mouseenter(function () { fitter(0, "height"); }).find(">a")
            .click(function () { $("#bs").find(".dropdown.open").removeClass("open"); $(w).addClass("opened"); $(e).addClass("open"); })
            $(e).focusout(function () { $(e).removeClass("open"); $(w).removeClass("opened"); });
            $(sub).find("ul li a").each(function () {
                var img = $(this).data("image");
                if (img) { $(this).mouseenter(function () { $(".submenu .istand img").attr("src", img); }); }
            });
        }
    });
}
function focusZoom(c) {
    c = c ? c : "focused";
    $("[data-focus]").each(function () {
        var e = $(this); var focus = $(this).data("focus");
        if (focus) { e = $("[data-focus-in='" + focus + "']"); }
        $(e).addClass("anim");
        $(this).focus(function () { $(e).addClass(c); }).focusout(function () { $(e).removeClass(c); });
    });
}
function responsiveHeighter(c) {
    c = c ? c : ".slide ul li img";
    if (!iScreen.xs()) {
        var e = $(c).first();
        $(e).load(function () {
            var w = $(e).innerWidth(), h = $(e).innerHeight(), nh = 0;
            doo();
            $(window).on('resize', function () { doo(); });
            function doo() { if ((w > 2) && (h > 2)) { var nw = $(e).innerWidth(); nh = parseInt((nw / w) * h); if (nh > 2) { $(".slide .slide-image,.slide .bx-viewport").height(nh); } } }
        });
    }
}
function addActive(c, speed, section, noClose, callback) {
    if (typeof callback != "function") { callback = function (clsOrId) { }; }
    c = c ? c : "[data-active]", content = "data-active-in"; speed = speed ? speed : 400; section = section ? section : "";
    $(section + " [" + content + "]").not(".active").hide();
    $(c).each(function () {
        $(this).unbind("click").click(function () {
            var isActive = $(this).hasClass("active");
            var ind = $(this).attr("data-active");
            if (!((noClose) && (isActive))) {
                $(c).removeClass("active"); $(section + " [" + content + "].active").slideUp(speed / 2, function () { $(this).removeClass("active"); });
                if (!isActive) {
                    $(this).addClass("active");
                    if (ind) { $(section + " [" + content + "='" + ind + "']").addClass("active").stop().slideDown(speed, function () { callback(); }); }
                }
            }
            //return false;
        });
    });
}

function fitter(c, prop) {
    c = c ? c : ".fitter"; var maXh = 0, h = 0; prop = prop ? prop : "min-height";
    $(c).each(function (i, e) { h = $(this).innerHeight(); if (h > maXh) { maXh = h; } });
    try { if (maXh > 15) $(c).css(String(prop), maXh + "px"); } catch (err) { }
}
function inMiddle(clsOrId, textAlign, moreCss) {
    clsOrId = clsOrId ? clsOrId : "div.inMiddle"; textAlign = textAlign ? textAlign : "center"; moreCss = moreCss ? moreCss : ""
    var css = ' style="margin:0px;padding:0px;border:0px;border-spacing:0px;vertical-align:middle;text-align:' + textAlign + ';width:100%;height:100%;' + moreCss + '"';
    $(clsOrId).each(function () {
        var htm = $(this).html();
        $(this).html("<table" + css + "><tr><td" + css + ">" + htm + "</td></tr></table>");
    });
}
function hideOthers(clsOrId, speed, lowQuality) {
    if (!lowQuality) { lowQuality = '0.3'; } if (!speed) { speed = 800; }
    $(clsOrId).mouseenter(function () {
        $(clsOrId).not(this).stop().fadeTo(speed, lowQuality);
    }).mouseleave(function () {
        $(clsOrId).stop().fadeTo(speed / 2, 1);
    });
}
function Goto(c, nuans, speed) {
    speed = speed ? speed : 600; nuans = nuans ? nuans : 0; var goTop = '';
    if ($.isNumeric(c)) { goTop = c; } else { goTop = $(c).offset().top - nuans; }
    $('html,body').animate({ scrollTop: goTop }, speed);
    if (window.addEventListener) document.addEventListener('DOMMouseScroll', stopScroll, false);
    document.onmousewheel = stopScroll;
    function stopScroll() { $('html,body').stop() };
    return false;
}
function hideBody(clsOrId, speed, lowQuality) {
    if (!lowQuality) { lowQuality = '0.5'; } if (!speed) { speed = 600; }
    $('body').prepend('<div class="blacked" style="top:0px;left:0px;position:fixed;height:100%;width:100%;background-color:#000;z-index:99;display:none;"></div>');
    var pos = $(clsOrId).css("position");
    if ((pos == 'inherit') || (pos == 'static')) { pos = 'relative' }
    $(clsOrId).mouseenter(function () {
        $('.blacked').stop(false, true).fadeTo(speed, lowQuality);
        $(this).css({ "position": pos, "z-index": "100" });
    }).mouseleave(function () {
        var me = $(this);
        $('.blacked').stop(false, true).fadeTo(speed / 2, 0, function () { $(this).hide(1); $(me).css({ "position": pos, "z-index": "1" }); });
    });
}
function makeAnim(clsOrId, findElm, anim, val, speed, callback) {
    if (!speed) { speed = 200; } if (!anim) { anim = "margin-top"; } if (!val) { val = "3px"; }
    if (typeof callback != "function") { callback = function (clsOrId) { }; }
    var el = findElm ? $(clsOrId).first().find(findElm) : $(clsOrId).first();
    var options = {}; var optionsex = {}, exValue = $(el).css(anim);
    options[anim] = val; optionsex[anim] = exValue; //options["color"] = "#FFFFFF"; optionsex["color"] = "#cd1c1c";
    $(clsOrId).not(".no,.no-effect").each(function () {
        $(this).mouseenter(function () {
            var el = findElm ? $(this).find(findElm) : $(this);
            $(el).each(function () {
                $(this).stop().animate(options, speed, function () { callback(this); });
            });
        }).mouseleave(function () {
            var el = findElm ? $(this).find(findElm) : $(this);
            $(el).each(function () {
                $(this).stop().animate(optionsex, speed, function () { callback(this); });
            });
        });
    });
}
var iScreen = {
    xs: function () { var w = $(document).width(); if (w < 768 && w > 0) { return w; } else { return false; } }
}
function goo(url) { window.location.href = url; }
function randomer(from, to) { return Math.floor((to - (from - 1)) * Math.random()) + from; }
function isExist(c) { if ($(c).length > 0) { return true; } else { return false; } }
String.prototype.replaceAll = function (stringToFind, stringToReplace) {
    var temp = this;
    try {
        var index = temp.indexOf(stringToFind);
        while (index != -1) {
            temp = temp.replace(stringToFind, stringToReplace);
            index = temp.indexOf(stringToFind);
        }
    } catch (err) { }
    return temp;
}
if (typeof String.prototype.trim !== 'function') {
    String.prototype.trim = function () {
        return this.replace(/^\s+|\s+$/g, '');
    }
}
if (typeof String.prototype.bool !== 'function') {
    String.prototype.bool = function () {
        return !!JSON.parse(String(this).toLowerCase());
    }
}
String.prototype.contains = function (find) {
    var temp = this, ok = false;
    try {
        if (String(temp).indexOf(find) != -1) { ok = true; } else { ok = false; }
    } catch (err) { }
    return ok;
}
function logger(s) {
    try {
        if (window.console && window.console.log && s) {
            console.log(s);
        }
    } catch (err) { }
}
function makegoTop(clsOrId, speed) {
    if (!speed) { speed = 700; }
    if (!clsOrId) {
        clsOrId = '#goTop';
        var i = "<i class='fa fa-angle-double-up fa-3x'></i>";
        $('body').append('<div class="goTop img-rounded" style="display:none;color:#fff;background-color:#333;border:1px dashed #eee;cursor:pointer;padding:2px 10px;bottom:15px;right:15px;position:fixed;z-index:99;" id="goTop">' + i + '</div>');
    }
    $(clsOrId).click(function () {
        Goto(1);
    });
    $(window).scroll(function () {
        var uzunluk = $(document).scrollTop();
        if (uzunluk > 600) $(clsOrId).stop(false, true).fadeIn(speed);
        else { $(clsOrId).stop(false, true).fadeOut(speed); }
    });
}
(function ($) {
    "use strict";
    $.fn.openSelect = function () {
        return this.each(function (idx, domEl) {
            if (document.createEvent) {
                var event = document.createEvent("MouseEvents");
                event.initMouseEvent("mousedown", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
                domEl.dispatchEvent(event);
            } else if (element.fireEvent) {
                domEl.fireEvent("onmousedown");
            }
        });
    }
}(jQuery));
function openSelects(c) {
    c = c ? c : ".form-group";
    $(c).each(function () {
        var btn = $(this).find(".open-select"), select = $(this).find("select:first");
        $(btn).click(function () { $(select).openSelect(); });
    });
}


var ipop = {
    c: "#ipop",
    cd: "#ipop .countdown",
    timer: null,
    counterTotal: 0,
    load: function () {
        var pause = $(ipop.c).attr("data-pause");
        try {
            if (pause != "1" && ($.cookie('ipop') != "1")) {
                ipop.start();
                ipop.seen();
            }
        } catch (err) { }
    },
    start: function () {
        var num = $(ipop.cd).html();
        try { num = num.trim(); } catch (err) { }
        if ($.isNumeric(num)) {
            ipop.counterTotal = num;
            ipop.timer = setInterval(function () {
                ipop.counterTotal -= 1;
                $(ipop.cd).html(ipop.counterTotal);
                if (ipop.counterTotal == 0) { ipop.stop(); }
            }, 1000);
        }
    },
    stop: function () {
        if (ipop.timer) { clearInterval(ipop.timer); }
        ipop.seen("hide");
        $.cookie('ipop', '1', { expires: 3, path: '/' });
    },
    seen: function (status) {
        status = status ? status : "show";
        if (status) $(ipop.c).modal(status);
    }
}
function addLocation(x, y, locs, title, html, icon) {
    icon = icon ? icon : 'thema/standart/images/map-icon.png'; locs = locs ? locs : locsA; html = html ? html : "";
    if (html) { html = "<div class='mapopup'>" + html + "</div>"; }
    locs.push({
        lat: x,
        lon: y,
        title: title,
        html: html,
        icon: icon,
        animation: google.maps.Animation.DROP
    });
}
function mapser(id, locs, zoom) {
    id = id ? id : "mapser"; locs = locs ? locs : locsA; zoom = zoom ? zoom : 16;
    // harita stili
    var styles = {
        'Gece': [{
            featureType: 'all',
            stylers: [
                { invert_lightness: 'true' }
            ]
        }],

        'Genel': [{
            featureType: 'all',
            stylers: [
            {
                "hue": "#ff4400"
            },
            {
                "saturation": -68
            },
            {
                "lightness": -4
            },
            {
                "gamma": 0.72
            }
            ]
        }]
    }
    var styled = new Maplace({
        map_div: '#' + id,
        locations: locs,
        start: 1,
        styles: styles,
        map_options: {
            zoom: zoom,/*7*/
            scrollwheel: false
        }
    }).Load();
}
