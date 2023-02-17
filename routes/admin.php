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

Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/', [\App\Http\Controllers\Backend\HomeController::class, 'index'])->name('admin.home');

    // Author routes
    Route::resource('/author', \App\Http\Controllers\AuthorController::class, ['names' => 'author']);

    // Publisher routes
    Route::resource('/publisher', \App\Http\Controllers\PublisherController::class, ['names' => 'publisher']);

    // Category routes
    Route::resource('/category', \App\Http\Controllers\CategoryController::class, ['names' => 'category']);

    // Book routes
    Route::resource('/book', \App\Http\Controllers\BookController::class, ['names' => 'book']);
    
    //Book Issued routes
    Route::get('/bookissued', [App\Http\Controllers\BookIssuedController::class, 'index'])->name('admin.bookissued');
    Route::get('/bookissued/{type}/{proceed}', [App\Http\Controllers\BookIssuedController::class, 'confirmation'])->name('admin.bookissued.confirmation');
    Route::delete('/bookissued/{proceed}', [App\Http\Controllers\BookIssuedController::class, 'delete'])->name('admin.bookissued.delete');

});

