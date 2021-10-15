<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            ['name' => 'EGP',   'rate' => '1', 'created_at' => now()],
            ['name' => 'USD',   'rate' => '1', 'created_at' => now() ],
            ['name' => 'EUR',   'rate' => '1', 'created_at' => now() ],
        ];

        \Illuminate\Support\Facades\DB::table('currencies')->insert($currencies);
    }
}
