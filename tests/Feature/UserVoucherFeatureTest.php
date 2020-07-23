<?php

namespace Tests\Feature;

use App\User;
use App\Voucher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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


        $response = $this->get('api/users/' . $user->id . '/vouchers/?page=2');

        dd(json_decode($response->content()));

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data');

    }

}
