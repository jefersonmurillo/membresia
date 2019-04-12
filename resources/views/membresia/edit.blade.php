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
                                        <p>Oprima el boton de modificar para actualizar los datos del miembro <span class="bread-ntd">Ceci</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    <button data-toggle="tooltip" data-placement="left" title="Generar y Descargar Miembros" class="btn"><i class="notika-icon notika-menus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcomb area End-->
    <!-- Form Element area Start-->
    <form action="{{ route('membresia.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="basic-tb-hd">
                            <h2>Foto</h2>
                            <p>
                                <strong>NOTA PARA EL CREYENTE</strong>. En caso de que usted se traslade a otra congregación, por favor
                                solicite además de la carta del pastor, copia de este formato de membresía para que
                                repose en los archivos de la nueva congregación donde asistirá.
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="image-cropper-wp">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="image-crop">
                                                <img src="{{ asset($miembro['foto']) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="preview-img-pro-ad">
                                                <div class="maincrop-img">
                                                    <div class="image-crp-int">
                                                        <h4>Previsual</h4>
                                                        <div class="img-preview img-preview-custom"></div>
                                                    </div>
                                                    <div class="image-crp-img">
                                                        <h4>Foto</h4>
                                                        <p>Carga y ajusta la foto para el registro de membresia</p>
                                                        <div class="material-design-btn">
                                                            <div class="btn-group images-cropper-pro">
                                                                <label title="Upload image file" for="inputImage" class="btn btn-primary img-cropper-cp" style="margin-right: 10px;">
                                                                    <input type="file" accept="image/*" name="file" id="inputImage" class="hide"> Cargar
                                                                </label>
                                                                <button id="confimed-foto" class="btn btn-success" data-type="success" data-animation-in="animated fadeInRight" data-animation-Out="animated fadeOutRight" >Confirmar</button>
                                                                <input type="hidden" name="image-data" id="image-data">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="cp-img-anal">
                                                    <h4>Opciones</h4>
                                                    <div class="material-design-btn">
                                                        <div class="btn-group images-action-pro">
                                                            <button class="btn btn-white" id="zoomIn" type="button">Acercar</button>
                                                            <button class="btn btn-white" id="zoomOut" type="button">Alejar</button>
                                                            <button class="btn btn-white" id="rotateLeft" type="button">Rotar Derecha</button>
                                                            <button class="btn btn-white" id="rotateRight" type="button">Rotar Izquierda</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">
                            <h2>Datos Basicos</h2>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Congregación</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" value="Camilo Daza" disabled="" name="congregacion" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group" id="data_1">
                                        <label><strong>Fecha de Registro</strong></label>
                                        <div class="input-group date nk-int-st">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" value="{{ date('d/m/Y', strtotime($miembro['created_at'])) }}" name="fecha-registro" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>N° Registro</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="n-registro" value="{{ $miembro['id'] }}" disabled="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Nombres</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="nombres" id="nombres" value="{{ $miembro['nombres'] }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Apellidos</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="apellidos" id="apellidos" value="{{ $miembro['apellidos'] }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Tipo Documento</strong></label>
                                        <div class="bootstrap-select fm-cmp-mg">
                                            <select class="selectpicker" name="tipo-doc" id="tipo_doc" required>
                                                <option value="-1">Seleccione una opcion</option>
                                                @foreach($tiposDocumentos as $tipo)
                                                    @if($miembro['tipo_documento']['id'] == $tipo['id'])
                                                        <option value="{{ $tipo['id'] }}" selected>{{ $tipo['name'] }}</option>
                                                    @else
                                                        <option value="{{ $tipo['id'] }}">{{ $tipo['name'] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Numero documento</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="documento" id="documento" value="{{ $miembro['documento'] }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Ocupación Actual</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="ocupacion" id="ocupacion" value="{{ $miembro['ocupacion_actual'] }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Dirección Redisencia</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="direccion" id="direccion" value="{{ $miembro['direccion_corresp'] }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Teléfono Fijo</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="telefono" id="telefono" value="{{ $miembro['telefono'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Celular</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="celular" id="celular" value="{{ $miembro['celular'] }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-example-int">
                                    <div class="widget-form">
                                        <label><strong>Correo Electronico</strong></label>
                                        <div class="nk-int-st">
                                            <input type="email" class="form-control input-sm" name="correo" id="email" value="{{ $miembro['correo'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <h2>Lugar de nacimiento</h2>
                                </div>
                                <div class="chosen-select-act">
                                    <select class="chosen" data-placeholder="Your Favorite Football Team" name="ciudad_nacimiento" id="ciudad_nacimiento" required>
                                        <option value="-1">Seleccione una opción</option>
                                        @foreach($departamentos as $departamento)
                                            <optgroup label="{{ $departamento->departamento }}">
                                                @foreach($departamento->municipios as $municipio)
                                                    @if($miembro['mun_naci']['id'] == $municipio->id)
                                                        <option value="{{ $municipio->id }}" selected>{{ $municipio->municipio }}</option>
                                                    @else
                                                        <option value="{{ $municipio->id }}">{{ $municipio->municipio }}</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group" id="data_1">
                                        <label><strong>Fecha de Nacimiento</strong></label>
                                        <div class="input-group date nk-int-st">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" name="fecha-nacimiento" placeholder="Fecha Nacimiento" id="fecha_nacimiento" value="{{ $miembro['fecha_naci'] }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">
                            <h2>Escolaridad</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h5>Nivel de escolaridad</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="fm-checkbox">
                                    <label onclick="inhabilitarInputProfesion()">
                                        @if($miembro['escolaridad']['id'] == 1)
                                            <input required checked type="radio" value="1" name="nivel" class="i-checks" onclick="inhabilitarInputProfesion()">
                                        @else
                                            <input required type="radio" value="1" name="nivel" class="i-checks" onclick="inhabilitarInputProfesion()">
                                        @endif
                                        <i onclick="inhabilitarInputProfesion()"></i>Primaria
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="fm-checkbox">
                                    <label onclick="inhabilitarInputProfesion()">
                                        @if($miembro['escolaridad']['id'] == 2)
                                            <input required checked type="radio" value="2" name="nivel" class="i-checks" onclick="inhabilitarInputProfesion()">
                                        @else
                                            <input required type="radio" value="2" name="nivel" class="i-checks" onclick="inhabilitarInputProfesion()">
                                        @endif
                                        <i onclick="inhabilitarInputProfesion()"></i>Secundaria
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="fm-checkbox">
                                    <label onclick="habilitarInputProfesion()">
                                        @if($miembro['escolaridad']['id'] == 3)
                                            <input required checked type="radio" value="3" name="nivel" class="i-checks" onclick="habilitarInputProfesion()">
                                        @else
                                            <input required type="radio" value="3" name="nivel" class="i-checks" onclick="habilitarInputProfesion()">
                                        @endif
                                        <i onclick="habilitarInputProfesion()"></i>Técnico
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="fm-checkbox">
                                    <label onclick="habilitarInputProfesion()">
                                        @if($miembro['escolaridad']['id'] == 4)
                                            <input required checked type="radio" value="4" name="nivel" class="i-checks" onclick="habilitarInputProfesion()">
                                        @else
                                            <input required type="radio" value="4" name="nivel" class="i-checks" onclick="habilitarInputProfesion()">
                                        @endif
                                        <i onclick="habilitarInputProfesion()"></i>Tecnólogo
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="fm-checkbox">
                                    <label onclick="habilitarInputProfesion()">
                                        @if($miembro['escolaridad']['id'] == 5)
                                            <input required checked type="radio" value="5" name="nivel" class="i-checks" onclick="habilitarInputProfesion()">
                                        @else
                                            <input required type="radio" value="5" name="nivel" class="i-checks" onclick="habilitarInputProfesion()">
                                        @endif
                                        <i onclick="habilitarInputProfesion()"></i>Superior
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="fm-checkbox">
                                    <label onclick="habilitarInputProfesion()">
                                        @if($miembro['escolaridad']['id'] == 6)
                                            <input required checked type="radio" value="6" name="nivel" class="i-checks" onclick="habilitarInputProfesion()">
                                        @else
                                            <input required type="radio" value="6" name="nivel" class="i-checks" onclick="habilitarInputProfesion()">
                                        @endif
                                        <i onclick="habilitarInputProfesion()"></i>Otro
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <strong><h5>Cual?</h5></strong>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-lg" name="profesion" id="profesion" value="{{ $miembro['profesion'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">
                            <h2>Información Familiar</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <h5>Estado civil</h5>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select class="selectpicker" id="cmb-estado-civil" name="estado-civil" required>
                                        <option value="-1">Seleccione una opción</option>

                                        @foreach($estadosCiviles as $estado)
                                            @if($miembro['estado_civil'] == $estado['id'])
                                                <option value="{{$estado['id']}}" selected>{{$estado['name']}}</option>
                                            @else
                                                <option value="{{$estado['id']}}">{{$estado['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" data-toggle="tooltip" data-placement="top" title="En caso de divorcio, indique el concepto recibido y adjunte el concepto">
                                <div class="nk-int-mk sl-dp-mn" >
                                    <h5>Concepto Recibido</h5>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select name="concepto-emitido" class="selectpicker" id="cmb-concepto">
                                        @if($miembro['concepto_recibido'] == null)
                                            <option value="-1" selected>Seleccione una opción</option>
                                        @else
                                            <option value="-1">Seleccione una opción</option>
                                        @endif

                                        @if($miembro['concepto_recibido'] == 1)
                                            <option value="1" selected>Favorable</option>
                                        @else
                                            <option value="1">Favorable</option>
                                        @endif

                                        @if($miembro['concepto_recibido'] == 2)
                                            <option value="2" selected>Desfavorable</option>
                                        @else
                                            <option value="2">Desfavorable</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-example-int">
                                    <div class="material-design-btn" data-toggle="tooltip" data-placement="top" title="Concepto recibido">
                                        <div class="box">
                                            <input type="file" name="concepto" id="file-5" class="inputfile inputfile-4" />
                                            <label for="file-5"><figure id="label-concepto"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Concepto</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Nombre Conyuge</strong></label>
                                        <div class="nk-int-st">
                                            <input name="nombre-conyuge" type="text" class="form-control input-sm" disabled id="nombre-conyuge" value="{{ $miembro['conyuge'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Hijos</strong></label>
                                        <div class="chosen-select-act fm-cmp-mg">
                                            <select class="chosen" multiple data-placeholder="Seleccione" id="select-hijos" name="hijos[]">
                                                <option value="United States">United States</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Aland Islands">Aland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">
                            <h2>Información Eclesial</h2>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group" id="data_1">
                                        <label><strong>Fecha de Bautizo</strong></label>
                                        <div class="input-group date nk-int-st">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" name="fecha-bautiso" placeholder="Fecha de bautizo" id="fecha-bautizo" value="{{$miembro['fecha_bautizo']}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Pastor que lo Bautizó</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="pastor" id="pastor" value="{{ $miembro['pastor_bautizo'] }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <h2>Ciudad Bautizo</h2>
                                </div>
                                <div class="chosen-select-act">
                                    <select class="chosen" data-placeholder="Your Favorite Football Team" name="ciudad_bautizo" id="ciudad_bautizo" required>
                                        <option value="-1">Seleccione una opción</option>
                                        @foreach($departamentos as $departamento)
                                            <optgroup label="{{ $departamento->departamento }}">
                                                @foreach($departamento->municipios as $municipio)
                                                    @if($miembro['mun_bautizo']['id'] == $municipio->id)
                                                        <option value="{{ $municipio->id }}" selected>{{ $municipio->municipio }}</option>
                                                    @else
                                                        <option value="{{ $municipio->id }}">{{ $municipio->municipio }}</option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group" id="data_1">
                                        <label><strong>Fecha recepción del Espiritu Santo</strong></label>
                                        <div class="input-group date nk-int-st">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" name="fecha-esp" placeholder="Fecha recepción" value="{{ $miembro['fecha_espiritu'] }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Cargos</strong></label>
                                        <div class="chosen-select-act fm-cmp-mg">
                                            <select class="chosen" multiple data-placeholder="Seleccione" name="cargos[]" id="cargos">
                                                @foreach($cargos as $cargo)
                                                    <option value="{{ $cargo['id'] }}">{{ $cargo['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">
                            <h2>Firma</h2>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="image-cropper-wp">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="image-crop-firma">
                                    <img src="{{ asset($miembro['firma']) }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="preview-img-pro-ad">
                                    <div class="image-crp-img">
                                        <h4>Firma o Huella</h4>
                                        <p>Carga y ajusta la firma o huella para el registro de membresia</p>
                                        <div class="material-design-btn">

                                            <div class="btn-group images-action-pro">
                                                <div class="btn-group images-cropper-pro">
                                                    <label title="Upload image file" for="inputImageFirma" class="btn btn-primary img-cropper-cp" style="margin-right: 10px;">
                                                        <input type="file" accept="image/*" name="file" id="inputImageFirma" class="hide"> Cargar
                                                    </label>

                                                    <input type="hidden" name="firma-data" id="firma-data">
                                                </div>

                                                <button id="confimed-firma" class="btn btn-success" data-type="success" data-animation-in="animated fadeInRight" data-animation-Out="animated fadeOutRight" >Confirmar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="maincrop-img">
                                        <div class="image-crp-int">
                                            <h4>Previsual</h4>
                                            <div class="img-preview2 img-preview-custom-firma"></div>
                                        </div>
                                    </div>

                                    <div class="cp-img-anal">
                                        <h4>Opciones</h4>
                                        <div class="material-design-btn">
                                            <div class="btn-group images-action-pro">
                                                <button class="btn btn-white" id="zoomInFirma" type="button" style="margin-right: 3px;">Acercar</button>
                                                <button class="btn btn-white" id="zoomOutFirma" type="button" style="margin-right: 3px;">Alejar</button>
                                                <button class="btn btn-white" id="rotateLeftFirma" type="button" style="margin-right: 3px;">Rotar Derecha</button>
                                                <button class="btn btn-white" id="rotateRightFirma" type="button" style="margin-right: 3px;">Rotar Izquierda</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="material-design-btn">
                                    <center>
                                        <div class="btn-group images-action-pro">
                                            <button class="btn notika-btn-ipuc btn-reco-mg btn-button-mg" type="submit">Registrar</button>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <input type="hidden" name="" id="incorrecto" data-toggle="modal" data-target="#myModalseven">
                            <input type="hidden" name="" id="exito" data-toggle="modal" data-target="#modalRegistre">
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </form>
    <!-- Form Element area End-->

    <!-- Modals -->
    <div class="modal animated shake" id="myModalseven" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2>Registro de Membresia!</h2>
                    <p>Es posile que haya olvidado registrar algunos campos, por favor revise nuevamente el formulario y diligencie todos los campos requeridos.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal registro --}}
    <div class="modal animated bounce" id="modalRegistre" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h2>Registro de Membresia!</h2>
                    <p>La Iglesia Pentecostal Unida de Colombia le informa que todos los datos han sido registrados exitosamente en el libro de membresia.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/dialog/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/dialog/dialog-active.js') }}"></script>
    <script src="{{ asset('js/cropper/cropper-firma.js') }}"></script>
    <script src="{{ asset('js/membresia/registro-miembro.js') }}"></script>

    <script>
        $(document).ready(function(){
            let exist = '{{Session::has('alert')}}';
            if(exist){
                $('#exito').click();
            }

        })
    </script>
@endsection
