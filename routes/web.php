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


Route::get('/', function () {
    return view('welcome');
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

// Catalogo

Route::get('anexos/catalogo', AnexosCatalogoController::class);
