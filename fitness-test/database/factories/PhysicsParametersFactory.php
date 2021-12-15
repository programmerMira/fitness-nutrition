<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\PhysicsParameters;
use App\Models\User;

class PhysicsParametersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PhysicsParameters::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'weight' => $this->faker->randomFloat(0, 0, 9999999999.),
            'height' => $this->faker->randomFloat(0, 0, 9999999999.),
            'dream_weight' => $this->faker->randomFloat(0, 0, 9999999999.),
            'hips_cm' => $this->faker->randomFloat(0, 0, 9999999999.),
            'waist_cm' => $this->faker->randomFloat(0, 0, 9999999999.),
            'chest_cm' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
