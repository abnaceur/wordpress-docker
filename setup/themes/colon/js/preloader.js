!(function () {
    "use strict";
    document.addEventListener("DOMContentLoaded", function (e) {
        var n = document.querySelector("#pre-loader"),
            l = setInterval(function () {
                n.style.opacity || (n.style.opacity = 1), n.style.opacity > 0 ? (n.style.opacity -= 0.1) : clearInterval(l);
            }, 500),
            r = document.querySelector(".loader-wrapper");
        setInterval(function () {
            r.style.display = "none";
        }, 1e3);
    });
})();
