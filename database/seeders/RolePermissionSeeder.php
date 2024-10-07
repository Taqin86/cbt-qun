<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // permision dikelas kita bisa ngapain aja

        $permissions = [
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }

        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);

        $teacherRole->givePermissionTo([
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $studentRole->givePermissionTo([
            'view courses',
        ]);

        // membuat data user super admin
        $user = User::create([
            'name' => 'Qun',
            'email' => 'qun@teacher.com',
            'password' => bcrypt('123123123')
        ]);

        $user->assignRole($teacherRole);
    }
}
