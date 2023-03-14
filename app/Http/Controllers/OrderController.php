<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Mineral;
use App\Models\Order;
use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Illuminate\Support\Str;

class OrderController extends Controller
{

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

        // REDUCE QUANTITY FROM MINERAL

        $mineralInfo = Mineral::findOrFail($request->mineral_id);
        $mineralInfo->quantity = ($mineralInfo->quantity-$request->quantity);
        $mineralInfo->save();

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

    public function generateRrra($id)
    {
        $transitData = Order::with('mineral', 'client', 'delivery')->find($id);
        return view('document.index', compact('transitData'));
    }

    public function showOrdersTransit()
    {
        $orders = Order::with('mineral', 'client', 'delivery')->where('delivery_status', '=', 'in_transit')->get();
        return view('orders.rra', compact('orders'));
    }

    public function showOrdersClient()
    {
        $orders = Order::with('mineral', 'client')->get();

        return view('orders.showclient', compact('orders'));
    }

    public function assignDelivery(Request $request, $id)
    {
        $order = Order::find($id);
        if ($order->payment_status !== 'paid') {
            return back()->with('error', 'Can not assign unpaid order');
        }
        $order->delivery_id = $request->input('delivery');
        $order->route = $request->input('route-name');
        $order->delivery_status = "in_transit";
        $order->save();

        $orders = Order::with('mineral', 'client', 'delivery')->find($id);

        // send message to client
        $getSmsClass = new SmsController;
        $messageClient = 'Hello Mr/Ms ' . $orders->client->name . ' Your Order #' . $orders->order_code . ' has been processed and its on the way to your address';
        $getSmsClass->sendSms($orders->client->phone, $messageClient);

        // send message to delivery agent
        $messageDelivery = 'Hello Mr/Ms ' . $orders->delivery->name . ' Order #' . $orders->order_code . ' has been assigned to you to deliver , login to your dashboard for more details';
        $getSmsClass->sendSms($orders->delivery->phone, $messageDelivery);

        return redirect('/admin/orders')->with('success', 'Order Assigned to delivery.');
    }


    public function rraInspection($id)
    {
        $order = Order::find($id);
        if ($order->delivery_status !== 'in_transit') {
            return back()->with('error', 'Unauthorized access');
        }
        $order->inspection_status = "approved";
        $order->save();

        $orders = Order::with('mineral', 'client', 'delivery')->find($id);


        // send message to client
        $getSmsClass = new SmsController;
        $messageClient = 'Hello Mr/Ms ' . $orders->client->name . ' Your Order #' . $orders->order_code . ' has been processed from Rwanda Revenue Transit Center.';
        $getSmsClass->sendSms($orders->client->phone, $messageClient);

        // send message to delivery agent
        $messageDelivery = 'Hello Mr/Ms ' . $orders->delivery->name . ' Order #' . $orders->order_code . ' has been approved from Rwanda Revenue transit center , Deliver it to the client as soon as possible';
        $getSmsClass->sendSms($orders->delivery->phone, $messageDelivery);

        return redirect('/rra/transit')->with('success', 'Order Processed Successfully.');
    }
}
