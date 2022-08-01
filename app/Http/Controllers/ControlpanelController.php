<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlpanelController extends Controller
{
    public function index_panel(){
        return view('panel.controlpanel');
    }

}
