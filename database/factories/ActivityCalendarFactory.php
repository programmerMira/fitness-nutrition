<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ActivityCalendar;
use App\Models\TrainingUser;

class ActivityCalendarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ActivityCalendar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'training_user_id' => TrainingUser::factory(),
            'day' => $this->faker->numberBetween(-10000, 10000),
            'is_active' => false,
        ];
    }
}
