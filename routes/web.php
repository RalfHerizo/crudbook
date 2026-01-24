<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books',[BookController::class,'index'])->name('books.index');
Route::post('/add-book',[BookController::class,'store'])->name('books.store');
Route::post('/update-book/{id}', [BookController::class, 'update'])->name('books.update');
Route::get('/delete-book/{id}', [BookController::class, 'destroy'])->name('books.delete');
