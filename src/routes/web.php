<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Models\Item;

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
    Route::get('/', [ItemController::class, 'index'])->name('index');
    Route::get('/sell', [ItemController::class, 'sell'])->name('sell');
    Route::post('/image_upload', [ItemController::class, 'store'])->name('image_upload');
});