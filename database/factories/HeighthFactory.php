<?php

namespace Database\Factories;

use App\Models\Heighth;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeighthFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Heighth::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'child_id' => rand(1, 10),
            'height' => rand(50, 180),
            'weight' => rand(2, 80),
        ];
    }
}
