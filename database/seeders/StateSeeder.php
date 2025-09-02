<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('states')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $states = [
            'United States' => ['California', 'Texas', 'New York'],
            'Canada' => ['Ontario', 'Quebec', 'British Columbia'],
            'India' => ['Maharashtra', 'Delhi', 'Karnataka'],
            'Bangladesh' => ['Dhaka', 'Chittagong', 'Khulna'],
        ];

        foreach ($states as $countryName => $stateNames) {
            $country = Country::where('name', $countryName)->first();

            if ($country) {
                foreach ($stateNames as $stateName) {
                    State::create([
                        'country_id' => $country->id,
                        'name' => $stateName,
                    ]);
                }
            }
        }
    }
}
