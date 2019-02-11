@extends('layouts.app')

@section('css')
    <style>
        input[type="file"]#exampleFormControlFile1 {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        label[for="exampleFormControlFile1"] {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            background-color: #00338d;
            display: inline-block;
            transition: all .5s;
            cursor: pointer;
            padding: 15px 40px !important;
            text-transform: uppercase;
            width: fit-content;
            text-align: center;
        }
    </style>
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
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                <div class="breadcomb-report">
                                    <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
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
    <div class="form-element-area">
        <form action="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-element-list">
                            <div class="basic-tb-hd">
                                <h2>Datos Basicos</h2>
                                <p>
                                    <strong>NOTA PARA EL CREYENTE</strong>. En caso de que usted se traslade a otra congregación, por favor
                                    solicite además de la carta del pastor, copia de este formato de membresía para que
                                    repose en los archivos de la nueva congregación donde asistirá.
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-example-int">
                                        <div class="form-group">
                                            <label><strong>Congregación</strong></label>
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" value="Camilo Daza" disabled="">
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
                                                <input type="text" class="form-control" value="03/19/2018">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-example-int">
                                        <div class="form-group">
                                            <label><strong>N° Registro</strong></label>
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm">
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
                                                <input type="text" class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-example-int">
                                        <div class="form-group">
                                            <label><strong>Apellidos</strong></label>
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm">
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
                                                <select class="selectpicker">
                                                    <option>Cedula Ciudadania</option>
                                                    <option>Tarjeta Identidad</option>
                                                    <option>NUIP</option>
                                                    <option>Cedula Extranjeria</option>
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
                                                <input type="text" class="form-control input-sm">
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
                                                <input type="text" class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    <div class="form-example-int">
                                        <div class="form-group">
                                            <label><strong>Dirección Redisencia</strong></label>
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" >
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
                                                <input type="text" class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-example-int">
                                        <div class="form-group">
                                            <label><strong>Celular</strong></label>
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="form-example-int">
                                        <div class="form-group">
                                            <label><strong>Correo Electronico</strong></label>
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int">
                                        <div class="form-group">
                                            <label><strong>Departamento Nacimiento</strong></label>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker">
                                                    <option>Cedula Ciudadania</option>
                                                    <option>Tarjeta Identidad</option>
                                                    <option>NUIP</option>
                                                    <option>Cedula Extranjeria</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int">
                                        <div class="form-group">
                                            <label><strong>Municipio Nacimiento</strong></label>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker">
                                                    <option>Cedula Ciudadania</option>
                                                    <option>Tarjeta Identidad</option>
                                                    <option>NUIP</option>
                                                    <option>Cedula Extranjeria</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int">
                                        <div class="form-group" id="data_1">
                                            <label><strong>Fecha de Nacimiento</strong></label>
                                            <div class="input-group date nk-int-st">
                                                <span class="input-group-addon"></span>
                                                <input type="text" class="form-control" value="03/19/2018">
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
                                        <label><input type="radio" value="option1" name="nivel" class="i-checks"> <i></i> Primaria</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="fm-checkbox">
                                        <label><input type="radio" value="option1" name="nivel" class="i-checks"> <i></i> Secundaria</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="fm-checkbox">
                                        <label><input type="radio" value="option1" name="nivel" class="i-checks"> <i></i> Técnico</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="fm-checkbox">
                                        <label><input type="radio" value="option1" name="nivel" class="i-checks"> <i></i> Tecnólogo</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="fm-checkbox">
                                        <label><input type="radio" value="option1" name="nivel" class="i-checks"> <i></i> Superior</label>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="fm-checkbox">
                                        <label><input type="radio" value="option1" name="nivel" class="i-checks"> <i></i> Otro</label>
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
                                        <select class="selectpicker">
                                            <option value="">Soltero</option>
                                            <optgroup label="Casado">
                                                <option>Por la noteria</option>
                                                <option>Por la IPUC</option>
                                            </optgroup>
                                            <option value="">Viudo (a)</option>
                                            <option value="">Divorciado (a)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="nk-int-mk sl-dp-mn">
                                        <h5>Por IPUC</h5>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker">
                                            <option>Si</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="nk-int-mk sl-dp-mn">
                                        <h5>Concepto Recibido</h5>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker">
                                            <option>Favorable</option>
                                            <option>Desfavorable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Abjuntar</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-example-int">
                                        <div class="form-group">
                                            <label><strong>Nombre Conyuge</strong></label>
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" >
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
                                <h2>Input Mask</h2>
                                <p>An input mask helps the user with the input. This can be useful for dates, numerics, phone numbers etc...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-element-list mg-t-30">
                            <div class="cmp-tb-hd">
                                <h2>Input Mask</h2>
                                <p>An input mask helps the user with the input. This can be useful for dates, numerics, phone numbers etc...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-element-list mg-t-30">
                            <div class="cmp-tb-hd">
                                <h2>Input Mask</h2>
                                <p>An input mask helps the user with the input. This can be useful for dates, numerics, phone numbers etc...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-element-list mg-t-30">
                            <div class="cmp-tb-hd">
                                <h2>Input Mask</h2>
                                <p>An input mask helps the user with the input. This can be useful for dates, numerics, phone numbers etc...</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <!-- Form Element area End-->
@endsection

@section('js')

@endsection
