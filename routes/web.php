<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/medicos', [App\Http\Controllers\MedicosController::class, 'index'])->name('medicos');

Route::get('/medicos-create', [App\Http\Controllers\MedicosController::class, 'create'])->name('create');

Route::post('/store', [App\Http\Controllers\MedicosController::class, 'store'])->name('medicos.store');

Route::get('/show/{id}', [App\Http\Controllers\MedicosController::class, 'show'])->name('show');

Route::get('/edit/{id}', [App\Http\Controllers\MedicosController::class, 'edit'])->name('medicos.edit');

Route::put('edit/{id}', [App\Http\Controllers\MedicosController::class, 'update'])->name('update'); 

Route::get('/pacientes', [App\Http\Controllers\PacientesController::class, 'index'])->name('pacientes');

Route::get('/paciente-create', [App\Http\Controllers\PacientesController::class, 'create'])->name('paciente-create');

Route::post('/paciente-store', [App\Http\Controllers\PacientesController::class, 'store'])->name('paciente-store');

Route::get('/paciente-show/{id}', [App\Http\Controllers\PacientesController::class, 'show'])->name('paciente-show');

Route::get('/paciente-edit/{id}', [App\Http\Controllers\PacientesController::class, 'edit'])->name('paciente-edit');

Route::put('paciente-update/{id}', [App\Http\Controllers\PacientesController::class, 'update'])->name('paciente-update'); 

Route::post('paciente-delete/{id}', [App\Http\Controllers\PacientesController::class, 'destroy'])->name('paciente-delete');

Route::get('/agendamentos', [App\Http\Controllers\AgendamentosController::class, 'index'])->name('agendamentos');

Route::get('/agendamento-create', [App\Http\Controllers\AgendamentosController::class, 'create'])->name('agendamento-create');

Route::post('/agendamento-store', [App\Http\Controllers\AgendamentosController::class, 'store'])->name('agendamento-store');

Route::get('/agendamento-show/{id}', [App\Http\Controllers\AgendamentosController::class, 'show'])->name('agendamento-show');

Route::get('/agendamento-edit/{id}', [App\Http\Controllers\AgendamentosController::class, 'edit'])->name('agendamento-edit');

Route::put('agendamento-update/{id}', [App\Http\Controllers\AgendamentosController::class, 'update'])->name('agendamento-update');


Route::get('/medicos_dados', [App\Http\Controllers\MedicosController::class, 'dados'])->name('medicos_dados');

Auth::routes();
