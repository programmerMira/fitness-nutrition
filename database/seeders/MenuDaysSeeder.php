<?php

namespace Database\Seeders;

use App\Models\MenuDays;
use Illuminate\Database\Seeder;

class MenuDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuDays::factory()->count(5)->create();
    }
}
