<?php

use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\RespuestasSondeosController;
use App\Http\Controllers\SondeosController;
use App\Http\Controllers\UsersController;
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
    return view('index');
});


Route::get('/admin/login', [AdministradoresController::class, 'login'])->name('admin.login');
route::get('/admin/validate', [AdministradoresController::class, 'loginAdmin'])->name('admin_validate_info');
route::get('/admin/paneladmin', [AdministradoresController::class, 'indexAdmin'])->name('index.Admin');
Route::delete('/admin/eliminar_usuario/{id}', [UsersController::class, 'deleteUser'])->name('admin.Delete_user');
Route::get('/user/signup', [UsersController::class, 'userSign'])->name('user.sign_view');
route::post('/user/save_user', [UsersController::class, 'saveUser'])->name('user.save_user');
route::get('/user/login', [UsersController::class, 'userLogin'])->name('user.login_view')->middleware('guest');
route::post('/user/validate_user', [UsersController::class, 'login'])->name('authuser_route')->middleware('guest');
route::get('/user/index_user', [UsersController::class, 'index_user'])->name('index.User')->middleware('auth');
route::get('/user/_logout', [UsersController::class, 'logout'])->name('user.logout');
route::get('/sondeos/crear_sondeo', [SondeosController::class, 'crear_sondeo'])->name('crear_sondeo_route');
route::post('/sondeo/salvar_sondeo', [SondeosController::class, 'salvar_sondeo'])->name('salvar_sondeo_route');
route::delete('/sondeos/eliminar_Sondeo/{id}', [SondeosController::class, 'eliminar_sondeo'])->name('eliminar_sondeo_route');
route::post('/sondeos/ver_respuestas/{id}', [SondeosController::class, 'ver_respuestas'])->name('ver_rtas_view');
route::post('/sondeo/responder_sondeo/{id}/{usuario}', [RespuestasSondeosController::class, 'responder'])->name('responderSondeo_view');
route::post('/sondeo/crear_respuesta/{id}/{usuario}', [RespuestasSondeosController::class, 'crear_respuesta'])->name('sondeo_salvar_rta');
