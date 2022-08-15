<?php

namespace App\Http\Controllers;

// import http
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

    public function ins_reportes(){
        // $miData = $req->all();

        return "Hola";
    }


}
