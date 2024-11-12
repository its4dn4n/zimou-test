<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\PackageStatus;

class PackageStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'Pending',
            'Preparing',
            'Shipped',
            'In Transit',
            'Out for Delivery',
            'Delivered',
            'Returned',
            'Cancelled',
            'Failed Delivery',
            'Awaiting Payment'
        ];

        foreach ($statuses as $status) {
            PackageStatus::create(['name' => $status]);
        }
    }
}
