<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text'=> $this->faker->text(100),
            'consultation_id' => rand(50, 60)
        ];
    }
}
