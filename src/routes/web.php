<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\OrderController;


Route::get('/', [ItemController::class, 'index'])->name('items.index');
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/search', [ItemController::class, 'search'])->name('items.search');
Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');


Route::middleware('auth')->group(function () {
    Route::get('/mypage', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/purchase/address/{item_id}', [UserController::class, 'editAddress'])->name('address.edit');
    Route::post('/purchase/address/{item_id}', [UserController::class, 'updateAddress'])->name('address.update');
    Route::get('/mypage/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/mypage/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/sell', [ItemController::class, 'sell'])->name('items.sell');
    Route::get('/purchase/{item_id}', [ItemController::class, 'purchase'])->name('item.purchase');
    Route::get('/items/liked', [ItemController::class, 'likedItems'])->name('items.liked');
    Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
    Route::post('/item/{id}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::post('/like/{item}', [LikeController::class, 'toggle'])->name('like.toggle');
    Route::post('/purchase/{item}', [OrderController::class, 'store'])->name('purchase.store');
});
