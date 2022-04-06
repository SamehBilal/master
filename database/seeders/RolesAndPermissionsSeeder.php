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
        $super_admin            = Role::create(['name' => 'Super Admin']);
        $admin                  = Role::create(['name' => 'admin']);
        $sales                  = Role::create(['name' => 'sales']);
        $finance                = Role::create(['name' => 'finance']);
        $operation_admin        = Role::create(['name' => 'operation admin']);
        $operation_logistics    = Role::create(['name' => 'operation logistics']);
        $operation_courier      = Role::create(['name' => 'operation courier']);
        $customer               = Role::create(['name' => 'customer']);


        // roles permissions
        Permission::create(['name' => 'view roles', "order" => 1]);
        Permission::create(['name' => 'create roles', "order" => 1]);
        Permission::create(['name' => 'edit roles', "order" => 1]);
        Permission::create(['name' => 'delete roles', "order" => 1]);
        // permissions permissions
        Permission::create(['name' => 'view permissions', "order" => 2]);
        Permission::create(['name' => 'create permissions', "order" => 2]);
        Permission::create(['name' => 'edit permissions', "order" => 2]);
        // orders permissions
        Permission::create(['name' => 'view orders', "order" => 3]);
        Permission::create(['name' => 'show orders', "order" => 3]);
        Permission::create(['name' => 'create orders', "order" => 3]);
        Permission::create(['name' => 'edit orders', "order" => 3]);
        Permission::create(['name' => 'delete orders', "order" => 3]);
        Permission::create(['name' => 'create multi orders', "order" => 3]);
        // pickups permissions
        Permission::create(['name' => 'view pickups', "order" => 4]);
        Permission::create(['name' => 'show pickups', "order" => 4]);
        Permission::create(['name' => 'create pickups', "order" => 4]);
        Permission::create(['name' => 'edit pickups', "order" => 4]);
        Permission::create(['name' => 'delete pickups', "order" => 4]);
        // tickets permissions
        Permission::create(['name' => 'view tickets', "order" => 5]);
        Permission::create(['name' => 'show tickets', "order" => 5]);
        Permission::create(['name' => 'create tickets', "order" => 5]);
        Permission::create(['name' => 'edit tickets', "order" => 5]);
        Permission::create(['name' => 'delete tickets', "order" => 5]);
        // subscribers permissions
        Permission::create(['name' => 'view subscribers', "order" => 6]);
        // contact form permissions
        Permission::create(['name' => 'view contact form', "order" => 7]);
        // customers permissions
        Permission::create(['name' => 'view customers', "order" => 8]);
        Permission::create(['name' => 'show customers', "order" => 8]);
        Permission::create(['name' => 'create customers', "order" => 8]);
        Permission::create(['name' => 'edit customers', "order" => 8]);
        Permission::create(['name' => 'delete customers', "order" => 8]);
        // businesses permissions
        Permission::create(['name' => 'view businesses', "order" => 9]);
        Permission::create(['name' => 'show businesses', "order" => 9]);
        Permission::create(['name' => 'create businesses', "order" => 9]);
        Permission::create(['name' => 'edit businesses', "order" => 9]);
        Permission::create(['name' => 'delete businesses', "order" => 9]);
        // contacts permissions
        Permission::create(['name' => 'view contacts', "order" => 10]);
        Permission::create(['name' => 'show contacts', "order" => 10]);
        Permission::create(['name' => 'create contacts', "order" => 10]);
        Permission::create(['name' => 'edit contacts', "order" => 10]);
        Permission::create(['name' => 'delete contacts', "order" => 10]);
        // user categories permissions
        Permission::create(['name' => 'view user categories', "order" => 11]);
        Permission::create(['name' => 'show user categories', "order" => 11]);
        Permission::create(['name' => 'create user categories', "order" => 11]);
        Permission::create(['name' => 'edit user categories', "order" => 11]);
        Permission::create(['name' => 'delete user categories', "order" => 11]);
        // users permissions
        Permission::create(['name' => 'view users', "order" => 12]);
        Permission::create(['name' => 'show users', "order" => 12]);
        Permission::create(['name' => 'create users', "order" => 12]);
        Permission::create(['name' => 'edit users', "order" => 12]);
        Permission::create(['name' => 'delete users', "order" => 12]);
        // currenies permissions
        Permission::create(['name' => 'view currencies', "order" => 13]);
        Permission::create(['name' => 'show currencies', "order" => 13]);
        Permission::create(['name' => 'create currencies', "order" => 13]);
        Permission::create(['name' => 'edit currencies', "order" => 13]);
        Permission::create(['name' => 'delete currencies', "order" => 13]);
        // locations permissions
        Permission::create(['name' => 'view locations', "order" => 14]);
        Permission::create(['name' => 'show locations', "order" => 14]);
        Permission::create(['name' => 'create locations', "order" => 14]);
        Permission::create(['name' => 'edit locations', "order" => 14]);
        Permission::create(['name' => 'delete locations', "order" => 14]);



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
            // currencies permissions
            'view currencies',
            'show currencies',
            'create currencies',
            'edit currencies',
            'delete currencies',
            // locations permissions
            'view locations',
            'show locations',
            'create locations',
            'edit locations',
            'delete locations');

        $sales->givePermissionTo(
            // pickups permissions
            'view pickups',
            'show pickups',
            // orders permissions
            'view orders',
            'show orders',
            'create orders',
            'edit orders',
        );

        $customer->givePermissionTo(
        // pickups permissions
            'view pickups',
            'show pickups',
            // orders permissions
            'view orders',
            'show orders',
            'create orders',
            'edit orders',
        );

        $finance->givePermissionTo(
            // orders permissions
            'view orders',
            'show orders',
            // customers permissions
            'view customers',
            'show customers',
        );

        $operation_admin->givePermissionTo(
            // orders permissions
            'view orders',
            'show orders',
            // pickups permissions
            'view pickups',
            'show pickups',
            // locations permissions
            'view locations',
            'show locations',
        );

        $operation_logistics->givePermissionTo(
            // orders permissions
            'view orders',
            'show orders',
            // pickups permissions
            'view pickups',
            'show pickups',
            // locations permissions
            'view locations',
            'show locations',
        );

        $operation_courier->givePermissionTo(
            // orders permissions
            'view orders',
            'show orders',
            // pickups permissions
            'view pickups',
            'show pickups',
            // locations permissions
            'view locations',
            'show locations',
        );
    }
}
