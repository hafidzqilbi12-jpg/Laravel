<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Hak akses dasar untuk melihat, menambah, mengubah, dan menghapus data.
        $permissions = [
            'lihat-data',
            'tambah-data',
            'ubah-data',
            'hapus-data',
            'menu-mahasiswa',
            'menu-dosen',
            'menu-mata-kuliah',
            'menu-ruangan',
            'menu-kelas',
            'menu-jadwal-kuliah',
            'menu-role',
            'menu-pengguna',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // Admin memiliki semua permission.
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->syncPermissions($permissions);

        // Dosen: contoh hanya Mata Kuliah dan Jadwal Kuliah.
        $dosen = Role::firstOrCreate(['name' => 'dosen', 'guard_name' => 'web']);
        $dosen->syncPermissions([
            'lihat-data',
            'menu-mata-kuliah',
            'menu-jadwal-kuliah',
        ]);

        // Mahasiswa: hanya melihat Jadwal Kuliah.
        $mahasiswa = Role::firstOrCreate(['name' => 'mahasiswa', 'guard_name' => 'web']);
        $mahasiswa->syncPermissions([
            'lihat-data',
            'menu-jadwal-kuliah',
        ]);

        User::firstOrCreate(
            ['email' => 'admin@example.test'],
            ['name' => 'Administrator', 'password' => 'password']
        )->syncRoles(['admin']);

        User::firstOrCreate(
            ['email' => 'dosen@example.test'],
            ['name' => 'Dosen Demo', 'password' => 'password']
        )->syncRoles(['dosen']);

        User::firstOrCreate(
            ['email' => 'mahasiswa@example.test'],
            ['name' => 'Mahasiswa Demo', 'password' => 'password']
        )->syncRoles(['mahasiswa']);

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
