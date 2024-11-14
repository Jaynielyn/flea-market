<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Models\Like;
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

    //購入
    Route::get('/detail/{id}/purchase', [PurchaseController::class, 'purchase'])->name('purchase');
    Route::get('/purchase/address', [PurchaseController::class, 'showAddressForm'])->name('purchase.addressForm');
    Route::post('/purchase/update-address', [PurchaseController::class, 'updateAddress'])->name('purchase.updateAddress');
    Route::get('/sold', [PurchaseController::class, 'store'])->name('purchase.store');
    Route::post('/sold', [PurchaseController::class, 'store'])->name('purchase.store');

    // コメントページ表示
    Route::get('/comment/{item_id}', [LikeController::class, 'showComments'])->name('comment.show');
    Route::post('/comment/{item_id}', [LikeController::class, 'storeComment'])->name('product.comment.store');

    // いいね機能
    Route::post('/like/{item_id}', [LikeController::class, 'toggleLike'])->name('like.toggle');

});
// 詳細ページ
Route::get('/detail/{id}', [ItemController::class, 'detail'])->name('detail');
