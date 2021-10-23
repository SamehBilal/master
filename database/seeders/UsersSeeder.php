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
        $superadmin2 = User::create([
            'first_name'         => 'Osama',
            'last_name'          => 'Fathy',
            'full_name'          => 'Osama Fathy',
            'email'             => 'osama.fathy@meis-eg.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Tz8KW1vWlv6yyyBSFNnZLup0H3om2N24BvAR29sGSeQT5XmX8MbFK', // 123456789
        ]);
        $superadmin2->assignRole('Super Admin');

        // create admins
        $admin1 = User::create([
            'first_name'         => 'Ahmed',
            'last_name'          => 'Osama',
            'full_name'          => 'Ahmed Osama',
            'email'             => 'ahmedo.fathy@meis-eg.com',
            'email_verified_at' => now(),
            'password'          => '$2y$10$Tz8KW1vWlv6yyyBSFNnZLup0H3om2N24BvAR29sGSeQT5XmX8MbFK', // 123456789
        ]);
        $admin1->assignRole('admin');

        User::factory()->count(18)->create();
        /*$staff_json = File::get("database/data/meisStaff.json");
        $staffData = json_decode($staff_json);

        foreach ($staffData as $obj) {
            $nameArr = explode(' ',$obj->Name);
            $user = User::create([
                'firstname'         => $nameArr[0],
                'lastname'          => $nameArr[1],
                'fullname'          => $obj->Name,
                'email'             => $obj->Mail,
                'email_verified_at' => now(),
                'password'          => '$2y$10$Tz8KW1vWlv6yyyBSFNnZLup0H3om2N24BvAR29sGSeQT5XmX8MbFK', // 123456789
            ]);
            if (in_array($obj->Title, ['School Coordinator','HOD','Admission','HR','Accountant'])) {
                $user->assignRole('staff');

                if ($obj->Title == 'School Coordinator') {
                    $position = 'School Coordinator';
                    $user->assignRole('School Coordinator');

                }elseif ($obj->Title == 'HOD') {
                    $position = 'HOD';
                    $user->assignRole('HOD');

                }elseif ($obj->Title == 'Admission') {
                    $position = 'Admission';
                    $user->assignRole('Admission');

                }elseif ($obj->Title == 'HR') {
                    $position = 'H.R';
                    $user->assignRole('H.R');

                }elseif ($obj->Title == 'Accountant') {
                    $position = 'Accounting';
                    $user->assignRole('Accounting');
                }
                Staff::create([
                    'user_id'   => $user->id,
                    'position'  => $position
                ]);
            }else{
                Teacher::create([
                    'user_id'           => $user->id,
                ]);
                $user->assignRole('teacher');
            }

        }*/
    }
}
