<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeliveryType;

class DeliveryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeliveryType::insert([
            ['name' => 'Standard'],
            ['name' => 'Express'],
            ['name' => 'Same Day'],
        ]);
    }
}
