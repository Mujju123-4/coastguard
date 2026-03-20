<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Location;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['roles', 'location'])->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::with('permissions')->get();
        $locations = Location::all();
        return view('users.create', compact('roles', 'locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'exists:roles,name'],
            'location_id' => ['required', 'exists:locations,id'],
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'location_id' => $request->location_id,
            ]);

            $user->syncRoles($request->role);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'User created successfully.',
                    'redirect' => route('users.index')
                ]);
            }

            return redirect()->route('users.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error creating user: ' . $e->getMessage()
                ], 500);
            }
            return back()->withInput()->with('error', 'Error creating user: ' . $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        $roles = Role::with('permissions')->get();
        $locations = Location::all();
        $userRole = $user->roles->first()?->name;
        return view('users.edit', compact('user', 'roles', 'locations', 'userRole'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'role' => ['required', 'string', 'exists:roles,name'],
            'location_id' => ['required', 'exists:locations,id'],
        ]);

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'location_id' => $request->location_id,
            ]);

            if ($request->filled('password')) {
                $request->validate([
                    'password' => ['confirmed', Rules\Password::defaults()],
                ]);
                $user->update(['password' => Hash::make($request->password)]);
            }

            $user->syncRoles($request->role);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'User updated successfully.',
                    'redirect' => route('users.index')
                ]);
            }

            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error updating user: ' . $e->getMessage()
                ], 500);
            }
            return back()->withInput()->with('error', 'Error updating user: ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
