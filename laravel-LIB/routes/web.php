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
// Route::get('/home', [HomeController::class, 'index']);

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('admin/home', 'App\Http\Controllers\HomeController@handleAdmin')->name('admin.route')->middleware('admin');

//books
Route::get('/books', [BookController::class,'index'])->name('book.index');
Route::get('/books/create', [BookController::class,'create'])->name('book.create');
Route::get('/books/{book}/edit', [BookController::class,'edit'])->name('book.edit');
// post methods 
Route::post('/books/store', [BookController::class,'store'])->name('book.store');
// update mrthods
Route::put('/books/{book}/update', [BookController::class,'update'])->name('book.update');
//delete
Route::delete('/books/{book}/destroy', [BookController::class,'destroy'])->name('book.destroy');


//reservation  admin
Route::resource('reservations', ReservationController::class);


//dashAdmin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//reservation user 
Route::get('/myreservations', 'App\Http\Controllers\ReservationUserController@index')->name('myreservations.index');
// Route::post('/myreservations/create/{book}/{user}', 'App\Http\Controllers\ReservationUserController@store')->name('myreservations.store');
Route::get('/myreservations/create/{book}', 'App\Http\Controllers\ReservationUserController@create')->name('myreservations.create');
Route::post('/myreservations/store', 'App\Http\Controllers\ReservationUserController@store')->name('myreservations.store');

Route::resource('usersadmin', UserController::class);
Route::get('/usersadmin/{user}/edit', 'App\Http\Controllers\UserController@edit')->name('usersadmin.edit');
Route::delete('/usersadmin/{user}', 'App\Http\Controllers\UserController@destroy')->name('usersadmin.destroy');
Route::put('/usersadmin/{user}/update', [UserController::class,'update'])->name('usersadmin.update');
