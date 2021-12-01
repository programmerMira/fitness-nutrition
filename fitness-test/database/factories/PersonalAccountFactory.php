<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LifeStyle;
use App\Models\MenuCalory;
use App\Models\PersonalAccount;
use App\Models\ProblemZone;
use App\Models\TrainingLocation;
use App\Models\User;

class PersonalAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonalAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'age' => $this->faker->numberBetween(-10000, 10000),
            'weight' => $this->faker->randomFloat(0, 0, 9999999999.),
            'height' => $this->faker->randomFloat(0, 0, 9999999999.),
            'dream_weight' => $this->faker->randomFloat(0, 0, 9999999999.),
            'life_style_id' => LifeStyle::factory(),
            'problem_zone_id' => ProblemZone::factory(),
            'training_location_id' => TrainingLocation::factory(),
            'menu_calories_id' => MenuCalory::factory(),
            'hips_cm' => $this->faker->randomFloat(0, 0, 9999999999.),
            'waist_cm' => $this->faker->randomFloat(0, 0, 9999999999.),
            'chest_cm' => $this->faker->randomFloat(0, 0, 9999999999.),
            'photos' => '{}',
        ];
    }
}
