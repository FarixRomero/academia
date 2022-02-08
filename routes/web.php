<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CursoHorarioController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\SesioneController;
use App\Models\CursoHorario;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('cursos', CursoController::class);
Route::resource('horarios', HorarioController::class);
Route::resource('curso-horarios', CursoHorarioController::class);

Route::resource('sesiones', SesioneController::class);
Route::get('curso-horarios/sesiones/{id}', [SesioneController::class, 'indexByCursoHorario'])->name('sesion.indexByCursoHorario');
Route::get('curso-horarios/{id}/sesiones/detail', [SesioneController::class, 'detailByCursoHorario'])->name('sesion.detailByCursoHorario');
Route::get('sesiones/{id}/files', [FileController::class, 'indexBySesion'])->name('file.indexBySesion');
Route::post('sesiones/files/create/', [FileController::class, 'storeApi'])->name('file.storeApi');

Route::resource('files', FileController::class);

Route::get('sesion/detail',[ SesioneController::class,'detail']);
Route::get('sesion/detail/{id}',[ SesioneController::class,'detailById'])->name('sesiones.detailById');