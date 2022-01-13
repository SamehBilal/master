<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            UsersSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            UserCategorySeeder::class,
            CustomerSeeder::class,
            TicketIssueSeeder::class,
            LocationSeeder::class,
            ContactSeeder::class,
            PickupSeeder::class,
            OrderSeeder::class,
            OrderLogSeeder::class,
        ]);
    }
}
