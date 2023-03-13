<?php

use App\Http\Controllers\{
    DashboardController,
    CategoryController,
    ProductController
};
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
    return view('welcome');
});

Route::group([
    'middleware' => ['auth', 'role:admin,user']
], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group([
        'middleware' => 'role:admin'
    ], function () {

        // route categories
        Route::get('/category/data', [CategoryController::class, 'data'])->name('category.data');
        Route::resource('/category', CategoryController::class);
        Route::put('/category/{category}/update_status', [CategoryController::class, 'updateStatus'])->name('category.update_status');
        Route::get('ajax/categories/search', [CategoryController::class, 'categorySearch'])->name('category.search');

        // route products
        Route::get('/products/data', [ProductController::class, 'data'])->name('products.data');
        Route::resource('/products', ProductController::class);
        Route::get('products/export/excel', [ProductController::class, 'exportExcel'])->name('products.export.excel');
        Route::get('products/export/pdf', [ProductController::class, 'exportPDF'])->name('products.export.pdf');
    });
});
