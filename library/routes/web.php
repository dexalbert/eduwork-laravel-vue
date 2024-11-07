<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PublisherController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index']);

Route::get('/api/authors', [App\Http\Controllers\AuthorController::class,'api']);
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class,'api']);
Route::get('/api/members', [App\Http\Controllers\MemberController::class,'api']);
Route::get('/api/books', [App\Http\Controllers\BookController::class,'api']);

Route::resource('/publishers', PublisherController::class);
Route::resource('/catalogs', CatalogController::class);
Route::resource('/authors', AuthorController::class);
Route::resource('/members', MemberController::class);
Route::resource('/books', BookController::class);