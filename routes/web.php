<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ClothesController;

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => '/brand', 'as' => 'brand.'], function() {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::get('/create', [BrandController::class, 'create'])->name('create');
    Route::get('/create_confirm', [BrandController::class, 'create_confirm'])->name('create_confirm');
    Route::match(['get', 'post'], '/create_confirm', [BrandController::class, 'create_confirm'])->name('create_confirm');
    Route::post('/store', [BrandController::class, 'store'])->name('store');
    Route::get('/edit/{brand_id}', [BrandController::class, 'edit'])->name('edit');
    Route::match(['get', 'post'], '/edit_confirm/{brand_id}', [BrandController::class, 'edit_confirm'])->name('edit_confirm');
    Route::post('/update/{brand_id}', [BrandController::class, 'update'])->name('update');
});

Route::group(['prefix' => '/clothes', 'as' => 'clothes.'], function() {
    Route::get('/', [ClothesController::class, 'index'])->name('index');
    Route::get('/create', [ClothesController::class, 'create'])->name('create');
    Route::get('/create_confirm', [ClothesController::class, 'create_confirm'])->name('create_confirm');
    Route::match(['get', 'post'], '/create_confirm', [ClothesController::class, 'create_confirm'])->name('create_confirm');
    Route::post('/store', [ClothesController::class, 'store'])->name('store');
    Route::get('/edit/{brand_id}', [ClothesController::class, 'edit'])->name('edit');
    Route::match(['get', 'post'], '/edit_confirm/{brand_id}', [ClothesController::class, 'edit_confirm'])->name('edit_confirm');
    Route::post('/update/{brand_id}', [ClothesController::class, 'update'])->name('update');
});


