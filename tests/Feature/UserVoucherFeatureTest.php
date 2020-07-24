<?php

namespace Tests\Feature;

use App\User;
use App\Voucher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserVoucherFeatureTest extends TestCase
{

    use RefreshDatabase;

    public function testCanListUsersVouchers()
    {

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        factory(Voucher::class, 15)->create([
            'user_id' => $user->id
        ]);

        Sanctum::actingAs($user, ['*']);

        $response = $this->get('api/users/vouchers/?page=1');

        //dd(json_decode($response->content()));

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data');

    }

    public function testCanCreateVoucers()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        Sanctum::actingAs($user, ['*']);

        $response = $this->post('api/users/vouchers/');

        dd(json_decode($response->content()));

        $response->assertStatus(201);
    }

}
