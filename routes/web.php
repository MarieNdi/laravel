<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduisController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/produits', [ProduisController::class, 'index'])->name('produits.index');
Route::get('/produits/create', [ProduisController::class, 'create'])->name('produits.create');
Route::post('/produits', [ProduisController::class, 'store'])->name('produits.store');
Route::get('/produits/{produits}/edit', [ProduisController::class, 'edit'])->name('produits.edit');
Route::put('/produits/{produits}', [ProduisController::class, 'update'])->name('produits.update');
Route::delete('/produits/{produits}', [ProduisController::class, 'destroy'])->name('produits.destroy');


Route::get('/commande', [CommandeController::class, 'index'])->name('commande.index');
Route::get('/commande/create', [CommandeController::class, 'create'])->name('commande.create');
Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');
Route::get('/commande/{id}/edit', [CommandeController::class, 'edit'])->name('commande.edit');
Route::put('/commande/{id}', [CommandeController::class, 'update'])->name('commande.update');
Route::delete('/commande/{id}', [CommandeController::class, 'destroy'])->name('commande.destroy');
