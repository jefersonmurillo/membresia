@extends('layouts.app')

@section('content')
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- 404 Page area Start-->
<div class="error-page-area">
    <div class="error-page-wrap">
        <i class="notika-icon notika-close"></i>
        <h2>Opp <span class="counter">404</span></h2>
        <p>La página que estás buscando no ha sido encontrada. Intente verificar la URL para ver si hay un error, luego presione el botón de actualización en su navegador o intente encontrar algo más en nuestra aplicación.</p>
        <a href="{{ route('index') }}" class="btn">INICIO</a>
        <a href="#" class="btn error-btn-mg">REPORTAR</a>
    </div>
</div>
<!-- 404 Page area End-->
@endsection
