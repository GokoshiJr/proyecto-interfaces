<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserMessageController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

// Registramos los metodos de las rutas y protegemos con middleware si es necesario
Route::resource('message', UserMessageController::class);
Route::resource('user', UserController::class)->middleware(['auth', 'access']);
Route::resource('admin', AdminController::class)->middleware(['auth', 'admin']);
Route::resource('programa', ProgramaController::class)->middleware(['auth', 'access']);

// desactivamos el registro y el olvide clave
Auth::routes(['register'=>true,'reset'=>false]);

/* Public Routes */

Route::get('/gallery', [GalleryController::class, 'index']);

Route::get('/dev_program/{id}', [GalleryController::class, 'dev_program']);

Route::put('/dev/{id}', [GalleryController::class, 'dev']);

Route::post('/registro', [UserRegisterController::class, 'store']);

Route::get('/dev/{id}', function() {
    return redirect('home');
});

Route::get('/home', function () {    
    return view('layouts.master');
});

Route::get('/', function() {
    return view('layouts.master');
});

Route::get('/contact', function() {
    return view('layouts.master');
});

/* Auth Routes */

// Normal user
Route::group(['middleware' => ['auth', 'access']], function() {
    Route::get('/profile', function() {   return view('layouts.master'); });
    Route::get('/getUserIdProfile', [UserController::class, 'getUserIdProfile']);
    Route::patch('/updateUser/{id}', [UserController::class, 'updateUser']);
    Route::get('/', function() {     return redirect('/dashboard'); });
    Route::get('/dashboard', function() { return view('layouts.master'); });
});

// Admin
Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/', [AdminController::class, 'index'])->name('home-admin');
    Route::get('/messages', function() {   return view('layouts.master'); });
    Route::get('/users', function() {     return view('layouts.master'); });
});