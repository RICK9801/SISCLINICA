<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OdontologosController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\RecuperacionController;
use App\Http\Controllers\CitasController;

use Illuminate\Support\Facades\Password;

use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TratamientosController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\PerfilController;

// use App\Http\Controllers\Auth\ForgotPasswordController;
// use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('auth/password/reset', [PasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('auth/password/email', [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('auth/password/reset/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('auth/password/reset', [PasswordController::class, 'reset'])->name('password.update');



Route::get('auth/password/recuperacion', [RecuperacionController::class, 'recuperacion']);
Route::put('/panel/user/toggle-status/{id}', [UserController::class, 'toggleStatus'])->name('user.toggleStatus');

// Route::get('auth/contraseña/recuperacion', [RecuperacionController::class, 'recuperacion'])->name('rick');

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', action: [AuthController::class, 'auth_login']);



Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'useradmin'], function (){

Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);





     Route::get('panel/role', [RoleController::class, 'list']);
     Route::get('panel/role/add', [RoleController::class, 'add']);    
     Route::post('panel/role/add', [RoleController::class, 'insert']);
     Route::get('panel/role/edit/{id}', [RoleController::class, 'edit']);    
     Route::post('panel/role/edit/{id}', [RoleController::class, 'update']);    
     Route::get('panel/role/delete/{id}', [RoleController::class, 'delete']);

     Route::get('panel/user', [UserController::class, 'list']);
     Route::get('panel/user/add', [UserController::class, 'add']);    
     Route::post('panel/user/add', [UserController::class, 'insert']);
     Route::get('panel/user/edit/{id}', [UserController::class, 'edit']);    
     Route::post('panel/user/edit/{id}', [UserController::class, 'update']);    
     Route::get('panel/user/delete/{id}', [UserController::class, 'delete']);

     Route::get('panel/pacientes', [PacientesController::class, 'index']);
     Route::get('panel/pacientes/add', [PacientesController::class, 'create']);    
     Route::post('panel/pacientes/add', [PacientesController::class, 'store']);
     Route::get('panel/pacientes/edit/{id}', [PacientesController::class, 'edit']);    
     Route::post('panel/pacientes/edit/{id}', [PacientesController::class, 'update']);    
     Route::get('panel/pacientes/delete/{id}', [PacientesController::class, 'destroy']);

     Route::get('panel/odontologos', [OdontologosController::class, 'index']);
     Route::get('panel/odontologos/add', [OdontologosController::class, 'create']);    
     Route::post('panel/odontologos/add', [OdontologosController::class, 'store']);
     Route::get('panel/odontologos/edit/{id}', [OdontologosController::class, 'edit']);    
     Route::post('panel/odontologos/edit/{id}', [OdontologosController::class, 'update']);    
     Route::get('panel/odontologos/delete/{id}', [OdontologosController::class, 'destroy']);

     Route::get('panel/tratamientos', [TratamientosController::class, 'index']);
     Route::get('panel/tratamientos/add', [TratamientosController::class, 'create']);    
     Route::post('panel/tratamientos/add', [TratamientosController::class, 'store']);
     Route::get('panel/tratamientos/edit/{id}', [TratamientosController::class, 'edit']);    
     Route::post('panel/tratamientos/edit/{id}', [TratamientosController::class, 'update']);    
     Route::get('panel/tratamientos/delete/{id}', [TratamientosController::class, 'destroy']);

     Route::get('panel/servicios', [ServicioController::class, 'index']);
     Route::get('panel/servicios/add', [ServicioController::class, 'create']);    
     Route::post('panel/servicios/add', [ServicioController::class, 'store']);
     Route::get('panel/servicios/edit/{id}', [ServicioController::class, 'edit']);    
     Route::post('panel/servicios/edit/{id}', [ServicioController::class, 'update']);    
     Route::get('panel/servicios/delete/{id}', [ServicioController::class, 'destroy']);
     
     Route::get('panel/perfil', [PerfilController::class, 'index']);

     Route::get('panel/citas', [CitasController::class, 'index']);
     Route::get('panel/citas/add', [CitasController::class, 'create']);    
     Route::post('panel/citas/add', [CitasController::class, 'store']);
     Route::get('panel/citas/edit/{id}', [CitasController::class, 'edit']);    
     Route::post('panel/citas/edit/{id}', [CitasController::class, 'update']);    
     Route::get('panel/citas/delete/{id}', [CitasController::class, 'destroy']);


 });
