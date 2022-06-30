<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;

// Route::resource('posts', PostController::class);
Route::get('/', [TestController::class, 'home']);

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::delete('posts/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('posts/show', [PostController::class, 'show'])->name('posts.show');
Route::put('posts/update', [PostController::class, 'update'])->name('posts.update');
