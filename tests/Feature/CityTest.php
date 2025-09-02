<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\City;
use App\Models\State;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CityTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        // Run the seeders for countries, states, and cities
        $this->seed();
    }

    public function test_can_create_city_via_ajax()
    {
        $this->withoutMiddleware();

        $state = State::first(); // Use first seeded state

        $response = $this->postJson(route('cities.store'), [
            'state_id' => $state->id,
            'name' => 'Gulshan',
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'status' => true,
                     'message' => 'City added successfully',
                 ]);

        $this->assertDatabaseHas('cities', [
            'name' => 'Gulshan',
            'state_id' => $state->id,
        ]);
    }

    public function test_cannot_create_city_without_required_fields()
    {
        $this->withoutMiddleware();

        $response = $this->postJson(route('cities.store'), []);

        $response->assertStatus(200)
                 ->assertJson(['status' => false])
                 ->assertJsonStructure(['errors' => ['name', 'state_id']]);
    }

    public function test_can_update_city_via_ajax()
    {
        $this->withoutMiddleware();

        $city = City::first(); // Use first seeded city

        $response = $this->putJson(route('cities.update', $city->id), [
            'state_id' => $city->state_id,
            'name' => 'Banani Updated',
        ]);

        $response->assertStatus(200)
                 ->assertJson(['status' => true]);

        $this->assertDatabaseHas('cities', [
            'id' => $city->id,
            'name' => 'Banani Updated',
        ]);
    }

    public function test_can_delete_city_via_ajax()
    {
        $this->withoutMiddleware();

        $city = City::first();

        $response = $this->deleteJson(route('cities.destroy', $city->id));

        $response->assertStatus(200)
                 ->assertJson(['status' => true]);

        $this->assertDatabaseMissing('cities', ['id' => $city->id]);
    }
}
