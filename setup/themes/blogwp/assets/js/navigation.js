/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var blogwp_secondary_container, blogwp_secondary_button, blogwp_secondary_menu, blogwp_secondary_links, blogwp_secondary_i, blogwp_secondary_len;

    blogwp_secondary_container = document.getElementById( 'blogwp-secondary-navigation' );
    if ( ! blogwp_secondary_container ) {
        return;
    }

    blogwp_secondary_button = blogwp_secondary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof blogwp_secondary_button ) {
        return;
    }

    blogwp_secondary_menu = blogwp_secondary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof blogwp_secondary_menu ) {
        blogwp_secondary_button.style.display = 'none';
        return;
    }

    blogwp_secondary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === blogwp_secondary_menu.className.indexOf( 'nav-menu' ) ) {
        blogwp_secondary_menu.className += ' nav-menu';
    }

    blogwp_secondary_button.onclick = function() {
        if ( -1 !== blogwp_secondary_container.className.indexOf( 'blogwp-toggled' ) ) {
            blogwp_secondary_container.className = blogwp_secondary_container.className.replace( ' blogwp-toggled', '' );
            blogwp_secondary_button.setAttribute( 'aria-expanded', 'false' );
            blogwp_secondary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            blogwp_secondary_container.className += ' blogwp-toggled';
            blogwp_secondary_button.setAttribute( 'aria-expanded', 'true' );
            blogwp_secondary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    blogwp_secondary_links    = blogwp_secondary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( blogwp_secondary_i = 0, blogwp_secondary_len = blogwp_secondary_links.length; blogwp_secondary_i < blogwp_secondary_len; blogwp_secondary_i++ ) {
        blogwp_secondary_links[blogwp_secondary_i].addEventListener( 'focus', blogwp_secondary_toggleFocus, true );
        blogwp_secondary_links[blogwp_secondary_i].addEventListener( 'blur', blogwp_secondary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function blogwp_secondary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'blogwp-focus' ) ) {
                    self.className = self.className.replace( ' blogwp-focus', '' );
                } else {
                    self.className += ' blogwp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( blogwp_secondary_container ) {
        var touchStartFn, blogwp_secondary_i,
            parentLink = blogwp_secondary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, blogwp_secondary_i;

                if ( ! menuItem.classList.contains( 'blogwp-focus' ) ) {
                    e.preventDefault();
                    for ( blogwp_secondary_i = 0; blogwp_secondary_i < menuItem.parentNode.children.length; ++blogwp_secondary_i ) {
                        if ( menuItem === menuItem.parentNode.children[blogwp_secondary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[blogwp_secondary_i].classList.remove( 'blogwp-focus' );
                    }
                    menuItem.classList.add( 'blogwp-focus' );
                } else {
                    menuItem.classList.remove( 'blogwp-focus' );
                }
            };

            for ( blogwp_secondary_i = 0; blogwp_secondary_i < parentLink.length; ++blogwp_secondary_i ) {
                parentLink[blogwp_secondary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( blogwp_secondary_container ) );
} )();


( function() {
    var blogwp_primary_container, blogwp_primary_button, blogwp_primary_menu, blogwp_primary_links, blogwp_primary_i, blogwp_primary_len;

    blogwp_primary_container = document.getElementById( 'blogwp-primary-navigation' );
    if ( ! blogwp_primary_container ) {
        return;
    }

    blogwp_primary_button = blogwp_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof blogwp_primary_button ) {
        return;
    }

    blogwp_primary_menu = blogwp_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof blogwp_primary_menu ) {
        blogwp_primary_button.style.display = 'none';
        return;
    }

    blogwp_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === blogwp_primary_menu.className.indexOf( 'nav-menu' ) ) {
        blogwp_primary_menu.className += ' nav-menu';
    }

    blogwp_primary_button.onclick = function() {
        if ( -1 !== blogwp_primary_container.className.indexOf( 'blogwp-toggled' ) ) {
            blogwp_primary_container.className = blogwp_primary_container.className.replace( ' blogwp-toggled', '' );
            blogwp_primary_button.setAttribute( 'aria-expanded', 'false' );
            blogwp_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            blogwp_primary_container.className += ' blogwp-toggled';
            blogwp_primary_button.setAttribute( 'aria-expanded', 'true' );
            blogwp_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    blogwp_primary_links    = blogwp_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( blogwp_primary_i = 0, blogwp_primary_len = blogwp_primary_links.length; blogwp_primary_i < blogwp_primary_len; blogwp_primary_i++ ) {
        blogwp_primary_links[blogwp_primary_i].addEventListener( 'focus', blogwp_primary_toggleFocus, true );
        blogwp_primary_links[blogwp_primary_i].addEventListener( 'blur', blogwp_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function blogwp_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'blogwp-focus' ) ) {
                    self.className = self.className.replace( ' blogwp-focus', '' );
                } else {
                    self.className += ' blogwp-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( blogwp_primary_container ) {
        var touchStartFn, blogwp_primary_i,
            parentLink = blogwp_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, blogwp_primary_i;

                if ( ! menuItem.classList.contains( 'blogwp-focus' ) ) {
                    e.preventDefault();
                    for ( blogwp_primary_i = 0; blogwp_primary_i < menuItem.parentNode.children.length; ++blogwp_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[blogwp_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[blogwp_primary_i].classList.remove( 'blogwp-focus' );
                    }
                    menuItem.classList.add( 'blogwp-focus' );
                } else {
                    menuItem.classList.remove( 'blogwp-focus' );
                }
            };

            for ( blogwp_primary_i = 0; blogwp_primary_i < parentLink.length; ++blogwp_primary_i ) {
                parentLink[blogwp_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( blogwp_primary_container ) );
} )();