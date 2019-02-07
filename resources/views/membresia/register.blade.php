@extends('layouts.app')

@section('nav')
    @include('layouts.nav')
@endsection

@section('content')
    <div class="form-example-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Registro de Miembro</h2>
                            <p>Individual form controls automatically receive some global styling. All textual 'input', 'textarea', and 'select' elements with <code>.form-control</code> are set to width: 100%; by default. Wrap labels and controls in <code>.form-group</code> for optimum
                                spacing.</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Congregación</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="Enter Email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-example-int mg-t-15">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-example-int mg-t-15">
                                    <button class="btn btn-success notika-btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
