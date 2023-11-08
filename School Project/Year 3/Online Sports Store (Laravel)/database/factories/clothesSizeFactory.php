<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class clothesSizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'S' => random_int(0, 100),
            'M' => random_int(0, 100),
            'L' => random_int(0, 100),
            'XL' => random_int(0, 100),
            'product_id' => $this->sequence(1),
        ];
    }
}
