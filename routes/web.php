<?php

use App\Http\Controllers\CarrosController;
use App\Http\Controllers\Controller_Carros;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



// Rotas para o Controller_Carros
Route::get('/', [CarrosController::class,'index'])->name('carros.index'); 
Route::post('/carros', [CarrosController::class,'store'])->name('carros.store');
Route::put('/carros/{carros}', [CarrosController::class,'update'])->name('carros.update');
Route::delete('/carros/{carros}', [CarrosController::class,'destroy'])->name('carros.destroy');








