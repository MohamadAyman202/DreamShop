<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function dashboard() {
        return view('admin.dashboard.index');
    }

    public function store(Request $request)
    {
        if (auth()->guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect(RouteServiceProvider::DASHBOARD);
        }
        return redirect()->back()->withErrors(['error' => 'The Account Is Not Found']);
    }
}
