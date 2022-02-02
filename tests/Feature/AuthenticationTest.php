<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthenticationTest extends TestCase
{
    /**
    * User Registeration test.
    *
    * @method GET
    * @route /api/auth/register
    *
    * Test returns 201 status code
    */
    public function testUserRegisteration()
    {
        $data = [
            "name"=>"captain",
            "firstname"=>"Enforcer",
            "middlename"=>"Chief",
            "lastname"=>"King",
            "picture_url"=>"www.myimage.com",
            "email"=>"enforcer@email.com",
            "password"=>"captain100",
            "password_confirmation"=>"captain100"
        ];

        $response = $this->postJson('api/auth/register', $data);
        $response->assertStatus(201);
        $response->assertJsonStructure(['token']);
    }

    /**
    * User Login test.
    *
    * @method GET
    * @route /api/auth/login/
    *
    * Test returns 201 status code
    */
    public function testSuccessfullUserLogin()
    {
        $data = [
            "email"=>"enforcer@email.com",
            "password"=>"captain100",
        ];

        $response = $this->postJson('api/auth/login', $data);
        $response->assertStatus(201);
        $response->assertJsonStructure(['token']);
    }
}
