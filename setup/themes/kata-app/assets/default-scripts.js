/**
 * Theme Scripts.
 *
 * @author  ClimaxThemes
 * @package	Kata
 * @since	1.0.0
 */
'use strict';

var KataDefaultScripts = (function ($) {
    /**
     * Global Variables.
     *
     * @since	1.0.0
     */
    var $document = $(document);
    var $window = $(window);

    return {
        /**
         * Init.
         *
         * @since	1.0.0
         */
        init: function () {
            this.Search();
            this.Comments();
            this.ResponsiveMenu();
        },

        /**
         * Header Search.
         *
         * @since	1.0.0
         */
        Search: function () {
            if ($('.kata-header-search-wrap').length) {
                $(document).on('click', '.kata-header-search-wrap .icon-wrap', function (e) {
                    var $this = $(this),
                        $wrapper = $this.parent('.kata-header-search-wrap'),
                        $searchform = $wrapper.find('.search-form-wrap'),
                        $input = $searchform.find('.search-field');
                    if ($searchform.css('display') == 'none') {
                        $searchform.fadeIn('fast').addClass('active');
                        $input.focus();
                    } else {
                        $searchform.fadeOut('fast').removeClass('active');
                    }
                });
                $('.kt-header-search').on('keypress', function (e) {
                    if (e.keyCode === 13) {
                        e.preventDefault();
                        return false;
                    }
                });
                $(document).on('click', '.header-close-search', function (e) {
                    e.preventDefault();
                    var $this = $(this),
                        $wrap = $this.closest('.search-form-wrap');
                    if ($wrap.hasClass('active')) {
                        $wrap.removeClass('active');
                        setTimeout(function () {
                            $wrap.hide();
                        }, 100);
                        $wrap.closest('.kata-header-search-wrap').find('.kt-header-search').focus();
                    }
                });
                $(document).on('focus', '.header-close-search', function (e) {
                    var $this = $(this),
                        $wrap = $this.closest('.search-form-wrap'),
                        $input = $wrap.find('.search-field');
                    if ($wrap.hasClass('active')) {
                        $('.header-close-search').on('keydown', function (e) {
                            if (!event.shiftKey && event.keyCode === 9) {
                                e.preventDefault();
                                $input.focus();
                            }
                        });
                    }
                });
                $(document).on('blur', '.search-field', function (e) {
                    var $this = $(this),
                        $wrap = $this.closest('.search-form-wrap'),
                        $close = $wrap.find('.header-close-search');
                    if ($wrap.hasClass('active')) {
                        $this.on('keydown', function (e) {
                            if (event.shiftKey && event.keyCode === 9) {
                                e.preventDefault();
                                $close.focus();
                            }
                        });
                    }
                });
            }
        },

        /**
         * Comments.
         *
         * @since	1.0.0
         */
        Comments: function () {
            $('.comment-form').find('input:not([type="checkbox"]), textarea').on('focusin', function () {
                var $this = $(this),
                    $parent = $this.parent('p'),
                    $form = $this.parents('.comment-form');
                $parent.find('label').fadeOut();
                $parent.find('.required').fadeOut();
            });
            $('.comment-form').find('input:not([type="checkbox"]), textarea').on('focusout', function () {
                var $this = $(this),
                    $parent = $this.parent('p'),
                    $form = $this.parents('.comment-form');
                if (!$this.val()) {
                    $parent.find('label').fadeIn();
                    $parent.find('.required').fadeIn();
                }
            });
            $('.comment-form').on('submit', function (e) {
                var $form = $(this),
                    $author = $form.find('[id="author"]'),
                    $email = $form.find('[id="email"]'),
                    $textarea = $form.find('textarea'),
                    regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                $author.removeAttr('style');
                $email.removeAttr('style');
                $textarea.removeAttr('style');

                if ($author.length) {
                    if ($author.val() == '') {
                        $author.css('border-color', 'red');
                        e.preventDefault();
                    }
                }
                if ($textarea.length) {
                    if ($textarea.val() == '') {
                        $textarea.css('border-color', 'red');
                        e.preventDefault();
                    }
                }
                if ($email.length) {
                    if ($email.val() == '') {
                        $email.css('border-color', 'red');
                        e.preventDefault();
                    }
                    if (regex.test($email.val()) == false) {
                        e.preventDefault();
                        $email.css('border-color', 'red');
                    }
                }
            });
        },

        /**
         * Header.
         *
         * @since	1.0.0
         */
        ResponsiveMenu: function () {
            $('.kata-menu-navigation').clone().appendTo(".kata-mobile-menu-navigation").wrap('<div class="kata-menu-wrap"></div>');
            $('.kata-menu-navigation').superfish();
            $('.kt-h-menu-hamburger').on('click', function (e) {
                e.preventDefault();
                var $this = $(this),
                    $wrap = $this.closest('.kata-menu-wrap');
                $this.toggleClass('kt-open-hamburger');
                $('.kata-menu-navigation').toggleClass('kt-open-hamburger').slideToggle();
                if ($this.hasClass('kt-open-hamburger')) {
                    $wrap.find('.menu-item').find('a').append('<span class="kt-burger-arrow"><i class="line"></i><i class="line"></i></span>');
                    $wrap.find('.kt-burger-arrow').on('click', function () {
                        $(this).attr('style', 'transform: rotate(180deg);');
                    });
                } else {
                    $wrap.find('.menu-item').find('a').find('.kt-burger-arrow').remove();
                }
            });
            $('.kt-h-menu-hamburger').on('keypress', function (e) {
                if (e.keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
        }

    };
})(jQuery);

jQuery(document).ready(function () {
    KataDefaultScripts.init();
});