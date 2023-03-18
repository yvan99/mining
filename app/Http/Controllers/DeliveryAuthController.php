<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DeliveryAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        return $credentials;

        if (Auth::guard('delivery')->attempt($credentials)) {
            return redirect()->intended('/delivery/dashboard');
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')]
        ]);
    }

    public function logout()
    {
        Auth::guard('delivery')->logout();

        return redirect('/delivery/login');
    }
}
