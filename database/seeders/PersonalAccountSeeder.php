<?php

namespace Database\Seeders;

use App\Models\PersonalAccount;
use Illuminate\Database\Seeder;

class PersonalAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonalAccount::factory()->count(5)->create();
    }
}
