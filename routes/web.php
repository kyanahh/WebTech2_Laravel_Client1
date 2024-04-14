<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'landing'])->name('landing');
Route::get('loginpage', [ProductController::class, 'loginpage'])->name('log');
Route::get('createaccount', [ProductController::class, 'createaccount'])->name('account');
Route::post('createaccount', [ProductController::class, 'createuser'])->name('user');
Route::post('loginpage', [ProductController::class, 'login'])->name('signin');

    Route::get('index', [ProductController::class, 'index'])->name('tables');
    Route::get('home', [ProductController::class, 'home'])->name('homepage');
    Route::post('logout', [ProductController::class, 'logout'])->name('signout');
    Route::get('create', [ProductController::class, 'create'])->name('createpage');
    Route::post('store', [ProductController::class, 'store'])->name('storage');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edits');
    Route::put('/{product}', [ProductController::class, 'update'])->name('updates');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('delete');
    Route::get('/{product}/show', [ProductController::class, 'show'])->name('dogshow');
