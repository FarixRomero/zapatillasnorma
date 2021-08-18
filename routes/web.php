<?php

use GuzzleHttp\Middleware;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/zapatillas/search', [App\Http\Controllers\ZapatillaController::class, 'search'])->name('zapatillas.search');

Route::resource('zapatillas',  App\Http\Controllers\ZapatillaController::class) ;
Route::resource('ventas',  App\Http\Controllers\HistorialVentumController::class) ;
Route::resource('registro-venta',  App\Http\Controllers\RegistroVentaController::class) ;

Route::get('/zapatillas-registro/{id}', [App\Http\Controllers\ZapatillaController::class, 'editventa'])->name('zapatillas.venta');
Route::PATCH('/zapatillas-venta/{id}', [App\Http\Controllers\ZapatillaController::class, 'venta'])->name('zapatillas.ventapost');



// ->middleware('auth');