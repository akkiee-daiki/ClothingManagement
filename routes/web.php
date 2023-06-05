<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/brand', 'as' => 'brand.'], function() {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::get('/create', [BrandController::class, 'create'])->name('create');
    Route::match(['get', 'post'], '/create_confirm', [BrandController::class, 'create_confirm'])->name('create_confirm');
    Route::post('/store', [BrandController::class, 'store'])->name('store');
    Route::get('/edit', [BrandController::class, 'edit'])->name('edit');
    Route::match(['get', 'post'], '/edit_confirm', [BrandController::class, 'edit_confirm'])->name('edit_confirm');
    Route::post('/update', [BrandController::class, 'update'])->name('update');
});

