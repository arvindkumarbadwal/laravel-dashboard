<?php

use App\Http\Controllers\LoginActivitiesController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;

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

Route::get('/set-password/{token}', [NewPasswordController::class, 'create'])->middleware(['guest'])->name('password.set');
Route::post('/set-password', [NewPasswordController::class, 'store'])->middleware(['guest'])->name('password.create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['verified']);

Route::middleware(['auth'])->group(function () {
    Route::get('/user/profile', function () {
        return view('profile');
    })->name('profile');

    Route::resource('roles', RolesController::class)->middleware('can:roles_manage');
    Route::resource('permissions', PermissionsController::class)->middleware('can:permissions_manage');
    Route::resource('users', UsersController::class)->middleware('can:users_manage');
    Route::resource('login-activities', LoginActivitiesController::class);
});
