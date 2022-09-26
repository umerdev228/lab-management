<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(1)->create();
        $admin_role = Role::create(
            ['name' => 'admin', 'guard_name' => 'web'],
        );

        $admin = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@labs.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$gJD7J5gHjfADy9RgT/c6X.mJQYxhblxhdSxaCUfEtuP65zUOTJtam', // 123456789
            'remember_token' => Str::random(10),
        ]);
        $admin->assignRole($admin_role);
        $permission = Permission::create(['name' => 'admin.permission.all']);
        $admin->givePermissionTo($permission);

    }
}
