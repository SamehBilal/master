<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\UserCategory;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class, 20)->create();
    }
}
