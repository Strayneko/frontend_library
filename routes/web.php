<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;

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
    return redirect()->route('book.index');
});

Route::prefix('book')
    ->name('book.')
    ->controller(BookController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::get('/{id}/delete', 'delete')->name('delete');
        Route::post('/create', 'store')->name('store');
        Route::post('/{id}/update', 'update')->name('update');
    });


Route::prefix('category')
    ->name('category.')
    ->controller(CategoryController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::get('/{id}/delete', 'delete')->name('delete');
        Route::post('/create', 'store')->name('store');
        Route::post('/{id}/update', 'update')->name('update');
    });

Route::prefix('author')
    ->name('author.')
    ->controller(AuthorController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::get('/{id}/delete', 'delete')->name('delete');
        Route::post('/create', 'store')->name('store');
        Route::post('/{id}/update', 'update')->name('update');
    });
