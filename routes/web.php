<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\RadicacionesController;
use App\Http\Livewire\ActuacionesController;
use App\Http\Livewire\HistorialesController;
use App\Http\Livewire\MemorialesController;
use App\Http\Livewire\EstadisticasController;
use App\Http\Livewire\UsuariosController;
use App\Http\Livewire\RolesController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\AnexosCatalogoController;
use App\Http\Livewire\DecisionesCatalogoController;
use App\Http\Livewire\DepartamentosCatalogoController;
use App\Http\Livewire\EntidadesCatalogoController;
use App\Http\Livewire\JuzgadosCatalogoController;
use App\Http\Livewire\ProcesosCatalogoController;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Demandas  

Route::get('demandas', RadicacionesController::class);

// Actuaciones

Route::get('actuaciones', ActuacionesController::class);

// Historiales 

Route::get('historiales', HistorialesController::class);

// Memoriales 

Route::get('memoriales', MemorialesController::class);

// Estadisticas 

Route::get('estadisticas', EstadisticasController::class);

// Usuarios 

Route::get('usuarios', UsuariosController::class);

// Roles 

Route::get('roles', RolesController::class);

// Permisos 

Route::get('permisos', PermisosController::class);

// Catalogos
Route::get('anexos/catalogo', AnexosCatalogoController::class);
Route::get('decisiones/catalogo', DecisionesCatalogoController::class);
Route::get('departamentos/catalogo', DepartamentosCatalogoController::class);
Route::get('entidades/catalogo', EntidadesCatalogoController::class);
Route::get('juzgados/catalogo', JuzgadosCatalogoController::class);
Route::get('procesos/catalogo', ProcesosCatalogoController::class);
