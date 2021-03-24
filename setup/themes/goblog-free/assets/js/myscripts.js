// ========== Toggle Icon Burger ==========
function goblog_free_toggle_icon_burger() {
    const boxMenu = document.getElementById('box-menu');
    const fontNavBar = document.getElementById('toggle-burger-mobile');
    const list = document.querySelectorAll(".box-menu ul li a");

    fontNavBar.addEventListener('click', function () {
        boxMenu.classList.toggle('show-box-menu');

        // get first element to be focused inside modal
        const firstFocusableElement = document.getElementById('toggle-burger-mobile');

        // get last element to be focused inside modal
        const last = list[list.length - 1];
        const lastFocusableElement = last;

        document.addEventListener('keydown', function (e) {
            let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

            if (!isTabPressed) {
                return;
            }

            // if shift key pressed for shift + tab combination
            if (e.shiftKey) {
                if (document.activeElement === firstFocusableElement) {
                    lastFocusableElement.focus();
                    e.preventDefault();
                }
            } else {
                if (document.activeElement === lastFocusableElement) {
                    firstFocusableElement.focus();
                    e.preventDefault();
                }
            }
        });
    });
}
goblog_free_toggle_icon_burger();

// ========== Append Icon Arrow  ========== 	
function goblog_free_append_icon_arrow() {
    const hasChildrenLink = document.querySelectorAll(".menu-item-has-children > a");
    hasChildrenLink.forEach(function (e) {
        e.innerHTML += '<span class="sub-btn"><i class="fas fa-angle-down"></i></span>';
    });
}
goblog_free_append_icon_arrow();

// ========== Nav Box Search Full  ==========   
function goblog_free_nav_box_search_full() {
    const toggleSearch = document.getElementById("box-toggle-search");
    const toggleSearchClose = document.getElementById("search-form-close");
    const toggleSearchParent = document.getElementById("search-form");
    const formInput = document.querySelector('#box-search-full input');
    const formButton = document.querySelector('#box-search-full button');

    // Open Search Form
    toggleSearch.addEventListener('click', function () {
        toggleSearchParent.classList.remove('fadeout-custome');
        toggleSearchParent.classList.add('fadein-custome');
        toggleSearchClose.style.display = 'block';
        toggleSearchClose.classList.add('close-x-animasi');
        toggleSearchClose.classList.remove('close-x-animasi-penutup');

        toggleSearchClose.tabIndex = "";
        document.querySelector('#box-search-full input').tabIndex = "";
        document.querySelector('#box-search-full button').tabIndex = "";
        formInput.focus();

        // get first element to be focused inside modal
        const firstFocusableElement = formInput;

        // get last element to be focused inside modal
        const lastFocusableElement = toggleSearchClose;

        document.addEventListener('keydown', function (e) {
            let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

            if (!isTabPressed) {
                return;
            }

            // if shift key pressed for shift + tab combination
            if (e.shiftKey) {
                if (document.activeElement === firstFocusableElement) {
                    lastFocusableElement.focus();
                    e.preventDefault();
                }
            } else {
                if (document.activeElement === lastFocusableElement) {
                    firstFocusableElement.focus();
                    e.preventDefault();
                }
            }
        });
    });

    // Close Search Form
    toggleSearchClose.addEventListener('click', function () {
        toggleSearchParent.classList.remove('fadein-custome');
        toggleSearchParent.classList.add('fadeout-custome');
        toggleSearchClose.classList.add('close-x-animasi-penutup');
        toggleSearchClose.classList.remove('close-x-animasi');

        toggleSearch.focus();
        toggleSearchClose.tabIndex = "-1";
        formInput.tabIndex = "-1";
        formButton.tabIndex = "-1";
    });
}
goblog_free_nav_box_search_full();

// ========== Scroll  ==========  
// Scroll
window.onscroll = function () {
    goblog_free_scroll_top()
};

function goblog_free_scroll_top() {
    const goblogFreeBtnTop = document.getElementById("button-scroll");
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        goblogFreeBtnTop.style.visibility = "visible";
        goblogFreeBtnTop.style.opacity = 1;
    } else {
        goblogFreeBtnTop.style.visibility = "hidden";
        goblogFreeBtnTop.style.opacity = 0;
    }
}

// Scroll Animate
function goblog_free_scroll_animate() {
    const goblogFreeBtnTop = document.getElementById("button-scroll");
    goblogFreeBtnTop.addEventListener('click', function (e) {
        e.preventDefault();
    });
}
goblog_free_scroll_animate();

// Scroll Smooth
function goblog_free_scroll_smooth() {
    const goblogFreeBtnTop = document.getElementById("button-scroll");
    goblogFreeBtnTop.addEventListener('click', () => window.scrollTo({
        top: 0.1,
        behavior: 'smooth',
    }));
}
goblog_free_scroll_smooth();