<?php

namespace Database\Seeders;

use App\Models\OrderLog;
use Illuminate\Database\Seeder;

class OrderLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderLog::factory()->count(40)->create();
    }
}
