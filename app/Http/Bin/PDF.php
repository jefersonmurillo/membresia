<?php
/**
 * Created by PhpStorm.
 * User: USUARIO
 * Date: 21/03/2019
 * Time: 2:00 PM
 */

namespace App\Http\Bin;

use App\Utility\FormatNumber;
use Illuminate\Support\Facades\File;
use Mpdf\Mpdf;
use Alchemy\Zippy\Zippy;

class PDF {

    public static function obtenerPDFMiembro($datos, $todo){

        foreach ($datos as $dato) {
            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'format' => 'LETTER',
                'orientation' => 'L'
            ]);

            $fecha_registro = date('Y-m-d', strtotime($dato['fecha_registro']));
            $fecha_registro = FormatNumber::convertDateSpanish($fecha_registro);

            $pag1 = view('informes.pag1-registro-miembro', [
                'firma_creyente' => $dato['firma_creyente'],
                'nombres' => $dato['nombre'],
                'dia' => $fecha_registro['numeroDia'],
                'mes' => $fecha_registro['nombreMes'],
                'anio' => $fecha_registro['anio'],
                'documento' => $dato['documento']
            ]);

            $mpdf->WriteHTML($pag1);
            $mpdf->AddPage('P');

            $pag2 = view('informes.pag2-registro-miembro', $dato);
            $mpdf->WriteHTML($pag2);

            if($todo < 0){
                $mpdf->Output('storage/miembros'.'/'.$dato['documento'].'.pdf', 'F');
            }elseif($todo > 0){
                $mpdf->Output(''.$dato['documento'], 'I');
                return;
            }
        }

        if($todo < 0) {
            $zippy = Zippy::load();

            $name = 'miembros-'.time().'.zip';

            $zippy->create('storage/tmp/'.$name, array(
                'Miembros' => 'storage/miembros'
            ), true);

            header("Content-type: application/octet-stream");
            header("Content-disposition: attachment; filename=".$name);
            readfile('storage/tmp/'.$name);
            File::delete('storage/tmp/'.$name);
        }

    }

}
