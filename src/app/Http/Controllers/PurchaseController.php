<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Sold;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchase($id)
    {
        $item = Item::find($id);
        
        // アイテムが存在しない場合はindexページにリダイレクト
        if (!$item) {
            return redirect()->route('index')->with('error', '商品が見つかりませんでした。');
        }

        session(['item_id' => $id]);

        return view('purchase', ['item' => $item]);
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        $itemId = $request->input('item_id');

        if (is_null($itemId)) {
            return back()->withErrors(['error' => 'Item ID is null']);
        }

        Sold::create([
            'user_id' => $userId,
            'item_id' => $itemId,
        ]);

        return redirect()->route('index')->with('success', 'Purchase completed successfully.');
    }

    public function showAddressForm()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('address', ['user' => $user, 'profile' => $profile]);
    }


    public function updateAddress(Request $request)
    {
        $user = Auth::user();

        $itemId = session('item_id');

        $request->validate([
            'postcode' => 'required|max:10',
            'address' => 'required|max:255',
            'building' => 'nullable|max:255',
        ]);

        // プロフィールを更新または作成
        Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building,
            ]
        );

        return redirect()->route('purchase', ['id' => $itemId])->with('status', '住所情報を確認しました');
    }


}
