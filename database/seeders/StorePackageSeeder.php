<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Package;

class StorePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 5,000 stores
        Store::factory(5000)->create()->each(function ($store) {
            // For each store, create 100 packages
            Package::factory(100)->create([
                'store_id' => $store->id,
            ]);
        });
    }
}
