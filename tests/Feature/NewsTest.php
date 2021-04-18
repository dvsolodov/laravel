<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list()
    {
        $response = $this->get('/category/world');

        $response->assertStatus(200);
        $response->assertSeeText('В мире');
        $response->assertSeeText('Первая новость');
        $response->assertViewIs('categoryNews');
        $response->assertViewHas('pageTitle', 'Новости категории "В мире"');

    }

    public function test_card()
    {
        $response = $this->get('/category/world/news/pervaya-novost-iz-v-mire');

        $response->assertStatus(200);
        $response->assertSeeText('В мире');
        $response->assertSeeText('Первая новость');
        $response->assertViewIs('newsCard');
        $response->assertViewHas('pageTitle', 'Новость из категории "В мире"');

    }
}
