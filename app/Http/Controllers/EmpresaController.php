<?php

namespace App\Http\Controllers;

// import http
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function empresas_show(){
        return view('empresas.empresas');
    }

    public function empresas_add(){
        $paises = Http::get('http://localhost:3000/pais/');
        $paises = $paises["result"];

       
        return view('empresas.empresasadd', ['paises' => $paises]);
    }

}
