<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'jenisbarang-list',
            'jenisbarang-create',
            'jenisbarang-edit',
            'jenisbarang-delete',
            'merk-list',
            'merk-create',
            'merk-edit',
            'merk-delete',
            'satuan-list',
            'satuan-create',
            'satuan-edit',
            'satuan-delete',
            'barang-list',
            'barang-create',
            'barang-edit',
            'barang-delete',
            'barang-print',
            'qr-list',
            'qr-create',
            'qr-delete',
            'qr-print',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
