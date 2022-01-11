<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Training;
use App\Models\TrainingLocation;
use App\Models\ProblemZone;

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
            'level' => $this->faker->random_int(0,99999),
            'training_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'problem_zone_id'=> ProblemZone::factory(),
            'info'=>'{}',
        ];
    }
}
