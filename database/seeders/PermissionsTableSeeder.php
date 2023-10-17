<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Permission::create(['name' => 'kategoriproduks.index']);
        Permission::create(['name' => 'kategoriproduks.create']);
        Permission::create(['name' => 'kategoriproduks.edit']);
        Permission::create(['name' => 'kategoriproduks.delete']);

        Permission::create(['name' => 'suppliers.index']);
        Permission::create(['name' => 'suppliers.create']);
        Permission::create(['name' => 'suppliers.edit']);
        Permission::create(['name' => 'suppliers.delete']);

        Permission::create(['name' => 'produks.index']);
        Permission::create(['name' => 'produks.create']);
        Permission::create(['name' => 'produks.edit']);
        Permission::create(['name' => 'produks.delete']);

        Permission::create(['name' => 'customers.index']);
        Permission::create(['name' => 'customers.create']);
        Permission::create(['name' => 'customers.edit']);
        Permission::create(['name' => 'customers.delete']);

        //permission for roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);

        //permission for permissions
        Permission::create(['name' => 'permissions.index']);

        //permission for users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);
    }
}
