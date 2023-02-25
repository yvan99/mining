<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RraAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::guard('rra')->attempt($credentials)) {
            return redirect()->intended('/rra/dashboard');
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')]
        ]);
    }

    public function logout()
    {
        Auth::guard('rra')->logout();

        return redirect('/rra/login');
    }
}
