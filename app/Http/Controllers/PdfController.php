<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Mpdf\Mpdf;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller {

    public function pdf(){

        /*try{*/
            // Carga el contenido del partial
            /*$logo = file_get_contents('http://localhost/membresia/public/img/logo/logo_color_150px.png');
            $logo = base64_encode($logo);*/
            //$html = view('informes.registro', ['nombre' => 'Jeferson']);
            $html = view('welcome');
            // Obtiene en $html el contenido del búfer actual y elimina el búfer de salida actual
           //return view('informes.registro');
            //$pdf = PDF::loadView('informes.registro');


            // Crea una instancia de la clase y le pasa el direct   orio temporal
            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'format' => 'LETTER',
                'orientation' => 'L'
            ]);
            //$mpdf->WriteHTML('<img src="'.asset('img/logo/logo_color_150px.png').'" width="90" />');
            $mpdf->WriteHTML($html);
            $mpdf->AddPage('P');
            $mpdf->WriteHTML('<p>Hola</p>');
            $mpdf->Output();

            //return $pdf->stream('listado.pdf');
        /*}catch (\Exception $e){
            dd($e);
        }*/

    }

}
