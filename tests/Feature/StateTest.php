<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\State;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StateTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(); // Seed countries and states
    }

    public function test_can_create_state_via_ajax()
    {
        $this->withoutMiddleware();

        $country = \App\Models\Country::first();

        $response = $this->postJson(route('states.store'), [
            'country_id' => $country->id,
            'name' => 'New State',
        ]);

        $response->assertStatus(200)
                 ->assertJson(['status' => true]);

        $this->assertDatabaseHas('states', [
            'name' => 'New State',
            'country_id' => $country->id,
        ]);
    }

    public function test_cannot_create_state_without_required_fields()
    {
        $this->withoutMiddleware();

        $response = $this->postJson(route('states.store'), []);

        $response->assertStatus(200)
                 ->assertJson(['status' => false])
                 ->assertJsonStructure(['errors' => ['name', 'country_id']]);
    }

    public function test_can_update_state_via_ajax()
    {
        $this->withoutMiddleware();

        $state = State::first();

        $response = $this->putJson(route('states.update', $state->id), [
            'country_id' => $state->country_id,
            'name' => $state->name . ' Updated',
        ]);

        $response->assertStatus(200)
                 ->assertJson(['status' => true]);

        $this->assertDatabaseHas('states', [
            'id' => $state->id,
            'name' => $state->name . ' Updated',
        ]);
    }

    public function test_can_delete_state_via_ajax()
    {
        $this->withoutMiddleware();

        $state = State::first();

        $response = $this->deleteJson(route('states.destroy', $state->id));

        $response->assertStatus(200)
                 ->assertJson(['status' => true]);

        $this->assertDatabaseMissing('states', ['id' => $state->id]);
    }
}
