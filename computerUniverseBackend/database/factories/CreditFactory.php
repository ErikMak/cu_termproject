<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreditFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'init_payment' => round($this->faker->numberBetween(100, 900), -1),
            'payment' => round($this->faker->numberBetween(100, 900), -1)
        ];
    }
}
