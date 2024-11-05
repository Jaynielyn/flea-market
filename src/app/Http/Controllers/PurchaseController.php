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

        return view('purchase', ['item' => $item]);
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        $itemId = $request->input('item_id'); // item_idが取得できているか確認

        if (is_null($itemId)) {
            return back()->withErrors(['error' => 'Item ID is null']);
        }

        Sold::create([
            'user_id' => $userId,
            'item_id' => $itemId, // 確実にデータが渡されるよう確認
        ]);

        return redirect()->route('index')->with('success', 'Purchase completed successfully.');
    }

    public function showAddressForm()
    {
        $user = Auth::user();
        $profile = $user->profile; // ユーザーのプロフィール情報を取得
        return view('address', ['user' => $user, 'profile' => $profile]);
    }


    public function updateAddress(Request $request)
    {
        $user = Auth::user();

        // バリデーション
        $request->validate([
            'postcode' => 'required|max:10',
            'address' => 'required|max:255',
            'building' => 'nullable|max:255',
        ]);

        // プロフィールを更新または作成
        Profile::updateOrCreate(
            ['user_id' => $user->id], // 条件: ユーザーIDが一致するレコードを探す
            [
                'postcode' => $request->postcode,
                'address' => $request->address,
                'building' => $request->building,
            ]
        );

        // 更新完了後、purchase.bladeにリダイレクト
        return redirect()->route('purchase', ['id' => $user->id])->with('status', '住所が更新されました');
    }


}
