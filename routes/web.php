<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudSoporteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\AusenciasController;
use App\Exports\EquiposExport;
use App\Exports\AusenciasExport;
use App\Exports\PrestamosExport;
use App\Imports\PrestamosImport;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas para dashboard y solicitudes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/solicitudes', [SolicitudSoporteController::class, 'index'])->name('solicitudes');


// Rutas para perfil de usuario, protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para Solicitudes (accesibles por todos los usuarios autenticados)
Route::middleware(['auth'])->prefix('solicitudes')->name('solicitudes.')->group(function () {
    Route::get('/', [SolicitudSoporteController::class, 'index'])->name('index'); 
    Route::get('/crear', [SolicitudSoporteController::class, 'create'])->name('create'); 
    Route::get('/exportar-pdf', [SolicitudSoporteController::class, 'exportarPDF'])->name('exportarPDF');
    Route::post('/', [SolicitudSoporteController::class, 'store'])->name('store');
    Route::get('/{id}/editar', [SolicitudSoporteController::class, 'edit'])->name('edit');
    Route::put('/{id}', [SolicitudSoporteController::class, 'update'])->name('update');
    Route::delete('/{id}', [SolicitudSoporteController::class, 'destroy'])->name('destroy');
});

// Rutas para Equipos (protegidas por autenticación y rol de administrador)
Route::middleware(['auth'])->prefix('equipos')->name('equipos.')->group(function () {
    Route::get('/', [EquipoController::class, 'index'])->name('index');
    Route::get('create', [EquipoController::class, 'create'])->name('create');
    Route::post('/', [EquipoController::class, 'store'])->name('store');
    Route::delete('/equipos/{placa}', [EquipoController::class, 'destroy'])->name('destroy');
    Route::get('import', [EquipoController::class, 'import'])->name('import');
    Route::post('import', [EquipoController::class, 'importStore'])->name('importStore');
    Route::get('/export-equipos', fn() => Excel::download(new EquiposExport, 'equipos.xlsx'))->name('export');
});

// Rutas para Prestamos (protegidas por autenticación y rol de administrador)
Route::middleware(['auth'])->prefix('prestamos')->name('prestamos.')->group(function () {
    Route::get('/', [PrestamoController::class, 'index'])->name('index');
    Route::get('/create', [PrestamoController::class, 'create'])->name('create');
    Route::post('/', [PrestamoController::class, 'store'])->name('store');
    Route::get('{prestamo}/edit', [PrestamoController::class, 'edit'])->name('edit');
    Route::put('{prestamo}', [PrestamoController::class, 'update'])->name('update');
    Route::delete('{prestamo}', [PrestamoController::class, 'destroy'])->name('destroy');
    Route::get('/importar', [PrestamoController::class, 'importForm'])->name('importForm');
    Route::post('/importar', [PrestamoController::class, 'import'])->name('import');
    Route::post('{prestamo}/devolver', [PrestamoController::class, 'devolver'])->name('devolver');
    Route::get('/export', fn() => Excel::download(new PrestamosExport, 'prestamos.xlsx'))->name('export');
});

// Rutas para Ausencias (protegidas por autenticación y rol de administrador)
Route::middleware(['auth'])->prefix('ausencias')->name('ausencias.')->group(function () {
    Route::get('/', [AusenciasController::class, 'index'])->name('index');
    Route::get('/crear', [AusenciasController::class, 'create'])->name('create');
    Route::post('/', [AusenciasController::class, 'store'])->name('store');
    Route::get('/{id}/editar', [AusenciasController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AusenciasController::class, 'update'])->name('update');
    Route::delete('/{id}', [AusenciasController::class, 'destroy'])->name('destroy');
    Route::get('/exportar', [AusenciasController::class, 'exportarAusencias'])->name('exportar');
    Route::get('/export-ausencias', fn() => Excel::download(new AusenciasExport, 'ausencias.xlsx'))->name('export');
});

// Rutas de autenticación
require __DIR__.'/auth.php';
