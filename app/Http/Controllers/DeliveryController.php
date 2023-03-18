<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{

    public function index()
    {
        $deliveries = Delivery::all();
        return view('delivery.index', compact('deliveries'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'truck' => 'required',
            'email'=>'required|email',
            'password' => 'required'
        ]);

        Delivery::create($validatedData);

        return redirect()->back()
            ->with('success', 'Shipping Partner created successfully.');
    }
}
