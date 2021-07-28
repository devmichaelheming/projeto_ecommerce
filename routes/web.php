<?php

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
// Auth::routes();

// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

// Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Registration Routes...
// Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('/register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('index.login');

Route::post('/login/save', [App\Http\Controllers\LoginController::class, 'save'])->name('save.login');

Route::get('/register', [App\Http\Controllers\LoginController::class, 'register'])->name('index.register');

Route::post('/register/save', [App\Http\Controllers\LoginController::class, 'register_save'])->name('save.register');

Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout.login');

Route::get('/avatar/{id}', [App\Http\Controllers\LoginController::class, 'editarAvatar'])->name('avatar.editar');
Route::post('/avatar/editar/{id}', [App\Http\Controllers\LoginController::class, 'avatar'])->name('avatar.save');

// LOGIN PELO FACEBOOK

Route::get('/login/facebook', [App\Http\Controllers\SocialiteController::class, 'redirectToProvider_facebook'])->name('login.facebook');

Route::get('/login/facebook/callback', [App\Http\Controllers\SocialiteController::class, 'handleProviderCallback_facebook']);

// LOGIN PELO GOOGLE

Route::get('/login/google', [App\Http\Controllers\SocialiteController::class, 'redirectToProvider'])->name('login.google');

Route::get('/login/google/callback', [App\Http\Controllers\SocialiteController::class, 'handleProviderCallback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// PÁGINA DO CLIENTE

Route::get('/page/clientes', [App\Http\Controllers\clientes\pageClientesController::class, 'index'])->name('page.clientes')->middleware('clientes');

// ENDEREÇO

Route::get('/page/clientes/endereco', [App\Http\Controllers\clientes\endereco\enderecoController::class, 'index'])->name('endereco.index')->middleware('clientes');

Route::get('/page/clientes/endereco/cadastrar', [App\Http\Controllers\clientes\endereco\enderecoController::class, 'cadastrar'])->name('endereco.cadastrar')->middleware('clientes');

Route::post('/page/clientes/endereco/cadastrar/save', [App\Http\Controllers\clientes\endereco\enderecoController::class, 'cadastrarSalvar'])->name('endereco.cadastrarSalvar')->middleware('clientes');

Route::get('/page/clientes/endereco/editar/{id}', [App\Http\Controllers\clientes\endereco\enderecoController::class, 'editar'])->name('endereco.editar')->middleware('clientes');

Route::post('/page/clientes/endereco/editar/save/{id}', [App\Http\Controllers\clientes\endereco\enderecoController::class, 'editarSalvar'])->name('endereco.editarSalvar')->middleware('clientes');

Route::get('/page/clientes/endereco/confirm/{id}', [App\Http\Controllers\clientes\endereco\enderecoController::class, 'confirm'])->name('endereco.confirm')->middleware('clientes');

Route::get('/page/clientes/endereco/remover/{id}', [App\Http\Controllers\clientes\endereco\enderecoController::class, 'remover'])->name('endereco.remover')->middleware('clientes');

Route::prefix('/admin')->group(function () {

    Route::get('/', [App\Http\Controllers\admin\adminController::class, 'index'])->name('admin');
    // Route::get('/', [App\Http\Controllers\admin\adminController::class, 'index'])->name('admin');
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    // Registration Routes...
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

    // Password Reset Routes...
    Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset']);

    // Route::get('/home', [App\Http\Controllers\admin\adminController::class, 'home'])->name('admin.home');

    // USUARIOS
    Route::get('/usuarios', [App\Http\Controllers\admin\UsuariosController::class, 'index'])->name('admin.usuarios');

    Route::get('/usuarios/viewCadastrar', [App\Http\Controllers\admin\UsuariosController::class, 'viewCadastrar'])->name('usuarios.viewCadastrar');
    Route::post('/usuarios/cadastrar', [App\Http\Controllers\admin\UsuariosController::class, 'cadastrar'])->name('usuarios.cadastrar');

    Route::get('/usuarios/editar/{id}', [App\Http\Controllers\admin\UsuariosController::class, 'editar'])->name('usuarios.editar');
    Route::post('/usuarios/editar/save/{id}', [App\Http\Controllers\admin\UsuariosController::class, 'editarSalvar'])->name('usuarios.editarSalvar');

    Route::get('/usuarios/confirm/{id}', [App\Http\Controllers\admin\UsuariosController::class, 'confirm'])->name('usuarios.confirm');
    Route::get('/usuarios/remover/{id}', [App\Http\Controllers\admin\UsuariosController::class, 'remover'])->name('usuarios.remover');
});