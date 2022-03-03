<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'table',
            'table-list',
            'table-create',
            'table-edit',
            'table-delete',
            'reservation',
            'reservation-list',
            'reservation-create',
            'reservation-delete',
            'reservation-filter',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
