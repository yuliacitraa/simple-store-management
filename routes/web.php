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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::prefix('product')->group(function () {
        Route::get('/', 'ProductsController@index')->name('product.index');
        Route::get('/add', 'ProductsController@create')->name('product.create');
        Route::post('/', 'ProductsController@store')->name('product.store');
        Route::get('/edit/{id}', 'ProductsController@edit')->name('product.edit');
        Route::put('/update/{id}', 'ProductsController@update')->name('product.update');
        Route::delete('/delete{id}', 'ProductsController@destroy')->name('product.destroy');
    });
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::prefix('purchase')->group(function () {
        Route::get('/', 'PurchaseTransactionController@index')->name('purchase.index');
        Route::get('/add', 'PurchaseTransactionController@create')->name('purchase.create');
        Route::post('/', 'PurchaseTransactionController@store')->name('purchase.store');
    });
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::prefix('sale')->group(function () {
        Route::get('/', 'SaleTransactionController@index')->name('sale.index');
        Route::get('/add', 'SaleTransactionController@create')->name('sale.create');
        Route::post('/', 'SaleTransactionController@store')->name('sale.store');
    });
});

Route::get('/report', [App\Http\Controllers\ReportController::class, 'stockReport'])->name('report');