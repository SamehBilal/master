<?php

namespace Database\Seeders;

use App\Models\TicketIssue;
use Illuminate\Database\Seeder;

class TicketIssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $issues = [
            ['issue' => 'COD'],
            ['issue' => 'Delivery Issue'],
            ['issue' => 'Materials'],
            ['issue' => 'Order Modification'],
            ['issue' => 'Other'],
            ['issue' => 'Return Issue'],
            ['issue' => 'Technical Issue'],
        ];

        TicketIssue::insert($issues);
    }
}
