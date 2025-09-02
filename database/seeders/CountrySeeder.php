<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('countries')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    DB::table('countries')->insert([
    ['name' => 'Bangladesh', 'iso_code' => 'BD'],
    ['name' => 'India', 'iso_code' => 'IN'],
    ['name' => 'Pakistan', 'iso_code' => 'PK'],
    ['name' => 'Nepal', 'iso_code' => 'NP'],
    ['name' => 'Sri Lanka', 'iso_code' => 'LK'],
    ['name' => 'Bhutan', 'iso_code' => 'BT'],
    ['name' => 'Maldives', 'iso_code' => 'MV'],
    ['name' => 'United States', 'iso_code' => 'US'],
    ['name' => 'United Kingdom', 'iso_code' => 'UK'],
    ['name' => 'Canada', 'iso_code' => 'CA'],
    ['name' => 'Australia', 'iso_code' => 'AU'],
    ['name' => 'Germany', 'iso_code' => 'DE'],
    ['name' => 'France', 'iso_code' => 'FR'],
    ['name' => 'Italy', 'iso_code' => 'IT'],
    ['name' => 'Spain', 'iso_code' => 'ES'],
    ['name' => 'Netherlands', 'iso_code' => 'NL'],
    ['name' => 'Switzerland', 'iso_code' => 'CH'],
    ['name' => 'Japan', 'iso_code' => 'JP'],
    ['name' => 'China', 'iso_code' => 'CN'],
    ['name' => 'Singapore', 'iso_code' => 'SG'],
    ['name' => 'Malaysia', 'iso_code' => 'MY'],
    ['name' => 'Thailand', 'iso_code' => 'TH'],
    ['name' => 'Indonesia', 'iso_code' => 'ID'],
    ['name' => 'Philippines', 'iso_code' => 'PH'],
    ['name' => 'Brazil', 'iso_code' => 'BR'],
    ['name' => 'Mexico', 'iso_code' => 'MX'],
    ['name' => 'South Africa', 'iso_code' => 'ZA'],
    ['name' => 'Nigeria', 'iso_code' => 'NG'],
    ['name' => 'Kenya', 'iso_code' => 'KE'],
    ]);
    }
}
