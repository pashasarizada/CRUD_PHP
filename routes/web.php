<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;  

// ana sayfaya yönlendiriyoruz
Route::get('/', function () {
    return view('welcome');
});


// Kitap route'ları - CSRF olmadan
Route::prefix('books')->withoutMiddleware(['web'])->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::get('/{id}', [BookController::class, 'show']);
    Route::post('/', [BookController::class, 'store']);
});