<?php

namespace App\Http\Controllers;

// import http

use Facade\Ignition\Http\Controllers\ScriptController;
use Illuminate\Support\Facades\Http;

// import request
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function reportes_add(){
        $reportesDB = Http::get('http://localhost:3000/reportes');
        $reportesDB = $reportesDB["result"];

        return view('reportes.reportesadd', ['reportesDB' => $reportesDB]);
    }

    public function ins_reportes(Request $req){
        $datos = $req->all();
      
        // $response = Http::asForm()->post('http://localhost:3000/reportes', [
        //     'titulo_reporte' => $req->input('titulo_reporte'),
        //     'desc_reporte' => $req->input('desc_reporte'),
        //     'correo_electronico' => $req->input('correo_electronico'),
        //     'hora_generar_reporte' => $req->input('hora_generar_reporte'),
        //     'tipo_reporte' => $req->input('tipo_reporte'),
        //     'ind_reporte' => $req->input('ind_reporte'),
        //     'tiempo_generar_reporte' => $req->input('tiempo_generar_reporte'),
        //     'mi_archivo' => $req->input('mi_archivo')
        // ]);


        $response = Http::post('http://localhost:3000/reportes', $datos);

        return $response;

    }

}
