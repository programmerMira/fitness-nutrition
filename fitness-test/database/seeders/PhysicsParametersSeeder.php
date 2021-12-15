<?php

namespace Database\Seeders;

use App\Models\PhysicsParameters;
use Illuminate\Database\Seeder;

class PhysicsParametersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhysicsParameters::factory()->count(5)->create();
    }
}
