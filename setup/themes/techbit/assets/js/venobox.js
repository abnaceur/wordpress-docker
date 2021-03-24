/*
 * VenoBox - jQuery Plugin
 * version: 1.8.9
 * @requires jQuery >= 1.7.0
 *
 * Examples at http://veno.es/venobox/
 * License: MIT License
 * License URI: https://github.com/nicolafranchini/VenoBox/blob/master/LICENSE
 * Copyright 2013-2020 Nicola Franchini - @nicolafranchini
 *
 */
!(function (e) {
    "use strict";
    var s,
        i,
        a,
        t,
        o,
        c,
        r,
        l,
        d,
        n,
        v,
        u,
        b,
        h,
        k,
        p,
        g,
        m,
        f,
        x,
        w,
        y,
        _,
        C,
        z,
        B,
        P,
        M,
        E,
        O,
        D,
        N,
        U,
        V,
        I,
        j,
        R,
        X,
        Y,
        W,
        q,
        $,
        A,
        H,
        Q,
        S,
        T =
            '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.372-12 12 0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146 1.124.347 2.317.535 3.554.535 6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z" fill-rule="evenodd" clip-rule="evenodd"/></svg>',
        Z =
            '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/></svg>',
        F =
            '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.066 9.645c.183 4.04-2.83 8.544-8.164 8.544-1.622 0-3.131-.476-4.402-1.291 1.524.18 3.045-.244 4.252-1.189-1.256-.023-2.317-.854-2.684-1.995.451.086.895.061 1.298-.049-1.381-.278-2.335-1.522-2.304-2.853.388.215.83.344 1.301.359-1.279-.855-1.641-2.544-.889-3.835 1.416 1.738 3.533 2.881 5.92 3.001-.419-1.796.944-3.527 2.799-3.527.825 0 1.572.349 2.096.907.654-.128 1.27-.368 1.824-.697-.215.671-.67 1.233-1.263 1.589.581-.07 1.135-.224 1.649-.453-.384.578-.87 1.084-1.433 1.489z"/></svg>',
        G =
            '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/></svg>',
        J =
            '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm2 9h-4v-1h4v1zm0-3v1h-4v-1h4zm-2 13l-6-6h4v-3h4v3h4l-6 6z"/></svg>';
    e.fn.extend({
        venobox: function (K) {
            var L = this,
                ee = e.extend(
                    {
                        arrowsColor: "#B6B6B6",
                        autoplay: !1,
                        bgcolor: "#fff",
                        border: "0",
                        closeBackground: "transparent",
                        closeColor: "#d2d2d2",
                        framewidth: "",
                        frameheight: "",
                        gallItems: !1,
                        infinigall: !1,
                        htmlClose: "&times;",
                        htmlNext: "<span>Next</span>",
                        htmlPrev: "<span>Prev</span>",
                        numeratio: !1,
                        numerationBackground: "#161617",
                        numerationColor: "#d2d2d2",
                        numerationPosition: "top",
                        overlayClose: !0,
                        overlayColor: "rgba(23,23,23,0.85)",
                        spinner: "double-bounce",
                        spinColor: "#d2d2d2",
                        titleattr: "title",
                        titleBackground: "#161617",
                        titleColor: "#d2d2d2",
                        titlePosition: "top",
                        share: ["facebook", "twitter", "linkedin", "pinterest", "download"],
                        cb_pre_open: function () {
                            return !0;
                        },
                        cb_post_open: function () {},
                        cb_pre_close: function () {
                            return !0;
                        },
                        cb_post_close: function () {},
                        cb_post_resize: function () {},
                        cb_after_nav: function () {},
                        cb_content_loaded: function () {},
                        cb_init: function () {},
                    },
                    K
                );
            return (
                ee.cb_init(L),
                this.each(function () {
                    if ((D = e(this)).data("venobox")) return !0;
                    function K() {
                        (_ = D.data("gall")),
                            (f = D.data("numeratio")),
                            (h = D.data("gallItems")),
                            (k = D.data("infinigall")),
                            (H = D.data("share")),
                            o.html(""),
                            "iframe" !== D.data("vbtype") &&
                                "inline" !== D.data("vbtype") &&
                                "ajax" !== D.data("vbtype") &&
                                ((Q = {
                                    pinterest: '<a target="_blank" href="https://pinterest.com/pin/create/button/?url=' + D.prop("href") + "&media=" + D.prop("href") + "&description=" + y + '">' + T + "</a>",
                                    facebook: '<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' + D.prop("href") + '">' + Z + "</a>",
                                    twitter: '<a target="_blank" href="https://twitter.com/intent/tweet?text=' + y + "&url=" + D.prop("href") + '">' + F + "</a>",
                                    linkedin: '<a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=' + D.prop("href") + '">' + G + "</a>",
                                    download: '<a target="_blank" href="' + D.prop("href") + '">' + J + "</a>",
                                }),
                                e.each(H, function (e, s) {
                                    o.append(Q[s]);
                                })),
                            (p = h || e('.vbox-item[data-gall="' + _ + '"]')).length < 2 && ((k = !1), (f = !1)),
                            (C = p.eq(p.index(D) + 1)),
                            (z = p.eq(p.index(D) - 1)),
                            C.length || !0 !== k || (C = p.eq(0)),
                            p.length >= 1 ? ((N = p.index(D) + 1), t.html(N + " / " + p.length)) : (N = 1),
                            !0 === f ? t.show() : t.hide(),
                            "" !== y ? c.show() : c.hide(),
                            C.length || !0 === k ? (e(".vbox-next").css("display", "block"), (B = !0)) : (e(".vbox-next").css("display", "none"), (B = !1)),
                            p.index(D) > 0 || !0 === k ? (e(".vbox-prev").css("display", "block"), (P = !0)) : (e(".vbox-prev").css("display", "none"), (P = !1)),
                            (!0 !== P && !0 !== B) || (d.on(le.DOWN, oe), d.on(le.MOVE, ce), d.on(le.UP, re));
                    }
                    function se(e) {
                        return (
                            !(e.length < 1) &&
                            !g &&
                            ((g = !0),
                            (x = e.data("overlay") || e.data("overlaycolor")),
                            (u = e.data("framewidth")),
                            (b = e.data("frameheight")),
                            (r = e.data("border")),
                            (i = e.data("bgcolor")),
                            (n = e.data("href") || e.attr("href")),
                            (s = e.data("autoplay")),
                            (y = (e.data("titleattr") && e.attr(e.data("titleattr"))) || ""),
                            e === z && d.addClass("vbox-animated").addClass("swipe-right"),
                            e === C && d.addClass("vbox-animated").addClass("swipe-left"),
                            E.show(),
                            void d.animate({ opacity: 0 }, 500, function () {
                                w.css("background", x),
                                    d.removeClass("vbox-animated").removeClass("swipe-left").removeClass("swipe-right").css({ "margin-left": 0, "margin-right": 0 }),
                                    "iframe" == e.data("vbtype") ? be() : "inline" == e.data("vbtype") ? ke() : "ajax" == e.data("vbtype") ? ue() : "video" == e.data("vbtype") ? he(s) : (d.html('<img src="' + n + '">'), pe()),
                                    (D = e),
                                    K(),
                                    (g = !1),
                                    ee.cb_after_nav(D, N, C, z);
                            }))
                        );
                    }
                    function ie(e) {
                        27 === e.keyCode && ae(), 37 == e.keyCode && !0 === P && se(z), 39 == e.keyCode && !0 === B && se(C);
                    }
                    function ae() {
                        if (!1 === ee.cb_pre_close(D, N, C, z)) return !1;
                        e("body").off("keydown", ie).removeClass("vbox-open"),
                            D.focus(),
                            w.animate({ opacity: 0 }, 500, function () {
                                w.remove(), (g = !1), ee.cb_post_close();
                            });
                    }
                    (L.VBclose = function () {
                        ae();
                    }),
                        D.addClass("vbox-item"),
                        D.data("framewidth", ee.framewidth),
                        D.data("frameheight", ee.frameheight),
                        D.data("border", ee.border),
                        D.data("bgcolor", ee.bgcolor),
                        D.data("numeratio", ee.numeratio),
                        D.data("gallItems", ee.gallItems),
                        D.data("infinigall", ee.infinigall),
                        D.data("overlaycolor", ee.overlayColor),
                        D.data("titleattr", ee.titleattr),
                        D.data("share", ee.share),
                        D.data("venobox", !0),
                        D.on("click", function (h) {
                            if ((h.preventDefault(), (D = e(this)), !1 === ee.cb_pre_open(D))) return !1;
                            switch (
                                ((L.VBnext = function () {
                                    se(C);
                                }),
                                (L.VBprev = function () {
                                    se(z);
                                }),
                                (x = D.data("overlay") || D.data("overlaycolor")),
                                (u = D.data("framewidth")),
                                (b = D.data("frameheight")),
                                (s = D.data("autoplay") || ee.autoplay),
                                (r = D.data("border")),
                                (i = D.data("bgcolor")),
                                (B = !1),
                                (P = !1),
                                (g = !1),
                                (n = D.data("href") || D.attr("href")),
                                (v = D.data("css") || ""),
                                (y = D.attr(D.data("titleattr")) || ""),
                                (H = D.data("share")),
                                (M = '<div class="vbox-preloader">'),
                                ee.spinner)
                            ) {
                                case "rotating-plane":
                                    M += '<div class="sk-rotating-plane"></div>';
                                    break;
                                case "double-bounce":
                                    M += '<div class="sk-double-bounce"><div class="sk-child sk-double-bounce1"></div><div class="sk-child sk-double-bounce2"></div></div>';
                                    break;
                                case "wave":
                                    M +=
                                        '<div class="sk-wave"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div><div class="sk-rect sk-rect3"></div><div class="sk-rect sk-rect4"></div><div class="sk-rect sk-rect5"></div></div>';
                                    break;
                                case "wandering-cubes":
                                    M += '<div class="sk-wandering-cubes"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div></div>';
                                    break;
                                case "spinner-pulse":
                                    M += '<div class="sk-spinner sk-spinner-pulse"></div>';
                                    break;
                                case "chasing-dots":
                                    M += '<div class="sk-chasing-dots"><div class="sk-child sk-dot1"></div><div class="sk-child sk-dot2"></div></div>';
                                    break;
                                case "three-bounce":
                                    M += '<div class="sk-three-bounce"><div class="sk-child sk-bounce1"></div><div class="sk-child sk-bounce2"></div><div class="sk-child sk-bounce3"></div></div>';
                                    break;
                                case "circle":
                                    M +=
                                        '<div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>';
                                    break;
                                case "cube-grid":
                                    M +=
                                        '<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div>';
                                    break;
                                case "fading-circle":
                                    M +=
                                        '<div class="sk-fading-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div>';
                                    break;
                                case "folding-cube":
                                    M += '<div class="sk-folding-cube"><div class="sk-cube1 sk-cube"></div><div class="sk-cube2 sk-cube"></div><div class="sk-cube4 sk-cube"></div><div class="sk-cube3 sk-cube"></div></div>';
                            }
                            return (
                                (M += "</div>"),
                                (O = '<a class="vbox-next">' + ee.htmlNext + '</a><a class="vbox-prev">' + ee.htmlPrev + "</a>"),
                                (V = '<div class="vbox-title"></div><div class="vbox-left"><div class="vbox-num">0/0</div></div><div class="vbox-close">' + ee.htmlClose + "</div>"),
                                '<div class="vbox-share"></div>',
                                (l = '<div class="vbox-overlay ' + v + '" style="background:' + x + '">' + M + '<div class="vbox-container"><div class="vbox-content"></div></div>' + V + O + '<div class="vbox-share"></div></div>'),
                                e("body").append(l).addClass("vbox-open"),
                                e(".vbox-preloader div:not(.sk-circle) .sk-child, .vbox-preloader .sk-rotating-plane, .vbox-preloader .sk-rect, .vbox-preloader div:not(.sk-folding-cube) .sk-cube, .vbox-preloader .sk-spinner-pulse").css(
                                    "background-color",
                                    ee.spinColor
                                ),
                                (w = e(".vbox-overlay")),
                                e(".vbox-container"),
                                (d = e(".vbox-content")),
                                (a = e(".vbox-left")),
                                (t = e(".vbox-num")),
                                (o = e(".vbox-share")),
                                (c = e(".vbox-title")),
                                (E = e(".vbox-preloader")).show(),
                                (S = "top" == ee.titlePosition ? "bottom" : "top"),
                                o.css(S, "-1px"),
                                o.css({ color: ee.titleColor, fill: ee.titleColor, "background-color": ee.titleBackground }),
                                c.css(ee.titlePosition, "-1px"),
                                c.css({ color: ee.titleColor, "background-color": ee.titleBackground }),
                                e(".vbox-close").css({ color: ee.closeColor, "background-color": ee.closeBackground }),
                                a.css(ee.numerationPosition, "-1px"),
                                a.css({ color: ee.numerationColor, "background-color": ee.numerationBackground }),
                                e(".vbox-next span, .vbox-prev span").css({ "border-top-color": ee.arrowsColor, "border-right-color": ee.arrowsColor }),
                                d.html(""),
                                d.css("opacity", "0"),
                                w.css("opacity", "0"),
                                K(),
                                w.animate({ opacity: 1 }, 250, function () {
                                    "iframe" == D.data("vbtype") ? be() : "inline" == D.data("vbtype") ? ke() : "ajax" == D.data("vbtype") ? ue() : "video" == D.data("vbtype") ? he(s) : (d.html('<img src="' + n + '">'), pe()),
                                        ee.cb_post_open(D, N, C, z);
                                }),
                                e("body").keydown(ie),
                                e(".vbox-prev").on("click", function () {
                                    se(z);
                                }),
                                e(".vbox-next").on("click", function () {
                                    se(C);
                                }),
                                !1
                            );
                        });
                    var te = ".vbox-overlay";
                    function oe(e) {
                        d.addClass("vbox-animated"), (j = X = e.pageY), (R = Y = e.pageX), (U = !0);
                    }
                    function ce(e) {
                        if (!0 === U) {
                            (Y = e.pageX), (X = e.pageY), (q = Y - R), ($ = X - j);
                            var s = Math.abs(q);
                            s > Math.abs($) && s <= 100 && (e.preventDefault(), d.css("margin-left", q));
                        }
                    }
                    function re(e) {
                        if (!0 === U) {
                            U = !1;
                            var s = D,
                                i = !1;
                            (W = Y - R) < 0 && !0 === B && ((s = C), (i = !0)), W > 0 && !0 === P && ((s = z), (i = !0)), Math.abs(W) >= A && !0 === i ? se(s) : d.css({ "margin-left": 0, "margin-right": 0 });
                        }
                    }
                    ee.overlayClose || (te = ".vbox-close"),
                        e("body").on("click touchstart", te, function (s) {
                            (e(s.target).is(".vbox-overlay") || e(s.target).is(".vbox-content") || e(s.target).is(".vbox-close") || e(s.target).is(".vbox-preloader") || e(s.target).is(".vbox-container")) && ae();
                        }),
                        (R = 0),
                        (Y = 0),
                        (W = 0),
                        (A = 50),
                        (U = !1);
                    var le = { DOWN: "touchmousedown", UP: "touchmouseup", MOVE: "touchmousemove" },
                        de = function (s) {
                            var i;
                            switch (s.type) {
                                case "mousedown":
                                    i = le.DOWN;
                                    break;
                                case "mouseup":
                                case "mouseout":
                                    i = le.UP;
                                    break;
                                case "mousemove":
                                    i = le.MOVE;
                                    break;
                                default:
                                    return;
                            }
                            var a = ve(i, s, s.pageX, s.pageY);
                            e(s.target).trigger(a);
                        },
                        ne = function (s) {
                            var i;
                            switch (s.type) {
                                case "touchstart":
                                    i = le.DOWN;
                                    break;
                                case "touchend":
                                    i = le.UP;
                                    break;
                                case "touchmove":
                                    i = le.MOVE;
                                    break;
                                default:
                                    return;
                            }
                            var a,
                                t = s.originalEvent.touches[0];
                            (a = i == le.UP ? ve(i, s, null, null) : ve(i, s, t.pageX, t.pageY)), e(s.target).trigger(a);
                        },
                        ve = function (s, i, a, t) {
                            return e.Event(s, { pageX: a, pageY: t, originalEvent: i });
                        };
                    function ue() {
                        e.ajax({ url: n, cache: !1 })
                            .done(function (e) {
                                d.html('<div class="vbox-inline">' + e + "</div>"), pe();
                            })
                            .fail(function () {
                                d.html('<div class="vbox-inline"><p>Error retrieving contents, please retry</div>'), ge();
                            });
                    }
                    function be() {
                        d.html('<iframe class="venoframe" src="' + n + '"></iframe>'), ge();
                    }
                    function he(e) {
                        var s,
                            i = (function (e) {
                                var s;
                                e.match(/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/),
                                    RegExp.$3.indexOf("youtu") > -1 ? (s = "youtube") : RegExp.$3.indexOf("vimeo") > -1 && (s = "vimeo");
                                return { type: s, id: RegExp.$6 };
                            })(n),
                            a =
                                (e ? "?rel=0&autoplay=1" : "?rel=0") +
                                (function (e) {
                                    var s = "",
                                        i = decodeURIComponent(e).split("?");
                                    if (void 0 !== i[1]) {
                                        var a,
                                            t,
                                            o = i[1].split("&");
                                        for (t = 0; t < o.length; t++) (a = o[t].split("=")), (s = s + "&" + a[0] + "=" + a[1]);
                                    }
                                    return encodeURI(s);
                                })(n);
                        "vimeo" == i.type ? (s = "https://player.vimeo.com/video/") : "youtube" == i.type && (s = "https://www.youtube.com/embed/"),
                            d.html('<iframe class="venoframe vbvid" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay" frameborder="0" src="' + s + i.id + a + '"></iframe>'),
                            ge();
                    }
                    function ke() {
                        d.html('<div class="vbox-inline">' + e(n).html() + "</div>"), ge();
                    }
                    function pe() {
                        (I = d.find("img")).length
                            ? I.each(function () {
                                  e(this).one("load", function () {
                                      ge();
                                  });
                              })
                            : ge();
                    }
                    function ge() {
                        c.html(y),
                            d.find(">:first-child").addClass("vbox-figlio").css({ width: u, height: b, padding: r, background: i }),
                            e("img.vbox-figlio").on("dragstart", function (e) {
                                e.preventDefault();
                            }),
                            me(),
                            d.animate({ opacity: "1" }, "slow", function () {
                                E.hide();
                            }),
                            ee.cb_content_loaded(D, N, C, z);
                    }
                    function me() {
                        var s = d.outerHeight(),
                            i = e(window).height();
                        (m = s + 60 < i ? (i - s) / 2 : "30px"), d.css("margin-top", m), d.css("margin-bottom", m), ee.cb_post_resize();
                    }
                    "ontouchstart" in window
                        ? (e(document).on("touchstart", ne), e(document).on("touchmove", ne), e(document).on("touchend", ne))
                        : (e(document).on("mousedown", de), e(document).on("mouseup", de), e(document).on("mouseout", de), e(document).on("mousemove", de)),
                        e(window).resize(function () {
                            e(".vbox-content").length && setTimeout(me(), 800);
                        });
                })
            );
        },
    });
})(jQuery);
