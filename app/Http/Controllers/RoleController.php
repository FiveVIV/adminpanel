<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('results', 100);

        $roles = Role::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                });
            })
            ->paginate($perPage)
            ->appends($request->query());

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("roles.create", [
            "permissions" => Permission::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|max:255|unique:roles,name",
            "permissions" => "array|nullable",
            "permissions.*" => "nullable|exists:permissions,id",
        ]);

        $role = Role::create([
            "name" => $validated["name"]
        ]);

        $role->permissions()->sync($validated["permissions"] ?? []);

        return redirect()->route("roles.index")->with("success", "Role created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view("roles.details", compact("role"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view("roles.edit", [
            "role" => $role,
            "permissions" => Permission::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            "name" => "required|max:255|unique:roles,name," . $role->id,
            "permissions" => "array|nullable",
            "permissions.*" => "nullable|exists:permissions,id",
        ]);

        $role->update([
            "name" => $validated["name"]
        ]);

        $role->permissions()->sync($validated["permissions"] ?? []);

        return redirect()->route("roles.index")->with("success", "Role updated successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route("roles.index")->with("success", "Role deleted successfully.");
    }
}
