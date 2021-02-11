<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'reset'=>false,
    'confirm' => false,
    'verify' => false,
]);

Route::resource('users', UserController::class, [
    'except' => ['create', 'store', 'destroy'],
]);

Route::get('/admin/index', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/ban/{user}', [\App\Http\Controllers\AdminController::class, 'ban'])->name('admin.ban');
Route::get('/admin/unban/{user}', [\App\Http\Controllers\AdminController::class, 'revoke'])->name('admin.unban');
Route::get('/admin/is-admin/{user}', [\App\Http\Controllers\AdminController::class, 'makeAdmin'])->name('admin.is-admin');

