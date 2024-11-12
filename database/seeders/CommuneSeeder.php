<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Commune;
use App\Models\Wilaya;
use Illuminate\Support\Facades\File;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load the JSON data
        $data = File::get(database_path('data/wilayas_communes.json'));
        $wilayas = json_decode($data, true);

        foreach ($wilayas as $wilayaData) {
            $wilaya = Wilaya::where('name', $wilayaData['name'])->first();

            foreach ($wilayaData['communes'] as $commune) {
                Commune::create([
                    'name' => $commune,
                    'wilaya_id' => $wilaya->id,
                ]);
            }
        }
    }
}
