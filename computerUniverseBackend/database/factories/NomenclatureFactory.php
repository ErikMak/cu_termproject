<?php

namespace Database\Factories;

use App\Models\Part;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class NomenclatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model_number' => Part::factory(),
            'warehouse' => Warehouse::factory(),
            'is_exist' =>  $this->faker->boolean()
        ];
    }
}
