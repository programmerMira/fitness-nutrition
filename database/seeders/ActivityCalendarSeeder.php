<?php

namespace Database\Seeders;

use App\Models\ActivityCalendar;
use Illuminate\Database\Seeder;

class ActivityCalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityCalendar::factory()->count(5)->create();
    }
}
