jQuery(document).ready(function($) { 
    /** Menu Search */
    $('.search-wrapper').click(function(){
        $(".category-search-form").toggle();
        $(".category-search-form").find('input').focus();
    });

    $(document).on('click', '.copen-cate', function (e) {
        $(this).closest('.block-nav-category').find('li.link-other').each(function () {
            $(this).slideDown();
        });
        e.preventDefault();
    });
    $(document).on('click', '.cclose-cate', function (e) {
        $(this).closest('.block-nav-category').find('li.link-other').each(function () {
            $(this).slideUp();
        });
        $(this).closest('.block-nav-category').removeClass('has-open');
        e.preventDefault();
    });

});
