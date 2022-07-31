<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index_reportes(){
        return view('reportes.reportes');
    }

    public function index_empresas(){
        return view('reportes.empresas');
    }
}
