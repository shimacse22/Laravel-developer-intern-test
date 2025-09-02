<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(); // Seed countries
    }

    public function test_can_create_country_via_ajax()
    {
        $this->withoutMiddleware();

        $response = $this->postJson(route('countries.store'), [
            'name' => 'New Country',
            'iso_code' => 'NC',
        ]);

        $response->assertStatus(200)
                 ->assertJson(['status' => true]);

        $this->assertDatabaseHas('countries', [
            'name' => 'New Country',
            'iso_code' => 'NC',
        ]);
    }

    public function test_cannot_create_country_without_required_fields()
    {
        $this->withoutMiddleware();

        $response = $this->postJson(route('countries.store'), []);

        $response->assertStatus(200)
                 ->assertJson(['status' => false])
                 ->assertJsonStructure(['errors' => ['name', 'iso_code']]);
    }

    public function test_can_update_country_via_ajax()
    {
        $this->withoutMiddleware();

        $country = Country::first();

        $response = $this->putJson(route('countries.update', $country->id), [
            'name' => $country->name . ' Updated',
            'iso_code' => $country->iso_code,
        ]);

        $response->assertStatus(200)
                 ->assertJson(['status' => true]);

        $this->assertDatabaseHas('countries', [
            'id' => $country->id,
            'name' => $country->name . ' Updated',
        ]);
    }

    public function test_can_delete_country_via_ajax()
    {
        $this->withoutMiddleware();

        $country = Country::first();

        $response = $this->deleteJson(route('countries.destroy', $country->id));

        $response->assertStatus(200)
                 ->assertJson(['status' => true]);

        $this->assertDatabaseMissing('countries', ['id' => $country->id]);
    }
}
