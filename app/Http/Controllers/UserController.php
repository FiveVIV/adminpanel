<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $perPage = $request->query('results', 10);

        $users = User::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%");
                });
            })
            ->paginate($perPage)
            ->appends($request->query());

        return view("users.index", compact("users"));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("users.details", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user->load(["roles", "permissions"]);

        return view("users.edit", [
            "user" => $user,
            "permissions" => Permission::all(),
            "roles" => Role::with('permissions')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|max:255|unique:users,email," . $user->id,
            "roles" => "array",
            "roles.*" => "exists:roles,id",
            "permissions" => "array|nullable",
            "permissions.*" => "nullable|exists:permissions,id",
        ]);

        $user->update([
            "name" => $validated["name"],
            "email" => $validated["email"],
        ]);

        $user->roles()->sync($validated["roles"] ?? []);
        $user->permissions()->sync($validated["permissions"] ?? []);

        return redirect()->route("users.index")->with("success", "User updated successfully.");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route("users.index")->with("success", "User deleted successfully.");
    }
}
