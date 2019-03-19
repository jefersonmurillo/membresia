(function ($) {
    "use strict";


    var $image = $(".image-crop > img")
    $($image).cropper({
        aspectRatio: 0.78,
        preview: ".img-preview",
        done: function(data) {
            // Output the result data for cropping image.
        }
    });

    var $inputImage = $("#inputImage");
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
                    $('#image-data').val($image.cropper("getDataURL"));
                };
            } else {
                showMessage("Please choose an image file.");
            }
        });
    } else {
        $inputImage.addClass("hide");
    }

    $("#download").on('click', function() {
        window.open($image.cropper("getDataURL"));
    });

    $("#zoomIn").on('click', function() {
        $image.cropper("zoom", 0.1);
        $('#image-data').val($image.cropper("getDataURL"));
    });

    $("#zoomOut").on('click', function() {
        $image.cropper("zoom", -0.1);
        $('#image-data').val($image.cropper("getDataURL"));
    });

    $("#rotateLeft").on('click', function() {
        $image.cropper("rotate", 45);
        $('#image-data').val($image.cropper("getDataURL"));
    });

    $("#rotateRight").on('click', function() {
        $image.cropper("rotate", -45);
        $('#image-data').val($image.cropper("getDataURL"));
    });

    $("#setDrag").on('click', function() {
        $image.cropper("setDragMode", "crop");
        $('#image-data').val($image.cropper("getDataURL"));
    });

    $("#confimed-foto").on('click', function() {
        $('#image-data').val($image.cropper("getDataURL"));
        console.log($image.cropper("getDataURL"));
    });




})(jQuery);
