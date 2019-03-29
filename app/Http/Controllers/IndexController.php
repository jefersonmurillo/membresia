<?php

namespace App\Http\Controllers;

use App\Http\Bin\PDF;
use App\Models\Miembro;
use Illuminate\Http\Request;

class IndexController extends Controller {

    public function index(Request $request){
        if($request->has('id')){
            $id = base64_decode($request->get('id'));
            $id = intval($id);

            if($id == 0) return view('layouts.404');

            $data = $this->obtenerDatosMiembros($id);

            if($id > 0 AND count($data) == 0) return view('layouts.404');

            PDF::obtenerPDFMiembro($data, $id);



        }else{
            return view('index');
        }

        return view('layouts.404');


    }

    private function obtenerDatosMiembros($id){
        $miembros = [];

        if($id > 0){
            $miembros = Miembro::where(['id' => $id])
                ->with([
                    'mun_bautizo',
                    'tipo_documento',
                    'mun_naci.departamento',
                    'escolaridad',
                    'cargos.cargo'
                ])->get()->toArray();
        }elseif($id < 0){
            $miembros = Miembro::with([
                    'mun_bautizo',
                    'tipo_documento',
                    'mun_naci.departamento',
                    'escolaridad',
                    'cargos.cargo'
                ])->get()->toArray();
        }

        $data = array();

        foreach ($miembros as $miembro) {
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

            $conyuge = '';

            if(!is_null($miembro['conyuge'])) $conyuge = $miembro['conyuge'];

            /**
             * Terminar
             */
            $cantidad_hijos = '';
            $hijos = '';

            $fecha_bautizo = $miembro['fecha_bautizo'];
            $fecha_bautizo = explode('-', $fecha_bautizo);

            $dia_bautizo = $fecha_bautizo[2];
            $mes_bautizo = $fecha_bautizo[1];
            $anio_bautizo = $fecha_bautizo[0];

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
            $firma_pastor = $miembro['firma'];
            $firma_creyente = $miembro['firma'];

            $concecutivo = 1;
            $foto = $miembro['foto'];
            $congregacion = 'Ceci';

            $nuip = '';
            $ti = '';
            $cc = '';

            if($miembro['tipo_documento']['id'] == 1) $cc = 'X';
            elseif($miembro['tipo_documento']['id'] == 2) $ti = 'X';
            elseif($miembro['tipo_documento']['id'] == 3) $nuip = 'X';

            $documento = $miembro['documento'];
            $lugar_fecha_nacimiento = $miembro['mun_naci']['municipio'].' '.$miembro['mun_naci']['departamento']['departamento'].' '.$miembro['fecha_naci'];
            $nombres = $miembro['nombres'];

            $primaria = '';
            $secundaria = '';
            $tecnico = '';
            $tecnologo = '';
            $superior = '';
            $otro = '';
            $profesion = '';

            if($miembro['escolaridad']['id'] == 1) $primaria = 'X';
            elseif($miembro['escolaridad']['id'] == 2) $secundaria = 'X';
            elseif($miembro['escolaridad']['id'] == 3) $tecnico = 'X';
            elseif($miembro['escolaridad']['id'] == 4) $tecnologo = 'X';
            elseif($miembro['escolaridad']['id'] == 5) $superior = 'X';
            elseif($miembro['escolaridad']['id'] == 6) {
                $otro = 'X';
                $profesion = $miembro['profesion'];
            }

            $hijo1 = '';
            $hijo2 = '';
            $hijo3 = '';
            $hijo4 = '';

            array_push($data, [
                'primaria' => $primaria,
                'secundaria' => $secundaria,
                'tecnico' => $tecnico,
                'tecnologo' => $tecnologo,
                'superior' => $superior,
                'otro' => $otro,
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
                'nombre' => $nombres.' '.$miembro['apellidos'],
                'nuip' => $nuip,
                'ti' => $ti,
                'cc' => $cc,
                'documento' => $documento,
                'lugar_fecha_nacimiento' => $lugar_fecha_nacimiento,
                'hijo1' => $hijo1,
                'hijo2' => $hijo2,
                'hijo3' => $hijo3,
                'hijo4' => $hijo4,
                'fecha_registro' => $miembro['created_at']
            ]);
        }


        return $data;
    }

}
