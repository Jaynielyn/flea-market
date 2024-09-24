<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $images = Item::all();
        return view('index', ['images' => $images]);
    }

    public function sell()
    {
        return view('sell');
    }

    public function store(Request $request)
    {
        //リレーション紐付け
        $user = Auth::user();
        $id = Auth::id();

        //リクエストされた画像ファイルを取得
        $img = $request->file('img_url');
        $path = $img->store('images', 'public');

        Item::create([
            'img_url' => $path,
            'category' => $request->category,
            'condition' => $request->condition,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('index');
    }
}
