<?php

namespace Database\Seeders;

use App\Models\AccessHistory;
use Illuminate\Database\Seeder;

class AccessHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccessHistory::factory()->count(5)->create();
    }
}
