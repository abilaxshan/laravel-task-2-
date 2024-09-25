<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;

Route::get("/", [OrderController::class, 'order'])->name('order');
Route::get("/product", [ProductController::class, 'product'])->name('product');
Route::get("/slider", [SliderController::class, 'slider'])->name('slider');
Route::get("/add_product", [ProductController::class, 'add_product'])->name('add_product');
Route::post("/upload_product", [ProductController::class, 'upload_product'])->name('upload_product');
Route::get("/delete_product/{id}", [ProductController::class, 'delete_product'])->name('delete_product');
Route::get("/edit_product/{id}", [ProductController::class, 'edit_product'])->name('edit_product');
Route::post("/update_product/{id}", [ProductController::class, 'update_product'])->name('update_product');

Route::get("/category", [CategoryController::class, 'category'])->name('category');
Route::get("/add_category", [CategoryController::class, 'add_category'])->name('add_category');
Route::post("/upload_categoty", [CategoryController::class, 'upload_category'])->name('upload_category');
Route::get("/delete_category/{id}", [CategoryController::class, 'delete_category'])->name('delete_category');
Route::get("/edit_category/{id}", [CategoryController::class, 'edit_category'])->name('edit_category');
Route::post("/update_category/{id}", [CategoryController::class, 'update_category'])->name('update_category');