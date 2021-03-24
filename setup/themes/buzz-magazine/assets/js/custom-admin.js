(function ($) {
    'use strict';

    $(function(){

        $(document).on('click', '.icon-lists', function (event){

            var $this = $(this),
                icon  = $this.attr('data-icon'),
                $parent = $(this).parents('.icons-group'),
                $inputField = $parent.children('.icon-field-group')

            // Remove icon-selected class from other icon lists
            $('.icon-lists').removeClass('icon-selected')

            // Add icon selected to the clicked class.
            $this.addClass('icon-selected')

            // Add the icon as value to the hidden input field.
            $inputField.val(icon)

            // Since the hidden input doesn't reflect form change
            // We need to manually trigger it.
            $inputField.trigger('change');
        })

    })

    
})(jQuery);
