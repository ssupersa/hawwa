<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// Import model Role dan Permission dari Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Method ini dijalankan saat kamu jalankan 'php artisan db:seed'
     * Di sini kita buat role, permission, dan assign permission ke role
     */
    public function run()
    {
        // Membuat role 'admin', jika sudah ada maka ambil data yang sudah ada (firstOrCreate)
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        
        // Membuat role 'user'
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Membuat permission 'manage users'
        $manageUsersPermission = Permission::firstOrCreate(['name' => 'manage users']);

        // Memberikan permission 'manage users' ke role 'admin'
        $adminRole->givePermissionTo($manageUsersPermission);

        // Bisa tambah role dan permission lain di sini jika perlu
    }
}
