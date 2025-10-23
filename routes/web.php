<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OdontologosController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecuperacionController;

use Illuminate\Support\Facades\Password;

use App\Http\Controllers\PasswordController;

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

    


 });
