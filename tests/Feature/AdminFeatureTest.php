<?php

namespace Tests\Feature;

use App\User;
use App\Voucher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function testCanListUsers()
    {
        factory(User::class, 20)->create()->each(function ($user){
            factory(Voucher::class, 5)->create(['user_id' => $user->id]);
        });

        $response = $this->get('/api/users');

        //dd(json_decode($response->content()));

        $response->assertStatus(200)
            ->assertJsonCount(20, 'data');

    }
}
