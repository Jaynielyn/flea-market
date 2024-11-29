@extends('layouts.app')

@section('main')
<h1>コンビニ支払い</h1>

<p>以下のバーコードをコンビニで提示し、支払いを完了してください。</p>
<p>支払い完了後、自動的に購入完了となります。</p>

<div id="konbini-payment-container"></div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', async () => {
        const stripe = Stripe('{{ env("STRIPE_PUBLIC_KEY ") }}');

        // PaymentIntent のクライアントシークレットを使用して支払い情報を取得
        const clientSecret = '{{ $clientSecret }}';

        const {
            paymentIntent
        } = await stripe.retrievePaymentIntent(clientSecret);

        if (paymentIntent) {
            const container = document.getElementById('konbini-payment-container');
            container.innerHTML = `
                <p>コンビニ名: ${paymentIntent.next_action.konbini.display_name}</p>
                <p>支払い期限: ${new Date(paymentIntent.next_action.konbini.expires_at * 1000).toLocaleString()}</p>
                <a href="${paymentIntent.next_action.konbini.hosted_voucher_url}" target="_blank">
                    支払い用バーコードを見る
                </a>
            `;
        }
    });
</script>
@endsection