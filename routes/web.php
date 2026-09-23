<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//マイページ
Route::get('/mypage', [MyPageController::class, 'index'])
   ->middleware('auth')
   ->name('mypage');

// アカウント編集
Route::get('/account/edit', [AccountController::class, 'edit'])
   ->middleware('auth')
   ->name('account.edit');

Route::put('/account', [AccountController::class, 'update'])
   ->middleware('auth')
   ->name('account.update');

// お問い合わせ
Route::get('/contact', [ContactController::class, 'create'])
   ->middleware('auth')
   ->name('contact.create');

Route::post('/contact', [ContactController::class, 'store'])
   ->middleware('auth')
   ->name('contact.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products', [ProductController::class, 'index'])->middleware('auth')->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth')->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->middleware('auth')->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])
->middleware('auth')
->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('auth')->name('products.destroy');
Route::get('/products/{product}', [ProductController::class, 'show'])->middleware('auth')->name('products.show');
Route::post('/products/{product}/like', [ProductController::class, 'toggleLike'])->middleware('auth')->name('products.like');
Route::get('/products/{product}/purchase', [ProductController::class, 'purchase'])->middleware('auth')->name('products.purchase');
Route::post('/products/{product}/purchase', [ProductController::class, 'storePurchase'])->middleware('auth')->name('products.purchase.store');

require __DIR__.'/auth.php';
