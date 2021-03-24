!(function () {
    "use strict";
    document.addEventListener("DOMContentLoaded", function (e) {

        if (null != document.querySelectorAll("ul.sub-menu")) for (var t = document.querySelectorAll("ul.sub-menu"), o = 0; o < t.length; o++) (a = t[o].parentNode).classList.add("dropdown");
        if (null != document.querySelectorAll("nav li.dropdown > a")) {
            var a = document.querySelectorAll("nav li.dropdown > a");
            for (o = 0; o < a.length; o++) a[o].innerHTML += '<span class="caret"></span>';
        }
        if (
            (document.querySelectorAll("ul.sub-menu").forEach((e) => {
                e.classList.add("dropdown-menu");
            }),
            null != document.querySelector(".hd-bar") &&
                (document.querySelector(".hd-bar-opener").addEventListener("click", function () {
                    document.querySelector(".hd-bar").classList.add("visible-sidebar");
                }),
                document.querySelector(".hd-bar-opener").addEventListener("focus", function () {
                    document.querySelector(".hd-bar").classList.add("visible-sidebar");
                }),
                document.querySelector(".hd-bar .hd-bar-close").addEventListener("focus", function () {
                    document.querySelector(".hd-bar").classList.remove("visible-sidebar");
                }),
                document.querySelector(".hd-bar-closer").addEventListener("click", function () {
                    document.querySelector(".hd-bar").classList.remove("visible-sidebar");
                })),
            (function () {
                if (null != document.querySelectorAll(".hd-bar .side-menu ul.sub-menu")) {
                    for (var e = document.querySelectorAll(".hd-bar .side-menu ul.sub-menu"), n = 0; n < e.length; n++) e[n].style.display = "none";
                    var l = document.querySelectorAll(".hd-bar .side-menu li.dropdown > .angle-down");
                    for (n = 0; n < l.length; n++)
                        l[n].forEach((e) => {
                            this.addEventListener("click", function (e) {
                                return e.preventDefault(), !1;
                            });
                        });
                }
            })(),
            null != document.querySelector("#navbar-collapse-2") && null != document.querySelectorAll("#navbar-collapse-2 .navigation li.dropdown"))
        ) {
            var d = document.querySelectorAll("#navbar-collapse-2 .navigation li.dropdown");
            for (o = 0; o < d.length; o++) {
                for (var c = d[o].querySelectorAll("li.dropdown"), u = 0; u < c.length; u++) c[u].innerHTML += '<i class="angle-down" aria-hd="true"><span></span></i>';
                d[o].innerHTML += '<i class="angle-down" aria-hd="true"><span></span></i>';
            }
            for (c = document.querySelectorAll("#navbar-collapse-2 .navigation li.dropdown .angle-down"), o = 0; o < c.length; o++)
                c[o].addEventListener("click", function () {
                    var e = this.parentNode.querySelector("ul");
                    "block" == e.style.display ? (e.style.display = "none") : (e.style.display = "block");
                });
        }
    });
})();
