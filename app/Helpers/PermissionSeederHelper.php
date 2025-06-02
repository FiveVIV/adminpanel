<?php

namespace App\Helpers;

use App\Models\Permission;


class PermissionSeederHelper
{
    public static function createStandardPermissionsFor(array $modelNames): void
    {
        $actions = ["read_any", "read", "create", "update", "delete"];

        foreach ($modelNames as $modelName) {
            foreach ($actions as $action) {
                Permission::firstOrCreate([
                    "name" => "{$action}_{$modelName}",
                ]);
            }
        }
    }
}
