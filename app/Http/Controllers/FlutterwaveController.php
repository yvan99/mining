<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use PDF;

class FlutterwaveController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize($data)
    {
        // Enter the details of the payment
        $payment = Flutterwave::initializePayment($data);
        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }
        return redirect($payment['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {

        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {

            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);
            $updateOrderPaymentStatus = Order::find($data["data"]['meta']['order_id']);
            $updateOrderPaymentStatus->payment_status = "paid";

            $transId = $data['data']['flw_ref'];
            $amount  = $data['data']['amount'];
            $currency = $data['data']['currency'];
            $gateway = $data['data']['payment_type'];
            $customer = $data['data']['customer']['name'];
            $phone   = $data['data']['customer']['phone_number'];
            $email   = $data['data']['customer']['email'];

            $payment = new Payment();
            $payment->flw_id = $transId;
            $payment->amount = $amount;
            $payment->names = $customer;
            $payment->email = $email;
            $payment->currency = $currency;
            $payment->gateway = $gateway;

            $payment->save();
            $getSmsClass = new SmsController();
            $message = 'Hello Mr/Ms ' . $customer . ' Your Order Has been successfully paid and placed';
            $getSmsClass->sendSms($phone, $message);
            $updateOrderPaymentStatus->save();
            return redirect('/client/orders')->with('success', 'Your request was successful!');
        } elseif ($status ==  'cancelled') {
            //Put desired action/code after transaction has been cancelled here
        } else {
            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }

    public function paymentHistory(){
        $payment = Payment::all();
        return view('admin.payment', compact('payment'));

    }

    public function generateDailyPaymentReport()
{
    $paymentsByDate = Payment::selectRaw('DATE(created_at) as date, GROUP_CONCAT(id) as payment_ids')
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->get();

    $pdf = PDF::loadView('payments.daily_report_combined', compact('paymentsByDate'));

    $pdfFileName = 'daily_payment_reports.pdf';

    return $pdf->download($pdfFileName);
}
}
