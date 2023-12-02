<?php

namespace Database\Factories;

use App\Models\Software;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartFactory extends Factory
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
            'category' => $this->generateCategory(),
            'name' => $this->generatePartName(),
            'manufacturer' => $this->generatePartManufacturer(),
            'price' => round($this->faker->numberBetween(1000, 9000), -2),
            'warranty' => $this->faker->numberBetween(6, 12) . ' месяцев',
            'device_id' => Software::factory(),
        ];
    }
}
