<?php

use App\Http\Controllers\ProductController;
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
    return view('welcome');
})->name('home');

Route::get('/web/products', [ProductController::class,'index'])->name('products.index');
Route::get('/web/products/create-product', [ProductController::class,'create'])->name('products.create');
Route::post('/web/products/new-product', [ProductController::class,'store'])->name('products.store');
Route::get('/web/products/{product}', [ProductController::class,'show'])->name('products.show');
Route::get('/web/products/edit-product/{product}', [ProductController::class,'edit'])->name('products.edit');
Route::patch('/web/products/edit-product/{product}', [ProductController::class,'update'])->name('products.update');
