<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if the user requests larger quantity
        if ($request->quantity >= $request->availablequantity) {
            return back()->with('error', 'Requested Quantity no available');
        }

        $orderModel = new Order;
        $orderModel->mineral_id = $request->mineral_id;
        $orderModel->client_id = $request->client_id;
        $orderModel->quantity = $request->quantity;
        $orderModel->order_code = Str::random(10);
        $orderModel->route = 'none';

        $orderModel->save();
        $createdModelId = Order::findOrFail($orderModel->id);
        $getFlutterwaveController = new FlutterwaveController();
        //This generates a payment reference
        $reference = Flutterwave::generateReference();
        $flwData = [
            'payment_options' => 'card,banktransfer',
            'amount' => $request->amount,
            'email' => $request->email,
            'tx_ref' => $reference,
            'currency' => "RWF",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => $request->email,
                "phone_number" => $request->phone,
                "name" => $request->names
            ],

            "customizations" => [
                "title" => 'Mineral Payment',
                "description" => "Pay For Minerals"

            ],
            "meta" => [
                "order_id" => $createdModelId->id
            ]
        ];

        $getFlutterwaveController = new FlutterwaveController();
        return $getFlutterwaveController->initialize($flwData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrders()
    {
        $orders = Order::with('mineral', 'client')->get();
        $deliveries = Delivery::all();
        return view('orders.index', compact('orders', 'deliveries'));
    }

    public function showOrdersClient()
    {
        $orders = Order::with('mineral', 'client')->get();

        return view('orders.showclient', compact('orders'));
    }

    public function assignDelivery(Request $request, $id)
    {
        $order = Order::find($id);
        return $order;

        if ($order->payment_status !== 'paid') {
            return back()->with('error', 'Can not assign unpaid order');
        }
        $order->delivery_id = $request->input('delivery');
        $order->route = $request->input('route-name');
        $order->save();
        return redirect('/admin/orders')->with('success', 'Order Assigned to delivery.');
    }
}
