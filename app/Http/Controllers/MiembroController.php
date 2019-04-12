<?php

namespace App\Http\Controllers;

use App\Http\Bin\PDF;
use App\Models\Adjunto;
use App\Models\Cargo;
use App\Models\CargosMiembro;
use App\Models\Departamento;
use App\Models\EstadoCivil;
use App\Models\Miembro;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

use Image;

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


        /**
         * Validando los datos
         */
        /*$this->validate($request, [
            'image-data' => 'required',
            'fecha-registro' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'tipo-doc' => 'required',
            'documento' => 'required',
            'ocupacion' => 'required',
            'direccion' => 'required',
            'celular' => 'required',
            'ciudad_nacimiento' => 'required',
            'fecha-naciiento' => 'required',
            'nivel' => 'required',
            'fecha-bautso' => 'required',
            'pastor' => 'required',
            'ciudad_bautizo' => 'required',
            'fecha-esp'=> 'required',
            'firma-data'  => 'required'
        ]);*/

        /**
         * Se decodifica y guarda la foto
         */
        $img = $request->input('image-data');
        $info = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $img));

        $imgp = Image::make($info);
        $imgp->save(public_path('storage/fotos/'.$request->input('documento').'.png'));

        /**
         * Se decodifica y guarda la firma
         */
        $img = $request->input('firma-data');
        $info = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $img));

        $imgp = Image::make($info);
        $imgp->save(public_path('storage/firmas/'.$request->input('documento').'.png'));

        /**
         *
         */

        $concepto_recibido = null;
        $url = null;

        $adjunto = [];

        if($request->input('estado_civil') == 4){
            if($request->has('concepto-emitido')){
                if($request->input('concepto-emitido') == 1) $concepto_recibido = true;
                elseif($request->input('concepto-emitido') == 2) $concepto_recibido = false;

                $concepto = $request->file('concepto');
                $url = $concepto->storeAs('conceptos', $request->input('documento'));

                $adjunto = [
                    'tipo_adjunto' => 1,
                    'name' => $request->input('documento').'-'.$request->input('nombres'),
                    'url' => $url
                ];
            }
        }

        $fecha_nacimiento = $request->input('fecha-nacimiento');
        $fecha_nacimiento = explode('/', $fecha_nacimiento);
        $fecha_nacimiento = $fecha_nacimiento[2].'-'.$fecha_nacimiento[0].'-'.$fecha_nacimiento[1];

        $fecha_esp = $request->input('fecha-esp');
        $fecha_esp = explode('/', $fecha_esp);
        $fecha_esp = $fecha_esp[2].'-'.$fecha_esp[0].'-'.$fecha_esp[1];

        $fecha_bautiso = $request->input('fecha-bautiso');
        $fecha_bautiso = explode('/', $fecha_bautiso);
        $fecha_bautiso = $fecha_bautiso[2].'-'.$fecha_bautiso[0].'-'.$fecha_bautiso[1];

        $miembro = new Miembro([
            'tipo_miembro' => 1,
            'estado_civil' => $request->input('estado-civil'),
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'tipo_documento' => 1,
            'documento' => $request->input('documento'),
            'fecha_naci' => $fecha_nacimiento,
            'mun_naci' => $request->input('ciudad_nacimiento'),
            'ocupacion_actual' => $request->input('ocupacion'),
            'direccion_corresp' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'celular' => $request->input('celular'),
            'correo' => $request->input('correo'),
            'fecha_bautizo' => $fecha_bautiso,
            'mun_bautizo' => $request->input('ciudad_bautizo'),
            'pastor_bautizo' => $request->input('pastor'),
            'fecha_espititu' => $fecha_esp,
            'observaciones' => null,
            'escolaridad' => $request->input('nivel'),
            'profesion' => $request->input('profesion'),
            'conyuge' => $request->input('nombre-conyuge'),
            'firma' => ('storage/firmas/'.$request->input('documento').'.png'),
            'foto' => ('storage/fotos/'.$request->input('documento').'.png'),
            'concepto_recibido' => $concepto_recibido
        ]);

        $exito = $miembro->save();

        if($exito){
            $id_miembro = $miembro->id;
            if($request->has('cargos') AND count($request->input('cargos'))>0){
                $cargos = $request->input('cargos');
                foreach ($cargos as $cargo) {
                    $cargo_miembro = new CargosMiembro([
                        'miembro' => $id_miembro,
                        'cargo' => $cargo
                    ]);

                    $cargo_miembro->save();
                }
            }

            if(count($adjunto) > 0){
                $adjunto['miembro'] = $id_miembro;
                $adj = new Adjunto($adjunto);
                $adj->save();
            }

            return redirect()->back()->with('alert', 'Su tramite ha sido registrado exitosamente');

        }else{
            return abort(500);
        }

    }

    public function updateMiembro(Request $request){
        $miembro = Miembro::where(['id' => base64_decode($request->get('id'))])->with([
            'mun_bautizo',
            'tipo_documento',
            'mun_naci.departamento',
            'escolaridad',
            'cargos.cargo'
        ])->get()->toArray()[0];

        $departamentos = Departamento::with('municipios')->orderBy('departamento', 'asc')->get();
        $cargos = Cargo::all()->toArray();
        $estadosCiviles = EstadoCivil::all()->toArray();
        $tipoDocumento = TipoDocumento::all()->toArray();

        $fecha_nacimiento = $miembro['fecha_naci'];
        $fecha_nacimiento = explode('-', $fecha_nacimiento);
        $fecha_nacimiento = $fecha_nacimiento[2].'/'.$fecha_nacimiento[1].'/'.$fecha_nacimiento[0];

        $fecha_bautizo = explode('-', $miembro['fecha_bautizo']);
        $fecha_bautizo = $fecha_bautizo[2].'/'.$fecha_bautizo[1].'/'.$fecha_bautizo[0];

        $fecha_es = $miembro['fecha_espiritu'];

        if(!is_null($fecha_es)) {
            $fecha_es = explode('-', $fecha_es);
            $fecha_es = $fecha_es[2].'/'.$fecha_es[1].'/'.$fecha_es[2];
        }

        $miembro['fecha_bautizo'] = $fecha_bautizo;
        $miembro['fecha_espiritu'] = $fecha_es;
        $miembro['fecha_naci'] = $fecha_nacimiento;

        return view('membresia.edit', [
            'departamentos' => $departamentos,
            'cargos' => $cargos,
            'estadosCiviles' => $estadosCiviles,
            'tiposDocumentos' => $tipoDocumento,
            'miembro' => $miembro
        ]);
    }

    public function getLibroMiembros(Request $request){
        $miembros = Miembro::get(['id', 'nombres', 'apellidos', 'fecha_naci', 'documento', 'celular', 'fecha_bautizo'])->toArray();
        return view('membresia.libro-miembros', ['miembros' => $miembros]);
    }

}
