<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;

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

// Route::middleware(['admin'])->group(function () {
//     Route::get('/books', [BookController::class, 'index'])->name('book.index');
//     Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
//     Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
//     Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
//     Route::put('/books/{book}/update', [BookController::class, 'update'])->name('book.update');
//     Route::delete('/books/{book}/destroy', [BookController::class, 'destroy'])->name('book.destroy');
// });

// Route::get('/home', [HomeController::class, 'index']);
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('admin/home', 'App\Http\Controllers\HomeController@handleAdmin')->name('admin.route')->middleware('admin');

//books
Route::get('/books', [BookController::class,'index'])->name('book.index')->middleware('admin');
Route::get('/books/create', [BookController::class,'create'])->name('book.create')->middleware('admin');
Route::get('/books/{book}/edit', [BookController::class,'edit'])->name('book.edit')->middleware('admin');
// post methods 
Route::post('/books/store', [BookController::class,'store'])->name('book.store')->middleware('admin');
// update mrthods
Route::put('/books/{book}/update', [BookController::class,'update'])->name('book.update')->middleware('admin');
//delete
Route::delete('/books/{book}/destroy', [BookController::class,'destroy'])->name('book.destroy')->middleware('admin');


//reservation  admin
Route::resource('reservations', ReservationController::class)->middleware('admin');


//dashAdmin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//reservation user 
Route::get('/myreservations', 'App\Http\Controllers\ReservationUserController@index')->name('myreservations.index');
// Route::post('/myreservations/create/{book}/{user}', 'App\Http\Controllers\ReservationUserController@store')->name('myreservations.store');
Route::get('/myreservations/create/{book}', 'App\Http\Controllers\ReservationUserController@create')->name('myreservations.create');
Route::post('/myreservations/store', 'App\Http\Controllers\ReservationUserController@store')->name('myreservations.store');

Route::resource('usersadmin', UserController::class)->middleware('admin');
Route::get('/usersadmin/{user}/edit', 'App\Http\Controllers\UserController@edit')->name('usersadmin.edit')->middleware('admin');
Route::delete('/usersadmin/{user}', 'App\Http\Controllers\UserController@destroy')->name('usersadmin.destroy')->middleware('admin');
Route::put('/usersadmin/{user}/update', [UserController::class,'update'])->name('usersadmin.update')->middleware('admin');

