<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    return view('auth.login');
    
});
Route::get('/home', function() {
    return redirect('/');
});

// Colocamos el nombre de la carpeta y un . para acceder a los archivos dentro
/* Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('/empleado/create', [EmpleadoController::class, 'create']); */

// Ya accedemos a todos los metodos de la clase EmpleadoControler
Route::resource('empleado', EmpleadoController::class)->middleware(['auth', 'access']); // auth, para respetar la autenticacion y no crear empleados sin logearme
Route::resource('admin', AdminController::class)->middleware(['auth', 'admin']);

// desactivamos el registro y el olvide clave
/* Auth::routes(['register'=>false,'reset'=>false]); */
Auth::routes(['register'=>true,'reset'=>false]);

// Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'access']], function(){
    /* Route::get('/home', [EmpleadoController::class, 'index'])->name('home'); */
    Route::get('/', [EmpleadoController::class, 'index'])->name('home-empleado');
});

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/', [AdminController::class, 'index'])->name('home-admin');
});

/* Route::get('/home', function() {
    return view('auth.login');
}); */
Route::get('prueba', function(){
    return view('home');
});
Route::post('/test', function(Request $request){
    return $request;
});

// testeo de peticiones desde vue a laravel 
Route::put('/empleado', [EmpleadoController::class, 'post_store']);
