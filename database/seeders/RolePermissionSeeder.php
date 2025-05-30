<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Seeder ini akan membuat role dan permission dasar untuk aplikasi.
     */
    public function run()
    {
        // Membuat role 'admin' jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Membuat role 'ustadz' jika belum ada
        $ustadzRole = Role::firstOrCreate(['name' => 'ustadz']);

        // Membuat role 'user' jika belum ada
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Contoh permission: 'manage users'
        $manageUsersPermission = Permission::firstOrCreate(['name' => 'manage users']);

        // Assign permission 'manage users' ke admin saja
        $adminRole->givePermissionTo($manageUsersPermission);

        // Kamu bisa menambahkan lebih banyak permission lain seperti:
        // $createPost = Permission::firstOrCreate(['name' => 'create post']);
        // $ustadzRole->givePermissionTo($createPost);
        // $userRole->givePermissionTo('view post');
    }
}
