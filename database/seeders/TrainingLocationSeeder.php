<?php

namespace Database\Seeders;

use App\Models\TrainingLocation;
use Illuminate\Database\Seeder;

class TrainingLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TrainingLocation::factory()->count(5)->create();
    }
}
