<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarpetasController;
use App\Http\Controllers\MainController;

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

/********LOGIN*****/
Route::get('inicio', [AuthController::class, 'inicio'])->name('inicio');
Route::post('iniciar', [AuthController::class, 'iniciar'])->name('iniciar');
Route::get('registro', [AuthController::class, 'registro'])->name('registro');
Route::post('registrar', [AuthController::class, 'registrar'])->name('registrar');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    /****** MAIN    ***** */
    Route::get('/', [MainController::class, 'principal'])->name('principal');;
    Route::get('video', [MainController::class, 'video'])->name('video');
    Route::get('informacion', [MainController::class, 'informacion'])->name('informacion');
    Route::get('configuracion', [MainController::class, 'configuracion'])->name('configuracion');
    /************ CARPETAS  *******/
    Route::post('getCarpetas', [CarpetasController::class, 'getCarpetas'])->name('getCarpetas');
    Route::post('borrarCarpeta', [CarpetasController::class, 'borrarCarpeta'])->name('borrarCarpeta');
    Route::post('anadirCarpeta', [CarpetasController::class, 'anadirCarpeta'])->name('anadirCarpeta');
});
