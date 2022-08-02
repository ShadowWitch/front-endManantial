<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\ControlpanelController;
use App\Http\Controllers\EmpresaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('usuarios.login');
});

Route::get('control-panel', [ControlpanelController::class, 'index_panel'])->name('control_panel');

Route::get('control-panel/dados', [ControlpanelController::class, 'tirar_dados'])->name('tirar_dados');



Route::controller(EmpresaController::class)->group(function(){
    Route::get('control-panel/empresas-add', 'empresas_add')->name('controlpanel_empresas_add');
    Route::get('control-panel/empresas-show',)->name('controlpanel_empresas_show');
    Route::get('control-panel/empresas-upt',)->name('controlpanel_empresas_upt');
});


// Route::get('cursos', 'index_cursos')->name('cursos.index');
// Route::get('cursos/create', 'create_cursos')->name('cursos.create');
// Route::get('cursos/{curso}', 'show_cursos')->name('cursos.show');



// Route::get('empresas', [ReportesController::class, 'index_empresas'])->name('empresas');



