<?php

namespace Database\Seeders;

use App\Models\MenuCalory;
use Illuminate\Database\Seeder;

class MenuCalorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MenuCalory::factory()->count(5)->create();
    }
}
