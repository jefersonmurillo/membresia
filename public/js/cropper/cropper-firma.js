(function ($) {
    "use strict";


    var $image = $(".image-crop-firma > img")
    $($image).cropper({
        aspectRatio: 1200/200,
        preview: ".img-preview2",
        done: function(data) {
            // Output the result data for cropping image.
        }
    });

    var $inputImage = $("#inputImageFirma");
    if (window.FileReader) {
        $inputImage.change(function() {
            var fileReader = new FileReader(),
                files = this.files,
                file;

            if (!files.length) {
                return;
            }

            file = files[0];

            if (/^image\/\w+$/.test(file.type)) {
                fileReader.readAsDataURL(file);
                fileReader.onload = function () {
                    $inputImage.val("");
                    $image.cropper("reset", true).cropper("replace", this.result);
                    $('#firma-data').val($image.cropper("getDataURL"));
                };
            } else {
                showMessage("Please choose an image file.");
            }
        });
    } else {
        $inputImage.addClass("hide");
    }

    $("#downloadFirma").on('click', function() {
        window.open($image.cropper("getDataURL"));
    });

    $("#zoomInFirma").on('click', function() {
        $image.cropper("zoom", 0.1);
        $('#firma-data').val($image.cropper("getDataURL"));
    });

    $("#zoomOutFirma").on('click', function() {
        $image.cropper("zoom", -0.1);
        $('#firma-data').val($image.cropper("getDataURL"));
    });

    $("#rotateLeftFirma").on('click', function() {
        $image.cropper("rotate", 45);
        $('#firma-data').val($image.cropper("getDataURL"));
    });

    $("#rotateRightFirma").on('click', function() {
        $image.cropper("rotate", -45);
        $('#firma-data').val($image.cropper("getDataURL"));
    });

    $("#setDragFirma").on('click', function() {
        $image.cropper("setDragMode", "crop");
        $('#firma-data').val($image.cropper("getDataURL"));
    });

    $('#confimed-firma').on('click', function() {
        $('#firma-data').val($image.cropper("getDataURL"));
        console.log($image.cropper("getDataURL"));
    })

})(jQuery);
