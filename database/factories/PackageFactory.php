<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Store;
use App\Models\Commune;
use App\Models\DeliveryType;
use App\Models\PackageStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'tracking_code' => strtoupper(fake()->unique()->bothify('TRK-####-???')),
            'commune_id' => Commune::inRandomOrder()->first()->id,// lzm t3mrhom
            'delivery_type_id' => DeliveryType::inRandomOrder()->first()->id, //
            'status_id' => PackageStatus::inRandomOrder()->first()->id, //
            'store_id' => Store::factory(), // nrmlm mfroza 3la hsab seed
            'address' => fake()->address,
            'can_be_opened' => fake()->boolean(),
            'name' => fake()->words(2, true),
            'client_first_name' => fake()->firstName, 
            'client_last_name' => fake()->lastName,
            'client_phone' => fake()->phoneNumber,
            'client_phone2' => fake()->optional()->phoneNumber,
            'cod_to_pay' => fake()->randomFloat(2, 0, 5000),
            'commission' => fake()->randomFloat(2, 0, 500),
            'status_updated_at' => now(),
            'delivered_at' => fake()->optional()->dateTimeThisYear(),
            'delivery_price' => fake()->randomFloat(2, 100, 1000),
            'extra_weight_price' => fake()->numberBetween(0, 500),
            'free_delivery' => fake()->boolean(),
            'packaging_price' => fake()->numberBetween(0, 200),
            'partner_cod_price' => fake()->randomFloat(2, 0, 500),
            'partner_delivery_price' => fake()->numberBetween(0, 1000),
            'partner_return' => fake()->randomFloat(2, 0, 1000),
            'price' => fake()->randomFloat(2, 1000, 5000),
            'price_to_pay' => fake()->randomFloat(2, 1000, 5000),
            'return_price' => fake()->numberBetween(0, 500),
            'total_price' => fake()->randomFloat(2, 1500, 8000),
            'weight' => fake()->numberBetween(500, 5000),
        ];
    }
}
