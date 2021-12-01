<?php

namespace Database\Seeders;

use App\Models\UserMenu;
use Illuminate\Database\Seeder;

class UserMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserMenu::factory()->count(5)->create();
    }
}
