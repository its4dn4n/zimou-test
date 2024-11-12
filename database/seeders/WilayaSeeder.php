<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wilaya;
use Illuminate\Support\Facades\File;

class WilayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load the JSON data
        $data = File::get(database_path('data/wilayas_communes.json'));
        $wilayas = json_decode($data, true);

        foreach ($wilayas as $wilaya) {
            Wilaya::create(['name' => $wilaya['name']]);
        }
    }
}
