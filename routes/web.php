<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CounponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
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

// Trang người dùng

Route::get('/', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('client.home');

Route::get('product/{category_Id}', [ClientProductController::class, 'index'])->name('client.products.index');
Route::get('product-detail/{id}', [ClientProductController::class, 'show'])->name('client.products.show');

Auth::routes();

// Trang quan tri
Route::middleware('auth')->group(function () {
    Route::get('/dashboad', function () {
        return view('admin.dashboad.index');
    })->name('dashboard');

    // Trang phan quyen nguoi dung
    Route::resource('roles', RoleController::class);

    // Trang User
    Route::resource('users', UserController::class);

    // Trang category
    Route::resource('categories', CategoryController::class);

    // Trang Product
    Route::resource('products', ProductController::class);

    // Mã giảm giá
    Route::resource('coupons', CounponController::class);
});
