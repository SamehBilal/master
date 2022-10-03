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
            TicketIssueSeeder::class,
            //UserCategorySeeder::class,
            //CustomerSeeder::class,
            //LocationSeeder::class,
            //ContactSeeder::class,
            //PickupSeeder::class,
            //OrderSeeder::class,
            //OrderLogSeeder::class,
        ]);

        /*$business = [
            [
                'ar_name' => 'دروبلين',
                'en_name' => 'Droplin',
                'industry' => 'Transportation',
                'store_url' => '',
                'location_id' => 1,
                'business_user_id' => 3,
                'created_at' => now()
            ],
        ];

        \Illuminate\Support\Facades\DB::table('businesses')->insert($business);*/
    }
}
