<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class
        ]);

        User::factory(40)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'administratorone@gmail.com',
        ]);

        $user->permissions()->attach(Permission::all());
        $user->roles()->attach(Role::all());

        $role = Role::first();

        $role->permissions()->attach(Permission::all());

        

    }
}
