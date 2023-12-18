<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => Order::get()->random()->order_id,
            'model_number' => Part::get()->random()->model_number
        ];
    }
}
