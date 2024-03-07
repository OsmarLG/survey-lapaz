<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\MunicipioController;
use App\Models\Encuesta;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//INICIO
Route::get('/', HomeController::class)->name('home');
//**** */

// AUTH
    //LOGIN
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    //LOGOUT
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//

// ADMIN
    //DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //USUARIOS
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');

    //ESTADOS
    Route::get('/estados', [EstadoController::class, 'index'])->name('estados');

    //MUNICIPIOS
    Route::get('/municipios', [MunicipioController::class, 'index'])->name('municipios');

    //ENCUESTAS
    Route::get('/encuestas', [EncuestaController::class, 'mostrar'])->name('encuestas');
    Route::get('/encuestas/mapa', [EncuestaController::class, 'mostrar_mapa'])->name('encuestas.mapa');
//
    
// ENCUESTAS
    //OBTENER ENCUESTAS (EL USUARIO)
    Route::get('/{username}', [EncuestaController::class, 'index'])->name('encuestas.index');

    //VISTA PARA CREAR ENCUESTA
    Route::get('/encuestas/create', [EncuestaController::class, 'create'])->name('encuestas.create');

    //METODO PARA GUARDAR ENCUESTA POST
    Route::post('/encuestas', [EncuestaController::class, 'store'])->name('encuestas.store');

    //MOSTRAR ENCUESTA EN ESPESIFICO
    Route::get('/{username}/encuesta/{encuesta_id}', [EncuestaController::class, 'show'])->name('encuestas.show');

    //BORRAR ENCUESTA
    Route::delete('/encuesta/{$encuesta', [EncuestaController::class, 'destroy'])->name('encuestas.destroy');

    //MOSTRAR ENCUESTA
    Route::get('/encuestas/{id}', [EncuestaController::class, 'encuestas'])->name('encuestas.encuesta');
//