<?php

namespace Database\Seeders;

use App\Models\FoodCalendar;
use Illuminate\Database\Seeder;

class FoodCalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodCalendar::factory()->count(5)->create();
    }
}
