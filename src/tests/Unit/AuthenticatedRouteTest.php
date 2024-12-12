<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class AuthenticatedRouteTest extends TestCase
{
    public function test_authenticated_user_can_access_route()
    {
        // ユーザーを作成
        $user = User::factory()->create();

        // actingAsで認証状態を模擬
        $response = $this->actingAs($user)->get('/authenticated-route');

        // 200ステータスコードを確認
        $response->assertStatus(200);
    }

    public function test_guest_cannot_access_route()
    {
        // 未認証の状態でアクセス
        $response = $this->get('/authenticated-route');

        // リダイレクトを確認
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
