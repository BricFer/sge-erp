<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Clientes\Crear;
use App\Livewire\Clientes\Listar;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', Listar::class)->name('cliente.home');

Route::get('/cliente/crear', [ClienteController::class, 'create'])-> name('cliente.crear');
Route::post('/cliente/guardar',[ClienteController::class, 'store'])-> name('cliente.store');

Route::get('/note/edit/{cliente}',[ClienteController::class,'edit'])->name('cliente.edit');
Route::put('/note/update/{cliente}',[ClienteController::class, 'update'])-> name('cliente.update');

Route::delete('note/destroy/{cliente}',[ClienteController::class, 'destroy'])->name('cliente.destroy');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
