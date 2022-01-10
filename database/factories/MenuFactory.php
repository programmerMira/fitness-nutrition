<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\MenuCalory;
use App\Models\MenuType;

class MenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'menu_type_id' => MenuType::factory(),
            'menu_calories_id' => MenuCalory::factory(),
            'menu_content' => $this->faker->name,
            'menu_price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'proteins' => $this->faker->randomFloat(0, 0, 9999999999.),
            'fat' => $this->faker->randomFloat(0, 0, 9999999999.),
            'carbs' => $this->faker->randomFloat(0, 0, 9999999999.),
            'info' => '{}',
        ];
    }
}
