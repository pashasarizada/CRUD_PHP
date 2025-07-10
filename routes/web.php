<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;  

// ana sayfaya yönlendiriyoruz
Route::get('/', function () {
    return view('welcome');
});

// Kitap route'ları - web middleware ile
Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::get('/create', [BookController::class, 'create']);
    Route::post('/', [BookController::class, 'store']);
    Route::get('/{id}', [BookController::class, 'show']);
    Route::get('/{id}/edit', [BookController::class, 'edit']);
    Route::put('/{id}', [BookController::class, 'update']);
    Route::delete('/{id}', [BookController::class, 'destroy']);
});