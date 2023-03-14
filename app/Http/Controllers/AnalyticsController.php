<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function adminAnalytics(){
        $countOrders = DB::table('orders')->count();
        $countMinerals = DB::table('minerals')->count();
        $countPartners = DB::table('deliveries')->count();
        return view('admin.dashboard', compact('countOrders','countMinerals','countPartners'));
    }

}
