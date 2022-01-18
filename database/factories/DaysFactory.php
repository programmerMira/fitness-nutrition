<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Days;
use App\Models\Training;

class DaysFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Days::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'training_id' => Training::factory(),
            'day_number' => $this->faker->numberBetween(-10000, 10000),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'videos' => '{}',
            'info'=>'{}',
        ];
    }
}
