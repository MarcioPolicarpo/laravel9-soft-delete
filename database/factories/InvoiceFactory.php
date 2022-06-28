<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'issue_date' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'customer_name' => $this->faker->name(),
            'customer_email' => $this->faker->safeEmail(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'post_code' => $this->faker->postcode(),
            'tax' => 3,
            'total_items' => $this->faker->numberBetween(1, 36),
            'total_value' => $this->faker->randomFloat(2, 0, 3000),
            //
        ];
    }
}
