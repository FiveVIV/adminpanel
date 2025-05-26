<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            [
                "name" => "create_user"
            ],
            [
                "name" => "update_user"
            ],
            [
                "name" => "delete_user"
            ],
            [
                "name" => "read_user"
            ]
        ]);
    }
}
