<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid email or password.'])->withInput($request->only('email'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login');
    }
}
