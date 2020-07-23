<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class RegisterFeatureTest extends TestCase
{
    use RefreshDatabase;


    public function testCanCreateVoucherOnUserRegistration()
    {

        $userData = [
            'username' => 'atparinas',
            'name' => 'Andy Parinas',
            'email' => 'andy.parinas@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];


        $this->post('register', $userData)
            ->assertStatus(302);

        $this->assertCount(1, User::all());
        $this->assertCount(1, User::first()->vouchers);


    }
}
