<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Helpers\PermissionSeederHelper;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PermissionSeederHelper::createStandardPermissionsFor(["user", "permission", "role"]);

    }
}

