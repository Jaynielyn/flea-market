<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Route as RoutingRoute;

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

Route::get('/', [ItemController::class, 'index'])->name('index');

Route::middleware('auth')->group(function () {
    //出品
    Route::get('/sell', [ItemController::class, 'sell'])->name('sell');
    Route::post('/image_upload', [ItemController::class, 'store'])->name('image_upload');

    //PROFILE
    Route::get('/mypage', [ProfileController::class, 'mypage'])->name('mypage');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'create'])->name('profile_edit');

    Route::get('/detail/{id}', [ItemController::class, 'detail'])->name('detail');
});