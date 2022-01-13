<?php

namespace Database\Seeders;

use App\Models\Pickup;
use Illuminate\Database\Seeder;

class PickupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pickup::factory()->count(5)->create();
    }
}
