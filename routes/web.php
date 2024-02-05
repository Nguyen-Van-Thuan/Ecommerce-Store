<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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
// Trang quan tri
Route::get('/dashboad', function () {
    return view('admin.dashboad.index');
})->name('dashboard');

// HomePage
Route::get('/home', function () {
    return view('client.layouts.app');
});

// Trang phan quyen nguoi dung
Route::resource('roles', RoleController::class);

// Trang User
Route::resource('users', UserController::class);

// Auth::routes();
