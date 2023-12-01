<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarehouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    use CustomFaker;

    public function definition()
    {
        $this->setFakerInstance($this->faker);

        return [
            'address' => $this->generateAddress(),
            'director' => Staff::factory()
        ];
    }
}
