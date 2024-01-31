<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
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

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
// Route::get('/home', [HomeController::class, 'index']);

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('admin/home', 'App\Http\Controllers\HomeController@handleAdmin')->name('admin.route')->middleware('admin');
Route::get('/books', [BookController::class,'index'])->name('book.index');
Route::get('/books/create', [BookController::class,'create'])->name('book.create');
Route::get('/books/{book}/edit', [BookController::class,'edit'])->name('book.edit');


// post methods 
Route::post('/books/store', [BookController::class,'store'])->name('book.store');



// update mrthods
Route::put('/books/{book}/update', [BookController::class,'update'])->name('book.update');

//delete
Route::delete('/books/{book}/destroy', [BookController::class,'destroy'])->name('book.destroy');