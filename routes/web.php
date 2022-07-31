<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportesController;

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


Route::get('reportes', [ReportesController::class, 'index_reportes'])->name('reportes');

Route::get('empresas', [ReportesController::class, 'index_empresas'])->name('empresas');



