<?php

namespace Database\Factories;

use App\Models\Sleep;
use Illuminate\Database\Eloquent\Factories\Factory;

class SleepFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sleep::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'child_id' => rand(1, 20),
            'start' => $this->faker->dateTime(),
            'end' => $this->faker->dateTime(),
            'comment' => $this->faker->text(30),
        ];
    }
}
