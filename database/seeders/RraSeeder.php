<?php

namespace Database\Seeders;

use App\Models\Rra;
use Illuminate\Database\Seeder;

class RraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rra::factory()
            ->count(10)
            ->create();
    }
}
