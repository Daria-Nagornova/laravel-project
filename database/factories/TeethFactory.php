<?php

namespace Database\Factories;

use App\Models\Teeth;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeethFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teeth::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'child_id' => rand(1, 20),
            'date' => $this->faker->date(),
            'name' => $this->faker->text(10),
        ];
    }
}
