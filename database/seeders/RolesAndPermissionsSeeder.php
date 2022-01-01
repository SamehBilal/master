<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


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


        // roles permissions
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);
        // permissions permissions
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'edit permissions']);
        // orders permissions
        Permission::create(['name' => 'view orders']);
        Permission::create(['name' => 'show orders']);
        Permission::create(['name' => 'create orders']);
        Permission::create(['name' => 'edit orders']);
        Permission::create(['name' => 'delete orders']);
        Permission::create(['name' => 'create multi orders']);
        // pickups permissions
        Permission::create(['name' => 'view pickups']);
        Permission::create(['name' => 'show pickups']);
        Permission::create(['name' => 'create pickups']);
        Permission::create(['name' => 'edit pickups']);
        Permission::create(['name' => 'delete pickups']);
        // tickets permissions
        Permission::create(['name' => 'view tickets']);
        Permission::create(['name' => 'show tickets']);
        Permission::create(['name' => 'create tickets']);
        Permission::create(['name' => 'edit tickets']);
        Permission::create(['name' => 'delete tickets']);
        // subscribers permissions
        Permission::create(['name' => 'view subscribers']);
        // contact form permissions
        Permission::create(['name' => 'view contact form']);
        // customers permissions
        Permission::create(['name' => 'view customers']);
        Permission::create(['name' => 'show customers']);
        Permission::create(['name' => 'create customers']);
        Permission::create(['name' => 'edit customers']);
        Permission::create(['name' => 'delete customers']);
        // businesses permissions
        Permission::create(['name' => 'view businesses']);
        Permission::create(['name' => 'show businesses']);
        Permission::create(['name' => 'create businesses']);
        Permission::create(['name' => 'edit businesses']);
        Permission::create(['name' => 'delete businesses']);
        // contacts permissions
        Permission::create(['name' => 'view contacts']);
        Permission::create(['name' => 'show contacts']);
        Permission::create(['name' => 'create contacts']);
        Permission::create(['name' => 'edit contacts']);
        Permission::create(['name' => 'delete contacts']);
        // user categories permissions
        Permission::create(['name' => 'view user categories']);
        Permission::create(['name' => 'show user categories']);
        Permission::create(['name' => 'create user categories']);
        Permission::create(['name' => 'edit user categories']);
        Permission::create(['name' => 'delete user categories']);
        // users permissions
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        // currenies permissions
        Permission::create(['name' => 'view currenies']);
        Permission::create(['name' => 'show currenies']);
        Permission::create(['name' => 'create currenies']);
        Permission::create(['name' => 'edit currenies']);
        Permission::create(['name' => 'delete currenies']);
        // locations permissions
        Permission::create(['name' => 'view locations']);
        Permission::create(['name' => 'show locations']);
        Permission::create(['name' => 'create locations']);
        Permission::create(['name' => 'edit locations']);
        Permission::create(['name' => 'delete locations']);



        $admin->givePermissionTo(
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            // permissions permissions
            'view permissions',
            'create permissions',
            'edit permissions',
            // orders permissions
            'view orders',
            'show orders',
            'create orders',
            'edit orders',
            'delete orders',
            'create multi orders',
            // pickups permissions
            'view pickups',
            'show pickups',
            'create pickups',
            'edit pickups',
            'delete pickups',
            // tickets permissions
            'view tickets',
            'show tickets',
            'create tickets',
            'edit tickets',
            'delete tickets',
            // subscribers permissions
            'view subscribers',
            // contact form permissions
            'view contact form',
            // customers permissions
            'view customers',
            'show customers',
            'create customers',
            'edit customers',
            'delete customers',
            // businesses permissions
            'view businesses',
            'show businesses',
            'create businesses',
            'edit businesses',
            'delete businesses',
            // contacts permissions
            'view contacts',
            'show contacts',
            'create contacts',
            'edit contacts',
            'delete contacts',
            // user categories permissions
            'view user categories',
            'show user categories',
            'create user categories',
            'edit user categories',
            'delete user categories',
            // users permissions
            'view users',
            'show users',
            'create users',
            'edit users',
            'delete users',
            // currenies permissions
            'view currenies',
            'show currenies',
            'create currenies',
            'edit currenies',
            'delete currenies',
            // locations permissions
            'view locations',
            'show locations',
            'create locations',
            'edit locations',
            'delete locations');
    }
}
