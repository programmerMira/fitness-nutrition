<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pricing;

class PricingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pricing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'month' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'number' => $this->faker->randomFloat(0, 0, 9999999999.),
            'price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'discount' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
