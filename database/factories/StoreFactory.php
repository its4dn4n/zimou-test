<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => strtoupper(fake()->unique()->bothify('??####')),
            'name' => fake()->company,
            'email' => fake()->unique()->companyEmail,
            'phones' => fake()->phoneNumber,
            'company_name' => fake()->company,
            'capital' => fake()->randomElement(['100,000 DZD', '500,000 DZD', '1,000,000 DZD']),
            'address' => fake()->address,
            'register_commerce_number' => fake()->bothify('RC####'),
            'nif' => fake()->bothify('NIF########'),
            'legal_form' => fake()->randomElement([1, 2, 3]),
            'status' => 1,
            'can_update_preparing_packages' => fake()->boolean(),
        ];
    }
}
