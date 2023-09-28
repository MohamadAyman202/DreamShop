<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\Admin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function login()
    {
        return view('admin.auth.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function store(Request $request)
    {
        if (auth()->guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect(RouteServiceProvider::DASHBOARD);
        }
        return redirect()->back()->withErrors(['error' => 'The Account Is Not Found']);
    }

    public function index(Request $request)
    {
        $users = User::query()->orderBy('id', 'DESC')->paginate(5);
        $admins = Admin::query()->get();
        return view('admin.users.index', compact('users', 'admins'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.users.create', compact('roles'));
    }

    public function signup(Request $request)
    {
        if ($request->roles) {
            foreach ($request->roles as $key => $value) {
                if ($request->roles[$key] == 'Admin' || $request->roles[$key] == 'Vendor') {
                    $data = $request->except('_token', 'roles', 'confirm-password');
                    $data['password'] = Hash::make($data['password']);
                    $admin = Admin::create($data);
                    $admin->assignRole($request->input('roles'));
                    return redirect()->back()->with('success', "$value created successfully");
                }
            }
        }

        $data = $request->except('_token', 'roles', 'confirm-password');
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return redirect()->back()->with('success', 'User created successfully');
    }

    // public function show($id) {
    //     $admin = Admin::query()->findOrFail($id);
    //     return view('admin.users.show', compact('admin'));
    // }

    public function edit($id)
    {
        $user = Admin::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->except('_token', 'roles', 'confirm-password');
        $admin = Admin::query()->findOrFail($id);
        $data['password'] = Hash::make($data['password']);
        $admin->update($data);
        $admin->assignRole($request->input('roles'));
        return redirect()->back()->with('success', 'User updated successfully');
    }

    public function destroy(Request $request)
    {
        if ($request->id && $request->roles == 'Admin' || $request->roles == 'Vendor') {
            Admin::query()->findOrFail($request->id)->delete();
            return redirect()->back()->with("$request->roles Deleted Successfully");
        }

        if ($request->id && $request->roles == 'User') {
            User::query()->findOrFail($request->id)->delete();
            return redirect()->back()->with("$request->roles Deleted Successfully");
        }
    }
}
