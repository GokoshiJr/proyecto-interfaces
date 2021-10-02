<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
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

// Esta ruta nos direcciona a welcome.blade en la carpeta views
Route::get('/', function () {
    return view('welcome');
});

// Colocamos el nombre de la carpeta y un . para acceder a los archivos dentro
/* Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('/empleado/create', [EmpleadoController::class, 'create']); */

// Ya accedemos a todos los metodos de la clase EmpleadoControler
Route::resource('empleado', EmpleadoController::class);