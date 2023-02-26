<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'cli_code' => ['required', 'string', 'max:255', 'unique:clients'],
        ]);
    }

    protected function create(array $data)
    {
        return Client::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'cli_code' => $data['cli_code'],
            'status' => 'active', // default value
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        Auth::guard('client')->login($user);

        return redirect()->intended('/client/dashboard');
    }
}
