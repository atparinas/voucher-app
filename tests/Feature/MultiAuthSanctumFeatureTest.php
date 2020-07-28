<?php

namespace Tests\Feature;

use App\Admin;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class MultiAuthSanctumFeatureTest extends TestCase
{
    use RefreshDatabase;


    public function testAdminCanAccessApiResource()
    {
        $this->withoutExceptionHandling();

        $admin = factory(Admin::class)->create();

        Sanctum::actingAs($admin, ['admin']);


        $response = $this->get('api/test');

        //dd(json_decode($response->content()));

        $response->assertStatus(Response::HTTP_OK);


    }

    public function testUserCanNotAccessAdminApiResource()
    {
        $user = factory(User::class)->create();

        Sanctum::actingAs($user, ['user']);


        $response = $this->get('api/test');


        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
