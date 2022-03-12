<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CursoHorarioController;
use App\Http\Controllers\CursoUserController;
use App\Http\Controllers\ExameneController;
use App\Http\Controllers\ExameneUserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\SesioneController;
use App\Http\Controllers\UserController;
use App\Models\CursoHorario;
use App\Models\CursoUser;
use App\Models\ExameneUser;

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
Route::resource('examenes', ExameneController::class);
Route::resource('examene-users', ExameneUserController::class);
Route::resource('curso-users', CursoUserController::class);


Route::get('cursos/{id}/sesiones', [SesioneController::class, 'indexByCurso'])->name('sesion.indexByCurso');
Route::get('cursos/{id}/sesiones/detail', [SesioneController::class, 'detailByCurso'])->name('sesion.detailByCurso');
Route::get('cursos/{idCursoHorario}/sesiones/{id}/files', [FileController::class, 'indexBySesion'])->name('file.indexBySesion');
Route::get('cursos/{idCursoHorario}/sesiones/{id}/examenes', [ExameneController::class, 'indexBySesion'])->name('examenes.indexBySesion');
Route::post('sesiones/files/create/', [FileController::class, 'storeApi'])->name('file.storeApi');

Route::resource('files', FileController::class);

Route::get('sesion/detail',[ SesioneController::class,'detail']);
Route::get('sesion/detail/{id}',[ SesioneController::class,'detailById'])->name('sesiones.detailById');

//admin
Route::resource('users', UserController::class);


//student
Route::get('cursos/{id}/detail',[ SesioneController::class,'detailStudent'])->name('student.curso.detail');
Route::get('cursos/{idCurso}/examen/{idExam}',[ ExameneController::class,'showStudent'])->name('student.examen.show');
Route::put('examen/update/{idExam}',[ ExameneController::class,'updateStudent'])->name('student.examen.update');

//teacher

Route::get('cursos/{id}/examene-users',[ ExameneUserController::class,'indexByCurso'])->name('teacher.examenes.indexByCurso');
