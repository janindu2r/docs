jQuery(document).ready(function($) {
    $(document).on("click", ".upload_image_button", function() {
        var $button = $(this);
        var regx = new RegExp("^[^#]*?://.*?(/.*)$");

        // Create the media frame.
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select or upload image',
            library: { // remove these to show all
                type: 'image' // specific mime
            },
            button: {
                text: 'Select'
            },
            multiple: false // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        file_frame.on('select', function() {
            // We set multiple to false so only get one image from the uploader

            var attachment = file_frame.state().get('selection').first();
            $button.siblings('input').val(attachment.attributes.url.match(regx)[1]);
            $button.siblings('input').change();
        });

        // Finally, open the modal
        file_frame.open();
    });
});