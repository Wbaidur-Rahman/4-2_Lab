<?php

use App\Http\Controllers\BookController;
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
    return view('book.home');
});
Route::get('/home', [BookController::class,'index'])->name('book.home');
Route::get('/addbook', [BookController::class,'create'])->name('book.create');
Route::post('/addbook', [BookController::class,'store'])->name('book.store');
Route::get('/home/{book}/edit', [BookController::class,'edit'])->name('book.edit');
Route::put('/home/{book}/update', [BookController::class,'update'])->name('book.update');
Route::delete('/home/{book}/destroy', [BookController::class,'destroy'])->name('book.destroy');
