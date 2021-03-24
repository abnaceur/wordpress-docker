/**
 * File aeonmag.
 *
 * @package   AeonMag
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2021, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 */
jQuery(document).ready(function($) {

    var at_document = $(document);

    at_document.on('click','.custom_aeonmag_button', function(e){

        // Prevents the default action from occuring.
        e.preventDefault();
        var aeonmag_image_upload = $(this);
        var aeonmag_title = $(this).data('title');
        var aeonmag_button = $(this).data('button');
        var aeonmag_input_val = $(this).prev();
        var aeonmag_image_url_value = $(this).prev().prev().children('img');
        var aeonmag_image_url = $(this).siblings('.img-preview-wrap');

        var meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: aeonmag_title,
            button: { text:  aeonmag_button },
            library: { type: 'image' }
        });
        // Opens the media library frame.
        meta_image_frame.open();
        // Runs when an image is selected.
        meta_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var aeonmag_attachment = meta_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            aeonmag_input_val.val(aeonmag_attachment.url);
            if( aeonmag_image_url_value !== null ){
                aeonmag_image_url_value.attr( 'src', aeonmag_attachment.url );
                aeonmag_image_url.show();
                LATESTVALUE(aeonmag_image_upload.closest("p"));
            }
        });
    });

   // Runs when the image button is clicked.
   jQuery('body').on('click','.aeonmag-image-remove', function(e){
    $(this).siblings('.img-preview-wrap').hide();
    $(this).prev().prev().val('');
});
   
   var LATESTVALUE = function (wrapObject) {
    wrapObject.find('[name]').each(function(){
        $(this).trigger('change');
    });
};  

});
