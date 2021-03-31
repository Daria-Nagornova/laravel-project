<?php

namespace Database\Factories;

use App\Models\Consultation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ConsultationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consultation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text'  => $this->faker->text(100),
            'user_id' => rand(1, 10),
            'doctor_id' => rand(1, 10),
            'email'  => $this->faker->email,
            'status'  => $this->faker->text(10),
        ];
    }
}
