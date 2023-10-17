<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
Auth::routes(['register' => false]);


Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'ShowLoginForm']);

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

        Route::resource('/role', App\Http\Controllers\Admin\RoleController::class, ['except' => ['show'], 'as' => 'admin']);

        Route::resource('/category', App\Http\Controllers\Admin\KategoriController::class, ['except' => 'show', 'as' => 'admin', 'parameters' => ['category' => 'kategoriproduk']]);

        Route::resource('/supplier', App\Http\Controllers\Admin\SupplierController::class, ['except' => ['show'], 'as' => 'admin']);

        Route::resource('/user', App\Http\Controllers\Admin\UserController::class, ['except' => ['show'], 'as' => 'admin']);

        Route::resource('/produk', App\Http\Controllers\Admin\ProdukController::class, ['except' => ['show'], 'as' => 'admin']);
        Route::get('/generate-produkpdf', [App\Http\Controllers\Admin\ProdukController::class, 'generatePDF'])->name('admin.generate.produkpdf');

        Route::resource('/stock', App\Http\Controllers\Admin\StockController::class, ['except' => ['show'], 'as' => 'admin']);

        Route::resource('/customer', App\Http\Controllers\Admin\CustomerController::class, ['except' => ['show'], 'as' => 'admin']);

        Route::resource('/report', App\Http\Controllers\Admin\ReportController::class, ['except' => ['show'], 'as' => 'admin']);
        Route::post('/generate-report', [App\Http\Controllers\Admin\ReportController::class, 'generateReport'])->name('admin.generate.report');
        Route::get('/generate-pdf/{start_date}/{end_date}', [App\Http\Controllers\Admin\ReportController::class, 'generatePDF'])->name('admin.generate.pdf');
    });
});
