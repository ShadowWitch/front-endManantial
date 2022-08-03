<?php

namespace App\Http\Controllers;

// import http
use Illuminate\Support\Facades\Http;

// import request
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function empresas_show(){
        return view('empresas.empresas');
    }

    // Mostrar UI Empresas
    public function empresas_add(){
        $paises = Http::get('http://localhost:3000/pais/');
        $paises = $paises["result"];

        return view('empresas.empresasadd', ['paises' => $paises]);
    }

    public function getDeptos_x_pais($cod_pais){
        $deptos = Http::get("http://localhost:3000/depto/pais/$cod_pais");

        return $deptos;
    }

    public function ins_empresas(Request $req){
        $nom_empresa = $req->input('nom_empresa');
        $tip_empresa = $req->input('tip_empresa');
        $num_telefono = $req->input('num_telefono');
        $tip_telefono = $req->input('tip_telefono');
        $cod_municipio = $req->input('cod_municipio');
        $desc_direccion = $req->input('desc_direccion');

        $miData = array(
            "desc_direccion"=>$desc_direccion,
            "cod_municipio"=>$cod_municipio,
            "num_telefono"=>$num_telefono,
            "tip_telefono"=>$tip_telefono,
            "nom_empresa"=>$nom_empresa,
            "tip_empresa"=>$tip_empresa
        );


        $res = Http::post("http://localhost:3000/empresa", $miData);
        return redirect(route('controlpanel_empresas_add'));
    }


    public function getMunicipios_x_depto($cod_depto){
        $municipios = Http::get("http://localhost:3000/municipio/$cod_depto");

        return $municipios;
    }


}
