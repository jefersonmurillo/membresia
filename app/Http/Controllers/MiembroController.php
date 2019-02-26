<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\EstadoCivil;
use App\Models\Miembro;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class MiembroController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $departamentos = Departamento::with('municipios')->orderBy('departamento', 'asc')->get();
        $cargos = Cargo::all()->toArray();
        $estadosCiviles = EstadoCivil::all()->toArray();
        $tipoDocumento = TipoDocumento::all()->toArray();
        $n = Miembro::all()->count()+1;

        return view('membresia.register', [
            'departamentos' => $departamentos,
            'cargos' => $cargos,
            'estadosCiviles' => $estadosCiviles,
            'tiposDocumentos' => $tipoDocumento,
            'n' => $n
        ]);
    }

    public function store(Request $request){
        dd($request->all());
    }

}
