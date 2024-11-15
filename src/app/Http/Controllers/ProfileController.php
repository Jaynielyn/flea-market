<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Item;
use App\Models\Sold;
use App\Models\User;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;




class ProfileController extends Controller
{
    public function mypage()
    {
        $is_image = false;
        if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }

        // ログインユーザーの出品した商品を取得
        $listedItems = Item::where('user_id', Auth::id())->get();

        // ログインユーザーが購入した商品を取得
        $purchasedItems = Item::whereIn('id', Sold::where('user_id', Auth::id())->pluck('item_id'))->get();

        return view('mypage', [
            'is_image' => $is_image,
            'listedItems' => $listedItems,
            'purchasedItems' => $purchasedItems,
        ]);
    }

    public function profile()
    {
        $is_image = false;
        if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }
        return view('profile', ['is_image' => $is_image]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();

        $is_image = $request->photo->storeAs('public/profile_images', Auth::id() . '.jpg');

        $profile = [
            'user_name' => $request->user_name,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building,
            'user_id' => Auth::id()
        ];

        Profile::create($profile);

        return view('mypage', ['is_image' => $is_image]);
    }
}
