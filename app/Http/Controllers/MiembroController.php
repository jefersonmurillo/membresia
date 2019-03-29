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

    public function obtenerMiembroPdf(Request $request){
        $miembro = Miembro::where(['id' => $request->input('id')])
            ->with([
                'mun_bautizo',
                'tipo_documento',
                'mun_naci',
                'escolaridad',
                'cargos.cargo'
            ])->get()->toArray()[0];

        if(count($miembro) == 0) return redirect()->back()->with('alert', 'Miembro no encontrado');

        $profesion = $miembro['profesion'];
        $ocupacion = $miembro['ocupacion_actual'];
        $direccion = $miembro['direccion_corresp'];
        $fijo = $miembro['telefono'];
        $celular = $miembro['celular'];
        $correo = $miembro['correo'];

        $estado_civil = $miembro['estado_civil'];

        $soltero = '';
        $casado = '';
        $casado_notaria = '';
        $casado_ipuc = '';
        $divorciado = '';
        $viudo = '';
        $tribunal_si = '';
        $tribunal_no = '';
        $favorable = '';
        $desfavorable = '';

        if($estado_civil == 1) $soltero = 'X';
        elseif($estado_civil == 2 OR $estado_civil == 2) {
            $casado = 'X';
            if($estado_civil == 2) $casado_notaria = 'X';
            elseif($estado_civil == 3) $casado_ipuc = 'X';
        }elseif($estado_civil == 4) {
            $divorciado = 'X';
            $tribunal_no = 'X';
        }elseif($estado_civil == 5){
            $divorciado = 'X';
            $tribunal_si = 'X';
        }elseif($estado_civil == 6) $viudo = 'X';

        if($miembro['concepto_recibido'] != null AND $miembro['concepto_recibido'] == 1)
            $favorable = 'X';
        elseif($miembro['concepto_recibido'] != null AND $miembro['concepto_recibido'] == 0)
            $desfavorable = 'X';

        if($miembro['conyuge'] =! null)
            $conyuge = $miembro['conyuge'];
        else{
            $conyuge = '';
        }

        /**
         * Terminar
         */
        $cantidad_hijos = '0';
        $hijos = '';

        $fecha_bautizo = $miembro['fecha_bautizo'];
        $fecha_bautizo = explode('-', $fecha_bautizo);

        $dia_bautizo = $fecha_bautizo[0];
        $mes_bautizo = $fecha_bautizo[1];
        $anio_bautizo = $fecha_bautizo[2];

        $ciudad_bautizo = $miembro['mun_bautizo']['municipio'];

        $fecha_es = $miembro['fecha_espiritu'];

        $dia_es = '';
        $mes_es = '';
        $anio_es = '';

        if(!is_null($fecha_es)){
            $fecha_es = explode('-', $fecha_es);

            $dia_es = $fecha_es[0];
            $mes_es = $fecha_es[1];
            $anio_es = $fecha_es[2];
        }

        $cargos = $miembro['cargos'];
        $cargos1 = '';
        $cargos2 = '';

        foreach ($cargos as $cargo) {
            $cargos1 .= $cargo['cargo']['name'];
        }

        $observaciones1 = '';
        $observaciones2 = '';
        $observaciones3 = '';
        $firma_pastor = '';
        $firma_creyente = '';

        $concecutivo = 1;
        $foto = '../../img/logo/recuadro4.png';
        $congregacion = 'Ceci';

        $nuip = 'X';
        $ti = 'X';
        $cc = 'X';
        $documento = 'X';
        $lugar_fecha_nacimiento = '';
        $nombres = $miembro['nombres'];

        $data = [
            'profesion' => $profesion,
            'ocupacion' => $ocupacion,
            'direccion' => $direccion,
            'fijo' => $fijo,
            'celular' => $celular,
            'correo' => $correo,
            'soltero' => $soltero,
            'casado' => $casado,
            'casado_notaria' => $casado_notaria,
            'casado_ipuc' => $casado_ipuc,
            'divorciado' => $divorciado,
            'viudo' => $viudo,
            'tribunal_si' => $tribunal_si,
            'tribunal_no' => $tribunal_no,
            'favorable' => $favorable,
            'desfavorable' => $desfavorable,
            'conyuge' => $conyuge,
            'cantidad_hijos' => $cantidad_hijos,
            'hijos' => $hijos,
            'dia_bautizo' => $dia_bautizo,
            'mes_bautizo' => $mes_bautizo,
            'anio_bautizo' => $anio_bautizo,
            'ciudad_bautizo' => $ciudad_bautizo,
            'dia_es' => $dia_es,
            'mes_es' => $mes_es,
            'anio_es' => $anio_es,
            'cargos1' => $cargos1,
            'cargos2' => $cargos2,
            'observaciones1' => $observaciones1,
            'observaciones2' => $observaciones2,
            'observaciones3' => $observaciones3,
            'firma_pastor' => $firma_pastor,
            'firma_creyente' => $firma_creyente,
            'consecutivo' => $concecutivo,
            'foto' => $foto,
            'congregacion' => $congregacion,
            'nombre' => $nombres,
            'nuip' => $nuip,
            'ti' => $ti,
            'cc' => $cc,
            'documento' => $documento,
            'lugar_fecha_nacimiento' => $lugar_fecha_nacimiento,
            'primaria' => '',
            'secundaria' => '',
            'tecnico' => '',
            'tecnologo' => '',
            'superior' => '',
            'otro' => '',
        ];

        $data['todo'] = true;
        dd($data['todo']);
        PDF::obtenerPDFMiembro($data);
    }

    public function getLibroMiembros(Request $request){
        $miembros = Miembro::get(['id', 'nombres', 'apellidos', 'fecha_naci', 'documento', 'celular', 'fecha_bautizo'])->toArray();
        return view('membresia.libro-miembros', ['miembros' => $miembros]);
    }

}
