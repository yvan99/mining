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
            'password' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);
    }

    protected function create(array $data)
    {
        $randomDigits = rand(100000, 999999);
        return Client::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'cli_code' => $randomDigits,
            'status' => 'active', // default active value
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        $message = "Hello , .".$request->name . " Welcome to ". env("APP_NAME"). " Client Portal , Your Account Has been Registered Successfully";

        // send Sms
        $getSmsController = new SmsController();
        $getSmsController->sendSms($request->phone, $message);

        Auth::guard('client')->login($user);

        return redirect()->intended('/client/dashboard');
    }
}
