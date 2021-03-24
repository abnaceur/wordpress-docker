jQuery( document ).ready(function($) {
    "use strict";
    $( ".pill_checkbox_control .sortable" ).sortable({
        placeholder: "pill-ui-state-highlight",
        update: function( event, ui ) {
            colonGetAllPillCheckboxes($(this).parent());
        }
    });

    $('.pill_checkbox_control .sortable-pill-checkbox').on('change', function () {
        colonGetAllPillCheckboxes($(this).parent().parent().parent());
    });

    // Get the values from the checkboxes and add to our hidden field
    function colonGetAllPillCheckboxes($element) {
        var inputValues = $element.find('.sortable-pill-checkbox').map(function() {
            if( $(this).is(':checked') ) {
                return $(this).val();
            }
        }).toArray();
        $element.find('.customize-control-sortable-pill-checkbox').val(inputValues).trigger('change');
    }

});
( jQuery, wp.customize );