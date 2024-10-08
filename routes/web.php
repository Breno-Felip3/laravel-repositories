<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', function(){

})->name('admin');

Route::prefix('admin/categories')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::get('/show/{id}', [CategoryController::class, 'show'])->name('show');
    Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
    Route::any('/pesquisar', [CategoryController::class, 'search'])->name('search');
});

Route::prefix('admin/products')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::any('/pesquisar', [ProductController::class, 'search'])->name('search');
});

