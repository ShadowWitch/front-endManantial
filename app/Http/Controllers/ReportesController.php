<?php

namespace App\Http\Controllers;

// import http
use Illuminate\Support\Facades\Http;

// import request
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function reportes_add(){
        /*
        $reportesDB = Http::get('http://localhost:3000/reportes');
        $reportesDB = $reportesDB["result"];

        return view('reportes.reportesadd', ['reportesDB' => $reportesDB]);
        */

        $paises = Http::get('http://localhost:3000/pais');
        $empresasDB = Http::get('http://localhost:3000/empresa');

        $paises = $paises["result"];
        $empresasDB = $empresasDB["result"];

        return view('empresas.empresasadd', ['paises' => $paises, 'empresasDB' => $empresasDB]);
        // return $reportesDB["result"];
    }
}



/*

 @foreach ($reportesDB as $reporte)
                <tr>
                    <td>{{ $reporte["titulo_reporte"] }}</td>
                    <td>{{ $reporte["desc_reporte"] }}</td>
                    <td>{{ $reporte["tiempo_generar_reporte"] }}</td>
                    <td>{{ $reporte["correo_electronico"] }}</td>
                    <td>{{ $reporte["hora_generar_reporte"] }}</td>
                    <td>{{ $reporte["tipo_reporte"] }}</td>
                    <td>{{ $reporte["fecha_historial_reporte"] }}</td>
                    <td>{{ $reporte["url_archivo"] }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" onclick="actualizar_empresa({{ $empresa['cod_empresa'] }})" data-bs-toggle="modal" data-bs-target="#modalEmpresasUpdate"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEmpresasUpdate"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            @endforeach

*/