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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/book', [App\Http\Controllers\HomeController::class, 'book'])->name('book');
Route::get('/book{book}', [App\Http\Controllers\HomeController::class, 'getBook'])->name('get.book');

// basket routes
Route::get('/baskets/{user}', [App\Http\Controllers\BasketController::class, 'getBasket'])->name('getBasket');
Route::get('/basket/{book}/{user}', [App\Http\Controllers\BasketController::class, 'addBasket'])->name('basket.add');
Route::delete('/basket/{basket}/{user}', [App\Http\Controllers\BasketController::class, 'destroy'])->name('basket.delete');

// proceed
Route::post('/proceed/{user}', [App\Http\Controllers\ProceedController::class, 'proceed'])->name('proceed');