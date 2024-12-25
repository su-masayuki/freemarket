<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;


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

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/mypage', [UserController::class, 'profile']);
    Route::get('/mypage/profile', [UserController::class, 'edit_profile']);
    Route::get('/purchase/address/:item_id', [UserController::class, 'edit_address']);
    Route::get('/sell', [ItemController::class, 'sell']);
    Route::get('/item/:item_id', [ItemController::class, 'item']);
    Route::get('/purchase/:item_id', [ItemController::class, 'purchase']);

});