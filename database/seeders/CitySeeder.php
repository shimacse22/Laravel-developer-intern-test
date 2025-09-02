<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cities')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $cities = [
            'California' => ['Los Angeles', 'San Francisco', 'San Diego'],
            'Texas' => ['Houston', 'Dallas', 'Austin'],
            'New York' => ['New York City', 'Buffalo', 'Rochester'],
            
            'Ontario' => ['Toronto', 'Ottawa', 'Hamilton'],
            'Quebec' => ['Montreal', 'Quebec City', 'Laval'],
            
            'Maharashtra' => ['Mumbai', 'Pune', 'Nagpur'],
            'Delhi' => ['New Delhi', 'Dwarka', 'Rohini'],
            
            'Dhaka' => ['Dhaka City', 'Narayanganj', 'Gazipur'],
            'Chittagong' => ['Chattogram City', 'Cox’s Bazar', 'Rangamati'],
        ];

        foreach ($cities as $stateName => $cityNames) {
            $state = State::where('name', $stateName)->first();

            if ($state) {
                foreach ($cityNames as $cityName) {
                    City::create([
                        'state_id' => $state->id,
                        'name' => $cityName,
                    ]);
                }
            }
        }
    }
}
