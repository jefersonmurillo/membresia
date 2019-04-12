<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>IPUC | Membresia</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/icon.png') }}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/meanmenu/meanmenu.min.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/notika-custom-icon.css') }}">
    <!-- cropper CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/cropper/cropper.min.css') }}">

    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/wave/waves.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/wave/button.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <!-- summernote CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/summernote/summernote.css') }}">
    <!-- Range Slider CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/themesaller-forms.css') }}">
    <!-- bootstrap select CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select/bootstrap-select.css') }}">
    <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/datapicker/datepicker3.css') }}">
    <!-- Color Picker CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/color-picker/farbtastic.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/chosen/chosen.css') }}">
    <!-- notification CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/notification/notification.css') }}">
    <!-- dropzone CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('css/dropzone/dropzone.css') }}">
    <!-- style CSS
            ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/membresia/style.css') }}">

    @yield('css')

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/customfileinputs/css/demo.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/customfileinputs/css/component.css') }}" />

    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>

<body>
    <div class="loader"></div>
    @yield('nav')

    @yield('content')

    @include('layouts.footer')

    <!-- jquery
		============================================ -->
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- wow JS
    ============================================ -->
    <!-- meanmenu JS
		============================================ -->
    <script src="{{ asset('js/meanmenu/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <!-- price-slider JS
    ============================================ -->
    <script src="{{ asset('js/jquery-price-slider.js') }}"></script>
    <!-- owl.carousel JS
    ============================================ -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!-- scrollUp JS
    ============================================ -->
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{ asset('js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{ asset('js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{ asset('js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/sparkline/sparkline-active.js') }}"></script>
    <!-- flot JS
		============================================ -->
    <script src="{{ asset('js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('js/flot/flot-active.js') }}"></script>
    <!-- knob JS
		============================================ -->
    <script src="{{ asset('js/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('js/knob/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/knob/knob-active.js') }}"></script>

    <!--  todo JS
		============================================ -->
    <script src="{{ asset('js/todo/jquery.todo.js') }}"></script>

    <!-- cropper JS
		============================================ -->
    <script src="{{ asset('js/cropper/cropper.min.js') }}"></script>
    <script src="{{ asset('js/cropper/cropper-actice.js') }}"></script>

    <!--  wave JS
		============================================ -->
    <script src="{{ asset('js/wave/waves.min.js') }}"></script>
    <script src="{{ asset('js/wave/wave-active.js') }}"></script>

    <!-- Input Mask JS
		============================================ -->
    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
    <!-- icheck JS
		============================================ -->
    <script src="{{ asset('js/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('js/icheck/icheck-active.js') }}"></script>
    <!-- rangle-slider JS
		============================================ -->
    <script src="{{ asset('js/rangle-slider/jquery-ui-1.10.4.custom.min.js') }}"></script>
    <script src="{{ asset('js/rangle-slider/jquery-ui-touch-punch.min.js') }}"></script>
    <script src="{{ asset('js/rangle-slider/rangle-active.js') }}"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="{{ asset('js/datapicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/datapicker/datepicker-active.js') }}"></script>
    <!-- bootstrap select JS
		============================================ -->
    <script src="{{ asset('js/bootstrap-select/bootstrap-select.js') }}"></script>
    <!--  color-picker JS
		============================================ -->
    <script src="{{ asset('js/color-picker/farbtastic.min.js') }}"></script>
    <script src="{{ asset('js/color-picker/color-picker.js') }}"></script>
    <!--  notification JS
		============================================ -->
    <script src="{{ asset('js/notification/bootstrap-growl.min.js') }}"></script>
    <script src="{{ asset('js/notification/notification-active.js') }}"></script>
    <!--  summernote JS
		============================================ -->
    <script src="{{ asset('js/summernote/summernote-updated.min.js') }}"></script>
    <script src="{{ asset('js/summernote/summernote-active.js') }}"></script>
    <!-- dropzone JS
		============================================ -->
    <script src="{{ asset('js/dropzone/dropzone.js') }}"></script>

    <!--  chosen JS
		============================================ -->
    <script src="{{ asset('js/chosen/chosen.jquery.js') }}"></script>
    <!--  Chat JS
		============================================ -->
    <script src="{{ asset('js/chat/jquery.chat.js') }}"></script>

    <!-- plugins JS
		============================================ -->
    <script src="{{ asset('js/plugins.js') }}"></script>


    <!-- main JS
		============================================ -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ asset('js/customfileinputs/js/custom-file-input.js') }}"></script>

    @yield('js')
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
</body>
</html>
