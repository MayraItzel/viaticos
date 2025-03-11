<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ViaticosController;
use App\Http\Controllers\SolicitudViaticosController;

Route::match(['get', 'post'], '/solicitud/pdf', [SolicitudViaticosController::class, 'generarPDF'])->name('solicitud.pdf');



// Rutas de autenticación
Auth::routes();  // Esto habilita las rutas para login y registro automáticamente

// Redirige a la página de login si el usuario no está autenticado
Route::get('/', function () {
    return redirect('/login');
});

// Ruta para el dashboard, protegida por autenticación

Route::middleware(['auth'])->get('/viaticos/create', [ViaticosController::class, 'create'])->name('viaticos.create');
Route::middleware(['auth'])->post('/viaticos', [ViaticosController::class, 'store'])->name('viaticos.store');

// Rutas para la creación de viáticos, protegidas por autenticación
Route::middleware(['auth'])->get('/viaticos/create', [ViaticosController::class, 'create'])->name('viaticos.create');
Route::middleware(['auth'])->post('/viaticos', [ViaticosController::class, 'store'])->name('viaticos.store');

// Ruta para el logout (si no usas Auth::routes())
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 
