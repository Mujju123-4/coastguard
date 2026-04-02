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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with(['roles', 'location'])->select('users.*');
            
            return \Yajra\DataTables\Facades\DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('role_name', function($row){
                    $role = $row->roles->first()?->name;
                    $color = match($role) {
                        'Admin' => 'bg-rose-100 text-rose-700 border-rose-200',
                        'User' => 'bg-indigo-100 text-indigo-700 border-indigo-200',
                        default => 'bg-slate-100 text-slate-700 border-slate-200',
                    };
                    return '<span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider border ' . $color . '">' . ($role ?? 'No Role') . '</span>';
                })
                ->addColumn('location_name', function($row){
                    return '<span class="text-slate-600 font-medium">' . ($row->location?->name ?? 'Unassigned') . '</span>';
                })
                ->addColumn('action', function($row){
                    $btn = '<div class="flex items-center justify-end space-x-2">';
                    $btn .= '<a href="'.route('users.edit', $row->id).'" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200" title="Edit User">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                             </a>';
                    $btn .= '<form action="'.route('users.destroy', $row->id).'" method="POST" class="inline">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg transition-all duration-200" onclick="return confirm(\'Are you sure?\')" title="Delete User">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                             </form>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['role_name', 'location_name', 'action'])
                ->make(true);
        }

        return view('users.index');
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
