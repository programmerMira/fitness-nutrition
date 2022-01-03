<?php

namespace Database\Seeders;

use App\Models\MainPage;
use Illuminate\Database\Seeder;

class MainPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainPage::factory()->count(5)->create();
    }
}
