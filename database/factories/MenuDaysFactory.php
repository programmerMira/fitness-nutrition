<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\MenuDays;

class MenuDaysFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MenuDays::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'menu_id' => Menu::factory(),
            'day_number' => $this->faker->numberBetween(-10000, 10000),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'content' => '{}',
            'info' => '{}',
        ];
    }
}
