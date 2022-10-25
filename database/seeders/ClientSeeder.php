<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::factory()->count(20)->create();
    }
}
