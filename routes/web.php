<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

// CATEGORY CONTROLLER
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('', [CategoryController::class, 'index'])->name('index');
    Route::get('create', [CategoryController::class, 'create'])->name('create');
    Route::post('', [CategoryController::class, 'store'])->name('store');
    Route::get('{category}', [CategoryController::class, 'show'])->name('show');
    Route::get('{category}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('{category}', [CategoryController::class, 'update'])->name('update');
    Route::delete('{category}', [CategoryController::class, 'destroy'])->name('destroy');
    Route::put('{category}/restore', [CategoryController::class, 'restore'])->name('restore');
    Route::delete('{category}/forceDestroy', [CategoryController::class, 'forceDestroy'])->name('forceDestroy');
    Route::get('trashed', [CategoryController::class, 'trashed'])->name('trashed');
});

//BRAND CONTROLLER
Route::prefix('brands')->name('brands.')->group(function () {
    Route::get('', [BrandController::class, 'index'])->name('index');
    Route::get('create', [BrandController::class, 'create'])->name('create');
    Route::post('', [BrandController::class, 'store'])->name('store');
    Route::get('{brand}', [BrandController::class, 'show'])->name('show');
    Route::get('{brand}/edit', [BrandController::class, 'edit'])->name('edit');
    Route::put('{brand}', [BrandController::class, 'update'])->name('update');
    Route::delete('{brand}', [BrandController::class, 'destroy'])->name('destroy');
    Route::put('{brand}/restore', [BrandController::class, 'restore'])->name('restore');
    Route::delete('{brand}/forceDestroy', [BrandController::class, 'forceDestroy'])->name('forceDestroy');
    Route::get('trashed', [BrandController::class, 'trashed'])->name('trashed');
});

//COUNTRY CONTROLLER
Route::prefix('countries')->name('countries.')->group(function () {
    Route::get('', [CountryController::class, 'index'])->name('index');
    Route::get('create', [CountryController::class, 'create'])->name('create');
    Route::post('', [CountryController::class, 'store'])->name('store');
    Route::get('{country}', [CountryController::class, 'show'])->name('show');
    Route::get('{country}/edit', [CountryController::class, 'edit'])->name('edit');
    Route::put('{country}', [CountryController::class, 'update'])->name('update');
    Route::delete('{country}', [CountryController::class, 'destroy'])->name('destroy');
    Route::put('{country}/restore', [CountryController::class, 'restore'])->name('restore');
    Route::delete('{country}/forceDestroy', [CountryController::class, 'forceDestroy'])->name('forceDestroy');
    Route::get('trashed', [CountryController::class, 'trashed'])->name('trashed');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

//PRODUCT CONTROLLER
Route::prefix('products')->name('products.')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('index');
    Route::get('create', [ProductController::class, 'create'])->name('create');
    Route::post('', [ProductController::class, 'store'])->name('store');
    Route::get('{product}', [ProductController::class, 'show'])->name('show');
    Route::get('{product}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('{product}', [ProductController::class, 'destroy'])->name('destroy');
    Route::put('{product}/restore', [ProductController::class, 'restore'])->name('restore');
    Route::delete('{product}/forceDestroy', [ProductController::class, 'forceDestroy'])->name('forceDestroy');
    Route::get('trashed', [ProductController::class, 'trashed'])->name('trashed');
});

