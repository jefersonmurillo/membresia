@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href=" {{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/dialog/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dialog/dialog.css') }}">
@endsection

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-windows"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Libro de Miembros</h2>
                                        <p>Registro completo de miembros IPUC <span class="bread-ntd">Ceci</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    <a href="{{ route('index')}}/?id={{ base64_encode(-12) }}" target="_blank" data-toggle="tooltip" data-placement="left" title="Generar y Descargar Miembros" class="btn"><i class="notika-icon notika-sent"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>N° Registro</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Documento</th>
                                        <th>Celular</th>
                                        <th>Fecha Bautizo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($miembros as $miembro)
                                        <tr>
                                            <td>{{ $miembro['id'] }}</td>
                                            <td>{{ $miembro['nombres'] }}</td>
                                            <td>{{ $miembro['apellidos'] }}</td>
                                            <td>{{ $miembro['fecha_naci'] }}</td>
                                            <td>{{ $miembro['documento'] }}</td>
                                            <td>{{ $miembro['celular'] }}</td>
                                            <td>{{ $miembro['fecha_bautizo'] }}</td>
                                            <td>
                                                <div class="button-icon-btn sm-res-mg-t-30">

                                                    <a href="{{ route('index')}}/?id={{ base64_encode($miembro['id']) }}" target="_blank">
                                                        <button class="btn btn-lightgreen lightgreen-icon-notika"  data-toggle="tooltip" data-placement="top" title="Descargar PDF">
                                                            <i class="notika-icon notika-down-arrow"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('membresia.edit') }}/?id={{ base64_encode($miembro['id']) }}" class="btn btn-lightblue lightblue-icon-notika" data-toggle="tooltip" data-placement="top" title="Ver Datos">
                                                        <i class="notika-icon notika-next"></i>
                                                    </a>
                                                    <button class="btn btn-amber amber-icon-notika" data-toggle="tooltip" data-placement="top" title="Modificar Datos">
                                                        <i class="notika-icon notika-menus"></i>
                                                    </button>
                                                    <button class="btn btn-danger danger-icon-notika" data-toggle="tooltip" data-placement="top" title="Eliminar Miembro">
                                                        <i class="notika-icon notika-close"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>N° Registro</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Documento</th>
                                        <th>Celular</th>
                                        <th>Fecha Bautizo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/data-table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/data-table/data-table-act.js') }}"></script>
@endsection
