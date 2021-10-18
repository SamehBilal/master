<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles
        Role::create(['name' => 'Super Admin']);
        $admin      = Role::create(['name' => 'admin']);
        $staff      = Role::create(['name' => 'staff']);
        $customer   = Role::create(['name' => 'customer']);


        /*// stage permissions
        Permission::create(['name' => 'view stages']);
        Permission::create(['name' => 'show stages']);
        Permission::create(['name' => 'create stages']);
        Permission::create(['name' => 'edit stages']);
        Permission::create(['name' => 'delete stages']);
        // classes permissions
        Permission::create(['name' => 'view classes']);
        Permission::create(['name' => 'show classes']);
        Permission::create(['name' => 'create classes']);
        Permission::create(['name' => 'edit classes']);
        Permission::create(['name' => 'delete classes']);
        //course permissions
        Permission::create(['name' => 'view courses']);
        Permission::create(['name' => 'show courses']);
        Permission::create(['name' => 'create courses']);
        Permission::create(['name' => 'edit courses']);
        Permission::create(['name' => 'delete courses']);
        //admins page permissions
        Permission::create(['name' => 'view admins']);
        Permission::create(['name' => 'show admins']);
        Permission::create(['name' => 'create admins']);
        Permission::create(['name' => 'edit admins']);
        Permission::create(['name' => 'delete admins']);
        Permission::create(['name' => 'view deleted admins']);
        Permission::create(['name' => 'restore deleted admins']);
        Permission::create(['name' => 'force delete admins']);
        //staff page permissions
        Permission::create(['name' => 'view staff']);
        Permission::create(['name' => 'show staff']);
        Permission::create(['name' => 'create staff']);
        Permission::create(['name' => 'edit staff']);
        Permission::create(['name' => 'delete staff']);
        Permission::create(['name' => 'view deleted staff']);
        Permission::create(['name' => 'restore deleted staff']);
        Permission::create(['name' => 'force delete staff']);
        //teacher page permissions
        Permission::create(['name' => 'view teachers']);
        Permission::create(['name' => 'show teachers']);
        Permission::create(['name' => 'create teachers']);
        Permission::create(['name' => 'edit teachers']);
        Permission::create(['name' => 'delete teachers']);
        Permission::create(['name' => 'view deleted teachers']);
        Permission::create(['name' => 'restore deleted teachers']);
        Permission::create(['name' => 'force delete teachers']);
        //students page permissions
        Permission::create(['name' => 'view students']);
        Permission::create(['name' => 'show students']);
        Permission::create(['name' => 'create students']);
        Permission::create(['name' => 'edit students']);
        Permission::create(['name' => 'delete students']);
        Permission::create(['name' => 'view deleted students']);
        Permission::create(['name' => 'restore deleted students']);
        Permission::create(['name' => 'force delete students']);
        //parents page permissions
        Permission::create(['name' => 'view parents']);
        Permission::create(['name' => 'show parents']);
        Permission::create(['name' => 'create parents']);
        Permission::create(['name' => 'edit parents']);
        Permission::create(['name' => 'delete parents']);
        Permission::create(['name' => 'view deleted parents']);
        Permission::create(['name' => 'restore deleted parents']);
        Permission::create(['name' => 'force delete parents']);
        //materials page permissions
        Permission::create(['name' => 'view materials']);
        Permission::create(['name' => 'show materials']);
        Permission::create(['name' => 'create materials']);
        Permission::create(['name' => 'edit materials']);
        Permission::create(['name' => 'delete materials']);
        //sessions permissions
        Permission::create(['name' => 'create sessions']);
        Permission::create(['name' => 'edit sessions']);
        //admissions permissions
        Permission::create(['name' => 'view admissions']);
        Permission::create(['name' => 'show admissions']);
        Permission::create(['name' => 'create admissions']);
        Permission::create(['name' => 'edit admissions']);
        Permission::create(['name' => 'delete admissions']);
        //interestforms permissions
        Permission::create(['name' => 'view interestforms']);
        Permission::create(['name' => 'show interestforms']);
        Permission::create(['name' => 'create interestforms']);
        Permission::create(['name' => 'edit interestforms']);
        Permission::create(['name' => 'delete interestforms']);
        //attendance permisions
        Permission::create(['name' => 'view attendances']);
        Permission::create(['name' => 'create attendances']);
        //assignments permissions
        Permission::create(['name' => 'view assignments']);
        Permission::create(['name' => 'show assignments']);
        Permission::create(['name' => 'create assignments']);
        Permission::create(['name' => 'edit assignments']);
        Permission::create(['name' => 'delete assignments']);
        //assignment responses permissions
        Permission::create(['name' => 'view assignment_responses']);
        Permission::create(['name' => 'show assignment_responses']);
        Permission::create(['name' => 'create assignment_responses']);
        Permission::create(['name' => 'edit assignment_responses']);
        Permission::create(['name' => 'delete assignment_responses']);
        //announcements permissions
        Permission::create(['name' => 'view announcements']);
        Permission::create(['name' => 'show announcements']);
        Permission::create(['name' => 'create announcements']);
        Permission::create(['name' => 'edit announcements']);
        Permission::create(['name' => 'delete announcements']);
        //school events permissions
        Permission::create(['name' => 'view school_events']);
        Permission::create(['name' => 'show school_events']);
        Permission::create(['name' => 'create school_events']);
        Permission::create(['name' => 'edit school_events']);
        Permission::create(['name' => 'delete school_events']);
        //meetings permissions
        Permission::create(['name' => 'view meetings']);
        Permission::create(['name' => 'show meetings']);
        Permission::create(['name' => 'create meetings']);
        Permission::create(['name' => 'edit meetings']);
        Permission::create(['name' => 'delete meetings']);
        //exams permissions
        Permission::create(['name' => 'view exams']);
        Permission::create(['name' => 'show exams']);
        Permission::create(['name' => 'create exams']);
        Permission::create(['name' => 'edit exams']);
        Permission::create(['name' => 'delete exams']);
        // gradebook permissions
        Permission::create(['name' => 'view gradebook']);
        Permission::create(['name' => 'show gradebook']);
        Permission::create(['name' => 'create gradebook']);
        Permission::create(['name' => 'edit gradebook']);
        Permission::create(['name' => 'delete gradebook']);
        // sessionTimes permissions
        Permission::create(['name' => 'view session_time']);
        Permission::create(['name' => 'show session_time']);
        Permission::create(['name' => 'create session_time']);
        Permission::create(['name' => 'edit session_time']);
        Permission::create(['name' => 'delete session_time']);

        // financial permissions
        Permission::create(['name' => 'view accounts']);
        Permission::create(['name' => 'create accounts']);
        Permission::create(['name' => 'edit accounts']);
        Permission::create(['name' => 'delete accounts']);

        Permission::create(['name' => 'view items']);
        Permission::create(['name' => 'create items']);
        Permission::create(['name' => 'edit items']);
        Permission::create(['name' => 'delete items']);

        Permission::create(['name' => 'view journals']);
        Permission::create(['name' => 'show journals']);
        Permission::create(['name' => 'create journals']);
        Permission::create(['name' => 'delete journals']);

        Permission::create(['name' => 'view invoices']);
        Permission::create(['name' => 'show invoices']);
        Permission::create(['name' => 'create invoices']);
        Permission::create(['name' => 'edit invoices']);
        Permission::create(['name' => 'delete invoices']);

        Permission::create(['name' => 'view recieve payment']);
        Permission::create(['name' => 'show recieve payment']);
        Permission::create(['name' => 'create recieve payment']);
        Permission::create(['name' => 'edit recieve payment']);
        Permission::create(['name' => 'delete recieve payment']);

        Permission::create(['name' => 'view pay bills']);
        Permission::create(['name' => 'show pay bills']);
        Permission::create(['name' => 'create pay bills']);
        Permission::create(['name' => 'edit pay bills']);
        Permission::create(['name' => 'delete pay bills']);

        Permission::create(['name' => 'view suppliers']);
        Permission::create(['name' => 'show suppliers']);
        Permission::create(['name' => 'create suppliers']);
        Permission::create(['name' => 'edit suppliers']);
        Permission::create(['name' => 'delete suppliers']);*/

        /*$admin->givePermissionTo(
            'view stages',
            'show stages',
            'create stages',
            'edit stages',
            'delete stages',
            'view classes',
            'show classes',
            'create classes',
            'edit classes',
            'delete classes',
            'view courses',
            'show courses',
            'create courses',
            'edit courses',
            'delete courses',
            'view admins',
            'show admins',
            'create admins',
            'edit admins',
            'delete admins',
            'view deleted admins',
            'restore deleted admins',
            'force delete admins',
            'view staff',
            'show staff',
            'create staff',
            'edit staff',
            'delete staff',
            'view deleted staff',
            'restore deleted staff',
            'force delete staff',
            'view teachers',
            'show teachers',
            'create teachers',
            'edit teachers',
            'delete teachers',
            'view deleted teachers',
            'restore deleted teachers',
            'force delete teachers',
            'view students',
            'show students',
            'create students',
            'edit students',
            'delete students',
            'view deleted students',
            'restore deleted students',
            'force delete students',
            'view parents',
            'show parents',
            'create parents',
            'edit parents',
            'delete parents',
            'view deleted parents',
            'restore deleted parents',
            'force delete parents',
            'view materials',
            'show materials',
            'create materials',
            'edit materials',
            'delete materials',
            'create sessions',
            'edit sessions',
            'view admissions',
            'show admissions',
            'create admissions',
            'edit admissions',
            'delete admissions',
            'view interestforms',
            'show interestforms',
            'create interestforms',
            'edit interestforms',
            'delete interestforms',
            'view attendances',
            'create attendances',
            'view assignments',
            'show assignments',
            'create assignments',
            'edit assignments',
            'delete assignments',
            'view assignment_responses',
            'show assignment_responses',
            'create assignment_responses',
            'edit assignment_responses',
            'delete assignment_responses',
            'view announcements',
            'show announcements',
            'create announcements',
            'edit announcements',
            'delete announcements',
            'view school_events',
            'show school_events',
            'create school_events',
            'edit school_events',
            'delete school_events',
            'view meetings',
            'show meetings',
            'create meetings',
            'edit meetings',
            'delete meetings',
            'view exams',
            'show exams',
            'create exams',
            'edit exams',
            'delete exams',
            'view gradebook',
            'show gradebook',
            'create gradebook',
            'edit gradebook',
            'delete gradebook',
            'view session_time',
            'show session_time',
            'create session_time',
            'edit session_time',
            'delete session_time');

        $teacher->givePermissionTo('view assignments'         ,
            'show assignments'         ,
            'create assignments'       ,
            'edit assignments'         ,
            'delete assignments'       ,
            'view attendances'         ,
            'create attendances'       ,
            'view classes'             ,
            'show classes'             ,
            'view materials'           ,
            'show materials'           ,
            'create materials'         ,
            'edit materials'           ,
            'delete materials'         ,
            'view assignment_responses',
            'show assignment_responses',
            'delete assignment_responses',
            'view meetings'            ,
            'show meetings'            ,
            'create meetings'          ,
            'view exams'               ,
            'show exams'               ,
            'create exams'             ,
            'edit exams'               ,
            'delete exams'             ,

        );
        $student->givePermissionTo('view assignments'       ,
            'show assignments'          ,
            'show classes'              ,
            'view materials'            ,
            'show materials'            ,
            'show assignment_responses' ,
            'create assignment_responses',
            'view meetings'             ,
            'show meetings'             ,
        );
        $HR->givePermissionTo('view attendances'       ,
            'create attendances'          ,
            'view staff',
            'show staff',
            'create staff',
            'edit staff',
            'delete staff',
            'view teachers',
            'show teachers',
            'create teachers',
            'edit teachers',
            'delete teachers',
            'view students',
            'show students',
            'create students',
            'edit students',
            'delete students',
            'view parents',
            'show parents',
            'create parents',
            'edit parents',
            'delete parents',
    );
        $schoolCoordinator->givePermissionTo(
            'view classes',
            'view session_time',
            'show session_time',
            'create session_time',
            'edit session_time',
            'delete session_time',
            'create sessions',
            'edit sessions',
            'view admissions',
            'show admissions',
            'create admissions',
            'edit admissions',
            'delete admissions',
    );
        $Accounting->givePermissionTo(
            'view items',
            'create items',
            'edit items',
            'view journals',
            'show journals',
            'create journals',
            'view invoices',
            'show invoices',
            'create invoices',
            'edit invoices',
            'view recieve payment',
            'show recieve payment',
            'create recieve payment',
            'view pay bills',
            'show pay bills',
            'create pay bills',
            'view suppliers',
            'show suppliers',
            'create suppliers',
    );
        $HOD->givePermissionTo(
            'view teachers',
            'show teachers'
        );
        $Admission->givePermissionTo(
            'view admissions',
            'show admissions',
            'create admissions',
            'edit admissions',
    );*/

    }
}
