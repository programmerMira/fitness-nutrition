<?php

namespace Database\Seeders;

use App\Models\MarathonAndProgram;
use Illuminate\Database\Seeder;

class MarathonAndProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MarathonAndProgram::factory()->count(5)->create();
    }
}
