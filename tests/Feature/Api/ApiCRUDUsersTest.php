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
        $userTest = User::factory(2)->create();
        $this->assertCount(2, User::all());

        $userNoAdmin = User::factory()->create(['isAdmin' => false]);
        $this->actingAs($userNoAdmin);
        $response = $this->get(route('usersAPI', $userTest->id));
        $response->assertStatus(200)
            ->assertJsonCount(1);

        $userAdmin = User::factory()->create(['isAdmin' => true]);
        $this->actingAs($userAdmin);
        $response = $this->get(route('usersAPI'));
        $response->assertStatus(200)
            ->assertJsonCount(4);
    }
}

