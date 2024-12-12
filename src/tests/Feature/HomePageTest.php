<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * 基本的なホームページのテスト
     *
     * @return void
     */
    public function test_home_page_can_be_accessed()
    {
        // ホームページが正しく表示されることを確認
        $response = $this->get('/');

        $response->assertStatus(200); // ステータスコード200が返ってくることを確認
        $response->assertSee('Welcome'); // ページに「Welcome」テキストが含まれていることを確認
    }
}
