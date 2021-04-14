<?php

namespace Database\Factories;

use App\Models\Feeding;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FeedingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feeding::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'child_id' => rand(1, 10),
            'time' => $this->faker->dateTime(),
            'products' => $this->faker->text(30),
        ];
    }
}
