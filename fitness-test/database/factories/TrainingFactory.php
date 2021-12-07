<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Training;
use App\Models\TrainingLocation;

class TrainingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Training::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'training_location_id' => TrainingLocation::factory(),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'training_days' => '{}',
            'training_price' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
