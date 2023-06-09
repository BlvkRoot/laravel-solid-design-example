<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserTest extends TestCase
{
    // Always set this line to ensure database records are cleared on a new test
    use RefreshDatabase;
    private const API_URI = 'api/user';

    /** @test */
    public function it_should_create_a_new_user(): void
    {
        // Given a user's attributes
        $attributes = [
            'name' => 'Henriques Salucamba',
            'email' => 'hsalucamba@gmail.com',
            'password' => '12345678'
        ];

        // When They hit the api/user endpoint, while passing the necessary data
        $this->post($this::API_URI, $attributes)
            ->assertStatus(Response::HTTP_CREATED);

        // Then There should be a new user in the database
        $this->assertDatabaseHas('users', ['name' => $attributes['name']]);
    }


    /** @test */
    public function it_should_validate_empty_fields()
    {
        // Given a user's empty attributes
        $attributes = [
            'name' => '',
            'email' => '',
            'password' => ''
        ];

        // When They hit the api/user endpoint, while passing the necessary data
        $this->post($this::API_URI, $attributes)
            ->assertStatus(Response::HTTP_FOUND);
        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    public function it_should_validate_duplicate_email()
    {
        // Given a user's attributes
        $attributes = [
            'name' => 'Henriques Salucamba',
            'email' => 'hsalucamba@gmail.com',
            'password' => '12345678'
        ];

        // When They hit the api/user endpoint, while passing the necessary data
        $this->post($this::API_URI, $attributes);
        $this->post($this::API_URI, $attributes)
            ->assertContent('Email already exists!')
            ->assertStatus(Response::HTTP_FOUND);
        $this->assertDatabaseCount('users', 1);
    }

    /** @test */
    public function it_should_delete_existing_user()
    {
        $user = User::factory()->create();

        $this->deleteJson($this::API_URI . "/" . $user->id)
            ->assertStatus(Response::HTTP_NO_CONTENT);
        $this->assertDatabaseCount('users', 0);
    }
}
