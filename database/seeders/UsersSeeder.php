<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create super admin
        $superadmin = User::create([
            'first_name'        => 'Super',
            'last_name'         => 'Admin',
            'full_name'         => 'Super Admin',
            'email'             => 'superadmin@droplin.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Tz8KW1vWlv6yyyBSFNnZLup0H3om2N24BvAR29sGSeQT5XmX8MbFK', // 123456789
        ]);
        $superadmin->assignRole('Super Admin');

        // create admin
        $admin = User::create([
            'first_name'        => 'Admin',
            'last_name'         => 'Droplin',
            'full_name'         => 'Admin Droplin',
            'email'             => 'admin@droplin.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Tz8KW1vWlv6yyyBSFNnZLup0H3om2N24BvAR29sGSeQT5XmX8MbFK', // 123456789
        ]);
        $admin->assignRole('admin');

        // create customer
        $admin = User::create([
            'first_name'        => 'Customer',
            'last_name'         => 'Droplin',
            'full_name'         => 'Customer Droplin',
            'email'             => 'customer@droplin.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Tz8KW1vWlv6yyyBSFNnZLup0H3om2N24BvAR29sGSeQT5XmX8MbFK', // 123456789
        ]);
        $admin->assignRole('customer');

        // create sales
        $admin = User::create([
            'first_name'        => 'Sales',
            'last_name'         => 'Droplin',
            'full_name'         => 'Sales Droplin',
            'email'             => 'sales@droplin.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Tz8KW1vWlv6yyyBSFNnZLup0H3om2N24BvAR29sGSeQT5XmX8MbFK', // 123456789
        ]);
        $admin->assignRole('sales');

        // create finance
        $admin = User::create([
            'first_name'        => 'Finance',
            'last_name'         => 'Droplin',
            'full_name'         => 'Finance Droplin',
            'email'             => 'finance@droplin.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Tz8KW1vWlv6yyyBSFNnZLup0H3om2N24BvAR29sGSeQT5XmX8MbFK', // 123456789
        ]);
        $admin->assignRole('finance');

        // create operation admin
        $admin = User::create([
            'first_name'        => 'Operation',
            'last_name'         => 'Admin',
            'full_name'         => 'Operation Admin',
            'email'             => 'operation_admin@droplin.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Tz8KW1vWlv6yyyBSFNnZLup0H3om2N24BvAR29sGSeQT5XmX8MbFK', // 123456789
        ]);
        $admin->assignRole('operation admin');

        // create operation logistics
        $admin = User::create([
            'first_name'        => 'Operation',
            'last_name'         => 'Logistics',
            'full_name'         => 'Operation Logistics',
            'email'             => 'operation_logistics@droplin.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Tz8KW1vWlv6yyyBSFNnZLup0H3om2N24BvAR29sGSeQT5XmX8MbFK', // 123456789
        ]);
        $admin->assignRole('operation logistics');

        // create operation courier
        $admin = User::create([
            'first_name'        => 'Operation',
            'last_name'         => 'Courier',
            'full_name'         => 'Operation Courier',
            'email'             => 'operation_courier@droplin.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Tz8KW1vWlv6yyyBSFNnZLup0H3om2N24BvAR29sGSeQT5XmX8MbFK', // 123456789
        ]);
        $admin->assignRole('operation courier');

        User::factory()->count(18)->create();
    }
}
