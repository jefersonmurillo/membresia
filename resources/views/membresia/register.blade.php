@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/membresia/style.css') }}">
@endsection

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
    <!-- Encabezado -->
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-form"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Registro de Miembros</h2>
                                        <p>Iglesia Pentecostal Unida de Colombia <span class="bread-ntd">IPUC</span></p>
                                    </div>
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
                                                <img src="{{ asset('img/cropper/1.jpg') }}" alt="">
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
                                                                <label title="Upload image file" for="inputImage" class="btn btn-primary img-cropper-cp">
                                                                    <input type="file" accept="image/*" name="file" id="inputImage" class="hide"> Cargar Foto
                                                                </label>
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
                                            <input type="text" class="form-control input-sm" value="Camilo Daza" disabled="" name="congregacion" >
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
                                            <input type="text" class="form-control" value="{{ date('m/j/Y') }}" name="fecha-registro" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>N° Registro</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="n-registro" value="{{$n}}" disabled="">
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
                                            <input type="text" class="form-control input-sm" name="nombres" id="nombres">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Apellidos</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="apellidos" id="apellidos">
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
                                            <select class="selectpicker" name="tipo-doc" id="tipo_doc">
                                                <option value="">Seleccione una opcion</option>
                                                @foreach($tiposDocumentos as $tipo)
                                                    <option value="{{ $tipo['id'] }}">{{ $tipo['name'] }}</option>
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
                                            <input type="text" class="form-control input-sm" name="documento" id="documento">
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
                                            <input type="text" class="form-control input-sm" name="ocupacion" id="ocupacion">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Dirección Redisencia</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="direccion" id="direccion">
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
                                            <input type="text" class="form-control input-sm" name="telefono" id="telefono">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Celular</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="celular" id="celular">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-example-int">
                                    <div class="widget-form">
                                        <label><strong>Correo Electronico</strong></label>
                                        <div class="nk-int-st">
                                            <input type="email" class="form-control input-sm" name="correo" id="email">
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
                                    <select class="chosen" data-placeholder="Your Favorite Football Team" name="ciudad_nacimiento" id="ciudad_nacimiento">
                                        <option value="">Seleccione una opción</option>
                                        @foreach($departamentos as $departamento)
                                            <optgroup label="{{ $departamento->departamento }}">
                                                @foreach($departamento->municipios as $municipio)
                                                    <option value="{{ $municipio->id }}">{{ $municipio->municipio }}</option>
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
                                            <input type="text" class="form-control" name="fecha-nacimiento" placeholder="Fecha Nacimiento" id="fecha_nacimiento">
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
                                    <label onclick="inhabilitarInputProfesion()"><input type="radio" value="1" name="nivel" class="i-checks" onclick="inhabilitarInputProfesion()"> <i onclick="inhabilitarInputProfesion()"></i>Primaria</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="fm-checkbox">
                                    <label onclick="inhabilitarInputProfesion()"><input type="radio" value="2" name="nivel" class="i-checks" onclick="inhabilitarInputProfesion()"> <i onclick="inhabilitarInputProfesion()"></i>Secundaria</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="fm-checkbox">
                                    <label onclick="habilitarInputProfesion()"><input type="radio" value="3" name="nivel" class="i-checks" onclick="habilitarInputProfesion()"> <i onclick="habilitarInputProfesion()"></i>Técnico</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="fm-checkbox">
                                    <label onclick="habilitarInputProfesion()"><input type="radio" value="4" name="nivel" class="i-checks" onclick="habilitarInputProfesion()"> <i onclick="habilitarInputProfesion()"></i>Tecnólogo</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="fm-checkbox">
                                    <label onclick="habilitarInputProfesion()"><input type="radio" value="5" name="nivel" class="i-checks" onclick="habilitarInputProfesion()"> <i onclick="habilitarInputProfesion()"></i>Superior</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="fm-checkbox">
                                    <label onclick="habilitarInputProfesion()"><input type="radio" value="6" name="nivel" class="i-checks" onclick="habilitarInputProfesion()"> <i onclick="habilitarInputProfesion()"></i>Otro</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <strong><h5>Cual?</h5></strong>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-lg" name="profesion" id="profesion">
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
                                    <select class="selectpicker" id="cmb-estado-civil">
                                        @foreach($estadosCiviles as $estado)
                                            <option value="{{$estado['id']}}">{{$estado['name']}}</option>
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
                                        <option value="-1">Seleccione una opción</option>
                                        <option value="1">Favorable</option>
                                        <option value="2">Desfavorable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <div class="form-example-int">
                                    <div class="material-design-btn" data-toggle="tooltip" data-placement="top" title="Concepto recibido">
                                        <div class="box">
                                            <input type="file" name="file-5" id="file-5" class="inputfile inputfile-4" />
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
                                            <input name="nombre-conyuge" type="text" class="form-control input-sm" disabled id="nombre-conyuge">
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
                                            <input type="text" class="form-control" name="fecha-bautiso" placeholder="Fecha de bautizo" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Pastor que lo Bautizó</strong></label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="pastor">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
                                    <h2>Ciudad Bautizo</h2>
                                </div>
                                <div class="chosen-select-act">
                                    <select class="chosen" data-placeholder="Your Favorite Football Team" name="ciudad_bautizo">
                                        <option value="">Seleccione una opción</option>
                                        @foreach($departamentos as $departamento)
                                            <optgroup label="{{ $departamento->departamento }}">
                                                @foreach($departamento->municipios as $municipio)
                                                    <option value="{{ $municipio->id }}">{{ $municipio->municipio }}</option>
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
                                            <input type="text" class="form-control" name="fecha-esp" placeholder="Fecha recepción" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-example-int">
                                    <div class="form-group">
                                        <label><strong>Cargos</strong></label>
                                        <div class="chosen-select-act fm-cmp-mg">
                                            <select class="chosen" multiple data-placeholder="Seleccione" name="cargos[]">
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
                                    <img src="{{ asset('img/cropper/1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="preview-img-pro-ad">
                                    <div class="image-crp-img">
                                        <h4>Firma o Huella</h4>
                                        <p>Carga y ajusta la firma o huella para el registro de membresia</p>
                                        <div class="material-design-btn">
                                            <div class="btn-group images-cropper-pro">
                                                <label title="Upload image file" for="inputImageFirma" class="btn btn-primary img-cropper-cp">
                                                    <input type="file" accept="image/*" name="file" id="inputImageFirma" class="hide"> Cargar
                                                </label>

                                                <input type="hidden" name="image-data" id="firma-data">
                                            </div>
                                            <div class="btn-group images-action-pro">
                                                <button class="btn btn-white" id="confirmar-firma" type="button">Confirmar</button>
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
                                                <button class="btn btn-white" id="zoomInFirma" type="button">Acercar</button>
                                                <button class="btn btn-white" id="zoomOutFirma" type="button">Alejar</button>
                                                <button class="btn btn-white" id="rotateLeftFirma" type="button">Rotar Derecha</button>
                                                <button class="btn btn-white" id="rotateRightFirma" type="button">Rotar Izquierda</button>
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
    </form>
    <!-- Form Element area End-->
@endsection

@section('js')
    <script src="{{ asset('js/cropper/cropper-firma.js') }}"></script>
    <script src="{{ asset('js/membresia/registro-miembro.js') }}"></script>
    <script src="{{ asset('js/membresia/firma.js') }}"></script>
@endsection
