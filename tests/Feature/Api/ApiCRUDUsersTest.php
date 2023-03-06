<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiCRUDUsersTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /* public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    } */

    use RefreshDatabase;
    
    public function test_checkIfUsersListedOnJsonFile()
    {
        User::factory(2)->create();

        $response = $this->get(route('usersAPI'));

        $response->assertStatus(200)
            ->assertJsonCount(2);
    }
}

