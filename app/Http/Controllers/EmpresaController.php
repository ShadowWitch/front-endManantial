<?php

namespace App\Http\Controllers;

// import http
use Illuminate\Support\Facades\Http;

// import request
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    // Mostrar UI Empresas
    public function empresas_add(){
        $paises = Http::get('http://localhost:3000/pais');
        $empresasDB = Http::get('http://localhost:3000/empresa');

        $paises = $paises["result"];
        $empresasDB = $empresasDB["result"];

        return view('empresas.empresasadd', ['paises' => $paises, 'empresasDB' => $empresasDB]);
    }

    // Mostrar Empresas para actualizarlas luego
    public function empresas_show($id_empresa){
        $empresasDB = Http::get("http://localhost:3000/empresa/$id_empresa");
        $empresasDB = $empresasDB["result"];

        return $empresasDB;

        // return view('empresas.empresasadd', ['empresasDB' => $empresasDB]);
    }

    // Traer Deptos Por Pais
    public function getDeptos_x_pais($cod_pais){
        $deptos = Http::get("http://localhost:3000/depto/pais/$cod_pais");

        return $deptos;
    }

    // Traer Municipios por Depto
    public function getMunicipios_x_depto($cod_depto){
        $municipios = Http::get("http://localhost:3000/municipio/$cod_depto");

        return $municipios;
    }

    // Agregar Empresas
    public function ins_empresas(Request $req){
        $miData = $req->all();

        $res = Http::post("http://localhost:3000/empresa", $miData);

        if(!$res["ok"] == 1){
            return view("error.error");
        }
        return redirect(route('controlpanel_empresas_add'));
    }


    // Actualizar Empresa
    public function upt_empresas(Request $req, $id_empresa){
        $miData = $req->all();
        return $id_empresa;
        return $miData;

        $res = Http::put("http://localhost:3000/empresa/$id_empresa", $miData);

        if(!$res["ok"] == 1){
            return view("error.error");
        }
        return redirect(route('controlpanel_empresas_add'));
    }

}
