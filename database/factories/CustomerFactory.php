<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_code' => 'CUS-' . fake()->unique()->numerify('#####'),
            'name' => fake()->company(),
            'email' => fake()->unique()->companyEmail(),
            'phone' => fake()->phoneNumber(),
            'tax_number' => fake()->unique()->numerify('TAX-########'),
            'billing_address' => fake()->address(),
            'is_active' => fake()->boolean(90), 
            'created_by'=>null,
        ];
    }
}
