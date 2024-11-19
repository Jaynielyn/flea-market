<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
class ItemController extends Controller
{
    public function index()
    {
        // いいねが多い順にアイテムを取得
        $images = Item::withCount('likes')
        ->orderBy('likes_count', 'desc')
        ->get();

        // ユーザーが「いいね」したアイテム
        $likedItems = Item::whereHas('likes', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('index', [
            'images' => $images,
            'likedItems' => $likedItems,
        ]);
    }

    public function sell()
    {
        return view('sell');
    }

    public function store(Request $request)
    {
        // ログインユーザーを取得
        $user = Auth::user();

        // リクエストされた画像ファイルを保存
        $img = $request->file('img_url');
        $path = $img->store('images', 'public');

        $item = Item::create([
            'img_url' => $path,
            'category' => $request->category,
            'condition' => $request->condition,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => $user->id
        ]);

        // 商品の状態を保存
        DB::table('conditions')->insert([
            'item_id' => $item->id,
            'condition' => $request->condition,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // カテゴリ情報を保存
        $category = Category::firstOrCreate(
            ['category' => $request->category],
            ['created_at' => now(),
            'updated_at' => now()
            ]
        );

        // `category_items` テーブルに商品とカテゴリの関連付けを保存
        DB::table('category_items')->insert([
            'item_id' => $item->id,
            'category_id' => $category->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('index');
    }


    //詳細ページ
    public function detail($id)
    {
        $item = Item::find($id);

        return view('detail', ['item' => $item]);
    }

    public function show($id)
    {
        $item = Item::with(['likes', 'comments'])->findOrFail($id);
        return view('detail', compact('item'));
    }
}
