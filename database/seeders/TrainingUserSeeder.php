<?php

namespace Database\Seeders;

use App\Models\TrainingUser;
use Illuminate\Database\Seeder;

class TrainingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TrainingUser::factory()->count(5)->create();
    }
}
