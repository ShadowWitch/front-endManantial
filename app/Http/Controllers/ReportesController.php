<?php

namespace App\Http\Controllers;

// import http

use Facade\Ignition\Http\Controllers\ScriptController;
use Faker\Core\File;
use Illuminate\Support\Facades\Http;

// import request
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ReportesController extends Controller
{
    public function reportes_add(){
        $reportesDB = Http::get('http://localhost:3000/reportes');
        $reportesDB = $reportesDB["result"];

        return view('reportes.reportesadd', ['reportesDB' => $reportesDB]);
    }

    public function ins_reportes(Request $req){
        $datos = $req->all();
        $archi = $_FILES;
        dd($archi);
        // $response = Http::post('http://localhost:3000/reportes', $datos);


        $file = $_FILES['mi_archivo']['name'];
        $dir_subida = getcwd().'/';
        $fichero_subido = $dir_subida.basename($file);

        $tipoImg = $_FILES['mi_archivo']['type'];
        $nameImg = $_FILES['mi_archivo']['name'];
        $sizeImg = $_FILES['mi_archivo']['size'];

        if(move_uploaded_file($_FILES['mi_archivo']['tmp_name'], $fichero_subido)){
            echo 'Fichero subido\n';
        }else{
            echo 'No se subio el fichero\n';
        }

        
        // set post fields
        $post = [
            'username' => 'user1',
            'password' => 'passuser1',
            'gender'   => 1,
            'mi_archivo' => $archi
        ];
        
        $ch = curl_init('http://localhost:3000/reportes');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        // execute!
        $response = curl_exec($ch);

        // close the connection, release resources used
        curl_close($ch);

        // do anything you want with your response
        var_dump($response);


        return $response;
    }

}
