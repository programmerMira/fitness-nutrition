<?php

namespace Database\Seeders;

use App\Models\ProblemZone;
use Illuminate\Database\Seeder;

class ProblemZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProblemZone::factory()->count(5)->create();
    }
}
