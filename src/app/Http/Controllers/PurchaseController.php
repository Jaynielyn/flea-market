<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Sold;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Checkout\Session;


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

        return view('purchase', [
            'item' => $item,
        ]);
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

    // Stripe Checkout セッションを作成
    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $itemId = $request->input('item_id');
        $paymentMethod = $request->input('payment_method', 'クレジットカード');
        $item = Item::find($itemId);

        if (!$item) {
            return redirect()->route('index')->with('error', '商品が見つかりませんでした。');
        }

        // 画像URLを確認
        $imageUrl = $item->img_url ? asset('storage/' . $item->img_url) : asset('img/noimage.png');
        Log::info('Image URL: ' . $imageUrl);

        // Stripe用の商品情報を作成
        $lineItems = [
            [
                'price_data' => [
                    'currency' => 'jpy',
                    'product_data' => [
                        'name' => $item->name,
                        'images' => [$imageUrl],
                    ],
                    'unit_amount' => $item->price * 1,
                ],
                'quantity' => 1,
            ],
        ];

        // Stripe Checkoutセッション作成
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        // session_id をログに出力
        Log::info('Stripe session_id: ' . $session->id);

        // 購入情報を仮登録
        Sold::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'payment_method' => $paymentMethod,
            'session_id' => $session->id,
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        try {
            // リクエストから session_id を取得
            $sessionId = $request->get('session_id');
            if (!$sessionId) {
                Log::error('Session ID is missing in the request.');
                return redirect()->route('index')->with('error', 'セッションIDが見つかりませんでした。');
            }

            // Stripeセッションを取得
            try {
                $session = \Stripe\Checkout\Session::retrieve($sessionId);
            } catch (\Exception $e) {
                Log::error('Failed to retrieve Stripe session: ' . $e->getMessage());
                return redirect()->route('index')->with('error', 'Stripeセッションが見つかりませんでした。');
            }

            // Stripeセッションが取得されたか確認
            if (!$session) {
                Log::error('Stripe session is null for session_id: ' . $sessionId);
                return redirect()->route('index')->with('error', 'Stripeセッションが見つかりませんでした。');
            }

            // 該当の購入情報を取得
            Log::info('Searching for Sold record with session_id: ' . $sessionId . ' and user_id: ' . Auth::id());
            $sold = Sold::where('session_id', $sessionId)
                ->where('user_id', Auth::id())
                ->first();

            // 購入情報が見つからない場合
            if (!$sold) {
                Log::error('No Sold record found for session_id: ' . $sessionId . ' and user_id: ' . Auth::id());
                return redirect()->route('index')->with('error', '購入情報が見つかりませんでした。');
            }

            // ステータスを「paid」に更新
            if ($sold->status !== 'paid') {
                $sold->status = 'paid';
                $sold->save();
                Log::info('Sold record updated to paid for session_id: ' . $sessionId);
            }

            // 購入者情報とアイテムをビューに渡す
            $customer = Auth::user();
            $item = $sold->item;

            return view('success', compact('customer', 'item'));
        } catch (\Exception $e) {
            // エラーログを記録
            Log::error('Error in success method: ' . $e->getMessage());
            return redirect()->route('index')->with('error', '購入処理中にエラーが発生しました。');
        }
    }


    public function cancel()
    {
        return redirect()->route('index')->with('error', '決済がキャンセルされました。');
    }

    public function webhook(Request $request)
    {
        // Webhookシークレットキー
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET');

        // Stripeから送信されたペイロードとヘッダーを取得
        $payload = @file_get_contents('php://input');
        $sigHeader = $request->header('Stripe-Signature');
        $event = null;

        try {
            // Webhookの検証
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sigHeader,
                $endpointSecret
            );
        } catch (\UnexpectedValueException $e) {
            // ペイロードが無効
            Log::error('Invalid webhook payload: ' . $e->getMessage());
            return response('Invalid payload', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // シグネチャの検証失敗
            Log::error('Invalid webhook signature: ' . $e->getMessage());
            return response('Invalid signature', 400);
        }

        // イベントタイプに基づいて処理
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                // セッションIDで購入情報を取得
                $order = Sold::where('session_id', $session->id)->first();
                if ($order && $order->status !== 'paid') {
                    $order->status = 'paid';
                    $order->save();

                    // 購入完了メールを送信するなどの追加処理
                    Log::info('Payment completed for order: ' . $order->id);
                }
                break;

                // 他のイベントタイプを追加する場合
            default:
                Log::info('Received unknown event type: ' . $event->type);
                break;
        }

        return response('Webhook handled', 200);
    }
}
