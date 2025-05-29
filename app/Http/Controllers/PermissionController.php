<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query("search");
        $perPage = $request->query("results", 100);

        $permissions = Permission::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where("name", "LIKE", "%{$search}%");
                });
            })
            ->paginate($perPage)
            ->appends($request->query());

        return view("permissions.index", compact("permissions"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view("permissions.details", compact("permission"));
    }
}
